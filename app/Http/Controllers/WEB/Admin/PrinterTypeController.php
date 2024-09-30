<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PrinterType;
use App\Models\FeaturedCategory;
use App\Models\MegaMenuSubCategory;
use App\Models\MegaMenuCategory;
use Illuminate\Http\Request;
use Image;
use File;
use Str;
class PrinterTypeController extends Controller
{
    
    public function index()
    {
      	
        if(!auth()->user()->can('productcategory.index')){
            abort(403, 'Unauthorized action.');
        }  
        
        $printer_types = PrinterType::all();
        return view('admin.printer_type.index',compact('printer_types'));
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
            'name'=>'required'
        ];
        
        $customMessages = [
            'name.required' => trans('admin_validation.Name is required'),
        ];
        
        $this->validate($request, $rules,$customMessages);

        PrinterType::create([
            'name' => $request->name    
        ]);

        $category = new PrinterType();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.printer-type.index')->with($notification);
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
      
        $printer_type = PrinterType::find($id);
        $edit_printer_type = view('admin.printer_type.edit',compact('printer_type'))->render();
        return response()->json([
            'success'           => true,
            'edit_printer_type' => $edit_printer_type
        ]);
    }


    public function update(Request $request,$id)
    {
      if(!auth()->user()->can('productCategory.update')){
            abort(403, 'Unauthorized action.');
        }  
      
        $printer_type = PrinterType::find($id);
        $rules = [
            'name'=>'required',
        ];

        $customMessages = [
            'name.required' => trans('admin_validation.Name is required')
        ];
        $this->validate($request, $rules,$customMessages);

        PrinterType::where('id', $id)->update([
            'name' =>  $request->name    
        ]);

        $notification = trans('admin_validation.Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.printer-type.index')->with($notification);
    }

    public function destroy($id)
    {
      if(!auth()->user()->can('productCategory.delete')){
            abort(403, 'Unauthorized action.');
        }  
      
        $printer_type = PrinterType::find($id);
        $printer_type->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.printer-type.index')->with($notification);
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
