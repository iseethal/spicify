<?php
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
?>

@php
    if (session::has('cart')) {
        $cartcount = count(Session::get('cart', []));
    } else {
        $cartcount = Cart::where('user_id', Auth::id())->count();
    }

    if (session::has('wishlist')) {
        $wishlistcount = count(Session::get('wishlist', []));
    } else {
        $wishlistcount = Cart::where('user_id', Auth::id())->count();
    }

    $categories = App\Models\Category::where('is_deleted', '<>', 1)->where('is_active', '=', 1)->get();
@endphp

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Spiciffy</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/preloader/logo.png">


    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/font-awesome-pro.css">
    <link rel="stylesheet" href="assets/css/flaticon_shofy.css">
    <link rel="stylesheet" href="assets/css/spacing.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>



<body>

    <!-- pre loader area start -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <!-- loading content here -->
                <div class="tp-preloader-content">
                    <div class="tp-preloader-logo">
                        <div class="tp-preloader-circle">
                            <svg width="190" height="190" viewBox="0 0 380 380" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle stroke="#D9D9D9" cx="190" cy="190" r="180" stroke-width="6"
                                    stroke-linecap="round"></circle>
                                <circle stroke="red" cx="190" cy="190" r="180" stroke-width="6"
                                    stroke-linecap="round"></circle>
                            </svg>
                        </div>
                        <img src="assets/img/logo/preloader/logo.png" alt="" width="135px"
                            height="90px">
                    </div>
                    <h3 class="tp-preloader-title">Spiciffy</h3>
                    <p class="tp-preloader-subtitle">Loading</p>
                </div>
            </div>
        </div>
    </div>
    <!-- pre loader area end -->

    <!-- back to top start -->
    <div class="back-to-top-wrapper">
        <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <!-- back to top end -->

    <!-- offcanvas area start -->
    <div class="offcanvas__area offcanvas__style-brown">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__close">
                <button class="offcanvas__close-btn offcanvas-close-btn">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-70 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo logo">
                        <a href="">
                            <img src="{{asset('assets/img/logo/preloader/logo.png')}}" width="135px" height="80px" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="offcanvas__category pb-40">
                    <button class="tp-offcanvas-category-toggle">
                        <i class="fa-solid fa-bars"></i>
                        All Categories
                    </button>
                    <div class="tp-category-mobile-menu">

                    </div>
                </div>
                <div class="tp-main-menu-mobile fix mb-40"></div>

                <div class="offcanvas__contact align-items-center d-none">
                    <div class="offcanvas__contact-icon mr-20">
                        <span>
                            <img src="assets/img/icon/contact.png" alt="">
                        </span>
                    </div>
                    <div class="offcanvas__contact-content">
                        <h3 class="offcanvas__contact-title">
                            <!-- <a href="tel:098-852-987">004524865</a> -->
                            <a href="tel:9538098111">+91 9538098111</a>
                        </h3>
                    </div>
                </div>
                <div class="offcanvas__btn">
                    <a href="contact.html" class="tp-btn-2 tp-btn-border-2">Contact Us</a>
                </div>
            </div>
            <!-- <div class="offcanvas__bottom">
                <div class="offcanvas__footer d-flex align-items-center justify-content-between">
                    <div class="offcanvas__currency-wrapper currency">
                        <span class="offcanvas__currency-selected-currency tp-currency-toggle"
                            id="tp-offcanvas-currency-toggle">Currency : USD</span>
                        <ul class="offcanvas__currency-list tp-currency-list">
                            <li>USD</li>
                            <li>ERU</li>
                            <li>BDT </li>
                            <li>INR</li>
                        </ul>
                    </div>
                    <div class="offcanvas__select language">
                        <div class="offcanvas__lang d-flex align-items-center justify-content-md-end">
                            <div class="offcanvas__lang-img mr-15">
                                <img src="assets/img/icon/language-flag.png" alt="">
                            </div>
                            <div class="offcanvas__lang-wrapper">
                                <span class="offcanvas__lang-selected-lang tp-lang-toggle"
                                    id="tp-offcanvas-lang-toggle">English</span>
                                <ul class="offcanvas__lang-list tp-lang-list">
                                    <li>Spanish</li>
                                    <li>Portugese</li>
                                    <li>American</li>
                                    <li>Canada</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <div class="body-overlay"></div>
    <!-- offcanvas area end -->

    <!-- mobile menu area start -->
    <!-- <div id="tp-bottom-menu-sticky" class="tp-mobile-menu d-lg-none">
        <div class="container">
            <div class="row row-cols-5">
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <a href="{{ route('frontend.home') }}" class="tp-mobile-item-btn">
                            <i class="flaticon-store"></i>
                            <span>Home</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <button class="tp-mobile-item-btn tp-search-open-btn">
                            <i class="flaticon-search-1"></i>
                            <span>Search</span>
                        </button>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <a href="{{ route('wishlist') }}" class="tp-mobile-item-btn">
                            <i class="flaticon-love"></i>
                            <span>Wishlist</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <a href="{{ route('login') }}" class="tp-mobile-item-btn">
                            <i class="flaticon-user"></i>
                            <span>Account</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <button class="tp-mobile-item-btn tp-offcanvas-open-btn">
                            <i class="flaticon-menu-1"></i>
                            <span>Menu</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- mobile menu area end -->

    <!-- search area start -->
    <!-- <section class="tp-search-area tp-search-style-brown">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-search-form">
                        <div class="tp-search-close text-center mb-20">
                            <button class="tp-search-close-btn tp-search-close-btn"></button>
                        </div>
                        <form action="#">
                            <div class="tp-search-input mb-10">
                                <input type="text" placeholder="Search for product...">
                                <button type="submit"><i class="flaticon-search-1"></i></button>
                            </div>
                            <div class="tp-search-category">
                                <span>Search by : </span>
                                <a href="index-4.html#">Men, </a>
                                <a href="index-4.html#">Women, </a>
                                <a href="index-4.html#">Children, </a>
                                <a href="index-4.html#">Shirt, </a>
                                <a href="index-4.html#">Demin</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- search area end -->

    <!-- cart mini area start -->

    @include('frontend.templates.mini_cart')


    <!-- header area start -->
    <header>
        <div id="header-sticky"
            class="tp-header-area tp-header-style-transparent-white tp-header-sticky tp-header-transparent has-dark-logo tp-header-height">


            <div class="tp-header-bottom-3 pl-85 pr-85">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2 col-6">
                            <div class="logo">
                                <a href="">
                                    <img class="logo-light" src="assets/img/logo/preloader/logo.png" alt="logo"
                                        width="110px" height="80px">
                                    <img class="logo-dark" src="assets/img/logo/preloader/logo.png" alt="logo"
                                        width="100px" height="70px">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 d-none d-lg-block">
                            <div class="main-menu menu-style-3 menu-style-4 p-relative">
                                <nav class="tp-main-menu-content">
                                    <ul>
                                        <li><a href="{{ route('frontend.home') }}">Home</a></li>
                                        <li><a href="{{ route('frontend.shop') }}">Shop</a></li>
                                        <li><a href="{{ route('aboutus') }}">About Us</a></li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                        {{-- <li><a href="shop-category.html">Categories</a></li> --}}
                                    </ul>
                                </nav>
                            </div>
                            <div class="tp-category-menu-wrapper d-none">
                            <nav class="tp-category-menu-content">
                            <ul>
                                @foreach ($categories as $item)
                                    <li>
                                        <a href="{{ route('frontend.shop', ['id' => $item['id']]) }}">{{$item->category_name}}</a>
                                    </li>
                                @endforeach

                            </ul>
                           </nav>
                        </div>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-6">
                            <div class="tp-header-action d-flex align-items-center justify-content-end ml-50">
                                <div class="tp-header-action d-flex align-items-center ml-30">


                                @if ($wishlistcount != 0)

                                    <div class="tp-header-action-item d-none d-sm-block">
                                        <a href="{{ route('wishlist') }}" class="tp-header-action-btn">
                                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.239 18.8538C13.4096 17.5179 15.4289 15.9456 17.2607 14.1652C18.5486 12.8829 19.529 11.3198 20.1269 9.59539C21.2029 6.25031 19.9461 2.42083 16.4289 1.28752C14.5804 0.692435 12.5616 1.03255 11.0039 2.20148C9.44567 1.03398 7.42754 0.693978 5.57894 1.28752C2.06175 2.42083 0.795919 6.25031 1.87187 9.59539C2.46978 11.3198 3.45021 12.8829 4.73806 14.1652C6.56988 15.9456 8.58917 17.5179 10.7598 18.8538L10.9949 19L11.239 18.8538Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M7.26062 5.05302C6.19531 5.39332 5.43839 6.34973 5.3438 7.47501"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            <span class="tp-header-action-badge"> {{ $wishlistcount }} </span>
                                        </a>
                                    </div>

                                @endif

                                @if ($cartcount > 0)
                                    <div class="tp-header-action-item d-none d-sm-block">
                                        <button type="button" class="tp-header-action-btn cartmini-open-btn">
                                            <svg width="21" height="22" viewBox="0 0 21 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M6.48626 20.5H14.8341C17.9004 20.5 20.2528 19.3924 19.5847 14.9348L18.8066 8.89359C18.3947 6.66934 16.976 5.81808 15.7311 5.81808H5.55262C4.28946 5.81808 2.95308 6.73341 2.4771 8.89359L1.69907 14.9348C1.13157 18.889 3.4199 20.5 6.48626 20.5Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M6.34902 5.5984C6.34902 3.21232 8.28331 1.27803 10.6694 1.27803V1.27803C11.8184 1.27316 12.922 1.72619 13.7362 2.53695C14.5504 3.3477 15.0081 4.44939 15.0081 5.5984V5.5984"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M7.70365 10.1018H7.74942" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M13.5343 10.1018H13.5801" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                            <span class="tp-header-action-badge"> {{ $cartcount }} </span>
                                        </button>
                                    </div>
                                @endif

                                @auth

                                    <div class="dropdown" style=" background-color:none !important; border-color: none !important;">
                                        {{-- <button class=" dropdown-toggle" type="button" data-toggle="dropdown"
                                            style="color:white;padding-left:17px;">{{ Auth::user()->name }}
                                            <span></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('Logout') }}">Logout</a></li>
                                        </ul> --}}

                                        <a href="{{ route('Logout') }}" style="color:white;padding-left:17px; font-family: var(--tp-ff-body);">Logout</a>
                                    </div>
                                @else
                                    <a href="{{ route('login') }}" style="color:white;padding-left:17px; font-family: var(--tp-ff-body);">Login</a>
                                @endauth

                                <div class="tp-header-action-item d-lg-none">
                                    <button type="button" class="tp-offcanvas-open-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16"
                                            viewBox="0 0 30 16">
                                            <rect x="10" width="20" height="2" fill="currentColor" />
                                            <rect x="5" y="7" width="25" height="2" fill="currentColor" />
                                            <rect x="10" y="14" width="20" height="2" fill="currentColor" />
                                        </svg>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->

    <!-- JS here -->
    <script src="assets/js/vendor/jquery.js"></script>
    <script src="assets/js/vendor/waypoints.js"></script>
    <script src="assets/js/bootstrap-bundle.js"></script>
    <script src="assets/js/meanmenu.js"></script>
    <script src="assets/js/swiper-bundle.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/range-slider.js"></script>
    <script src="assets/js/magnific-popup.js"></script>
    <script src="assets/js/nice-select.js"></script>
    <script src="assets/js/purecounter.js"></script>
    <script src="assets/js/countdown.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/isotope-pkgd.js"></script>
    <script src="assets/js/imagesloaded-pkgd.js"></script>
    <script src="assets/js/ajax-form.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
