<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from www.thetahmid.com/themes/xemart-v1.0/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Jul 2021 06:50:03 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ App\Models\SiteSetting::config()->title }}</title>
    <meta name="description" content="{{ App\Models\SiteSetting::config()->description }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/siteconfig/' . App\Models\SiteSetting::config()->favicon) }}"
        type="image/png">
    <link rel="icon" href="{{ asset('images/siteconfig/' . App\Models\SiteSetting::config()->favicon) }}"
        type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontend/css/assets/bootstrap.min.css') }}">

    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('frontend/css/assets/font-awesome.min.css') }}">

    <!-- Animate Css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/assets/animate.css') }}">

    <!-- Owl Slider -->
    <link rel="stylesheet" href="{{ asset('frontend/css/assets/owl.carousel.min.css') }}">

    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('frontend/css/assets/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/assets/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/toastr.min.css') }}">
    @livewireStyles
</head>

<body>

    <!-- Preloader -->
    {{-- <div class="preloader">
        <div class="load-list">
            <div class="load"></div>
            <div class="load load2"></div>
        </div>
    </div> --}}
    <!-- End Preloader -->

    <!-- Top Bar -->
    <section class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-4">
                    <div class="top-left d-flex">
                        <div class="lang-box">
                            <span><img src="{{ asset('frontend/images/fl-eng.png') }}" alt="">English<i
                                    class="fa fa-angle-down"></i></span>
                            <ul class="list-unstyled">
                                <li><img src="{{ asset('frontend/images/fl-eng.png') }}" alt="">English</li>
                                <li><img src="{{ asset('frontend/images/fl-fra.png') }}" alt="">French</li>
                                <li><img src="{{ asset('frontend/images/fl-ger.png') }}" alt="">German</li>
                                <li><img src="{{ asset('frontend/images/fl-bra.png') }}" alt="">Brazilian</li>
                            </ul>
                        </div>
                        <div class="mny-box">
                            <span>USD<i class="fa fa-angle-down"></i></span>
                            <ul class="list-unstyled">
                                <li>USD</li>
                                <li>GBP</li>
                                <li>EUR</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <div class="top-right text-right">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item"><a href="#"><img
                                        src="{{ asset('frontend/images/wishlist.png') }}" alt="">Wishlist</a>
                            </li>
                            <li class="list-inline-item"><a href="#"><img
                                        src="{{ asset('frontend/images/checkout.png') }}" alt="">Checkout</a>
                            </li>
                            @if (Route::has('login'))
                                @auth
                                    @if (Auth::user()->utype === 'USR')
                                        <li class="list-inline-item"><a href="#"><img
                                                    src="{{ asset('frontend/images/user.png') }}" alt="">My Account</a>
                                        </li>
                                        <li class="list-inline-item"><a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout').submit();"><img
                                                    src="{{ asset('frontend/images/user.png') }}" alt="">Logout</a>
                                        </li>
                                        <form action="{{ route('logout') }}" method="post" id="logout">
                                            @csrf
                                        </form>
                                    @else
                                        <li class="list-inline-item"><a href="{{ route('admin.dashboard') }}"><img
                                                    src="{{ asset('frontend/images/user.png') }}" alt="">Dashboard</a>
                                        </li>
                                        <li class="list-inline-item"><a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout').submit();"><img
                                                    src="{{ asset('frontend/images/user.png') }}" alt="">Logout</a>
                                        </li>
                                        <form action="{{ route('logout') }}" method="post" id="logout">
                                            @csrf
                                        </form>
                                    @endif
                                @else
                                    <li class="list-inline-item"><a href="{{ route('login') }}"><img
                                                src="{{ asset('frontend/images/login.png') }}" alt="">Login</a>
                                    </li>
                                    <li class="list-inline-item"><a href="{{ route('register') }}"><img
                                                src="{{ asset('frontend/images/login.png') }}" alt="">Register</a>
                                    </li>
                                @endif
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Top Bar -->

        <!-- Logo Area -->
        <section class="logo-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="{{ route('home') }}"><img
                                    src="{{ asset('images/siteconfig/' . App\Models\SiteSetting::config()->logo) }}"
                                    alt="{{ App\Models\SiteSetting::config()->title }}" class="mt-0"></a>
                        </div>
                    </div>
                    <div class="col-md-5 padding-fix">
                        <form action="#" class="search-bar">
                            <input type="text" name="search-bar" placeholder="I'm looking for...">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="carts-area d-flex">
                            <div class="call-box d-flex">
                                <div class="call-ico">
                                    <img src="{{ asset('frontend/images/call.png') }}" alt="">
                                </div>
                                <div class="call-content">
                                    <span>Call Us</span>
                                    <p>+1 (111) 426 6573</p>
                                </div>
                            </div>
                            <div class="cart-box ml-auto text-center">
                                <a href="{{ route('cart') }}" class="">
                                    <img src="{{ asset('frontend/images/cart.png') }}" alt="cart">
                                    <span>{{ Cart::count() }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Logo Area -->
        <!-- Sticky Menu -->
        <section class="sticky-menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3">
                        <div class="sticky-logo">
                            <a href="index-2.html"><img src="{{ asset('frontend/images/logo.png') }}" alt=""
                                    class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7">
                        <div class="main-menu">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="{{ route('home') }}">HOME</a>
                                </li>
                                <li class="list-inline-item"><a href="">CONTACT</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-2">
                        <div class="carts-area d-flex">
                            <div class="src-box">
                                <form action="#">
                                    <input type="text" name="search" placeholder="Search Here">
                                    <button type="button" name="button"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="wsh-box ml-auto">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Wishlist">
                                    <img src="{{ asset('frontend/images/heart.png') }}" alt="favorite">
                                    <span>0</span>
                                </a>
                            </div>
                            <div class="cart-box ml-4">
                                <a href="{{ route('cart') }}" data-toggle="tooltip" data-placement="top"
                                    title="Shopping Cart" class="">
                                    <img src="{{ asset('frontend/images/cart.png') }}" alt="cart">
                                    <span>{{ Cart::count() }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Sticky Menu -->

        <!-- Menu Area -->
        <section class="menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-menu">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="{{ route('home') }}">HOME</a>
                                </li>
                                <li class="list-inline-item"><a href="20-contact.html">CONTACT</a></li>
                                <li class="list-inline-item trac-btn"><a href="#">Track Your Order</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Menu Area -->

        <!-- Mobile Menu -->
        <section class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <a href="#"><img src="{{ asset('frontend/images/logo.png') }}" alt=""></a>
                                <a href="#"><span>Sign In</span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">Home</a>
                                        <ul class="list-unstyled">
                                            <li><a href="index-2.html">Home Style 1</a></li>
                                            <li><a href="02-home-two.html">Home Style 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Pages</a>
                                        <ul class="list-unstyled">
                                            <li><a href="03-about-us.html">About Us</a></li>
                                            <li><a href="04-category.html">Category</a></li>
                                            <li><a href="05-single-product.html">Single Product</a></li>
                                            <li><a href="06-shopping-cart.html">Shopping Cart</a></li>
                                            <li><a href="07-checkout.html">Checkout</a></li>
                                            <li><a href="08-login.html">Log In</a></li>
                                            <li><a href="09-register.html">Register</a></li>
                                            <li><a href="10-wishlist.html">Wishlist</a></li>
                                            <li><a href="11-compare.html">Compare</a></li>
                                            <li><a href="15-track-order.html">Track Order</a></li>
                                            <li><a href="12-terms-condition.html">Terms & Condition</a></li>
                                            <li><a href="13-faq.html">Faq</a></li>
                                            <li><a href="14-404.html">404</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Blog</a>
                                        <ul class="list-unstyled">
                                            <li><a href="16-blog-one.html">Blog Style 1</a></li>
                                            <li><a href="17-blog-two.html">Blog Style 2</a></li>
                                            <li><a href="18-blog-three.html">Blog Style 3</a></li>
                                            <li><a href="19-blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="20-contact.html">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Mobile Menu -->

        {{ $slot }}

        <!-- Footer Area -->
        <section class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="f-contact">
                            <h5>Contact Info</h5>
                            <div class="f-add">
                                <i class="fa fa-map-marker"></i>
                                <span>Address :</span>
                                <p>{{ App\Models\SiteSetting::config()->address }}</p>
                            </div>
                            <div class="f-email">
                                <i class="fa fa-envelope"></i>
                                <span>Email :</span>
                                <p>{{ App\Models\SiteSetting::config()->email }}</p>
                            </div>
                            <div class="f-phn">
                                <i class="fa fa-phone"></i>
                                <span>Phone :</span>
                                <p>{{ App\Models\SiteSetting::config()->phone }}</p>
                            </div>
                            <div class="f-social">
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item"><a
                                            href="{{ App\Models\SiteSetting::config()->facebook }}"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a
                                            href="{{ App\Models\SiteSetting::config()->twitter }}"><i
                                                class="fa fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a
                                            href="{{ App\Models\SiteSetting::config()->linkedin }}"><i
                                                class="fa fa-linkedin"></i></a></li>
                                    <li class="list-inline-item"><a
                                            href="{{ App\Models\SiteSetting::config()->facebook }}"><i
                                                class="fa fa-google-plus"></i></a></li>
                                    <li class="list-inline-item"><a
                                            href="{{ App\Models\SiteSetting::config()->facebook }}"><i
                                                class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="f-cat">
                            <h5>Categories</h5>
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="fa fa-angle-right"></i>Clothing</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Electronics</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Smartphones & Tablets</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Computer & Office</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Home Appliances</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Leather & Shoes</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Kids & Babies</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="f-link">
                            <h5>Quick Links</h5>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('user.dashboard') }}"><i class="fa fa-angle-right"></i>My
                                        Account</a>
                                </li>
                                <li><a href="{{ route('cart') }}"><i class="fa fa-angle-right"></i>Shopping Cart</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>My Wishlist</a></li>
                                <li><a href="{{ route('checkout') }}"><i class="fa fa-angle-right"></i>Checkout</a></li>
                                <li><a href="{{ route('login') }}"><i class="fa fa-angle-right"></i>Order History</a>
                                </li>
                                <li><a href="{{ route('login') }}"><i class="fa fa-angle-right"></i>Log In</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Our Locations</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="f-sup">
                            <h5>Support</h5>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('contact') }}"><i class="fa fa-angle-right"></i>Contact Us</a></li>
                                <li><a href="{{ route('payment.policy') }}"><i class="fa fa-angle-right"></i>Payment
                                        Policy</a></li>
                                <li><a href="{{ route('return.policy') }}"><i class="fa fa-angle-right"></i>Return
                                        Policy</a></li>
                                <li><a href="{{ route('privacy.policy') }}"><i class="fa fa-angle-right"></i>Privacy
                                        Policy</a></li>
                                <li><a href="{{ route('contact') }}"><i class="fa fa-angle-right"></i>Frequently asked
                                        questions</a></li>
                                <li><a href="{{ route('terms.condition') }}"><i class="fa fa-angle-right"></i>Terms &
                                        Condition</a></li>
                                <li><a href="{{ route('delivery.info') }}"><i class="fa fa-angle-right"></i>Delivery
                                        Info</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="footer-btm">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>Copyright &copy; 2020 | All Rights Reserved By Leather Shob BD</p>
                        </p>
                    </div>
                    <div class="col-md-6 text-right">
                        <img src="{{ asset('frontend/images/payment.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="back-to-top text-center">
                <img src="{{ asset('frontend/images/backtotop.png') }}" alt="" class="img-fluid">
            </div>
        </section>
        <!-- End Footer Area -->


        <!-- =========================================
                                                                                                                                                                                                                    JavaScript Files
                                                                                                                                                                                                                    ========================================== -->

        <!-- jQuery JS -->
        <script src="{{ asset('frontend/js/assets/vendor/jquery-1.12.4.min.js') }}"></script>

        <!-- Bootstrap -->
        <script src="{{ asset('frontend/js/assets/popper.min.js') }}"></script>
        <script src="{{ asset('frontend/js/assets/bootstrap.min.js') }}"></script>

        <!-- Owl Slider -->
        <script src="{{ asset('frontend/js/assets/owl.carousel.min.js') }}"></script>

        <!-- Wow Animation -->
        <script src="{{ asset('frontend/js/assets/wow.min.js') }}"></script>

        <!-- Price Filter -->
        <script src="{{ asset('frontend/js/assets/price-filter.js') }}"></script>

        <!-- Mean Menu -->
        <script src="{{ asset('frontend/js/assets/jquery.meanmenu.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>
        <!-- Custom JS -->
        <script src="{{ asset('frontend/js/plugins.js') }}"></script>
        <script src="{{ asset('frontend/js/custom.js') }}"></script>
        @livewireScripts
        <script>
            //Toaster Message
            toastr.options = {
                "progressBar": true,
                "positionClass": "toast-top-right",
            }
            Livewire.on('msg', message => {
                toastr.success(message, 'Success');
            });
            Livewire.on('err-msg', message => {
                toastr.error(message, 'Error');
            });
        </script>
    </body>

    <!-- Mirrored from www.thetahmid.com/themes/xemart-v1.0/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Jul 2021 06:51:41 GMT -->

    </html>
