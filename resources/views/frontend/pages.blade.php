@extends('frontend.app')
@section('title')
{{$customPage->page_name}}
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/cart.css') }}">
@endpush

@section('content')
<div class="container" style="padding: 40px 0px 130px 0px;">
<h1 style="text-align: center;margin-bottom: 40px;">{{$customPage->page_name}}</h1>
<p style="text-align:justify">{!!$customPage->description!!}</p>    
</div>



@endsection