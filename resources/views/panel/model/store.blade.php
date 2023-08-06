@extends('panel.layouts.store')

@section('structure')

    @include('panel.model.structure')

    <script>
        var storeUrl = '{{url('api/admin-panel/model')}}';
        var redirectUrl = '{{route('admin.models')}}';
    </script>

@stop
