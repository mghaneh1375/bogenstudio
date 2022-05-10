@extends('panel.layouts.show')

@section('structure')

    <script async src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"></script>
    <script type="importmap">
      {
        "imports": {
          "three": "https://unpkg.com/three@0.139.2/build/three.module.js"
        }
      }
    </script>

    @include('panel.model.structure')

@stop

@section('script')

    <script>

        var editUrl = '{{url('api/admin-panel/model/' . $modelId)}}';
        var redirectUrl = '{{route('admin.models')}}';
        var modelPath = null, texturePath;

        $(document).ready(function () {
            fetchFormData('{{url('api/admin-panel/model/' . $modelId)}}');
        });


    </script>

    <script type="module" src="{{asset('panel/js/fbxloaderOneModel.js')}}"></script>
@stop
