<?php

namespace App\Http\Controllers\WEB\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Certification;
use App\Models\VideoGallery;
use App\Models\Offer;
use App\Models\OfferProduct;
use App\Models\ComboProduct;
use App\Models\Brand;
use App\Models\Blog;
use App\Models\AboutUs;
use App\Models\BlogComment;
use App\Models\ChildCategory;
use App\Models\FlashSaleProduct;
use App\Models\FooterLink;
use App\Models\Footer;
use App\Models\HomeBottomSetting;
use DB;
use App\Models\CustomPage;
use App\Models\Printer;
use App\Models\PrinterType;
use App\Models\PrinterSeries;

class HomeController extends Controller
{
    
    // Is For HomePage
    
    public function index()
    {
        
        $slider = Slider::where('status', 1)->get();
        $home_bottom_settings=HomeBottomSetting::all();
        $home_seo_title = AboutUs::where('id', '1')->pluck('home_seo_title')->first();
        $feateuredCategories = featuredCategories();
        
        $products=Product::all();
        $about = DB::table('about_us')->first();
        $flashSell = FlashSaleProduct::with('product')->limit(10)->where('status', 1)->latest()->get();
        $brands = Brand::where('status', 1)->get();
        $offers = Offer::all();
        $certifications = Certification::all();
        $video_galleries = VideoGallery::all();

        return view('frontend.home.index', compact(
            'slider',
            'feateuredCategories', 
            'products',
            'brands',
            'flashSell',
            'about',
            'home_bottom_settings',
            'home_seo_title',
            'offers',
            'certifications',
            'video_galleries'
        ));
    }
    
    public function showBlogs(){
        $all_blogs = Blog::all();
        return view('frontend.shop.blog', compact('all_blogs'));
    }
    
    public function blogDetails($id){
        $single_blog = Blog::with('admin')->where('id', $id)->first();
        $popular_blogs = Blog::where('IsPopular',1)->get();
        return view('frontend.shop.blogDetails', compact('single_blog','popular_blogs'));
    }
    
    public function blogComment(Request $request){
        
        $blog = new BlogComment();
        
        $blog->blog_id = $request->blog_id;
        $blog->name = $request->name;
        $blog->email = $request->email;
        $blog->comment = $request->comment;
        
        $blog->save();
        
        return response()->json([
            'success' => true    
        ]);
    }
    
    public function showProModal(){
        $productId=request()->productId;
        $product = Product::find($productId);
        $html=view('frontend.partials.commonModal',compact('product'))->render();
        return response()->json(['success'=>true,'html'=>$html]);
    }
    
    public function showProModalCart(){
        $productId=request()->productId;
        $product = Product::find($productId);
        $html=view('frontend.partials.commonModalCart',compact('product'))->render();
        return response()->json(['success'=>true,'html'=>$html]);
    }

    public function subCategoriesByCategory(Request $request)
    {
        if($request->type == 'subcategory')
        {
            $id = Category::whereSlug($request->slug)->first()->id;
            $categories = SubCategory::where(['category_id' => $id])->get();
            if($categories->count() <= 0)
            {
                return redirect()->route('front.shop', ['slug'=> $request->slug ] );
            }

            return view('frontend.category.sub-category', compact('categories'));
        }
        else if($request->type == 'childcategory')
        {
            $id = SubCategory::whereSlug($request->slug)->first()->id;
            $categories = ChildCategory::where(['sub_category_id' => $id])->get();
            if($categories->count() <= 0)
            {
                return redirect()->route('front.shop', ['slug'=> $request->slug ] );
            }

            return view('frontend.category.child-category', compact('categories'));
        }

    }
    
    public function pcsubCategoriesByCategory(Request $request)
    {
        if($request->type == 'subcategory')
        {
            $id = Category::whereSlug($request->slug)->first()->id;
            $categories = SubCategory::where(['category_id' => $id])->get();
            if($categories->count() <= 0)
            {
                return redirect()->route('front.shop', ['slug'=> $request->slug ] );
            }

            return view('frontend.category.sub-category', compact('categories'));
        }
        else if($request->type == 'childcategory')
        {
            $id = SubCategory::whereSlug($request->slug)->first()->id;
            $categories = ChildCategory::where(['sub_category_id' => $id])->get();
            if($categories->count() <= 0)
            {
                return redirect()->route('front.pcshop', ['slug'=> $request->slug ] );
            }

            return view('frontend.category.child-category', compact('categories'));
        }

    }
    
    public function pcshopOld(Request $request, $slug = null)
    {
        
        if($request->ajax()){
            
            $data = null;
            if (!empty($slug)) {
                $data = Category::with('products')->whereSlug($slug)->where('status','1')->first();
               
        
                if (!$data) {
                    $data = SubCategory::with('products')->whereSlug($slug)->first();
                }
        
                if (!$data) {
                    $data = ChildCategory::with('products')->whereSlug($slug)->first();
                }
            }
          
            $query = Product::with(['category', 'subCategory', 'childCategory'])->where('status', 1);
            
            if ($data instanceof Category || $data instanceof SubCategory || $data instanceof ChildCategory) {
                $products = $data->products;
                $query->whereIn('id', $products->pluck('id'));
            } else {
                $query->take(30);
            }
        
            // Apply filters from request
            $brands = $request->get('brands', []);
            $categories = $request->get('categories', []);
            $minPrice = $request->get('minPrice', 0);
            $maxPrice = $request->get('maxPrice', PHP_INT_MAX);
        
            if (!empty($brands)) {
                $query->whereIn('brand_id', $brands);
            }
        
            if (!empty($categories)) {
                $query->whereIn('category_id', $categories);
            }
            
            // if (is_numeric($minPrice)) {
            //     $query->whereRaw('(CASE WHEN offer_price IS NOT NULL AND offer_price > 0 THEN offer_price ELSE price END) >= ?', [$minPrice]);
            // }
            
            // if (is_numeric($maxPrice)) {
            //     $query->whereRaw('(CASE WHEN offer_price IS NOT NULL AND offer_price > 0 THEN offer_price ELSE price END) <= ?', [$maxPrice]);
            // }
        
            // if (is_numeric($minPrice)) {
            //     $query->where('price', '>=', $minPrice);
            // }
        
            // if (is_numeric($maxPrice)) {
            //     $query->where('price', '<=', $maxPrice);
            // }
            
            
            if ($request->filled('minPrice') && $request->filled('maxPrice')) {
                $minPrice = $request->input('minPrice');
                $maxPrice = $request->input('maxPrice');
        
                $query->whereBetween(DB::raw('CASE WHEN offer_price IS NOT NULL AND offer_price > 0 THEN offer_price ELSE price END'), [$minPrice, $maxPrice]);
            }
            
            $filteredProducts = $query->get();
            $filter_products = view('frontend.shop.filterPcProduct', compact('filteredProducts'))->render();
            return response()->json([
                'success'         => true,    
                'filter_products' => $filter_products
            ]);
        }
        
        $brands = Brand::all();
        return view('frontend.shop.pcindex', compact('brands'));
    }
    
    public function pcshop(Request $request, $slug = null)
    {
        
        if($request->ajax()){
            $data = null;
            
            $sub_cat = [];
            $item_description = '';
            
            if (!empty($slug)) {
                
                $data = Category::with('products')->whereSlug($slug)->where('status', 1)->first();
                if($data){
                    $sub_cat = SubCategory::where('category_id', $data->id)->get();
                    $item_description = $data->cat_description;
                }
                
                if (!$data) {
                    $data = SubCategory::with('products')->whereSlug($slug)->first();
                }
        
                if (!$data) {
                    $data = ChildCategory::with('products')->whereSlug($slug)->first();
                }
            }
            
            $query = Product::with(['category', 'subCategory', 'childCategory'])->where('status', 1);
            
            if ($data instanceof Category || $data instanceof SubCategory || $data instanceof ChildCategory) {
                $products = $data->products;
                $query->whereIn('id', $products->pluck('id'));
            } else {
               
            }
        
            // Apply filters from request
            $brands = $request->get('brands', []);
            $categories = $request->get('categories', []);
            $minPrice = $request->get('minPrice', 0);
            $maxPrice = $request->get('maxPrice', PHP_INT_MAX);
            $showNumber = $request->showNumber;
            $sort = $request->orderBy;
            
            if (!empty($brands)) {
                $query->whereIn('brand_id', $brands);
            }
        
            if (!empty($categories)) {
                $query->whereIn('category_id', $categories);
            }
            
            // if (is_numeric($minPrice)) {
            //     $query->whereRaw('(CASE WHEN offer_price IS NOT NULL AND offer_price > 0 THEN offer_price ELSE price END) >= ?', [$minPrice]);
            // }
            
            // if (is_numeric($maxPrice)) {
            //     $query->whereRaw('(CASE WHEN offer_price IS NOT NULL AND offer_price > 0 THEN offer_price ELSE price END) <= ?', [$maxPrice]);
            // }
        
            // if (is_numeric($minPrice)) {
            //     $query->where('price', '>=', $minPrice);
            // }
        
            // if (is_numeric($maxPrice)) {
            //     $query->where('price', '<=', $maxPrice);
            // }
            
            
            // if ($request->filled('minPrice') && $request->filled('maxPrice')) {
            //     $minPrice = $request->input('minPrice');
            //     $maxPrice = $request->input('maxPrice');
        
            //     $query->whereBetween(DB::raw('CASE WHEN offer_price IS NOT NULL AND offer_price > 0 THEN offer_price ELSE price END'), [$minPrice, $maxPrice]);
            // }
         
            if ($sort === 'ASC') {
                $query->orderByRaw('IFNULL(offer_price, price) ASC');
            } elseif ($sort === 'DESC') {
                $query->orderByRaw('IFNULL(offer_price, price) DESC');
            } else {
                $query->orderBy('id', 'DESC');
            }
            
            if ($showNumber) {
                $query->take($showNumber);
            }
            
            $filteredProducts = $query->get();
            $filter_products = view('frontend.shop.filterPcProduct', compact('filteredProducts'))->render();
            // $filter_header = view('frontend.shop.filter_header', compact('sub_cat'))->render();
            // $filter_footer = view('frontend.shop.filter_footer', compact('item_description'))->render();
            $item_name = $data->name;
            $item_seo_name = $data->cat_seo_title;
            return response()->json([
                'success'         => true,    
                'filter_products' => $filter_products,
                // 'filter_header' => $filter_header,
                // 'filter_footer' => $filter_footer,
                'item_name' => $item_name,
                'item_seo_name' => $item_seo_name,
            ]);
        }
        
        $item_seo_name = '';
        $brands = Brand::all();
        return view('frontend.shop.pcindex', compact('brands','item_seo_name'));
    }
    
    
    
    public function shop(Request $request, $slug = null)
    {
        $item_seo_name = '';
        if($request->ajax()){
            
            $data = null;
            $sub_cat = [];
            $item_description = '';
            $short_description = '';
            
            if (!empty($slug)) {
                
                $data = Category::with('products')->whereSlug($slug)->where('status', 1)->first();
                if($data){
                    $sub_cat = SubCategory::where('category_id', $data->id)->get();
                    $item_description = $data->cat_description;
                    $short_description = $data->short_description;
                }
                
                if (!$data) {
                    $data = SubCategory::with('products')->whereSlug($slug)->first();
                    $short_description = $data->short_description;
                }
        
                if (!$data) {
                    $data = ChildCategory::with('products')->whereSlug($slug)->first();
                }
            }
            
            $query = Product::with(['category', 'subCategory', 'childCategory'])->where('status', 1);
            
            if ($data instanceof Category || $data instanceof SubCategory || $data instanceof ChildCategory) {
                $products = $data->products;
                $query->whereIn('id', $products->pluck('id'));
                $query->take(30);
            } else {
                $query->take(30);
            }
        
            // Apply filters from request
            $brands = $request->get('brands', []);
            $categories = $request->get('categories', []);
            $minPrice = $request->get('minPrice', 0);
            $maxPrice = $request->get('maxPrice', PHP_INT_MAX);
            $showNumber = $request->showNumber;
            $sort = $request->orderBy;
        
            if (!empty($categories)) {
                $query->whereIn('category_id', $categories);
            }
           
            if (is_numeric($minPrice)) {
                if($minPrice == 0) {
                    $minPrice = 1;
                }
                $query->where('price', '>=', $minPrice);
            }
        
            if (is_numeric($maxPrice)) {
                $query->where('price', '<=', $maxPrice);
            }
         
            if ($sort === 'ASC') {
                $query->orderByRaw('IFNULL(offer_price, price) ASC');
            } elseif ($sort === 'DESC') {
                $query->orderByRaw('IFNULL(offer_price, price) DESC');
            } else {
                $query->orderBy('id', 'DESC');
            }
            
            if ($showNumber) {
                $query->take($showNumber);
            }
            
            $filteredProducts = $query->get();
            
            $filter_products = view('frontend.shop.filterProduct', compact('filteredProducts'))->render();
            
            $filter_header = view('frontend.shop.filter_header', compact('sub_cat','short_description'))->render();
            $filter_footer = view('frontend.shop.filter_footer', compact('item_description'))->render();
            $item_name = $data->name;
            $item_seo_name = $data->cat_seo_title;
            
            return response()->json([
                'success'         => true,    
                'filter_products' => $filter_products,
                'filter_header' => $filter_header,
                'filter_footer' => $filter_footer,
                'item_name' => $item_name,
                'item_seo_name' => $item_seo_name,
            ]);
        }
        
        $categories = Category::all();
        return view('frontend.shop.index', compact('categories','item_seo_name'));
    } 

    public function shopOld(Request $request, $slug = null)
    {
    $data = null;
    $cat_title = null;

    if (!empty($slug)) {
        $data = Category::with('products')->whereSlug($slug)->first();
        if($data){
            $cat_title = $data->cat_seo_title;
        }
        
        if (!$data) {
            $data = SubCategory::with('products')->whereSlug($slug)->first();
        }

        if (!$data) {
            $data = ChildCategory::with('products')->whereSlug($slug)->first();
        }
    }

    if ($data instanceof Category || $data instanceof SubCategory || $data instanceof ChildCategory) {
        $products = $data->products;
    } else {
        $products = Product::with(['category', 'subCategory', 'childCategory'])->where('status', 1)->take(30)->get();
    }

    // Apply price range filter
    $minPrice = $products->min('price');
    $maxPrice = $products->max('price');

    $minPriceFilter = $request->input('min_price', $minPrice);
    $maxPriceFilter = $request->input('max_price', $maxPrice);

    $filteredProducts = $products->whereBetween('price', [$minPriceFilter, $maxPriceFilter]);

    // Apply availability filter
    $inStock = $request->input('in_stock');
    $outOfStock = $request->input('out_of_stock');

    if ($request->input('in_stock')) {
        $filteredProducts = $filteredProducts->where('qty', '>', 0);
    }

    if ($request->input('out_of_stock')) {
        $filteredProducts = $filteredProducts->where('sold_qty', '==', 'qty');
    }
    
    return view('frontend.shop.index', compact('filteredProducts', 'minPrice', 'maxPrice', 'data', 'cat_title'));
}

    public function mostSellingProducts()
    {
        $products = Product::with(['category', 'subCategory', 'childCategory'])
                            ->leftJoin('order_products as op','products.id','=','op.product_id')
                            ->selectRaw('products.*, COALESCE(sum(op.qty),0) total')
                            ->groupBy('products.id')
                            ->orderBy('total','desc')
                            ->take(50)
                            ->get();

        return view('frontend.shop.most-selling', compact('products'));
    }

     public function flashSellProducts(Request $request)
    {
        $data = null;


    $products = Product::with(['category', 'subCategory', 'childCategory'])->take(30)->get();
       //dd($flashProd);
    // Apply price range filter
       
   $minPrice = $products->min('price');
    $maxPrice = $products->max('price');

    $minPriceFilter = $request->input('min_price', $minPrice);
    $maxPriceFilter = $request->input('max_price', $maxPrice);

    $filteredProducts = $products->whereBetween('price', [$minPriceFilter, $maxPriceFilter]);

    // Apply availability filter
    $inStock = $request->input('in_stock');
    $outOfStock = $request->input('out_of_stock');

    if ($request->input('in_stock')) {
        $filteredProducts = $filteredProducts->where('qty', '>', 0);
    }

    if ($request->input('out_of_stock')) {
        $filteredProducts = $filteredProducts->where('sold_qty', '==', 'qty');
    }

        $flashSell = FlashSaleProduct::with('product')->where('status', 1)->latest()->get();

        return view('frontend.shop.flash-sell', compact('flashSell', 'filteredProducts', 'minPrice', 'maxPrice'));
    }
    
     public function customPages($slug){
        $customPage=CustomPage::where('slug', $slug)->first();
        
        // dd($customPage);
        return view('frontend.pages', compact('customPage'));
    }
    
    public function driverList(){
        $printer_types = PrinterType::all();
        return view('frontend.shop.driver-list', compact('printer_types'));
    }
    
    public function getSeries($type_id){
        
        $printer_series = PrinterSeries::where('type_id', $type_id)->get();
        $series_data = view('frontend.shop.printer_series_name', compact('printer_series'))->render();
        return response()->json([
            'success'     => true,
            'series_data' => $series_data
        ]);
        
    }
    
    public function getPrinter(Request $request){
        $type_id = $request->type_id;
        $series_id = $request->series_id;
        
        $printer_data_name = Printer::with('type','series')->where(['type_id' => $type_id,'series_id' => $series_id])->get();
        $printer_data = view('frontend.shop.printer_name', compact('printer_data_name'))->render();
        return response()->json([
            'success'      => true,
            'printer_data' => $printer_data
        ]);
    }
    
    public function get_popular_products(){
        
        // $popularCats = popularCategories();
        // $popularProducts = [];

        // foreach ($popularCats as $pCats) {
        //     $poProducts = Product::where('category_id', $pCats->category_id)->where('is_recommended', 1)->orderBy("priority", "DESC")->limit(12)->get();
        //     $popularProducts[$pCats->category_id] = $poProducts;
        // }
        
        $popularProducts = Product::where('is_popular','1')->get();
        
        $popular_products = view('frontend.home.get_popular_data', compact('popularProducts'))->render();
        return response()->json([
            'success'           => true,
            'popular_products'  => $popular_products
        ]);
    }
    
    public function get_combo_products(){
        
        $combo_products = ComboProduct::all();
       
        $combo_products_view = view('frontend.home.get_combo_data', compact('combo_products'))->render();
        
        return response()->json([
            'success'           => true,
            'combo_products'  => $combo_products_view
        ]);
    }
    
    public function product_video($id){
        $product_data = Product::find($id);
        $product_video = $product_data->video_link;
        $related_video = [];
        $related_thumb = [];
        $relatedProducts = Product::where('category_id', $product_data->category_id)
                        ->where('id', '<>', $product_data->id)
                        ->get();
        
        foreach($relatedProducts as $rel_pro){
           $related_video[] = $rel_pro->video_link;
           $related_thumb[] = $rel_pro->thumb_image;
        }
        
        $product_video_data = view('frontend.product.product_video', compact('product_video','relatedProducts'))->render();
        return response()->json(['success' => true,'product_video_data' => $product_video_data]);
    }
    
    public function get_product_video(){
        $product_videos = VideoGallery::all();
        $product_video_gallery = view('frontend.home.get_video_galleries', compact('product_videos'))->render();
        return response()->json(['success' => true,'product_video_gallery' => $product_video_gallery]);
    }
    
    public function show_gal($id){
        $product_video = VideoGallery::find($id)->video_url;
        $product_video_gal = view('frontend.home.get_video', compact('product_video'))->render();
        return response()->json(['success' => true,'html' => $product_video_gal]);
    }
    
    public function get_offer_product(Request $request, $offerid){
       
        if($request->ajax()){
        $query = OfferProduct::join('products', 'offer_products.product_id', '=', 'products.id')->where('offer_products.offer_id', $offerid);

        $minPrice = $request->get('minPrice', 0);
        $maxPrice = $request->get('maxPrice', PHP_INT_MAX);
        $showNumber = $request->get('showNumber'); 
        $sort = $request->get('orderBy'); 
        
        // Handle minPrice filtering
        // if (is_numeric($minPrice)) {
        //     if ($minPrice <= 0) {
        //         $minPrice = 1; // Set a minimum price of 1 if provided 0 or negative
        //     }
        //     $query->where('products.price', '>=', $minPrice);
        // }
        
        // Handle maxPrice filtering
        // if (is_numeric($maxPrice)) {
        //     if ($maxPrice < 0) {
        //         $maxPrice = 0; // Optionally handle negative max price
        //     }
        //     $query->where('products.price', '<=', $maxPrice);
        // }
        
        // Sorting the results based on product price
        if ($sort === 'ASC') {
            $query->orderBy('products.price', 'ASC'); // Sort by product price ascending
        } elseif ($sort === 'DESC') {
            $query->orderBy('products.price', 'DESC'); // Sort by product price descending
        } else {
            $query->orderBy('offer_products.id', 'DESC'); // Default sort by OfferProduct ID in descending order
        }
        
        // Limiting the number of results
        
        if ($showNumber && is_numeric($showNumber)) {
            $query->take($showNumber);
        }
        
        // Execute the query
        $filteredProducts = $query->get();
       

            
            $filter_products = view('frontend.offer.filterProduct', compact('filteredProducts'))->render();
            
            return response()->json([
                'success'         => true,    
                'filter_products' => $filter_products
            ]);
        } 
        
        $categories = Category::all();
        return view('frontend.offer.index', compact('categories'));
        
        
    }
    
    public function offer_products(){
        dd('ok');
    }

}
