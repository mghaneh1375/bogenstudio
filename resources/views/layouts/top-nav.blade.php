@if(\Illuminate\Support\Facades\App::getLocale() == 'fa' ||
    \Illuminate\Support\Facades\App::getLocale() == 'ar' )
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('/assets/css/nav-rtl.css')}}">
@endif

<nav id="navbar">

    <div id="bogenLogo">
        <span>Bogen</span>
        <span>Studio</span>
    </div>

    <div id="menuContainer">

        <div id="secondLogo">
            <img src="{{\Illuminate\Support\Facades\URL::asset("assets/images/layer.png")}}" height="100%">
        </div>

        <div id="menu">

            <?php
               $routeName = \Request::route()->getName();
            ?>

            <p {{($routeName == "home") ? 'class=selected' : ''}}><a href="{{url(\Illuminate\Support\Facades\App::getLocale())}}">{{__('footer.home')}}</a></p>
            <p>{{__('footer.solutions')}}</p>
            <p>{{__('footer.products')}}</p>
            <p>{{__('footer.news')}}</p>
            <p {{($routeName == "about") ? 'class=selected' : ''}}><a href="{{url(\Illuminate\Support\Facades\App::getLocale() . '/about')}}">{{__('footer.about')}}</a></p>

            <button>{{__('footer.create')}}</button>

        </div>

    </div>

</nav>
