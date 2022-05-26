@extends('panel.layouts.layout')

@section('header')
    @parent

@stop

@section('content')

    <div class="col-md-12">
        <div class="sparkline8-list shadow-reset mg-tb-30">
            <div class="sparkline8-hd">
            </div>

            <div class="sparkline8-graph dashone-comment messages-scrollbar dashtwo-messages">

                <div id="mainContainer" class="page-content">

                    <center>

                        @yield('table')

                    </center>

                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('panel/js/fetchTableData.js?v=2.1')}}"></script>

    @yield('script')

@stop
