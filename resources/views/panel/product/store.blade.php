@extends('panel.layouts.store')

@section('structure')

    @include('panel.product.structure')

    <script>

        var storeUrl = '{{url('api/admin-panel/product')}}';
        var redirectUrl = '{{route('admin.products')}}';

    </script>

@stop
