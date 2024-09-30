<style>

    @media only screen and (min-width: 320px) and (max-width: 575px) {
       
       .footter_img {
           left: 36% !important;
       }
       
     .second_div{
     	border-right: none !important;
       	border-bottom : 1px solid;
       	padding-bottom: 10px;
     }
     
    .first_div{
        border-right: none !important;
        border-bottom: 1px solid;
        padding-bottom: 15px;
        padding-top: 18px !important;
    }
     
     .third_div{
        border-right: none !important;
        border-bottom: 1px solid;
        padding-bottom: 20px;
     }
     
    }
    
    .fixed-cart-bottom2 {
        background: white;
        border-radius: 50px;
        height: 50px;
        width: 50px;
        cursor: pointer;
        box-shadow: 2px 2px 8px gray;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.5s;
        z-index: 9999;
        font-size: 25px;
    }
    .first_div {
            padding-left: 30px;
    padding-top: 15px;
    }
    .second_div {
            padding-left: 30px;
    padding-top: 15px;
    }
    .third_div {
            padding-left: 30px;
    padding-top: 15px;
    }
    .four_div {
            padding-left: 30px;
    padding-top: 15px;
    }
    .col-md-7 {
        padding-left: 0px;
    }
  .footer i {
    font-size: 20px;
    padding-top: 3px;
    padding-right: 30px;
}
.end-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}


/* Footer Nav Css */

.footer-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: #ffffff;
    display: none;
    z-index: 99;
}


    
@media (max-width: 575px) {
    
    .for_pc {
        display: none !important;
    }
    
    .for_mobile {
        display: block !important;
    }
    
    .footer-nav {
        display: none !important;
    }
    .fixed-cart-bottom1 {
        position: fixed;
        bottom: 5rem !important;
        right: 4px;
        background: #eda56a;
        border-radius: 50px;
        height: 60px;
        width: 60px;
        cursor: pointer;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.5s;
        z-index: 9999;
        border: #0f134f;
    }
}

@media only screen and (min-width: 992px) and (max-width: 1348px) {
    .pages_div {
        padding: 20px !important;
    }
}

.m-nav-main {
    display: flex;
}

.m-nav-main .button-shop {
    flex-grow: 1;
    padding: 10px;
    padding-bottom: 5px;
    color: white;
    font-size: 15px;
    font-weight: bold;
    text-align: center;
}

</style>

<div class="footer-nav">
     <div class="m-nav-main">
        <div class="button-shop">
             <a href="{{ url('/') }}" class="text-light">
                 <img width="25" height="25" src="https://img.icons8.com/ultraviolet/25/home--v1.png" alt="home--v1" style="display: block; margin: auto;"/>
                <span style="color: #00276C;">Home</span> 
             </a>
         </div>
         
         <div class="button-shop">
             <a href="{{ footer_social()['facebook'] }}" class="text-light" target="_blank">
                 <img width="25" height="25" style="display: block;margin:0 auto;" src="https://img.icons8.com/color/25/facebook-new.png" alt="facebook-new">
                 <span style="color: #00276C;">Facebook</span>
            </a>
         </div>
         
         <div class="button-shop">
            <a href="{{ footer_social()['whatsapp'] }}" class="text-light">
                <img width="25" height="25" src="https://img.icons8.com/3d-fluency/25/whatsapp.png" alt="whatsapp" style="display: block; margin: auto;"/>
                <span style="color: #00276C;">WhatsApp</span>
             </a>
         </div>
         
         <div class="button-shop">
             <a href="tel:01616605055" class="text-light">
                 <img width="25" height="25" src="https://img.icons8.com/color/25/phone.png" alt="phone" style="display: block; margin: auto;"/>
               <span style="color: #00276C;">Call</span>
             </a>
         </div>
     </div>
 </div>

<style>
    .fa-brands, .fab {
        font-weight: 400;
        padding: 3px;
    }
</style>

    <footer class="" style="background: #fff !important;margin-top: 50px;">
        <div class="container-fluid">
             <img src="{{ asset(siteInfo()->logo) }}" class="footter_img" style="height: 111px;width: 114px;position: relative;margin-top: -3%;left: 47%;border: 5px solid #000;border-radius: 50%;">
                <div class="col-md-12 text-center" style="margin-top: 28px;border-bottom: 1px solid #E4C1B1;padding-bottom: 20px;border-width: 80% !important;">
                    <div class="social-link flex-wrap">
                        @php $sLinks =DB::table('footer_social_links')->get(); @endphp
                        @foreach($sLinks as $link)
                        <a href="{{$link->link}}" style="background: #C5A794;border-radius: 50%;padding: 7px;"><i class="fa-brands {{$link->icon}}" style="color: #fff;"></i></a>
                        @endforeach
                    </div>
                </div>
                
            <div class="row">
                
                
            @php $footer = DB::table('footers')->first(); @endphp
                
                
            @php $footers = DB::table('footers')->first(); @endphp
                
            <div class="for_mobile" style="display: none;margin-bottom: 15px;">  
                
                <div class="accordion" id="accordionPrice">
                    <div class="accordion-item" style="margin-bottom: 0px;">
                        <h2 class="accordion-header" id="headingPrice">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePrice" aria-expanded="true" aria-controls="collapsePrice">
                                GET IN TOUCH
                            </button>
                        </h2>
                        <div id="collapsePrice" class="accordion-collapse collapse hide" aria-labelledby="headingPrice">
                            <div class="accordion-body">
                                <div class="pages_div" style="padding: 0px;">
                                    <div class="d-flex footer-content" style="margin-bottom: 10px;">
                                        <h3 class="mb-0" style="margin-bottom: 0px !important;"><strong style="font-family: emoji;border-bottom: 1px dashed #000;">GET IN TOUCH</strong></h3>
                                    </div>
                                        
                                    <div style=""> 
                                        <span style="font-weight: 100; !important;color: #00000096;">{{ footerInfo()->phone }} </span> <br>
                                        <span style="font-weight: 100; !important;color: #00000096;">{{ footerInfo()->address }} </span>
                                    </div>
                                        
                                    <div class="subscribe" style="margin-top: 17px;">
                                        <div class="row g-3 align-items-center">
                                            <div class="col-auto">
                                                <input type="password" id="inputPassword6" class="form-control" placeholder="Your Email" aria-describedby="passwordHelpInline">
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" id="inputPassword6" style="background: #C5A794;color: #fff;border: none;" class="form-control" aria-describedby="passwordHelpInline">Subscribe</button>
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
                                ABOUT PASTEL BEAUTY
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse hide" aria-labelledby="headingOne">
                            <div class="accordion-body">
                                
                                <div class="pages_div" style="padding: 0px;">
                                <div class="d-flex footer-content" style="margin-bottom: 10px;">
                               
                                <h6 class="mb-0" style="margin-bottom: 10px !important;border-bottom: 1px solid #000;"><span>ABOUT PASTEL BEAUTY</span></h6>
                                </div>
                                 @php $about_pastel = DB::table('custom_pages')->where(['type' => 'about-pastel', 'status' => '1'])->get();  @endphp
                                <div style="line-height:4px"> 
                                    @foreach($about_pastel as $pages)
                                    <a href="{{route('front.customPages', $pages->slug)}}" style="color:#000"><p>{{$pages->page_name}}</p></a>
                                    @endforeach
                                    <a href="{{route('front.showBlogs')}}" style="color:white"><p>Blogs</p></a>
                                </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThird">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThird" aria-expanded="true" aria-controls="collapseThird">
                                PRIVACY POLICIES
                            </button>
                        </h2>
                        <div id="collapseThird" class="accordion-collapse collapse hide" aria-labelledby="headingThird">
                            <div class="accordion-body">
                                
                                <div class="pages_div" style="padding: 0px;">
                                <div class="d-flex footer-content" style="margin-bottom: 10px;">
                               
                                <h6 class="mb-0" style="margin-bottom: 10px !important;border-bottom: 1px solid #000;"><span>PRIVACY POLICIES</span></h6>
                                </div>
                                 
                                  @php $privacy_policy = DB::table('custom_pages')->where(['type' => 'privacy-policy', 'status' => '1'])->get();  @endphp
                                <div style="line-height:4px"> 
                                    @foreach($privacy_policy as $pages)
                                    <a href="{{route('front.customPages', $pages->slug)}}" style="color:#000"><p>{{$pages->page_name}}</p></a>
                                    @endforeach
                                    <a href="{{route('front.showBlogs')}}" style="color:white"><p>Blogs</p></a>
                                </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFourth">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourth" aria-expanded="true" aria-controls="collapseFourth">
                                SUPPORT
                            </button>
                        </h2>
                        <div id="collapseFourth" class="accordion-collapse collapse hide" aria-labelledby="headingFourth">
                            <div class="accordion-body">
                                
                                <div class="pages_div" style="padding: 0px;">
                                <div class="d-flex footer-content" style="margin-bottom: 10px;">
                               
                                <h6 class="mb-0" style="margin-bottom: 10px !important;border-bottom: 1px solid #000;"><span>SUPPORT</span></h6>
                                </div>
                                 @php $support = DB::table('custom_pages')->where(['type' => 'support', 'status' => '1'])->get();  @endphp
                                <div style="line-height:4px"> 
                                    @foreach($support as $pages)
                                    <a href="{{route('front.customPages', $pages->slug)}}" style="color:#000"><p>{{$pages->page_name}}</p></a>
                                    @endforeach
                                    <a href="{{route('front.showBlogs')}}" style="color:white"><p>Blogs</p></a>
                                </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>  
            
            </div>    
                
            <div class="row for_pc">
                
                <div class="col-lg-3 col-md-6 footer first_div" style="margin-left: 0px;margin-right: 0px;">
                    <div class="pages_div" style="padding: 40px;">
                        <div class="d-flex footer-content" style="margin-bottom: 10px;">
                            <h3 class="mb-0" style="margin-bottom: 0px !important;"><strong style="font-family: emoji;border-bottom: 1px dashed #000;">GET IN TOUCH</strong></h3>
                        </div>
                            
                        <div style=""> 
                            <span style="font-weight: 100; !important;color: #00000096;">{{ footerInfo()->phone }} </span> <br>
                            <span style="font-weight: 100; !important;color: #00000096;">{{ footerInfo()->address }} </span>
                        </div>
                            
                        <div class="subscribe" style="margin-top: 17px;">
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <input type="password" id="inputPassword6" class="form-control" placeholder="Your Email" aria-describedby="passwordHelpInline">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" id="inputPassword6" style="background: #C5A794;color: #fff;border: none;" class="form-control" aria-describedby="passwordHelpInline">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="col-lg-3 footer footer-left third_div" style="">
                    <div class="pages_div" style="padding: 40px;">
                    <div class="d-flex footer-content" style="margin-bottom: 10px;">
                   
                    <h6 class="mb-0" style="margin-bottom: 10px !important;border-bottom: 1px solid #000;"><span>ABOUT PASTEL BEAUTY</span></h6>
                    </div>
                     @php $about_pastel = DB::table('custom_pages')->where(['type' => 'about-pastel', 'status' => '1'])->get();  @endphp
                    <div style="line-height:4px"> 
                        @foreach($about_pastel as $pages)
                        <a href="{{route('front.customPages', $pages->slug)}}" style="color:#000"><p>{{$pages->page_name}}</p></a>
                        @endforeach
                        <a href="{{route('front.showBlogs')}}" style="color:white"><p>Blogs</p></a>
                    </div>
                    </div>
                </div>
                
                <div class="col-lg-3 footer footer-left third_div" style="">
                    <div class="pages_div" style="padding: 40px;">
                    <div class="d-flex footer-content" style="margin-bottom: 10px;">
                   
                    <h6 class="mb-0" style="margin-bottom: 10px !important;border-bottom: 1px solid #000;"><span>PRIVACY POLICIES</span></h6>
                    </div>
                     @php $privacy_policy = DB::table('custom_pages')->where(['type' => 'privacy-policy', 'status' => '1'])->get();  @endphp
                    <div style="line-height:4px"> 
                        @foreach($privacy_policy as $pages)
                        <a href="{{route('front.customPages', $pages->slug)}}" style="color:#000"><p>{{$pages->page_name}}</p></a>
                        @endforeach
                        <a href="{{route('front.showBlogs')}}" style="color:white"><p>Blogs</p></a>
                    </div>
                    </div>
                </div>
                    
                <div class="col-lg-3 footer footer-left third_div" style="">
                    <div class="pages_div" style="padding: 40px;">
                    <div class="d-flex footer-content" style="margin-bottom: 10px;">
                   
                    <h6 class="mb-0" style="margin-bottom: 10px !important;border-bottom: 1px solid #000;"><span>SUPPORT</span></h6>
                    </div>
                     @php $support = DB::table('custom_pages')->where(['type' => 'support', 'status' => '1'])->get();  @endphp
                    <div style="line-height:4px"> 
                        @foreach($support as $pages)
                        <a href="{{route('front.customPages', $pages->slug)}}" style="color:#000"><p>{{$pages->page_name}}</p></a>
                        @endforeach
                        <a href="{{route('front.showBlogs')}}" style="color:white"><p>Blogs</p></a>
                    </div>
                    </div>
                </div>
                
            </div>
                 
            </div>
        </div>
    </footer>
    
    <div style="background: #E4C1B1;text-align: center;">
        <div class="row end-footer footer-end last-footer-content-align m-0">
            <div class="container">
                <p class="text-left __text-16px" style="margin-bottom: 0px;padding: 4px 0px;color: #ffffff;font-size: 13px;">{{$footer->copyright}}</p>
            </div>
        </div>       
    </div>

 @include('frontend.partials.js')
 
 {!!\App\Models\SitePixel::value('pixel_id')!!}
 
 <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PHD2XLF3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
 
 
</body>
</html>
