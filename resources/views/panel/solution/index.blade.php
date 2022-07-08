@extends('panel.layouts.index')

@section('table')

    <div style="margin: 10px">
        <a href="{{route('admin.solution.store')}}" class="btn btn-default">Add Item</a>
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
@stop

@section('script')

    <script>

        $(document).ready(function () {
            fetchData('{{url('api/admin-panel/solution')}}', 'table-body',
                '{{url('admin-panel/solution')}}',
                '{{url('admin-panel/seo/solution/')}}',
                [
                    'title', 'image', 'default_lang', 'priority',
                    'visibility', 'created_at', 'updated_at'
                ]
            );
        });

    </script>

@stop
