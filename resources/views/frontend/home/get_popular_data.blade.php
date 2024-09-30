
<style>
    .colors .color {
        padding: 2px !important;
        border: 1px solid #000 !important;
    }
    .colors .color.active {
        border: 1px solid white !important;
        outline: 2px solid #FEBCC8;
    }
</style>

<div class="bg-gradient container-fluid" style="background: #F3F3F3 !important;margin-bottom: 10px;">
    <div class="col-12 product-header">
        <div class="section_title text-light">
           
            <a href="" style="color: #218A41;"> <h2 class="p-1 m-0 prodCatcus" style="text-align:center"><span style="width: auto;color: #000;">
              <strong> Explore Our Best Product </strong></span></h2> 
            </a>
           
        </div>
    </div>
</div>
   
<div class="container-fluid p-0">
        <div class="product-box">
            <div class="owl-carousel slider_product"> 
                @foreach ($popularProducts as $key => $product)
                <div class="product-item" style="">
                    <div class="product_thumb bg-white prd_img" style="">
                        @if(!empty($product->thumb_image))
                        <a class="primary_img " href="{{ route('front.product.show', [ $product->slug ] ) }}">
                            <img src="{{ asset('public/uploads/product/thumb-small-image/'.$product->thumb_image) }}" class="primcusImg" alt="">
                        </a>
                        <a class="secondary_img " href="{{ route('front.product.show', [ $product->slug ] ) }}"><img src="{{ asset('public/uploads/product/thumb-small-image/'.$product->thumb_image) }}" class="seccusImg" alt=""></a>
                        @endif
                        
                    </div>
                    <div class="product_content " style="border-top:3px solid #EDEDEF; margin-top: 10% ">
                        
                        <h4 class="ps-1" style="height: 35px;text-align: center;">
                            @if(!empty($product->id))
                            <a href="{{ route('front.product.show', [ $product->slug ] ) }}"
                                id="product_show"
                                data-productid="{{ $product->id }}" 
                                data-categoryid="{{ $product->category_id }}"
                                data-productname="{{ $product->name }}"
                                class="font-14 pro_name" style="font-size:14px"> 
                                {{ \Illuminate\Support\Str::limit($product->name, 35)}}
                            </a>
                            @endif
                        </h4>
                        
                        @php
                            $count = count($product->reviews);
                            $average = $product->reviews->average('rating');
                            $fullStars = floor($average);
                            $halfStar = ($average - $fullStars) >= 0.5 ? 1 : 0;
                            $emptyStars = 5 - $fullStars - $halfStar;
                        @endphp
                        
                        @if($product->type!='single')
                        <div class="rating text-center">
                            @for ($i = 0; $i < $fullStars; $i++)
                                <i class="fa-solid fa-star"></i>
                            @endfor
                            @if ($halfStar)
                                <i class="fa-solid fa-star-half"></i>
                            @endif
                            @for ($i = 0; $i < $emptyStars; $i++)
                                <i class="fa-regular fa-star"></i>
                            @endfor
                            ({{ $count }})
                        </div>
                        @else
                        <div class="rating text-center" style="padding: 23px;">
                            @for ($i = 0; $i < $fullStars; $i++)
                                <i class="fa-solid fa-star"></i>
                            @endfor
                            @if ($halfStar)
                                <i class="fa-solid fa-star-half"></i>
                            @endif
                            @for ($i = 0; $i < $emptyStars; $i++)
                                <i class="fa-regular fa-star"></i>
                            @endfor
                            ({{ $count }})
                        </div>
                        @endif
                           
                        <div class="subText" data-reactid=".1n7kkwy0qp6.b.2.0.0.0.0.2.5.1.0:$14822_Grocery.0.2.3">
                            
                        </div>
                        <div class="price_box ps-1 justify-content-center prd_prc_bx" style="">
                            
                            @if(!empty($product->price))
                            <span class="current_price" style="color: #000;">£{{ $product->price }}</span>
                            
                            @endif
                            
                        </div>
                        
                        <div class="colors text-center" id="colors">
                            <input type="hidden" id="color_id" name="color_id" >
                          @foreach($product->variations as $v)
                          @if(!empty($v->color->code))
                          
                          @if($v->quantity == '0')
                         
                          <div class="color" style="background-image: url({{ asset($v->var_image) }});background-position: center;background-size: contain;" 
                            data-proid="{{ $v->product_id }}" data-colorid="{{ $v->color_id }}" data-varcolor="{{ $v->color->name}}"
                             value="{{$v->id}}" data-variationColorId="{{ $v->color_id }}" data-image="{{ asset($v->var_image) }}" data-price="{{ $v->sell_price }}" data-quantity="{{ $v->quantity }}">
                              <i style="color: #000;" class="fa fa-close"></i>
                             <input type="hidden" id="color_value" name="variationColor_id">
                             <input type="hidden" id="variation_color_id" name="variation_color_id">
                          </div>
                          
                          @else 
                          
                          <div class="color" style="background-image: url({{ asset($v->var_image) }});background-position: center;background-size: contain;" data-proid="{{ $v->product_id }}" data-colorid="{{ $v->color_id }}" data-varcolor="{{ $v->color->name}}"
                             value="{{$v->id}}" data-variationColorId="{{ $v->color_id }}" data-image="{{ asset($v->var_image) }}" data-price="{{ $v->sell_price }}" data-quantity="{{ $v->quantity }}">
                              <i style="color: #fff;" class="fa fa-sg"></i>
                          </div>
                          
                          @endif
                          
                          @else
                          Color Not Available
                          @endif
                          @endforeach
                       </div>
                        
                        <div class="rounded-0 p-2 d-flex justify-content-between">
         					@if($product->type == 'single')
         					    @if(!empty($product->id))
                                <a href="#"
                                       style="color: white;font-size: 14px;background: #000;border: solid;width: 100%;padding-top: 2%;padding: 4%;"
                                       class="btn btn-sm btn-warning semi buy-now"
                                       data-price="{{ $product->price }}"
                                       data-productid="{{ $product->id }}"
                                       data-offerprice="{{ $product->offer_price }}"
                                       data-url="{{ route('front.cart.store') }}">
                                       Add To Bag
                                </a>
                                @endif
                               
                            @else 
                            <a href="#"
                                   style="color: white;font-size: 14px;background: #000;border: solid;width: 100%;padding-top: 2%;padding: 4%;"
                                   class="btn btn-sm btn-warning semi buy-now"
                                   data-price="{{ $product->price }}"
                                   data-productid="{{ $product->id }}"
                                   data-offerprice="{{ $product->offer_price }}"
                                   data-url="{{ route('front.cart.store') }}">
                                   Add To Bag
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





<script>
      
        $('.buy-now').on('click', function (e) {
           
           e.preventDefault();
           var productId = $(this).data('productid');
           var proQty = '1';
           let $productItem = $(this).closest('.product-item');
           var color_id = $productItem.find('input#color_id').val();
           var addToCartUrl = $(this).data('url');
           var csrfToken = $('meta[name="csrf-token"]').attr('content');
          
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': csrfToken
               }
           });
         
           $.post(addToCartUrl,
            {
               id              : productId,
               quantity        : proQty,
               color_id        : color_id
            },

           function (response) {

               if(response.status)
                {
                   toastr.success(response.msg);
                   window.location.reload();
                } else {
                    if (response.errors) {
                        for (var field in response.errors) {
                            if (response.errors.hasOwnProperty(field)) {
                                for (var i = 0; i < response.errors[field].length; i++) {
                                    toastr.error(response.errors[field][i]);
                                }
                            }
                        }
                    } else {
                        toastr.error(response.msg || 'An error occurred while processing your request.');
                    }
                }

           });
       });
        
        $('#colors .color').on('click', function() {
          
            let $productItem = $(this).closest('.product-item');
            $productItem.find('.color').removeClass('active');
            
            $(this).addClass('active');
           
            let image = $(this).data('image');
            
            $productItem.find('.primary_img img.primcusImg').attr('src', image);
            
            let price = $(this).data('price');
            $productItem.find('span.current_price').text('£' + price.toLocaleString('en-GB', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
            
            let quantity = $(this).data('quantity');
            let varColor = $(this).data('varcolor');
           
            if (quantity != '0') {
                $productItem.find('#select_color').text('Select Shade: ' + varColor);
                $productItem.find('p.stock_check').text('');
                $productItem.find('span#stock_indicate').text(' In Stock');
                $productItem.find('tr.product-info-group-status').show();
            } else {
                $productItem.find('p.stock_check').text('Stock not available');
                $productItem.find('#select_color').text('');
                $productItem.find('tr.product-info-group-status').hide();
            }
        
            let color_id = $(this).data('colorid');
            $productItem.find('input#color_id').val(color_id);
        });

        
</script>        











