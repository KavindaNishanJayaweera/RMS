@include('company::layouts.header')
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
                                <h4 class="card-title">All Admins</h4>
                                @if(Session::has('success')) <div class="alert alert-success mt-2 mb-2">{{ Session::get('success') }}</li></div>@endif
                                @if(Session::has('fail')) <div class="alert alert-danger mt-2 mb-2">{{ Session::get('fail') }}</li></div>@endif
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="datatable_1">
                                        <thead class="thead-light">
                                          <tr>
                                            <th>Name</th>
                                            <th>Phone No</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($admins as $admin) {
                                            $name = AdminDetails::where('user_id', $admin->id)->value('name');
                                            $phone = AdminDetails::where('user_id', $admin->id)->value('phone');
                                        ?>
                                            <tr>
                                                <td>{{$name}}</td>
                                                <td>{{$phone}}</td>
                                                <td>{{$admin->email}}</td>
                                                <td><?php if($admin->status == "active") { ?>
                                                    <span class="badge badge-boxed  badge-outline-success">{{$admin->status}}</span>
                                                    <?php } else { ?>
                                                    <span class="badge badge-boxed  badge-outline-danger">{{$admin->status}}</span>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-end">
                                                <a href="{{ url('company/edit-admin/'.$admin->id.'') }}"><i class="fas fa-pen-square text-primary font-20"></i></a>
                                                <a href="{{ url('company/deactivate-admin/'.$admin->id.'') }}"><i class="fas fa-times-circle text-danger font-20"></i></a>
                                                <a href="{{ url('company/activate-admin/'.$admin->id.'') }}"><i class="fas fa-check-circle text-success font-20"></i></a>
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
    @include('company::layouts.footer')
