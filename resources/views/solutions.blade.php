@extends('layouts.layout')

@section('head')
    @parent

    <title>Bogen Studio</title>

@stop

@section('content')

    <script>
        var locale = '{{\Illuminate\Support\Facades\App::getLocale()}}';
    </script>

    @include('layouts.solutions')


    @include('layouts.footer')
    @include('layouts.footer-mobile')

@stop
