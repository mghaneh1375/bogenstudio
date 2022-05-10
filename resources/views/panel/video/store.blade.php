@extends('panel.layouts.store')

@section('structure')

    @include('panel.video.structure')

    <script>
        var storeUrl = '{{url('api/admin-panel/video')}}';
        var redirectUrl = '{{route('admin.videos')}}';
    </script>

@stop
