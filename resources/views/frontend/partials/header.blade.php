 <style>
 
    @media (max-width: 768px) {
        .navbar {
        padding-left: 10px !important;
    }
        .nav_section {
            padding-right: 0px !important; 
        } 
    
    }
    
    @media (max-width: 992px){
        .p_sm_0{
            padding: 0 !important;
        }
    }
    
    @media (min-width: 768px){
        .navbar_justify_content_sm{
            justify-content: center;
        }
        
        .col-md-1 {
            flex: 0 0 auto;
            width: 8.33333333%;
            gap: 28px;
        }
        
        .logo_section {
            text-align: center !important;
        }
         
        .logo_section img {
            height: 70px;
            width: auto;
            padding: 5px 0px;
        } 
        
        .cart_number {
            color: #000;
            position: absolute;
            top: 12% !important;
            right: 2% !important;
        }
    
    }
    
    @media only screen and (min-width: 320px) and (max-width: 375px) {
        header img {
            height: auto !important;
            width: 155px !important;
            padding-left: 0 !important;
        }
        
        .top_header {
            font-size: 13px !important;
        }
        
        .search_section {
            position: absolute;
            width: 80%;
            top: 115px;
            z-index: 9999;
            left: 10%;
            opacity: 0;
            max-height: 0; /* Start with height of 0 for transition */
            overflow: hidden; /* Hide content overflow */
            transition: opacity 0.3s ease, max-height 0.3s ease; /* Transition properties */
        }

        .search_section.show {
            opacity: 1;
            max-height: 500px; /* Set to a value greater than the content height */
        }
        
    }
    
    @media only screen and (min-width: 320px) and (max-width: 374px) {
        .logo_section img {
            height: auto !important;
            width: 155px !important;
            padding-left: 0 !important;
        }
        .cart_number {
            color: #000;
            position: absolute;
            top: 22% !important;
            right: 4% !important;
        }
        
        .offer {
            padding: 0px 3px !important;
        }
        
    }
    
    @media only screen and (min-width: 375px) and (max-width: 450px) {
        
        .logo_section {
            text-align: center;
        }
        
        .top_header {
            font-size: 13px !important;
        }
        
        .search_section {
            position: absolute;
            width: 80%;
            top: 75px;
            z-index: 9999;
            left: 10%;
            opacity: 0;
            max-height: 0; /* Start with height of 0 for transition */
            overflow: hidden; /* Hide content overflow */
            transition: opacity 0.3s ease, max-height 0.3s ease; /* Transition properties */
        }

    .search_section.show {
        opacity: 1;
        max-height: 500px; /* Set to a value greater than the content height */
    }
        
        .search_section {
            /*display: none;*/
            /*position: absolute;*/
            /*width: 80%;*/
            /*top: 75px;*/
            /*z-index: 9999;*/
            /*left: 10%;*/
            /*opacity: 0;*/
            /*height: 0;*/
            /*overflow: hidden;*/
            /*transition: opacity 0.3s ease, height 0.3s ease; */
        }
    
        .search_section.show {
            display: block;
            opacity: 1; 
            height: auto; 
        }
        
        .logo_section img {
            height: auto !important;
            width: 32% !important;
            padding-left: 0 !important;
        }
        
        .cart_number {
            color: #000;
            position: absolute;
            top: 15% !important;
            right: 4% !important;
        }
        
    }
    
    @media only screen and (min-width: 1500px) and (max-width: 2000px) {
        .nav_section {
            width: 1500px !important;
        }
        .bot_menu {
            width: 1500px !important;
        }
    }
    
    @media only screen and (min-width: 2001px) and (max-width: 2700px) {
        .nav_section {
            width: 1500px !important;
        }
        .bot_menu {
            width: 1500px !important;
        }
    }
    
}
    
    
 </style>
 <!-- header Start  -->
 <header>

                @php 
                $cart = session()->get('cart', []);
                @endphp
                
                
     <div class="top_header" style="background: #000;color: #fff;text-align: center;padding: 5px;">
        {{ aboutUs()->top_header_text }}
        
     </div>
     <nav class="navbar navbar_justify_content_sm" style="background: #fff !important">
            <div class="container-fluid row justify-content-between align-items-center nav_section">
                <div class="col-2 d-block d-lg-none p_sm_0">
                    <button class="navbar-toggler bg-light d-xl-none shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#middlenav" aria-controls="middlenav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                </div>
                <div class="col-lg-1 col-md-5 col-6 logo_section" style="">
                    <a href="{{ route('front.home') }}" class="navbar-brand" style="margin: 0px; padding: 0px;">
                        <img src="{{ asset(siteInfo()->logo) }}" alt="logo">
                    </a>
                </div>
                <div class="col-2 col-md-1 d-lg-none" style="padding-right: 0%;display: flex;padding: 0px;">
                    <button id="toggle-search" type="submit" style="border: none;background: no-repeat;width: 50%;margin-top: 6px;"><i class="fa-solid fa-magnifying-glass" style="font-size: 18px;"></i></button>
                   <div class="offer" style="line-height: 15px;display: flex;padding: 0px 2px;width: 15%;text-align: center;margin-top: 7px;">
                       
                       @guest
                       <div class="icn" style="margin-left: 155%;">
                             <a href="{{url('login-user')}}"><i style="color: #322E2F;" class="fa-solid fa-user"></i></a>  
                        </div>
                       
                       @else
                       
                       <li class="nav-item mx-2 dropdown" style="list-style: none;font-size: 16px;color: #000;font-weight: 700;margin-top: 1px;">
                                    <a class="nav-link dropdown" role="button" data-bs-toggle="" aria-expanded="false">
                                            {{ auth()->user()->name }}
                                    </a>
                                    <ul class="dropdown-menu" style="background: #000000c4;top: 111%;left: -227%;padding: 0px;width: 200px;">
                                        
                                        <li class="row" style="text-align: center;padding: 0px 8px;">
                                        <div class="col-md-4 col-4">    
                                        <a href="#" style="display: block;margin-bottom: 10px;margin-top: 8px;">
                                              <img src="{{ asset(auth()->user()->image) }}" alt="" style="border-radius: 50%;">
                                        </a>
                                        </div>
                                        <div class="col-md-8 col-8">  
                                        <span style="color: #fff;display: block;margin-bottom: 5px;display: block;margin-top: 23px;">{{ auth()->user()->name }}</span>
                                       
                                        <span style="color: #fff;font-size: 13px;font-weight: 100;">{{ auth()->user()->email }}</span>
                                        </div>
                                        </li>
                                        
                                       
                                        <li class="dropend" style="border-bottom: 1px solid #fff;border-top: 1px solid #fff;padding: 10px;">
                                            <a class="dropdown-item" href="{{ route('front.userProfile') }}" style="color: #fff;">
                                                 <span> Manage Profile </span>
                                            </a>
                                        </li>
                                        
                                        <li class="dropend" style="border-bottom: 1px solid #fff;padding: 10px;">
                                            <a class="dropdown-item" href="{{ route('front.userProfile') }}" style="color: #fff;">
                                                 <span> Setting & Privacy </span>
                                            </a>
                                        </li>
                                       
                                        <li class="dropend" style="border-bottom: 1px solid #fff;padding: 10px;">
                                            <a class="dropdown-item" href="{{ route('front.userProfile') }}" style="color: #fff;">
                                                 <span> Help </span>
                                            </a>
                                        </li>
                                        
                                        
                                        <li class="dropend" style="border-bottom: 1px solid #fff;padding: 10px;">
                                            <a class="dropdown-item" href="{{url('logout')}}" style="color: #fff;">
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                
                                @endguest
                           
                           <div class="txt d-none">
                             @guest
                               <a href="{{url('login-user')}}" style="color: #ffffff;"> <span style="color: white;display:block;font-size: 15px;">Account</span> </a>
                             @else
                             <a class="" href="{{url('front.userProfile')}}" style="color: #ffffff;"><span style="color: white;display:block;font-size: 15px;">{{ auth()->user()->name }}</span> </a>
                             @endif
                            <div class="display: flex;">
                                <span style="color: #ffffff;font-size: 11px;">
                                    @guest
                                    <!--<a href="{{url('login-user')}}" style="color: #ffffff;">Login</a>-->
                                    @else
                                   
                                    @endguest
                                </span>
                                
                           <span style="color: #ffffff;font-size: 11px;">
                               @guest
                               <!--<a href="{{url('login-user')}}" style="color: #ffffff;">Register</a>-->
                               @else
                               <a class="" href="{{url('logout')}}" style="color: #ffffff;">Logout</a>
                               @endguest
                           </span>
                            </div>   
                           
                           </div>
                       </div>
                </div>
                <div class="col-1 d-block d-lg-none" style="padding-right: 3%;">
                   <a style="float: right;padding: 0px;margin-top: 2px;" href="{{ route('front.checkout.index') }}" class="btn pmd-btn-fab pmd-ripple-effect fixed-cart-bottom12" type="button">  
                       <span class="cart_number" style="color: #000;position: absolute;top: 2%;right: 2%;">
                          @if($cart !== null) {{ count($cart) }} @else 0 @endif
                       </span>
                       <i class="fa fa-shopping-bag" style="font-size: 20px;color: #000;"></i>
                   </a>
                   
                </div>
                <div class="col-lg-5 col-md-12 col-12 p_sm_0 search_section" id="search-section">
                    <div  class="search-container search_four">
                        <form class="searchArea my-0 my-lg-0" action="{{ route('front.product.search') }}">
                            <div class="search_box m-auto">
                                <input placeholder="Search entire store here ..." type="text" name="query">
                                <button type="submit"><i class="fa-solid fa-magnifying-glass" style="font-size: 18px;"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                @php 
                $cart = session()->get('cart', []);
                
                @endphp
                
                @php $footer = DB::table('footers')->first(); @endphp
                <style>
                    .support-icon-flex {
                        display: flex;
                        align-items: center;
                    }
                    .support-icon-flex .icon {
                        width: 30px;
                        font-size: 20px;
                        padding-right: 5px;
                    }
                    .support-icon-flex .icon i {
                        font-size: 20px;
                    }
                    .support-icon-flex .text p {
                        margin-bottom: 0;
                        text-transform: capitalize;
                        font-size: 12px;
                        color: whitesmoke;
                    }
                    .support-icon-flex .text h5 {
                        margin-bottom: 0;
                        font-size: 13px;
                        font-family: var(--bold);
                    }
                    .toast-success {
                        color: #FFFFFF !important;
                        background: #16166F;
                    }
                </style>
                <div class="col-lg-5 d-none">
                    <div class="navbar navbar-expand-lg justify-content-lg-end justify-content-between">
                        <a class="btn rounded-0 btn-light bg-white m-2 mx-lg-3 p-2" style="display: flex;
    background: linear-gradient(to right, #3383d9, #040434) !important;
    color: white;
    border-radius: 6px !important;" href="#"><i class="fa-solid fa-phone pe-0"></i> <small>{{$footer->phone}}</small>
                        </a>
                        
                        @guest
                        
                        <a style="display: flex;color: white;" class="rounded-0 bg-white m-2 mx-lg-3 p-2" href="{{url('login-user')}}">Login</a>
                        @else
                        
                        <a class="btn rounded-0 btn-light bg-white m-2 mx-lg-3 p-2" href="{{url('order')}}">{{ auth()->user()->name }}</a>
                        
                        <a class="btn rounded-0 btn-light bg-white m-2 mx-lg-3 p-2" style="color: #ffffff;" href="{{url('logout')}}">Logout</a>
                         @endguest
                        <a style="display: flex;
                        background: linear-gradient(to right, #3383d9, #040434) !important;
                        color: white;
                        border-radius: 6px !important;" class="btn rounded-0 btn-light bg-white m-2 mx-lg-3 p-2" href="#">Offer</a>
                        @auth
                        
                        @else
                        <a style="display: flex;
                            background: linear-gradient(to right, #3383d9, #040434) !important;
                            color: white;
                            border-radius: 6px !important;" class="btn rounded-0 btn-light bg-white m-2 mx-lg-3 p-2" href="#">Contact</a>
                        @endauth
                        <!--<a class="btn rounded-0 btn-light bg-white m-2 p-2" href="#">Menu</a>-->
                        
                        <a class="btn rounded-0 btn-light bg-white m-2 mx-lg-3 p-2" style="display: flex;
                            background: linear-gradient(to right, #3383d9, #040434) !important;
                            color: white;
                            border-radius: 6px !important;" href="{{ route('front.cart.index') }}">
                            Cart @if($cart !== null) <span class="badge bg-secondary" style="margin-left: 5px;">{{ count($cart) }}</span> @endif
                        </a>


                    </div>
                </div>
                <div class="col-lg-2 d-none d-md-none d-lg-block d-xlx-block">
                    <div class="navbar navbar-expand-lg justify-content-lg-end justify-content-between">
                        
                        <div class="d-none">
                           <div class="support-icon-flex" style="padding:0px 10px;">
                              <div class="icon white">
                                  <i class="fa fa-location pe-0" style="color: #fff;"></i>
                              </div>
                              <div class="text white">
                                 <a href="{{route('front.flash-sell')}}" style="color: #fff;"><p>Stores & services</p></a>
                                 <a href="{{route('front.flash-sell')}}" style="color: #fff;"><h5>Westfield White City</h5></a>
                              </div>
                           </div>
                        </div>
                        
                        @guest
                        
                        <!--<a style="display: flex;color: white; border-radius: 6px !important;" class="" href="{{url('login-user')}}">Login</a>-->
                    @else
                        
                        <!--<a class="btn rounded-0 btn-light bg-white m-2 mx-lg-3 p-2" href="{{url('order')}}">{{ auth()->user()->name }}</a>-->
                        
                        <!--<a class="btn rounded-0 btn-light bg-white m-2 mx-lg-3 p-2" href="{{url('logout')}}">Logout</a>-->
                    @endguest
                    
                    <style>
                       .header_offer .dropdown-item:focus, .header_offer .dropdown-item:hover {
                            background: none !important;
                        }
                        
                        .header_offer .dropdown-menu .dropend {
                            padding-left: 0px !important;
                        }
                        
                        .header_offer .dropdown .dropdown-menu li:hover {
                            background: #fff;
                        }
                        
                        .header_offer .dropdown .dropdown-menu {
                            font-size: 15px;
                        }

                        .header_offer .dropdown .dropdown-menu li:first-child:hover {
                            background: none;
                        }
                       .header_offer .dropdown .dropdown-menu li:hover .dropdown-item {
                           color: #000 !important;
                       }
                    </style>
                    
                       <div class="offer header_offer" style="line-height: 15px;display: flex;padding: 0px 10px;">
                          
                           <div class="icn" style="margin-right: 10px;">
                               
                               @guest
                               
                               <a href="{{url('login-user')}}">
                               <i style="color: #322E2F;font-size: 20px;" class="fa-solid fa-user"></i>
                               </a>
                               
                               @else
                               
                               <li class="nav-item mx-2 dropdown" style="list-style: none;font-size: 16px;color: #000;font-weight: 700;">
                                    <a class="nav-link dropdown" href="" role="button" data-bs-toggle="" aria-expanded="false">
                                            {{ auth()->user()->name }}
                                    </a>
                                    <ul class="dropdown-menu" style="background: #000000c4;top: 111%;left: -251%;padding: 0px;width: 218px;">
                                        
                                        <li class="row" style="text-align: center;padding: 0px 17px;">
                                        <div class="col-md-4">    
                                        <a href="#" style="display: block;margin-bottom: 10px;margin-top: 8px;">
                                              <img src="{{ asset(auth()->user()->image) }}" alt="" style="border-radius: 50%;">
                                        </a>
                                        </div>
                                        <div class="col-md-8">  
                                        <span style="color: #fff;display: block;margin-bottom: 5px;display: block;margin-top: 23px;">{{ auth()->user()->name }}</span>
                                       
                                        <span style="color: #fff;font-size: 13px;font-weight: 100;">{{ auth()->user()->email }}</span>
                                        </div>
                                        </li>
                                        
                                       
                                        <li class="dropend" style="border-bottom: 1px solid #fff;border-top: 1px solid #fff;padding: 10px;">
                                            <a class="dropdown-item" href="{{ route('front.userProfile') }}" style="color: #fff;">
                                                 <span> Manage Profile </span>
                                            </a>
                                        </li>
                                        
                                        <li class="dropend" style="border-bottom: 1px solid #fff;padding: 10px;">
                                            <a class="dropdown-item" href="{{ route('front.userProfile') }}" style="color: #fff;">
                                                 <span> Setting & Privacy </span>
                                            </a>
                                        </li>
                                       
                                        <li class="dropend" style="border-bottom: 1px solid #fff;padding: 10px;">
                                            <a class="dropdown-item" href="{{ route('front.userProfile') }}" style="color: #fff;">
                                                 <span> Help </span>
                                            </a>
                                        </li>
                                        
                                        
                                        <li class="dropend" style="border-bottom: 1px solid #fff;padding: 10px;">
                                            <a class="dropdown-item" href="{{url('logout')}}" style="color: #fff;">
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                               
                               
                               <!--<a class="" data-bs-toggle="modal" href="#forget-pass" style="color: #000;text-decoration: none;font-size: 16px;font-weight: 700;">{{ auth()->user()->name }}</a>-->
                               
                               @endguest
                               
                           </div>
                           
                           <div class="modal fade" id="forget-pass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                   <div class="modal-content">
                                      <div class="modal-header">
                                         <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                                      </div>
                                      <div class="modal-footer" id="forgot_modal_footer">
                                          <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                                          <a class="btn btn-outline-dark" href="{{url('logout')}}">Logout</a>
                                          <a class="btn btn-outline-danger" href="{{ route('front.userProfile') }}">Profile</a>
                                   </div>
                                </div>
                             </div>
                           
                           <div class="txt d-none">
                             @guest
                               <a href="{{url('login-user')}}" style="color: #ffffff;"> <span style="color: white;display:block;font-size: 15px;">Account</span> </a>
                             @else
                             <a class="" href="{{url('order')}}" style="color: #ffffff;"><span style="color: white;display:block;font-size: 15px;">{{ auth()->user()->name }}</span> </a>
                             @endif
                            <div class="display: flex;">
                                <span style="color: #ffffff;font-size: 11px;">
                                    @guest
                                    <a href="{{url('login-user')}}" style="color: #ffffff;">Login</a>
                                    @else
                                    <a class="" href="{{url('order')}}" style="color: #ffffff;">{{ auth()->user()->name }}</a>
                                    @endguest
                                </span>
                                <span style="color: #ffffff;font-size: 11px;">Or</span>
                           <span style="color: #ffffff;font-size: 11px;">
                               @guest
                               <a href="{{url('login-user')}}" style="color: #ffffff;">Register</a>
                               @else
                               <a class="" href="{{url('logout')}}" style="color: #ffffff;">Logout</a>
                               @endguest
                           </span>
                            </div>   
                           
                           </div>
                       </div>
                      
                        @auth
                        
                        @else
                        <!--<a style="color: white;border-radius: 6px !important;padding:0px 10px;font-size: 15px;" class="" href="#">Contact</a>-->
                        
                        @endauth
                        
                        <!--<a class="btn rounded-0 btn-light bg-white m-2 p-2" href="#">Menu</a>-->
                        
                        <a class="" style="display: flex; color: white;
                            border-radius: 6px !important;padding: 0px 10px;" href="{{ route('front.checkout.index') }}">
                                                    
                                   <i class="fas fa-cart-arrow-down" style="color: #322E2F"></i>                 
                                                    
                             @if($cart !== null) <span class="badge bg-secondary" style="margin-left: 5px;
                            position: absolute;
                            top: -23%;
                            right: 0%;
                            background: #322E2F !important;">{{ count($cart) }}</span> @endif
                        </a>
                    </div>
                </div>
            </div>
          </nav>
        
          
          <nav class="navbar navbar-expand-xl navbar-light p-0" style="background: #ffebe1e8;">
              <div class="container-fluid bot_menu">
                <div class="collapse navbar-collapse middlenav" id="middlenav">
                    <ul class="navbar-nav  m-auto mt-2 mt-lg-0 w-100 flex-wrap justify-content-center" style="">
                         @forelse(categories() as $key => $item)
                        <li class="nav-item mx-2 dropdown">
                            @if(!empty($item->slug))
                            <a class="nav-link dropdown" 
                            style="font-family: emoji !important"
                            href="{{ route('front.shop', [
                                                                'slug'=> $item->slug 
                                                            ] ) }}" role="button" data-bs-toggle="" aria-expanded="false">
                              @if(!empty($item->name))
                              {{ $item->name }}
                              @endif
                              @if($item->activeSubCategories->count())
                              <!--<i class="fas fa-angle-down" style="margin-left: 2px;margin-top: 3px;"></i>-->
                              @endif
                            </a>
                            @endif
                             @if($item->activeSubCategories->count())
                            <ul class="dropdown-menu">
                             @foreach($item->activeSubCategories as $key => $item)
                             <li class="dropend">
                                    @if(!empty($item->slug))
                                    <a  class ="dropdown-item text-dark"href="{{ route('front.subcategory', [
                                            'type'=>'childcategory', 
                                            'slug'=> $item->slug 
                                        ] ) }}"> <span>
                                            @if(!empty($item->name))
                                            {{ $item->name }}
                                            @endif
                                            </span>
                                            @if($item->activeChildCategories->count())
                                                        <i class="fas fa-angle-right" style="float: right;margin-top: 3px;"></i>
                                                    @endif
                                            
                                            </a>
                                    @endif   
                                  
                                                    
                                </a>
                                 @if($item->activeChildCategories->count())
                                <ul class="dropdown-menu">
                                  @foreach($item->activeChildCategories as $key => $item)
                                  <li class="">
                                      @if(!empty($item->slug))
                                    <a class="dropdown-item" href="{{ route('front.shop', [
                                                                'slug'=> $item->slug 
                                                            ] ) }}">
                                      @if($item->name)
                                      <span>{{ $item->name }}</span>
                                      @endif
                                    </a>
                                    @endif
                                  </li>
                                  @endforeach
                                </ul>
                                @endif
                              </li>
                             @endforeach 
                             
                            </ul>
                            @endif
                          </li>
                         @empty
                        <div>
                            <strong class="text-center text-danger">
                                No 
                            </strong>
                        </div>
                        @endforelse
                    </ul>
                </div>
            </div>
          </nav>
          <style>
              @media (min-width: 1280px){
                  .d-xlx-block {
                    display: block!important;
                }
              }
                
          </style>

    </header>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var button = document.getElementById('toggle-search');
            var searchSection = document.getElementById('search-section');
    
            button.addEventListener('click', function() {
                if (searchSection.classList.contains('show')) {
                    // Hide search section
                    searchSection.classList.remove('show');
                } else {
                    // Show search section
                    searchSection.classList.add('show');
                }
            });
        });
    </script>

    
    