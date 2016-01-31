@extends('templates.master')

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('public/css/point.css') }}">
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/js/point.js') }}"></script>

    <h1>Point Manager</h1>
    <table id="example" class="display" width="100%">
        <thead>
        <tr>
            <th>Point's Name</th>
            <th>Point's Name Kana</th>
            <th>Create Date</th>
            <th>Update Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Point's Name</th>
            <th>Point's Name Kana</th>
            <th>Create Date</th>
            <th>Update Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </tfoot>
        <tbody>
        @foreach($point as $a)
            <tr>
                <td style="text-align: center">{{ $a-> PointName }}</td>
                <td style="text-align: center">{{ $a-> PointNameKana }}</td>
                <td style="text-align: center">{{ $a-> CreateDate }}</td>
                <td style="text-align: center">{{ $a-> UpdateDate }}</td>
                <td style="text-align: center"><a href="point/update/{{ $a->PointID }}">Edit</a></td>
                <td style="text-align: center"><a href="point/delete/{{ $a->PointID }}">Del</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div id="add">
        <input type="submit" id="button" value="Add" />
        <form action="{{ action('PointController@insertData') }}" method="post" id="myform" hidden>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label>Point's Name</label>
            <input type="text" name="txtPointName" value=""/>
            <br/>
            <label>Point's Name Kana</label>
            <input type="text" name="txtPointNameKana" value=""/>
            <br/>
            <input type="submit" name="ok" value="Add" style="margin-left: 154px"/>
        </form>
    </div>
@stop