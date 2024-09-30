<?php
use App\Models\Category;
use App\Models\PopularCategory;
use App\Models\FeaturedCategory;
use App\Models\Setting;
use App\Models\Brand;
use App\Models\Footer;
use App\Models\FooterSocialLink;
use App\Models\AboutUs;

function custom_sanitize($content)
{
    $replace = array('<p>', '</p>');
    $response = str_replace($replace, '', $content);
    return $response;
}

function getOrderStatus($type=""){

    if($type != "")
      {
       return [''=> 'All', '0'=>'Pending','1'=>'Process','2'=>'Courier','5'=>'On Hold','3'=>'Complete','4'=>'Cancelled','6' => 'Return']; 
      }
    
      return ['0'=>'Pending','1'=>'Process','2'=>'Courier','5'=>'On Hold','3'=>'Complete','4'=>'Cancelled','6' => 'Return'];
  
  }
  
  function aboutUs(){
      $about = AboutUs::first();
      return $about;
  }
  

function categories()
{
    $categories = Category::with('activeSubCategories')->where('status', 1)->orderBy('serial', 'ASC')->limit(12)->latest()->get();

    return $categories;
}

function featuredCategories()
{
    $feateuredCategories = FeaturedCategory::with('category')->orderBy('serial', 'ASC')->get();

    return $feateuredCategories;
}

function popularCategories()
{
    $popularCategories = PopularCategory::with('category')->orderBy('serial', 'ASC')->get();
    return $popularCategories;
}

function footer_social(){
    $facebook = FooterSocialLink::where('id', '2')->pluck('link')->first();
    $whatsapp = FooterSocialLink::where('id', '5')->pluck('link')->first();
    
    return ['facebook' => $facebook, 'whatsapp' => $whatsapp];
}

function siteInfo()
{
    $setting = Setting::first();

    return $setting;
}

function footerInfo(){
    $footer = Footer::first();
    return $footer;
}

function calculateDiscountPercent($product)
{
    if(!empty($product->offer_price) && $product->price > $product->offer_price)
    {
        return (int) ( ( ($product->price - $product->offer_price) / $product->price) * 100 );
    }

    return 0;
}



function cartPcItems()
{
    $cart = session()->get('cartPc', []);

    return $cart;
}

function cartItems()
{
    $cart = session()->get('cart', []);

    return $cart;
}

function getCartProductArray(){
    $carts = session()->get('cart', []);
    $product_id=[];
    foreach($carts as $key=>$cart){
        $product_id[]=$key;
        
    }

    return $product_id;
}


function totalCartItems()
{
    $cart = cartItems();

    return count($cart);
}

function cartPcTotalAmount()
{
    $cartPc = session()->get('cartPc',[]);
    $total = 0;
    $total_qty = 0;
    foreach($cartPc as $key => $item)
    {
        $total += ($item['price'] * $item['quantity']);
        $total_qty += $item['quantity'];
    }

    return ['total_qty' => $total_qty, 'total'=> $total];
}

function convertNumberToWords($number) {
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'forty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );
    
    if (!is_numeric($number)) {
        return false;
    }
    
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convertNumberToWords only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }
    
    if ($number < 0) {
        return $negative . convertNumberToWords(abs($number));
    }
    
    $string = $fraction = null;
    
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
    
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convertNumberToWords($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convertNumberToWords($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convertNumberToWords($remainder);
            }
            break;
    }
    
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
    
    return $string;
}

function cartTotalAmount()
{
    $cart = cartItems();
    $total = 0;
    $total_qty = 0;
    foreach($cart as $key => $item)
    {
        $total += (int) ($item['price']) * (int) ($item['quantity']);
        $total_qty += $item['quantity'];
    }

    return ['total_qty' => $total_qty, 'total'=> $total];
}

function comboCartTotalAmount()
{
    $cart = session()->get('combo_cart', []);
    $total = 0;
    $total_qty = 0;
    foreach($cart as $key => $item)
    {
        $total += ($item['price'] * $item['quantity']);
        $total_qty += $item['quantity'];
    }

    return ['total_qty' => $total_qty, 'total'=> $total];
}

function getProductInfo($product){

    
	$price=($product->offer_price  > 0) ? $product->offer_price : $product->price;
// 	$discount_amount=$product->dicount_amount;
	
// 	$old_price=($product->offer_price > 0) ? $product->sell_price : $product->regular_price;
	$old_price=$product->price;

	return ['price'=>$price,'old_price'=>$old_price];
}

function brands()
{
    $brands = Brand::with('products')->where('status', 1)->get();
    
    return $brands;
}

function getImage($folder=null,$value=null){

	$url = asset('images/no_found.png');
	$path = public_path($folder.'/'.$value);
	if (!empty($folder) && (!empty($value))) {
		if(file_exists($path)){
			$url = asset($folder.'/'.$value);
		}
	}
	return $url;
}


function deleteImage($folder=null, $file=null){

    if (!empty($folder) && !empty($file)) {
        $path = public_path($folder.'/'.$file);
        $isExists = file_exists($path);
        if ($isExists) {
            unlink($path);
        }
    }
    return true;
}

function BanglaText($index)
{      
  $bangla_text = array(
    "order"                 => "অর্ডার করুন",
    "cart"                  => "কার্টে রাখুন",
    "do_order"              => "অর্ডার করতে ক্লিক করুন",
    'tk'                    => "টাকা",
    "free"                  => "ফ্রি শিপিং",
    "offer"                 => "মেগা অফার",
    "cart_add"              => "কার্টে যোগ করুন",
    "cust_info"             =>"কাস্টমার ইনফরমেশন",
    "instruction"           =>"অর্ডার কনফার্ম করতে আপনার নাম, ঠিকানা, মোবাইল নাম্বার লিখে অর্ডার কনফার্ম করুন বাটনে ক্লিক করুন",
    "name"                  => "আপনার নাম",
    "placeholder_name"      => "আপনার নাম লিখুন",
    "mobile"                => "আপনার মোবাইল নাম্বার",
    "placeholder_mobile"    => "আপনার  মোবাইল নাম্বার লিখুন",
    "address"               => "আপনার সম্পূর্ন ঠিকানা",
    "placeholder_address"   => "",
    "delivery_zone"         => "ডেলিভারি এলাকা নির্বাচন করুন",
    "confirm_order"         => "অর্ডার কনফার্ম  করুন",
    "order_information"     => "অর্ডার ইনফরমেশন",
    "land_instruction"      => "অর্ডার করতে নিচের ফর্মটি সঠিক তথ্য দিয়ে পূরন করুন",
    "login_account"         => "অ্যাকাউন্ট থাকলে লগিন করুন",
    "coupon_apply"          => "কূপন থাকলে এপ্লাই করুন",
    "order_ensure"          => "১০% শিউর হয়ে অর্ডার করুন",
    "order_ensure"          => "১০০% শিউর হয়ে অর্ডার করুন" 
    );
  return $bangla_text[$index]; 
}
function weight_rate($product, $price) {
    $footer = Footer::first();
    $today_currency_rate = (float) $footer->today_currency_rate;
    $gz_weight_rate = (float) $footer->gz_weight_rate;
    $today_weight_rate = (float) $footer->today_weight_rate;
    $location_type = $product->location_type;

    // Determine the weight rate based on location type
    if ($location_type == 'gk') {
        $weight_rate = $gz_weight_rate;
    } else {
        $weight_rate = $today_weight_rate;
    }

    // Typecast to ensure numeric values
    $productPrice = (float) $price;
    $productWeight = (float) $product->weight;
    $my_profit = (float) $product->my_profit;

    // Calculate the ultimate price
    $ultimatePrice = ($productPrice * $today_currency_rate) + ($productWeight * $weight_rate) + $my_profit;

    return $ultimatePrice;
}

