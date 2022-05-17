@extends('panel.layouts.store')

@section('structure')

    @include('panel.solution.structure')

    <script>

        var storeUrl = '{{url('api/admin-panel/solution')}}';
        var redirectUrl = '{{route('admin.solutions')}}';

    </script>

@stop
