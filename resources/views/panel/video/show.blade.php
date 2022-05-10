@extends('panel.layouts.show')

@section('structure')

    @include('panel.video.structure')

@stop

@section('script')

    <script>

        var editUrl = '{{url('api/admin-panel/video/' . $videoId)}}';
        var redirectUrl = '{{route('admin.videos')}}';

        $(document).ready(function () {

            fetchFormData('{{url('api/admin-panel/video/' . $videoId)}}');

        });

    </script>

@stop
