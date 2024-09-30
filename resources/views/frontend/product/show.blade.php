@extends('frontend.app')

@section('title', $product->seo_title)

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

@media (min-width: 992px) {
    .modal-lg, .modal-xl {
        --bs-modal-width: 1200px !important;
    }
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
             	
             	.namespace {
             	    margin-left: 5% !important;
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
              .namespace {
             	    margin-left: 5% !important;
             	}
              
            }
            
            @media only screen and (min-width: 451px) and (max-width: 575px) {
                .product_content {
                    margin-top: 1% !important;
                }
                .namespace {
             	    margin-left: 5% !important;
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
                    text-align: right;
                }
                .testslide-image {
                    margin-left: 0px !important;
                }
                
               .col-9 {
                    padding-left: 0px !important;
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
   width: 65px;
    height: 65px;
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
         
         .product-title {
             text-align: center;
         }
         
         .product-info-table {
             margin: 0 auto;
         }
         
         .mobile {
             display: block !important;
             margin-bottom: 18px;
         }
         
         .mobile .buy-now {
                font-size: 18px;
                padding: 10%;
                padding: 3% !important;
                width: 80% !important;
                margin: 0 auto !important;
         }
         
         .mobile .mobile_bag {
             text-align :center !important;
         }
         
         .mobile .decrease-qty {
             font-size: 30px !important;
         }
         
         .mobile .increase-qty {
             font-size: 30px !important;
         }
         
         .pc {
             display: none !important;
         }
         
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

.video-container {
    position: relative; /* Create a positioning context */
    display: inline-block; /* Allow it to wrap around the image */
}

.video-container img {
    display: block; /* Prevent any extra space below the image */
}

.video-container i {
    position: absolute; /* Position the icon absolutely */
    top: 50%; /* Center vertically */
    left: 50%; /* Center horizontally */
    transform: translate(-50%, -50%); /* Offset the icon by half its size */
    color: red; /* Change color as needed */
    font-size: 2rem; /* Adjust size as needed */
    z-index: 1; /* Ensure the icon is above the image */
}

</style>


<div class="main-wrapper">
   <div class="overlay-sidebar"></div>
   
    <nav aria-label="breadcrumb" class="namespace" style="margin-top: 15px;">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" style="color: #000;font-size: 13px;font-weight: 700;">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('front.shop', ['slug'=> $product->category->slug] ) }}" style="color: #000;font-size: 13px;font-weight: 700;">{{ $product->category->name }}</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="#" style="color: #000;font-size: 13px;font-weight: 700;">{{ $product->name }}</a></li>
      </ol>
    </nav>
   
   <div class="product-page bg-light col-lg-12 col-12 p-0 m-auto mt-2 mb-2">
      <div class="row p-lg-3" style="border-bottom: 3px solid #cce0e5">
         <div class="col-lg-5 col-md-6 col-12">
            <div class="slider-container">
               <!-- Big Image -->
               
                <div class="row">
                    
                   <div class="col-md-2 col-3">
                    <div class="thumbnail-container" style="overflow-x: hidden;height: 452px;">
                      <img class="thumbnail img-thumbnail chnge_img" src="{{asset('uploads/product/thumb-big-image/'.$product->thumb_image)}}" alt="">
                      @forelse($product->gallery as $key => $img_gals)
                      <img class="thumbnail img-thumbnail chnge_img" src="{{ asset($img_gals->image) }}">
                      @empty
                      @endforelse
                      <div class="video-container">
                         <a href="#" id="video_lnk" data-proid="{{ $product->id }}">
                             <i class="fa fa-youtube-play"></i>
                             <img class="thumbnail img-thumbnail" src="{{asset('uploads/product/youtube-thumbnails/'.$product->youtube_thumb)}}" alt="">
                         </a> 
                        </div>
                    </div>
                    </div>
                <div class="col-md-10 col-9">
                    <div class="testslide-image">
                        <a href="{{asset('uploads/custom-images/'.$product->thumb_image)}}" class="popup-link image-container">
                            <img class="slider-image img-thumbnail main-image" id="big-image" data-izoomify-url="{{asset('uploads/custom-images/'.$product->thumb_image)}}" data-izoomify-magnify="2.5"
                            src="{{asset('uploads/product/thumb-big-image/'.$product->thumb_image)}}" alt="Image 1">
                        </a>
                   </div>
			   </div>
             
                </div>
            </div>
         </div>
         
         <div class="col-lg-7 col-md-6 col-12">
            <div class=" p-2 ps-3">
               <div class="product-content">
                  <h4 class="product-title" style="color: #0f134f">{{ $product->name }}</h4>
                  <input type="hidden" name="pro_img" id="pro_img">
                  <input type="hidden" name="type" id="type" value="{{ $product->type }}">
                  
                   <div class="product-short-info">
                        <table class="product-info-table">
                            <tbody>
                                <tr class="product-info-group">
                                    <td class="product-info-label">Price: </td>
                                    <td class="product-info-data product-regular-price"><span style="font-weight: 700;" id="reg_price">£{{ $product->price }}</span></td>
                                </tr>   
                                <tr class="product-info-group-status">
                                    <td class="product-info-label">Status: </td>
                                    <td class="product-info-data product-status"> 
                                        <span id="stock_indicate" style="font-weight: 700;">&nbsp;
                                        @if($stock!='0')
                                            In Stock
                                        @else
                                            Out Of Stock
                                        @endif
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    @if(!empty($product->prod_color == 'varcolor'))
               @if($product->type == 'variable') <h6 id="select_color">Select Shade : </h6> @else @endif
               
               <p class="stock_check" style="font-weight:bold; color:red"></p>
                
               <div class="colors" id="colors">
                   <input type="hidden" id="color_id" name="color_id" >
                  @foreach($product->variations as $v)
                  @if(!empty($v->color->code))
                  
                  @if($v->quantity == '0')
                 
                  <div class="color" style="background: {{$v->color->code}}" data-proid="{{ $v->product_id }}" data-colorid="{{ $v->color_id }}" data-varcolor="{{ $v->color->name}}"
                     value="{{$v->id}}" data-variationColorId="{{ $v->color_id }}" data-image="{{ asset($v->var_image) }}" data-price="{{ $v->sell_price }}" data-quantity="{{ $v->quantity }}">
                      <i style="color: #fff;" class="fa fa-close"></i>
                     <!--<img src="{{ asset($v->var_images) }}" width="50px" height="50px" /> -->
                     <input type="hidden" id="color_value" name="variationColor_id">
                     <input type="hidden" id="variation_color_id" name="variation_color_id">
                  </div>
                  
                  @else 
                  
                  <div class="color" style="background: {{$v->color->code}}" data-proid="{{ $v->product_id }}" data-colorid="{{ $v->color_id }}" data-varcolor="{{ $v->color->name}}"
                     value="{{$v->id}}" data-variationColorId="{{ $v->color_id }}" data-image="{{ asset($v->var_image) }}" data-price="{{ $v->sell_price }}" data-quantity="{{ $v->quantity }}">
                     <i class="fa fa-xc"></i>
                     <!--<img src="{{ asset($v->var_images) }}" width="50px" height="50px" /> -->
                     <input type="hidden" id="color_value" name="variationColor_id">
                     <input type="hidden" id="variation_color_id" name="variation_color_id">
                  </div>
                  
                  @endif
                  
                  @else
                  Color Not Available
                  @endif
                  @endforeach
               </div>

               @else
               <input type="hidden" id="color_value" name="variationColor_id" value="default">
               <input type="hidden" id="variation_color_id" name="variation_color_id" value="1">
               @endif

                  <input type="hidden" name="product_id" value="{{ $product->id}}">
                  <input type="hidden" name="product_name" value="{{ $product->name}}">
                  <input type="hidden" name="category_id" value="{{ $product->category_id}}">
                  @if($product->offer_price != '0')
                  <input type="hidden" name="price" id="price_val" value="{{ $product->offer_price }}">
                  @else
                  <input type="hidden" name="price" id="price_val" value="{{ $ultimatePrice }}">
                  @endif
                  
                  
                  <div class="row mobile" style="display: none;">
                   
                    <div class="qty-btn-box col-lg-3 col-md-3">
                        <div class="qty-box mb-2" style="width: 100%;">
                            <button class="btn btn-light border rounded-0 bold font-20 border-muted decrease-qty" style="height: 60px;">-</button>
                            <input type="number" min="1" name="quantity" id="quantity" value="1" class="form-control font-20 rounded-0 shadow-none qty" style="height: 60px;">
                            <button class="btn btn-light border rounded-0 bold font-20 border-muted increase-qty" style="height: 60px;">+</button>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-3 mobile_bag">
                        <a href="{{ route('front.check.single', ['product_id' => $product->id]) }}"
                            style="background: #000;
                            margin-top: 3%;
                            margin-right: 2%;
                            font-size: 18px;
                            padding: 10%;
                            border: 1px solid #000;
                            width: 100%;"
                            class="btn btn-primary bold font-20 checkout-btn buy-now"
                            data-id="{{ $product->id }}"
                            data-url="{{ route('front.cart.store') }}" >
                            Add To Bag
                        </a>
                    </div>
                    
                    
                    
                  </div>
                  
                  
                  @if(!empty($product->short_description))
                  <span style="font-weight: 700;font-size: 20px;">Key Features</span>
                  <div class="key-features" style="margin-top: 8px;">
                    {!! $product->short_description !!}
                  </div>
                  @endif
                  
                  <ul class="product-metas">
                     {!! $product->feature !!}
                  </ul>
               </div>

                
             <input type="hidden" name="supplier_id" id="supplier_id" value="{{ $product->supplier_id }}">

               

               <div class="row pc" style="">
                   
                    <div class="qty-btn-box col-lg-3 col-md-3">
                        <div class="qty-box mb-2" style="width: 100%;">
                            <button class="btn btn-light border rounded-0 bold font-20 border-muted decrease-qty" style="height: 60px;">-</button>
                            <input type="number" min="1" name="quantity" id="quantity" value="1" class="form-control font-20 rounded-0 shadow-none qty" style="height: 60px;">
                            <button class="btn btn-light border rounded-0 bold font-20 border-muted increase-qty" style="height: 60px;">+</button>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-3">
                        <a href="{{ route('front.check.single', ['product_id' => $product->id]) }}"
                            style="background: #000;
                            margin-top: 3%;
                            margin-right: 2%;
                            font-size: 18px;
                            padding: 10%;
                            border: 1px solid #000;
                            width: 100%;"
                            class="btn btn-primary bold font-20 checkout-btn buy-now"
                            data-id="{{ $product->id }}"
                            data-url="{{ route('front.cart.store') }}" >
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
<div class="main-wrapper">
    <div class="row p-lg-3" style="padding-left: 0px !important;padding-right: 0px !important;">
   <div class="col-lg-12 col-md-12 col-12" style="padding-left: 0px !important;padding-right: 0px !important;">
      <div class="container-fluid">
         <ul class="nav col-md-12" id="myTabs" style="padding:0px; background:white">
             
            <li class="">
               <a class="btn btn-light bg-white bold active" id="tab2-tab" data-bs-toggle="tab" href="#tab2">Description</a>
            </li>
            
            <li class="">
               <a class="btn btn-light bg-white bold" id="tab2-tab" data-bs-toggle="tab" href="#ingredients">Ingredients</a>
            </li>
            
            <li class="">
               <a class="btn btn-light bg-white bold" id="tab2-tab" data-bs-toggle="tab" href="#how_to_use">How To Use</a>
            </li>

            <li class="">
               <a class="btn btn-light bg-white bold " id="tab3-tab" data-bs-toggle="tab" href="#tab4">Review</a>
            </li>
            <li class="">
               <a class="btn btn-light bg-white bold " id="tab3-tab" data-bs-toggle="tab" href="#vedio">Video</a>
            </li>
         </ul>
         <div class="tab-content bg-white p-lg-4 p-3" id="myTabsContent" style="width: 100%; padding: 0px">
            <div class="tab-pane show active" id="tab2">
               <h4 class="semi">Descriptions</h4>
               <p class="font-15 semi">
                  {!!$product->long_description!!}
               </p>
            </div>

            <div class="tab-pane fade" id="ingredients">
               <p>{!! $product->ingredients !!}</p>
            </div>
            <div class="tab-pane fade" id="how_to_use">
               <p>{!! $product->how_to_use !!}</p>
            </div>
            <div class="tab-pane fade" id="tab3">
               <p>Content for Tab 3</p>
            </div>
            <div class="tab-pane fade" id="tab4">
               @auth
               <form action="{{ route('front.product.product-reviews.store') }}" method="POST">
                  @csrf
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <div class="form-group">
                     <label for="rating">Rating:</label>
                     <select name="rating" id="rating" class="form-control">
                        <option value="1">1 Star</option>
                        <option value="2">2 Star</option>
                        <option value="3">3 Star</option>
                        <option value="4">4 Star</option>
                        <option value="5">5 Star</option>
                        <!-- Add more options for ratings -->
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="review">Review:</label>
                     <textarea name="review" id="review" rows="4" class="form-control"></textarea>
                  </div>
                  <button type="submit" class="btn" style="margin-top: 15px;background: #000;color: #ffffff;">Submit Review</button>
               </form>
               @else
               <p>Please <a href="{{url('login-user')}}" class="btn btn-default" style="background: #E6006B;color: #ffffff;">login</a> to submit a review.</p>
               @endauth
               <style>
                  .fa-solid{
                  
                  }
                  p.rev {
                  font-size: 17px;
                  }
                  p.rev_user {
                  font-size: 25px;
                  }
               </style>
               @forelse($reviews as $key=>$rev)
               <br/>
               <div class="container card">
                  <div class="row">
                     <div class="col-md-6">
                        <p class="rev_user" style="font-weight:bold;">
                           <img src="https://media.istockphoto.com/id/1300845620/vector/user-icon-flat-isolated-on-white-background-user-symbol-vector-illustration.jpg?s=612x612&w=0&k=20&c=yBeyba0hUkh14_jgv1OKqIH0CCSWU_4ckRkAoy2p73o=" alt="Avater" width="70px" height="70px"/>
                           {{$rev->user->name}}
                        </p>
                     </div>
                     <div class="col-md-6" style="text-align: right;">
                        <p style="margin-left:8%;font-weight:bolder;margin-top: 15px;">
                           @if($rev->rating == 1)
                           <i class="fa-solid fa-star"></i>
                           <i class="fa-regular fa-star"></i>
                           <i class="fa-regular fa-star"></i>
                           <i class="fa-regular fa-star"></i>
                           <i class="fa-regular fa-star"></i>
                           @elseif($rev->rating == 2)
                           <i class="fa-solid fa-star"></i>
                           <i class="fa-solid fa-star"></i>
                           <i class="fa-regular fa-star"></i>
                           <i class="fa-regular fa-star"></i>
                           <i class="fa-regular fa-star"></i>
                           @elseif($rev->rating == 3)
                           <i class="fa-solid fa-star"></i>
                           <i class="fa-solid fa-star"></i>
                           <i class="fa-solid fa-star"></i>
                           <i class="fa-regular fa-star"></i>
                           <i class="fa-regular fa-star"></i>
                           @elseif($rev->rating == 4)
                           <i class="fa-solid fa-star"></i>
                           <i class="fa-solid fa-star"></i>
                           <i class="fa-solid fa-star"></i>
                           <i class="fa-solid fa-star"></i>
                           <i class="fa-regular fa-star"></i>
                           @else
                           <i class="fa-solid fa-star"></i>
                           <i class="fa-solid fa-star"></i>
                           <i class="fa-solid fa-star"></i>
                           <i class="fa-solid fa-star"></i>
                           <i class="fa-solid fa-star"></i>
                           @endif
                           ({{$rev->rating}}/5)
                        </p>
                     </div>
                  </div>
                  <p class="rev" style="margin-left: 8%;margin-top: -2%;font-weight: bold;"> {{$rev->review}}</p>
               </div>
               @empty
               <p> here are no questions asked yet. Be the first one to ask a question. </p>
               @endforelse
            </div>
            <div class="tab-pane show" id="vedio">
               <h4 class="semi">Video</h4>
               <p class="font-15 semi">
               <div class="bg-sky">
                  <strong>Video Features</strong>
                  <div>
                     {!!$product->video_link!!}
                  </div>
               </div>
               </p>
            </div>
         </div>
      </div>
   </div>
   </div>
</div>
   <div class="container-fluid main-section" style="padding-bottom: 30px;padding-top: 11px;">
        <h3 class="text-center">Related Products</h3>
            <div class="row">
                @forelse($relatedProducts as $key => $product)
                <div class="col-lg-2 col-md-3 col-sm-4 col-6" style="padding: 5px;">
                  <div class="product-item" style="">
                    <div class="product_thumb bg-white prd_img" style="">
                        @if(!empty($product->thumb_image))
                        <a class="primary_img " href="{{ route('front.product.show', [ $product->slug ] ) }}">
                            <img src="{{ asset('public/uploads/product/thumb-small-image/'.$product->thumb_image) }}" style="width: 100%;" class="primcusImg" alt="">
                        </a>
                        @endif
                    </div>
                    <div class="product_content " style="border-top:3px solid #EDEDEF; margin-top: 10%;padding: 5px 5px;background: #fff;">
                        <h4 class="ps-1" style="height: 35px;text-align: center;">
                            @if(!empty($product->id))
                            <a href="{{ route('front.product.show', [ $product->slug ] ) }}"
                                id="product_show"
                                data-productid="{{ $product->id }}" 
                                data-categoryid="{{ $product->category_id }}"
                                data-productname="{{ $product->name }}"
                                class="font-14 pro_name" style="font-size:14px;color: #000;"> 
                                {{ \Illuminate\Support\Str::limit($product->name, 35)}}
                            </a>
                            @endif
                        </h4>
                        
                         @php
                            $average = $product->reviews->average('rating');
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
                        
                        <div class="price_box ps-1 justify-content-center prd_prc_bx text-center" style="">
                            
                            @if(!empty($product->price))
                            <span class="current_price" style="color: #000;">£{{ $product->price }}</span>
                            
                            @endif
                            
                        </div>
                        
                        <div class="rounded-0 bg-muted p-2 d-flex justify-content-between">
         					
         					@if($product->type == 'single')
         					
         					    @if(!empty($product->id))
                                <a href="#"
                                       style="color: white; font-size: 14px;background: #000;border: solid;width: 100%;padding-top: 4%;"
                                       class="btn btn-sm btn-warning semi buy-now"
                                       data-price="{{ $product->price }}"
                                       data-id="{{ $product->id }}"
                                       data-url="{{ route('front.cart.store') }}">
                                       Add To Bag
                                </a>
                                @endif
                                
                            @else
                            
                                <a href="{{ route('front.product.show', [ $product->slug ] ) }}"
                                       style="color: white; font-size: 14px;background: #000;border: solid;width: 100%;padding-top: 4%;"
                                       class="btn btn-sm btn-warning semi"
                                       data-price="{{ $product->price }}"
                                       data-id="{{ $product->id }}"
                                       data-url="{{ route('front.cart.store') }}">
                                       Add To Bag
                                </a>
                            
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
            </div>
    </div>
   

    <div class="modal fade" id="product_video" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          
    </div>   

</div>
</div>
@endsection
@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script src="https://www.jqueryscript.net/demo/magnify-image-hover-touch/dist/jquery.izoomify.js"></script>
<script>

   $(document).ready(function () {
       $('.buy-now').on('click', function (e) {
           
           e.preventDefault();
           var productId = $(this).data('id');
           var proQty = $('input[name="quantity"]').val();
           var color_id = $('input[name="color_id"]').val();
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
        
        

    $('#colors .color').on('click', function(){
       
        $('#colors .color').removeClass('active');
        $(this).addClass('active');
        
        let image = $(this).data('image');
       
        $('a.image-container').html(`<img class="slider-image img-thumbnail" id="big-image" src="${image}" alt="Image 1">`);
        $('input[name="pro_img"]').val(image);
          
        let price = $(this).data('price');
        $('span#reg_price').text('£' + price.toLocaleString('en-GB', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
        let quantity = $(this).data('quantity');
        let varColor = $(this).data('varcolor');

        if(quantity != '0' ){
            $('#select_color').text('Select Shade : '+varColor);
            $('p.stock_check').text('');
            $('span#stock_indicate').text(' In Stock');
            document.querySelector('tr.product-info-group-status').style.display = 'block';
        }              
        else{
            $('p.stock_check').text('Stock not available');
            $('#select_color').text('');
            document.querySelector('tr.product-info-group-status').style.display = 'none';
        }
        
        let color_id = $(this).data('colorid');
        $('input[name="color_id"]').val(color_id);
   });
        
   });

</script>

@endpush