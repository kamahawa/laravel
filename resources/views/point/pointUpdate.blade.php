@extends('templates.master')

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('public/css/user.css') }}">
    <div id="update">
        <form action="{{ action('PointController@updateData') }}" method="post" id="myform">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h4>Update Data</h4>
            <input type="hidden" value="{{ $row -> PointID }}" name="id"/>
            <label>Group's Name</label>
            <input type="text" name="txtPointName" value="{{ $row -> PointName }}"/>
            <br/>
            <label>Group's Name Kana</label>
            <input type="text" name="txtPointNameKana" value="{{ $row -> PointNameKana }}"/>
            <br/>
            <input type="submit" name="ok" value="Update" style="margin-left: 154px"/>
        </form>
    </div>
@stop