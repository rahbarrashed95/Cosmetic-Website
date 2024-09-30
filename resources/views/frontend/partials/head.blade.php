@php 
    $settings = DB::table('settings')->first();
    $home_seo = DB::table('about_us')->first()->home_seo_description;
    $home_keywords = DB::table('about_us')->first()->home_keywords;
    $dataArray = json_decode($home_keywords, true);
    $metaKeywords = implode(',', array_column($dataArray, 'value'));
@endphp
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="#" />
    <meta name="description" content="{{ $home_seo }}">
    <meta name="keywords" content="{{$metaKeywords}}">
    <link rel="canonical" href="https://www.pastelbeauty.store/"/>
    <title>@yield('title', $settings->site_name)</title>
    <link rel="icon" type="image/x-icon" href="{{$settings->favicon}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <link rel="stylesheet" href="{{asset('frontend/assets/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" integrity="sha512-X/RSQYxFb/tvuz6aNRTfKXDnQzmnzoawgEQ4X8nZNftzs8KFFH23p/BA6D2k0QCM4R0sY1DEy9MIY9b3fwi+bg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css" integrity="sha512-f28cvdA4Bq3dC9X9wNmSx21rjWI+5piIW/uoc2LuQ67asKxfQjUow2MkcCNcfJiaLrHcGbed1wzYe3dlY4w9gA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('frontend/assets/silck/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/silck/slick-theme.css')}}">
   
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/header.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/home.css')}}">
    @stack('css')
    <link rel="stylesheet" href="{{asset('frontend/assets/css/product.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/media.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/categories.css')}}">
</head>






