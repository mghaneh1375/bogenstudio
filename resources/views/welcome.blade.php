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

    <title>Bogen Studio</title>
@stop

@section('content')

    <div id="top-banner">

        <div class="bigTexts">
            <div class="bigSliderText">We</div>
            <div class="bigSliderText">Program</div>
            <div class="bigSliderText">Dreams</div>
        </div>

        <div id="sliderCanvas">
            <div id="bubblesDiv" class="bubbles">
                <div id="hand" class="hidden">
                    <img src="{{asset('assets/images/hand.svg')}}">
                </div>
            </div>
        </div>

        <p class="smallText">
            Unique capabilities and Astonishing Art design meet together to give you tools to fulfill what needs in your business, industry, or operations. Our visual and interactive solutions let you be more efficient, productive, and innovative.
        </p>

    </div>

    <div class="innerContent">

        <div class="boxes">
            <div class="box">
                <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/1.svg')}}">
                <p class="title">Based on your needs.</p>
                <p class="desc">Fully customized features to your needs. If it works for you, it works for us too.</p>
            </div>
            <div class="box">
                <p class="title">New Technologies, new soloutins</p>
                <p class="desc">We use new technologies like AR, VR, WebVR, WebGL to provide you with more effective and practical solutions,</p>
                <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/2.svg')}}">
            </div>
            <div class="box">
                <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/3.svg')}}">
                <p class="title">Complicated scenarios</p>
                <p class="desc">Ready to be in digital words. We take care of complex scenarios of your industry or need.</p>
            </div>
            <div class="box">
                <p class="title">New Technologies, new solutions</p>
                <p class="desc">We use new technologies like AR, VR, WebVR, WebGL to provide you with more effective and practical solutions,</p>
                <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/4.svg')}}">
            </div>
            <div class="box">
                <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/layer.png')}}">
                <p class="title">From beginning to end</p>
                <p class="desc">We stand by you with our experts from starting a project till the end of it. We guarantee the outcome will be helpful.</p>
            </div>
        </div>

        <div class="three-col">

            <div data-nth="1" class="three-col-item">
                <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/blinkgray.png')}}">
                <div>
                    <p class="title">Blink</p>
                    <p class="desc">virtual exhibition , art gallery, and product showroom</p>
                </div>
            </div>

            <div data-nth="2" class="three-col-item">
                <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/firegray.svg')}}">
                <div>
                    <p class="title">Fire Studio</p>
                    <p class="desc">Fire and Rescue Training VR studio</p>
                </div>
            </div>

            <div data-nth="3" class="three-col-item">
                <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/firegray.svg')}}">
                <div>
                    <p class="title">Solar Cyberium</p>
                    <p class="desc">Live in the Space</p>
                </div>
            </div>

        </div>

    </div>

    <div id="products">

        <div class="left">

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
            <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/slider.jpg')}}">
        </div>

    </div>

    <div id="intro">

        <div class="scroll-arrows">
            <img src="{{asset('assets/images/arrowleft.svg')}}">
            <img src="{{asset('assets/images/arrowright.svg')}}">
        </div>

        <div class="card">
            <h1>WebVirtualReality</h1>
            <p>
                Easies than ever. Use your Web Browser to experience our product in Virtual Reality. No need to install any software. accessible from every ever, any time
            </p>
            <img src="{{asset('assets/images/r1.svg')}}">
            <div class="desc">
                <span>Gear VR</span>
                <img src="{{asset('assets/images/day-dream.png')}}">
                <img src="{{asset('assets/images/google-cardboard.png')}}">
                <img src="{{asset('assets/images/htc.png')}}">
                <img src="{{asset('assets/images/microsoft.png')}}">
                <img src="{{asset('assets/images/oculus.png')}}">
            </div>
        </div>

        <div class="card">
            <h1>Web-Based Graphic software</h1>
            <p>
                More accessible than ever. Rendering high-performance interactive 3D and 2D graphics within any compatible web browser without the use of plug-ins brings you a variety of features.
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
            <h1>Digital Twin, Let simulate reality</h1>
            <p>
                A digital twin is a virtual representation of an object or system that spans its lifecycle, is updated from real-time data, and uses simulation, machine learning and reasoning to help decision-making.
            </p>
            <img src="{{asset('assets/images/r2.svg')}}">
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
