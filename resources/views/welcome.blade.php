@extends('layouts.layout')

@section('head')
    @parent
    
    <link rel="stylesheet" href="{{ asset('assets/css/main/home.css?v=2.6') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/slider/slider.css?v=2.1') }}">

    @if (\Illuminate\Support\Facades\App::getLocale() == 'fa' || \Illuminate\Support\Facades\App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('/assets/css/main/home-rtl.css?v=2.1') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('/assets/css/slider/slider-mobile.css?v=2.1') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main/home-mobile.css?v=2.2') }}" />
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('assets/css/news.css?v=2.1') }}">
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('assets/css/card.css?v=2.1') }}">

    @if (\Illuminate\Support\Facades\App::getLocale() == 'fa' || \Illuminate\Support\Facades\App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('/assets/css/main/home-mobile-rtl.css?v=2.1') }}">
    @endif

    <title>Bogen studio | Virtual reality and Augmented Reality Solutions</title>

    <meta property="og:title" content="Bogen studio | Virtual reality and Augmented Reality Solutions" />
    <meta name="twitter:title" content="Bogen studio | Virtual reality and Augmented Reality Solutions" />
    <meta property="og:site_name" content="Bogen studio | Virtual reality and Augmented Reality Solutions" />

    <meta property="og:image" content="https://bogenstudio.com/assets/images/slide-5.jpg" />
    <meta property="og:image:secure_url" content="https://bogenstudio.com/assets/images/slide-5.jpg" />
    <meta property="og:image:width" content="1920" />
    <meta property="og:image:height" content="1278" />
    <meta name="twitter:image" content="https://bogenstudio.com/assets/images/layer.png" />

    @if ($seo['article_tag'] != null && !empty($seo['article_tag']))
        <meta name="article:tag" content="{{ $seo['article_tag'] }}" />
    @endif

    @if ($seo['keyword'] != null && !empty($seo['keyword']))
        <meta name="keywords" content="{{ $seo['keyword'] }}" />
    @endif

    <?php
    $description = $seo['description'] != null && !empty($seo['description']) ? $seo['description'] : ' Unique capabilities and Astonishing Art design meet together to give you tools to fulfill what needs in your business, industry, or operations. Our visual and interactive solutions in Augmented Regality, Virtual Reality, and  Mixed Reality  let you be more efficient, productive, and innovative';
    ?>

    <meta name="description" content="{{ $description }}" />
    <meta name="twitter:description" content="{{ $description }}" />
    <meta property="og:description" content="{{ $description }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="application/ld+json">
        
        {
          "@context": "https://schema.org/", 
          "@type": "BreadcrumbList", 
          "itemListElement": [{
            "@type": "ListItem", 
            "position": 1, 
            "name": "Solutions",
            "item": " https://bogenstudio.com/en/solutions"  
          },{
            "@type": "ListItem", 
            "position": 2, 
            "name": "Products",
            "item": " https://bogenstudio.com/en/products"  
          },{
            "@type": "ListItem", 
            "position": 3, 
            "name": "News",
            "item": " https://bogenstudio.com/en/news"  
          },{
            "@type": "ListItem", 
            "position": 4, 
            "name": "About",
            "item": " https://bogenstudio.com/en/about"  
          } ]
        }
        </script>
    <style>
        .swiper {
            position: relative;
            overflow-x: hidden;
            /* overflow-y: visible; */
            width: 100%;
            height: 100%;
            box-shadow: 0px 3px 6px #00000029;
            /* border: 10px solid #FFFFFF; */
            border-radius: 30px;
        }

        .mainSlider {
            height: 100%;
            position: relative;
        }

        .mainSlider img {
            width: 100%;
            height: 100%;
        }

        .mainSlider .title {
            position: absolute;
            left: 0px;
            bottom: 0px;
            width: 100%;
            /* height: 50px; */
            background: transparent linear-gradient(270deg, #080F0B00 0%, #080F0B 100%) 0% 0% no-repeat padding-box;
        }

        .mainSlider .title h1 {
            margin: 5px 15px;
            line-height: 35px;
        }

        .mainSlider .title p {
            margin: 5px 15px;
        }

        .swiper-pagination {
            position: absolute;
            bottom: -30px !important;
        }

        #product {
            margin: 30px 0px;
        }

        .prdBox:nth-child(even) {
            height: 400px;
            display: flex;
        }

        .prdBox:nth-child(odd) {
            height: 400px;
            display: flex;
            flex-direction: row-reverse
        }

        .textBox {
            box-shadow: 0px 3px 6px #00000029;
            width: 50%;
        }

        .textBox .topic {
            margin-top: 80px;
            color: #DA0000;
            padding: 15px;
            font: normal normal bold 20px/19px Segoe UI;
        }

        .textBox .captions {
            color: #5D5D5D;
            padding-left: 15px;
            font: normal normal bold 14px/19px Segoe UI;
        }

        .textBox .desc {
            font: normal normal normal 14px/19px Segoe UI;
            color: #5D5D5D;
            padding: 15px;

        }

        .textBox .more {
            cursor: pointer;
            color: #DA0000;
            padding: 15px;
            font: normal normal bold 14px/19px Segoe UI;
            letter-spacing: 0px;

        }

        .imgBox {
            display: flex;
            align-items: center;
            width: 50%;
            justify-content: center;
        }

        .imgBox img {
            object-fit: contain;
            height: 100%;
        }
    </style>
@stop

@section('content')

    <div id="top-banner">

        <div class="bigTexts">
            <div class="bigSliderText">{{ __('home.top-slider.monster.line1') }}</div>
            <div class="bigSliderText">{{ __('home.top-slider.monster.line2') }}</div>
            <div class="bigSliderText">{{ __('home.top-slider.monster.line3') }}</div>
        </div>

        <div id="sliderCanvas">

            {{-- <img class="bogen-loader" id="modelLoader" src="{{ asset('assets/images/loading.gif') }}">

            <div id="hand" class="hidden">
                <img src="{{ asset('assets/images/hand.svg') }}">
            </div>

            <div id="bubblesDiv" class="bubbles"></div> --}}

            <div class="swiper">
                <!-- Additional required wrapper -->

                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="mainSlider">
                            <div
                                style="overflow: hidden;width: 100%;height: 100%;  background-image: url({{ asset('assets/images/flaim-trainer-VR.jpg') }});background-size: cover;background-position: center;">
                            </div>
                            {{-- <img src="" alt="VR"> --}}
                            <div class="title">
                                <h1>Virtual reality (VR) firefightVR Firefighter Training: Safer, More Effective, and More
                                    Affordable</h1>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="mainSlider">
                            <div
                                style="overflow: hidden;width: 100%;height: 100%;  background-image: url({{ asset('assets/images/lenj.jpg') }});background-size: cover;background-position: center;">
                            </div>
                            {{-- <img src="{{ asset('assets/images/lenj.jpg') }}" alt="VR"> --}}
                            <div class="title">
                                <h1>Representation of Boatbuilding Culture as Intangible Heritage Registered by UNESCO Using
                                    Virtual Reality Technology</h1>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="mainSlider">
                            <div
                                style="overflow: hidden;width: 100%;height: 100%;  background-image: url({{ asset('assets/images/metro.jpg') }});background-size: cover;background-position: center;">
                            </div>
                            {{-- <img src="{{ asset('assets/images/metro.jpg') }}" alt="VR"> --}}
                            <div class="title">
                                <h1>
                                    Introducing the Next-Generation Metro Simulation and Digital Twin Technology:
                                    Revolutionizing the Metro Industry
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="mainSlider">
                            <div
                                style="overflow: hidden;width: 100%;height: 100%;  background-image: url({{ asset('assets/images/faza.jpg') }});background-size: cover;background-position: center;">
                            </div>
                            {{-- <img src="{{ asset('assets/images/faza.jpg') }}" alt="VR"> --}}
                            <div class="title">
                                <h1>Innovative Space Project: Virtual Explorations in Space Sciences using Virtual Reality
                                    (VR)</h1>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                {{-- <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div> --}}

                {{-- <div class="swiper-scrollbar"></div> --}}
            </div>
        </div>

        <p class="smallText">
            {{ __('home.top-slider.text') }}
        </p>

    </div>

    <div class="innerContent">

        <div class="boxes mobile hidden-on-desktop">
            <div class="box firstBox">
                <p class="title">What is <br></p>
                <p class="title" style="display: inline !important;color: #DA0000">Bogen Studio</p>
                <p class="title" style="display: inline">Value</p>
                <p class="desc">Find out about our capabilities, quality and innovation, delivered with collaboration and
                    commitment, focused first and foremost on customer success.</p>
            </div>
            <div class="box">
                <div>
                    <p class="title">{{ __('home.boxes.card1.title') }}</p>
                    <p class="desc">{{ __('home.boxes.card1.desc') }}</p>
                </div>
                <img src="{{ asset('assets/images/1.svg') }}">
            </div>


            <div class="box">
                <p class="title">{{ __('home.boxes.card2.title') }}</p>
                <p class="desc">{{ __('home.boxes.card2.desc') }}</p>
                <img src="{{ asset('assets/images/2.svg') }}">
            </div>
            <div class="box">
                <img src="{{ asset('assets/images/3.svg') }}">
                <p class="title">{{ __('home.boxes.card3.title') }}</p>
                <p class="desc">{{ __('home.boxes.card3.desc') }}</p>
            </div>




            <div class="box">
                <p class="title">{{ __('home.boxes.card4.title') }}</p>
                <p class="desc">{{ __('home.boxes.card4.desc') }}</p>
                <img src="{{ asset('assets/images/4.svg') }}">
            </div>

            <div class="box">
                <img src="{{ asset('assets/images/layer.png') }}">
                <p class="title">{{ __('home.boxes.card5.title') }}</p>
                <p class="desc">{{ __('home.boxes.card5.desc') }}</p>
            </div>

        </div>

        <div class="boxes hidden-on-mobile">
            <div class="box firstBox">
                <p class="title">What is <br></p>
                <p class="title" style="display: inline !important;color: #DA0000">Bogen Studio</p>
                <p class="title" style="display: inline">Value</p>
                <p class="desc">Find out about our capabilities, quality and innovation, delivered with collaboration and
                    commitment, focused first and foremost on customer success.</p>
            </div>
            <div class="box">
                <img src="{{ asset('assets/images/1.svg') }}">
                <p class="title">{{ __('home.boxes.card1.title') }}</p>
                <p class="desc">{{ __('home.boxes.card1.desc') }}</p>
            </div>

            <div class="box">
                <p class="title">{{ __('home.boxes.card2.title') }}</p>
                <p class="desc">{{ __('home.boxes.card2.desc') }}</p>
                <img src="{{ asset('assets/images/2.svg') }}">
            </div>
            <div class="box">
                <img src="{{ asset('assets/images/3.svg') }}">
                <p class="title">{{ __('home.boxes.card3.title') }}</p>
                <p class="desc">{{ __('home.boxes.card3.desc') }}</p>
            </div>

            <div class="box">
                <p class="title">{{ __('home.boxes.card4.title') }}</p>
                <p class="desc">{{ __('home.boxes.card4.desc') }}</p>
                <img src="{{ asset('assets/images/4.svg') }}">
            </div>
            <div class="box">
                <img src="{{ asset('assets/images/layer.png') }}">
                <p class="title">{{ __('home.boxes.card5.title') }}</p>
                <p class="desc">{{ __('home.boxes.card5.desc') }}</p>
            </div>
        </div>

        <div class="three-col" style="display: none">

            <div data-nth="1" class="three-col-item">
                <img src="{{ asset('assets/images/blinkgray.png') }}">
                <div>
                    <p class="title">{{ __('home.three-col.card1.title') }}</p>
                    <p class="desc">{{ __('home.three-col.card1.desc') }}</p>
                </div>
            </div>

            <div data-nth="2" class="three-col-item">
                <img src="{{ asset('assets/images/firegray.svg') }}">
                <div>
                    <p class="title">{{ __('home.three-col.card2.title') }}</p>
                    <p class="desc">{{ __('home.three-col.card2.desc') }}</p>
                </div>
            </div>

            <div data-nth="3" class="three-col-item">
                <img src="{{ asset('assets/images/firegray.svg') }}">
                <div>
                    <p class="title">{{ __('home.three-col.card3.title') }}</p>
                    <p class="desc">{{ __('home.three-col.card3.desc') }}</p>
                </div>
            </div>

        </div>
        <div class="about">
            <p class="title" style="color: #DA0000">Bogen Studio </p>
            <p class="title">Products and Solutions</p>
            <p class="desc">We offer a variety of products and solutions, including training simulations, VR and AR
                solutions, virtual
                tourism, HSE training, and virtual exhibitions. You can browse our full list of products here and find out
                more about the solutions we offer here.</p>
        </div>
        <div id="product">
            <div class="prdBox">
                <div class="textBox">
                    <div class="topic">Fire and Safety Training Simulation</div>
                    <div class="desc">A virtual reality program for simulating safety, firefighting, and emergency
                        scenarios
                        with realistic graphics and dynamic features. Develop the skills and knowledge to respond
                        effectively
                        Train people in a safe and controlled environment Reduce the risk of accidents and injuries Improve
                        communication and collaboration between different teams</div>
                    <div class="more">Learn more</div>
                </div>
                <div class="imgBox">
                    <div
                        style="overflow: hidden;width: 90%;height: 90%;  background-image: url({{ asset('assets/images/flaim-trainer-VR.jpg') }});background-size: cover;background-position: center;">
                    </div>
                </div>
            </div>
            <div class="prdBox">
                <div class="textBox">
                    <div class="topic">Innovative Space Project </div>
                    <div class="captions">Virtual Explorations in Space Sciences using Virtual Reality(VR)</div>
                    <div class="desc">Explore the wonders of the Solar System and beyond with Bogen Studio's precise
                        simulations of planets, moons, asteroid belts, the International Space Station, the lunar surface, a
                        research base on the Moon, and even the Dragon Space X spacecraft. Immerse yourself in a spectacular
                        virtual reality experience that you won't forget.</div>
                    <div class="more">Learn more</div>
                </div>
                <div class="imgBox">
                    <div
                        style="overflow: hidden;width: 90%;height: 90%;  background-image: url({{ asset('assets/images/faza.jpg') }});background-size: cover;background-position: center;">
                    </div>
                </div>
            </div>
            <div class="prdBox">
                <div class="textBox">
                    <div class="topic">Virtual Art Gallery and Exhibition</div>
                    <div class="captions"> Always and Everywhere</div>
                    <div class="desc">Virtual art gallery and exhibition is a space to showcase your products and
                        artworks in
                        3D with walk-in and interactive capabilities. It is fully manageable and editable by you, and it
                        instantly provides your audience with a real and immersive 3D experience via the web.</div>
                    <div class="more">Learn more</div>
                </div>
                <div class="imgBox">
                    <div
                        style="overflow: hidden;width: 90%;height: 90%;  background-image: url({{ asset('assets/images/metro.jpg') }});background-size: cover;background-position: center;">
                    </div>
                </div>
            </div>
            <div class="prdBox">
                <div class="textBox">
                    <div class="topic">Virtual Tour Experience Everything </div>
                    <div class="captions">You Need, Anytime, Anywhere</div>

                    <div class="desc">Virtual tour simulations and presentations for tourist attractions, museums, and
                        other
                        related businesses offer an attractive, fast, and convenient opportunity for audiences. In addition
                        to
                        virtual visits via the web and virtual reality glasses, our virtual guidance system and augmented
                        reality allow visitors to easily access all the information they need whenever they want. This makes
                        it
                        an excellent way to experience a location without actually being there physically.</div>
                    <div class="more">Learn more</div>
                </div>
                <div class="imgBox">
                    <div
                        style="overflow: hidden;width: 90%;height: 90%;  background-image: url({{ asset('assets/images/lenj.jpg') }});background-size: cover;background-position: center;">
                    </div>
                </div>
            </div>
        </div>

        <div class="about">
            <p class="title" style="color: #DA0000">Bogen Studio </p>
            <p class="title">Bogen Studio News & Soloutins</p>
            <p class="desc">Discover our VR (Virtual Reality), AR (Augmented Reality), MR, and XR training programs,
                simulations, Fire Studio, eTourism, Virtual Tourism, and other solutions and products. Download our CV or
                browse
                our catalogs.</p>
        </div>
    </div>

    <div id="news">

    </div>
    @include('layouts.contact')

    <div id="intro">

        {{-- <div class="scroll-arrows" style="display: none">
            <img src="{{ asset('assets/images/arrowleft.svg') }}">
            <img src="{{ asset('assets/images/arrowright.svg') }}">
        </div> --}}

        <div style="display: flex">

            <div class="card" style=";margin:10px 10px 10px 0px">

                <h1>{{ __('home.intro.card1.title') }}</h1>
                <p>
                    {{ __('home.intro.card1.desc') }}
                </p>

                <div>
                    <img src="{{ asset('assets/images/r1.svg') }}">
                    <div class="desc">
                        <span>{{ __('home.intro.vr') }}</span>
                        <img src="{{ asset('assets/images/day-dream.png') }}">
                        <img src="{{ asset('assets/images/google-cardboard.png') }}">
                        <img src="{{ asset('assets/images/htc.png') }}">
                        <img src="{{ asset('assets/images/microsoft.png') }}">
                        <img src="{{ asset('assets/images/oculus.png') }}">
                    </div>
                </div>
            </div>

            <div class="card"style=";margin:10px 0px 10px 10px">
                <h1>{{ __('home.intro.card3.title') }}</h1>
                <p>
                    {{ __('home.intro.card3.desc') }}
                </p>
                <div>
                    <img src="{{ asset('assets/images/r2.svg') }}">
                </div>
            </div>
        </div>

        <div class="card" style="width:auto;margin:0px;flex-direction: row;margin-top: unset !important">
            <div style="display: flex;flex-direction: column;margin-bottom: 25px;">
                <h1>{{ __('home.intro.card2.title') }}</h1>
                <p>
                    {{ __('home.intro.card2.desc') }}
                </p>
                <h1 id="good" class="hidden">Your browser supports WebGL</h1>
            </div>

            <div id="webgl-container" style="width: 50%">

                <div class="hidden" id="have-javascript">
                    <div class="hidden webgl-div" id="webgl-yes">
                        <div id="logo-container">
                            <canvas id="webgl-logo" style="width: 100px; height: 110px;" /></canvas>
                        </div>
                    </div>

                    <div class="hidden webgl-div" id="webgl-disabled">
                        <p>Hmm. While your browser seems to support WebGL, it is disabled or unavailable. If possible,
                            please ensure that you are running the latest drivers for your video card.</p>
                    </div>

                    <div class="hidden webgl-div" id="webgl-no">
                        <p>Oh no! We are sorry, but your browser does not seem to support WebGL.</p>
                    </div>

                </div>

                <div id="no-javascript">
                    You must enable JavaScript to use WebGL.
                </div>

            </div>

        </div>

    </div>
    @include('layouts.videos')
    @include('layouts.footer')
    @include('layouts.footer-mobile')
    {{-- @include('layouts.news') --}}
    {{-- <div id="products" style="display: none">

        <img class="bogen-loader" id="productLoader" src="{{ asset('assets/images/loading.gif') }}">

        <div class="left hidden">

            <div class="nav">

                <div id="productBackArrow" class="backArrow">
                    <img src="{{ asset('assets/images/arrowright.svg') }}">
                </div>

                <div id="productsTagParent">
                    <div id="productsTag"></div>
                </div>

                <div id="productNextArrow" class="nextArrow">
                    <img src="{{ asset('assets/images/arrowleft.svg') }}">
                </div>


            </div>

            <div class="content">
                <div>
                    <p id="productTitle" class="title"></p>
                    <p id="productDigest" class="desc"></p>

                    <div style="display: flex;align-items: center;margin-left: 10px;">
                        <div id="bubbleBackArrow" class="backArrow">
                            <img src="{{ asset('assets/images/arrowright.svg') }}">
                        </div>

                        <div id="productsBubbles" class="bubbles"></div>

                        <div id="bubbleNextArrow" class="nextArrow">
                            <img src="{{ asset('assets/images/arrowleft.svg') }}">
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="right">
            <img id="productSlider">
        </div>

    </div> --}}
    <script>
        var getModelsPath = '{{ url('api/model') }}';
        var assetPath = '{{ url('/') }}' + "/assets/";
        var getProductsPath = '{{ url('api/' . \Illuminate\Support\Facades\App::getLocale() . '/product') }}';
        var locale = '{{ \Illuminate\Support\Facades\App::getLocale() }}';
        var fetchNewsUrl = '{{ url('api/' . \Illuminate\Support\Facades\App::getLocale() . '/news') }}';
        var fetchLimit = -1;
        var newsFetchLimit = -1;
        var fetchLimit = 3;
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            // navigation: {
            //     nextEl: '.swiper-button-next',
            //     prevEl: '.swiper-button-prev',
            // },


        });
        swiper.slideNext();
    </script>


    <script async src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"></script>
    <script type="importmap">
      {
        "imports": {
          "three": "https://unpkg.com/three@0.139.2/build/three.module.js"
        }
      }
    </script>

    <script type="module" src="{{ asset('assets/scripts/home.js?v=2.1') }}"></script>
    <script async type="module" src="{{ asset('assets/scripts/fbxloader.js?v=2.1') }}"></script>
    <script src="{{ asset('assets/scripts/webgl-need.min.js?v=2.1') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/logo4.js?v=2.1') }}"></script>
    <script src="{{ asset('assets/scripts/webgl.js?v=2.1') }}"></script>

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


@stop
