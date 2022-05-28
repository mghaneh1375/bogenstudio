@extends('layouts.showItem')

@section('fetch')
    <script>
        var getProductUrl = '{{url('api/' . \Illuminate\Support\Facades\App::getLocale() . '/solution/show/' . $solutionId)}}';
    </script>
@stop
