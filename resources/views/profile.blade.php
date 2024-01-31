@include('layouts.header')

<div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">

                <div class="row mt-4">
                <div class="col-lg-12">
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">My Profile</h4>
                                <div class="col-sm-4">
                                @if(Session::has('success')) <div class="alert alert-success mt-2 mb-2">{{ Session::get('success') }}</li></div>@endif
                                @if(Session::has('fail')) <div class="alert alert-danger mt-2 mb-2">{{ Session::get('fail') }}</li></div>@endif
                                @if($errors->has("first_name")) <div class="alert alert-danger mt-2">{{ $errors->first('first_name') }}</li></div>@endif
                                @if($errors->has("last_name")) <div class="alert alert-danger mt-2">{{ $errors->first('last_name') }}</li></div>@endif
                                @if($errors->has("phone_number")) <div class="alert alert-danger mt-2">{{ $errors->first('phone_number') }}</li></div>@endif
                                @if($errors->has("email")) <div class="alert alert-danger mt-2">{{ $errors->first('email') }}</li></div>@endif
                                @if($errors->has("profile_picture")) <div class="alert alert-danger mt-2">{{ $errors->first('profile_picture') }}</li></div>@endif
                                @if($errors->has("current_password")) <div class="alert alert-danger mt-2">{{ $errors->first('current_password') }}</li></div>@endif
                                @if($errors->has("password")) <div class="alert alert-danger mt-2">{{ $errors->first('password') }}</li></div>@endif
                                @if($errors->has("password_confirmation")) <div class="alert alert-danger mt-2">{{ $errors->first('password_confirmation') }}</li></div>@endif
                                </div>
                            </div><!--end card-header-->
                            <div class="card-body">
                            <div class="row">
                                    <div class="col-sm-3">
                                        <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link waves-effect waves-light active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Basic Details</a>
                                            <a class="nav-link waves-effect waves-light " id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Change Password</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="tab-content mo-mt-2" id="v-pills-tabContent">
                                            <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <form action="" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleInputEmail1">First Name</label>
                                        <input type="text" value="{{$other_details->first_name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="first_name">

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleInputEmail1">Last Name</label>
                                        <input type="text" value="{{$other_details->last_name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="last_name">

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleInputEmail1">Phone Number</label>
                                        <input type="text" value="{{$other_details->phone_number}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone_number">

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleInputEmail1">Country</label>
                                        <input type="text" value="{{$other_details->country}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="country">

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleInputEmail1">Address</label>
                                        <input type="text" value="{{$other_details->address}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address">

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleInputEmail1">Postal Code</label>
                                        <input type="text" value="{{$other_details->postal_code}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="postal_code">

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleInputEmail1">City</label>
                                        <input type="text" value="{{$other_details->city}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="city">

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" value="{{$login_details->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleInputEmail1">Profile Picture</label>
                                        <input type="file" class="form-control"  name="profile_picture">

                                    </div>
                                    </div>
                                    <button type="submit" class="btn btn-de-primary">Save</button>

                                </form>
                                            </div>
                                            <div class="tab-pane fade " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                            <form action="{{url('change-password/'.$login_details->id)}}" method="post"  enctype="multipart/form-data">
                                             @csrf
                                             <div class="row">
                                             <div class="col-md-6 mb-3">
                                            <label for="exampleInputEmail1">Current Password</label>
                                            <input type="password"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="current_password">

                                            </div>
                                            <div class="col-md-6 mb-3">
                                            <label for="exampleInputEmail1">New Password</label>
                                            <input type="password"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password">

                                            </div>
                                            <div class="col-md-6 mb-3">
                                            <label for="exampleInputEmail1">Confirm Password</label>
                                            <input type="password"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password_confirmation">

                                            </div>
                                            </div>
                                             <button type="submit" class="btn btn-de-primary">Save</button>
                                            </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div><!--end card-body-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
    </div><!-- container -->
    @include('layouts.footer')
