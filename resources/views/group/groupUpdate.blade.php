@extends('templates.master')

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('public/css/user.css') }}">
    <div id="update">
        <form action="{{ action('GroupController@updateData') }}" method="post" id="myform">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h4>Update Data</h4>
            <input type="hidden" value="{{ $row -> GroupID }}" name="id"/>
            <label>Group's Name</label>
            <input type="text" name="txtGroupName" value="{{ $row -> GroupName }}"/>
            <br/>
            <label>Group's Name Kana</label>
            <input type="text" name="txtGroupNameKana" value="{{ $row -> GroupNameKana }}"/>
            <br/>
            <input type="submit" name="ok" value="Update" style="margin-left: 154px"/>
        </form>
    </div>
@stop