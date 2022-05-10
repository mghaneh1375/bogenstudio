@extends('panel.layouts.layout')

@section('header')
    @parent

@stop

@section('content')

    <div class="col-md-12">
        <div class="sparkline8-list shadow-reset mg-tb-30">
            <div class="sparkline8-hd">
            </div>

            <div class="sparkline8-graph dashone-comment dashtwo-messages">

                <div id="mainContainer" class="page-content">
                    <form id="editForm">
                        @include('panel.product.structure')
                        <div class="big-input">
                            <input style="text-align: center" type="submit" class="btn btn-warning" value="Edit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('panel/js/fetchTableData.js')}}"></script>

    <script>

        var editUrl = '{{url('api/admin-panel/news/' . $newsId)}}';
        var redirectUrl = '{{route('admin.news')}}';

        $(document).ready(function () {

            fetchFormData('{{url('api/admin-panel/news/' . $newsId)}}');

        });

    </script>

    <script src="{{asset('panel/js/create_edit.js')}}"></script>

@stop
