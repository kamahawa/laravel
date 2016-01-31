@extends('templates.master')

@section('content')
    <link rel="stylesheet" href="{{ URL::asset('public/css/pickup.css') }}">
    <h2>Absent And Pick Up List</h2>
    <form method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" id="pickup" name="pickup" value="Pick Up" />
        <table id="example" class="display">
            <thead>
                <th>Student's Name</th>
                <th>Pick Up</th>
                <th>Take Home</th>
            </thead>
            <tbody>
            <?php $count=0; ?>
                @foreach($student as $a)
                    <?php
                        $count=$count+1;
                        $pickup = new \App\Models\ActConfirmpickup();
                        $takehome = new \App\Models\ActConfirmpickup();
                    ?>
                    <tr>
                        <td>{{ $a->StudentName }}</td>
                        <td><input type="checkbox" name="{{ $a->StudentID }}" value="{{ $a->StudentID }}" <?php if($pickup->getPickup($a->StudentID)!=1){echo "checked";} ?>/></td>
                        <td><input type="checkbox" name="{{ $a->StudentID.$count }}" value="{{ $a->StudentID.$count }}" <?php if($takehome->getTakeHome($a->StudentID)!=1){echo "checked";} ?>/></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
    <div style="margin-left: 36.5%">
        <a href="pickup/ViewPickUp">View PickUp</a>
        <a href="pickup/ViewTakeHome" style="margin-left: 50px">View TakeHome</a>
    </div>
@stop