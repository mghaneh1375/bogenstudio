@extends('layouts.layout')

@section('head')
    @parent

    <title>Bogen Studio</title>
    <link rel="stylesheet" href="{{asset('assets/css/product/individual/product.css')}}">

    @if(\Illuminate\Support\Facades\App::getLocale() == 'fa' ||
            \Illuminate\Support\Facades\App::getLocale() == 'ar' )
        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('/assets/css/product/individual/product-rtl.css')}}">
    @endif

    <link rel="stylesheet" href="{{asset('assets/css/product/individual/product-mobile.css')}}">

@stop

@section('content')

    <script>
        var locale = '{{\Illuminate\Support\Facades\App::getLocale()}}';
        var getProductUrl = '{{url('api/' . \Illuminate\Support\Facades\App::getLocale() . '/product/show/' . $productId)}}';
    </script>

    <div id="products">
    </div>

    @include('layouts.footer')
    @include('layouts.footer-mobile')

    <script src="{{asset('assets/scripts/product.js')}}"></script>
@stop
