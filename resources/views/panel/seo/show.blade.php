@extends('panel.layouts.show')

@section('structure')
    @include('panel.seo.structure')
@stop

@section('script')

    <script>
        var editUrl;
        var redirectUrl;

        @if($mode === 'edit')
            editUrl = '{{url('api/admin-panel/seo/' . $seoId)}}';
        @else
            editUrl = '{{url('api/admin-panel/seo/' . $section . '/' . $seoId)}}';
        @endif

        @if($section === 'general')
            redirectUrl = '{{route('admin.seo')}}';
        @elseif($section === 'news')
            redirectUrl = '{{route('admin.' . $section)}}';
        @else
            redirectUrl = '{{route('admin.' . $section . 's')}}';
        @endif

    </script>

@stop
