@extends('panel.layouts.layout')

@section('header')
    @parent
    <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/decoupled-document/ckeditor.js"></script>
    <script src="{{asset('panel/js/ckeditor.js?v=2.1')}}"></script>

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
                    <form id="editForm">
                        @yield('structure')
                        <div class="big-input">
                            <input style="text-align: center" type="submit" class="btn btn-warning" value="Edit">
                        </div>
                        <p id="apiErr" style="color: red; font-size: 16px; font-weight: bold"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('panel/js/fetchTableData.js?v=2.1')}}"></script>
    @yield('script')

    <script>
        var url = '{{URL::current()}}';
        if(url.indexOf('video/add') === -1) {
            $(document).ready(function () {
                fetchFormData(editUrl, initCK);
            });
        }
    </script>

    <script src="{{asset('panel/js/create_edit.js?v=2.1')}}"></script>

@stop
