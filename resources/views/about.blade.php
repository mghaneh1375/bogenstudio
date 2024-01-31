@extends('layouts.layout')

@section('head')
    <meta property="og:title" content="About Bogen Studio | Contact" />
    <meta name="twitter:title" content="About Bogen Studio | Contact" />
    <meta property="og:site_name" content="About Bogen Studio | Contact" />

    <meta property="og:image" content="https://bogenstudio.com/assets/images/slide-5.jpg" />
    <meta property="og:image:secure_url" content="https://bogenstudio.com/assets/images/slide-5.jpg" />
    <meta property="og:image:width" content="1920" />
    <meta property="og:image:height" content="1278" />
    <meta name="twitter:image" content="https://bogenstudio.com/assets/images/layer.png" />

    <?php
    $description = ' description : Our main concept of business is providing Intelligent and customize solutions based on IT to different kinds of clients. Also, we try to develop services based on computer vision technologies individually or in partnership with other companies, academic institutes or research centers. We also provide hardware solutions besides our software solutions to make e tourism and virtual tourism systems for destinations like museums, Galleries.';
    ?>

    <meta name="description" content="{{ $description }}" />
    <meta name="twitter:description" content="{{ $description }}" />
    <meta property="og:description" content="{{ $description }}" />
    @parent
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('assets/css/about.css?v=2.2') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/slider/slider.css?v=2.1') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/main/home-mobile-rtl.css?v=2.1') }}">

    @if (\Illuminate\Support\Facades\App::getLocale() == 'fa' || \Illuminate\Support\Facades\App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('/assets/css/about-rtl.css?v=2.1') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('/assets/css/slider/slider-mobile.css?v=2.2') }}">

    <title>About Bogen Studio | Contact</title>
@stop

@section('content')

    <div id="slider">
        <div class="images">
            <div data-title="CREATIVITY" data-text="World-class solutions in 3D, VR, AR and Simulators"
                style="overflow: hidden;width: 100%;height: 100%;  background-image: url({{ \Illuminate\Support\Facades\URL::asset('assets/images/slide-1.jpg') }});background-size: cover;background-position: center;"id="img-1">
            </div>
            <div data-title="CREATIVITY2" data-text="World-class solutions in 3D, VR, AR and Simulators2"
                style="overflow: hidden;width: 100%;height: 100%;  background-image: url({{ \Illuminate\Support\Facades\URL::asset('assets/images/slide-3.jpg') }});background-size: cover;background-position: center;"id="img-2">
            </div>
            <div data-title="CREATIVITY3" data-text="World-class solutions in 3D, VR, AR and Simulators3"
                style="overflow: hidden;width: 100%;height: 100%;  background-image: url({{ \Illuminate\Support\Facades\URL::asset('assets/images/slide-4.jpg') }});background-size: cover;background-position: center;"id="img-3">
            </div>
            <div data-title="CREATIVITY4" data-text="World-class solutions in 3D, VR, AR and Simulators4"
                style="overflow: hidden;width: 100%;height: 100%;  background-image: url({{ \Illuminate\Support\Facades\URL::asset('assets/images/slide-5.jpg') }});background-size: cover;background-position: center;"id="img-4">
            </div>
            <div data-title="CREATIVITY5" data-text="World-class solutions in 3D, VR, AR and Simulators5"
                style="overflow: hidden;width: 100%;height: 100%;  background-image: url({{ \Illuminate\Support\Facades\URL::asset('assets/images/slide-6.jpg') }});background-size: cover;background-position: center;"id="img-5">
            </div>
            {{-- <img data-title="CREATIVITY" data-text="World-class solutions in 3D, VR, AR and Simulators" id="img-1"
                src="{{ \Illuminate\Support\Facades\URL::asset('assets/images/slide-1.jpg') }}"> --}}
            {{-- <img data-title="CREATIVITY2" data-text="World-class solutions in 3D, VR, AR and Simulators2" id="img-2"
                src="{{ \Illuminate\Support\Facades\URL::asset('assets/images/slide-3.jpg') }}"> --}}
            {{-- <img data-title="CREATIVITY3" data-text="World-class solutions in 3D, VR, AR and Simulators3" id="img-3"
                src="{{ \Illuminate\Support\Facades\URL::asset('assets/images/slide-4.jpg') }}"> --}}
            {{-- <img data-title="CREATIVITY4" data-text="World-class solutions in 3D, VR, AR and Simulators4" id="img-4"
                src="{{ \Illuminate\Support\Facades\URL::asset('assets/images/slide-5.jpg') }}"> --}}
            {{-- <img data-title="CREATIVITY5" data-text="World-class solutions in 3D, VR, AR and Simulators5" id="img-5"
                src="{{ \Illuminate\Support\Facades\URL::asset('assets/images/slide-6.jpg') }}"> --}}
        </div>
        <div class="texts">
            <div>
                <p id="slider-h"></p>
                <p id="slider-p"></p>
            </div>
        </div>
        <div class="bubbles">
            <div id="bubble-1" data-idx="1" class="bubble selected-bubble"></div>
            <div id="bubble-2" data-idx="2" class="bubble"></div>
            <div id="bubble-3" data-idx="3" class="bubble"></div>
            <div id="bubble-4" data-idx="4" class="bubble"></div>
            <div id="bubble-5" data-idx="5" class="bubble"></div>
        </div>
    </div>

    <div class="innerContent">

        <div class="about">
            <img src="{{ \Illuminate\Support\Facades\URL::asset('assets/images/layer.png') }}">
            <p>{{ __('about.desc') }}</p>
            <a target="_blank" href="mailto:info@bogenstudio.com"><span><img
                        src="{{ \Illuminate\Support\Facades\URL::asset('assets/images/mail.svg') }}"></span><span>Info@bogenstudio.com</span></a>
        </div>

        <div class="map">
            <div
                style="overflow: hidden;width: 100%;height: calc(100% - 71px);  background-image: url({{ \Illuminate\Support\Facades\URL::asset('assets/images/map.png') }});background-size: cover;background-position: center;">
            </div>
            {{-- <img src="{{ \Illuminate\Support\Facades\URL::asset('assets/images/map.png') }}"> --}}
            <h2>{{ __('footer.address_header') }}</h2>
            <p>{{ __('footer.address_desc') }}</p>
        </div>
    </div>

    @include('layouts.contact')
    @include('layouts.footer')
    @include('layouts.footer-mobile')

    <script>
        var totalSliders = 5;
    </script>
    <script src="{{ asset('assets/scripts/slider.js?v=2.2') }}"></script>
    <script src="{{ asset('assets/scripts/about.js?v=2.1') }}"></script>

@stop
