@include('layouts.header')
<div class="page-wrapper">

            <!-- Page Content-->
            <div class="page-content-tab">

                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">

                                <h4 class="page-title">Booking Details</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <form action=" " method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- end page title end breadcrumb -->
                    <div class="row">


                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-title">Customer Details</h4>
                                        </div><!--end col-->
                                    </div>  <!--end row-->
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <form class="mb-0">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">First Name <small class="text-danger font-13">*</small></label>
                                                    <input type="text" class="form-control" name="first_name" required="" value="{{$other_details->first_name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Last Name <small class="text-danger font-13">*</small></label>
                                                    <input type="text" class="form-control" name="last_name" required="" value="{{$other_details->last_name}}">
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label my-2">Email<small class="text-danger font-13">*</small></label>
                                                    <input type="email" class="form-control" required="" name="email" value="{{$login_details->email}}">
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label my-2">Phone Number <small class="text-danger font-13">*</small></label>
                                                    <input type="text" class="form-control" required="" value="{{$other_details->phone_number}}"  name="phone_number">
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label my-2">Country <small class="text-danger font-13">*</small></label>
                                                    <input type="text" class="form-control" id="country" required="" name="country" value="{{$other_details->country}}">
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label my-2">Address <small class="text-danger font-13">*</small></label>
                                                    <input type="text" class="form-control" id="address" required="" name="address" value="{{$other_details->address}}">
                                                </div>
                                            </div> <!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label my-2">Postal Code / Zip <small class="text-danger font-13">*</small></label>
                                                    <input type="text" class="form-control" id="postal_code" required="" name="postal_code" value="{{$other_details->postal_code}}">
                                                </div>
                                            </div> <!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label my-2">Town / City<small class="text-danger font-13">*</small></label>
                                                    <input type="text" class="form-control" id="city" required="" name="city" value="{{$other_details->city}}">
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label my-2">Date<small class="text-danger font-13">*</small></label>
                                                    <input type="date" class="form-control" id="date" required="" name="date" value="">
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-md-6">

                                        <label class="form-label my-2">From<small class="text-danger font-13">*</small></label>
                                        <select class="form-select" aria-label="Default select example" name="from" id="from" required onchange="GetPrice()">
                                        <option disabled selected hidden value="">Select a stop</option>
                                                   <?php foreach($train_stops as $train_stop){ ?>
                                                    <option value="{{$train_stop->id}}">{{$train_stop->stop_name}}</option>
                                                   <?php }
                                                   ?>
                                        </select>

                                        <div id="from_error" class="mt-2" style="color:red;font-weight:bold;text-align:left;"></div>
                                        </div>
                                        <div class="col-md-6">

                                        <label class="form-label my-2">To<small class="text-danger font-13">*</small></label>
                                        <select class="form-select" aria-label="Default select example" name="to" id="to" required onchange="GetPrice()">
                                        <option disabled selected hidden value="">Select a stop</option>
                                                   <?php foreach($train_stops as $train_stop){ ?>
                                                    <option value="{{$train_stop->id}}">{{$train_stop->stop_name}}</option>
                                                   <?php }
                                                   ?>
                                        </select>
                                        <div id="to_error" class="mt-2" style="color:red;font-weight:bold;text-align:left;"></div>

                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label my-2">No of tickets<small class="text-danger font-13">*</small></label>
                                                    <input type="number" class="form-control" id="tickets" required="" name="tickets" value="" onKeyUp="GetPrice()">
                                                </div>
                                                <div id="tickets_error" class="mt-2" style="color:red;font-weight:bold;text-align:left;"></div>
                                            </div><!--end col-->
                                            <div id="booking_error" class="mt-2" style="color:red;font-weight:bold;text-align:left;"></div>
                                        </div><!--end row-->


                                    </form><!--end form-->
                                </div><!--end card-body-->
                            </div><!--end card-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h4 class="card-title">Payment Option</h4>
                                                </div><!--end col-->
                                            </div>  <!--end row-->
                                        </div><!--end card-header-->
                                        <div class="card-body">
                                            <div class="accordion accordion-flush checkout-accordion" id="accordionFlushExample">
                                                <div class="accordion-item">
                                                  <h2 class="accordion-header mt-0" id="flush-headingOne">
                                                    <button class="accordion-button d-flex justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                                        <span class="align-self-center">PayHear</span>
                                                        <a href="https://www.payhere.lk" target="_blank"><img src="https://www.payhere.lk/downloads/images/payhere_short_banner_dark.png" alt="PayHere" width="250"/></a>
                                                    </button>
                                                  </h2>
                                                  <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                         You will be redirected to the PayHear payment gateway to complete your payment.
                                                    </div>
                                                  </div>
                                                </div>

                                            </div>
                                            <input type="hidden" name="train_id" value="{{$train_details->id}}">
                                            <input type="hidden" name="booking_total" id="booking_total" value="">
                                            <button type="submit" class="btn btn-block btn-primary mt-4">Confirm Booking</button>
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                </div><!--end col-->
                                </form>
                            </div><!--end row-->
                        </div><!--end col-->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-title">Train Details</h4>
                                        </div><!--end col-->
                                    </div>  <!--end row-->
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <div class="table-responsive shopping-cart">
                                        <table class="table mb-0">

                                            <tbody>
                                                <tr>
                                                <td class="">
                                                        <h6>Name :</h6>
                                                    </td>
                                                    <td>{{$train_details->name}}</td>
                                                </tr>
                                                <td class="">
                                                        <h6>Route :</h6>
                                                    </td>
                                                    <td>{{$train_details->route}}</td>
                                                </tr>
                                                <td class="">
                                                        <h6>Departure :</h6>
                                                    </td>
                                                    <td>{{$train_details->departure}}</td>
                                                </tr>
                                                <td class="">
                                                        <h6>Arrival :</h6>
                                                    </td>
                                                    <td>{{$train_details->arrival}}</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div><!--end re-table-->
                                    <div class="total-payment">
                                        <table class="table mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="fw-semibold">Subtotal</td>
                                                    <td>රු<span id="sub-total-span">0</span></td>
                                                </tr>

                                                <tr>
                                                    <td class="fw-semibold">Royalty Deduction</td>
                                                    <td>-රු<span id="deduction-span">0</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-semibold  border-bottom-0">Total</td>
                                                    <td class="text-dark  border-bottom-0"><strong>රු<span id="final-total-span">0</span></strong></td>
                                                </tr>
                                            </tbody>
                                        </table><!--end table-->
                                    </div><!--end total-payment-->
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->

                </div><!-- container -->


                <!--end Rightbar/offcanvas-->
                 <!--end Rightbar-->

                <!--Start Footer-->
                <!-- Footer Start -->

            </div>
            <!-- end page content -->
        </div>
@include('layouts.footer')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
function GetPrice() {
  var from = document.getElementById("from").value;
  var to = document.getElementById("to").value;
  var tickets = document.getElementById("tickets").value;
  var from_error = document.getElementById('from_error');
  var to_error = document.getElementById('to_error');
  var tickets_error = document.getElementById('tickets_error');
if(from == ""){
from_error.textContent = 'Please select a stop';
}
else{
from_error.textContent = '';
}
if(to == ""){
to_error.textContent = 'Please select a stop';
}
else{
    to_error.textContent = '';
}
if(tickets == ""){
tickets_error.textContent = 'Please enter a value';
}
else{
    tickets_error.textContent = '';
}
  var url = '{{ url('get-price') }}';
            //Perform Ajax request.
            $.ajax({
           url:url,
           method:'POST',
           data:{
            "_token":"{{ csrf_token() }}",
            from : from,
            to : to,
            tickets : tickets,
            train_id : {{$train_details->id}},
            },
            success:function(response){
            var resData = JSON.parse(response);
            var booking_error = document.getElementById('booking_error');
            var sub_total_span = document.getElementById('sub-total-span');
            var deduction_span = document.getElementById('deduction-span');
            var final_total_span = document.getElementById('final-total-span');
            if(resData.status == "fail"){
                booking_error.textContent = resData.message;
                sub_total_span.textContent = 0;
                deduction_span.textContent = 0;
                final_total_span.textContent = 0;
                document.getElementById("booking_total").value = '';
            }
            else{
                booking_error.textContent = '';
                sub_total_span.textContent = resData.before_deduction_cost;
                deduction_span.textContent = resData.royalty_deduction_price;
                final_total_span.textContent = resData.after_deduction_cost;
                document.getElementById("booking_total").value = resData.after_deduction_cost;
            }
           },
           error:function(error){
              console.log(error)
           }
});
}
</script>
