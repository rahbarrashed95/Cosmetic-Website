@php 
    $settings = DB::table('settings')->first();
@endphp
@extends('frontend.app')
@section('title', $settings->site_name)

@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/checkout.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/cart.css') }}">
@endpush
@section('content')

<style>
    .checkout-product-details {
        margin-top: 48px;
    }
    .login_text {
        margin-bottom: 0px !important;
        margin-top: 5px;
        font-family: 'Kalpurush', sans-serif;
        font-size: 16px;
    }
    .name {
        margin-top: 12%;
    }
    .price {
        margin-top: 7%;
    }
    .al_btn {
        margin-top: 0px;
    }
    label {
        font-family: 'Kalpurush', sans-serif;
    }
    .card-header {
        font-family: 'Kalpurush', sans-serif;
    }
    
    #coupon-toggle {
        font-family: 'Kalpurush', sans-serif;
        font-size: 16px;
    }
    .toast-message {
        color: red !important;
    }
    #toast-container {
        background: #032BB9 !important;
        padding: 0px;
    }
    
    @media screen and (max-width: 768px) {
        #order_info {
            order: 2 !important;
        }
        #data_info {
            order: 1 !important;
        }
    }
    
</style>

    <style>
        .container-fluid *{
            font-weight: 600;
        }
    </style>

<div class="main-wrapper">
    <div class="overlay-sidebar"></div>
    <div class="container">
        <section>
            <div class="container-fluid mt-5 mb-5">
                <div class="row flex-lg-row-reverse">
                    <div id="order_info" class="col-lg-6">
                        
                        <div class="card text-center">
  <div class="card-header">
  Order Information
  </div>
  <div class="card-body">
      <div class="table-responsive">
    <table class="table table-bordered">
          <thead>
            <tr>
                <th></th>
                <th scope="col">Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Product Price</th>
                
            </tr>
          </thead>
          <tbody>
              
              
                @php $sub_total = 0; @endphp
                @forelse($cart as $key => $item)
                    <tr>
                        <td>
                            <div class="remove">
                                <button class="btn remove-item" data-id="{{ $key }}">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </td>  
                            
                        <th scope="row">
                            
                            @if($item['color_id'])
                                <img src="{{ asset($item['image']) }}" alt="" class="rounded border" style="height: 60px; width: 60px;">
                            @else
                                <img src="{{ asset('uploads/custom-images/' . $item['image']) }}" alt="" class="rounded border" style="height: 60px; width: 60px;">
                            @endif
                         
                        </th>
                        
                        
                        <td>{{ Str::limit($item['name'], 15) }}</td>
                        <td>
                            <div class="quantity d-flex">
                                <button class="btn rounded-0 border border-muted dec" data-id="{{ $key }}">-</button>
                                <input type="number" style="width: 45px;"  min="1" class="border border-muted text-center rounded-0 quantity-value" value="{{ $item['quantity'] }}" data-id="{{ $key }}" required>
                                <button class="btn rounded-0 border border-muted inc" data-exist_qty="{{ $item['stock'] }}" data-id="{{ $key }}">+</button>
                            </div>
                        </td>
                        <td>{{ number_format((int)$item['price'], 2) }}</td>
                        </tr>
                    @php $sub_total += (int) $item['quantity'] * (int) $item['price']; @endphp
                    @empty
                @endforelse
                
                @php $sub_total = 0; @endphp
                @forelse($comboCart as $key => $item)
                    <tr>
                        <td>
                            <div class="remove">
                                <button class="btn remove-combo-item" data-id="{{ $key }}">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </td>   
                          
                        <th scope="row">
                            
                            @foreach($item['variation'] as $item_data)
                            
                                @php   
                                    $product_id = $item_data['product_id'];
                                    $color_id = $item_data['color_id'];
                                    $product = App\Models\Product::find($product_id);
                                    $var_img = App\Models\ProductVariant::where(['product_id' => $product_id, 'color_id' => $color_id])->first()->var_image;
                                @endphp
                            
                                <img src="{{ asset($var_img) }}" alt="" class="rounded border" style="height: 60px;width: 60px;" width="">
                               
                            @endforeach
                            
                         
                        </th>
                        <td>{{ Str::limit($item['name'], 15) }}</td>
                        <td>
                            <div class="quantity d-flex">
                                <button class="btn rounded-0 border border-muted dec" data-id="{{ $key }}">-</button>
                                <input type="number" style="width: 45px;"  min="1" class="border border-muted text-center rounded-0 quantity-value" value="{{ $item['quantity'] }}" data-id="{{ $key }}" required>
                                <button class="btn rounded-0 border border-muted inc" data-exist_qty="" data-id="{{ $key }}">+</button>
                            </div>
                        </td>
                        <td>{{ $item['price'] }}</td>
                        </tr>
                    @php $sub_total += $item['quantity'] * $item['price']; @endphp
                    @empty
                @endforelse
        
        
        
            <!--<tr>-->
            <!--    <td></td>-->
            <!--    <td></td>-->
                
            <!--    <td></td>-->
            <!--    <td>Subtotal</td>-->
            <!--    <td>{{ $sub_total }} ৳</td>-->
            <!--</tr>-->
            <tr>
                <td></td>
                <td></td>
                <td></td>
                
                <td>Shipping</td>
                <td><p id="shipping_value">0.00 </p></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
               
                <td></td>
                <td>Total</td>
                <td>
                <p id="total_amount">{{ $sub_total }} ৳</p>
                <input type="hidden" name="total_amount" id="total_amount" value="{{ $sub_total }} ৳">
                </td>
            </tr>
          </tbody>
        </table>
    </div>
  </div>
</div>
 </div>
                    
                    
                    
    <div id="data_info" class="col-lg-6">
        <div class="card text-center">
        <div class="card-header">
        <h3 class="bold-9" style="font-size: 16px;font-family: 'Kalpurush', sans-serif;">
            Provive your correct information and click confirm order button 
        </h3>
        </div>
        <div class="card-body">  
            <form action="{{ route('front.checkout.store') }}" method="POST" id="checkoutForm">
                @csrf
              	<input type="hidden" name=""/>

                <div class="row">
                    <div class="col-lg-12 col-12 mb-3 form-floating">
                        <input type="text" class="form-control shadow-none" name="shipping_name" id="name" value="{{ auth()->check() ? auth()->user()->name : '' }}" placeholder="Name">
                        <label for="name" class="ps-4">Your Name <span style="color: red">***</span></label>
                    </div>
                  	<div class="form-group col-sm-12">
                        <input type="hidden" name="ip_address" id="ip_address" value="">
                    </div>
                    <div class="col-lg-12 col-12 mb-3 form-floating">
                        <input type="tel" class="form-control shadow-none" name="order_phone" value="{{ auth()->check() ? auth()->user()->phone : '' }}" id="phone" placeholder="Enter Phone Number" aria-describedby="phone-help">
                        <label for="phone" class="ps-4">Your Mobile <span style="color: red">***</span></label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-12 mb-3 form-floating">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control shadow-none" name="shipping_address" value="{{ auth()->check() ? auth()->user()->address : '' }}" id="address" placeholder="Address">
                            <label for="address">Your Address <span style="color: red">***</span></label>
                        </div>
                    </div>
                </div>
                
                @foreach($shippings as $key=>$shipping)
                    <div class="input-group" style="margin-bottom: 25px;">
                        <input checked type="radio" value="{{ $shipping->id}}" class="charge_radio delivery_charge_id"
                            id="ship_{{ $shipping->id}}" data-shippingid="{{ $shipping->id }}" 
                            name="shipping_method" data-shipmethod="{{ $shipping->shipping_rule}}" data-shipping="{{ $shipping->shipping_fee}}">
                        
                        &nbsp;&nbsp;
                        <label for="ship_{{ $shipping->id}}">{{ $shipping->shipping_rule}} - {{ $setting->currency_icon }} {{ $shipping->shipping_fee }}</label>
                    </div>
                @endforeach

                              
                <input type="hidden" name="total_amount" id="total_amount" value="{{ number_format($sub_total, 2) }}">
                <input type="hidden" name="shipping_method" id="shipping_method">
                <input type="hidden" name="shipping_charge" id="shipping_charge">
                        
                <hr>
                @if($bkash_payment || $ssl_payment)
                    <div class="input-group" style="margin-bottom: 25px;">
                        <label>
                            <input type="radio" name="payment_method" id="payment_method" value="cash_on_delivery" checked> Cash On Delivery
                        </label>
                    </div>
                @else
                  <input type="hidden" name="payment_method" id="payment_method" value="cash_on_delivery">
                @endif
               
                <button type="submit" class="btn bg-blue text-light" style="font-family: 'Kalpurush', sans-serif;width: 100%;height: 50px;font-size: 20px;background: #000 !important;">Confirm Order <i class="fas fa-arrow-right"></i></button>
            </form>
        </div>
        </div>
    </div>
</div>
</section>
</div>
</div>
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script>

fetch('https://api64.ipify.org?format=json')
    .then(response => response.json())
    .then(data => {
        document.getElementById('ip_address').value = data.ip;
    })
    .catch(error => {
        console.error('Error fetching IP address:', error);
    });
</script>

<script>
    $(document).ready(function () {
        getCharge();
        
  		$('.charge_radio').click(function(){
            getCharge();
        });

        function getCharge(){
            var shipping_charge = $('input.charge_radio:checked').data('shipping'); 
            var shipping_method = $('input.charge_radio:checked').data('shipmethod');
            $('input#shipping_method').val(shipping_method);
            $('p#shipping_value').text('£ '+shipping_charge);
            let sub_total = '{{cartTotalAmount()['total']}}';
            let sub_total_combo = '{{comboCartTotalAmount()['total']}}';
            sub_total = Number(sub_total) + Number(sub_total_combo);
            let total=Number(shipping_charge)+Number(sub_total);
            let total_format = total.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            $('p#total_amount').text('£ '+total_format);
            $('input#shipping_charge').val(shipping_charge);
            $('input#total_amount').val(total);
        }
        
        $(document).on('submit', 'form#checkoutForm', function(e){
      	e.preventDefault();
        $('span.error').text('');
        let url = $(this).attr('action');
        let method = $(this).attr('method');
        let data =$(this).serialize();
        $.ajax({
          type:method,
          url:url,
          data:data,
          success: function(res)
          {
            if(res.status)
            {
              toastr.success(res.msg);
              if(res.url)
              {
                document.location.href = res.url;
              }
              else{
                window.location.reload();
              }
            }
            else{
                toastr.error(res.msg);
            }
          },
          error: function(response)
          {
            $.each(response.responseJSON.errors, function(name, error){
              $(document).find('[name='+name+']').closest('div').after('<span class="error text-danger">'+error+'</span>');
              toastr.error(error);
            });
          }
        });
  });
    });
</script>


@endsection
 

