<link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('assets/css/videos.css?v=2.5') }}">

@if (\Illuminate\Support\Facades\App::getLocale() == 'fa' || \Illuminate\Support\Facades\App::getLocale() == 'ar')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('/assets/css/videos-rtl.css?v=2.1') }}">
@endif

<link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('assets/css/video/video-mobile.css?v=2.1') }}">

@if (\Illuminate\Support\Facades\App::getLocale() == 'fa' || \Illuminate\Support\Facades\App::getLocale() == 'ar')
    <link rel="stylesheet"
        href="{{ \Illuminate\Support\Facades\URL::asset('/assets/css/video/video-mobile-rtl.css?v=2.1') }}">
@endif

<div id="videos">
    <img class="bogen-loader" id="videoLoader" src="{{ asset('assets/images/loading.gif') }}">
</div>

<script>
    var playPic = '{{ \Illuminate\Support\Facades\URL::asset('assets/images/play.svg') }}';
    var fetchVideosUrl = '{{ url('api/' . \Illuminate\Support\Facades\App::getLocale() . '/videos') }}';
    var videoRedirectUrl = '{{ url(\Illuminate\Support\Facades\App::getLocale() . '/video') }}';
</script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('assets/scripts/videos.js?v=2.1') }}"></script>
