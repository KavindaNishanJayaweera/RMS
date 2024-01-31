@include('company::layouts.header')
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
                                <h4 class="card-title">View Booking Details</h4>
                                @if(Session::has('success')) <div class="alert alert-success mt-2 mb-2">{{ Session::get('success') }}</li></div>@endif
                                @if(Session::has('fail')) <div class="alert alert-danger mt-2 mb-2">{{ Session::get('fail') }}</li></div>@endif
                            </div><!--end card-header-->
                            <div class="card-body">

                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <p style="font-weight:bold">Train :</p>
                                </div>
                                <div class="col-md-10">
                                    <p >{{Trains::where('id', $booking->train_id)->value('name')}}</p>
                                </div>
                                <div class="col-md-2">
                                    <p style="font-weight:bold">From :</p>
                                </div>
                                <div class="col-md-10">
                                    <p >{{TrainStops::where('id', $booking->from_stop)->value('stop_name')}}</p>
                                </div>
                                <div class="col-md-2">
                                    <p style="font-weight:bold">To :</p>
                                </div>
                                <div class="col-md-10">
                                    <p >{{TrainStops::where('id', $booking->to_stop)->value('stop_name')}}</p>
                                </div>
                                <div class="col-md-2">
                                    <p style="font-weight:bold">Date :</p>
                                </div>
                                <div class="col-md-10">
                                    <p >{{$booking->date}}</p>
                                </div>
                                <div class="col-md-2">
                                    <p style="font-weight:bold">Tickets :</p>
                                </div>
                                <div class="col-md-10">
                                    <p >{{$booking->tickets}}</p>
                                </div>
                                <div class="col-md-2">
                                    <p style="font-weight:bold">Total :</p>
                                </div>
                                <div class="col-md-10">
                                    <p >රු{{number_format($booking->booking_total)}}</p>
                                </div>
                                <div class="col-md-2">
                                    <p style="font-weight:bold">Status :</p>
                                </div>
                                <div class="col-md-10">
                                    <p >{{$booking->status}}</p>
                                </div>
                                <div class="col-md-2">
                                    <p style="font-weight:bold">Payment ID :</p>
                                </div>
                                <div class="col-md-10">
                                    <p >{{$booking->payment_id}}</p>
                                </div>
                                <div class="col-md-2">
                                    <p style="font-weight:bold">Payment Method :</p>
                                </div>
                                <div class="col-md-10">
                                    <p >{{$booking->method}}</p>
                                </div>
                                <div class="col-md-2">
                                    <p style="font-weight:bold">First Name :</p>
                                </div>
                                <div class="col-md-10">
                                    <p >{{$booking->first_name}}</p>
                                </div>
                                <div class="col-md-2">
                                    <p style="font-weight:bold">Last Name :</p>
                                </div>
                                <div class="col-md-10">
                                    <p >{{$booking->last_name}}</p>
                                </div>
                                <div class="col-md-2">
                                    <p style="font-weight:bold">Email :</p>
                                </div>
                                <div class="col-md-10">
                                    <p >{{$booking->email}}</p>
                                </div>
                                <div class="col-md-2">
                                    <p style="font-weight:bold">Phone Number :</p>
                                </div>
                                <div class="col-md-10">
                                    <p >{{$booking->phone_number}}</p>
                                </div>
                                <div class="col-md-2">
                                    <p style="font-weight:bold">Country :</p>
                                </div>
                                <div class="col-md-10">
                                    <p >{{$booking->country}}</p>
                                </div>
                                <div class="col-md-2">
                                    <p style="font-weight:bold">Address :</p>
                                </div>
                                <div class="col-md-10">
                                    <p >{{$booking->address}}</p>
                                </div>
                                <div class="col-md-2">
                                    <p style="font-weight:bold">Postal Code :</p>
                                </div>
                                <div class="col-md-10">
                                    <p >{{$booking->postal_code}}</p>
                                </div>
                                <div class="col-md-2">
                                    <p style="font-weight:bold">City :</p>
                                </div>
                                <div class="col-md-10">
                                    <p >{{$booking->city}}</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
    </div><!-- container -->
    @include('company::layouts.footer')
