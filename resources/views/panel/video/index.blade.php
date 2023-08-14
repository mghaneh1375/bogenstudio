@extends('panel.layouts.index')

@section('table')
    <div style="margin: 10px">
        <a href="{{route('admin.video.store')}}" class="btn btn-default">Add Item</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>title</th>
                <th>preview</th>
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
            fetchData('{{url('api/admin-panel/video')}}', 'table-body',
                '{{url('admin-panel/video')}}',
                '{{url('admin-panel/seo/video')}}',
                ['title', 'preview', 'priority', 'visibility', 'created_at', 'updated_at']
            );
        });

    </script>

@stop
