<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PrinterType;
use App\Models\PrinterSeries;
use App\Models\MegaMenuSubCategory;
use App\Models\MegaMenuCategory;
use Illuminate\Http\Request;
use Image;
use File;
use Str;
class PrinterSeriesController extends Controller
{
    
    public function index()
    {
      	
        if(!auth()->user()->can('productcategory.index')){
            abort(403, 'Unauthorized action.');
        }  
        
        $printer_series = PrinterSeries::with('type')->get();
        $types = PrinterType::all();
        return view('admin.printer_series.index',compact('printer_series','types'));
    }

    public function store(Request $request)
    {
        
       if(!auth()->user()->can('productCategory.store')){
            abort(403, 'Unauthorized action.');
        }  
        
        $rules = [
            'name'=>'required',
            'type_id'=>'required',
        ];
        
        $customMessages = [
            'name.required' => trans('admin_validation.Name is required'),
            'type_id.required' => trans('Type is required')
        ];
        
        $this->validate($request, $rules,$customMessages);
        
        PrinterSeries::create([
            'type_id' => $request->type_id,
            'name' => $request->name
        ]);

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.printer-series.index')->with($notification);
    }

    public function edit($id)
    {
      if(!auth()->user()->can('productCategory.edit')){
            abort(403, 'Unauthorized action.');
        }  
      
        $printer_series = PrinterSeries::find($id);
        $types = PrinterType::all();
        $edit_printer_series = view('admin.printer_series.edit',compact('printer_series','types'))->render();
        return response()->json([
            'success'           => true,
            'edit_printer_series' => $edit_printer_series
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

        PrinterSeries::where('id', $id)->update([
            'name' =>  $request->name,    
            'type_id' =>  $request->type_id,    
        ]);

        $notification = trans('admin_validation.Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.printer-series.index')->with($notification);
    }

    public function destroy($id)
    {
      if(!auth()->user()->can('productCategory.delete')){
            abort(403, 'Unauthorized action.');
        }  
      
        $printer_series = PrinterSeries::find($id);
        $printer_series->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.printer-series.index')->with($notification);
    }
    
    public function get_series($type_id){
        $printer_series = PrinterSeries::where('type_id', $type_id)->get();
        $series_data = view('admin.printer_series.printer_series_name', compact('printer_series'))->render();
        return response()->json([
            'success'     => true,
            'series_data' => $series_data
        ]);
    }
    
}
