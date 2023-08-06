@extends('panel.layouts.store')

@section('structure')

    @include('panel.product.structure')

    <script>

        var storeUrl = '{{url('api/admin-panel/news')}}';
        var redirectUrl = '{{route('admin.news')}}';

    </script>

@stop
