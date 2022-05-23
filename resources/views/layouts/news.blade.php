<link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('assets/css/news.css?v=1.1')}}">
<link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('assets/css/card.css?v=1.1')}}">

@if(\Illuminate\Support\Facades\App::getLocale() == 'fa' ||
        \Illuminate\Support\Facades\App::getLocale() == 'ar' )
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('/assets/css/news/news-rtl.css?v=1.1')}}">
@endif

<link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('assets/css/news/news-mobile.css?v=1.2')}}">

<div id="news">
    <div id="topSection">
        <img class="bogen-loader" id="newsLoader" src="{{asset('assets/images/loading.gif')}}">
    </div>
    <div id="all" class="hidden">
        @include('layouts.filter')
    </div>
</div>

<script>
    var fetchNewsUrl = '{{url('api/' . \Illuminate\Support\Facades\App::getLocale() . '/news')}}';
    var redirectUrl = '{{url(\Illuminate\Support\Facades\App::getLocale() . '/product')}}';
</script>

<script src="{{asset('assets/scripts/slider.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/scripts/news.js')}}"></script>

