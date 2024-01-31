<style>
    *{
    margin: 0;
    padding: 0;
    font-family:sans-serif;
}

.banner {
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,0.75), rgba(0, 0, 0, 0.75)),url('{{ asset("assets/images/train.jpeg") }}');
    background-size: cover;
    background-position: center;
}

.navbar {
    width: auto;
    height: 4.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #fff;
}

.logo{
    width: 180px;
    cursor: pointer;
}

.navbar ul li{
    list-style: none;
    display: inline-block;
    margin: 0 20px;
    position: relative;
}

.navbar ul li a{
    text-decoration: none;
    color: rgb(12, 12, 12);
    text-transform: uppercase;
}

.navbar ul li::after{
    content: '';
    height: 3px;
    width: 0%;
    background: #ff5d06;
    position:absolute;
    left: 0;
    bottom: -10px;
    transition: 0.5s;
}

.navbar ul li:hover::after{
    width: 100%;
}

.content{
    width: 100%;
    position: absolute;
    top: 25%;
    transform: translate(-0%);
    text-align: center;
    color: #fff;
}
.content h1 {
    font-size: 70px;
    margin-top: 20px;
}

.content p{
    margin: 20px auto;
    font-weight: 100;
    line-height: 25px;
}

button {
    width: 200px;
    padding: 15px 0;
    text-align: center;
    margin: 20px 10px;
    border-radius: 25px;
    font-weight: bold;
    border: 2px solid #557ef8;
    background: transparent;
    color: #fff;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

span {
    background:#557ef8;
    height: 100%;
    width: 0%;
    border-radius: 25px;
    position: absolute;
    left: 0;
    bottom: 0;
    z-index: -1;
    transition: 0.5s;
}

button:hover span{
    width: 100%;
}
</style>
<head>


        <meta charset="utf-8" />
                <title>Railway Management System</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
                <meta content="" name="author" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />

                <!-- App favicon -->
                <link rel="shortcut icon" href="{{ asset('assets/images/train_dark.png') }}">
    </head>
<div class="banner">

    <div class="content">
    <img src="{{ asset('assets/images/train_light.png') }}" height="100" alt="logo" class="auth-logo">
        <h1>WELCOME</h1>
        <p>Please select a login option</p>
        <div>
            <a href="{{url('/company')}}"><button type="button"><span></span>Company</button></a>
            <a href="{{url('login')}}"><button type="button"><span></span>Passenger</button></a>
        </div>
    </div>
</div>
