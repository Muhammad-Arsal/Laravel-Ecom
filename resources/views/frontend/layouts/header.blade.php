<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $page_name }}</title>
    <link rel="icon" href="{{ asset('frontend/img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <!-- nice select CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/all.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/price_rangs.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/modal.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        .badge:after {
            content: attr(value);
            font-size: 12px;
            color: #fff;
            background: red;
            border-radius: 50%;
            padding: 0 5px;
            position: relative;
            left: -8px;
            top: -10px;
            opacity: 0.9;
        }

        *,
        *:before,
        *:after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Open Sans', Helvetica, Arial, sans-serif;
            background: #ffffff;
        }

        .modal-content {
            box-sizing: 0;
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            background-color: none !important;
            /* background-clip: padding-box; */
            border: none;
            border-radius: 0;
            box-shadow: none;
        }

        input,
        button {
            border: none;
            outline: none;
            background: none;
            font-family: 'Open Sans', Helvetica, Arial, sans-serif;
        }

        .tip {
            font-size: 20px;
            margin: 40px auto 50px;
            text-align: center;
        }

        .cont {
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            width: 900px;
            height: 550px;
            margin: 0 auto 100px;
            background: #fff;
            box-shadow: -10px -10px 15px rgba(255, 255, 255, 0.3), 10px 10px 15px rgba(70, 70, 70, 0.15), inset -10px -10px 15px rgba(255, 255, 255, 0.3), inset 10px 10px 15px rgba(70, 70, 70, 0.15);
        }

        .form {
            position: relative;
            width: 640px;
            height: 100%;
            -webkit-transition: -webkit-transform 1.2s ease-in-out;
            transition: -webkit-transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
            padding: 50px 30px 0;
        }

        .sub-cont {
            overflow: hidden;
            position: absolute;
            left: 640px;
            top: 0;
            width: 900px;
            height: 100%;
            padding-left: 260px;
            background: #fff;
            -webkit-transition: -webkit-transform 1.2s ease-in-out;
            transition: -webkit-transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
        }

        .cont.s--signup .sub-cont {
            -webkit-transform: translate3d(-640px, 0, 0);
            transform: translate3d(-640px, 0, 0);
        }

        button {
            display: block;
            margin: 0 auto;
            width: 260px;
            height: 36px;
            border-radius: 30px;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
        }

        .img {
            overflow: hidden;
            z-index: 2;
            position: absolute;
            left: 0;
            top: 0;
            width: 260px;
            height: 100%;
            padding-top: 360px;
        }

        .img:before {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            width: 900px;
            height: 100%;
            background-image: url("ext.jpg");
            opacity: .8;
            background-size: cover;
            -webkit-transition: -webkit-transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
        }

        .img:after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
        }

        .cont.s--signup .img:before {
            -webkit-transform: translate3d(640px, 0, 0);
            transform: translate3d(640px, 0, 0);
        }

        .img__text {
            z-index: 2;
            position: absolute;
            left: 0;
            top: 50px;
            width: 100%;
            padding: 0 20px;
            text-align: center;
            color: #fff;
            -webkit-transition: -webkit-transform 1.2s ease-in-out;
            transition: -webkit-transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
        }

        .img__text h2 {
            margin-bottom: 10px;
            font-weight: normal;
        }

        .img__text p {
            font-size: 14px;
            line-height: 1.5;
        }

        .cont.s--signup .img__text.m--up {
            -webkit-transform: translateX(520px);
            transform: translateX(520px);
        }

        .img__text.m--in {
            -webkit-transform: translateX(-520px);
            transform: translateX(-520px);
        }

        .cont.s--signup .img__text.m--in {
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }

        .img__btn {
            overflow: hidden;
            z-index: 2;
            position: relative;
            width: 100px;
            height: 36px;
            margin: 0 auto;
            background: transparent;
            color: #fff;
            text-transform: uppercase;
            font-size: 15px;
            cursor: pointer;
        }

        .img__btn:after {
            content: '';
            z-index: 2;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            border: 2px solid #fff;
            border-radius: 30px;
        }

        .img__btn span {
            position: absolute;
            left: 0;
            top: 0;
            display: -webkit-box;
            display: flex;
            -webkit-box-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            align-items: center;
            width: 100%;
            height: 100%;
            -webkit-transition: -webkit-transform 1.2s;
            transition: -webkit-transform 1.2s;
            transition: transform 1.2s;
            transition: transform 1.2s, -webkit-transform 1.2s;
        }

        .img__btn span.m--in {
            -webkit-transform: translateY(-72px);
            transform: translateY(-72px);
        }

        .cont.s--signup .img__btn span.m--in {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        .cont.s--signup .img__btn span.m--up {
            -webkit-transform: translateY(72px);
            transform: translateY(72px);
        }

        h2 {
            width: 100%;
            font-size: 26px;
            text-align: center;
        }

        label {
            display: block;
            width: 260px;
            margin: 25px auto 0;
            text-align: center;
        }

        label span {
            font-size: 12px;
            color: #cfcfcf;
            text-transform: uppercase;
        }

        input {
            display: block;
            width: 100%;
            margin-top: 5px;
            padding-bottom: 5px;
            font-size: 16px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.4);
            text-align: center;
        }

        .forgot-pass {
            margin-top: 15px;
            text-align: center;
            font-size: 12px;
            color: #cfcfcf;
        }

        .submit {
            margin-top: 40px;
            margin-bottom: 20px;
            background: #d4af7a;
            text-transform: uppercase;
        }

        .fb-btn {
            border: 2px solid #d3dae9;
            color: #8fa1c7;
        }

        .fb-btn span {
            font-weight: bold;
            color: #455a81;
        }

        .sign-in {
            -webkit-transition-timing-function: ease-out;
            transition-timing-function: ease-out;
        }

        .cont.s--signup .sign-in {
            -webkit-transition-timing-function: ease-in-out;
            transition-timing-function: ease-in-out;
            -webkit-transition-duration: 1.2s;
            transition-duration: 1.2s;
            -webkit-transform: translate3d(640px, 0, 0);
            transform: translate3d(640px, 0, 0);
        }

        .sign-up {
            -webkit-transform: translate3d(-900px, 0, 0);
            transform: translate3d(-900px, 0, 0);
        }

        .cont.s--signup .sign-up {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    </style>
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.html"> <img src="{{ asset('frontend/img/logo.png') }}"
                                alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('main_page') }}">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ route('shop.category') }}" id="navbarDropdown_1">
                                        Shop
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ route('blog.page') }}" id="navbarDropdown_2">
                                        blog
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <a href=""><i class="ti-heart"></i></a>
                            <div class="dropdown cart">
                                <a href="{{ route('user.cart') }}"><i class="fa badge cart_count"
                                        style="font-size:14px; margin-left: 15px;"
                                        value="@php if(Auth::guard('customer')->check()){

                                            $user_id = Auth::guard('customer')->id();

                                            $user_cart = \DB::table('user_cart')->where("user_id",$user_id)->get();

                                            $cart_count = count($user_cart);
                                            
                                            echo $cart_count;
                                        }elseif (session('user.cart')) {
                                            $count_cart = count(session('user.cart'));

                                            echo $count_cart;
                                        }else{
                                            echo 0;
                                        } @endphp">&#xf07a;</i></a>
                                <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="single_product">

                                </div>
                            </div> -->
                            </div>
                        </div>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg"
                                        width="40" height="40" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    @php
                                        if (Auth::guard('customer')->user()) {
                                            $credentials = Auth::guard('customer')->user()->name;
                                        }
                                    @endphp
                                    @if (!empty($credentials))
                                        <a class="dropdown-item customer_name">{{ $credentials }}</a>
                                    @else
                                        <a class="dropdown-item customer_name" data-target="#exampleModal"
                                            data-toggle="modal">Login/Register</a>
                                    @endif
                                    <a class="dropdown-item" href="#">Dashboard</a>
                                    <a class="dropdown-item" href="{{ route('customer.logout') }}">Log Out</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->


    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2 class="text-left">{{ $heading_name }}</h2>
                            <p>Home <span>-</span>{{ $span_data }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: transparent;">
                <div class="modal-body" style="left: -40%;">
                    <br>
                    <br>
                    <div class="cont">
                        <form action="{{ route('login.customer') }}" method="post" id="sign_in">
                            @csrf
                            <div class="form sign-in">
                                <h2>Welcome</h2>
                                <label>
                                    <span>Email</span>
                                    <input type="email" name="email" />
                                </label>
                                <label>
                                    <span>Password</span>
                                    <input type="password" name="password" />
                                </label>
                                <button type="submit" class="submit login_form_button">Log In</button>
                            </div>
                        </form>
                        <div class="sub-cont">
                            <div class="img">
                                <div class="img__text m--up">

                                    <h3>Don't have an account? Please Sign up!<h3>
                                </div>
                                <div class="img__text m--in">

                                    <h3>If you already has an account, just sign in.<h3>
                                </div>
                                <div class="img__btn">
                                    <span class="m--up">Sign Up</span>
                                    <span class="m--in">Sign In</span>
                                </div>
                            </div>
                            <form action="{{ route('register.customer') }}" method="post">
                                @csrf
                                <div class="form sign-up">
                                    <h2>Create your Account</h2>
                                    <label>
                                        <span>Name</span>
                                        <input type="text" name="name" />
                                    </label>
                                    <label>
                                        <span>Email</span>
                                        <input type="email" name="email" />
                                    </label>
                                    <label>
                                        <span>Password</span>
                                        <input type="password" name="password" />
                                    </label>
                                    <button type="submit" class="submit">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    @push('JS')
        <script>
            document.querySelector('.img__btn').addEventListener('click', function() {
                document.querySelector('.cont').classList.toggle('s--signup');
            });

            $(document).ready(function() {
                $(".login_form_button").click(function(e) {
                    e.preventDefault();
                    var form_data = $("#sign_in").serialize();
                    $.ajax({
                        type: "post",
                        url: "{{ route('login.customer') }}",
                        data: form_data,
                        success: function(response) {
                            $(response).each(function(index, element) {
                                $(".customer_name").replaceWith(
                                    '<a class="dropdown-item">' + element.credentials +
                                    '</a>');
                                $('#exampleModal').modal('hide');
                                $(".heart").css("display", "block");
                                $(".cart_count").attr('value', element.count);
                            });
                        }
                    });
                });
            });
        </script>
    @endpush
