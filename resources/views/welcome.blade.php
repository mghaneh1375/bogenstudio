@extends('layouts.layout')

@section('head')
    @parent
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset("assets/css/home.css")}}"/>
    @if(\Illuminate\Support\Facades\App::getLocale() == 'fa' ||
        \Illuminate\Support\Facades\App::getLocale() == 'ar' )
        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('/assets/css/home-rtl.css')}}">
    @endif
    <title>Bogen Studio</title>
@stop

@section('content')

    <div id="slider">

        <div class="bigTexts">
            <div class="bigSliderText">We</div>
            <div class="bigSliderText">Program</div>
            <div class="bigSliderText">Dreams</div>
        </div>

        <p class="smallText">
            Unique capabilities and Astonishing Art design meet together to give you tools to fulfill what needs in your business, industry, or operations. Our visual and interactive solutions let you be more efficient, productive, and innovative.
        </p>

        <div id="sliderCanvas">
            <div id="bubblesDiv" class="bubbles">
            </div>
        </div>

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
                    <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/arrowright.svg')}}">
                </div>

                <div id="productsTagParent">
                    <div id="productsTag"></div>
                </div>

                <div id="productNextArrow" class="nextArrow">
                    <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/arrowleft.svg')}}">
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

    @include('layouts.footer')

@stop
