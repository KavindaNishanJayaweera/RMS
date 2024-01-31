<?php
use App\Models\AdminDetails;
$admin_name =AdminDetails::where('user_id', Auth::user()->id)->value('name');
$admin_mail =Auth::user()->email;
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from mannatthemes.com/unikit/default/ecommerce-index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Dec 2022 03:37:30 GMT -->
<head>


        <meta charset="utf-8" />
                <title>Railway Management System</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
                <meta content="" name="author" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />

                <!-- App favicon -->
                <link rel="shortcut icon" href="{{ asset('assets/images/train_dark.png') }}">

                <link href="{{ asset('assets/plugins/splide/splide.min.css') }}" rel="stylesheet" type="text/css" />
                <link href="{{ asset('assets/plugins/datatables/datatable.css') }}" rel="stylesheet" type="text/css" />
                <link href="{{ asset('assets/plugins/select/selectr.min.css') }}" rel="stylesheet" type="text/css" />
                <link href="{{ asset('assets/plugins/huebee/huebee.min.css') }}" rel="stylesheet" type="text/css" />
                <link href="{{ asset('assets/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css" />
         <!-- App css -->
         <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    </head>
    <style>
        label{
            font-weight:600;
        }
    </style>
    <body id="body" class="dark-sidebar">
        <!-- leftbar-tab-menu -->
        <div class="left-sidebar">
            <!-- LOGO -->
            <div class="brand">
                <a href="index.html" class="logo">
                    <span>
                        <img src="{{ asset('assets/images/train_light.png') }}" alt="logo-small" class="logo-sm">
                    </span>
                    <span>

                    </span>
                </a>
            </div>
            <div class="sidebar-user-pro media border-end">
                <div class="position-relative mx-auto">
                    <img src="{{ asset('assets/images/users/icons8-name-96.png') }}" alt="user" class="rounded-circle thumb-md">
                    <span class="online-icon position-absolute end-0"><i class="mdi mdi-record text-success"></i></span>
                </div>
                <div class="media-body ms-2 user-detail align-self-center">
                    <h5 class="font-14 m-0 fw-bold">{{$admin_name}}</h5>
                    <p class="opacity-50 mb-0">{{$admin_mail}}</p>
                </div>
            </div>

            <!-- Tab panes -->

            <!--end logo-->
            <div class="menu-content h-100" data-simplebar>
                <div class="menu-body navbar-vertical">
                    <div class="collapse navbar-collapse tab-content" id="sidebarCollapse">
                        <!-- Navigation -->
                        <ul class="navbar-nav tab-pane active" id="Main" role="tabpanel">
                            <a href="{{ url('company/dashboard') }}"><li class="menu-label mt-0 text-primary font-12 fw-semibold" style="background: #fff;border-radius: 10px;">D<span>ashboard</span></li>
                            <li class="menu-label mt-0 text-primary font-12 fw-semibold">U<span>sers</span></li>
                            <li class="nav-item">
                                <a class="nav-link" href="#sidebarAnalytics" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarAnalytics">
                                    <i class="fas fa-user-tie menu-icon"></i>
                                    <span>Admins</span>
                                </a>
                                <div class="collapse " id="sidebarAnalytics">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('company/add-admin') }}">Add Admin</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a href="{{ url('company/all-admins') }}" class="nav-link ">All Admins</a>
                                        </li><!--end nav-item-->

                                    </ul><!--end nav-->
                                </div><!--end sidebarAnalytics-->
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="#Passengers" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="Passengers">
                                    <i class="fas fas fa-users menu-icon"></i>
                                    <span>Passengers</span>
                                </a>
                                <div class="collapse " id="Passengers">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('company/add-passenger') }}">Add Passenger</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a href="{{ url('company/all-passengers') }}" class="nav-link ">All Passengers</a>
                                        </li><!--end nav-item-->

                                    </ul><!--end nav-->
                                </div><!--end sidebarAnalytics-->
                            </li><!--end nav-item-->

                            <li class="menu-label mt-0 text-primary font-12 fw-semibold">O<span>thers</span></li>
                            <li class="nav-item">
                                <a class="nav-link" href="#Trains" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="Trains">
                                    <i class="fas fa-train menu-icon"></i>
                                    <span>Trains</span>
                                </a>
                                <div class="collapse " id="Trains">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('company/add-train') }}">Add Train</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a href="{{ url('company/all-trains') }}" class="nav-link ">All Trains</a>
                                        </li><!--end nav-item-->

                                    </ul><!--end nav-->
                                </div><!--end sidebarAnalytics-->
                            </li><!--end nav-item-->
                            <li class="nav-item">
                            <a class="nav-link" href="{{ url('company/booking-history') }}"><i class="far fa-bookmark menu-icon"></i><span>Booking History</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#Reports" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="Reports">
                                    <i class="fas fa-download menu-icon"></i>
                                    <span>Reports</span>
                                </a>
                                <div class="collapse " id="Reports">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('company/download-passenger-list') }}">Download Passenger List</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a href="{{ url('company/download-booking-list') }}" class="nav-link ">Download Booking List</a>
                                        </li><!--end nav-item-->

                                    </ul><!--end nav-->
                                </div><!--end sidebarAnalytics-->
                            </li><!--end nav-item-->
                            <!--e
                        </ul>
                        <ul class="navbar-nav tab-pane" id="Extra" role="tabpanel">
                            <li>
                                <div class="update-msg text-center position-relative">
                                    <button type="button" class="btn-close position-absolute end-0 me-2" aria-label="Close"></button>
                                    <img src="{{ asset('assets/images/speaker-light.png') }}" alt="" class="" height="110">
                                    <h5 class="mt-0">Mannat Themes</h5>
                                    <p class="mb-3">We Design and Develop Clean and High Quality Web Applications</p>
                                    <a href="javascript: void(0);" class="btn btn-outline-warning btn-sm">Upgrade your plan</a>
                                </div>
                            </li>
                        </ul><!--end navbar-nav--->
                    </div><!--end sidebarCollapse-->
                </div>
            </div>
        </div>
        <!-- end left-sidenav-->
        <!-- end leftbar-tab-menu-->

        <!-- Top Bar Start -->
        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- Navbar -->
            <nav class="navbar-custom" id="navbar-custom">
                <ul class="list-unstyled topbar-nav float-end mb-0">


                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle nav-user" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/images/users/icons8-name-96.png') }}" alt="profile-user" class="rounded-circle me-2 thumb-sm" />
                                <div>
                                    <small class="d-none d-md-block font-11">Admin</small>
                                    <span class="d-none d-md-block fw-semibold font-12">{{$admin_name}}<i
                                            class="mdi mdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ url('company/edit-admin/'.Auth::user()->id.'') }}"><i class="ti ti-settings font-16 me-1 align-text-bottom"></i> Settings</a>
                        <div class="dropdown-divider mb-0"></div>
                        <a class="dropdown-item" href="{{ url('company/logout') }}"><i class="ti ti-power font-16 me-1 align-text-bottom"></i> Logout</a>
                    </div>
                    </li><!--end topbar-profile-->

                </ul><!--end topbar-nav-->

                <ul class="list-unstyled topbar-nav mb-0">
                    <li>
                        <button class="nav-link button-menu-mobile nav-icon" id="togglemenu">
                            <i class="ti ti-menu-2"></i>
                        </button>
                    </li>

                </ul>
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->
        <!-- Top Bar End -->

