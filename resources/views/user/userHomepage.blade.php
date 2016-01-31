@extends('templates.master')

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('/public/css/user.css') }}">
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/user.js') }}"></script>

    <h1>User Manager</h1>
    <table id="example" class="display" width="100%">
        <thead>
        <tr>
            <th>UserName</th>
            <th>UserNameKana</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>PCMail</th>
            <th>Responibility</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>UserName</th>
            <th>UserNameKana</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>PCMail</th>
            <th>Responibility</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        </tfoot>
        <tbody>
        @foreach($user as $a)
            <tr>
                <td style="text-align: center">{{ $a-> UserName }}</td>
                <td style="text-align: center">{{ $a-> UserNameKana }}</td>
                <td style="text-align: center">{{ $a-> UserPhoneNumber }}</td>
                <td style="text-align: center">{{ $a-> MobileEmail }}</td>
                <td style="text-align: center">{{ $a-> UserPCMail }}</td>
                @if($a->ManageId =='0')
                    <td style="text-align: center">Web</td>
                @elseif($a->ManageId =='1')
                    <td style="text-align: center">Bus</td>
                @else
                    <td style="text-align: center">Parent</td>
                @endif
                <td style="text-align: center"><a href="user/update/{{ $a->UserID }}">Edit</a></td>
                <td style="text-align: center"><a href="user/delete/{{ $a->UserID }}">Del</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div id="add">
        <input type="submit" id="button" value="Add" />
        <form action="{{ action('UserController@insertData') }}" method="post" id="myform" hidden>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label>User's Name</label>
            <input type="text" name="txtUserName" value=""/>
            <br/>
            <label>User's Name Kana</label>
            <input type="text" name="txtUserNameKana" value=""/>
            <br/>
            <label>User's Password</label>
            <input type="password" name="txtPassword" value=""/>
            <br/>
            <label>User's PhoneNumber</label>
            <input type="text" name="txtUserPhone" value=""/>
            <br/>
            <label>User's Email</label>
            <input type="text" name="txtEmail" value=""/>
            <br/>
            <label>User's PCMail</label>
            <input type="text" name="txtPcmail" value=""/>
            <br/>
            <label>User's Responsibility</label>
            <select name="manageid" style="width: 200px">
                <option value="">Please Select Your Option</option>
                @foreach($manageid as $a)
                    <option name="manageid" value="{{ $a-> manageid }}">{{ $a-> name }}</option>
                @endforeach
            </select>
            <br/>
            <input type="submit" name="ok" value="Add" style="margin-left: 155px"/>
        </form>
    </div>
@stop