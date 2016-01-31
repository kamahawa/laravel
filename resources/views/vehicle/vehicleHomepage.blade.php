@extends('templates.master')

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('public/css/vehicle.css') }}">
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/vehicle.js') }}"></script>

    <h1>Vehicle Manager</h1>
    <table id="example" class="display" width="100%">
        <thead>
        <tr>
            <th>BusName</th>
            <th>CreateDate</th>
            <th>UpdateDate</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>BusName</th>
            <th>CreateDate</th>
            <th>UpdateDate</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        </tfoot>
        <tbody>
            @foreach($vehicle as $a)
                <tr>
                    <td style="text-align: center">{{ $a-> BusName }}</td>
                    <td style="text-align: center">{{ $a-> CreateDate }}</td>
                    <td style="text-align: center">{{ $a-> UpdateDate }}</td>
                    <td style="text-align: center">{{ $a-> Status }}</td>
                    <td style="text-align: center"><a href="vehicle/update/{{ $a->BusID }}">Edit</a></td>
                    <td style="text-align: center"><a href="vehicle/delete/{{ $a->BusID }}">Del</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div id="add">
        <input type="submit" id="button" value="Add" />
        <form action="{{ action('VehicleController@insertData') }}" method="post" id="myform" hidden>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label>Bus's Name</label>
            <input type="text" name="txtBusName" value=""/>
            <br/>
            <label>Driver Name</label>
            <select name="driverid" style="width: 200px">
                <option value="">Please Select Your Option</option>
                @foreach($driverid as $a)
                    <option name="driverid" value="{{ $a-> UserID }}">{{ $a-> UserName }}</option>
                @endforeach
            </select>
            <br/>
            <label>RouteID</label>
            <select name="routeid" style="width: 200px">
                <option value="">Please Select Your Option</option>
                @foreach($routeid as $a)
                    <option name="routeid" value="{{ $a-> RouteID }}">{{ $a-> RouteName }}</option>
                @endforeach
            </select>
            <br/>
            <label>Status</label>
            <input type="text" name="txtStatus" value=""/>
            <br/>
            <input type="submit" name="ok" value="Add" style="margin-left: 105px"/>
        </form>
    </div>
@stop