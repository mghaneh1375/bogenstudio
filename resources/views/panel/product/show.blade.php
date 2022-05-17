@extends('panel.layouts.show')

@section('structure')
    @include('panel.product.structure')
@stop

@section('script')
    <script>
        var editUrl = '{{url('api/admin-panel/product/' . $productId)}}';
        var redirectUrl = '{{route('admin.products')}}';
    </script>
@stop

