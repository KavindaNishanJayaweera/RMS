<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from mannatthemes.com/unikit/default/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Dec 2022 03:38:06 GMT -->
<head>


        <meta charset="utf-8" />
                <title>Railway Management System</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
                <meta content="" name="author" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />

                <!-- App favicon -->
                <link rel="shortcut icon" href="{{ asset('assets/images/train_dark.png') }}">


                <link href="{{ asset('assets/plugins/datatables/datatable.css') }}" rel="stylesheet" type="text/css" />
         <!-- App css -->
         <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

<body id="body" class="auth-page" style="background-image: url('{{ asset('assets/images/p-1.png') }}'); background-size: cover; background-position: center center;">
   <!-- Log In page -->
    <div class="container-md">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 auth-header-box">
                                    <div class="text-center p-3">
                                        <a href="{{ url('/') }}" class="logo logo-admin">
                                            <img src="{{ asset('assets/images/train_light.png') }}" height="50" alt="logo" class="auth-logo">
                                        </a>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white font-18">Welcome</h4>
                                        <p class="text-muted  mb-0">Please enter your details below.</p>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                @if(Session::has('success')) <div class="alert alert-success mt-2 mb-2">{{ Session::get('success') }}</li></div>@endif
                                @if(Session::has('fail')) <div class="alert alert-danger mt-2 mb-2">{{ Session::get('fail') }}</li></div>@endif
                                    <form class="my-4" action="" method="post">
                                    @csrf
                                    <div class="form-group mb-2">
                                            <label class="form-label" for="username">First Name</label>
                                            <input type="text" class="form-control"  name="first_name" placeholder="Enter First Name">
                                            @if($errors->has("first_name")) <div class="alert alert-danger mt-2">{{ $errors->first('first_name') }}</li></div>@endif
                                        </div><!--end form-group-->
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="username">Last Name</label>
                                            <input type="text" class="form-control"  name="last_name" placeholder="Enter Last Name">
                                            @if($errors->has("last_name")) <div class="alert alert-danger mt-2">{{ $errors->first('last_name') }}</li></div>@endif
                                        </div><!--end form-group-->
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="username">Phone Number</label>
                                            <input type="text" class="form-control"  name="phone_number" placeholder="Enter Phone Number">
                                            @if($errors->has("phone_number")) <div class="alert alert-danger mt-2">{{ $errors->first('phone_number') }}</li></div>@endif
                                        </div><!--end form-group-->
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="username">E-Mail</label>
                                            <input type="email" class="form-control" id="username" name="email" placeholder="Enter E-Mail">
                                            @if($errors->has("email")) <div class="alert alert-danger mt-2">{{ $errors->first('email') }}</li></div>@endif
                                        </div><!--end form-group-->

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" class="form-control" name="password"  placeholder="Enter Password">
                                            @if($errors->has("password")) <div class="alert alert-danger mt-2">{{ $errors->first('password') }}</li></div>@endif
                                        </div><!--end form-group-->
                                        <div class="form-group">
                                            <label class="form-label" for="userpassword">Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation"  placeholder="Enter Confirm Password">
                                            @if($errors->has("password_confirmation")) <div class="alert alert-danger mt-2">{{ $errors->first('password_confirmation') }}</li></div>@endif
                                        </div><!--end form-group-->


                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <button class="btn btn-primary" type="submit">Register<i class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                            </div><!--end col-->
                                        </div> <!--end form-group-->
                                    </form><!--end form-->
                                    <div class="m-3 text-center text-muted">
                                        <p class="mb-0">Already have an account  ?  <a href="{{ url('login') }}" class="text-primary ms-2">Login</a></p>
                                    </div>

                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>


<!-- Mirrored from mannatthemes.com/unikit/default/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Dec 2022 03:38:06 GMT -->
</html>
