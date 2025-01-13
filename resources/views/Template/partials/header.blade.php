<!DOCTYPE html>
<html lang="en">

<head>
    <title>Grocery Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <!-- Thêm Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <!-- Thêm jQuery và Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Thêm Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="{{ asset('Template/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Template/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('Template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Template/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Template/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('Template/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('Template/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('Template/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('Template/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('Template/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('Template/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('Template/css/style.css') }}">

</head>

<body class="goto-here">
    <div class="py-1 bg-primary">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-phone2"></span></div>
                            <span class="text">{{ $shops->phone }}</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-paper-plane"></span></div>
                            <span class="text">{{ $shops->email }}</span>
                        </div>
                        <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                            <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">{{ $shops->shopName }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{ route('index') }}" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('product.index') }}" id="dropdown04" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Shop</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="blog">Blog</a>
                            <a class="dropdown-item" href="wishlist">Wishlist</a>
                            <a class="dropdown-item" href="productsingle">Single Product</a>
                            <a class="dropdown-item" href="cart">Cart</a>
                            <a class="dropdown-item" href="checkout">Checkout</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                    <li class="nav-item cta cta-colored"><a href="{{ route('cart.index') }}" class="nav-link"><span
                                class="icon-shopping_cart"></span>[0]</a></li>
                    @guest
                        <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#loginModal">Login</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-toggle="modal"
                                data-target="#registerModal">Register</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ Auth::user()->image ?? asset('Template/images/default-avatar.png') }}"
                                    alt="Avatar" class="rounded-circle" style="width: 30px; height: 30px;">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="">Profile</a>
                                <a class="dropdown-item" href="{{ route('wishlist.index') }}">Wishlist <span><i
                                            class="ion-ios-heart"></i></span></a>
                                <a class="dropdown-item" href=""
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </div>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </ul>
            </div>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
            <button>
                <img src="https://cdn-icons-png.flaticon.com/512/622/622669.png" alt="Search">
            </button>
        </div>
    </nav>

    <!-- Modal Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        <div id="notificationBar" class="alert alert-success alert-dismissible fade show"
                            role="alert" style="display: none;">
                            <strong id="notificationMessage"></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @csrf
                        <div class="form-group mb-3">
                            <label for="username">UserName</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <span class="input-group-text">
                                    <i id="togglePasswordLogin" class="fas fa-eye" style="cursor: pointer;"></i>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <div id="responseMessage"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Đăng Ký -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="notificationBar" class="alert alert-success alert-dismissible fade show" role="alert"
                        style="display: none;">
                        <strong id="notificationMessage"></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Form Đăng Ký -->
                    <form id="registerForm" action="{{ url('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">UserName</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <span class="input-group-text">
                                    <i id="togglePasswordRegister" class="fas fa-eye" style="cursor: pointer;"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" required>
                                <span class="input-group-text">
                                    <i id="togglePasswordConfirmRegister" class="fas fa-eye"
                                        style="cursor: pointer;"></i>
                                </span>
                            </div>

                        </div>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
    </div>
