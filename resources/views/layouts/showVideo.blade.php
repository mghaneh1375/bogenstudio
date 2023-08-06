@extends('layouts.layout')

@section('head')
    @parent

    <link rel="stylesheet" href="{{ asset('assets/css/product/individual/product.css?v=2.1') }}">

    @if (\Illuminate\Support\Facades\App::getLocale() == 'fa' || \Illuminate\Support\Facades\App::getLocale() == 'ar')
        <link rel="stylesheet"
            href="{{ \Illuminate\Support\Facades\URL::asset('/assets/css/product/individual/product-rtl.css?v=2.1') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('assets/css/product/individual/product-mobile.css?v=2.1') }}">
    <style>
        .video,
        iframe {
            position: absolute;
            left: 30px;
            width: calc(100% - 60px);
            height: 100%;
            top: -290px;
            z-index: -1;
        }

        iframe {
            height: 500px;
        }

        .play {
            position: absolute;
            top: -80px;
            width: 60px;
            height: 60px;
            left: calc(50% - 30px);
            z-index: 2;
            cursor: pointer;
        }

        #products .card h1 {
            margin-top: 20px !important;
        }
    </style>

    @yield('seo')
@stop

@section('content')

    <script>
        var locale = '{{ \Illuminate\Support\Facades\App::getLocale() }}';
    </script>

    @yield('fetch')

    <div id="products">
        <img class="bogen-loader" id="loader" src="{{ asset('assets/images/loading.gif') }}">
    </div>

    @include('layouts.footer')
    @include('layouts.footer-mobile')

    <script src="{{ asset('assets/scripts/video.js?v=2.3') }}"></script>

@stop
