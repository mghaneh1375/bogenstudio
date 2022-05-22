@extends('layouts.layout')

@section('head')
    @parent

    <title>Bogen Studio</title>
    <link rel="stylesheet" href="{{asset('assets/css/products.css')}}">

    @if(\Illuminate\Support\Facades\App::getLocale() == 'fa' ||
            \Illuminate\Support\Facades\App::getLocale() == 'ar' )
        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('/assets/css/product/list/products-rtl.css')}}">
    @endif

    <link rel="stylesheet" href="{{asset('assets/css/products-mobile.css')}}">

    @if(\Illuminate\Support\Facades\App::getLocale() == 'fa' ||
            \Illuminate\Support\Facades\App::getLocale() == 'ar' )
        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('/assets/css/product/list/products-mobile-rtl.css')}}">
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

    <script src="{{asset('assets/scripts/products.js')}}"></script>
@stop
