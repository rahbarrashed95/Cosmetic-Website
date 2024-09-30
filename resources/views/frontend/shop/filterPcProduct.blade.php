@forelse($filteredProducts as $key => $product)
    <div class="col-md-3 col-sm-4">
        <div class="product-item" style="">
            <div class="product_thumb bg-white prd_img" style="">
                <a class="primary_img " href="{{ route('front.product.show', [ $product->id ] ) }}"><img src="{{ asset('uploads/custom-images2/'.$product->thumb_image) }}" class="primcusImg" alt="" style="width: 100%;"></a>
                <a style="display: none;" class="secondary_img" href="{{ route('front.product.show', [ $product->id ] ) }}"><img src="{{ asset('uploads/custom-images2/'.$product->thumb_image) }}" class="seccusImg" alt="" style=""></a>
                
                @if($product->offer_price > 0)
                <div class="label_product" style="width: 46%;">
                    <span class="label_sale" style="padding-top: 2px;">Mega Offer</span>
                </div>
                @endif
                @if($product->is_free_shipping > 0)
                <div class="label_product" style="width: 46%; background:#3276B1; left: 0%; border-radius: 5px 30px 30px 5px">
                    <span class="label_sale" style="padding-top: 2px;">Free Shipping</span>
                </div>
                @endif
            </div>
             <div class="product_content " style="border-top:3px solid #EDEDEF; margin-top: 10%;padding: 5px 5px;background-color: #fff;">
                <h4 class="ps-1" style="height: 35px;text-align: center;">
                    <a href="{{ route('front.product.show', [ $product->id ] ) }}" class="font-14" style="font-size:14px;color: #000;font-weight: 700;"> {{ \Illuminate\Support\Str::limit($product->name, 35)}}</a>
                </h4>
                <div class="subText" data-reactid=".1n7kkwy0qp6.b.2.0.0.0.0.2.5.1.0:$14822_Grocery.0.2.3">
                    
                </div>
                
                <div class="price_box ps-1 justify-content-center prd_prc_bx" style="text-align: center;">
                    @if(empty($product->offer_price))
                        @if(!empty($product->price))
                        <span class="current_price">{{ weight_rate($product, $product->price)}} Tk</span>
                        @endif
                    @else
                    <span class="current_price">{{ weight_rate($product, $product->offer_price)}} Tk</span>
                    <span class="old_price">{{ weight_rate($product, $product->price)}} Tk</span>
                    @endif
                </div>
                                    
                <div class="rounded-0 bg-muted p-2 d-flex justify-content-between">
                    
                    @if($product->type == 'variable' || $product->prod_color == 'varcolor') 
                        @if(!empty($product->id))
                            <a type="button"
                                href="{{ route('front.showProModal') }}"
                                style="color: white; font-size: 14px;background: #00712D;border: solid;width: 100%;padding-top: 4%;"
                                class="btn productModal" 
                                data-productid="{{ $product->id }}">
                                Add To Pc
                            </a>
                        @endif
 					@else
 					
 					    @if(!empty($product->id))
                        <a href="#"
                               style="color: white; font-size: 14px;background: #00712D;border: solid;width: 100%;padding-top: 4%;"
                               class="btn btn-sm btn-warning semi buy-now"
                               data-price="{{ $product->price }}"
                               data-productid="{{ $product->id }}"
                               data-offerprice="{{ $product->offer_price }}"
                               data-url="{{ route('front.cart.pc.builder.store') }}">
                               Add To Pc
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
                window.location.href = "{{ route('front.cart.pc.builders') }}";
            } else
            {
                 
            }
            
        });
    });
</script>




