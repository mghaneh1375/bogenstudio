@extends('layouts.layout')

@section('head')
    @parent
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset("assets/css/about.css")}}"/>
    <title>Bogen Studio</title>
@stop

@section('content')

    <div id="slider">
        <div class="images">
            <img id="img-1" class="active imp" src="{{\Illuminate\Support\Facades\URL::asset('assets/images/slide-1.jpg')}}">
            <img id="img-2" src="{{\Illuminate\Support\Facades\URL::asset('assets/images/slide-3.jpg')}}">
            <img id="img-3" src="{{\Illuminate\Support\Facades\URL::asset('assets/images/slide-4.jpg')}}">
            <img id="img-4" src="{{\Illuminate\Support\Facades\URL::asset('assets/images/slide-5.jpg')}}">
            <img id="img-5" src="{{\Illuminate\Support\Facades\URL::asset('assets/images/slide-6.jpg')}}">
        </div>
        <div class="texts">
            <div>
                <p id="slider-h">CREATIVITY</p>
                <p id="slider-p">World-class solutions in 3D, VR, AR and Simulators</p>
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
            <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/layer.png')}}">
            <p>Our main concept of business is providing Intelligent and customize solutions based on IT to different kinds of clients. Also, we try to develop services based on computer vision technologies individually or in partnership with other companies, academic institutes or research centers. We also provide hardware solutions besides our software solutions to make e tourism and virtual tourism systems for destinations like museums, Galleries.</p>
            <a target="_blank" href="mailto:info@bogenstudio.com"><span><img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/mail.svg')}}"></span><span>Info@bogenstudio.com</span></a>
        </div>

        <div class="map">
            <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/map.png')}}">
            <h2>Bogen Studio GmbH</h2>
            <p>lindengasse 56/18-19 (C/O IMPACHub - 1070 Wien</p>
        </div>
    </div>

    @include('layouts.contact')
    @include('layouts.footer')

    <script src="{{\Illuminate\Support\Facades\URL::asset('assets/scripts/about.js')}}"></script>

@stop