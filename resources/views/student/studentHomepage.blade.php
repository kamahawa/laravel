@extends('templates.master')

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('public/css/student.css') }}">
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/student.js') }}"></script>

    <h1>Student Manager</h1>
    <table id="example" class="display" width="100%">
        <thead>
        <tr>
            <th>Student's Name</th>
            <th>Student's Name Kana</th>
            <th>Student's Group</th>
            <th>Student's Route</th>
            <th>Student's Address</th>
            <th>EmailGuard</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Student's Name</th>
            <th>Student's Name Kana</th>
            <th>Student's Group</th>
            <th>Student's Route</th>
            <th>Student's Address</th>
            <th>EmailGuard</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        </tfoot>
        <tbody>
        @foreach($student as $a)
            <tr>
                <td style="text-align: center">{{ $a-> StudentName }}</td>
                <td style="text-align: center">{{ $a-> StudentNameKana }}</td>
                <td style="text-align: center">{{ $a-> GroupID }}</td>
                <td style="text-align: center">{{ $a-> RouteID }}</td>
                <td style="text-align: center">{{ $a-> Address }}</td>
                <td style="text-align: center">{{ $a-> EmailGuard }}</td>
                <td style="text-align: center">{{ $a-> Latitude }}</td>
                <td style="text-align: center">{{ $a-> Longitude }}</td>
                <td style="text-align: center"><a href="student/update/{{ $a->StudentID }}">Edit</a></td>
                <td style="text-align: center"><a href="student/delete/{{ $a->StudentID }}">Del</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div id="add">
        <input type="submit" id="button" value="Add" />
        <form action="{{ action('StudentController@insertData') }}" method="post" id="myform" hidden>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label>Student's Name</label>
            <input type="text" name="txtStudentName" value=""/>
            <br/>
            <label>Student's Name Kana</label>
            <input type="text" name="txtStudentNameKana" value=""/>
            <br/>
            <label>Driver Name</label>
            <select name="groupid" style="width: 200px">
                <option value="">Please Select Your Option</option>
                @foreach($group as $a)
                    <option name="groupid" value="{{ $a-> GroupID }}">{{ $a-> GroupName }}</option>
                @endforeach
            </select>
            <br/>
            <label>Route Name</label>
            <select name="routeid" style="width: 200px">
                <option value="">Please Select Your Option</option>
                @foreach($routeid as $a)
                    <option name="routeid" value="{{ $a-> RouteID }}">{{ $a-> RouteName }}</option>
                @endforeach
            </select>
            <br/>
            <label>Student's Address</label>
            <input type="text" name="txtAddress" value=""/>
            <br/>
            <label>User's EmailGuard</label>
            <input type="text" name="txtEmailGuard" value=""/>
            <br/>
            <label>User's Password</label>
            <input type="password" name="txtPassword" value=""/>
            <br/>
            <label>User's Latitude</label>
            <input type="text" name="txtLatitude" value=""/>
            <br/>
            <label>User's Longitude</label>
            <input type="text" name="txtLongitude" value=""/>
            <br/>
            <input type="submit" name="ok" value="Add" style="margin-left: 154px"/>
        </form>
    </div>
@stop