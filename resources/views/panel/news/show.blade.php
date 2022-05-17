@extends('panel.layouts.show')

@section('structure')
    @include('panel.product.structure')
@stop

@section('script')
    <script>
        var editUrl = '{{url('api/admin-panel/news/' . $newsId)}}';
        var redirectUrl = '{{route('admin.news')}}';
    </script>
@stop
