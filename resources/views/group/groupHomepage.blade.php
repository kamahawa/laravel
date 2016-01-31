@extends('templates.master')

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('public/css/group.css') }}">
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/group.js') }}"></script>

    <h1>Group Manager</h1>
    <table id="example" class="display" width="100%">
        <thead>
        <tr>
            <th>Group's Name</th>
            <th>Group's Name Kana</th>
            <th>Create Date</th>
            <th>Update Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Group's Name</th>
            <th>Group's Name Kana</th>
            <th>Create Date</th>
            <th>Update Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </tfoot>
        <tbody>
        @foreach($group as $a)
            <tr>
                <td style="text-align: center">{{ $a-> GroupName }}</td>
                <td style="text-align: center">{{ $a-> GroupNameKana }}</td>
                <td style="text-align: center">{{ $a-> CreateDate }}</td>
                <td style="text-align: center">{{ $a-> UpdateDate }}</td>
                <td style="text-align: center"><a href="group/update/{{ $a->GroupID }}">Edit</a></td>
                <td style="text-align: center"><a href="group/delete/{{ $a->GroupID }}">Del</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div id="add">
        <input type="submit" id="button" value="Add" />
        <form action="{{ action('GroupController@insertData') }}" method="post" id="myform" hidden>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label>Group's Name</label>
            <input type="text" name="txtGroupName" value=""/>
            <br/>
            <label>Group's Name Kana</label>
            <input type="text" name="txtGroupNameKana" value=""/>
            <br/>
            <input type="submit" name="ok" value="Add" style="margin-left: 154px"/>
        </form>
    </div>
@stop