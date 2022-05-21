@extends('layouts.layout')

@section('head')
    @parent
    <link rel="stylesheet" href="{{asset("assets/css/main/home.css")}}"/>
    <link rel="stylesheet" href="{{asset('/assets/css/slider/slider.css')}}">

    @if(\Illuminate\Support\Facades\App::getLocale() == 'fa' ||
        \Illuminate\Support\Facades\App::getLocale() == 'ar' )
        <link rel="stylesheet" href="{{asset('/assets/css/main/home-rtl.css')}}">
    @endif

    <link rel="stylesheet" href="{{asset('/assets/css/slider/slider-mobile.css')}}">
    <link rel="stylesheet" href="{{asset("assets/css/main/home-mobile.css")}}"/>

    @if(\Illuminate\Support\Facades\App::getLocale() == 'fa' ||
        \Illuminate\Support\Facades\App::getLocale() == 'ar' )
        <link rel="stylesheet" href="{{asset('/assets/css/main/home-mobile-rtl.css')}}">
    @endif

    <title>Bogen Studio</title>
@stop

@section('content')

    <div id="top-banner">

        <div class="bigTexts">
            <div class="bigSliderText">{{__('home.top-slider.monster.line1')}}</div>
            <div class="bigSliderText">{{__('home.top-slider.monster.line2')}}</div>
            <div class="bigSliderText">{{__('home.top-slider.monster.line3')}}</div>
        </div>

        <div id="sliderCanvas">

            <img id="modelLoader" src="{{asset('assets/images/loading.gif')}}" style="display: block; margin: 0 auto; width: 100px">

            <div id="bubblesDiv" class="bubbles">
                <div id="hand" class="hidden">
                    <img src="{{asset('assets/images/hand.svg')}}">
                </div>
            </div>
        </div>

        <p class="smallText">
            {{__('home.top-slider.text')}}
        </p>

    </div>

    <div class="innerContent">

        <div class="boxes">
            <div class="box">
                <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/1.svg')}}">
                <p class="title">{{__('home.boxes.card1.title')}}</p>
                <p class="desc">{{__('home.boxes.card1.desc')}}</p>
            </div>
            <div class="box">
                <p class="title">{{__('home.boxes.card2.title')}}</p>
                <p class="desc">{{__('home.boxes.card2.desc')}}</p>
                <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/2.svg')}}">
            </div>
            <div class="box">
                <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/3.svg')}}">
                <p class="title">{{__('home.boxes.card3.title')}}</p>
                <p class="desc">{{__('home.boxes.card3.desc')}}</p>
            </div>
            <div class="box">
                <p class="title">{{__('home.boxes.card4.title')}}</p>
                <p class="desc">{{__('home.boxes.card4.desc')}}</p>
                <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/4.svg')}}">
            </div>
            <div class="box">
                <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/layer.png')}}">
                <p class="title">{{__('home.boxes.card5.title')}}</p>
                <p class="desc">{{__('home.boxes.card5.desc')}}</p>
            </div>
        </div>

        <div class="three-col">

            <div data-nth="1" class="three-col-item">
                <img src="{{asset('assets/images/blinkgray.png')}}">
                <div>
                    <p class="title">{{__('home.three-col.card1.title')}}</p>
                    <p class="desc">{{__('home.three-col.card1.desc')}}</p>
                </div>
            </div>

            <div data-nth="2" class="three-col-item">
                <img src="{{asset('assets/images/firegray.svg')}}">
                <div>
                    <p class="title">{{__('home.three-col.card2.title')}}</p>
                    <p class="desc">{{__('home.three-col.card2.desc')}}</p>
                </div>
            </div>

            <div data-nth="3" class="three-col-item">
                <img src="{{asset('assets/images/firegray.svg')}}">
                <div>
                    <p class="title">{{__('home.three-col.card3.title')}}</p>
                    <p class="desc">{{__('home.three-col.card3.desc')}}</p>
                </div>
            </div>

        </div>

    </div>

    <div id="products">

        <img id="productLoader" src="{{asset('assets/images/loading.gif')}}" style="display: block; margin: 0 auto; width: 100px">

        <div class="left hidden">

            <div class="nav">

                <div id="productBackArrow" class="backArrow">
                    <img src="{{asset('assets/images/arrowright.svg')}}">
                </div>

                <div id="productsTagParent">
                    <div id="productsTag"></div>
                </div>

                <div id="productNextArrow" class="nextArrow">
                    <img src="{{asset('assets/images/arrowleft.svg')}}">
                </div>

            </div>

            <div class="content">
                <div>
                    <p id="productTitle" class="title"></p>
                    <p id="productDigest" class="desc"></p>

                    <div id="productsBubbles" class="bubbles">
                    </div>

                </div>
            </div>

        </div>

        <div class="right">
            <img id="productSlider">
        </div>

    </div>

    <div id="intro">

        <div class="scroll-arrows">
            <img src="{{asset('assets/images/arrowleft.svg')}}">
            <img src="{{asset('assets/images/arrowright.svg')}}">
        </div>

        <div class="card">

            <h1>{{__('home.intro.card1.title')}}</h1>
            <p>
                {{__('home.intro.card1.desc')}}
            </p>

            <div>
                <img src="{{asset('assets/images/r1.svg')}}">
                <div class="desc">
                    <span>{{__('home.intro.vr')}}</span>
                    <img src="{{asset('assets/images/day-dream.png')}}">
                    <img src="{{asset('assets/images/google-cardboard.png')}}">
                    <img src="{{asset('assets/images/htc.png')}}">
                    <img src="{{asset('assets/images/microsoft.png')}}">
                    <img src="{{asset('assets/images/oculus.png')}}">
                </div>
            </div>
        </div>

        <div class="card">
            <h1>{{__('home.intro.card2.title')}}</h1>
            <p>
                {{__('home.intro.card2.desc')}}
            </p>

            <div id="webgl-container">

                <div class="hidden" id="have-javascript">
                    <div class="hidden webgl-div" id="webgl-yes">
                        <div id="logo-container">
                            <canvas id="webgl-logo" style="width: 100px; height: 110px;" /></canvas>
                        </div>
                        <h1 class="good">Your browser supports WebGL</h1>
                    </div>

                    <div class="hidden webgl-div" id="webgl-disabled">
                        <p>Hmm.  While your browser seems to support WebGL, it is disabled or unavailable.  If possible, please ensure that you are running the latest drivers for your video card.</p>
                    </div>

                    <div class="hidden webgl-div" id="webgl-no">
                        <p>Oh no!  We are sorry, but your browser does not seem to support WebGL.</p>
                    </div>

                </div>

                <div id="no-javascript">
                    You must enable JavaScript to use WebGL.
                </div>

            </div>

        </div>

        <div class="card">
            <h1>{{__('home.intro.card3.title')}}</h1>
            <p>
                {{__('home.intro.card3.desc')}}
            </p>
            <div>
                <img src="{{asset('assets/images/r2.svg')}}">
            </div>
        </div>

    </div>

    <script> var newsFetchLimit = 4; </script>

    @include('layouts.news')

    @include('layouts.contact')

    <script>
        var getModelsPath = '{{url('api/model')}}';
        var assetPath = '{{url('/')}}' + "/assets/";
        var getProductsPath = '{{url('api/' . \Illuminate\Support\Facades\App::getLocale() . '/product')}}';
        var locale = '{{\Illuminate\Support\Facades\App::getLocale()}}';
        var fetchLimit = 3;
    </script>

    @include('layouts.videos')

    <script async src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"></script>
    <script type="importmap">
      {
        "imports": {
          "three": "https://unpkg.com/three@0.139.2/build/three.module.js"
        }
      }
    </script>

    <script type="module" src="{{\Illuminate\Support\Facades\URL::asset('assets/scripts/home.js?v=1.3')}}"></script>
    <script async type="module" src="{{\Illuminate\Support\Facades\URL::asset('assets/scripts/fbxloader.js')}}"></script>
    <script src="{{asset('assets/scripts/webgl-need.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/scripts/logo4.js')}}"></script>
    <script src="{{asset('assets/scripts/webgl.js')}}"></script>

    <script id="modelVertexShader" type="text/something-not-javascript">
uniform mat4 worldViewProjection;
attribute vec4 position;
void main() {
  gl_Position = (worldViewProjection * position);
}

</script>
    <script id="modelFragmentShader" type="text/something-not-javascript">
precision mediump float;
void main() {
  gl_FragColor = vec4(0.4, 0.4, 0.4, 1.0);
}
</script>

    @include('layouts.footer')
    @include('layouts.footer-mobile')

@stop
