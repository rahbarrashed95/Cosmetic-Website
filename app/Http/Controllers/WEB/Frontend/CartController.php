<?php

namespace App\Http\Controllers\WEB\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ComboProduct;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\SubCategory;
use App\Models\ProductVariantItem;
use App\Models\FlashSaleProduct;
use App\Models\FlashSale;
use App\Models\Shipping;
use App\Models\PcBuilder;
use App\Models\ProductVariant;
use App\Models\productColorVariation;
use App\Models\ProductStock;
use App\Models\variationStock;
use App\Models\Footer;
use Validator;
use Auth;
use DB;

class CartController extends Controller
{
    public function pc_builder(Request $request) {
        
        $cartsPc = session()->get('cartPc', []);
        $categoryIdsInCart = [];
        foreach ($cartsPc as $cartItem) {
            $categoryIdsInCart[] = $cartItem['category_id'];
        }
        
        $PC_Builder = PcBuilder::with('category', 'sub_category')->orderBy('serial', 'ASC')->latest()->get();
        return view('frontend.pc_builder.index', compact('PC_Builder', 'cartsPc', 'categoryIdsInCart'));
    }
    
    public function pcBuildstore(Request $request)
    {
        $item = Product::findOrFail($request->id);
        $stock = $item->qty - $item->sold_qty;
        $cartPc = session()->get('cartPc', []);
        $cat_data = $item->sub_category_id ? SubCategory::find($item->sub_category_id)->is_single : Category::find($item->category_id)->is_single;
        
        if($cat_data){
            foreach ($cartPc as $key => $cartItem) {
                if ($cartItem['sub_category_id'] == $item->sub_category_id || $cartItem['category_id'] == $item->category_id) {
                    unset($cartPc[$key]);
                    break;
                }
            }
        } 
        
        $price = !empty($item->offer_price) ? $item->offer_price : $item->price;
        $thumbnail_image = 'uploads/custom-images/'.$item->thumb_image;
        $cartPc[$item->id] = [
            'name' => $item->name,
            'is_free_shipping' => $item->is_free_shipping,
            'category_id' => $item->category_id,
            'sub_category_id' => $item->sub_category_id,
            'category_name' => $item->category->name,
            'image' => $thumbnail_image,
            'quantity' => $request->quantity,
            'price' => $price,
            'discount_price'       => (int)$request->retrieve_discount,
            'coupon_name' => '',
            'offer_type' => 0,
            'variation_size' => null,
            'variation' => $request->variation,
            'variation_color' => $request->varColor,
          	'variation_id' => $request->varSize,
          	'size_id' => $request->size_id,
          	'color_id' => $request->color_id,
          	'supplier_id' => $request->supplier_id,
            'variation_size_id' => $request->variation_size_id,
            'variation_color_id' =>$request->variation_color_id,
            'type' => $request->pro_type,
          	'product_id'   => $request->id,
          	'stock_qty'   => $stock,
        ];
        
        session()->put('cartPc', $cartPc);
        return response()->json([
            'status' => true,
            'msg' => 'Product added to cart successfully!',
        ], 200);
    }
    
    public function combo_cart(Request $request)
    {
        
        $item = ComboProduct::find($request->raw_product_id);    
        $cart = session()->get('combo_cart', []);
        
        $productColorPairs = $request->input('product_colors', []);
        
        $cart[$item->id] = [
            'id' => $item->id,
            'name' => $item->name,
            'image' => '',
            'price' => $item->price,
            'variation' => $productColorPairs,
            'quantity' => $request->input('quantity', 1)
        ];

    // foreach ($productColorPairs as $pair) {
       
    //     $item = Product::find($pair['product_id']);
       
    //     if (!$item) {
    //         return response()->json([
    //             'status' => false,
    //             'msg' => 'Product not found.'
    //         ]);
    //     }
        
    //     if ($item->type === 'single') {
            
    //         $cart[$product_variant->id] = [
    //             'id' => $item->id,
    //             'name' => $item->name,
    //             'image' => $product_image,
    //             'price' => $price,
    //             'color_id' => $pair['color_id'],
    //             'size_id' => $request->input('size_id', '1'),
    //             'quantity' => $request->input('quantity', 1),
    //             'stock' => $product_stock_data->quantity
    //         ];
            
    //     } else {
           
    //         $product_variant = ProductVariant::where(['product_id' => $item->id, 'color_id' => $pair['color_id']])->first();
    //         $product_image_data = ProductColorVariation::where(['product_id' => $item->id, 'color_id' => $pair['color_id']])->first();
    //         $product_stock_data = ProductStock::where(['product_id' => $item->id, 'color_id' => $pair['color_id']])->first();
            
    //         if (!$product_variant || !$product_image_data || !$product_stock_data) {
    //             return response()->json([
    //                 'status' => false,
    //                 'msg' => 'Product variant, image, or stock not found for product ID ' . $item->id
    //             ]);
    //         }

    //         $price = $product_variant->sell_price;
    //         $product_image = $product_image_data->var_images;
           
    //         $cart[$product_variant->id] = [
    //             'id' => $item->id,
    //             'name' => $item->name,
    //             'image' => $product_image,
    //             'price' => $price,
    //             'color_id' => $pair['color_id'],
    //             'size_id' => $request->input('size_id', '1'), // Default to '1' if size_id is not provided
    //             'quantity' => $request->input('quantity', 1), // Default to 1 if quantity is not provided
    //             'stock' => $product_stock_data->quantity
    //         ];
            
    //     }
    // }

    
    session()->put('combo_cart', $cart);
   
    return response()->json([
        'status' => true,
        'msg' => 'Added To Cart'
    ]);
}

    
    public function store(Request $request){
        
        $item = Product::find($request->id);
        $cart = session()->get('cart', []);
        
        if($item->type === 'single'){
            
            $stockCheck = (int)$item->qty;
            
           
            $ultimate_stock = $stockCheck - (int)$request->quantity;
           
            if($ultimate_stock != 0) {
                if($ultimate_stock < 0) {
                  return response()->json([
                    'status' => false,
                    'msg' => 'Stock not available!'
                    ], 200); 
                }
            } 
            
           $price = $item->price;    
           $product_image = $item->thumb_image;
           
           $cart[$item->id] = [
                'product_id' => $item->id,
                'name' => $item->name,
                'image' => $product_image,
                'price' => $price,
                'color_id' => '',
                'size_id' => '',
                'quantity' => $request->quantity,
                'stock' => ''
            ];
            
        } else {
            
            $product_stock_data = ProductVariant::where(['product_id' => $item->id, 'color_id' => $request->color_id])->first();
            
            $ultimate_stock = (int) $product_stock_data->quantity - (int) $request->quantity;
           
            if($ultimate_stock != 0) {
                if($ultimate_stock < 0) {
                  return response()->json([
                    'status' => false,
                    'msg' => 'Stock not available!'
                    ], 200); 
                }
            } 
            
            $product_variant = ProductVariant::where(['product_id' => $item->id, 'color_id' => $request->color_id])->first();
            $price = $product_variant->sell_price;
            $product_image = $product_variant->var_image;
            
            $cart[$product_variant->id] = [
                'product_id' => $item->id,
                'name' => $item->name,
                'image' => $product_image,
                'price' => $price,
                'color_id' => $request->color_id,
                'size_id' => '1',
                'quantity' => $request->quantity,
                'stock' => $product_variant->quantity
            ];
            
        }
        
        session()->put('cart', $cart);
        
        return response()->json([
            'status' => true,
            'msg' => 'Added To Cart'
        ]);
        
    }

    public function storeOld(Request $request)
    {
        
        $item = Product::find($request->id);
        $cart = session()->get('cart', []);
        
        $stockCheck = DB::table('product_stocks')->where('color_id', 1)->where('size_id', 1)->where('product_id', $request->id)->first();
        
        $ultimate_stock = $stockCheck->quantity - $request->quantity;
        
        if($ultimate_stock != 0) {
            if($ultimate_stock < 0) {
              return response()->json([
                'status' => false,
                'msg' => 'Stock not available!'
                ], 200); 
            }
        }  
            
        if (isset($cart[$request->id])) {
            
            if($ultimate_stock != 0) {
                
                if($ultimate_stock < 0) {
                    return response()->json([
                    'status' => false,
                    'msg' => 'Stock not available!',
                    ], 200);
                }
                
            } else {
                
                if ($cart[$request->id]['quantity'] > $ultimate_stock) {
                    return response()->json([
                        'status' => false,
                        'msg' => 'Stock not available!',
                    ], 200);
                }
                
                $cart[$request->id]['quantity'] += 1;
                $cart[$request->id]['variation'] = $request->variation;
                $cart[$request->id]['price'] = $selectedVariationPrice ?? $cart[$request->id]['price'];
            }
            
        } else {
            
            $price = $item->offer_price ? $item->offer_price : $item->price;
            $discount_price = $item->price - $item->offer_price;
            $thumbnail_image = 'uploads/custom-images/'.$item->thumb_image;
            
            $cart[$request->id] = [
                'name'             => $item->name,
                'is_free_shipping' => $item->is_free_shipping,
                'category_id'      => $item->category_id,
                'category_name'    => $item->category->name,
                'image'            => $thumbnail_image,
                'quantity'         => $request->quantity,
                'price'            => $price,
                'discount_price'   => (int)$discount_price,
                'coupon_name'      => '',
                'offer_type'       => 0,
              	'supplier_id'      => $item->supplier_id,
                'type'             => $item->pro_type,
              	'product_id'       => $request->id,
              	'stock_qty'        => $stockCheck->quantity,
            ];
            
        }

        session()->put('cart', $cart);
        
        return response()->json([
            'status' => true,
            'msg' => 'Product added to cart successfully!',
        ], 200);
    }
    
    
    public function printPcBuilder(){
        return view('frontend.shop.print');
    }
   
     public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $quantity = $request->input('quantity');
            // Perform validation if needed, e.g., check stock availability

            $cart[$id]['quantity'] = $quantity;
            session()->put('cart', $cart);

            $totalAmount = $this->calculateTotalAmount($cart); // Calculate total amount
            return response()->json([
                'status' => true,
                'msg' => 'Cart item quantity updated successfully!',
                'totalAmount' => $totalAmount, // Return updated total amount
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'Cart item not found!',
            ], 404);
        }
    }
   
    private function calculateTotalAmount($cart)
    {
        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += ($item['price'] * $item['quantity']);
        }
        return $totalAmount;
    }



    public function increaseQty($id)
    {
        $item = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id]))
        {
           $newQty = $cart[$id]['quantity'] + 1;
           if($item->qty < $newQty)
           {
                return response()->json([
                    'status' => false,
                    'msg' => 'Stock not available!'
                    ], 200);
           }

           $cart[$id]['quantity'] =  $newQty;
           session()->put('cart', $cart);

           return response()->json([
               'status' => true,
               'totalItems' => totalCartItems(),
               'msg' => 'Item quantity increased!'
           ], 200);
        }
    }

    public function decreaseQty($id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id]))
        {
            if($cart[$id]['quantity'] == 1)
            {
                unset($cart[$id]);
                session()->put('cart', $cart);
                return response()->json([
                    'status' => true,
                    'totalItems' => totalCartItems(),
                    'msg' => 'Item has been removed!'
                ], 200);
            }
            else {
                $cart[$id]['quantity'] -= 1;
                session()->put('cart', $cart);
                return response()->json([
                    'status' => true,
                    'msg' => 'Item quantity decreased!'
                ], 200);
            }

        }
    }
     
    public function pcdestroy($id)
        {
            $cartPc = session()->get('cartPc', []);
            
            if (isset($cartPc[$id])) {
                unset($cartPc[$id]);
                session()->put('cartPc', $cartPc);
                return response()->json([
                    'status' => true,
                    'totalItems' => totalCartItems(), // Function to calculate total items
                    'msg' => 'Item has been removed!',
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'Item not found!',
                ], 404);
            }
        }
    
    public function destroy($id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id]))
        {
            unset($cart[$id]);
            session()->put('cart', $cart);

            return response()->json([
                'status' => true,
                'totalItems' => totalCartItems(),
                'msg' => 'Item has been removed!',
            ], 200);
        }
    }
    
    public function combo_cart_destroy($id)
    {
        $cart = session()->get('combo_cart', []);
        if(isset($cart[$id]))
        {
            unset($cart[$id]);
            session()->put('combo_cart', $cart);

            return response()->json([
                'status' => true,
                'totalItems' => totalCartItems(),
                'msg' => 'Item has been removed!',
            ], 200);
        }
    }

    public function calculateCartTotal($user, $request_coupon, $request_shipping_method_id)
    {
        $total_price = 0;
        $coupon_price = 0;
        $shipping_fee = 0;
        $productWeight = 0;

        $cart = session()->get('cart', []);

        if (count($cart) == 0) {
            $notification = trans("Your shopping cart is empty");

            return response()->json(["status"=>false, "msg" => $notification]);
        }

        foreach ($cart as $index => $cartProduct) {
            $variantPrice = 0;

            if (!empty($cartProduct['variation'])) {
                    $item = ProductVariantItem::find(
                        $cartProduct['variation']
                    );

                    if ($item) {
                        $variantPrice = $item->price;
                    }
                }

            $product = Product::select(
                "id",
                "price",
                "offer_price",
                "weight"
            )->find($index);

            $price = $product->offer_price
                ? $product->offer_price
                : $product->price;

            $price = $variantPrice > 0 ? $variantPrice : $price;
            $weight = $product->weight;
            $weight = $weight * $cartProduct['quantity'];
            $productWeight += $weight;
            $isFlashSale = FlashSaleProduct::where([
                "product_id" => $product->id,
                "status" => 1,
            ])->first();

            $today = date("Y-m-d H:i:s");

            if ($isFlashSale) {
                $flashSale = FlashSale::first();
                if ($flashSale->status == 1) {
                    if ($today <= $flashSale->end_time) {
                        $offerPrice = ($flashSale->offer / 100) * $price;

                        $price = $price - $offerPrice;
                    }
                }
            }

            $price = $price * $cartProduct['quantity'];
            $total_price += $price;
        }


        // calculate coupon coast

        if ($request_coupon) {
            $coupon = Coupon::where([
                "code" => $request_coupon,
                "status" => 1,
            ])->first();


            if ($coupon) {
                if ($coupon->expired_date >= date("Y-m-d")) {
                    if ($coupon->apply_qty < $coupon->max_quantity) {
                        if ($coupon->offer_type == 1) {
                            $couponAmount = $coupon->discount;

                            $couponAmount =
                                ($couponAmount / 100) * $total_price;
                        } elseif ($coupon->offer_type == 2) {
                            $couponAmount = $coupon->discount;
                        }

                        $coupon_price = $couponAmount;
                        $qty = $coupon->apply_qty;
                        $qty = $qty + 1;
                        $coupon->apply_qty = $qty;
                        $coupon->save();
                    }
                }
            }

        }

        $shipping = Shipping::find($request_shipping_method_id);

        if (!$shipping) {
            return response()->json(
                ["message" => trans("Shipping method not found")],
                403
            );
        }

        if ($shipping->shipping_fee == 0) {
            $shipping_fee = 0;
        } else {
            $shipping_fee = $shipping->shipping_fee;
        }

        $total_price = $total_price - $coupon_price + $shipping_fee;

        $total_price = str_replace(
            ['\'', '"', ",", ";", "<", ">"],
            "",
            $total_price
        );

        $total_price = number_format($total_price, 2, ".", "");

        $arr = [];
        $arr["total_price"] = $total_price;
        $arr["coupon_price"] = $coupon_price;
        $arr["shipping_fee"] = $shipping_fee;
        $arr["shipping"] = $shipping;
        return $arr;
}

    public function applyCoupon(Request $request)
    {
        $data = $request->validate([
            'code' => ['required', 'exists:coupons'],
        ]);

        $shipping_id = $request->shipping_id;

        $coupon = Coupon::where(['code' => $request->code, 'status' => 1])->first();

        if(!$coupon){
            return response()->json([
                'status' => false,
                'msg' => 'Coupon not found!',
            ]);
        }

        if($coupon->expired_date < date('Y-m-d')){
            return response()->json([
                'status' => false,
                'msg' => 'Coupon already expired!',
            ]);
        }

        if($coupon->apply_qty >=  $coupon->max_quantity ){
            $notification = trans('Sorry! You can not apply this coupon');
            return response()->json(['message' => $notification],403);
        }

        $user = Auth::user();

        $total = $this->calculateCartTotal(
            $user,
            $coupon->code,
            $shipping_id
        );

        session()->put('coupon', $coupon);
        return response()->json([
            'status' => true,
            'msg' => 'Coupon has been applied',
            'coupon' => $coupon,
            'total_price' => $total['total_price']
        ]);
    }
}
