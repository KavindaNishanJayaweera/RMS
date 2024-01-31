@include('company::layouts.header')

<div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">

                <div class="row mt-4">
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Passenger</h4>
                                @if(Session::has('success')) <div class="alert alert-success mt-2 mb-2">{{ Session::get('success') }}</li></div>@endif
                                @if(Session::has('fail')) <div class="alert alert-danger mt-2 mb-2">{{ Session::get('fail') }}</li></div>@endif
                            </div><!--end card-header-->
                            <div class="card-body">
                                <form action="" method="post">
                                @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">First Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="first_name">
                                        @if($errors->has("first_name")) <div class="alert alert-danger mt-2">{{ $errors->first('first_name') }}</li></div>@endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">Last Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="last_name">
                                        @if($errors->has("last_name")) <div class="alert alert-danger mt-2">{{ $errors->first('last_name') }}</li></div>@endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">Phone No</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone_number">
                                        @if($errors->has("phone_number")) <div class="alert alert-danger mt-2">{{ $errors->first('phone_number') }}</li></div>@endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                                        @if($errors->has("email")) <div class="alert alert-danger mt-2">{{ $errors->first('email') }}</li></div>@endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                        @if($errors->has("password")) <div class="alert alert-danger mt-2">{{ $errors->first('password') }}</li></div>@endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1">Confirm Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation">
                                        @if($errors->has("password_confirmation")) <div class="alert alert-danger mt-2">{{ $errors->first('password_confirmation') }}</li></div>@endif
                                    </div>
                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="InlineCheckbox" data-parsley-multiple="groups" data-parsley-mincheck="2" name="status" checked>
                                            <label class="custom-control-label" for="InlineCheckbox">Active Passenger</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-de-primary">Submit</button>

                                </form>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
    </div><!-- container -->
    @include('company::layouts.footer')
