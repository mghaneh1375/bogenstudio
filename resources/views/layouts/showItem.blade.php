@extends('layouts.layout')

@section('head')
    @parent

    <title>Bogen Studio</title>
    <link rel="stylesheet" href="{{asset('assets/css/product/individual/product.css?v=1.1')}}">

    @if(\Illuminate\Support\Facades\App::getLocale() == 'fa' ||
            \Illuminate\Support\Facades\App::getLocale() == 'ar' )
        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('/assets/css/product/individual/product-rtl.css?v=1.1')}}">
    @endif

    <link rel="stylesheet" href="{{asset('assets/css/product/individual/product-mobile.css?v=1.1')}}">

@stop

@section('content')

    <script>
        var locale = '{{\Illuminate\Support\Facades\App::getLocale()}}';
    </script>

    @yield('fetch')

    <div id="products">
        @include('layouts.filter')
        <img class="bogen-loader" id="loader" src="{{asset('assets/images/loading.gif')}}">
    </div>

    @include('layouts.footer')
    @include('layouts.footer-mobile')

    <script src="{{asset('assets/scripts/product.js')}}"></script>

@stop