@extends('templates.master')

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('public/css/user.css') }}">
    <script type="text/javascript" src="{{ URL::asset('public/js/user.js') }}"></script>
    <div id="update">
        <form action="{{ action('UserController@updateData') }}" method="post" id="myform">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h4>Update Data</h4>
            <input type="hidden" value="{{ $user->UserID }}" name="id"/>
            <label>User's Name</label>
            <input type="text" name="txtUserName" value="{{ $user->UserName }}"/>
            <br/>
            <label>User's Name Kana</label>
            <input type="text" name="txtUserNameKana" value="{{ $user->UserNameKana }}"/>
            <br/>
            <label>User's Password</label>
            <input type="password" name="txtPassword" value="{{ $user->UserEncryptedPassword }}"/>
            <br/>
            <label>User's PhoneNumber</label>
            <input type="text" name="txtUserPhone" value="{{ $user->UserPhoneNumber }}"/>
            <br/>
            <label>User's Email</label>
            <input type="text" name="txtEmail" value="{{ $user->MobileEmail }}"/>
            <br/>
            <label>User's PCMail</label>
            <input type="text" name="txtPcmail" value="{{ $user->UserPCMail }}"/>
            <br/>
            <label>User's Responsibility</label>
            <select name="manageid" style="width: 200px">
                <option>Please Select Your Option</option>
                @foreach($manageid as $a)
                    <option name="manageid" value="{{ $a-> manageid }}"<?php if($a->manageid == $user->ManageId){echo "selected";} ?>>{{ $a-> name }}</option>
                @endforeach
            </select>
            <br/>
            <input type="submit" name="ok" value="Update" style="margin-left: 154px"/>
        </form>
    </div>
@stop