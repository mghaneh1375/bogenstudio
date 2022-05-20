@extends('layouts.layout')

@section('head')
    @parent

    <title>Bogen Studio</title>

    <link rel="stylesheet" href="{{asset('assets/css/news/all-mobile.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/slider/slider.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/slider/slider-mobile.css')}}">

    @if(\Illuminate\Support\Facades\App::getLocale() == 'fa' ||
            \Illuminate\Support\Facades\App::getLocale() == 'ar' )
        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('/assets/css/slider/slider-mobile-rtl.css')}}">
    @endif

@stop

@section('content')

    <script>
        var locale = '{{\Illuminate\Support\Facades\App::getLocale()}}';
        var fetchLimit = -1;
        var newsFetchLimit = -1;
    </script>

    @include('layouts.news')

    @include('layouts.videos')


    @include('layouts.footer')
    @include('layouts.footer-mobile')

@stop
