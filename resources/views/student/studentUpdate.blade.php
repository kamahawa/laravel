@extends('templates.master')

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('public/css/user.css') }}">
    <div id="update">
        <form action="{{ action('StudentController@updateData') }}" method="post" id="myform">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h4>Update Data</h4>
            <input type="hidden" value="{{ $student -> StudentID }}" name="id"/>
            <label>Student's Name</label>
            <input type="text" name="txtStudentName" value="{{ $student->StudentName }}"/>
            <br/>
            <label>Student's Name Kana</label>
            <input type="text" name="txtStudentNameKana" value="{{ $student->StudentNameKana }}"/>
            <br/>
            <label>Driver Name</label>
            <select name="groupid" style="width: 200px">
                <option>Please Select Your Option</option>
                @foreach($group as $a)
                    <option name="groupid" value="{{ $a-> GroupID }}" <?php if($a->GroupID == $student->GroupID){echo 'selected';} ?>>{{ $a-> GroupName }}</option>
                @endforeach
            </select>
            <br/>
            <label>Route Name</label>
            <select name="routeid" style="width: 200px">
                <option>Please Select Your Option</option>
                @foreach($routeid as $a)
                    <option name="routeid" value="{{ $a-> RouteID }}"<?php if($a->RouteID == $student->RouteID){echo 'selected';} ?>>{{ $a-> RouteName }}</option>
                @endforeach
            </select>
            <br/>
            <label>Student's Address</label>
            <input type="text" name="txtAddress" value="{{ $student->Address }}"/>
            <br/>
            <label>User's EmailGuard</label>
            <input type="text" name="txtEmailGuard" value="{{ $student->EmailGuard }}"/>
            <br/>
            <label>User's Password</label>
            <input type="password" name="txtPassword" value="{{ $student->PassWord }}"/>
            <br/>
            <label>User's Latitude</label>
            <input type="text" name="txtLatitude" value="{{ $student->Latitude }}"/>
            <br/>
            <label>User's Longitude</label>
            <input type="text" name="txtLongitude" value="{{ $student->Longitude }}"/>
            <br/>
            <input type="submit" name="ok" value="Update" style="margin-left: 154px"/>
        </form>
    </div>
@stop