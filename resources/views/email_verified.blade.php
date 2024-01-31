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
                        <div class="col-lg-5 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 auth-header-box">
                                    <div class="text-center p-3">
                                        <a href="index.html" class="logo logo-admin">
                                            <img src="{{ asset('assets/images/train_light.png') }}" height="50" alt="logo" class="auth-logo">
                                        </a>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white font-18">Congratulations !</h4>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="ex-page-content text-center">
                                        <img src="{{ asset('assets/images/success.png') }}" alt="0" class="" height="170">
                                        <h1 class="mt-5 mb-4" style="font-size: 55px;color:#54B435;">Email Verified</h1>
                                        <h5 class="font-16 text-muted mb-5">Your email has been verified please log in</h5>
                                    </div>
                                    <a class="btn btn-primary w-100" href="{{url('login')}}">Login <i class="fas fa-redo ml-1"></i></a>
                                </div><!--end card-body-->

                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>


<!-- Mirrored from mannatthemes.com/unikit/default/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Dec 2022 03:38:06 GMT -->
</html>
