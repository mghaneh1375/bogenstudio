<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @section('head')
        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset("assets/css/common.css")}}"/>
        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset("assets/css/common/mobile.css")}}"/>
        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset("assets/css/font.css")}}"/>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

    @show



</head>


<body>

@include('layouts.top-nav')

<div class="content">
    @yield('content')
</div>

</body>
