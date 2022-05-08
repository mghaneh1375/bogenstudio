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

                        <div style="margin: 10px">
                            <a href="{{route('admin.product.store')}}" class="btn btn-default">Add Item</a>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <th>title</th>
                                    <th>image</th>
                                    <th>default language</th>
                                    <td>priority</td>
                                    <td>visibility</td>
                                    <td>created at</td>
                                    <td>updated at</td>
                                    <td>op</td>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                            </tbody>
                        </table>

                    </center>

                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('panel/js/fetchTableData.js')}}"></script>

    <script>

        $(document).ready(function () {
            fetchData('{{url('api/admin-panel/product')}}', 'table-body',
                '{{url('admin-panel/product')}}', '{{url('api/product')}}');
        });

    </script>

@stop
