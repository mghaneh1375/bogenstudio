@extends('panel.layouts.index')

@section('table')

    <table>
        <thead>
            <tr>
                <th>name</th>
                <th>mail</th>
                <th>phone</th>
                <td>created at</td>
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
            fetchData('{{url('api/admin-panel/contact')}}', 'table-body',
                null,
                [
                    'name', 'mail', 'phone', 'created_at'
                ]
            );
        });

    </script>

@stop
