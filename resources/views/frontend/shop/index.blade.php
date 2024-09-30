@extends('frontend.app')
@section('title', $item_seo_name)
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
              
              .tool-btn {
                  display: none !important;
              }
              
              .show-short {
                  text-align: center !important;
              }
              
              .actions {
                  text-align: center !important;
              }
              
            }
            
            @media only screen and (min-width: 451px) and (max-width: 575px) {
                .product_content {
                    margin-top: 1% !important;
                }
                
                .tool-btn {
                    display: none !important;
                }
                .show-short {
                  text-align: center !important;
              }
              
              .actions {
                  text-align: center !important;
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

.wrapper {
  width: 325px;
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

.accordion-button:not(.collapsed) {
    color: var(--bs-accordion-active-color);
    background-color: #fff !important;
    box-shadow: inset 0 calc(-1* var(--bs-accordion-border-width)) 0 var(--bs-accordion-border-color);
}

.accordion-button:not(.collapsed)::after {
    background-image : var(--bs-accordion-btn-icon);
}

.accordion-button:not(.collapsed) {
    color: #000;
    background-color: #fff !important;
    box-shadow: inset 0 calc(-1* var(--bs-accordion-border-width)) 0 var(--bs-accordion-border-color);
    border-top-right-radius: 5px;
    border-top-left-radius: 5px;
}

.accordion-item:last-of-type .accordion-button.collapsed {
    border-bottom-right-radius: 5px !important;
    border-bottom-left-radius: 5px !important;
    border-top-left-radius: 5px !important;
    border-top-right-radius: 5px !important;
}

.accordion-item:first-of-type .accordion-button {
    border-top-left-radius: var(--bs-accordion-inner-border-radius);
    border-top-right-radius: var(--bs-accordion-inner-border-radius);
    border-bottom-left-radius: 5px !important;
    border-bottom-right-radius: 5px !important;
}

.accordion-item:first-of-type {
    border-top-left-radius: var(--bs-accordion-border-radius);
    border-top-right-radius: var(--bs-accordion-border-radius);
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
}

.accordion-item:last-of-type {
    border-bottom-right-radius: var(--bs-accordion-border-radius);
    border-bottom-left-radius: var(--bs-accordion-border-radius);
    border-top-right-radius: 5px !important;
    border-top-left-radius: 5px !important;
}

@media (min-width: 1280px) {
    #lc-toggle, #column-left .lc-close, .h-desk {
        display: none !important;
    }
}

.top-bar .page-heading {
    font-size: 16px;
    line-height: 30px;
    font-weight: bold;
}

.show-sort .form-group {
    display: inline-block;
    padding-left: 10px;
    margin-bottom: 0;
}

.top-bar .show-sort {
    text-align: right;
}

.show-sort .form-group label {
    padding-right: 5px;
    color: #666;
}

.show-sort .form-group * {
    display: inline-block;
}
.form-group label {
    font-size: 13px;
    font-weight: bold;
    line-height: 20px;
    margin-bottom: 5px;
    display: block;
}

.show-sort {
    text-align: right;
}

.show-sort .form-group select {
    background: #f1f3f5;
    padding: 6px 5px;
    font-size: 14px;
    border: none;
    position: relative;
    outline: none;
    height: 30px;
    max-width: 110px;
    border-radius: 5px;
}
     
    /*@media (min-width: 767px) {*/
    /*    .col-md-3 {*/
            /* Adjust these styles based on your specific requirements for mobile devices */
    /*        padding-right: 15px !important;*/
    /*        padding-left: 15px !important;*/
    /*    }*/
    /*}*/
</style>
        
        <div class="container-fluid">
            
            <div class="main-wrapper" id="filter_header">
                
            </div>
            
            <div class="main-wrapper">
                <div class="overlay-sidebar"></div>
                <div class="category-page col-lg-12 col-12 p-0 m-auto mt-2 mb-2">
                    <div class="row">
                        
                        <!-- filter section  -->
                        <section class="col-lg-3">
                            
                        <div class="accordion" id="accordionPrice">
                            <div class="accordion-item" style="margin-bottom: 10px;">
                                <h2 class="accordion-header" id="headingPrice">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePrice" aria-expanded="true" aria-controls="collapsePrice">
                                        Price Range
                                    </button>
                                </h2>
                                <div id="collapsePrice" class="accordion-collapse collapse show" aria-labelledby="headingPrice">
                                    <div class="accordion-body">
                                        <div class="d-flex">
                                            <div class="wrapper">
                                                <div class="slider">
                                                    <div class="progress"></div>
                                                </div>
                                                <div class="range-input">
                                                    <input type="range" class="range-min" min="0" max="20000" value="0" step="100">
                                                    <input type="range" class="range-max" min="0" max="20000" value="20000" step="100">
                                                </div>
                                                <div class="price-input">
                                                    <div class="field">
                                                        <input type="number" class="input-min" id="input-min" value="0" min="0" max="20000" step="100">
                                                    </div>
                                                    <div class="field">
                                                        <input type="number" class="input-max" id="input-max" value="20000" min="0" max="20000" step="100">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Categories
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                                    <div class="accordion-body">
                                        @foreach($categories as $key => $category)
                                            <div class="form-check py-2">
                                                <input type="checkbox" class="form-check-input shadow-none cat-item" value="{{ $category->id }}" id="{{ $key }}">
                                                <label class="form-check-label" for="{{ $key }}">
                                                    {{ $category->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                        
                    <!-- filter section  -->
                    <!-- Products -->
                        <section class="col-lg-9 col-md-12">
                                <div class="filter-footers" id="filter-footers" style=""><div class="c-intro" style="margin-bottom: 10px;">
                                <div class="card" style="width: 100%;">
                                    <div class="card-body">
                                        <div class="row">
                                          <div class="col-sm-4 col-xs-2 actions">
                                              <button class="tool-btn" id="lc-toggle"><i class="material-icons">filter_list</i> Filter</button>
                                              <label class="page-heading m-hide" style="margin-top: 5px;"></label>
                                          </div>
                                          <div class="col-sm-8 col-xs-10 show-sort">
                                              <div class="form-group rs-none">
                                                  <label>Show:</label>
                                                  <div class="custom-select">
                                                      <select id="input-limit">
                                                        <option value="20" selected="selected">20</option>
                                                        <option value="40">40</option>
                                                        <option value="60">60</option>
                                                        <option value="80">80</option>
                                                        <option value="100">100</option>
                                                        </select>
                                                          </div>
                                                      </div>
                                                      <div class="form-group">
                                                          <label>Sort By:</label>
                                                          <div class="custom-select">
                                                             <select id="input-sort">
                                                                    <option value="ASC">Price (Low &gt; High)</option>
                                                                    <option value="DESC">Price (High &gt; Low)</option>
                                                             </select>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                        <!--<p><span style="font-weight: bold;"></span></p>    -->
                                    </div>
                                </div>
                                </div>
                                </div>
                                <div class="product-box py-1 row">
                                    <div class="container text-center" style="padding: 15px;">
                                        <div class="row" id="filter_products">
                                            
                                        </div>
                                    </div>
                                </div>
                            
                            <div class="filter-footer" id="filter-footer" style="margin-top: 15px;">
                                
                            </div>
                            
                        </section>
                    <!-- Products -->
                    </div>
                </div>
            </div>
        </div>
        
@endsection

@push('js')
<script>
$(document).ready(function () {
    
    applyFilters();

    $('.cat-item, .category-filter, #input-min, #input-max, #input-limit,#input-sort').on('change keyup', applyFilters);
    
    // Apply Filter
    
    function applyFilters() {
        
        var selectedCategories = $('.cat-item:checked').map(function() {
            return $(this).val();
        }).get();
        
        var slug = '{{ request()->route('slug') }}';
        
        let minPrice   = parseInt($('#input-min').val());
        let maxPrice   = parseInt($('#input-max').val());
       
        let showNumber = $('#input-limit').val();
        let orderBy    = $('#input-sort').val();
        
        $.ajax({
            url: '/shop/' + slug,
            method: 'GET',
            data: {
                categories : selectedCategories,
                minPrice   : minPrice,
                maxPrice   : maxPrice,
                showNumber : showNumber,
                orderBy    : orderBy
            },
            success: function(response) {
                $('#filter_products').html(response.filter_products);
                $('#filter_header').html(response.filter_header);
                $('#filter-footer').html(response.filter_footer);
                $('label.page-heading').html(response.item_name);
                document.title = response.item_seo_name;
            },
            error: function(xhr) {
                console.log("An error occurred: " + xhr.status + " " + xhr.statusText);
            }
        });
    }
    
    // Apply Filter
    
    $(document).on('click', '.add-to-cart', function (e) {
        let id = $(this).data('id');
        let url = $(this).data('url');
        addToCart(url, id);
    });

    function addToCart(url, id, variation = "", quantity = 1) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: "POST",
            url: url,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: { id, quantity, variation},
            success: function (res) {
                if (res.status) {
                    window.location.reload();
                } else {
                    toastr.error(res.msg);
                }
            },
            error: function (xhr, status, error) {
                toastr.error('An error occurred while processing your request.');
            }
        });
    }
    
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
    
    
    $(document).on('click','a.productModal',function(e){
        e.preventDefault();
        let url=$(this).attr('href');
        let productId=$(this).data('productid');
        
        $.ajax({
            url:url,
            method:"GET",
            data:{productId},
            success:function(res){
                $('div#commonModal').html(res.html).modal('show');
            }
        });
    });
});


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
   
   const rangeInput = document.querySelectorAll(".range-input input"),
      priceInput = document.querySelectorAll(".price-input input"),
      range = document.querySelector(".slider .progress");
let priceGap = 1000;

priceInput.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minPrice = parseInt(priceInput[0].value),
        maxPrice = parseInt(priceInput[1].value);

    if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
      if (e.target.className === "input-min") {
        rangeInput[0].value = minPrice;
        range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
      } else {
        rangeInput[1].value = maxPrice;
        range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
      }
    }
    // Trigger change event to apply filters
    $(e.target).trigger('change');
  });
});

rangeInput.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);

    if (maxVal - minVal < priceGap) {
      if (e.target.className === "range-min") {
        rangeInput[0].value = maxVal - priceGap;
      } else {
        rangeInput[1].value = minVal + priceGap;
      }
    } else {
      priceInput[0].value = minVal;
      priceInput[1].value = maxVal;
      range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
      range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
    }
    // Trigger change event to apply filters
    $(priceInput[0]).trigger('change');
    $(priceInput[1]).trigger('change');
  });
});

   
        // const rangeInput = document.querySelectorAll(".range-input input"),
        // priceInput = document.querySelectorAll(".price-input input"),
        // range = document.querySelector(".slider .progress");
        // let priceGap = 1000;
        
        // priceInput.forEach((input) => {
        //   input.addEventListener("input", (e) => {
        //     let minPrice = parseInt(priceInput[0].value),
        //         maxPrice = parseInt(priceInput[1].value);
        
        //     if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
        //       if (e.target.className === "input-min") {
        //         rangeInput[0].value = minPrice;
        //         range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
        //       } else {
        //         rangeInput[1].value = maxPrice;
        //         range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
        //       }
        //     }
        //   });
        // });
        
        // rangeInput.forEach((input) => {
        //   input.addEventListener("input", (e) => {
        //     let minVal = parseInt(rangeInput[0].value),
        //         maxVal = parseInt(rangeInput[1].value);
        
        //     if (maxVal - minVal < priceGap) {
        //       if (e.target.className === "range-min") {
        //         rangeInput[0].value = maxVal - priceGap;
        //       } else {
        //         rangeInput[1].value = minVal + priceGap;
        //       }
        //     } else {
        //       priceInput[0].value = minVal;
        //       priceInput[1].value = maxVal;
        //       range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
        //       range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        //     }
        //   });
        // });

   
//   const rangeInput = document.querySelectorAll(".range-input input"),
//   priceInput = document.querySelectorAll(".price-input input"),
//   range = document.querySelector(".slider .progress");
// let priceGap = 1000;

// priceInput.forEach((input) => {
//   input.addEventListener("input", (e) => {
//     let minPrice = parseInt(priceInput[0].value),
//       maxPrice = parseInt(priceInput[1].value);

//     if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
//       if (e.target.className === "input-min") {
//         rangeInput[0].value = minPrice;
//         range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
//       } else {
//         rangeInput[1].value = maxPrice;
//         range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
//       }
//     }
//   });
// });

// rangeInput.forEach((input) => {
//   input.addEventListener("input", (e) => {
//     let minVal = parseInt(rangeInput[0].value),
//       maxVal = parseInt(rangeInput[1].value);

//     if (maxVal - minVal < priceGap) {
//       if (e.target.className === "range-min") {
//         rangeInput[0].value = maxVal - priceGap;
//       } else {
//         rangeInput[1].value = minVal + priceGap;
//       }
//     } else {
//       priceInput[0].value = minVal;
//       priceInput[1].value = maxVal;
//       range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
//       range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
//     }
//   });
// });

   
</script>

@endpush