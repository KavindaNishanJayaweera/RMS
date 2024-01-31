@include('layouts.header')
<?php
use App\Models\Trains;
use App\Models\TrainStops;
?>
<!--<script src='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css' rel='stylesheet' />-->
 <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
   <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
<div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">

            <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">View Booking Details</h4>
                                @if(Session::has('success')) <div class="alert alert-success mt-2 mb-2">{{ Session::get('success') }}</li></div>@endif
                                @if(Session::has('fail')) <div class="alert alert-danger mt-2 mb-2">{{ Session::get('fail') }}</li></div>@endif
                            </div><!--end card-header-->
                            <div class="card-body">

                            <div class="row mt-4">
                                <div class="col-md-4">
                                <div class="row">
                                <div class="col-md-6">
                                    <p style="font-weight:bold">Train :</p>
                                </div>
                                <div class="col-md-6">
                                    <p >{{Trains::where('id', $booking->train_id)->value('name')}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p style="font-weight:bold">From :</p>
                                </div>
                                <div class="col-md-6">
                                    <p >{{TrainStops::where('id', $booking->from_stop)->value('stop_name')}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p style="font-weight:bold">To :</p>
                                </div>
                                <div class="col-md-6">
                                    <p >{{TrainStops::where('id', $booking->to_stop)->value('stop_name')}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p style="font-weight:bold">Date :</p>
                                </div>
                                <div class="col-md-6">
                                    <p >{{$booking->date}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p style="font-weight:bold">Tickets :</p>
                                </div>
                                <div class="col-md-6">
                                    <p >{{$booking->tickets}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p style="font-weight:bold">Total :</p>
                                </div>
                                <div class="col-md-6">
                                    <p >රු{{number_format($booking->booking_total)}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p style="font-weight:bold">Status :</p>
                                </div>
                                <div class="col-md-6">
                                    <p >{{$booking->status}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p style="font-weight:bold">Payment ID :</p>
                                </div>
                                <div class="col-md-6">
                                    <p >{{$booking->payment_id}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p style="font-weight:bold">Payment Method :</p>
                                </div>
                                <div class="col-md-6">
                                    <p >{{$booking->method}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p style="font-weight:bold">First Name :</p>
                                </div>
                                <div class="col-md-6">
                                    <p >{{$booking->first_name}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p style="font-weight:bold">Last Name :</p>
                                </div>
                                <div class="col-md-6">
                                    <p >{{$booking->last_name}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p style="font-weight:bold">Email :</p>
                                </div>
                                <div class="col-md-6">
                                    <p >{{$booking->email}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p style="font-weight:bold">Phone Number :</p>
                                </div>
                                <div class="col-md-6">
                                    <p >{{$booking->phone_number}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p style="font-weight:bold">Country :</p>
                                </div>
                                <div class="col-md-6">
                                    <p >{{$booking->country}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p style="font-weight:bold">Address :</p>
                                </div>
                                <div class="col-md-6">
                                    <p >{{$booking->address}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p style="font-weight:bold">Postal Code :</p>
                                </div>
                                <div class="col-md-6">
                                    <p >{{$booking->postal_code}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p style="font-weight:bold">City :</p>
                                </div>
                                <div class="col-md-6">
                                    <p >{{$booking->city}}</p>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-8">
                                 <p style="font-weight:bold">Train Location</p>
<div id="map" style='width: 100%; height: 600px;'></div>


<!--<div id='map' style='width: 400px; height: 300px;'></div>-->
<!--<script>-->
<!--	mapboxgl.accessToken = 'pk.eyJ1IjoicGFzb2pvdzU2MSIsImEiOiJjbGtoNTR2aGUwNjZ4M2ZvYWlqeDd5azlyIn0.i9BKdDYEHLUECOvMdBP5Mg';-->
<!--const map = new mapboxgl.Map({-->
<!--container: 'map',-->

<!--style: 'mapbox://styles/mapbox/streets-v12',-->
<!--center: [{{Trains::where('id', $booking->train_id)->value('latitude')}}, {{Trains::where('id', $booking->train_id)->value('longitude')}}],-->
<!--zoom: 8-->
<!--});-->
 

<!--const marker1 = new mapboxgl.Marker()-->
<!--.setLngLat([{{Trains::where('id', $booking->train_id)->value('latitude')}}, {{Trains::where('id', $booking->train_id)->value('longitude')}}])-->
<!--.addTo(map);-->
 

<!--</script>-->
                            </div>
                            </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
    </div><!-- container -->
    @include('layouts.footer')
    

<script>
   
/**
 * Adds markers to the map highlighting the locations of the captials of
 * France, Italy, Germany, Spain and the United Kingdom.
 *
 * @param  {H.Map} map      A HERE Map instance within the application
 */
function addMarkersToMap(map) {
    var parisMarker = new H.map.Marker({lat:{{Trains::where('id', $booking->train_id)->value('latitude')}}, lng:{{Trains::where('id', $booking->train_id)->value('longitude')}}});
    map.addObject(parisMarker);
}

/**
 * Boilerplate map initialization code starts below:
 */

//Step 1: initialize communication with the platform
// In your own code, replace variable window.apikey with your own apikey
var platform = new H.service.Platform({
  apikey: "ggrfbYskKxeT-H1jl073FIloAi5X3GtsN9xskzj2DXE"
});
var defaultLayers = platform.createDefaultLayers();

//Step 2: initialize a map - this map is centered over Europe
var map = new H.Map(document.getElementById('map'),
  defaultLayers.vector.normal.map,{
  center: {lat:7.8774222, lng:80.7003428},
  zoom: 7,
  pixelRatio: window.devicePixelRatio || 1
});
// add a resize listener to make sure that the map occupies the whole container
window.addEventListener('resize', () => map.getViewPort().resize());

//Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

// Create the default UI components
var ui = H.ui.UI.createDefault(map, defaultLayers);

// Now use the map as required...
window.onload = function () {
  addMarkersToMap(map);
}
</script>