@extends('frontend.app')
@section('title', 'Shop Product List')
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
        background: #00712D;
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

.wrapper {
  width: 100%;
  background: #fff;
  /*border-radius: 10px;*/
  padding: 25px 25px 0px;
  box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1);
}
header h2 {
  font-size: 24px;
  font-weight: 600;
}
header p {
  margin-top: 5px;
  font-size: 16px;
}
.price-input {
  width: 100%;
  display: flex;
  margin: 30px 0 35px;
}
.price-input .field {
  display: flex;
  width: 100%;
  height: 45px;
  align-items: center;
}
.field input {
  width: 70%;
  height: 70%;
  outline: none;
  font-size: 19px;
  margin-left: 12px;
  border-radius: 2px;
  text-align: center;
  border: 1px solid #999;
  -moz-appearance: textfield;
}
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
  -webkit-appearance: none;
}
.price-input .separator {
  width: 130px;
  display: flex;
  font-size: 19px;
  align-items: center;
  justify-content: center;
}
.slider {
  height: 5px;
  position: relative;
  background: #ddd;
  border-radius: 5px;
}
.slider .progress {
  height: 100%;
  left: 5%;
  right: 5%;
  position: absolute;
  border-radius: 5px;
  background: #17a2b8;
}
.range-input {
  position: relative;
}
.range-input input {
  position: absolute;
  width: 100%;
  height: 5px;
  top: -5px;
  background: none;
  pointer-events: none;
  -webkit-appearance: none;
  -moz-appearance: none;
}
input[type="range"]::-webkit-slider-thumb {
  height: 17px;
  width: 17px;
  border-radius: 50%;
  background: #17a2b8;
  pointer-events: auto;
  -webkit-appearance: none;
  box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
}
input[type="range"]::-moz-range-thumb {
  height: 17px;
  width: 17px;
  border: none;
  border-radius: 50%;
  background: #17a2b8;
  pointer-events: auto;
  -moz-appearance: none;
  box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
}

/* Support */
.support-box {
  top: 2rem;
  position: relative;
  bottom: 0;
  text-align: center;
  display: block;
}
.b-btn {
  color: white;
  text-decoration: none;
  font-weight: bold;
}
.b-btn.paypal i {
  color: blue;
}
.b-btn:hover {
  text-decoration: none;
  font-weight: bold;
}
.b-btn i {
  font-size: 20px;
  color: yellow;
  margin-top: 2rem;
}

.img-thumbnail {
    padding: .25rem;
    background-color: #fff;
    border: 1px solid var(--bs-border-color);
    border-radius: .375rem;
    max-width: 100%;
    height: revert-layer;
}

.ppl-blog-list {
    background: #fff;
    padding: 15px;
}

.article-popular-thumb {
    clear: both;
    border-bottom: 1px solid #ddd;
    padding-bottom: 20px;
    margin-bottom: 20px;
}

.ppl-blog-info .title-name {
    font-weight: 700;
    margin-bottom: 5px;
    height: 50px;
    overflow: hidden;
}

.meta .author {
    margin-right: 30px;
}

.meta span span {
    vertical-align: middle;
}

.ppl-btn {
    color: #fc8a1a;
    font-size: 14px;
    font-weight: 500;
    margin-top: 10px;
    display: block;
}

.article-popular-thumb a img {
    float: left;
    margin-right: 15px;
}
    
</style>
        
        <div class="container-fluid">
            
            <div class="main-wrapper" id="filter_header">
                
            </div>
            
            <div class="main-wrapper">
                <div class="overlay-sidebar"></div>
                <div class="category-page col-lg-12 col-12 p-0 m-auto mt-2 mb-2">
                    <div class="row">
                        
                        <!-- Products -->
                        <section class="products-box col-lg-8 col-md-12">
                            <div class="bg-white p-3 pt-1">
                                <div class="product-box py-1 row">
                                    <div class="container" style="padding: 15px;">
                                        <div class="row" id="filter_products">
                                           <div id="content" class="blog-left">
                                                <div class="col-lg-12 col-md-12">
                                                <img class="img-thumbnail" 
                                                    src="{{ asset('uploads/custom-images/'.$single_blog->image) }}" style="width: 100%;" height="500">
                                                </div>
                                                <div class="article-title m-tb-15" style="padding: 8px 0px;">
                                                    <h3 itemprop="headline" style="font-weight: 800;">{{ $single_blog->title }}</h3>
                                                </div>
                                                <div class="meta" style="margin-bottom: 10px;">
                                                    <span class="author"><i class="fa-solid fa-user" style="margin-right: 8px;"></i><span itemprop="author">{{ $single_blog->admin->name }}</span></span>
                                                    <span class="date"><i class="fa fa-clock" style="margin-right: 8px;"></i><span>{{ $single_blog->created_at }}</span></span>
                                                </div>
                                                <div class="article-description" itemprop="articleBody">
                                                    {!! $single_blog->description !!}  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Products -->
                    
                        <!-- Review -->
                        
                        <!-- Review -->
                    
                        <!-- filter section  -->
                        <section class="sidebar-filter col-lg-4">
                            <div class="bg-white p-3">
                                <div class="accordion-box">
                                    <div class="accordion-title" style="background: #00712D;">
                                        <span class="circle">
                                            <i class="fas fas fa-minus"></i>
                                        </span>
                                        <span>
                                            Popular Blogs
                                        </span>
                                    </div>
                                    <div class="accordion-body">
                                        <div class="wrapper">
                                            <div class="ppl-blog-list">
                                                @foreach($popular_blogs as $p_blog)
                                                    <div class="article-popular-thumb">
                                                        <a href="https://www.startech.com.bd/blog/smart-tv-buying-guide">
                                                        <img src="{{ asset('uploads/custom-images/'.$p_blog->image) }}" style="height: 70px;width: 70px;"></a>
                                                        <div class="ppl-blog-info">
                                                            <div class="title-name">{{ $p_blog->title }}</div>
                                                            <div class="meta">
                                                                <span class="author"><span>{{ $p_blog->admin->name }}</span></span>
                                                                <span class="date"><span>{{ $p_blog->created_at }}</span></span>
                                                            </div>
                                                        </div>
                                                        <a href="{{ route('front.blogDetails',[$p_blog->id]) }}" class="ppl-btn">Read More</a>
                                                    </div>
                                                @endforeach
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </section>
                    <!-- filter section  -->
                    </div>
                    
                    
                    
                    
                    
                </div>
                <div class="category-page col-lg-12 col-12 p-0 m-auto mt-2 mb-2" style="margin-bottom: 25px !important;">
                    <div class="row">
                    <!-- filter section  -->
                    <section class="products-box col-lg-8 col-md-12">
                        <div class="bg-white p-3 pt-1">
                            <div class="container" style="padding: 15px;">
                            <div class="row" id="filter_products">
                               <div id="content" class="blog-left">
                                   <h3>Enter Comment Here</h3>
                                   <form action="{{ route('front.blogComment') }}" method="POST" id="commentForm">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" value="{{ $single_blog->id }}" name="blog_id">
                                            <div class="col-lg-12 col-12 mb-3 form-floating">
                                                  <input type="text" class="form-control shadow-none" name="name" id="name" placeholder="Enter Your Name">
                                                  <label for="name" class="ps-4">Your Name</label>
                                            </div>
            
                                            <div class="col-lg-12 col-12 mb-3 form-floating">
                                                  <input type="text" class="form-control shadow-none" name="email" id="email" placeholder="Enter Your Email">
                                                  <label for="email" class="ps-4">Your Email</label>
                                            </div>
            
                                        </div>
            
                                        <div class="row">
                                            <div class="col-lg-12 col-12 mb-3 form-floating">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control shadow-none" name="comment" value="" id="comment" placeholder="Enter Your Comment">
                                                <label for="comment">Enter Your Comment</label>
                                          </div>
                                            </div>
                                        </div>
                                        <button type="submit" 
                                            class="btn bg-blue text-light" 
                                            style="font-family: 'Kalpurush', sans-serif;height: 50px;font-size: 20px;background: #00712D !important;">
                                            Submit <i class="fas fa-arrow-right"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </section>                
                    <!-- filter section  -->
                    </div>
                </div>
            </div>
        </div>
        
@endsection

@push('js')

<script>
    $(document).ready(function(){
        
        $(document).on('submit','form#commentForm',function(e){
            e.preventDefault();
            
            let url = $(this).attr('action');
            let method = $(this).attr('method');
            let data = $(this).serialize();
            
            $.ajax({
                type    : method,
                url     : url,
                data    : data,
                success : function(res){
                    if(res.success){
                        toastr.success(res.msg);
                        window.location.reload();
                    } else {
                        toastr.error(res.msg);
                    }
                }
            });
        });
        
    });
</script>

@endpush