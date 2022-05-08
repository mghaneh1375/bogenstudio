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
                    <form id="form">
                        @include('panel.product.structure')
                        <div class="big-input">
                            <input style="text-align: center" type="submit" class="btn btn-warning" value="Store">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var storeUrl = '{{url('api/admin-panel/product')}}';
        var redirectUrl = '{{route('admin.products')}}';
    </script>
    <script src="{{asset('panel/js/product.js')}}"></script>

@stop