@extends('layouts.layout')

@section('head')
    @parent

    <title>Bogen Studio</title>
    <link rel="stylesheet" href="{{asset('assets/css/products.css?v=2.1')}}">

    @if(\Illuminate\Support\Facades\App::getLocale() == 'fa' ||
            \Illuminate\Support\Facades\App::getLocale() == 'ar' )
        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('/assets/css/product/list/products-rtl.css?v=2.1')}}">
    @endif

    <link rel="stylesheet" href="{{asset('assets/css/products-mobile.css?v=2.1')}}">

    @if(\Illuminate\Support\Facades\App::getLocale() == 'fa' ||
            \Illuminate\Support\Facades\App::getLocale() == 'ar' )
        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('/assets/css/product/list/products-mobile-rtl.css?v=2.1')}}">
    @endif

@stop

@section('content')

    <script>
        var locale = '{{\Illuminate\Support\Facades\App::getLocale()}}';
        var getProductsUrl = '{{url('api/' . \Illuminate\Support\Facades\App::getLocale() . '/product/0')}}';
        var productUrl = '{{url(\Illuminate\Support\Facades\App::getLocale() . '/product')}}';
    </script>

    <div id="products">

        <img class="bogen-loader" id="productLoader" src="{{asset('assets/images/loading.gif')}}">

        <div id="all-tags"></div>
    </div>

    @include('layouts.footer')
    @include('layouts.footer-mobile')

    <script src="{{asset('assets/scripts/products.js?v=2.1')}}"></script>
@stop
