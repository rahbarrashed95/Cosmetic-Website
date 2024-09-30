<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;
use Image;
use File;
use Str;

class CertificationController extends Controller
{
    
    public function index()
    {
      	
        if(!auth()->user()->can('productcategory.index')){
            abort(403, 'Unauthorized action.');
        }  
        
        $certifications = Certification::all();
        return view('admin.certification.index',compact('certifications'));
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
            'title'=>'required'
        ];
        
        $customMessages = [
            'title.required' => trans('Title is required'),
        ];
        
        $this->validate($request, $rules,$customMessages);

        $certification = new Certification();

        if($request->thumb_image){
            $image = Image::make($request->file('thumb_image'));
            $extention = $request->thumb_image->getClientOriginalExtension();
            $image_name = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            

            // For Main Image
            $destation_path = 'uploads/certification/images/'.$image_name;
            $image->resize(176,176);
            $image->save(public_path().'/'.$destation_path);
            $certification->image = $destation_path;
        }

        $certification->title = $request->title;
        $certification->save();
        
        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.certification.index')->with($notification);
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
      
        $certification = Certification::find($id);
        $certification_data = view('admin.certification.edit',compact('certification'))->render();
        return response()->json([
            'success'           => true,
            'certification_data' => $certification_data
        ]);
    }


    public function update(Request $request,$id)
    {
      if(!auth()->user()->can('productCategory.update')){
            abort(403, 'Unauthorized action.');
        }  
        
        $rules = [
            'title'=>'required',
        ];

        $customMessages = [
            'title.required' => trans('Title is required')
        ];
        
        $this->validate($request, $rules,$customMessages);

        $certification = Certification::find($id);
        
        if($request->thumb_image){
            
            $old_thumbnail = $certification->image;
            $image = Image::make($request->file('thumb_image'));
            $extention = $request->thumb_image->getClientOriginalExtension();
            $image_name = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            

            // For Main Image
            $destation_path = 'uploads/certification/images/'.$image_name;
            $image->resize(176,176);
            $image->save(public_path().'/'.$destation_path);
            $certification->image = $destation_path;
            
            if($old_thumbnail){
                if(File::exists(public_path().'/uploads/custom-images2/'.$old_thumbnail))unlink(public_path().'/uploads/custom-images2/'.$old_thumbnail);
            }
            
        }

        $certification->title = $request->title;
        $certification->save();

        $notification = trans('admin_validation.Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.certification.index')->with($notification);
    }

    public function destroy($id)
    {
      if(!auth()->user()->can('productCategory.delete')){
            abort(403, 'Unauthorized action.');
        }  
      
        $certification = Certification::find($id);
        $old_thumbnail = $certification->image;
        $certification->delete();
        
        if($old_thumbnail){
            if(File::exists(public_path().'/uploads/custom-images2/'.$old_thumbnail))unlink(public_path().'/uploads/custom-images2/'.$old_thumbnail);
        }

        $notification = trans('admin_validation.Delete Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.certification.index')->with($notification);
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
