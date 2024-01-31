<!DOCTYPE html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @section('head')

        @if (\Illuminate\Support\Facades\App::getLocale() == 'fa' || \Illuminate\Support\Facades\App::getLocale() == 'ar')
            <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('assets/css/common/rtl.css?v=2.1') }}" />
        @endif
        <link rel="stylesheet" href="{{ asset('assets/css/main/home-mobile.css?v=2.2') }}" />

        <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('assets/css/common.css?v=2.1') }}" />
        <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('assets/css/common/mobile.css?v=2.1') }}" />
        <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('assets/css/font.css?v=2.1') }}" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/images/fav/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/images/fav/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/images/fav/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/images/fav/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/images/fav/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/images/fav/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/images/fav/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/images/fav/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/fav/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"
            href="{{ asset('assets/images/fav/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/fav/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/images/fav/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/fav/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('assets/images/fav/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('assets/images/fav/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function detectMob() {
                const toMatch = [
                    /Android/i,
                    /webOS/i,
                    /iPhone/i,
                    /iPad/i,
                    /iPod/i,
                    /BlackBerry/i,
                    /Windows Phone/i
                ];

                return toMatch.some((toMatchItem) => {
                    return navigator.userAgent.match(toMatchItem);
                });
            }

            window.mobileCheck = detectMob();

            var JSTranslate = {
                "more": '{{ __('common.more') }}',
                "next": '{{ __('common.next') }}',
                "previous": '{{ __('common.previous') }}',
            }
        </script>

        <meta property="article:author " content="Bogen studio" />
        <meta property="article:section" content="article" />

    @show



</head>


<body>

    @include('layouts.top-nav')

    <div class="content">
        @yield('content')
    </div>

</body>
