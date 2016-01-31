@extends('templates.master')

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('public/css/location.css') }}">
    <script type="text/javascript" src="{{ URL::asset('public/js/location.js') }}"></script>
    <h1>Location Manager</h1>
    <div style="float: left;margin-left: 40%">
        <form action="{{ action('LocationController@showStudentByRoute') }}" method="post" id="route_map">
            <h4>Select Route</h4>
            <select id="mySelect" name="selectrouteid" onchange="showRoute()">
                <option>Please Select Route</option>
                @foreach($route as $a)
                    <option class="opt" name="" value="{{ $a->RouteID }}">{{ $a->RouteName }}</option>
                @endforeach
            </select>
        </form>
    </div>
        <br/>
    <div class="table">
        <form method="post" action="{{ action('LocationController@viewMap') }}" onsubmit="return checkLocation()">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div id="myform" class="scroll" style="float: left">
                <table style="float: left;">
                    <thead>
                    <tr>
                        <td>StudentName</td>
                        <td>Check</td>
                        <td>Latitude</td>
                        <td>Longitude</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($student as $a)
                        <tr>
                            <td>{{ $a->StudentName }}</td>
                            <td><input class='checkbox_route_left' type="checkbox" name="{{ $a->StudentID }}" value="{{ $a->StudentID }}"/></td>
                            <td>{{ $a->Latitude }}</td>
                            <td>{{ $a->Longitude }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="scroll" style="float: right;margin-right: 32%">
                <table>
                    <thead>
                    <tr>
                        <td>StudentName</td>
                        <td>Check</td>
                        <td>Latitude</td>
                        <td>Longitude</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 0; ?>
                    @foreach($student as $a)
                        <?php
                            $count = $count+1;
                        ?>
                        <tr style='display:none'>
                            <td>{{ $a->StudentName }}</td>
                            <td><input class='checkbox_route_right' type="checkbox" name="{{ $a->StudentID.$count }}" value="{{ $a->StudentID.$count }}"/></td>
                            <td>{{ $a->Latitude }}</td>
                            <td>{{ $a->Longitude }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div style="margin-right: 48%">
                <div style="margin-left: 63%">
                    <input type="image" src="public/images/get1.png" onclick="return false" id="buttonget_get" name="get" value="Get" class="buttonget"/>
                    <br/>
                    <input type="image" src="public/images/getall1.png" onclick="return false" id="buttonget_getall" name="getall" value="GetAll" class="buttongetall"/>
                    </br>
                    <input type="image" src="public/images/del1.png" onclick="return false" id="buttonget_delete" name="delete" value="Delete" class="buttondel"/>
                    </br>
                    <input type="image" src="public/images/delall1.png" onclick="return false" id="buttonget_deleteall" name="deleteall" value="DeleteAll" class="buttondelall"/>
                    <br/>
                </div>
            </div>
            <input type="hidden" id="demo" name="getlocation" value=""/>
            <div>
                <input type="submit" name="viewmap" value="View Map" style="margin-left: 27%"/>
            </div>
        </form>
    </div>

@stop