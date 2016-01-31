@extends('templates.master')

@section('content')
    <title>Direction Location</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtonHW0SfAh_0F3IOGOxzJWqKN3J2stZs&signed_in=true&callback=initMap"
            async defer></script>
    <style>
        #map {
            height: 100%;
            float: right;
            width: 100%;
        }
        #map {
            height: 100%;
        }
    </style>
    <div id="map"></div>
    <div id="right-panel">
        <div>
            <br>
            <select multiple id="waypoints" hidden="">
                <?php
                    $i = 1;
                    $lat = "";
                    $long = "";
                ?>
                @foreach($viewmap as $a)
                    @if($i == 2)
                        <?php
                            $long = $a;
                            $i=1
                        ?>
                        <option selected value="{{ $lat }},{{ $long }}">aaaa</option>
                    @else
                        <?php
                            $lat = $a;
                            $i++;
                        ?>
                    @endif
                @endforeach
            </select>
            <br>
            <br>
            <input type="submit" id="submit" value="Get Direction" hidden="">
            <form method="post" hidden="">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" value="back" name="back"/>
            </form>
        </div>
    </div>
    <script>

        function initMap() {
            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer;
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 11,
                center: {lat: 10.85251616, lng: 106.6556262}
            });
            directionsDisplay.setMap(map);
            calculateAndDisplayRoute(directionsService, directionsDisplay);
        }

        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
            var waypts = [];
            var checkboxArray = document.getElementById('waypoints');
            for (var i = 0; i < checkboxArray.length; i++) {
                if (checkboxArray.options[i].selected) {
                    waypts.push({
                        location: checkboxArray[i].value,
                        stopover: true
                    });
                }
            }

            directionsService.route({
                origin: document.getElementById('waypoints').value,
                destination: document.getElementById('waypoints').value,
                waypoints: waypts,
                optimizeWaypoints: true,
                travelMode: google.maps.TravelMode.DRIVING
            }, function(response, status) {
                directionsDisplay.setDirections(response);

            });
        }
    </script>
@stop