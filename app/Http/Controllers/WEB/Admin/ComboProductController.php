<?php

namespace App\Http\Controllers\WEB\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ComboProduct;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\ProductGallery;
use App\Models\Brand;
use App\Models\ProductSpecificationKey;
use App\Models\ProductSpecification;
use App\Models\OrderProduct;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use App\Models\OrderProductVariant;
use App\Models\ProductReport;
use App\Models\ProductReview;
use App\Models\Wishlist;
use App\Models\Size;
use App\Models\Color;
use App\Models\Setting;
use App\Models\FlashSaleProduct;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartVariant;
use App\Models\CompareProduct;
use App\Models\productColorVariation;
use App\Models\FacebookPixel;
use App\Models\SitePixel;
use App\Models\GoogleAnalytic;
use App\Models\ProductStock;
use App\Models\variationStock;
use Image;
use File;
use Str;
use DB;

class ComboProductController extends Controller
{
    public function index(Request $request)
    {
        
      if(!auth()->user()->can('product.index')){
            abort(403, 'Unauthorized action.');
        }

        $combo_products = ComboProduct::paginate(100);
        return view('admin.combo_product.index',compact('combo_products'));
    }

    public function cat_wise_product(Request $request) {
        $cat_id = $request->category_id;
        $cat_product = Product::with('category','seller', 'brand')->where('category_id', $request->category_id)->where(['vendor_id' => 0])->orderBy('id', 'desc')->get();
        $setting = Setting::first();
        $orderProducts = OrderProduct::all();
        $frontend_url = $setting->frontend_url;
        $frontend_view = $frontend_url.'single-product?slug=';
        $categories = Category::all();

        // $html_view = view('admin.query_product', compact('cat_product','setting','orderProducts'))->render();

        return view('admin.cat_product',compact('cat_product','orderProducts','setting','frontend_view','categories','cat_id'));
    }

    public function sellerProduct(){

        $products = Product::with('category','seller','brand')->where('vendor_id','!=',0)->where('status',1)->get();
        $orderProducts = OrderProduct::all();
        $setting = Setting::first();
        $frontend_url = $setting->frontend_url;
        $frontend_view = $frontend_url.'single-product?slug=';
        return view('admin.product',compact('products','orderProducts','setting','frontend_view'));
    }

    public function sellerPendingProduct(){
        $products = Product::with('category','seller','brand')->where('vendor_id','!=',0)->where('approve_by_admin',0)->get();
        $orderProducts = OrderProduct::all();
        $setting = Setting::first();

        return view('admin.pending_product',compact('products','orderProducts','setting'));

    }

    public function stockoutProduct(){
      if(!auth()->user()->can('product.stockProduct')){
            abort(403, 'Unauthorized action.');
        }
        $products = Product::with('category','seller','brand')->where('vendor_id',0)->where('qty',0)->get();
        $orderProducts = OrderProduct::all();
        $setting = Setting::first();

        $frontend_url = $setting->frontend_url;
        $frontend_view = $frontend_url.'single-product?slug=';

        return view('admin.stockout_product',compact('products','orderProducts','setting','frontend_view'));

    }

    public function create()
    {
        
      if(!auth()->user()->can('product.create')){
            abort(403, 'Unauthorized action.');
        }
        
        return view('admin.combo_product.create');
    }

    public function store(Request $request)    {
       if(!auth()->user()->can('product.store')){
            abort(403, 'Unauthorized action.');
        }
         
        $rules = [
            'short_name' => '',
            'name' => 'required',
            'slug' => 'required|unique:products',
            'price' => 'required',
            'thumb_image' => 'required',
            'product_id' => ''
        ];
        
        $customMessages = [
            'name.required' => trans('admin_validation.Name is required'),
            'name.unique' => trans('admin_validation.Name is required'),
            'slug.required' => trans('admin_validation.Slug is required'),
            'slug.unique' => trans('admin_validation.Slug already exist'),
            'thumb_image.required' => trans('admin_validation.thumbnail is required'),
            'price.required' => trans('admin_validation.Price is required'),
            'status.required' => trans('admin_validation.Status is required'),
        ];
        
        $this->validate($request, $rules,$customMessages);

        $combo_product = new ComboProduct();
        
        if($request->thumb_image){
            $image = Image::make($request->file('thumb_image'));
            $extention = $request->thumb_image->getClientOriginalExtension();
            $image_name = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;

            $destation_path1 = 'uploads/combo-product/big-thumb-image/'.$image_name;
            $image->resize(800,800);
            $image->save(public_path().'/'.$destation_path1);

            // For Main Image
            $destation_path = 'uploads/combo-product/small-thumb-image/'.$image_name;
            $image->resize(480,480);
            $image->save(public_path().'/'.$destation_path);
            $combo_product->image=$destation_path;
        }
       
        $combo_product->product_id = json_encode($request->product_id);
        $combo_product->name = $request->name;
        $combo_product->slug = $request->slug;
        $combo_product->price = $request->price;
        $combo_product->short_description = $request->short_description;
        $combo_product->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.combo-product.index')->with($notification);
    
    }

    public function show($id)
    {
        $product = Product::with('category','brand','gallery','specifications','reviews','variants','variantItems')->find($id);
        if($product->vendor_id == 0){
            $notification = 'Something went wrong';
            return response()->json(['error'=>$notification],403);
        }

        return response()->json(['product' => $product], 200);
    }


    public function edit($id)
    {
      if(!auth()->user()->can('product.edit')){
            abort(403, 'Unauthorized action.');
        }
        
        $combo_product = ComboProduct::find($id);
        $data = json_decode($combo_product->product_id);
        $product_array = [];
        
        foreach($data as $product_id) {
           $product_array[] = Product::where('id', $product_id)->first();
        }
        return view('admin.combo_product.edit',compact('combo_product','product_array'));
    }

    public function update(Request $request, $id)
    {
         if(!auth()->user()->can('product.update')){
            abort(403, 'Unauthorized action.');
        }
        
        $combo_product = ComboProduct::find($id);
        
        $rules = [
            'short_name' => '',
            'name' => 'required',
            // 'slug' => 'required|unique:products',
            'price' => 'required',
            'product_id' => ''
        ];
        
        $customMessages = [
            'name.required' => trans('admin_validation.Name is required'),
            'name.unique' => trans('admin_validation.Name is required'),
            // 'slug.required' => trans('admin_validation.Slug is required'),
            'slug.unique' => trans('admin_validation.Slug already exist'),
            'price.required' => trans('admin_validation.Price is required'),
            'status.required' => trans('admin_validation.Status is required'),
        ];
        
        $this->validate($request, $rules,$customMessages);

         if($request->thumb_image){
             
            $old_thumbnail = $combo_product->thumb_image;
            $image = Image::make($request->file('thumb_image'));
            $extention = $request->thumb_image->getClientOriginalExtension();
            $image_name = Str::slug($request->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;

            $destation_path1 = 'uploads/combo-product/big-thumb-image/'.$image_name;
            $image->resize(800,800);
            $image->save(public_path().'/'.$destation_path1);

            // For Main Image
            $destation_path = 'uploads/combo-product/small-thumb-image/'.$image_name;
            $image->resize(280,280);
            $image->save(public_path().'/'.$destation_path);
            $combo_product->image=$destation_path;
            
            if($old_thumbnail){
                if(File::exists(public_path().'/uploads/custom-images/'.$old_thumbnail))unlink(public_path().'/uploads/custom-images/'.$old_thumbnail);
                if(File::exists(public_path().'/uploads/main-image/'.$old_thumbnail))unlink(public_path().'/uploads/main-image/'.$old_thumbnail);
            }
            
        }
        
        $combo_product->product_id = json_encode($request->product_id);
        $combo_product->name = $request->name;
        // $combo_product->slug = $request->slug;
        $combo_product->price = $request->price;
        $combo_product->short_description = $request->short_description;
        $combo_product->save();

        $notification = trans('admin_validation.Update Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.combo-product.index')->with($notification);
    }
    
    public function test_slug(Request $request) {
        $name = $request->name;
        $query = Product::query();
        if (!empty($name)) {
            $query->where(function ($row) use ($name) {
                
                $row->where('name', "=" , $name);
            });
        }
        
        $data = $query->get();
        
        if(count($data)) {
            return response()->json([
                'status' => true,
                'msg' => 'Name already exists'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => ''
            ]);
        }
        
       
    }

    public function deleteAllProduct(){
      if(!auth()->user()->can('admin.deleteAllOrder')){
            abort(403, 'Unauthorized action.');
        }
        DB::beginTransaction();
        try {
            $products=DB::table('products')->select('id')->whereIn('id', request('product_ids'))->get();

            foreach ($products as $key => $value) {
                $product=Product::find($value->id);
                $id=$value->id;

                $gallery = $product->gallery;
                $old_thumbnail = $product->thumb_image;
                $product->delete();
                if($old_thumbnail){
                    if(File::exists(public_path().'/'.$old_thumbnail))unlink(public_path().'/'.$old_thumbnail);
                }
                foreach($gallery as $image){
                    $old_image = $image->image;
                    $image->delete();
                    if($old_image){
                        if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
                    }
                }
                ProductVariant::where('product_id',$id)->delete();
                ProductVariantItem::where('product_id',$id)->delete();
                FlashSaleProduct::where('product_id',$id)->delete();
                ProductReport::where('product_id',$id)->delete();
                ProductReview::where('product_id',$id)->delete();
                ProductSpecification::where('product_id',$id)->delete();
                Wishlist::where('product_id',$id)->delete();
                $cartProducts = ShoppingCart::where('product_id',$id)->get();
                foreach($cartProducts as $cartProduct){
                    ShoppingCartVariant::where('shopping_cart_id', $cartProduct->id)->delete();
                    $cartProduct->delete();
                }
                CompareProduct::where('product_id',$id)->delete();

                // if($item->orderProducts()->count()){
                //     $item->orderProducts()->delete();
                // }
                // $item->delete();
            }
            DB::commit();
            return response()->json(['status'=>true ,'msg'=>'Product Is Deleted!!']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status'=>false ,'msg'=>$e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        
        if(!auth()->user()->can('product.destroy')){
            abort(403, 'Unauthorized action.');
        }

        $combo_product = ComboProduct::find($id);
        $old_thumbnail = $combo_product->image;
        $combo_product->delete();
        if($old_thumbnail){
            if(File::exists(public_path().'/'.$old_thumbnail))unlink(public_path().'/'.$old_thumbnail);
        }

        $notification = trans('admin_validation.Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.combo-product.index')->with($notification);
    }

    public function changeStatus($id){
      if(!auth()->user()->can('product.changeStatus')){
            abort(403, 'Unauthorized action.');
        }
        $product = Product::find($id);
        if($product->is_recommended == 1){
            $product->is_recommended = 0;
            $product->save();
            $message = trans('admin_validation.InActive Successfully');
        }else{

            $product->is_recommended = 1;
            $product->save();
            $message = trans('admin_validation.Active Successfully');
        }
        return response()->json($message);
    }
    
    public function change_Status($id){
      if(!auth()->user()->can('product.changeStatus')){
            abort(403, 'Unauthorized action.');
        }
        $product = Product::find($id);
        if($product->status == 1){
            $product->status = 0;
            $product->save();
            $message = trans('admin_validation.InActive Successfully');
        }else{

            $product->status = 1;
            $product->save();
            $message = trans('admin_validation.Active Successfully');
        }
        return response()->json($message);
    }

    public function productApproved($id){



        $product = Product::find($id);
        if($product->approve_by_admin == 1){
            $product->approve_by_admin = 0;
            $product->save();
            $message = trans('admin_validation.Reject Successfully');
        }else{
            $product->approve_by_admin = 1;
            $product->save();
            $message = trans('admin_validation.Approved Successfully');
        }
        return response()->json($message);
    }



    public function removedProductExistSpecification($id){
        $productSpecification = ProductSpecification::find($id);
        $productSpecification->delete();
        $message = trans('admin_validation.Removed Successfully');
        return response()->json($message);
    }

    public function fshippingdestroy(Request $request) {
        $product = Product::find($request->product_id);
        $data=[
             'is_free_shipping'=> null
        ];
        $product->update($data);
        return response()->json(['status'=>true ,'msg'=>'Free Shipping Is Deleted !!']);
    }


    public function free_shipping()
    {
      if(!auth()->user()->can('product.free-shipping')){
            abort(403, 'Unauthorized action.');
        }

        $items=Product::whereNotNull('is_free_shipping')->paginate(30);
        return view('admin.free_shipping.index', compact('items'));
    }

    public function create_free_shipping() {
        return view('admin.free_shipping.create_free_shipping');
    }

    public function store_free_shipping(Request $request) {
      if(!auth()->user()->can('product.free-shipping-store')){
            abort(403, 'Unauthorized action.');
        }

        if (isset($request->product_id)) {

            foreach ($request->product_id as $key => $product_id) {
                $product=Product::find($product_id);
                $data=[
                        'is_free_shipping'=>1
                ];
                $product->update($data);
            }
        }

        $notification = trans('admin_validation.Free Shipping Added Successfully !!');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.free_shipping')->with($notification);
    }

    public function getDiscountProduct(Request $request){

        $data = Product::select("name as value", "id")
                    ->where('name', 'LIKE', '%'. $request->get('search'). '%')
                    ->get();

        return response()->json($data);

    }

    public function productEntry2(Request $request){

        $product = Product::select("*")
                    ->where('id',$request->get('product_id'))
                    ->get();

        if ($product) {
            $html='';
            foreach ($product as $key => $item) {
               $html.='<tr>
                        <td>'.$item->name.'</td>
                        <td>'.$item->category->name.'</td>
                        <td class="sell_price">'.$item->price.'</td>

                        <td>
                            <input type="hidden" name="product_id[]" value="'.$item->id.'">
                        </td>

                        <td>
                            <a class="remove action-icon"> <i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>';
            }
            return response()->json(['data'=>$html]);

        }else{
            return response()->json(['data'=>'']);
        }
    }

    public function productEntry(Request $request){

        $product = Product::select("*")
                    ->where('id',$request->get('product_id'))
                    ->get();

        if ($product) {
            $html='';
            foreach ($product as $key => $item) {
               $html.='<tr>
                        <td>'.$item->name.'</td>
                        <td>'.$item->category->name.'</td>
                        <td class="sell_price">'.$item->price.'</td>

                        <td>
                            <select class="form-control dicount_type" name="dicount_type[]">
                                <option value="fixed">Fixed</option>
                                <option value="percentage">Percentage</option>
                            </select>
                        </td>
                        <td>
                            <input type="number" step="any" name="dicount_amount[]" class="form-control dicount_amount" value="0">
                            <input type="hidden" name="product_id[]" value="'.$item->id.'">
                        </td>

                        <td>
                            <input type="number" step="any" name="after_discount[]" class="form-control after_discount" value="0">
                        </td>

                        <td>
                            <a class="remove action-icon"> Delete</a>
                        </td>
                    </tr>';
            }
            return response()->json(['data'=>$html]);

        }else{
            return response()->json(['data'=>'']);
        }
    }

    public function get_variant_price(Request $request) {
        $size_id = $request->size_id;
        $size_data = Size::where('id', $size_id)->first();
        $size_name = $size_data->title;
        $pro_id = $request->pro_id;
        $data = ProductVariant::where('product_id', $pro_id)->where('size_id', $size_id)->first();
        $price = $data->sell_price;
        return response()->json([
            'status' => true,
            'size_name' => $size_name,
            'price'  => $price
        ]);
    }

    public function updateFacebookPixel(Request $request){

        $rules = [
            'allow_facebook_pixel' => '',
            'app_id' => $request->allow_facebook_pixel ?  '' : '',
        ];
        $customMessages = [
            // 'app_id.required' => trans('admin_validation.App id is required'),
        ];
        $this->validate($request, $rules,$customMessages);




        $facebookPixel = FacebookPixel::first();
        $facebookPixel->app_id = $request->app_id;
        $facebookPixel->status = $request->allow_facebook_pixel ? 1 : 0;
        $facebookPixel->save();

        $notification = trans('admin_validation.Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function updateGoogleAnalytic(Request $request){
        $rules = [
            'allow' => '',
            'analytic_id' => $request->allow == 1 ?  '' : ''
        ];
        $customMessages = [
            // 'allow.required' => trans('admin_validation.Allow is required'),
            // 'analytic_id.required' => trans('admin_validation.Analytic id is required'),
        ];

        $this->validate($request, $rules,$customMessages);
        $googleAnalytic = GoogleAnalytic::first();
        $googleAnalytic->status = $request->allow;
        $googleAnalytic->analytic_id = $request->analytic_id;
        $googleAnalytic->save();

        $notification = trans('admin_validation.Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function updateSitePixel(Request $request){

        $rules = [
            'status' => '',
            'pixel_id' => $request->pixel_id ?  '' : '',
        ];
        $customMessages = [
            // 'pixel_id.required' => trans('admin_validation.pixel_id id is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $sitePixel = SitePixel::first();
        $sitePixel->pixel_id = $request->pixel_id;
        $sitePixel->status = $request->allow_facebook_pixel ? 1 : 0;
        $sitePixel->save();

        $notification = trans('admin_validation.Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    
    public function updatePriority(Request $request, $id)
        {
            try {
                $product = Product::findOrFail($id);
                $product->priority = $request->input('priority');
                $product->save();
        
                \Log::info('Product ID: ' . $id . ' Priority: ' . $request->input('priority'));
        
                return response()->json(['message' => 'Priority updated successfully']);
            } catch (\Exception $e) {
                \Log::error('Error updating priority: ' . $e->getMessage());
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
        
        
        public function product_serial(){
            $panddingItem = Product::where('status',0)->orderBy('priority')->get();
    	$completeItem = Product::where('status',1)->orderBy('priority')->get();

    	return view('admin.product_serial',compact('panddingItem','completeItem'));
        }

    public function check_qty(Request $request) {
        $product_id = $request->pro_id;
        $stock_details = ProductStock::where('product_id', $request->product_id)->where('size_id', $request->size_id)->where('color_id', $request->color_id)->first();
        $stock_qty = $stock_details->quantity;
        
        return response()->json([
            'success'  => true,
            'stock_qty' => $stock_qty    
        ]);
    }  
    
    public function wholesale_price_list(Request $request){
        $categories = Category::all();
        return view('admin.product.wholesale_price_list', compact('categories'));
    }
    
    public function retrive_wholesale_price($category_id){
        $retrieve_data = Product::where('category_id', $category_id)->get();
        $retrieve_price = view('admin.product.retrieve_wholesale_data', compact('retrieve_data'))->render();
        
        return response()->json([
            'success' => true,
            'retrieve_price' => $retrieve_price
        ]);
    }

}
