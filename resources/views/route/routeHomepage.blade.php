@extends('templates.master')

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('public/css/route.css') }}">
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/route.js') }}"></script>

    <h1>Route Manager</h1>
    <table id="example" class="display" width="100%">
        <thead>
        <tr>
            <th>Route's Name</th>
            <th>Route's Name Kana</th>
            <th>Create Date</th>
            <th>Update Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Route's Name</th>
            <th>Route's Name Kana</th>
            <th>Create Date</th>
            <th>Update Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </tfoot>
        <tbody>
        @foreach($route as $a)
            <tr>
                <td style="text-align: center">{{ $a-> RouteName }}</td>
                <td style="text-align: center">{{ $a-> RouteNameKana }}</td>
                <td style="text-align: center">{{ $a-> CreateDate }}</td>
                <td style="text-align: center">{{ $a-> UpdateDate }}</td>
                <td style="text-align: center"><a href="route/update/{{ $a->RouteID }}">Edit</a></td>
                <td style="text-align: center"><a href="route/delete/{{ $a->RouteID }}">Del</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div id="add">
        <input type="submit" id="button" value="Add" />
        <form action="{{ action('RouteController@insertData') }}" method="post" id="myform" hidden>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label>Route's Name</label>
            <input type="text" name="txtRouteName" value=""/>
            <br/>
            <label>Route's Name Kana</label>
            <input type="text" name="txtRouteNameKana" value=""/>
            <br/>
            <input type="submit" name="ok" value="Add" style="margin-left: 154px"/>
        </form>
    </div>
@stop