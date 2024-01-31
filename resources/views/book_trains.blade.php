@include('layouts.header')
<?php
use App\Models\AdminDetails;
?>
<div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">

            <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Book Trains</h4>
                                @if(Session::has('success')) <div class="alert alert-success mt-2 mb-2">{{ Session::get('success') }}</li></div>@endif
                                @if(Session::has('fail')) <div class="alert alert-danger mt-2 mb-2">{{ Session::get('fail') }}</li></div>@endif
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="datatable_1">
                                        <thead class="thead-light">
                                          <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Route</th>
                                            <th>Departure</th>
                                            <th>Arrival</th>
                                            <th>No of Passengers</th>
                                            <th>Fee (For a 1KM)</th>

                                            <th>Actions</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($trains as $train) {

                                        ?>
                                            <tr>
                                                <td>#{{$train->id}}</td>
                                                <td>{{$train->name}}</td>
                                                <td>{{$train->route}}</td>
                                                <td>{{$train->departure}}</td>
                                                <td>{{$train->arrival}}</td>
                                                <td>{{$train->no_of_passengers}}</td>
                                                <td>රු{{number_format($train->fee)}}</td>

                                                <td >
                                                <a href="{{ url('book-train/'.$train->id.'') }}"><button type="button" class="btn btn-success btn-xs">Book Train</button></a>
                                               </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
    </div><!-- container -->
    @include('layouts.footer')
