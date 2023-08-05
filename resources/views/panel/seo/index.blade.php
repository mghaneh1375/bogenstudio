@extends('panel.layouts.index')

@section('table')
    <div style="margin: 10px">
    </div>

    <table>
        <thead>
            <tr>
                <th>page</th>
                <th>article:tag</th>
                <td>keywords</td>
                <td>description</td>
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
            fetchData('{{url('api/admin-panel/seo')}}', 'table-body',
                undefined,
                '{{url('admin-panel/seo/general')}}',
                ['page', 'article_tag', 'keyword', 'description', 'updated_at'],
                false
            );
        });

    </script>

@stop
