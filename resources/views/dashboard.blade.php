@include('layouts.header')
<div class="page-wrapper">

<!-- Page Content-->
<div class="page-content-tab">

    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">

                    <h4 class="page-title">Dashboard</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->


        <div class="row">


                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col text-center">
                                        <span class="h5  fw-bold">{{$trains_count}}</span>
                                        <h6 class="text-uppercase text-muted mt-2 m-0 font-11">No of Available Trains</h6>
                                        <a href="{{ url('book-trains') }}" class="btn btn-primary mt-4 btn-sm">View<i class="las la-arrow-right"></i></a>
                                    </div><!--end col-->
                                </div> <!-- end row -->
                            </div><!--end card-body-->
                        </div> <!--end card-body-->
                    </div><!--end col-->
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col text-center">
                                        <span class="h5  fw-bold">{{$bookings_count}}</span>
                                        <h6 class="text-uppercase text-muted mt-2 m-0 font-11">Your Bookings</h6>
                                        <a href="{{ url('my-bookings') }}" class="btn btn-primary mt-4 btn-sm">View<i class="las la-arrow-right"></i></a>
                                    </div><!--end col-->
                                </div> <!-- end row -->
                            </div><!--end card-body-->
                        </div> <!--end card-->
                    </div><!--end col-->
                </div>

    </div><!-- container -->
    @include('layouts.footer')
