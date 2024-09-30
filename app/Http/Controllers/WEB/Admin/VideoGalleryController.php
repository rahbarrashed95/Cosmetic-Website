<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Image;
use File;
use Str;

class VideoGalleryController extends Controller
{
    
    public function index()
    {
      	
        if(!auth()->user()->can('productcategory.index')){
            abort(403, 'Unauthorized action.');
        }  
        
        $video_galleries = VideoGallery::all();
        return view('admin.video_gallery.index',compact('video_galleries'));
    }


    public function create()
    {
        if(!auth()->user()->can('product-category-create')){
            abort(403, 'Unauthorized action.');
        }  
      
        return view('admin.create_product_category');
    }


    public function store(Request $request)
    {
        
       if(!auth()->user()->can('productCategory.store')){
            abort(403, 'Unauthorized action.');
        }  
        
        $rules = [
            'thumb_img'=>'required',
            'video_url'=>'required'
        ];
        
        $customMessages = [
            'thumb_img.required' => trans('Thumb Image is required'),
            'video_url.required' => trans('Video Url is required')
        ];
        
        $this->validate($request, $rules,$customMessages);

        $video_gallery = new VideoGallery();

        if($request->thumb_img){
            $image = Image::make($request->file('thumb_img'));
            $extention = $request->thumb_img->getClientOriginalExtension();
            $image_name = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            

            // For Main Image
            $destation_path = 'uploads/video_gallery/images/'.$image_name;
            $image->resize(691,400);
            $image->save(public_path().'/'.$destation_path);
            $video_gallery->thumb_img = $destation_path;
        }

        $video_gallery->video_url = $request->video_url;
        $video_gallery->video_title = $this->extractSrcFromIframe($request->video_url);
        $video_gallery->save();
        
        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.video-gallery.index')->with($notification);
    }
    
    private function extractSrcFromIframe($url)
    {
        // Regular expression to match src attribute in iframe tags
        $pattern = '/src="([^"]*)"/i';
        preg_match($pattern, $url, $matches);

        // Return the extracted src value or the original URL if no src found
        return $matches[1] ?? $url;
    }


    public function show($id){
      	if(!auth()->user()->can('productCategory.show')){
            abort(403, 'Unauthorized action.');
        }  
      
        $category = Category::find($id);
        return response()->json(['category' => $category],200);
    }

    public function edit($id)
    {
      if(!auth()->user()->can('productCategory.edit')){
            abort(403, 'Unauthorized action.');
        }  
      
        $video_gallery = VideoGallery::find($id);
        $video_gallery_data = view('admin.video_gallery.edit',compact('video_gallery'))->render();
        return response()->json([
            'success'           => true,
            'video_gallery_data' => $video_gallery_data
        ]);
    }

    public function update(Request $request,$id)
    {
        
      if(!auth()->user()->can('productCategory.update')){
            abort(403, 'Unauthorized action.');
        }  
        
        $rules = [
            'video_url'=>'required'
        ];
        
        $customMessages = [
            'video_url.required' => trans('Video Url is required')
        ];
        
        $this->validate($request, $rules,$customMessages);

        $video_gallery = VideoGallery::find($id);
        
        if($request->thumb_img){
            
            $old_thumbnail = $video_gallery->thumb_img;
            $image = Image::make($request->file('thumb_img'));
            $extention = $request->thumb_img->getClientOriginalExtension();
            $image_name = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            

            // For Main Image
            $destation_path = 'uploads/video_gallery/images/'.$image_name;
            $image->resize(691,400);
            $image->save(public_path().'/'.$destation_path);
            $video_gallery->thumb_img = $destation_path;
            
            if($old_thumbnail){
                if(File::exists(public_path().'/uploads/custom-images2/'.$old_thumbnail))unlink(public_path().'/uploads/custom-images2/'.$old_thumbnail);
            }
        }

        $video_gallery->video_url = $request->video_url;
        $video_gallery->video_title = $this->extractSrcFromIframe($request->video_url);
        $video_gallery->save();

        $notification = trans('admin_validation.Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.video-gallery.index')->with($notification);
    }

    public function destroy($id)
    {
      if(!auth()->user()->can('productCategory.delete')){
            abort(403, 'Unauthorized action.');
        }  
      
        $video_gallery = VideoGallery::find($id);
        $old_thumbnail = $video_gallery->thumb_image;
        $video_gallery->delete();
        
        if($old_thumbnail){
            if(File::exists(public_path().'/uploads/custom-images2/'.$old_thumbnail))unlink(public_path().'/uploads/custom-images2/'.$old_thumbnail);
        }

        $notification = trans('admin_validation.Delete Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.video-gallery.index')->with($notification);
    }

    public function changeStatus($id){
      if(!auth()->user()->can('productCategory.changeStatus')){
            abort(403, 'Unauthorized action.');
        }  
      
        $category = Category::find($id);
        if($category->status==1){
            $category->status=0;
            $category->save();
            $message = trans('admin_validation.Inactive Successfully');
        }else{
            $category->status=1;
            $category->save();
            $message= trans('admin_validation.Active Successfully');
        }
        return response()->json($message);
    }
}
