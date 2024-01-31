<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    body {
    background: #595BD4;
    font-family: 'Titillium Web', sans-serif;
}
.loading {


    width: 100%;
    color: #FFF;
    margin: auto;
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%);
}
.loading span {
    position: absolute;
    height: 10px;
    width: 84px;
    top: 50px;
    overflow: hidden;
}
.loading span > i {
    position: absolute;
    height: 4px;
    width: 4px;
    border-radius: 50%;
    -webkit-animation: wait 4s infinite;
    -moz-animation: wait 4s infinite;
    -o-animation: wait 4s infinite;
    animation: wait 4s infinite;
}
.loading span > i:nth-of-type(1) {
    left: -28px;
    background: yellow;
}
.loading span > i:nth-of-type(2) {
    left: -21px;
    -webkit-animation-delay: 0.8s;
    animation-delay: 0.8s;
    background: lightgreen;
}

@-webkit-keyframes wait {
    0%   { left: -7px  }
    30%  { left: 52px  }
    60%  { left: 22px  }
    100% { left: 100px }
}
@-moz-keyframes wait {
    0%   { left: -7px  }
    30%  { left: 52px  }
    60%  { left: 22px  }
    100% { left: 100px }
}
@-o-keyframes wait {
    0%   { left: -7px  }
    30%  { left: 52px  }
    60%  { left: 22px  }
    100% { left: 100px }
}
@keyframes wait {
    0%   { left: -7px  }
    30%  { left: 52px  }
    60%  { left: 22px  }
    100% { left: 100px }
}
</style>

<!DOCTYPE html>
<html>
    <head>

      <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="row align-items-center h-100 ">
        <div class="loading text-center">
            <p>Please wait while you are redirected to the payment gateway</p>
            <span><i></i><i></i></span>
        </div>
        </div>
        <form method="post" action="https://sandbox.payhere.lk/pay/checkout" id="payment_form">
    <input type="hidden" name="merchant_id" value="1223533">
    <input type="hidden" name="return_url" value="{{url('checkout-return')}}">
    <input type="hidden" name="cancel_url" value="{{url('checkout-cancel')}}">
    <input type="hidden" name="notify_url" value="{{url('api/checkout-notify')}}">
    <input type="hidden" name="order_id" value="{{$booking_details->id}}">
    <input type="hidden" name="items" value="{{$booking_details->train_id}}">
    <input type="hidden" name="currency" value="LKR">
    <input type="hidden" name="amount" value="{{$booking_details->booking_total}}">
    <input type="hidden" name="first_name" value="{{$booking_details->first_name}}">
    <input type="hidden" name="last_name" value="{{$booking_details->last_name}}">
    <input type="hidden" name="email" value="{{$booking_details->email}}">
    <input type="hidden" name="phone" value="{{$booking_details->phone_number}}">
    <input type="hidden" name="address" value="{{$booking_details->address}}">
    <input type="hidden" name="city" value="{{$booking_details->city}}">
    <input type="hidden" name="country" value="{{$booking_details->country}}">
    <input type="hidden" name="hash" value="{{$hash}}">
    <input type="submit" value="Buy Now" style="visibility:hidden">
</form>
    </body>
</html>
<script>
const form = document.getElementById('payment_form');

function submitForm() {
  form.submit();
}

setTimeout(submitForm, 2000);
</script>
