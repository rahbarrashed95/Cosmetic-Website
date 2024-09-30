<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\PopularPost;
use App\Models\Setting;
use Illuminate\Http\Request;
use Image;
use File;
use Auth;
use Str;

class BlogController extends Controller
{
    
    public function index()
    {
        $blogs = Blog::with('category','comments')->get();
        $setting = Setting::first();
        $frontend_url = $setting->frontend_url;
        $frontend_view = $frontend_url.'blogs/blog?slug=';

        return view('admin.blog',compact('blogs','frontend_view'));
    }


    public function create()
    {
        $categories = BlogCategory::where('status',1)->get();
        return view('admin.create_blog',compact('categories'));
    }


    public function store(Request $request)
    {
        $rules = [
            'title'=>'required|unique:blogs',
            'slug'=>'required|unique:blogs',
            'image'=>'required',
            'description'=>'required',
            'category'=>'',
            'status'=>'',
            'show_homepage'=>'',
        ];
        $customMessages = [
            'title.required' => trans('admin_validation.Title is required'),
            'title.unique' => trans('admin_validation.Title already exist'),
            'slug.required' => trans('admin_validation.Slug is required'),
            'slug.unique' => trans('admin_validation.Slug already exist'),
            'image.required' => trans('admin_validation.Image is required'),
            'description.required' => trans('admin_validation.Description is required')
        ];
        $this->validate($request, $rules,$customMessages);

        // $admin = Auth::guard('admin')->user();
       
        $blog = new Blog();
        
        if($request->image){
            $image = Image::make($request->file('image'));
            $extention = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->title).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;

            $destation_path1 = 'uploads/custom-images/'.$image_name;
            $image->resize(1300,490);
            $image->save(public_path().'/'.$destation_path1);

            // For Main Image
            $destation_path = 'uploads/custom-images2/'.$image_name;
            $image->resize(363,363);
            $image->save(public_path().'/'.$destation_path);
            
            $blog->image = $image_name;
        }

        $blog->admin_id = auth()->user()->id;
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->description = $request->description;
        $blog->blog_category_id = $request->category;
        $blog->status = $request->status;
        $blog->show_homepage = $request->show_homepage;
        $blog->seo_title = $request->seo_title ? $request->seo_title : $request->title;
        $blog->seo_description = $request->seo_description ? $request->seo_description : $request->title;
        $blog->save();

        $notification= trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $categories = BlogCategory::where('status',1)->get();
        $blog = Blog::find($id);
        return view('admin.edit_blog',compact('categories','blog'));
    }


    public function show($id)
    {
        $blog = Blog::with('category','comments')->find($id);
        return response()->json(['blog' => $blog], 200);
    }


    public function update(Request $request,$id)
    {
        $blog = Blog::find($id);
        $rules = [
            'title'=>'required|unique:blogs,title,'.$blog->id,
            'slug'=>'required|unique:blogs,slug,'.$blog->id,
            'description'=>'required',
            'category'=>'',
            'status'=>'',
            'show_homepage'=>'',
        ];
        $customMessages = [
            'title.required' => trans('admin_validation.Title is required'),
            'title.unique' => trans('admin_validation.Title already exist'),
            'slug.required' => trans('admin_validation.Slug is required'),
            'slug.unique' => trans('admin_validation.Slug already exist'),
            'description.required' => trans('admin_validation.Description is required')
        ];
        $this->validate($request, $rules,$customMessages);
        
        if($request->image){
            $old_image = $blog->image;
            $image = Image::make($request->file('image'));
            $extention = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->title).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;

            $destation_path1 = 'uploads/custom-images/'.$image_name;
            $image->resize(1300,490);
            $image->save(public_path().'/'.$destation_path1);

            // For Main Image
            $destation_path = 'uploads/custom-images2/'.$image_name;
            $image->resize(363,363);
            $image->save(public_path().'/'.$destation_path);
            
            $blog->image = $image_name;
            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->description = $request->description;
        $blog->blog_category_id = $request->category;
        $blog->status = $request->status;
        $blog->show_homepage = $request->show_homepage;
        $blog->seo_title = $request->seo_title ? $request->seo_title : $request->title;
        $blog->seo_description = $request->seo_description ? $request->seo_description : $request->title;
        $blog->save();

        $notification= trans('admin_validation.Updated Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.blog.index')->with($notification);
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $old_image = $blog->image;
        $blog->delete();
        if($old_image){
            if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
        }

        BlogComment::where('blog_id',$id)->delete();
        PopularPost::where('blog_id',$id)->delete();

        $notification=  trans('admin_validation.Delete Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function changeStatus($id){
        $blog = Blog::find($id);
        if($blog->status==1){
            $blog->status=0;
            $blog->save();
            $message= trans('admin_validation.Inactive Successfully');
        }else{
            $blog->status=1;
            $blog->save();
            $message= trans('admin_validation.Active Successfully');
        }
        return response()->json($message);
    }
    
    public function changeIsPopular($id){
        $blog = Blog::find($id);
        if($blog->IsPopular == 1){
            $blog->IsPopular = 0;
            $blog->save();
            $message = trans('admin_validation.Inactive Successfully');
        }else{
            $blog->IsPopular = 1;
            $blog->save();
            $message = trans('admin_validation.Active Successfully');
        }
        return response()->json($message);
    }
    
}