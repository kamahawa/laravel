@extends('templates.master')

@section('content')
 	<h1>Index Pages</h1>
 	<table>
 	<thead>
 	    <td>ID</td>
 	    <td>Name</td>
 	</thead>
 	@foreach ($name as $a)
 	    <tr>
 	        <td>
                {{ $a->UserCode }}
            </td>
            <td>
                {{ $a->UserName }}
            </td>
        </tr>
    @endforeach
    </table>
@stop