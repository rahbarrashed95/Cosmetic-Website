
<div class="bg-gradient container-fluid" style="background: #F3F3F3 !important;margin-bottom: 10px;">
    <div class="col-12 product-header">
        <div class="section_title text-light">
            <a href="" style="color: #218A41;"> <h2 class="p-1 m-0 prodCatcus" style="text-align:center">
               <span style="width: auto;color: #000;"><strong>Discover Our Best Combo</strong></span></h2> 
            </a>
        </div>
    </div>
</div>
    
<div class="container-fluid">
        <div class="product-box">
            <div class="owl-carousel slider_combo_product"> 
                @foreach ($combo_products as $key => $product)
                <div class="product-item" style="border: none;">
                    <div class="product_thumb bg-white prd_img" style="">
                        @if(!empty($product->image))
                        <a class="primary_img " href="{{ route('front.product.combo-product', [ $product->slug ] ) }}">
                            <img src="{{ asset($product->image) }}" class="primcusImg" alt="">
                        </a>
                        @endif
                        
                    </div>
                    <div class="product_content " style="border-top:3px solid #EDEDEF; margin-top: 10%;background: none;">
                        <div class="subText" data-reactid=".1n7kkwy0qp6.b.2.0.0.0.0.2.5.1.0:$14822_Grocery.0.2.3">
                            
                        </div>
                        <div class="rounded-0 p-2 d-flex justify-content-between">
         					
     					    @if(!empty($product->id))
                            <a href="{{ route('front.product.combo-product', [ $product->slug ] ) }}"
                                   style=" color: white;font-size: 14px;background: #000;border: solid;width: 100%;padding-top: 2%;padding: 4%;"
                                   class="btn btn-sm btn-warning semi"
                                   data-price="{{ $product->price }}"
                                   data-productid="{{ $product->id }}"
                                   data-url="{{ route('front.cart.store') }}">
                                   {{ \Illuminate\Support\Str::limit($product->name, 35)}}
                            </a>
                            @endif
                                
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
   
<!-- Product Sliders Start  -->