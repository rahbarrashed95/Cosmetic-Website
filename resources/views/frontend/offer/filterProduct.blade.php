
@forelse($filteredProducts as $key => $product)
    <div class="col-md-3 col-sm-4">
        <div class="product-item" style="border-radius: 5px;">
            <div class="product_thumb bg-white prd_img" style="border-top-right-radius: 5px;border-top-left-radius: 5px;">
                <a class="primary_img " href="{{ route('front.product.show', [ $product->slug ] ) }}"><img src="{{ asset('public/uploads/product/thumb-small-image/'.$product->thumb_image) }}" class="primcusImg" alt="" style="width: 100%;"></a>
                <a style="display: none;" class="secondary_img" href="{{ route('front.product.show', [ $product->slug ] ) }}"><img src="{{ asset('public/uploads/product/thumb-small-image/'.$product->thumb_image) }}" class="seccusImg" alt="" style=""></a>
                
                
            </div>
             <div class="product_content " style="border-top:3px solid #EDEDEF; margin-top: 7%;padding: 5px 5px;background-color: #fff;border-radius: 5px;">
                <h4 class="ps-1" style="height: 35px;text-align: center;">
                    <a href="{{ route('front.product.show', [ $product->slug ] ) }}" class="font-14" style="font-size:14px;color: #000;font-weight: 700;"> {{ \Illuminate\Support\Str::limit($product->name, 35)}}</a>
                </h4>
                
                @php
                    $average = $product->reviews ? $product->reviews->average('rating') : 0; // Default to 0 if there are no reviews
                    $fullStars = floor($average);
                    $halfStar = ($average - $fullStars) >= 0.5 ? 1 : 0;
                    $emptyStars = 5 - $fullStars - $halfStar;
                @endphp
                
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
                </div>
                
                <div class="subText" data-reactid=".1n7kkwy0qp6.b.2.0.0.0.0.2.5.1.0:$14822_Grocery.0.2.3">
                    
                </div>
                
                <div class="price_box ps-1 justify-content-center prd_prc_bx" style="">
                            
                    @if(!empty($product->price))
                    <span class="current_price" style="color: #000;">£{{ number_format((float) $product->price, 2) }}</span>
                    
                    @endif
                    
                </div>
                
                <div class="rounded-0 bg-muted p-2 d-flex justify-content-between">
                        
                        @if($product->type == 'variable' || $product->prod_color == 'varcolor') 
                            @if(!empty($product->id))
                                <a type="button"
                                    href="{{ route('front.product.show', [ $product->slug ] ) }}"
                                    style="color: white; font-size: 14px;background: #000;border: solid;width: 100%;padding-top: 4%;"
                                    class="btn" 
                                    data-productid="{{ $product->id }}">
                                    Add To Bag
                                </a>
                            @endif
     					@else
     					
     					    @if(!empty($product->id))
                            <a href="#"
                                   style="color: white; font-size: 14px;background: #000;border: solid;width: 100%;padding-top: 4%;"
                                   class="btn btn-sm btn-warning semi buy-now"
                                   data-price="{{ $product->price }}"
                                   data-productid="{{ $product->id }}"
                                   data-offerprice="{{ $product->offer_price }}"
                                   data-url="{{ route('front.cart.store') }}">
                                   Add To Bag
                            </a>
                            @endif
                            
                        @endif 
                            
                    </div>
                                    
            </div>
        </div>
    </div>

@empty
    <div align="center">
        <strong class="text-center text-danger">No products are available</strong>
    </div>
@endforelse


<script>
    $('.buy-now').on('click', function (e) {
        
        e.preventDefault();
        var productId = $(this).data('productid');
        
        var proQty = 1;
        var addToCartUrl = $(this).data('url');
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var price=Number($(this).data('price'));
        var offerprice=Number($(this).data('offerprice'));
        var retrieve_discount=price-offerprice;
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });
        
        $.post(addToCartUrl, { id: productId, quantity: proQty,retrieve_discount:retrieve_discount }, function (response) {
            
            if(response.status)
            {
                window.location.href = "{{ route('front.checkout.index') }}";
            } else
            {
                 
            }
            
        });
    });
    
    $('.cart-now').on('click', function (e) {
        e.preventDefault();
        
        var productId = $(this).data('productid');
        var proQty = 1;
        var addToCartUrl = $(this).data('url');
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var price=Number($(this).data('price'));
        var offerprice=Number($(this).data('offerprice'));
        var retrieve_discount=price-offerprice;
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });
        
        $.post(addToCartUrl, { id: productId, quantity: proQty,retrieve_discount:retrieve_discount }, function (response) {
            
            if(response.status)
            {
                window.location.reload();
            } else
            {
                 
            }
            
        });
    });
</script>




