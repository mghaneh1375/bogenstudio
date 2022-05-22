@extends('layouts.showItem')

@section('fetch')
    <script>
        var getProductUrl = '{{url('api/' . \Illuminate\Support\Facades\App::getLocale() . '/video/show/' . $videoId)}}';
    </script>
@stop
