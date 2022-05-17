<link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('assets/css/videos.css?v=1.2')}}">

@if(\Illuminate\Support\Facades\App::getLocale() == 'fa' ||
        \Illuminate\Support\Facades\App::getLocale() == 'ar' )
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('/assets/css/videos-rtl.css')}}">
@endif

<link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('assets/css/video/video-mobile.css?v=1.2')}}">

<div id="videos"></div>

<script>
    var playPic = '{{\Illuminate\Support\Facades\URL::asset('assets/images/play.svg')}}';
    var fetchVideosUrl = '{{url('api/' . \Illuminate\Support\Facades\App::getLocale() . '/videos')}}';
</script>
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/scripts/video.js')}}"></script>
