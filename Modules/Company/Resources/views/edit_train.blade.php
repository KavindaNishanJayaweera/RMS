@include('company::layouts.header')
<?php


    if($train_details->status == "active"){
    $check = "checked";
    }
    else{
        $check = "";
    }

?>
<div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">

                <div class="row mt-4">
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Train</h4>
                                @if(Session::has('success')) <div class="alert alert-success mt-2 mb-2">{{ Session::get('success') }}</li></div>@endif
                                @if(Session::has('fail')) <div class="alert alert-danger mt-2 mb-2">{{ Session::get('fail') }}</li></div>@endif
                            </div><!--end card-header-->
                            <div class="card-body">
                                <form action="" method="post">
                                @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">Train Name</label>
                                        <input type="text" value="{{$train_details->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                                        @if($errors->has("name")) <div class="alert alert-danger mt-2">{{ $errors->first('name') }}</li></div>@endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">Train Route</label>
                                        <input type="text"  value="{{$train_details->route}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="route">
                                        @if($errors->has("route")) <div class="alert alert-danger mt-2">{{ $errors->first('route') }}</li></div>@endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">Departure</label>
                                        <input type="text" value="{{$train_details->departure}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="departure">
                                        @if($errors->has("departure")) <div class="alert alert-danger mt-2">{{ $errors->first('departure') }}</li></div>@endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">Arrival</label>
                                        <input type="text" value="{{$train_details->arrival}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="arrival">
                                        @if($errors->has("arrival")) <div class="alert alert-danger mt-2">{{ $errors->first('arrival') }}</li></div>@endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">Departure Time</label>
                                        <input class="form-control"  value="{{$train_details->departure_time}}" type="time"  id="example-time-input" name="departure_time">
                                        @if($errors->has("departure_time")) <div class="alert alert-danger mt-2">{{ $errors->first('departure_time') }}</li></div>@endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">No of Passengers</label>
                                        <input class="form-control" value="{{$train_details->no_of_passengers}}" type="number"  id="example-time-input" name="no_of_passengers">
                                        @if($errors->has("no_of_passengers")) <div class="alert alert-danger mt-2">{{ $errors->first('no_of_passengers') }}</li></div>@endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">Fee</label>
                                        <input class="form-control" value="{{$train_details->fee}}" type="number"  id="example-time-input" name="fee">
                                        @if($errors->has("fee")) <div class="alert alert-danger mt-2">{{ $errors->first('fee') }}</li></div>@endif
                                    </div>
                                     <div class="mb-3">
                                        <label for="exampleInputEmail1">Current Latitude</label>
                                        <input class="form-control" type="text" value="{{$train_details->latitude}}"  id="example-time-input" name="latitude">
                                        @if($errors->has("latitude")) <div class="alert alert-danger mt-2">{{ $errors->first('latitude') }}</li></div>@endif
                                    </div>
                                     <div class="mb-3">
                                        <label for="exampleInputEmail1">Current Longitude</label>
                                        <input class="form-control"  type="text" value="{{$train_details->longitude}}"   id="example-time-input" name="longitude">
                                        @if($errors->has("longitude")) <div class="alert alert-danger mt-2">{{ $errors->first('longitude') }}</li></div>@endif
                                    </div>
                                    <div class="col-md-12">
                                <label for="exampleInputEmail1" class="mb-2">Train Stops</label>
                                    <div class="row">
                                       <div class="col-md-4">
                                        <div class="mb-3">
                                        <label for="exampleInputEmail1">Stop Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="stop_name[]" >
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="mb-3">
                                        <label for="exampleInputEmail1">Distance (KM)</label>
                                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="distance[]" >
                                        </div>
                                        </div>
                                        <div class="col-md-4">

                                        <button type="button" class="btn btn-info mt-4 btn-sm" id="add_more_stops"><i class="fas fa-plus me-2"></i>Add More Stops</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="dynamic_field3">
                                </div>
                                <div class="col-md-12">
                                <label for="exampleInputEmail1" class="mb-2">Added Train Stops</label>
<?php foreach ($train_stops as $train_stop)  { ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                        <div class="mb-3">
                                            <p>{{$train_stop->stop_name}}</p>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="mb-3">
                                        <p>{{$train_stop->distance}}KM</p>
                                        </div>
                                        </div>

                                        <div class="col-md-2">
                                        <a href="{{ url('company/delete-train-stop/'.$train_stop->id.'') }}"><button type="button" class="btn btn-danger btn-sm" >X</button></a>
                                        </div>
                                    </div>
<?php } ?>
                                </div>
                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" {{$check}} class="custom-control-input" id="InlineCheckbox" data-parsley-multiple="groups" data-parsley-mincheck="2" name="status" checked>
                                            <label class="custom-control-label" for="InlineCheckbox">Active Train</label>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>

        $(document).ready(function(){
      var i=0;
      $('#add_more_stops').click(function(){
           i++;
           $('#dynamic_field3').append('<div class="row mb-3" id="inputFormRow3"><div class="col-md-4"><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="stop_name[]" required></div><div class ="col-md-4"> <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="distance[]" required></div><div class ="col-md-4"> <button type="button" class="btn btn-danger btn-sm" id="delete_stop"><i class="fas fa-minus me-2"></i>Remove</button></div></div>');
      });

 });

   $(document).on('click', '#delete_stop', function () {
        $(this).closest('#inputFormRow3').remove();
    });
 </script>
