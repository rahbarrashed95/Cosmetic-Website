@php 
    $settings = DB::table('settings')->first();
@endphp
@extends('frontend.app')
@section('title', $home_seo_title)
@push('css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<style>

    .ytp-info-panel-preview {
        visibility: none !important;
    }
    
    .ytp-chrome-top {
        visibility: none !important;
    }

    #product_video_gallery iframe {
        height: 250px;
    }

    .feature-cat .owl-nav button.owl-prev {
        visibility :hidden;
    }
    
    .feature-cat .owl-nav button.owl-next {
        visibility :hidden;
    }
    .feature-catf .owl-nav button.owl-prev {
        visibility :hidden;
    }
    
    .feature-catf .owl-nav button.owl-next {
        visibility :hidden;
    }

    @media(max-width: 575px){
        .slider_image{
            aspect-ratio: 2.5/1;
        }
    }
    
    .p-4 {
    padding: 0.3rem !important;
}
 
   @media (max-width: 1024px){
       
       .youtube-icon {
                   height: 45% !important;
        width: 33% !important;
       }
       
     .prodCatcus{
       	  /*background: #E4C1B1;*/
       	  color: #ffffff;
          border-radius: 0px;
          width: 100%;
          padding: 0px;
          margin: 0px;
     	}
       .carousel-item img{
           height: 300px;
       }
       
       .left_side_img img {
           height: 300px !important;
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
           width: 80% !important;
       }
     
     .prd_img{
     	margin-bottom: -20px !important;
     }
   }
   
   @media only screen and (min-width: 328px) and (max-width: 470px) {
       
       .product-box .product-item .label_product {
           width: 45% !important;
       }
       
       .product-box .product-item .label_product span {
           font-size: 11px !important;
           margin-top: 4px;
       }
   }
   
   @media only screen and (min-width: 588px) and (max-width: 670px) {
       
       .product-box .product-item .label_product {
           width: 45% !important;
       }
       
       .product-box .product-item .label_product span {
           font-size: 11px !important;
           margin-top: 4px;
       }
   }
   
   @media only screen and (min-width: 250px) and (max-width: 319px) {
     .prodCatcus{
       	  background: #E4C1B1;
       	  color: #ffffff;
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
       
    }
    
    @media only screen and (min-width: 367px) and (max-width: 385px) {
        .semi {
            font-size: 13px !important;
        }
    }
    
    @media only screen and (min-width: 320px) and (max-width: 360px) {
        .feature-cat .category img {
        height: 75px !important;
        width: 253px !important;
        border-radius: 8px;
    } 
    
   
    .certificate_title {
        font-size: 12px !important;
    }
    
    
/*    .p-4 {*/
/*    padding: 0.3rem !important;*/
/*}*/
    
    }
   
   @media only screen and (min-width: 361px) and (max-width: 375px) {
       
    .feature-cat .category img {
        height: 84px !important;
        width: 253px !important;
        border-radius: 8px;
    }   
    
       .certificate_title {
        font-size: 12px !important;
    }
       
        #banner-slider .carousel-inner img {
        height: 180px !important;
    }
    
    .feature-cat .category p {
        min-height: 30px !important;
        margin-bottom: 0px !important;
    }
    
    .feature-cat .p-4 {
        /*padding: 0.5rem !important;*/
    }
    
    .category {
        height: 100% !important;
    }
    
    .product_content a {
       padding-top: 6% !important;
       font-size: 12px !important;
    }
       
     .prodCatcus{
       	  /*background: #E4C1B1;*/
       	  color: #ffffff;
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
       .col-lg-9 {
           padding-right: 0px !important;
       }
       .select2-container {
           width: 70% !important;
       }
       .left_side_img img{
          height: auto !important; 
       }
     .primcusImg{
     	/*margin-left: 15% !important;*/
     }
     
     .seccusImg{
     	/*margin-left: 15% !important;*/
     }
     .product_content  {
         margin-top: 14% !important;
     }
     .bg-orange{
     		width: 40% !important;
       		height: 33px !important;
       		font-size: 14px !important;
     	}
     .slick-next .slick-arrow {
     	margin-top : -14px !important;
     	}
     
     header img {
          height: 70px;
          width: 220px;
          padding-left: 0;
      }
     
     .left_side_img{
     		display:none
     	}
     	
    }
    @media only screen and (min-width: 320px) and (max-width: 575px) {
        
        .youtube-icon {
            height: 45% !important;
            width: 33% !important;
        }
        .gallery_img {
        padding: 5px !important;
    }
        
    .feature-cat .category img {
            height: 80% !important;
            /*width: 90% !important;*/
            border-radius: 50%;
        }
        
        .certificate_title {
        font-size: 12px !important;
    }
      
        
         #banner-slider .carousel-inner img {
        height: 230px !important;
    }
    
    .feature-cat .category p {
        min-height: 30px !important;
        /*margin-bottom: 0px !important;*/
    }
    
    .feature-cat .p-4 {
        /*padding: 0.5rem !important;*/
    }
    
    .category {
        height: 100% !important;
    }
        
      .prodCatcus{
       	  /*background: #E4C1B1;*/
       	  color: #ffffff;
          border-radius: 0px;
          border-top-right-radius: 70px;
          width: 100%;
          padding: 0px;
          margin: 0px;
          font-size: 20px;
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
      
      .prd_prc_bx{
      	margin-top: 1%;
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
      
      .product_content a {
       padding-top: 3% !important;
       font-size: 12px !important;
    }
      
    }
 
 	 @media only screen and (min-width: 376px) and (max-width: 379px) {
    
       .primcusImg{
       			/*margin-left: 15%;*/
       }
       
       .certificate_title {
        font-size: 12px !important;
    }
       
 	}
 
    @media only screen and (min-width: 768px) and (max-width: 992px) {
    
       .primcusImg{
       			/*margin-left: 15%;*/
       }
       .left_side_img img {
           display: none !important;
       }
 	}
 	
 	@media only screen and (min-width: 576px) and (max-width: 579px) {
 	    .left_side_img img {
 	        display: none;
 	    }
 	}
 	
 	@media only screen and (min-width: 580px) and (max-width: 768px) {
 	    .left_side_img img {
 	        display: none;
 	    }
 	}
    
     @media only screen and (min-width: 576px) and (max-width: 991px) {
       .prodCatcus{
       	  /*background: #E4C1B1;*/
       	  color: #ffffff;
          border-radius: 0px;
          border-top-right-radius: 70px;
          width: 100%;
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
           width: 60% !important;
       }
       .left_side_img img{
          height: auto !important; 
       }
       
       .prd_img{
     	margin-bottom: -20px !important;
     }
       
    }
    
    @media only screen and (min-width: 992px) and (max-width: 1348px) {
        .prodCatcus{
       	  /*background: #E4C1B1;*/
       	  color: #ffffff;
          border-radius: 0px;
          border-top-right-radius: 70px;
          width: 100%;
          padding: 0px;
          margin: 0px;
     	}
     	
     	.footter_img {
            left: 44% !important;
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
    
    
    @media only screen and (min-width: 378px) and (max-width: 412px) {
        .bg-orange{
            font-size: 8px !important;
        }     
      
      .prd_prc_bx{
      		padding-bottom: 6px !important;
    		/*margin-top:10% !important;*/
      	}
      
      
    }
    
    .owl-carousel {
        overflow: hidden !important;
    }
    
 .category {
            position: relative; /* Create a positioning context */
            display: inline-block; /* Allow wrapping */
        }

        .category img {
            display: block; /* Prevent extra space below the image */
            border-radius: 10px; /* Keep the border radius */
        }

        .youtube-icon {
            position: absolute; /* Position the icon absolutely */
            top: 50%; /* Center vertically */
            left: 50%; /* Center horizontally */
            transform: translate(-50%, -50%); /* Offset the icon */
            z-index: 1; /* Ensure icon is above the image */
        }
        
        .single-img {
          position: relative;
        }
        
        .img-overlay {
          position: absolute;
          bottom: 0;
          left: 0;
          right: 0;
          background-color: #ffb0a7;
          overflow: hidden;
          width: 100%;
          height: 0;
          transition: .5s ease;
        }
        
        .single-img:hover .img-overlay {
          height: 20%;
        }
        
        .text {
          position: absolute;
          top: 50%;
          left: 50%;
          -webkit-transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
          color: #fff;
          text-align: center;
          font-size: 20px;
          font-family: poppins;
          text-transform: uppercase;
          letter-spacing: 2px;
          font-weight: bold;
          width: 100%;
        }
        .text span{
          font-weight: 300;
        }

    
</style>

<div class="main-wrapper mt-lg-4 mt-2">
   <!-- Banner Section Start  -->
   <div class="w-100" style="margin-bottom: 10px;">
       
      <div class="row w-100 ms-0" style="width: 96% !important;margin: 0 auto !important;">
         <div class="col-lg-12 col-12 h-100" style="padding-left: 0px;">
            <div id="banner-slider" class="carousel slide" data-bs-ride="true">
               @if (!empty($slider))
               <div class="carousel-indicators">
                  @foreach ($slider as $index => $sl)
                  <button type="button" data-bs-target="#banner-slider" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-label="Slide 1"></button>
                  @endforeach
               </div>
               <div class="carousel-inner">
                  @foreach ($slider as $index => $sl)
                  <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                     <img src="{{ asset($sl->image) }}" class="d-block w-100 slider_image" alt="Slider Image">
                  </div>
                  @endforeach
               </div>
               <button class="carousel-control-prev" type="button" data-bs-target="#banner-slider" data-bs-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Previous</span>
               </button>
               <button class="carousel-control-next" type="button" data-bs-target="#banner-slider" data-bs-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Next</span>
               </button>
               @else
               <strong class="text-center text-danger">No Sliders are Available</strong>
               @endif
            </div>
         </div>
         
         <!--<div class="col-lg-3 col-12 p-0" style="flex: 0 0 auto;width: 24%;margin-left: 1%;">-->
         <!--   <div class="banner_sidebar">-->
              
         <!--      <div class="col-12 left_side_img" style="box-shadow: 0px 0px 5px rgba(0, 113, 220, 0.15);">-->
         <!--          <a href="{{$about->title_three}}"><img src="{{asset($about->video_background)}}" style="height: 400px;" alt="" class="img-fluid w-100"></a>-->
         <!--      </div>-->
         <!--   </div>-->
         <!--</div>-->
         
      </div>
      <div class="container-fluid d-none">
          <div class="slider-bottom mt-2  mt-lg-4 border-1 rounded-5 bg-white text-center ">
         <p class="mb-lg-4 mb-2"> <marquee style="margin-top: 6px;font-size: 14px;" behavior="" direction="">{{$about->description_three}}</marquee> </p>
      </div>
      </div>
   </div>
   <!-- Banner Section End  -->
   
   
    @if($feateuredCategories->count())
   <section class="my-lg-5" style="margin-top: 0px !important;display: none">
      <div class="container-fluid p-0" style="">
         <div class="text-center" style="background: #ffebe1e8 !important;padding: 4px;color: #ffffff;margin-bottom: 20px;display: none;">
            <h2 style="margin:0px;color: #000;"><strong>Featured Category</strong></h2>
         </div>
         <div class="container-fluid p-0 p-lg-3 py-3">
            <div class="container-fluid p-1">
               <div class="row feature-cat px-3">
                  <div class="col-lg-12 col-md-12">
                     <div class="owl-carousel slider_product_cat">
                        @forelse($feateuredCategories as $key => $item)
                        <div class="">
                            <a href="{{ route('front.shop', [
                                                                'slug'=> $item->category->slug 
                                                            ] ) }}">
                           <div class="category text-center rounded-3">
                                @if(!empty($item->category->slug))
                                     <img src="{{ asset('uploads/custom-images2/'.$item->category->image) }}" alt="" class="img-fluid">
                                     <p class="pt-3 mb-0 font-14 bold" style="color: #000;">{{ $item->category->name }}</p>
                                @endif
                           </div>
                           </a>
                        </div>
                        @empty
                        <strong>No Categories are Available!</strong>
                        @endforelse
                     </div>
                  </div>
               </div>
            </div>
           
         </div>
      </div>
   </section>
   @else
   @endif
   
   @if($feateuredCategories->count())
   <section class="my-lg-5" style="margin-top: 0px !important;display: none;">
      <div class="container-fluid p-0" style="">
         <div class="text-center" style="background: #ffebe1e8 !important;;padding: 4px;color: #ffffff;margin-bottom: 20px;display: none">
            <h2 style="margin:0px"><strong>Featured Category</strong></h2>
         </div>
         <div class="container-fluid p-0 p-lg-3 py-3">
            <div class="container-fluid p-1">
               <div class="row feature-cat px-3">
                  <div class="col-lg-12 col-md-12">
                     <div class="row">
                        @forelse($feateuredCategories as $key => $item)
                        <div class="col-lg-2 col-lg-feaCat col-md-2 col-sm-3 col-4 my-1 p-1">
                            <a href="{{ route('front.subcategory', [
                                     'type'=>'subcategory',
                                     'slug'=> $item->category->slug
                                     ] ) }}">
                           <div class="category text-center p-4 rounded-3">
                                @if(!empty($item->category->slug))
                                     <img src="{{ asset('uploads/category/big-images/'.$item->category->image) }}" alt="" class="img-fluid">
                                     <p class="pt-3 mb-0 font-14 bold" style="color: #000;font-family: unset;">{{ $item->category->name }}</p>
                                @endif
                           </div>
                           </a>
                        </div>
                        @empty
                        <strong>No Categories are Available!</strong>
                        @endforelse
                     </div>
                  </div>
               </div>
            </div>
           
         </div>
      </div>
   </section>
   @else
   @endif
   
   @if($feateuredCategories->count())
   <section class="my-lg-5" style="margin-top: 0px !important;">
      <div class="container-fluid p-0" style="">
         <div class="text-center" style="background: #ffebe1e8 !important;;padding: 4px;color: #ffffff;margin-bottom: 20px;display: none">
            <h2 style="margin:0px"><strong>Featured Category</strong></h2>
         </div>
         <div class="container-fluid p-0 p-lg-3 py-3">
            <div class="container-fluid p-1">
               <div class="row feature-cat px-3">
                  <div class="col-lg-12 col-md-12">
                     <div class="row">
                        @forelse($feateuredCategories as $key => $item)
                        <div class="col-lg-2 col-lg-feaCat col-md-2 col-sm-4 col-6 p-1" style="">
                            <a style="" href="{{ route('front.subcategory', [
                                     'type'=>'subcategory',
                                     'slug'=> $item->category->slug
                                     ] ) }}">
                           <div class="single-img" style="">
                                @if(!empty($item->category->slug))
                                     <img src="{{ asset('uploads/category/big-images/'.$item->category->image) }}" alt="" style="border-radius: 12px;border: 12px solid #ffb0a7;" class="img-fluid w-100">
                                     <div class="img-overlay">
                                      <div class="text">{{ $item->category->name }}</div>
                                    </div>
                                     <!--<p class="pt-3 mb-0 font-14 bold" style="color: #000;font-family: unset;">{{ $item->category->name }}</p>-->
                                @endif
                           </div>
                           </a>
                        </div>
                        @empty
                        <strong>No Categories are Available!</strong>
                        @endforelse
                     </div>
                  </div>
               </div>
            </div>
           
         </div>
      </div>
   </section>
   @else
   @endif
   
   <section id="popular_products_section">

   
    </section> 
   
   <div class="container-fluid">
       <div class="row">
           
           @foreach($offers as $offer)
               
                <div class="col-md-4">
                    <div class="media_image" style="padding: 10px; margin-bottom: 10px; background-image: url('{{ asset($offer->image) }}'); background-size: cover; background-position: center; height: 400px; border-radius: 10px;">
                        <a href="{{ route('front.get_offer_product',[$offer->id]) }}" class="btn" style="position: relative;top: 75%;left: 10%;background: #fff;width: 40%;padding: 9px;font-weight: 700;">Shop Now</a>
                    </div>
                </div>
           
           @endforeach
           
           
       </div>
   </div>
   
   <section id="combo_products_section">

   
   </section> 
   
   
   @if($feateuredCategories->count())
   <section class="my-lg-5 certification" style="margin-top: 35px !important;">
      <div class="container-fluid p-0" style="">
         <div class="text-center" style="padding: 4px;color: #ffffff;margin-bottom: 35px;">
            <h2 class="certificate_title" style="margin:0px;color: #000;width: 50%;margin:0 auto;"><strong>We're clean, we're green, we're sustainable, we're all that you need!</strong></h2>
         </div>
         <div class="container-fluid p-0 p-lg-3 py-3">
            <div class="container-fluid p-1">
               <div class="row feature-cat px-3">
                  <div class="col-lg-12 col-md-12">
                     <div class="owl-carousel slider_product_cer">
                         
                        @foreach($certifications as $certification)
                        
                        <div class="">
                            <a href="">
                            <div class="text-center rounded-3">
                                <img src="{{ asset($certification->image) }}" alt="" class="img-fluid">
                                <p class="pt-3 mb-0 font-14 bold" style="color: #000;">{{ $certification->title }}</p>
                            </div>
                           </a>
                        </div>
                        
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
           
         </div>
      </div>
   </section>
   @else
   @endif
   
   <section class="my-lg-5" style="margin-top: 0px !important;">
      <div class="container-fluid p-0" style="">
         <div class="text-center" style="padding: 4px;color: #ffffff;margin-bottom: 20px;">
            <h2 style="margin:0px;color: #000;"><strong>Discover Our Video</strong></h2>
         </div>
         <div class="container-fluid p-0 p-lg-3 py-3">
            <div class="container-fluid p-1">
               <div class="row feature-catf px-3">
                  <div class="col-lg-12 col-md-12">
                     <div class="owl-carousel slider_product_gal">
                        @forelse($video_galleries as $key => $item)
                        <div class="gallery_img" style="padding: 20px;">
                           <!-- <a href="{{ $item->video_title }}" class="video_gal" data-id="{{ $item->id }}">-->
                           <!--     <div class="category text-center rounded-3">-->
                           <!--         <img width="48" height="48" src="https://img.icons8.com/color/48/youtube-play.png" alt="youtube-play"/>-->
                           <!--         <img src="{{ asset($item->thumb_img) }}" style="height: auto;width: 100%;border-radius: 10px;">-->
                           <!--     </div>-->
                           <!--</a>-->
                           <a href="{{ $item->video_title }}" class="video_gal" data-id="{{ $item->id }}">
                                <div class="category text-center rounded-3">
                                    <img class="youtube-icon" width="80" height="60" src="https://img.icons8.com/color/120/youtube-play.png" alt="youtube-play"/>
                                    <img src="{{ asset($item->thumb_img) }}" style="height: auto; width: 100%; border-radius: 10px;">
                                </div>
                            </a>
                        </div>
                        @empty
                        <strong>No Categories are Available!</strong>
                        @endforelse
                     </div>
                  </div>
               </div>
            </div>
           
         </div>
      </div>
   </section>
   
   
   @if($feateuredCategories->count())
   <section class="my-lg-5" style="margin-top: 0px !important;display: none;">
      <div class="container-fluid p-0" style="">
         <div class="text-center" style="padding: 4px;color: #ffffff;margin-bottom: 20px;">
            <h2 style="margin:0px;color: #000;"><strong>Video</strong></h2>
         </div>
         <div class="container-fluid p-0 p-lg-3 py-3">
            <div class="container-fluid p-1">
               <div class="row feature-cat px-3">
                  <div class="col-lg-12 col-md-12">
                     <div class="owl-carousel slider_product_cat">
                        @forelse($feateuredCategories as $key => $item)
                        <div class="">
                            <a href="{{ route('front.shop', [
                                                                'slug'=> $item->category->slug 
                                                            ] ) }}">
                           <div class="category text-center rounded-3">
                                @if(!empty($item->category->slug))
                                     <img src="{{ asset('uploads/custom-images2/'.$item->category->image) }}" alt="" class="img-fluid">
                                     <p class="pt-3 mb-0 font-14 bold" style="color: #000;">{{ $item->category->name }}</p>
                                @endif
                           </div>
                           </a>
                        </div>
                        @empty
                        <strong>No Categories are Available!</strong>
                        @endforelse
                     </div>
                  </div>
               </div>
            </div>
           
         </div>
      </div>
   </section>
   @else
   @endif
   
   
   
   <!-- Categories Start -->
   
  
   <!-- Categories End -->
   
   <!-- Product Sliders Start  -->
   
   
<!--<section id="popular_products_section">-->

   
<!--</section>   -->
   
@if($flashSell->count())
   <div class="bg-gradient container-fluid d-none" style="background: #ffebe1e8 !important;">
    <div class="col-12 product-header">
        <div class="section_title text-light">
           <a href="{{route('front.flash-sell')}}" style="color: #218A41;"> <h4 class="p-1 m-0 prodCatcus" style="text-align:center">Flash Sell</h4> </a>
        </div>
    </div>
</div>
@else
@endif



   
   @if(count($flashSell))  
   <div class="container-fluid p-0 d-none">
      <div class="product-box">
         <div class="owl-carousel product_slider_sell">
            @forelse($flashSell as $key => $sale)
            <div class="product-item" style="">
               <div class="product_thumb bg-white prd_img" style="">
                   @if(!empty($sale->product->id))
                    <a class="primary_img " href="{{ route('front.product.show', [ $sale->product->slug ] ) }}"><img src="{{ asset('uploads/custom-images2/'.$sale->product->thumb_image) }}" class="primcusImg" alt=""></a>
                    <a class="secondary_img " href="{{ route('front.product.show', [ $sale->product->slug ] ) }}"><img src="{{ asset('uploads/custom-images2/'.$sale->product->thumb_image) }}" class="seccusImg" alt=""></a>
                    @endif
                    
                   @if($sale->product->offer_price > 0)
                    <div class="label_product" style="width: 102px;">
                        <span class="label_sale" style="padding-top: 2px;">{{ BanglaText('offer') }}</span>
                    </div>
                    @endif
                  @if($sale->product->is_free_shipping > 0)
                    <div class="label_product" style="width: 102px; background:#3276B1; left: 0%; border-radius: 5px 30px 30px 5px">
                        <span class="label_sale" style="padding-top: 2px;">{{ BanglaText('free') }}</span>
                    </div>
                    @endif
                  
               </div>
               <div class="product_content" style="border-top:3px solid #EDEDEF; margin-top: 10%;">
                  <h4 class="ps-1" style="height: 40px;text-align: center;">
                      @if(!empty($sale->product->id))
                     <a href="{{ route('front.product.show', [ $sale->product->slug ] ) }}" class="font-14" style="font-size:14px">
                         {{ \Illuminate\Support\Str::limit($sale->product->name, 35)}}
                         </a>
                      @endif
                  </h4>
                  <div class="subText" data-reactid=".1n7kkwy0qp6.b.2.0.0.0.0.2.5.1.0:$14822_Grocery.0.2.3">
                    
                  </div>
                  <div class="price_box ps-1 justify-content-center prd_prc_bx" style="padding-bottom: 6px;">
                     @if(empty($sale->product->offer_price))
                     <span class="current_price">{{$sale->product->price}} Tk</span>
                     @else
                     <span class="current_price">{{$sale->product->offer_price}} Tk</span>
                     <span class="old_price">{{$sale->product->price}} Tk</span>
                     @endif
                  </div>
                  <div class="rounded-0 bg-muted p-2 d-flex justify-content-between">
                      
   					@if(!empty($sale->product->id))
                        <a href="#"
                               style="color: white; font-size: 14px;background: #218A41;border: solid;width: 100%;padding-top: 4%;"
                               class="btn btn-sm btn-warning semi buy-now"
                               data-price="{{ $sale->product->price }}"
                               data-productid="{{ $sale->product->id }}"
                               data-offerprice="{{ $sale->product->offer_price }}"
                               data-url="{{ route('front.cart.store') }}">
                               Order
                        </a>
                        @endif
 				
 					    @if(!empty($sale->product->id))
 					    
     					    <a href="#" 
                                style="background: #EF4A23;color: white; font-size: 14px;border: solid;width: 100%;padding-top: 4%;text-wrap: nowrap"
                                data-price="{{ $sale->product->price }}"
                                data-productid="{{ $sale->product->id }}"
                                data-offerprice="{{ $sale->product->offer_price }}"
                                data-url="{{ route('front.cart.store') }}"
                                class="btn btn-sm btn-warning semi cart_btn">
                                Add To Cart
                            </a>
                    @endif

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
   </div>
   @endif
    
    <div class="container">
    
   <div class="row pt-4 service-support-box" style="display: none;">
       
                @foreach($home_bottom_settings as $item)
                    <div class="col-lg-3 col-md-6 col-12 border-end mb-3">
                      <div class="support service-support-single d-flex align-items-center ps-4">
                         <img class="pe-2 img-fluid" src="{{asset('uploads/home-bottom-icon/'.$item->icon)}}" style="margin:0px" alt="">
                         <!-- <p><span>Free Shipping &amp; Returns</span> <br>For all order over 5 items</p>p -->
                         <div class="" style="margin: 5px;padding: 0px;">
                            <h6 style="margin:0px"><strong>{{ $item->title }}</strong></h6>
                            <p class="font-13 m-0">
                               {{ $item->description }}
                            </p>
                         </div>
                      </div>
                   </div>
                @endforeach
               
            </div>
    </div>     
    <div class="container d-none">
        <div class="row" style="padding: 30px 0px;text-align: justify;">
            {!! $about->about_us !!}
        </div>        
    </div>   
</div>

    <div class="modal fade" id="gal_video" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          
    </div> 
    
     <div class="modal show" id="coockie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        
        <div class="modal-dialog modal-lg" style="top: 35% !important;">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cookie management</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                          <p>By clicking “Accept all cookies”, you agree to the storing of cookies on your device to enhance site navigation, analyze site usage, and assist in our marketing efforts. Our Privacy Policy</p>
                        </div>
                    </div>
                    
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-outline-success" id="acceptCookies">Accept All</button>
                <button class="btn btn-outline-danger" id="rejectCookies">Reject All</button>
              </div>
              </div>
          </div>
    </div>
    
    </div> 



@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
      
        getPopularProducts(); 
        getComboProducts(); 
        // getProductVideo(); 
        
        $('a.buy-now').on('click', function (e) {
            
            e.preventDefault();
            
            var productId = $(this).data('productid');
            var proQty = 1;
            var addToCartUrl = $(this).data('url');
            var checkoutUrl = "{{ route('front.cart.index') }}";
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
                toastr.success(response.msg);
                if(response.status)
                {
                    window.location.href = "{{ route('front.checkout.index') }}";
                } 
                
            });
        });
        
        $('.cart_btn').on('click', function (e) {
            e.preventDefault();
            var productId = $(this).data('productid');
            var proQty = 1;
            var addToCartUrl = $(this).data('url');
            var checkoutUrl = "{{ route('front.cart.index') }}";
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
                toastr.success(response.msg);
                if(response.status)
                {
                    window.location.reload();
                } 
            });
        });
        
        $(document).on('click', 'a.video_gal',function(e){
            e.preventDefault();
            
            var id = $(this).data('id');
            var method = "GET";
            var url = "{{ route('front.show_gal',':gal_id') }}";
            url = url.replace(':gal_id', id);
            
            $.ajax({
                url : url,
                method : method,
                data : {},
                success : function(res){
                    if(res.success){
                        $('div#gal_video').html(res.html).modal('show');
                    }
                }
            });
            
        });
        
        $(document).on('click', 'a#product_show', function(e) {
            e.preventDefault();
        
            let product_id = $(this).data('productid'); 
            let product_name = $(this).data('productname'); 
            let category_id = $(this).data('categoryid'); 
            let sell_price = $(this).closest('.product-item').find('.product_content span.current_price').text().replace(/[^\d.]/g, '');
            let quantity='1';
       
            window.dataLayer = window.dataLayer || [];
            dataLayer.push({
                event: "view_item",
                ecommerce: {
                    currency: "BDT",
                    value: sell_price, 
                    items: [
                        {
                            item_id: product_id,
                            item_name: product_name,
                            item_category: category_id,
                            price: sell_price,
                            quantity: quantity
                        }
                    ]
                }
            });
        
            let url = $(this).attr('href');
            if (url) {
                document.location.href = url;
            } else {
                
            }
            
        });
        
    });
    
    // document.addEventListener("DOMContentLoaded", function() {
    //     if (!localStorage.getItem("cookiesAccepted")) {
    //         document.getElementById("cookieConsentBanner").style.display = "block";
    //     }
    
    //     document.getElementById("acceptCookies").onclick = function() {
    //         localStorage.setItem("cookiesAccepted", "true");
    //         document.getElementById("cookieConsentBanner").style.display = "none";
    //         // Code to enable cookies
    //     };
    
    //     document.getElementById("rejectCookies").onclick = function() {
    //         localStorage.setItem("cookiesAccepted", "false");
    //         document.getElementById("cookieConsentBanner").style.display = "none";
    //         // Code to disable cookies
    //     };
    // });
    

    document.addEventListener("DOMContentLoaded", function() {
       
      
        if (!localStorage.getItem("cookiesAccepted")) {
            $('div#coockie').modal('show');
        } else {
            $('div#coockie').modal('hide');
        }
        
        document.getElementById("acceptCookies").onclick = function() {
            
            localStorage.setItem("cookiesAccepted", "true");
            $('div#coockie').modal('hide');
            document.cookie = "cookiesAccepted=true; path=/; max-age=" + 60 * 60 * 24 * 30;
           
        };
      
        document.getElementById("rejectCookies").onclick = function() {
          
            localStorage.setItem("cookiesAccepted", "false");
            $('div#coockie').modal('hide');
            document.cookie = "cookiesAccepted=false; path=/; max-age=" + 60 * 60 * 24 * 30;
        };
    });

    
    function getComboProducts(){
        let url = "{{ route('front.get_combo_products') }}";
        let method = 'GET';
        $.ajax({
            url     : url,
            method  : method,
            data    : {},
            success : function(res){
                if(res.success){
                    $('section#combo_products_section').html(res.combo_products);
                    $('.owl-carousel').show();
                    $('.product_slider_sell').owlCarousel({
                      items: 1, 
                      loop: true,
                      
                      rewind: false, 
                        responsive:{
                            0:{
                                items:1,
                                
                            },
                            320: {
                                items: 2,
                                
                            },
                            500: {
                                items: 2,
                                
                            },
                            600:{
                                items:3
                            },
                            870: {
                                items: 4
                            },
                            1070:{
                                items:5
                            },
                            1200: {
                                items: 5
                            },
                            1300: {
                                items: 5
                            },
                            1400: {
                                items: 6
                            }
                        }
                    });
                    $('.slider_combo_product').owlCarousel({
                      items: 1, 
                      loop: true,
                      
                      rewind: false, 
                        responsive:{
                            0:{
                                items:1,
                                
                            },
                            320: {
                                items: 2,
                                
                            },
                            500: {
                                items: 2,
                                
                            },
                            600:{
                                items:3
                            },
                            870: {
                                items: 4
                            },
                            1070:{
                                items:5
                            },
                            1200: {
                                items: 5
                            },
                            1300: {
                                items: 5
                            },
                            1400: {
                                items: 5
                            }
                        }
                    });
                    $('.slider_product_cat').owlCarousel({
                      items: 1, 
                      loop: true,
                      
                      rewind: false, 
                        responsive:{
                            0:{
                                items:1,
                                
                            },
                            320: {
                                items: 2,
                                
                            },
                            500: {
                                items: 2,
                                
                            },
                            600:{
                                items:3
                            },
                            870: {
                                items: 4
                            },
                            1070:{
                                items:5
                            },
                            1200: {
                                items: 5
                            },
                            1300: {
                                items: 5
                            },
                            1400: {
                                items: 8
                            }
                        }
                    });
                }
            }
        });
    }
    function getPopularProducts(){
        let url = "{{ route('front.get_popular_products') }}";
        let method = 'GET';
        $.ajax({
            url     : url,
            method  : method,
            data    : {},
            success : function(res){
                if(res.success){
                    $('section#popular_products_section').html(res.popular_products);
                    $('.owl-carousel').show();
                    $('.product_slider_sell').owlCarousel({
                      items: 1, 
                      loop: true,
                      
                      rewind: false, 
                        responsive:{
                            0:{
                                items:1,
                                
                            },
                            320: {
                                items: 2,
                                
                            },
                            500: {
                                items: 2,
                                
                            },
                            600:{
                                items:3
                            },
                            870: {
                                items: 4
                            },
                            1070:{
                                items:5
                            },
                            1200: {
                                items: 5
                            },
                            1300: {
                                items: 5
                            },
                            1400: {
                                items: 6
                            }
                        }
                    });
                    $('.slider_product').owlCarousel({
                      items: 1, 
                      loop: true,
                      
                      rewind: false, 
                        responsive:{
                            0:{
                                items:1,
                                
                            },
                            320: {
                                items: 2,
                                
                            },
                            500: {
                                items: 2,
                                
                            },
                            600:{
                                items:3
                            },
                            870: {
                                items: 4
                            },
                            1070:{
                                items:5
                            },
                            1200: {
                                items: 5
                            },
                            1300: {
                                items: 5
                            },
                            1400: {
                                items: 5
                            }
                        }
                    });
                    $('.slider_product_cat').owlCarousel({
                      items: 1, 
                      loop: true,
                      
                      rewind: false, 
                        responsive:{
                            0:{
                                items:1,
                                
                            },
                            320: {
                                items: 2,
                                
                            },
                            500: {
                                items: 2,
                                
                            },
                            600:{
                                items:3
                            },
                            870: {
                                items: 4
                            },
                            1070:{
                                items:5
                            },
                            1200: {
                                items: 5
                            },
                            1300: {
                                items: 5
                            },
                            1400: {
                                items: 4
                            }
                        }
                    });
                }
            }
        });
    }
    
    function getProductVideo(){
        let url = "{{ route('front.get_product_video') }}";
        let method = 'GET';
        $.ajax({
            url     : url,
            method  : method,
            data    : {},
            success : function(res){
                if(res.success){
                    $('section#product_video_gallery').html(res.product_video_gallery);
                    $('.owl-carousel').show();
                    $('.slider_gallery_product').owlCarousel({
                      items: 1, 
                      loop: true,
                      
                      rewind: false, 
                        responsive:{
                            0:{
                                items:1,
                                
                            },
                            320: {
                                items: 2,
                                
                            },
                            500: {
                                items: 2,
                                
                            },
                            600:{
                                items:3
                            },
                            870: {
                                items: 4
                            },
                            1070:{
                                items:5
                            },
                            1200: {
                                items: 5
                            },
                            1300: {
                                items: 5
                            },
                            1400: {
                                items: 4
                            }
                        }
                    });
                }
            }
        });
    }
    
    
    $('.slider_product_cer').owlCarousel({
                      items: 1, 
                      loop: true,
                      
                      rewind: false, 
                        responsive:{
                            0:{
                                items:1,
                                
                            },
                            320: {
                                items: 2,
                                
                            },
                            500: {
                                items: 2,
                                
                            },
                            600:{
                                items:3
                            },
                            870: {
                                items: 4
                            },
                            1070:{
                                items:5
                            },
                            1200: {
                                items: 5
                            },
                            1300: {
                                items: 5
                            },
                            1400: {
                                items: 6
                            }
                        }
                    });
               $('.slider_gallery_product').owlCarousel({
                      items: 1, 
                      loop: true,
                      
                      rewind: false, 
                        responsive:{
                            0:{
                                items:1,
                                
                            },
                            320: {
                                items: 2,
                                
                            },
                            500: {
                                items: 2,
                                
                            },
                            600:{
                                items:3
                            },
                            870: {
                                items: 4
                            },
                            1070:{
                                items:5
                            },
                            1200: {
                                items: 5
                            },
                            1300: {
                                items: 5
                            },
                            1400: {
                                items: 6
                            }
                        }
                    });
                    $('.slider_product_gal').owlCarousel({
                      items: 1, 
                      loop: true,
                      
                      rewind: false, 
                        responsive:{
                            0:{
                                items:1,
                                
                            },
                            320: {
                                items: 2,
                                
                            },
                            500: {
                                items: 2,
                                
                            },
                            600:{
                                items:3
                            },
                            870: {
                                items: 4
                            },
                            1070:{
                                items: 4
                            },
                            1200: {
                                items: 4
                            },
                            1300: {
                                items: 4
                            },
                            1400: {
                                items: 4
                            }
                        }
                    });     
    
    
    
    
    
</script>

<script>
    $(document).ready(function(){
        $('.select2').select2({
            closeOnSelect: true
        });
    });
</script>

@endpush
