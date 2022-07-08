@extends('layouts.layout')

@section('head')
    @parent

    <link rel="stylesheet" href="{{asset('assets/css/product/individual/product.css?v=2.1')}}">

    @if(\Illuminate\Support\Facades\App::getLocale() == 'fa' ||
            \Illuminate\Support\Facades\App::getLocale() == 'ar' )
        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('/assets/css/product/individual/product-rtl.css?v=2.1')}}">
    @endif

    <link rel="stylesheet" href="{{asset('assets/css/product/individual/product-mobile.css?v=2.1')}}">

    @yield('seo')
@stop

@section('content')

    <script>
        var locale = '{{\Illuminate\Support\Facades\App::getLocale()}}';
    </script>

    @yield('fetch')

    <div id="products">
        <img class="bogen-loader" id="loader" src="{{asset('assets/images/loading.gif')}}">
    </div>

    @include('layouts.footer')
    @include('layouts.footer-mobile')

    <script src="{{asset('assets/scripts/product.js?v=2.1')}}"></script>

@stop
