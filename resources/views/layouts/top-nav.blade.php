@if(\Illuminate\Support\Facades\App::getLocale() == 'fa' ||
    \Illuminate\Support\Facades\App::getLocale() == 'ar' )
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('/assets/css/nav-rtl.css')}}">
@endif

<link rel="stylesheet" href="{{asset('/assets/css/nav-mobile.css')}}">

<nav id="navbar">

    <div id="bogenLogo">
        <span>Bogen</span>
        <span>Studio</span>
    </div>

    <div id="menuContainer">

        <div id="secondLogo">
            <img src="{{asset("assets/images/layer.png")}}" height="100%">
        </div>

        <div id="menu">

            <?php
               $routeName = \Request::route()->getName();
            ?>

            <p {{($routeName == "home") ? 'class=selected' : ''}}><a href="{{url(\Illuminate\Support\Facades\App::getLocale())}}">{{__('footer.home')}}</a></p>
            <p {{($routeName == "solutions") ? 'class=selected' : ''}}><a href="{{url(\Illuminate\Support\Facades\App::getLocale() . '/solutions')}}">{{__('footer.solutions')}}</a></p>
            <p {{($routeName == "products" || $routeName == "product") ? 'class=selected' : ''}}><a href="{{url(\Illuminate\Support\Facades\App::getLocale() . '/products')}}">{{__('footer.products')}}</a></p>
            <p {{($routeName == "allNews") ? 'class=selected' : ''}}><a href="{{url(\Illuminate\Support\Facades\App::getLocale() . '/news')}}">{{__('footer.news')}}</a></p>
            <p {{($routeName == "about") ? 'class=selected' : ''}}><a href="{{url(\Illuminate\Support\Facades\App::getLocale() . '/about')}}">{{__('footer.about')}}</a></p>

            <img id="hamber-menu" class="hidden" src="{{asset('assets/images/mobile-menu.svg')}}">
            <button>{{__('footer.create')}}</button>

        </div>

    </div>

</nav>

<div id="open-menu" class="hidden">

    <img id="close-hamber-menu" src="{{asset('assets/images/mobile-close.svg')}}">

    <div class="banner">
        <span>Bogen</span>
        <span>Studio</span>
    </div>

    <p {{($routeName == "home") ? 'class=selected' : ''}}><a href="{{url(\Illuminate\Support\Facades\App::getLocale())}}">{{__('footer.home')}}</a></p>
    <p {{($routeName == "solutions") ? 'class=selected' : ''}}><a href="{{url(\Illuminate\Support\Facades\App::getLocale() . '/solutions')}}">{{__('footer.solutions')}}</a></p>
    <p {{($routeName == "products" || $routeName == "product") ? 'class=selected' : ''}}><a href="{{url(\Illuminate\Support\Facades\App::getLocale() . '/products')}}">{{__('footer.products')}}</a></p>
    <p {{($routeName == "allNews") ? 'class=selected' : ''}}><a href="{{url(\Illuminate\Support\Facades\App::getLocale() . '/news')}}">{{__('footer.news')}}</a></p>
    <p {{($routeName == "about") ? 'class=selected' : ''}}><a href="{{url(\Illuminate\Support\Facades\App::getLocale() . '/about')}}">{{__('footer.about')}}</a></p>

    <img class="img-logo" src="{{asset('assets/images/layer.png')}}">
</div>

<script src="{{asset('assets/scripts/hamber-menu.js')}}"></script>
