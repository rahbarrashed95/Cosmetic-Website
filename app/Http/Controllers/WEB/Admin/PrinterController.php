<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Printer;
use App\Models\PrinterType;
use App\Models\PrinterSeries;
use App\Models\MegaMenuSubCategory;
use App\Models\MegaMenuCategory;
use Illuminate\Http\Request;
use Image;
use File;
use Str;
class PrinterController extends Controller
{
    
    public function index()
    {
      	
        if(!auth()->user()->can('productcategory.index')){
            abort(403, 'Unauthorized action.');
        }  
        
        $printers = Printer::with('type','series')->get();
        $types = PrinterType::all();
        $series = PrinterSeries::all();
        return view('admin.printer.index',compact('printers','types','series'));
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
            'name'=>'required',
            'type_id'=>'required',
            'series_id'=>'required',
        ];
        
        $customMessages = [
            'name.required' => trans('admin_validation.Name is required'),
            'type_id.required' => trans('Type is required'),
            'series_id.required' => trans('Series is required'),
        ];
        
        $this->validate($request, $rules,$customMessages);
        
        $printer = New Printer();
        
        // if ($request->hasFile('driver')) {
        //     $zipFile = $request->file('driver');
            
        //     $zipFileName = Str::slug($request->name) . date('-Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $zipFile->getClientOriginalExtension();
        //     $zipFilePath = 'uploads/custom-drivers/' . $zipFileName;
        //     $zipFile->move(public_path('uploads/custom-drivers'), $zipFileName);
        //     $printer->driver = $zipFileName;
        // }
        
        if ($request->hasFile('pdf')) {
            $pdfFile = $request->file('pdf');
            
            $pdfFileName = Str::slug($request->name) . date('-Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $pdfFile->getClientOriginalExtension();
            // $zipFilePath = 'uploads/custom-drivers/' . $pdfFileName;
            $pdfFile->move(public_path('uploads/custom-pdf'), $pdfFileName);
            $printer->pdf = $pdfFileName;
        }
        
        $printer->name = $request->name;
        $printer->driver = $request->driver;
        $printer->type_id = $request->type_id;
        $printer->series_id = $request->series_id;
        
        $printer->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.printer.index')->with($notification);
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
      
        $printer = Printer::find($id);
        $types = PrinterType::all();
        $series = PrinterSeries::all();
        $edit_printer = view('admin.printer.edit',compact('printer','types','series'))->render();
        return response()->json([
            'success'           => true,
            'edit_printer' => $edit_printer
        ]);
    }


    public function update(Request $request,$id)
    {
      if(!auth()->user()->can('productCategory.update')){
            abort(403, 'Unauthorized action.');
        }  
        
        $rules = [
            'name'=>'required',
        ];

        $customMessages = [
            'name.required' => trans('admin_validation.Name is required')
        ];
        
        $this->validate($request, $rules,$customMessages);


        $printer = Printer::find($id);

        if ($request->hasFile('pdf')) {
            $pdfFile = $request->file('pdf');
            
            $pdfFileName = Str::slug($request->name) . date('-Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $pdfFile->getClientOriginalExtension();
            // $zipFilePath = 'uploads/custom-drivers/' . $pdfFileName;
            $pdfFile->move(public_path('uploads/custom-pdf'), $pdfFileName);
            $printer->pdf = $pdfFileName;
        }

        $printer->name = $request->name;
        $printer->driver = $request->driver;
        $printer->type_id = $request->type_id;
        $printer->series_id = $request->series_id;

        $printer->save();

        $notification = trans('admin_validation.Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.printer.index')->with($notification);
    }

    public function destroy($id)
    {
      if(!auth()->user()->can('productCategory.delete')){
            abort(403, 'Unauthorized action.');
        }  
      
        $printer = Printer::find($id);
        $printer->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.printer.index')->with($notification);
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
