@extends('panel.layouts.index')

@section('table')
    <div style="margin: 10px">
        <a href="{{route('admin.model.store')}}" class="btn btn-default">Add Item</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>texture</th>
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
@stop

@section('script')
    <script>

        $(document).ready(function () {
            fetchData('{{url('api/admin-panel/model')}}', 'table-body',
                '{{url('admin-panel/model')}}',
                ['texture', 'priority', 'visibility', 'created_at', 'updated_at']
            );
        });

    </script>

@stop
