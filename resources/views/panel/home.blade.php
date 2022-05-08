@extends('panel.layouts.layout')

@section('header')
    @parent

@stop

@section('content')

    <div class="col-md-2"></div>

    <div class="col-md-8">
        <div class="sparkline8-list shadow-reset mg-tb-30">
            <div class="sparkline8-hd">
            </div>

            <div class="sparkline8-graph dashone-comment messages-scrollbar dashtwo-messages">

                <div id="mainContainer" class="page-content">
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-2"></div>

@stop
