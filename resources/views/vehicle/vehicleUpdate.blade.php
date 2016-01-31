@extends('templates.master')

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('public/css/user.css') }}">
    <div id="update">
        <form action="{{ action('VehicleController@updateData') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h4>Update Data</h4>
            <input type="hidden" value="{{ $row -> BusID }}" name="id"/>
            <label>Bus's Name</label>
            <input type="text" name="txtBusName" value="{{ $row->BusName }}"/>
            <br/>
            <label>Driver Name</label>
            <select name="driverid" style="width: 200px">
                <option>Please Select Your Option</option>
                @foreach($driverid as $a)
                    <option name="driverid" value="{{ $a-> UserID }}" <?php if($a->UserID == $row->DriverID){echo "selected";} ?>>{{ $a-> UserName }}</option>
                @endforeach
            </select>
            <br/>
            <label>RouteID</label>
            <select name="routeid" style="width: 200px">
                <option value=" ">Please Select Your Option</option>
                @foreach($routeid as $a)
                    <option name="routeid" value="{{ $a-> RouteID }}"<?php if($a->RouteID == $row->RouteID){echo "selected";} ?>>{{ $a-> RouteName }}</option>
                @endforeach
            </select>
            <br/>
            <label>Status</label>
            <input type="text" name="txtStatus" value="{{ $row->Status }}"/>
            <br/>
            <input type="submit" name="ok" value="Update" style="margin-left: 154px;"/>
        </form>
    </div>
@stop