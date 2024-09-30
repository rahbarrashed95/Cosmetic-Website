@extends('frontend.app')
@section('title', 'Profile')
@push('css')

 <link rel="stylesheet" href="{{asset('frontend/assets/bootstrap/bootstrap.min.css')}}">
    <style>
        body {
    color: #797979;
    background: #f1f2f7;
    font-family: 'Open Sans', sans-serif;
    padding: 0px !important;
    margin: 0px !important;
    font-size: 13px;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-font-smoothing: antialiased;
}

.profile-nav, .profile-info{
    margin-top:30px;   
}

.profile-nav .user-heading {
    background: #b9b9b9;
    color: #fff;
    border-radius: 4px 4px 0 0;
    -webkit-border-radius: 4px 4px 0 0;
    padding: 10px;
    text-align: center;
}

.profile-nav .user-heading.round a  {
    border-radius: 50%;
    -webkit-border-radius: 50%;
    border: 10px solid rgba(255,255,255,0.3);
    display: inline-block;
}

.profile-nav .user-heading a img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    -webkit-border-radius: 50%;
}

.profile-nav .user-heading h1 {
    font-size: 22px;
    font-weight: 300;
    margin-bottom: 5px;
}

.profile-nav .user-heading p {
    font-size: 12px;
}

.profile-nav ul {
    margin-top: 1px;
}

.profile-nav ul > li {
    border-bottom: 1px solid #ebeae6;
    margin-top: 0;
    line-height: 30px;
    width: 100%;
}

.profile-nav ul > li:last-child {
    border-bottom: none;
}

.profile-nav ul > li > a {
    border-radius: 0;
    -webkit-border-radius: 0;
    color: #89817f;
    border-left: 5px solid #fff;
}

.profile-nav ul > li > a:hover, .profile-nav ul > li > a:focus, .profile-nav ul li.active  a {
    
}

.profile-nav ul > li:last-child > a:last-child {
    border-radius: 0 0 4px 4px;
    -webkit-border-radius: 0 0 4px 4px;
}

.profile-nav ul > li > a > i{
    font-size: 16px;
    padding-right: 10px;
    color: #bcb3aa;
}

.r-activity {
    margin: 6px 0 0;
    font-size: 12px;
}


.p-text-area, .p-text-area:focus {
    border: none;
    font-weight: 300;
    box-shadow: none;
    color: #c3c3c3;
    font-size: 16px;
}

.profile-info .panel-footer {
    background-color:#f8f7f5 ;
    border-top: 1px solid #e7ebee;
}

.profile-info .panel-footer ul li a {
    color: #7a7a7a;
}

.bio-graph-heading {
    background: #fbc02d;
    color: #fff;
    text-align: center;
    font-style: italic;
    padding: 40px 110px;
    border-radius: 4px 4px 0 0;
    -webkit-border-radius: 4px 4px 0 0;
    font-size: 16px;
    font-weight: 300;
}

.bio-graph-info {
    color: #89817e;
}

.bio-graph-info h1 {
    font-size: 22px;
    font-weight: 300;
    margin: 0 0 20px;
}

.bio-row {
    width: 50%;
    float: left;
    margin-bottom: 10px;
    padding:0 15px;
}

.bio-row p span {
    width: 100px;
    display: inline-block;
}

.bio-chart, .bio-desk {
    float: left;
}

.bio-chart {
    width: 50%;
}

.bio-desk {
    width: 50%;
}

.bio-desk h4 {
    font-size: 15px;
    font-weight:400;
}

.bio-desk h4.terques {
    color: #4CC5CD;
}

.bio-desk h4.red {
    color: #e26b7f;
}

.bio-desk h4.green {
    color: #97be4b;
}

.bio-desk h4.purple {
    color: #caa3da;
}

.file-pos {
    margin: 6px 0 10px 0;
}

.profile-activity h5 {
    font-weight: 300;
    margin-top: 0;
    color: #c3c3c3;
}

.summary-head {
    background: #ee7272;
    color: #fff;
    text-align: center;
    border-bottom: 1px solid #ee7272;
}

.summary-head h4 {
    font-weight: 300;
    text-transform: uppercase;
    margin-bottom: 5px;
}

.summary-head p {
    color: rgba(255,255,255,0.6);
}

ul.summary-list {
    display: inline-block;
    padding-left:0 ;
    width: 100%;
    margin-bottom: 0;
}

ul.summary-list > li {
    display: inline-block;
    width: 19.5%;
    text-align: center;
}

ul.summary-list > li > a > i {
    display:block;
    font-size: 18px;
    padding-bottom: 5px;
}

ul.summary-list > li > a {
    padding: 10px 0;
    display: inline-block;
    color: #818181;
}

ul.summary-list > li  {
    border-right: 1px solid #eaeaea;
}

ul.summary-list > li:last-child  {
    border-right: none;
}

.activity {
    width: 100%;
    float: left;
    margin-bottom: 10px;
}

.activity.alt {
    width: 100%;
    float: right;
    margin-bottom: 10px;
}

.activity span {
    float: left;
}

.activity.alt span {
    float: right;
}
.activity span, .activity.alt span {
    width: 45px;
    height: 45px;
    line-height: 45px;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    background: #eee;
    text-align: center;
    color: #fff;
    font-size: 16px;
}

.activity.terques span {
    background: #8dd7d6;
}

.activity.terques h4 {
    color: #8dd7d6;
}
.activity.purple span {
    background: #b984dc;
}

.activity.purple h4 {
    color: #b984dc;
}
.activity.blue span {
    background: #90b4e6;
}

.activity.blue h4 {
    color: #90b4e6;
}
.activity.green span {
    background: #aec785;
}

.activity.green h4 {
    color: #aec785;
}

.activity h4 {
    margin-top:0 ;
    font-size: 16px;
}

.activity p {
    margin-bottom: 0;
    font-size: 13px;
}

.activity .activity-desk i, .activity.alt .activity-desk i {
    float: left;
    font-size: 18px;
    margin-right: 10px;
    color: #bebebe;
}

.activity .activity-desk {
    margin-left: 70px;
    position: relative;
}

.activity.alt .activity-desk {
    margin-right: 70px;
    position: relative;
}

.activity.alt .activity-desk .panel {
    float: right;
    position: relative;
}

.activity-desk .panel {
    background: #F4F4F4 ;
    display: inline-block;
}


.activity .activity-desk .arrow {
    border-right: 8px solid #F4F4F4 !important;
}
.activity .activity-desk .arrow {
    border-bottom: 8px solid transparent;
    border-top: 8px solid transparent;
    display: block;
    height: 0;
    left: -7px;
    position: absolute;
    top: 13px;
    width: 0;
}

.activity-desk .arrow-alt {
    border-left: 8px solid #F4F4F4 !important;
}

.activity-desk .arrow-alt {
    border-bottom: 8px solid transparent;
    border-top: 8px solid transparent;
    display: block;
    height: 0;
    right: -7px;
    position: absolute;
    top: 13px;
    width: 0;
}

.activity-desk .album {
    display: inline-block;
    margin-top: 10px;
}

.activity-desk .album a{
    margin-right: 10px;
}

.activity-desk .album a:last-child{
    margin-right: 0px;
}

.card {
    margin-bottom: 20px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    border: 1px solid transparent;
}

.order_count_div {
    padding: 12%;
}

.card-heading {
    background: #b9b9b9;
    color: #fff;
    text-align: center;
    font-style: normal;
    padding: 7px 110px;
    border-radius: 4px 4px 0 0;
    -webkit-border-radius: 4px 4px 0 0;
    font-size: 16px;
    font-weight: 300;
}

.card a {
    color: #000;
}
    </style>
@endpush
@section('content')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey">
<div class="row">
  <div class="profile-nav col-md-3">
      <div class="panel">
          <div class="user-heading round">
              <a href="#">
                  <img src="{{ asset($user->image) }}" alt="">
              </a>
              <h1>{{ $user->name }}</h1>
              <p>{{ $user->email }}</p>
          </div>
          
            <ul class="list-group">
              <li class="list-group-item" style="border-top-right-radius: 0px;border-top-left-radius: 0px;">
                  <a href="{{route('front.userProfile')}}" id="myProfile" style="text-decoration: none;"> <img width="15" height="15" src="https://img.icons8.com/ios/100/data-pending.png" alt="data-pending"> My Profile</a>
              </li>
              <li class="list-group-item" style="border-top-right-radius: 0px;border-top-left-radius: 0px;">
                  <a href="{{ route('front.front_all_order') }}" id="getOrders" style="text-decoration: none;"> <img width="15" height="15" src="https://img.icons8.com/ios/100/data-pending.png" alt="data-pending"> All Orders</a>
              </li>
              <li class="list-group-item" style="border-top-right-radius: 0px;border-top-left-radius: 0px;">
                  <a href="" id="trackOrder" style="text-decoration: none;"> <img width="15" height="15" src="https://img.icons8.com/ios/100/data-pending.png" alt="data-pending"> Track Order</a>
              </li>
              <li class="list-group-item" style="border-top-right-radius: 0px;border-top-left-radius: 0px;">
                  <a href="{{ route('front.front_pending_order') }}" id="getOrders" style="text-decoration: none;"> <img width="15" height="15" src="https://img.icons8.com/ios/100/data-pending.png" alt="data-pending"> Pending Orders</a>
              </li>
              <li class="list-group-item">
                  <a href="{{ route('front.front_processing_order') }}" id="getOrders" style="text-decoration: none;"> <img width="15" height="15" src="https://img.icons8.com/ios-filled/40/process.png" alt="process"> Processing Orders</a>
              </li>
              <li class="list-group-item">
                  <a href="{{ route('front.front_courier_order') }}" id="getOrders" style="text-decoration: none;"> <img width="15" height="15" src="https://img.icons8.com/external-xnimrodx-lineal-xnimrodx/40/external-courier-distribution-xnimrodx-lineal-xnimrodx.png" alt="external-courier-distribution-xnimrodx-lineal-xnimrodx"> Courier Orders</a>
              </li>
              <li class="list-group-item">
                  <a href="{{ route('front.front_onhold_order') }}" id="getOrders" style="text-decoration: none;"> <img width="15" height="15" src="https://img.icons8.com/ios/40/man-on-phone.png" alt="man-on-phone"> On Hold Orders</a>
              </li>
              <li class="list-group-item">
                  <a href="{{ route('front.front_complete_order') }}" id="getOrders" style="text-decoration: none;"> <img width="15" height="15" src="https://img.icons8.com/ios/15/approval--v1.png" alt="approval--v1"/> Complete Orders </a>
              </li>
              <li class="list-group-item">
                  <a href="{{ route('front.front_cancelled_order') }}" id="getOrders" style="text-decoration: none;"> <img width="15" height="15" src="https://img.icons8.com/ios/15/cancel.png" alt="cancel"/> Cancelled Orders </a>
              </li>
              <li class="list-group-item">
                  <a href="{{ route('front.front_return_order') }}" id="getOrders" style="text-decoration: none;"> <img width="15" height="15" src="https://img.icons8.com/material-two-tone/15/u-turn-to-left.png" alt="u-turn-to-left"/> Return Orders </a>
              </li>
             
            </ul>
          
      </div>
  </div>
  <div class="profile-info col-md-9">
      
      
      
  </div>
</div>
</div>

<script src='https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
<script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
<script>

    $(document).ready(function(){
        let url = "{{ route('front.front_all_order') }}";
        getProfileData(url);
    });
    
    $(document).on('click', 'a#myProfile', function(e){
        e.preventDefault();
        
        let url = "{{ route('front.userCredentials') }}";
        let method = "GET";
        
        $.ajax({
            url : url,
            method : method,
            data : {},
            success : function(res) {
                if(res.status){
                    $('div.profile-info').html(res.user_credentials);
                }
            }
        });
        
    });
    
    $(document).on('click', 'a#trackOrder', function(e){
        e.preventDefault();
        
        let url = "{{ route('front.trackOrder') }}";
        let method = "GET";
        
        $.ajax({
            url : url,
            method : method,
            data : {},
            success : function(res) {
                if(res.status){
                    $('div.profile-info').html(res.track_order);
                }
            }
        });
        
    });

    function getProfileData(url){
        let method = 'GET';
      
        $.ajax({
            url: url,
            method: method,
            data: {},
            success: function(res) {
                if(res.status){
                    $('div.profile-info').html(res.pending_orders);
                }
            }
        });
    }

   $(document).on('submit', 'form#profileUpdate', function(e){
      	e.preventDefault();
        let url = $(this).attr('action');
        let method = $(this).attr('method');
        let formData = new FormData(this);
        
        $.ajax({
          type:method,
          url:url,
          data:formData,
          processData: false, 
          contentType: false, 
          success: function(res)
          {
            if(res.status)
            {
              toastr.success(res.msg);
             
              if(res.url)
              {
                window.location.reload();
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
  
  $(document).on('click', 'a#getOrders', function(e) {
      e.preventDefault();
      
      let url = $(this).attr('href');
      let method = 'GET';
      
      $.ajax({
          url : url,
          method : method,
          data : {},
          success: function(res) {
              if(res.status){
                  $('div.profile-info').html(res.pending_orders);
              }
          }
      });
  });
  
</script>

@endsection