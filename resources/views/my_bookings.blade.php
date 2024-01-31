@include('layouts.header')
<?php
use App\Models\Trains;
use App\Models\TrainStops;
?>
<div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">

            <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">My Bookings</h4>
                                @if(Session::has('success')) <div class="alert alert-success mt-2 mb-2">{{ Session::get('success') }}</li></div>@endif
                                @if(Session::has('fail')) <div class="alert alert-danger mt-2 mb-2">{{ Session::get('fail') }}</li></div>@endif
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="datatable_1">
                                        <thead class="thead-light">
                                          <tr>
                                           <th>ID</th>
                                            <th>Train</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Date</th>
                                            <th>Tickets</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($bookings as $booking) {
                                            $train_name = Trains::where('id', $booking->train_id)->value('name');
                                            $from_name = TrainStops::where('id', $booking->from_stop)->value('stop_name');
                                            $to_name = TrainStops::where('id', $booking->to_stop)->value('stop_name');
                                        ?>
                                            <tr>
                                                <td>#{{$booking->id}}</td>
                                                <td>{{$train_name}}</td>
                                                <td>{{$from_name}}</td>
                                                <td>{{$to_name}}</td>
                                                <td>{{$booking->date}}</td>
                                                <td>{{$booking->tickets}}</td>
                                                <td>රු{{number_format($booking->booking_total)}}</td>
                                                <td><?php if($booking->status == "success") { ?>
                                                    <span class="badge badge-boxed  badge-outline-success">{{$booking->status}}</span>
                                                    <?php } elseif($booking->status == "pending") { ?>
                                                    <span class="badge badge-boxed  badge-outline-warning">{{$booking->status}}</span>
                                                    <?php } else{?>
                                                    <span class="badge badge-boxed  badge-outline-danger">{{$booking->status}}</span>
                                                    <?php } ?>
                                                </td>

                                                <td >
                                                <a href="{{ url('view-booking-details/'.$booking->id.'') }}"><button type="button" class="btn btn-success btn-xs">View Details</button></a>
                                               <?php if($booking->status != "canceled") { ?>
                                                    <a href="{{ url('cancel-booking/'.$booking->id.'') }}"><button type="button" class="btn btn-danger btn-xs">Cancel Booking</button></a>
                                                <?php } ?>
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
