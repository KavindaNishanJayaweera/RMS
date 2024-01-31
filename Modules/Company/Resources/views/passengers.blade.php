@include('company::layouts.header')
<?php
use App\Models\PassengerDetails;
?>
<div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">

            <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Passengers</h4>
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
                                        <?php foreach($passengers as $passenger) {
                                            $name = PassengerDetails::where('user_id', $passenger->id)->value('first_name').' '.PassengerDetails::where('user_id', $passenger->id)->value('last_name');
                                            $phone = PassengerDetails::where('user_id', $passenger->id)->value('phone_number');
                                        ?>
                                            <tr>
                                                <td>{{$name}}</td>
                                                <td>{{$phone}}</td>
                                                <td>{{$passenger->email}}</td>
                                                <td><?php if($passenger->status == "active") { ?>
                                                    <span class="badge badge-boxed  badge-outline-success">{{$passenger->status}}</span>
                                                    <?php } else { ?>
                                                    <span class="badge badge-boxed  badge-outline-danger">{{$passenger->status}}</span>
                                                    <?php } ?>
                                                </td>
                                                <td >
                                                <a href="{{ url('company/edit-passenger/'.$passenger->id.'') }}"><i class="fas fa-pen-square text-primary font-20"></i></a>
                                                <a href="{{ url('company/deactivate-passenger/'.$passenger->id.'') }}"><i class="fas fa-times-circle text-danger font-20"></i></a>
                                                <a href="{{ url('company/activate-passenger/'.$passenger->id.'') }}"><i class="fas fa-check-circle text-success font-20"></i></a>
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
