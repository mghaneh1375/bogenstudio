@extends('layouts.layout')

@section('head')
    @parent

    <title>Bogen Studio</title>

@stop

@section('content')

    <script>
        var locale = '{{\Illuminate\Support\Facades\App::getLocale()}}';
        var fetchLimit = -1;
        var newsFetchLimit = -1;
    </script>

    @include('layouts.news')

    @include('layouts.videos')


    @include('layouts.footer')

@stop
