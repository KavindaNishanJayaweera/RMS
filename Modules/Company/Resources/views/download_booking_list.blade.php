@include('company::layouts.header')

<div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">

                <div class="row mt-4">
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Download Booking List</h4>
                                @if(Session::has('success')) <div class="alert alert-success mt-2 mb-2">{{ Session::get('success') }}</li></div>@endif
                                @if(Session::has('fail')) <div class="alert alert-danger mt-2 mb-2">{{ Session::get('fail') }}</li></div>@endif
                            </div><!--end card-header-->
                            <div class="card-body">
                                <form action="" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">From</label>
                                        <input name="from" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                        @if($errors->has("from")) <div class="alert alert-danger mt-2">{{ $errors->first('from') }}</li></div>@endif
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">To</label>
                                        <input name="to" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                        @if($errors->has("to")) <div class="alert alert-danger mt-2">{{ $errors->first('to') }}</li></div>@endif
                                    </div>
                                    </div>
                                </div>
                                    <button type="submit" class="btn btn-de-primary">Download</button>

                                </form>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
    </div><!-- container -->
    @include('company::layouts.footer')
