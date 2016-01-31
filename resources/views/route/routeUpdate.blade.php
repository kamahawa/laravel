@extends('templates.master')

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('public/css/route.css') }}">
    <div id="update">
        <form action="{{ action('RouteController@updateData') }}" method="post" id="myform">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h4>Update Data</h4>
            <input type="hidden" value="{{ $row -> RouteID }}" name="id"/>
            <label>Group's Name</label>
            <input type="text" name="txtRouteName" value="{{ $row -> RouteName }}"/>
            <br/>
            <label>Group's Name Kana</label>
            <input type="text" name="txtRouteNameKana" value="{{ $row -> RouteNameKana }}"/>
            <br/>
            <input type="submit" name="ok" value="Update" style="margin-left: 154px"/>
        </form>
    </div>
@stop