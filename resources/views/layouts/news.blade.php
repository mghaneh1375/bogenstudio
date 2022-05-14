<link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('assets/css/news.css?v=1.1')}}">
<link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('assets/css/card.css?v=1.1')}}">

@if(\Illuminate\Support\Facades\App::getLocale() == 'fa' ||
        \Illuminate\Support\Facades\App::getLocale() == 'ar' )
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('/assets/css/news-rtl.css')}}">
@endif

<div id="news">
    <div id="topSection"></div>
    <div id="all" class="hidden"></div>
</div>

<script>
    var fetchNewsUrl = '{{url('api/' . \Illuminate\Support\Facades\App::getLocale() . '/news')}}';
</script>

<script src="{{\Illuminate\Support\Facades\URL::asset('assets/scripts/news.js')}}"></script>

