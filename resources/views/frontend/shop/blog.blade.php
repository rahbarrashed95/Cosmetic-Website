@extends('frontend.app')
@section('title', 'gsg')
@push('css')
    {{-- <link rel="stylesheet" href="{{ asset('frontend/silck/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/silck/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/food.css') }}"> --}}
<style>
        
        .sizes .size.active {
                background: #1F8B40;
                color: white;
                font-weight: bold;
            }
            
            .sizes .size {
                padding: 5px;
                margin: 5px;
                border: 1px solid #FE9017;
                width: auto;
                text-align: center;
                cursor: pointer;
                min-width: 45px;
                display: inline-block;
            }
            
            .colors .color {
                padding: 5px;
                margin: 5px;
                border: 1px solid #FE9017;
                width: auto;
                text-align: center;
                cursor: pointer;
                display: inline-block;
                height: 35px;
                width: 35px;
            }
            
            .colors .color.active {
                background: #0d6efd;
                color: white;
                font-weight: bold;
                padding: 6px;
                border: 4px solid white;
                outline: 2px solid red;
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
               /*.product-item {*/
               /*    width: 205px !important;*/
               /*}*/
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
                    /*font-size: 11px !important;*/
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
               /*.col-lg-9 {*/
               /*    padding-right: 0px !important;*/
               /*}*/
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
            @media only screen and (min-width: 1401px) and (max-width: 1500px) {
                
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
                    width: 50% !important;
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
           
       </style>
    @endpush
    @section('content')
    <div class="categoryHeader">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page" style="background:lightblue;">
                    
                </li>
            </ol>
        </nav>
    </div>

    <style>
    
    .label_product {
        width: 46%;
        position: absolute;
        top: 5px;
        right: 0px;
        text-align: center;
        height: 20px;
        background: #0f134f;
        border-radius: 20px 5px 5px 20px;    
    }
    .label_sale {
        padding-top: 2px;
        color: #fff;
        font-size: 66%;
        font-weight: 600;
        display: block;
    }
    
        .product-item .product_content h4 {
        line-height: 20px;
        display: block;
        font-size: 14px;
        text-transform: capitalize;
        font-weight: 600;
        margin-bottom: 0;
        min-height: 44px;
    }
    
 .product-item .product_content .price_box span.old_price {
    text-decoration: line-through;
    font-weight: 400;
    font-size: 14px;
    margin-left: 10px;
}

 .product-item .product_content .price_box span.current_price {
    color: #F85606;
    font-weight: 600;
    font-size: 17px;
}
    
        .form-check-label {
            color: black !important;
            font-weight: bold;
        }
    </style>
    
     <style>
     
     @media (min-width: 576px) {
        .container, .container-sm {
            max-width: 600px !important;
        }
     }
     
     @media (min-width: 768px) {
        .container, .container-md, .container-sm {
            max-width: 900px !important;
        }
        
        .col-md-3 {
            padding-right: 5px !important;
            padding-left: 5px !important;
        }
        
     }

@media (min-width: 992px) {
    .container, .container-lg, .container-md, .container-sm {
        max-width: 1085px !important;
    }
}

@media (min-width: 1200px) {
    .container, .container-lg, .container-md, .container-sm, .container-xl {
    max-width: 1140px !important;
}
}

@media (min-width: 1400px) {
    .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
    max-width: 1320px !important;
}
}

   .product_thumb h4 {
    position: absolute;
    bottom: 146px;
    left: 0;
    background: rgba(0, 0, 0, .7);
    color: #f9881a;
    margin-bottom: 0;
    padding: 6px 15px;
    font-weight: 600;
    line-height: 24px;
    width: 100%;
}
     
     
    /*@media (min-width: 767px) {*/
    /*    .col-md-3 {*/
            /* Adjust these styles based on your specific requirements for mobile devices */
    /*        padding-right: 15px !important;*/
    /*        padding-left: 15px !important;*/
    /*    }*/
    /*}*/
</style>
<div class="container-fluid main-section" style="padding-bottom: 30px;padding-top: 11px;">
    <div class="row">
        @forelse($all_blogs as $key => $blog)
            <div class="col-lg-3 col-md-3 col-sm-4 col-6" style="padding: 5px;">
                <div class="product-item" style="position: relative;">
                    <div class="product_thumb bg-white prd_img" style="">
                        <a class="primary_img " href="{{ route('front.blogDetails',[$blog->id]) }}">
                            <img src="{{ asset('uploads/custom-images2/'.$blog->image) }}" class="primcusImg" alt="" style="width: 100%;">
                        </a>
                        <h4 class="ps-1" style="">
                            <a href="{{ route('front.blogDetails',[$blog->id]) }}" class="font-14" style="font-size:14px;color: #F85606;font-weight: 700;">
                                {{ \Illuminate\Support\Str::limit($blog->title, 35)}}
                            </a>
                        </h4>
                    </div>
                    <div class="product_content " style="border-top:3px solid #EDEDEF; margin-top: 6%;padding: 5px 5px;background-color: #fff;">
                        
                        <div class="subText" data-reactid=".1n7kkwy0qp6.b.2.0.0.0.0.2.5.1.0:$14822_Grocery.0.2.3">
                            {!! Str::limit($blog->description, 50) !!}

                            
                        </div>
                        
                        <div class="rounded-0 p-2">
                                <a href="{{ route('front.blogDetails',[$blog->id]) }}"
                                       style="color: white; font-size: 14px;background: #00712D;border: solid;width: 50%;padding: 5%;"
                                       class="btn btn-sm btn-warning semi">
                                       Read More ...
                                </a>
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

@endsection

@push('js')<script>

$(document).on('submit','form.cart_form_home', function(e) {
        e.preventDefault();
        
        let url=$(this).attr('action');
	    let method=$(this).attr('method');
	    let id = $(this).find('input[name="id"]').val();
	    let variation_id = $(this).find('input[name="variation_id"]').val();
	    let varSize = $(this).find('input[name="variation_size"]').val();
	    let variation_size_id = $(this).find('input[name="variation_size_id"]').val();
	    let variation_price = $(this).find('input[name="variation_price"]').val();
	    let varColor = $(this).find('input[name="variation_color"]').val();
	    let variation_color_id = $(this).find('input[name="variation_color_id"]').val();
	    let quantity = $(this).find('input[name="quantity"]').val();
	    let type = $(this).find('input[name="type"]').val();
	    
	    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });
	    
	    $.ajax({
            type: method,
            url: url,
            data: {
                id, variation_id, varSize, variation_size_id, variation_price, varColor, variation_color_id, quantity, type
              },
            success: function(res) {
                toastr.success(res.msg);
                if(res.status) {
                    window.location.reload();
                }
            }
        });
	   
    });
    
    $(document).on('click', 'button.do_order', function(e) {
        e.preventDefault();
    
        let url = $('form.order_form_home').attr('action');
        let method = $('form.order_form_home').attr('method');
        
        let id = $(this).closest('.modal').find('input[name="id"]').val();
        let variation_id = $(this).closest('.modal').find('input[name="variation_id"]').val();
        let varSize = $(this).closest('.modal').find('input[name="variation_size"]').val();
        let variation_size_id = $(this).closest('.modal').find('input[name="variation_size_id"]').val();
        let variation_price = $(this).closest('.modal').find('input[name="variation_price"]').val();
        let varColor = $(this).closest('.modal').find('input[name="variation_color"]').val();
        let variation_color_id = $(this).closest('.modal').find('input[name="variation_color_id"]').val();
        let quantity = $(this).closest('.modal').find('input[name="quantity"]').val();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });
    
        $.ajax({
            url: url, 
            type: method, 
            data: {id, variation_id, varSize, variation_size_id, variation_price, varColor, variation_color_id, quantity},
            success: function(response) {
                window.location.href= "{{ route('front.checkout.index') }}";
            },
            error: function(xhr, status, error) {
                console.error('Error placing order:', error);
            }
        });
    });




</script>

<script>
    $(document).on('click', '#sizes .size', function() {
        
        $('#sizes .size').removeClass('active');
        $(this).addClass('active');
        
        let product_id = $(this).data('proid');
        let variation_id = $(this).attr('value');
        let variation_size = $(this).data('varsize');
        let variation_size_id = $(this).data('varsizeid');
        let variation_price = parseFloat($(this).data('varprice'));
        
        $(this).closest('.modal').find('#test_for').text('Select Size : '+variation_size);
        $(this).closest('.modal').find('input[name="id"]').val(product_id);
        $(this).closest('.modal').find('input[name="variation_id"]').val(variation_id);
        $(this).closest('.modal').find('input[name="variation_size"]').val(variation_size);
        $(this).closest('.modal').find('input[name="variation_size_id"]').val(variation_size_id);
        $(this).closest('.modal').find('input[name="variation_price"]').val(variation_price);
   });
    $(document).on('click', '#colors .color', function() {
        
      $('#colors .color').removeClass('active');
      $(this).addClass('active');
      
      let product_id = $(this).data('proid');
      let variation_color = $(this).data('varcolor');
      let variation_color_id = $(this).data('colorid');
      let variation_size_id = $(this).closest('.modal').find('input[name="variation_size_id"]').val();
      
      $(this).closest('.modal').find('input[name="variation_color"]').val(variation_color);
      $(this).closest('.modal').find('input[name="variation_color_id"]').val(variation_color_id);

      $(this).closest('.modal').find('#selected_color').text('Select Color : '+variation_color);
      
      $.ajax({
          type: 'get',
          url: '{{ route("front.product.get-variation_color") }}',
          data: {
              product_id,
              variation_size_id,
              variation_color_id
          },
          success: function(res) {
            //   alert(res.pro_img);
              
            // $(this).closest('.modal').find('input[name="pro_img"]').val(res.pro_img);
            // alert(variation_color);
          }
      });
      
   });
</script>

@endpush