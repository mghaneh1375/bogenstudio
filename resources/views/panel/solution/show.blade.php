@extends('panel.layouts.show')

@section('structure')
    @include('panel.solution.structure')
@stop

@section('script')

    <script>
        var editUrl = '{{url('api/admin-panel/solution/' . $solutionId)}}';
        var redirectUrl = '{{route('admin.solutions')}}';
    </script>

@stop
