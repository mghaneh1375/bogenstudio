@extends('panel.layouts.layout')

@section('header')
    @parent

    <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/decoupled-document/ckeditor.js"></script>
    <script src="{{asset('panel/js/ckeditor.js')}}"></script>

    <script>
        var UploadURL = '{{route('uploadTest')}}';
    </script>

@stop

@section('content')

    <div class="col-md-12">
        <div class="sparkline8-list shadow-reset mg-tb-30">
            <div class="sparkline8-hd">
            </div>

            <div class="sparkline8-graph dashone-comment dashtwo-messages">

                <div id="mainContainer" class="page-content">
                    <form id="form">
                        @yield('structure')
                        <div class="big-input">
                            <input style="text-align: center" type="submit" class="btn btn-warning" value="Store">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            initCK();
        });
    </script>

    <script src="{{asset('panel/js/create_edit.js')}}"></script>

@stop
