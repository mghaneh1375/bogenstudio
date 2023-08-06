@extends('panel.layouts.layout')

@section('header')
    @parent
    <style>
        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        td img {
            max-height: 300px;
        }
    </style>
@stop

@section('content')

    <div class="col-md-12">
        <div class="sparkline8-list shadow-reset mg-tb-30">
            <div class="sparkline8-hd">
            </div>

            <div class="sparkline8-graph dashone-comment messages-scrollbar dashtwo-messages">

                <div id="mainContainer" class="page-content">

                    <center>

                        <div id="loader" class="loader"></div>
                        <div id="tableItems" class="hidden">
                            @yield('table')
                        </div>

                    </center>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('panel/js/fetchTableData.js?v=2.1') }}"></script>

    @yield('script')

@stop
