<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\OfferProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Image;
use File;
use Str;
class OfferProductController extends Controller
{
    
    public function index()
    {
      	
        if(!auth()->user()->can('productcategory.index')){
            abort(403, 'Unauthorized action.');
        }  
        $products = Product::all();
        $offers = Offer::all();
        $offer_products = OfferProduct::with('product','offer')->get();
        return view('admin.offer_products.index',compact('offer_products','products','offers'));
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
            'product_id'=>'required'
        ];
        
        $customMessages = [
            'product_id.required' => trans('Product Id is required')
        ];
        
        $this->validate($request, $rules,$customMessages);
        
        $offer_products = New OfferProduct();
        $offer_products->offer_id = $request->offer_id;
        $offer_products->product_id = $request->product_id;
        $offer_products->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.product.index')->with($notification);
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
      
        $offer = Offer::find($id);
        $edit_offer = view('admin.offer.edit',compact('offer'))->render();
        return response()->json([
            'success'           => true,
            'edit_offer' => $edit_offer
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


        $offer = Offer::find($id);

        if ($request->hasFile('image')) {
            $old_thumbnail = $product->image;
            $image = Image::make($request->file('image'));
            $extention = $request->image->getClientOriginalExtension();
            $image_name = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;

            $destation_path = 'uploads/custom-images/'.$image_name;
            $image->resize(500,500);
            $image->save(public_path().'/'.$destation_path);
            
            $offer->image=$destation_path;
            
            if(File::exists(public_path().'/uploads/custom-images/'.$old_thumbnail))
                unlink(public_path().'/uploads/custom-images/'.$old_thumbnail);
            
        }

        $offer->name = $request->name;
        $offer->save();

        $notification = trans('admin_validation.Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.offers.index')->with($notification);
    }

    public function destroy($id)
    {
      if(!auth()->user()->can('productCategory.delete')){
            abort(403, 'Unauthorized action.');
        }  
      
        $offer_product = OfferProduct::find($id);
        $offer_product->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.offer-products.index')->with($notification);
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
    
    public function select_offer($product_id){
        $offers = Offer::all();
        $product = Product::find($product_id);
        $html = view('admin.offer_products.select_offer_modal', compact('offers','product'))->render();
        return response()->json(['success' => true, 'html' => $html]);
    }
}