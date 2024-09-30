@extends('frontend.app')

@section('title', 'Combo Product')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<link rel="stylesheet" href="{{asset('frontend/assets/css/singleproduct.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('content')

@php
use App\Models\Footer;
@endphp



<style>
    .product-short-info {
    margin-bottom: 0px;
}

.product-info-table tbody {
    display: flex;
    flex-wrap: wrap;
}
    
.product-info-table tbody tr {
    margin: 0 7px 7px -2px;
    background: #fff;
    border-radius: 30px;
    line-height: 30px;
    padding: 0 10px;
    font-size: 14px;
}





@media only screen and (min-width: 320px) and (max-width: 370px) {
   .label_product {
        width: 63% !important;
    } 
}
         
           @media (min-width: 1024px){
             .prodCatcus{
               	  background: rgb(255 153 0);
                  border-radius: 0px;
                  border-top-right-radius: 70px;
                  width: 16%;
                  padding: 0px;
                  margin: 0px;
             	}
             	
               .carousel-item img{
                   height: 535px;
               }
               
               .select2-container--default .select2-selection--single {
                   height: 40px;
               }
               
               .select2-container--default .select2-selection--single .select2-selection__rendered {
                   line-height: 40px;
                   font-size: 13px;
               }
               
               .select2-container--default .select2-selection--single .select2-selection__arrow {
                   top: 7px;
                }
               
               .select2-container{
                   width: 100% !important;
                }
             
             .prd_img{
             	margin-bottom: -20px !important;
             }
           }
           
           
           
           @media only screen and (min-width: 250px) and (max-width: 319px) {
             .prodCatcus{
               	  background: rgb(255 153 0);
                  border-radius: 0px;
                  border-top-right-radius: 70px;
                  width: 24%;
                  padding: 0px;
                  margin: 0px;
             	}
               .col-lg-3 {
                   width: 100% !important;
                    margin-left: 0% !important;
               }
               .col-lg-9 {
                   padding-right: 0px !important;
               }
               .select2-container {
                   width: 70% !important;
               }
               
               .left_side_img img{
                  height: auto !important; 
               }
             
             .left_side_img{
             		display:none
             	}
             
             .prd_img{
             	margin-bottom: -20px !important;
             }
             
             .sidebar-filter{
              	display: none;
              }
               
            }
            
            @media only screen and (min-width: 367px) and (max-width: 385px) {
                .semi {
                    font-size: 13px !important;
                }
            }
            
            @media only screen and (min-width: 328px) and (max-width: 391px) {
                .owl-item .product-item .product_content h4 {
                    line-height: 12px !important;
                    font-size: 0px !important;
                }
                .font-14 {
                    font-size: 11px !important;
                }
                .semi {
                    font-size: 11px !important;
                }
                .product-box .product-item .product_content .price_box span.current_price {
                    font-size: 13px !important;
                }
            }
           
           
           @media only screen and (min-width: 320px) and (max-width: 375px) {
               
             .prodCatcus{
               	  background: rgb(255 153 0);
                  border-radius: 0px;
                  border-top-right-radius: 70px;
                  width: 56%;
                  padding: 0px;
                  margin: 0px;
             	}
               .col-lg-3 {
                   width: 100% !important;
                    margin-left: 0% !important;
               }
               .select2-container {
                   width: 70% !important;
               }
               .left_side_img img{
                  height: auto !important; 
               }
             .primcusImg{
             	margin-left: 0% !important;
             }
             
             .seccusImg{
             	margin-left: 0% !important;
             }
             .bg-orange{
             		width: 40% !important;
               		height: 33px !important;
               		font-size: 12px !important;
             	}
             .slick-next .slick-arrow {
             	margin-top : -14px !important;
             	}
             	
             	.product_content {
             	    margin-top: 1% !important;
             	}
             
             header img {
                  height: 70px;
                  width: 220px;
                  padding-left: 0;
              }
             
             .left_side_img{
             		display:none
             	}
             
             .sidebar-filter{
              	display: none;
              }
              
              .semi {
                  font-size: 11px !important;
              }
              
              .product-box .product-item .product_content .price_box span.current_price {
             	    font-size: 13px !important;
             	}
             	
             	.product-box .product-item .product_content h4 {
             	    min-height: 70px !important;
             	}
             
            }
            @media only screen and (min-width: 376px) and (max-width: 450px) {
            
                .product_content {
                    margin-top: 6% !important;
                }
                
              .prodCatcus{
               	  background: rgb(255 153 0);
                  border-radius: 0px;
                  border-top-right-radius: 70px;
                  width: 56%;
                  padding: 0px;
                  margin: 0px;
             	}
                .col-lg-3 {
                   width: 100% !important;
                    margin-left: 0% !important;
               }
               /*.col-lg-9 {*/
               /*    padding-right: 0px !important;*/
               /*}*/
               .select2-container {
                   width: 70% !important;
               }
               .left_side_img img{
                  height: auto !important; 
               }
              
              .prd_prc_bx{
              	margin-top: 0%;
              }
              
              .left_side_img{
             		display:none
             	}
              
              .prd_img{
             	margin-bottom: -20px !important;
             }
              
              .primcusImg{
              		margin-left: 0%;
              }
              
              .sidebar-filter{
              	display: none;
              }
              
            }
            
            @media only screen and (min-width: 451px) and (max-width: 575px) {
                .product_content {
                    margin-top: 1% !important;
                }
            }
         
         	 @media only screen and (min-width: 376px) and (max-width: 379px) {
            
               .primcusImg{
               			margin-left: 0%;
               }
               
               .sidebar-filter{
              	display: none;
              }
         	}
         
         @media only screen and (min-width: 768px) and (max-width: 900px) {
            
               .primcusImg{
               			/*margin-left: 15%;*/
               }
           
           		.sidebar-filter{
              	display: none;
              }
         	}
         
         
            
             @media only screen and (min-width: 576px) and (max-width: 991px) {
               .prodCatcus{
               	  background: rgb(255 153 0);
                  border-radius: 0px;
                  border-top-right-radius: 70px;
                  width: 24%;
                  padding: 0px;
                  margin: 0px;
             	}
               
                 .col-lg-3 {
                   width: 100% !important;
                    margin-left: 0% !important;
               }
               /*.col-lg-9 {*/
               /*    padding-right: 0px !important;*/
               /*}*/
               .select2-container {
                   width: 60% !important;
               }
               .left_side_img img{
                  height: auto !important; 
               }
               
               .prd_img{
             	margin-bottom: -20px !important;
             }
               
               .sidebar-filter{
              	display: none;
              }
               
               .primcusImg{
              	/*margin-left: 25% ;	*/
              }
               
             }
            
            @media only screen and (min-width: 992px) and (max-width: 1348px) {
              .prodCatcus{
               	  background: rgb(255 153 0);
                  border-radius: 0px;
                  border-top-right-radius: 70px;
                  width: 24%;
                  padding: 0px;
                  margin: 0px;
             	}
              
                .col-lg-3 {
                   width: 24% !important;
                   margin-left: 1% !important;
               }
               .col-lg-9 {
                   width: 75% !important;
                   padding-right: 0px !important;
               }
            }
            
    
    		@media only screen and (min-width: 376px) and (max-width: 575px) {
              .primcusImg{
              	/*margin-left: 15%;	*/
              }
              .sidebar-filter{
              	display: none;
              }
    		}
            
            @media only screen and (min-width: 378px) and (max-width: 412px) {
                .bg-orange{
                    font-size: 8px !important;
                }     
              
                .prd_prc_bx{
              		padding-bottom: 6px !important;
                	margin-top:0% !important;
                 }
              
            }
            
            .product-item {
                transition: box-shadow 0.5s !important;
                border: 1px solid lightgray;
            }
            
            .product-item:hover {
                box-shadow: 0px 2px 13px -3px gray !important;
            }
            
            @media only screen and (min-width: 1084px) and (max-width: 1141px) {
                .product_content a {
                    font-size: 14px !important;
                }
            }
            
             @media only screen and (min-width: 992px) and (max-width: 1083px) {
                .product_content a {
                    font-size: 12px !important;
                }
            }
            
            @media only screen and (min-width: 768px) and (max-width: 856px) {
                .product_content a {
                    font-size: 13px !important;
                }
            }
            
            @media only screen and (min-width: 576px) and (max-width: 643px) {
                .product_content a {
                    font-size: 13px !important;
                }
            }
            
            @media only screen and (min-width: 367px) and  (max-width: 575px) {
                .col-md-3 {
                    /*width: 100% !important;*/
                }
                .buy-now {
                    padding: 5% !important;
                }
                .testslide-image img {
                    margin: 0 auto;
                }
                .thumbnail-container {
                    margin-left: 7% !important;
                }
            }
            
            @media only screen and (min-width: 1500px) and (max-width: 2000px) {
        .main-section {
            width: 1500px !important;
        }
    }
    
    @media only screen and (min-width: 2001px) and (max-width: 2600px) {
        .main-section {
            width: 1500px !important;
        }
    }
            
    .product-box .product-item {
        margin: 0 !important;
        margin-bottom: 20px !important;
    }
       
   .slick-arrow {
   display: none !important;
   }
   /*p img{*/
   /*width: 100%*/
   /*}*/
   #myTabs li a {
   padding: 8px 9px;
   }
   #myTabs li {
   padding: 2px;
   }

   /* Styles for the slider container */
   .slider-container {
   width: 100%;
   overflow: hidden;
   position: relative;

   }
   /* Styles for the big image */
   .slider-image {
    width: 88%;
    height: auto;
    display: block;
   }
   /* Styles for the mini image thumbnails */
   .thumbnail-container {
        justify-content: center;
        width: 93%;
   }
   .thumbnail {
   width: 50px;
   height: 50px;
   margin: 5px;
   cursor: pointer;
   }

   iframe{
       width: 100%;
   }

   @media only screen and (min-width: 320px) and (max-width: 375px) {
       iframe {
           width: 100% !important;
           height: 220px !important;
       }
   }

   @media only screen and (min-width: 376px) and (max-width: 425px) {
       iframe {
           width: 100% !important;
           height: 250px !important;
       }
   }

   @media only screen and (min-width: 426px) and (max-width: 500px) {
       iframe {
           width: 100% !important;
           height: 260px !important;
       }
   }

   .testslide-image {
       margin-left: 10px;
       margin-top: 10px;
   }

   .img-thumbnail:hover {
       box-shadow: 0px 0px 10px -4px green !important;
   }
   .img-thumbnail {
       box-shadow: 0px 0px 10px -4px gray !important;
   }
   .testslide-image img {
       box-shadow: 3px 4px 13px -3px gray !important;
   }
   .testslide-image img:hover {
       box-shadow: 0px 2px 13px -3px green !important;
   }

   .accordion-body .btn-info {
       background: #1F8C40 !important;
   }
     
     
     
     
     @media only screen and (max-width: 575px) {
     .social_btn {
     display: inline-grid !important;
     width: 100% !important;
     }
     .add_cart{
         width: 100% !important;
         margin-bottom: 3% !important;
         padding: 5% !important;
     }
     .buy_now {
     width: 100% !important;
     }
     }

    .toast-message {
        color: #ffffff !important;
    }
    #toast-container {
        background: #032BB9 !important;
        padding: 0px;
    }

    #toast-container>.toast-error {
        background-color: transparent !important;
    }

         
    @media(min-width: 1360px){
    .popup-link img{
    /*max-height: 450px;*/
    /*margin: auto;*/
    }
    }
    .product-slider-nav .slick-slide img{
    max-height: 80px;
    margin:auto;
    }
    .regular ul {
    list-style: none;
    padding-left: 0px !important;
    }
    .regular ul li {
    padding-left: 0px !important;
    line-height: 1.5;
    }
    .regular ul li::before {
    content: "";
    display: inline-block;
    width: 15px;
    height: 15px;
    background-image: url({{ asset('frontend/images/star.png') }});
    background-size: cover;
    background-repeat: no-repeat;
    margin-right: 10px;
    }

.ytp-large-play-button {
    width: 0px !important;
}

.slider-container iframe {
    width: 50px !important;
    height: 50px !important;
    margin: 5px;
}
#video_lnk i {
    position: absolute;
    left: 18px;
    top: 101px;
    color: red;
    font-size: 24px;
    opacity: 0.8;
}

</style>


<div class="main-wrapper">
   <div class="overlay-sidebar"></div>
   <div class="product-page bg-light col-lg-12 col-12 p-0 m-auto mt-2 mb-2">
      <div class="row p-lg-3" style="border-bottom: 3px solid #cce0e5">
         <div class="col-lg-5 col-md-6 col-12">
            <div class="slider-container">
               <!-- Big Image -->
               
               <div class="row">
                   <div class="col-md-2">
             
                    <div class="thumbnail-container">
                      @forelse($combo_raw_product as $key => $crp)
                      <img class="thumbnail img-thumbnail chnge_img" src="{{ asset('uploads/product/thumb-small-image/'.$crp->thumb_image) }}">
                      @empty
                      @endforelse
                    </div>
                    </div>
               
              <div class="col-md-10">
                <div class="testslide-image">
                 <a href="{{ asset(str_replace('small-thumb-image', 'big-thumb-image', $combo_product->image)) }}" class="popup-link image-container">
                    <img class="slider-image img-thumbnail main-image" id="big-image" data-izoomify-url="{{ asset(str_replace('small-thumb-image', 'big-thumb-image', $combo_product->image)) }}" data-izoomify-magnify="2.5"
                    src="{{ asset(str_replace('small-thumb-image', 'big-thumb-image', $combo_product->image)) }}" alt="Image 1">
                 </a>
               </div>
			   </div>
             
             
             
                </div>
            </div>
         </div>
         
         <div class="col-lg-7 col-md-6 col-12">
            <div class=" p-2 ps-3">
               <div class="product-content">
                  <h4 class="product-title" style="color: #0f134f">{{ $combo_product->name }}</h4>
                  <input type="hidden" name="pro_img" id="pro_img">
                  
                   <div class="product-short-info">
                        <table class="product-info-table">
                            <tbody>
                                
                                <tr class="product-info-group">
                                    <td class="product-info-label">Price: </td>
                                    <td class="product-info-data product-regular-price"><span style="font-weight: 700;" id="reg_price">£{{ $combo_product->price }}</span></td>
                                </tr>   
                                <tr class="product-info-group">
                                    <td class="product-info-label">Status: </td>
                                    <td class="product-info-data product-status"> 
                                        <span style="font-weight: 700;">&nbsp;
                                        Stock
                                        </span>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="combo_raw_product">
                        @forelse($combo_raw_product as $key => $crp)
                        <div class="col-md-12 product" data-product-id="{{ $crp->id }}">
                            <div class="">
                                <strong>{{ $crp->name }}</strong>
                            </div>
                            <div class="">
                                @if(!empty($crp->prod_color == 'varcolor'))
                                <div class="colors" id="colors-{{ $crp->id }}">
                                    <!-- Unique color_id input for this product -->
                                    <input type="hidden" name="color_id" id="color_id_{{ $crp->id }}" value="">
                                    <input type="hidden" name="product_id" id="product_id_{{ $crp->id }}" value="">
                                    
                                    @foreach($crp->variations as $v)
                                    @if(!empty($v->color->code))
                                    <div class="color" style="background: {{ $v->color->code }}" 
                                         data-product-id="{{ $crp->id }}" 
                                         data-color-id="{{ $v->color_id }}" 
                                         data-varcolor="{{ $v->color->name }}" 
                                         value="{{ $v->id }}" 
                                         data-image="{{ asset($v->var_image) }}" data-price="{{ $v->sell_price }}" data-quantity="{{ $v->quantity }}"
                                         data-variation-color-id="{{ $v->color_id }}">
                                        <input type="hidden" name="variationColor_id">
                                        <input type="hidden" name="variation_color_id">
                                    </div>
                                    @else
                                    Color Not Available
                                    @endif
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                        @empty
                        <p>No products available.</p>
                        @endforelse
                    </div>
               

                  <input type="hidden" name="raw_product_id" id="raw_product_id" value="{{ $combo_product->id}}">
                  @if(!empty($combo_product->short_description))
                  <span style="font-weight: 700;font-size: 20px;">Key Features</span>
                  <div class="key-features" style="margin-top: 8px;">
                    {!! $combo_product->short_description !!}
                  </div>
                  @endif
                  
                  <ul class="product-metas">
                     {!! $combo_product->feature !!}
                  </ul>
               </div>
           

               

               <div class="row" style="">
                   
                    <div class="qty-btn-box col-lg-3 col-md-3">
                        <div class="qty-box mb-2" style="width: 100%;">
                            <button class="btn btn-light border rounded-0 bold font-20 border-muted decrease-qty" style="height: 60px;">-</button>
                            <input type="number" min="1" name="quantity" id="quantity" value="1" class="form-control font-20 rounded-0 shadow-none qty" style="height: 60px;">
                            <button class="btn btn-light border rounded-0 bold font-20 border-muted increase-qty" style="height: 60px;">+</button>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-3">
                        <a href="{{ route('front.check.single', ['product_id' => $combo_product->id]) }}"
                            style="background: #000;
                            margin-top: 3%;
                            margin-right: 2%;
                            font-size: 18px;
                            padding: 10%;
                            border: 1px solid #000;
                            width: 100%;"
                            class="btn btn-primary bold font-20 checkout-btn buy-now"
                            data-id="{{ $combo_product->id }}"
                            data-url="{{ route('front.cart.combo_cart') }}" >
                            Add To Bag
                        </a>
                    </div>
                    
                  </div>
                  
                  
                  @php $footer = DB::table('footers')->first(); @endphp
                  <div class="text-center row mb-2 mt-2 col-12 col-md-12 col-xl-8 d-none" style="gap: 10px;">
                      
                        <a href="tel: +88{{ $footer->phone }}"
                            style="background: #0f134f !important;margin-top:2%;"
                            class="btn btn-primary bold font-20 px-2 add_cart col-lg-5 col-md-5">
                            <span class="call_text"><i class='fas fa-phone'></i> +88{{ $footer->phone }}</span>
                        </a>
                        <a href="https://wa.me/+88{{ $footer->phone2 }}" 
                            class="btn btn-primary bold font-20 px-2 checkout-btn buy_now col-lg-5 col-md-5"
                            style="background: #F85606; margin-top:2%;">
                            <span class="call_text"><i class='fa fa-whatsapp'></i> +88{{ $footer->phone2 }}</span>
                        </a>
                     
                  </div>
                  
               
            </div>
         </div>
      </div>
   </div>
</div>
</div>

<div class="row p-lg-3">
   <div class="col-lg-12 col-md-12 col-12">
      <div class="container-fluid">
         <ul class="nav col-md-12" id="myTabs" style="padding:0px; background:white">
            <li class="">
               <a class="btn btn-light bg-white bold active" id="tab2-tab" data-bs-toggle="tab" href="#tab2">Description</a>
            </li>
           
            <li class="">
               <a class="btn btn-light bg-white bold " id="tab3-tab" data-bs-toggle="tab" href="#vedio">Video</a>
            </li>
         </ul>
         <div class="tab-content bg-white p-lg-4 p-3" id="myTabsContent" style="width: 100%; padding: 0px">
            <div class="tab-pane show active" id="tab2">
               <h4 class="semi">Descriptions</h4>
               <p class="font-15 semi">
                  {!!$combo_product->long_description!!}
               </p>
            </div>

            <div class="tab-pane fade" id="tab3">
               <p>Content for Tab 3</p>
            </div>
            
            <div class="tab-pane show" id="vedio">
               <h4 class="semi">Video</h4>
               <p class="font-15 semi">
               <div class="bg-sky">
                  <strong>Video Features</strong>
                  <div>
                     {!!$combo_product->video_link!!}
                  </div>
               </div>
               </p>
            </div>
         </div>
      </div>
   </div>
   </div>
   

 <div class="modal fade" id="product_video" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          
      </div>   

</div>
</div>
@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script src="https://www.jqueryscript.net/demo/magnify-image-hover-touch/dist/jquery.izoomify.js"></script>


<script>

   $(document).ready(function () {
       
       $('.buy-now').on('click', function (e) {
    e.preventDefault();

    // Get quantity and URL
    var proQty = $('input[name="quantity"]').val();
    var addToCartUrl = $(this).data('url');
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    
    var pro_id = $('input#raw_product_id').val();
    
    // Initialize an array to hold product and color ID pairs
    var productColorPairs = [];

    // Collect product and color ID pairs
    $('.product').each(function() {
        var productId = $(this).data('product-id');
        var selectedColorId = $(this).find(`#color_id_${productId}`).val();

        // Only push if both productId and selectedColorId are present
        if (selectedColorId && productId) {
            productColorPairs.push({
                product_id: productId,
                color_id: selectedColorId
            });
        }
    });
    

    // Setup AJAX headers
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    // Send AJAX POST request
    $.post(addToCartUrl, {
        quantity: proQty,
        product_colors: productColorPairs,
        raw_product_id : pro_id
    }, function (response) {
        if (response.status) {
            toastr.success(response.msg);
            // window.location.href = "{{ route('front.checkout.index') }}";
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

       
       
//       $('.buy-now').on('click', function (e) {
//     e.preventDefault();

//     // Get product ID and quantity
//     var productId = $(this).data('id');
//     var proQty = $('input[name="quantity"]').val();
//     var addToCartUrl = $(this).data('url');
//     var csrfToken = $('meta[name="csrf-token"]').attr('content');

//     // Get the selected color ID from all products
//     var color_id = [];
//     var product_ids = [];
//     $('.product').each(function() {
//         var id = $(this).data('product-id');
//         var selectedColorId = $(this).find(`#color_id_${id}`).val();
//         if (selectedColorId) {
//             color_id.push(selectedColorId);
//         }
//         if(id){
//             product_ids.push(id);
//         }
//     });

//     // Setup AJAX headers
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': csrfToken
//         }
//     });

//     // Send AJAX POST request
//     $.post(addToCartUrl, {
//         id: productId,
//         ids: product_ids,
//         quantity: proQty,
//         color_id: color_id // Include color_id in the request
//     }, function (response) {
//         if (response.status) {
//             toastr.success(response.msg);
//             window.location.href = "{{ route('front.checkout.index') }}";
//         } else {
//             if (response.errors) {
//                 for (var field in response.errors) {
//                     if (response.errors.hasOwnProperty(field)) {
//                         for (var i = 0; i < response.errors[field].length; i++) {
//                             toastr.error(response.errors[field][i]);
//                         }
//                     }
//                 }
//             } else {
//                 toastr.error(response.msg || 'An error occurred while processing your request.');
//             }
//         }
//     });
// });

       
       
       
    //   $('.buy-now').on('click', function (e) {
           
    //       e.preventDefault();
    //       var productId = $(this).data('id');
    //       var proQty = $('input[name="quantity"]').val();
    //       var addToCartUrl = $(this).data('url');
    //       var csrfToken = $('meta[name="csrf-token"]').attr('content');
           
    //       var color_id 
          
    //       $.ajaxSetup({
    //           headers: {
    //               'X-CSRF-TOKEN': csrfToken
    //           }
    //       });
         
    //       $.post(addToCartUrl,
    //         {
    //           id              : productId,
    //           quantity        : proQty,
    //         },

    //       function (response) {

    //           if(response.status)
    //             {
    //               toastr.success(response.msg);
    //               window.location.href = "{{ route('front.checkout.index') }}";
    //             } else {
    //                 if (response.errors) {
    //                     for (var field in response.errors) {
    //                         if (response.errors.hasOwnProperty(field)) {
    //                             for (var i = 0; i < response.errors[field].length; i++) {
    //                                 toastr.error(response.errors[field][i]);
    //                             }
    //                         }
    //                     }
    //                 } else {
    //                     toastr.error(response.msg || 'An error occurred while processing your request.');
    //                 }
    //             }

    //       });
    //   });
       
       $('.increase-qty').on('click', function () {
           var qtyInput = $(this).siblings('.qty');
           var newQuantity = parseInt(qtyInput.val()) + 1;
           qtyInput.val(newQuantity);
       });

       $('.decrease-qty').on('click', function () {
           var qtyInput = $(this).siblings('.qty');
           var newQuantity = parseInt(qtyInput.val()) - 1;
           if (newQuantity > 0) {
               qtyInput.val(newQuantity);
           }
         else{

         }
       });
       
        $(document).on('click', '.add-to-cart', function (e) {
            
            var quantity = $('input[name="quantity"]').val();
            let proName=$('input[name="product_name"]').val();
            let proId=$('input[name="product_id"]').val();
            let catId=$('input[name="category_id"]').val();
            let variation_price = '';
          
            window.dataLayer = window.dataLayer || [];

            dataLayer.push({ecommerce:null});
            dataLayer.push({
                event: "add_to_cart",
                ecommerce : {
                    currency: "BDT",
                    value: variation_price,
                    items: [
                        {
                          item_id: proId,
                          item_name: proName,
                          item_category: catId,
                          price: variation_price,
                          quantity: quantity
                        }
                    ]
                }
            });

            let id = $(this).data('id');
            let url = $(this).data('url');
            addToCart(url,id,quantity,type="");
      });

       function addToCart(url, id, quantity, type="") {
           
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
              type: "POST",
              url: url,
              headers: {
                  'X-CSRF-TOKEN': csrfToken
              },
              data: { id,quantity },
                success: function (res) {
                  if (res.status) {
                      toastr.success(res.msg);
                if (type) {
               
                if (res.url !== '') {
                    document.location.href = res.url;
                } else {
                    
                    }
                } else {
                    window.location.reload();
                }
            } else {
            
                if (res.errors) {
                    for (var field in res.errors) {
                        if (res.errors.hasOwnProperty(field)) {
                            for (var i = 0; i < res.errors[field].length; i++) {
                                toastr.error(res.errors[field][i]);
                            }
                        }
                    }
                } else {
                    toastr.error(res.msg || 'An error occurred while processing your request.');
                }
            }

              },
              error: function (xhr, status, error) {
                  toastr.error('An error occurred while processing your request.');
              }
          });
      }
      
      
        $(document).on('click', 'a#video_lnk',function(e){
            e.preventDefault();
            $product_id = $(this).data('proid');
            var url = "{{ route('front.product_video',':product_id') }}";
            url = url.replace(':product_id', $product_id);
            $.ajax({
                url : url,
                data : {},
                method: 'GET',
                success : function(res){
                    if(res.success){
                        $('div#product_video').html(res.product_video_data).modal('show');
                    }
                }
            });
            
        });
      
   
        $('.popup-link').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });


        function changeImage(newImageSrc) {
            var bigImage = document.getElementById("big-image");
            bigImage.src = newImageSrc;
        }
        
        $(document).ready(function () {
            $('.testslide-image').izoomify();
        });
        
        let imageClick = false;
        
        
        $(document).on('click', '.chnge_img',function(){
            var bigImage = document.getElementById("big-image");
            newImageSrc = $(this).attr('src');
            bigImage.src = newImageSrc;
        });
        
       $(document).ready(function() {
    // Handle color selection for products
    // $('.combo_raw_product').on('click', '.color', function() {
    //     // Get the product ID from the clicked color
    //     const productId = $(this).data('product-id');
    //     const colorContainer = $(`.product[data-product-id="${productId}"] .colors`);

    //     // Get the color ID from the clicked color
    //     const colorId = $(this).data('color-id');

    //     // Get the input field for this product
    //     const colorInput = $(`.product[data-product-id="${productId}"] #color_id_${productId}`);
    //     const productInput = $(`.product[data-product-id="${productId}"] #product_id_${productId}`);

    //     // Check if the color is being selected or deselected
    //     if ($(this).hasClass('active')) {
    //         // Deselect the color if already active
    //         $(this).removeClass('active');
    //         colorInput.val(''); // Clear the color_id input field
    //     } else {
    //         // Deselect all colors for this product
    //         colorContainer.find('.color').removeClass('active');
            
    //         // Select the clicked color
    //         $(this).addClass('active');
    //         colorInput.val(colorId); // Set the new color_id
    //         productInput.val(productId); // Set the new color_id

    //         // Update the UI with selected color information
    //         const value = $(this).attr('value');
    //         const varColor = $(this).data('varcolor');
    //         const variationColorId = $(this).data('variation-color-id');
    //         const variationSizeId = $('input[name="variation_size_id"]').val();

    //         $('#select_color').text('Select Color : ' + varColor);

    //         $.ajax({
    //             type: 'get',
    //             url: '{{ route("front.product.get-variation_color") }}',
    //             data: {
    //                 varColor,
    //                 value,
    //                 product_id: productId,
    //                 color_id: colorId,
    //                 variation_color_id: variationColorId,
    //                 variation_size_id: variationSizeId
    //             },
    //             success: function(res) {
    //                 // Update UI elements with response data
    //                 $('span#reg_price').text(res.variation_price + ' Tk');
    //                 $('.testslide-image').html(res.var_images);
    //                 $('input[name="pro_img"]').val(res.pro_img);

    //                 // Update stock status
    //                 if (res.stock != '0') {
    //                     $('p.stock_check').text('');
    //                 } else {
    //                     $('p.stock_check').text('Stock not available');
    //                 }
                    
    //                 initializeZoom();
    //             }
    //         });
            
    //         // Function to initialize the zoom effect
    //         function initializeZoom() {
    //             // Assuming you're using a library for zoom, e.g., Izoomify
    //             $('.slider-image').each(function() {
    //                 const $this = $(this);
    //                 // If there's an existing zoom instance, destroy it
    //                 if ($this.data('izoomify')) {
    //                     $this.data('izoomify').destroy();
    //                 }
    //                 // Initialize the zoom effect
    //                 $this.izoomify({
    //                     magnify: 2.5
    //                 });
    //             });
    //         }

    //         // Update hidden fields specific to the clicked color
    //         $(`.product[data-product-id="${productId}"] input[name="variationColor_id"]`).val(value);
    //         $(`.product[data-product-id="${productId}"] input[name="variation_color_id"]`).val(variationColorId);
    //     }
    // });
    
    // Function to initialize the zoom effect
function initializeZoom() {
    // Assuming you're using a library for zoom, e.g., Izoomify
    $('.slider-image').each(function() {
        const $this = $(this);
        // If there's an existing zoom instance, destroy it
        if ($this.data('izoomify')) {
            $this.data('izoomify').destroy();
        }
        // Initialize the zoom effect
        $this.izoomify({
            magnify: 2.5
        });
    });
}

// Handle color selection for products
$('.combo_raw_product').on('click', '.color', function() {
    // Get the product ID from the clicked color
    const productId = $(this).data('product-id');
    const colorContainer = $(`.product[data-product-id="${productId}"] .colors`);

    // Get the color ID from the clicked color
    const colorId = $(this).data('color-id');

    // Get the input field for this product
    const colorInput = $(`.product[data-product-id="${productId}"] #color_id_${productId}`);
    const productInput = $(`.product[data-product-id="${productId}"] #product_id_${productId}`);

    // Check if the color is being selected or deselected
    if ($(this).hasClass('active')) {
        // Deselect the color if already active
        $(this).removeClass('active');
        colorInput.val(''); // Clear the color_id input field
    } else {
        // Deselect all colors for this product
        colorContainer.find('.color').removeClass('active');
        
        // Select the clicked color
        $(this).addClass('active');
        colorInput.val(colorId); // Set the new color_id
        productInput.val(productId); // Set the new product_id

        // Update the UI with selected color information
        const value = $(this).attr('value');
        const varColor = $(this).data('varcolor');
        const variationColorId = $(this).data('variation-color-id');
        const variationSizeId = $('input[name="variation_size_id"]').val();

        $('#select_color').text('Select Color : ' + varColor);

        $.ajax({
            type: 'get',
            url: '{{ route("front.product.get-variation_color") }}',
            data: {
                varColor,
                value,
                product_id: productId,
                color_id: colorId,
                variation_color_id: variationColorId,
                variation_size_id: variationSizeId
            },
            success: function(res) {
                // Update UI elements with response data
                $('span#reg_price').text('£' + res.variation_price.toLocaleString('en-GB', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                $('.testslide-image').html(res.var_images);
                $('input[name="pro_img"]').val(res.pro_img);

                // Update stock status
                $('p.stock_check').text(res.stock != '0' ? '' : 'Stock not available');
                
                // Initialize zoom effect after new images are loaded
                setTimeout(initializeZoom, 100); // Optional delay
            }
        });

        // Update hidden fields specific to the clicked color
        $(`.product[data-product-id="${productId}"] input[name="variationColor_id"]`).val(value);
        $(`.product[data-product-id="${productId}"] input[name="variation_color_id"]`).val(variationColorId);
    }
});


    // Optional: Manage maximum selection across all products if needed
    // For instance, if you want to restrict the total number of colors selected across all products to 2
    // (This is optional and depends on your requirements)
    /*
    const maxSelection = 2;
    let selectedColors = [];

    $('.combo_raw_product').on('click', '.color', function() {
        const productId = $(this).data('product-id');
        const colorId = $(this).data('color-id');
        
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            selectedColors = selectedColors.filter(id => id !== colorId);
        } else {
            if (selectedColors.length < maxSelection) {
                $(this).addClass('active');
                selectedColors.push(colorId);
            } else {
                alert('You can only select up to 2 colors.');
            }
        }
    });
    */
});



        
        

//   $('#colors .color').on('click', function(){
//       $('#colors .color').removeClass('active');
//       $(this).addClass('active');
//       let value = $(this).attr('value');
//       let varColor = $(this).data('varcolor');
//       let product_id = $(this).data('proid');
//       let color_id = $(this).data('colorid');
//       let variation_color_id = $(this).data('variationcolorid');
//       let variation_size_id = $('input[name="variation_size_id"]').val();
//     //   alert(product_id);

//       $('#select_color').text('Select Color : '+varColor);

//       // Assuming you have retrieved the selected variation price somehow
//       let variationColor = parseFloat($(this).data('varcolor'));

//       $.ajax({
//           type: 'get',
//           url: '{{ route("front.product.get-variation_color") }}',
//           data: {
//               varColor,
//             	value,
//               variationColor,
//             	product_id,
//               color_id,
//               variation_color_id,
//               variation_size_id
//             // Pass variation price to the server
//           },
//           success: function(res) {
//               //$('.current-price-product').text('' + res.price);
//                 $('span#reg_price').text(res.variation_price+' Tk');
//             	$('.testslide-image').html(res.var_images);
//                 $('input[name="pro_img"]').val(res.pro_img);
//             	$('#color_value').val();
                
//               console.log(res);
//               imageClick = true;
              
//             if(res.stock != '0' ){
//                 $('p.stock_check').text('');
                
//             }              
//             else{
                
//                  $('p.stock_check').text('Stock not available');
//             }
              
              
//           }
//       });

//       $("#color_value").val(varColor);
//       $("#color_value1").val(value);
//       $("#variation_color_id").val(variation_color_id);
//   });
        
        
   });

</script>

@endpush
