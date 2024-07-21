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
        $wishlistcount = App\Models\WishList::where('user_id', Auth::id())->count();
    }

    if (session::has('compare')) {
        $comparecount = count(Session::get('compare', []));
    } else {
        $comparecount = App\Models\CompareProduct::where('user_id', Auth::id())->count();
    }
    $categories        = App\Models\Category::where('is_deleted', '<>', 1)->where('is_active', '=', 1)->get();

@endphp



{{-- toster --}}



<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kriztle</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/1690196928294.png">

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

<style>
    element.style {
        color: #006677;

    }

</style>


<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->

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
                        {{-- <img src="assets/img/logo/preloader/preloader-icon.svg" alt=""> --}}

                        <img src="assets/img/logo/preloader/1690196928294.png" alt="" width="135px"
                            height="60px">
                    </div>
                    <h3 class="tp-preloader-title">Kriztle</h3>
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
    <div class="offcanvas__area">
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
                            <img src="{{asset('backend/assets/img/brand/1690196928294.png')}}" width="135px" height="60px" alt="logo">
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



            </div>

        </div>
    </div>
    <div class="body-overlay"></div>
    <!-- offcanvas area end -->

    <!-- mobile menu area start -->
    <div id="tp-bottom-menu-sticky" class="tp-mobile-menu d-lg-none">
        <div class="container">
            <div class="row row-cols-5">
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <a href="shop.html" class="tp-mobile-item-btn">
                            <i class="flaticon-store"></i>
                            <span>Store</span>
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
                        <a href="wishlist.html" class="tp-mobile-item-btn">
                            <i class="flaticon-love"></i>
                            <span>Wishlist</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="tp-mobile-item text-center">
                        <a href="profile.html" class="tp-mobile-item-btn">
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
    </div>
    <!-- mobile menu area end -->

    <!-- search area start -->
    <section class="tp-search-area">
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
                                <a href="shop.html#">Men, </a>
                                <a href="shop.html#">Women, </a>
                                <a href="shop.html#">Children, </a>
                                <a href="shop.html#">Shirt, </a>
                                <a href="shop.html#">Demin</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- search area end -->

    <!-- cart mini area start -->

    @include('frontend.templates.mini_cart')

    <!-- cart mini area end -->

    <!-- header area start -->
    <header>
        <div class="tp-header-area tp-header-style-primary tp-header-height">
            <!-- header top start  -->
            <div class="tp-header-top-2 p-relative z-index-11 tp-header-top-border d-none d-md-block">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="tp-header-info d-flex align-items-center">
                                <div class="tp-header-info-item">
                                    <a href="shop.html#">
                                        <span>
                                            <svg width="8" height="15" viewBox="0 0 8 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8 0H5.81818C4.85376 0 3.92883 0.383116 3.24688 1.06507C2.56493 1.74702 2.18182 2.67194 2.18182 3.63636V5.81818H0V8.72727H2.18182V14.5455H5.09091V8.72727H7.27273L8 5.81818H5.09091V3.63636C5.09091 3.44348 5.16753 3.25849 5.30392 3.1221C5.44031 2.98571 5.6253 2.90909 5.81818 2.90909H8V0Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <div class="tp-header-info-item">
                                    <a href="tel:+919961492022">
                                        <span>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.359 2.73916C1.59079 2.35465 2.86862 0.958795 3.7792 1.00093C4.05162 1.02426 4.29244 1.1883 4.4881 1.37943H4.48885C4.93737 1.81888 6.22423 3.47735 6.29648 3.8265C6.47483 4.68282 5.45362 5.17645 5.76593 6.03954C6.56213 7.98771 7.93402 9.35948 9.88313 10.1549C10.7455 10.4679 11.2392 9.44752 12.0956 9.62511C12.4448 9.6981 14.1042 10.9841 14.5429 11.4333V11.4333C14.7333 11.6282 14.8989 11.8698 14.9214 12.1422C14.9553 13.1016 13.4728 14.3966 13.1838 14.5621C12.502 15.0505 11.6125 15.0415 10.5281 14.5373C7.50206 13.2784 2.66618 8.53401 1.38384 5.39391C0.893174 4.31561 0.860062 3.42016 1.359 2.73916Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M9.84082 1.18318C12.5534 1.48434 14.6952 3.62393 15 6.3358"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M9.84082 3.77927C11.1378 4.03207 12.1511 5.04544 12.4039 6.34239"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </span> +919961492022,
                                    </a>
                                </div>
                            </div>
                        </div>

                        @auth

                            <div class="col-md-6">
                                <div
                                    class="tp-header-top-right tp-header-top-black d-flex align-items-center justify-content-end">
                                    <div class="tp-header-top-menu d-flex align-items-center justify-content-end">

                                        <div class="tp-header-top-menu-item tp-header-setting">
                                            <span class="tp-header-setting-toggle"
                                                id="tp-header-setting-toggle">{{ Auth::user()->name }}</span>
                                            <ul>
                                                <li>
                                                    <a href="profile.html">My Profile</a>
                                                </li>

                                                <li>
                                                    <a href="{{ route('logout') }}">Logout</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-md-6">
                                <div
                                    class="tp-header-top-right tp-header-top-black d-flex align-items-center justify-content-end">
                                    <div class="tp-header-top-menu d-flex align-items-center justify-content-end">

                                        <div class="tp-header-top tp-header-setting">
                                            <span><a href="{{ route('login') }}" style="font-family: var(--tp-ff-body);">
                                                    Guest </a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endauth


                    </div>
                </div>
            </div>
            @php
                $clearance_count = App\Models\VariantOptions::where('is_deleted', '<>', '1')
                    ->where('clearance_sale', '=', 1)
                    ->count('variant_options.id');
            @endphp
            <!-- header bottom start -->
            <div id="header-sticky" class="tp-header-bottom-2 tp-header-sticky">
                <div class="container">
                    <div class="tp-mega-menu-wrapper p-relative">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-5 col-md-5 col-sm-4 col-6">
                                <div class="logo">
                                    <a href="">
                                        <img class="logo-light" src="assets/img/logo/1690196928294.png"
                                            alt="logo" width="135px" height="60px">

                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-5 d-none d-xl-block">
                                <div class="main-menu menu-style-2">
                                    <nav class="tp-main-menu-content">
                                        <ul>
                                            <li><a href="{{ route('frontend.home') }}">Home</a></li>

                                            <li><a href="{{ route('frontend.shop') }}">Shop</a></li>

                                            @if ($clearance_count != 0)
                                                <li><a href="{{ route('clearance') }}">Clearance</a></li>
                                            @endif

                                            {{-- <li class="has-dropdown has-mega-menu ">

                                                <a href="">Products</a> --}}
                                            {{-- <ul class="tp-submenu tp-mega-menu mega-menu-style-2">
                                                    <!-- first col -->
                                                    <li class="has-dropdown">
                                                        <a href="shop.html" class="mega-menu-title">Shop Page</a>
                                                        <ul class="tp-submenu">
                                                            <li><a href="shop-category.html">Only Categories</a></li>
                                                            <li><a href="shop-filter-offcanvas.html">Shop Grid</a></li>
                                                            <li><a href="shop.html">Shop Grid with Sideber</a></li>
                                                            <li><a href="shop-list.html">Shop List</a></li>
                                                            <li><a href="shop-category.html">Categories</a></li>
                                                            <li><a href="product-details.html">Product Details</a></li>
                                                            <li><a href="product-details-progress.html">Product Details
                                                                    Progress</a></li>
                                                        </ul>
                                                    </li>
                                                    <!-- third col -->
                                                    <li class="has-dropdown">
                                                        <a href=""
                                                            class="mega-menu-title">Products</a>
                                                        <ul class="tp-submenu">

                                                            <li><a href="product-details.html">Product Simple</a></li>
                                                            <li><a href="product-details-video.html">With Video</a>
                                                            </li>
                                                            <li><a href="product-details-countdown.html">With Countdown
                                                                    Timer</a></li>
                                                            <li><a href="product-details-presentation.html">Product
                                                                    Presentation</a></li>
                                                            <li><a href="product-details-swatches.html">Variations
                                                                    Swatches</a></li>
                                                            <li><a href="product-details-list.html">List View</a></li>
                                                            <li><a href="product-details-gallery.html">Details
                                                                    Gallery</a></li>
                                                            <li><a href="product-details-slider.html">With Slider</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- third col -->
                                                    <li class="has-dropdown">
                                                        <a href="shop.html" class="mega-menu-title">eCommerce</a>
                                                        <ul class="tp-submenu">
                                                            <li><a href="cart.html">Shopping Cart</a></li>
                                                            <li><a href="order.html">Track Your Order</a></li>
                                                            <li><a href="compare.html">Compare</a></li>
                                                            <li><a href="wishlist.html">Wishlist</a></li>
                                                            <li><a href="checkout.html">Checkout</a></li>
                                                            <li><a href="profile.html">My account</a></li>
                                                        </ul>
                                                    </li>

                                                    <!-- second col -->
                                                    <li class="has-dropdown">
                                                        <a href="shop.html" class="mega-menu-title">More Pages</a>
                                                        <ul class="tp-submenu">


                                                            <li><a href="about.html">About</a></li>
                                                            <li><a href="login.html">Login</a></li>
                                                            <li><a href="register.html">Register</a></li>
                                                            <li><a href="forgot.html">Forgot Password</a></li>
                                                            <li><a href="404.html">404 Error</a></li>
                                                        </ul>
                                                    </li>

                                                </ul> --}}
                                            {{-- </li> --}}
                                            {{-- <li><a href="">Coupons</a></li> --}}
                                            {{-- <li class="has-dropdown">
                                                <a href="blog.html">Blog</a>
                                                <ul class="tp-submenu">
                                                    <li><a href="blog.html">Blog Standard</a></li>
                                                    <li><a href="blog-grid.html">Blog Grid</a></li>
                                                    <li><a href="blog-list.html">Blog List</a></li>
                                                    <li><a href="blog-details-2.html">Blog Details Full Width</a></li>
                                                    <li><a href="blog-details.html">Blog Details</a></li>
                                                </ul>
                                            </li> --}}
                                            <li><a href="{{ route('coupons') }}">Coupons</a></li>

                                            <li><a href="{{ route('aboutus') }}">About Us</a></li>


                                            <li><a href="{{ route('contact') }}">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="tp-category-menu-wrapper d-none">
                                    <nav class="tp-category-menu-content">
                                        <ul>
                                            @foreach ($categories as $item)
                                                <li>
                                                    <a href="{{ route('frontend.shop', ['id' => $item['id']]) }}">

                                                        {{$item->category_name}}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-7 col-md-7 col-sm-8 col-6">
                                <div
                                    class="tp-header-bottom-right d-flex align-items-center justify-content-end pl-30">
                                    <div class="tp-header-search-2 d-none d-sm-block">
                                        <form action="{{ route('frontend.shop') }}">
                                            <input  name="query" type="text" placeholder="Search for Products...">
                                            <button type="submit">
                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M18.9999 19L14.6499 14.65" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>

                                    {{-- compare --}}
                                    @if ($comparecount != 0)
                                        <div class="tp-header-action d-flex align-items-center ml-30">
                                            <div class="tp-header-action-item d-none d-lg-block">
                                                <a href="{{ route('compare') }}" class="tp-header-action-btn">
                                                    <svg width="20" height="19" viewBox="0 0 20 19"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M14.8396 17.3319V3.71411" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M19.1556 13L15.0778 17.0967L11 13"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M4.91115 1.00056V14.6183" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M0.833496 5.09667L4.91127 1L8.98905 5.09667"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>

                                                    <span class="tp-header-action-badge"> {{ $comparecount }} </span>

                                                </a>
                                            </div>
                                    @endif

                                    {{-- wishlist --}}
                                    @if ($wishlistcount != 0)
                                        <div class="tp-header-action-item d-none d-lg-block">
                                            <a href="{{ route('wishlist') }}" class="tp-header-action-btn">
                                                <svg width="22" height="20" viewBox="0 0 22 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11.239 18.8538C13.4096 17.5179 15.4289 15.9456 17.2607 14.1652C18.5486 12.8829 19.529 11.3198 20.1269 9.59539C21.2029 6.25031 19.9461 2.42083 16.4289 1.28752C14.5804 0.692435 12.5616 1.03255 11.0039 2.20148C9.44567 1.03398 7.42754 0.693978 5.57894 1.28752C2.06175 2.42083 0.795919 6.25031 1.87187 9.59539C2.46978 11.3198 3.45021 12.8829 4.73806 14.1652C6.56988 15.9456 8.58917 17.5179 10.7598 18.8538L10.9949 19L11.239 18.8538Z"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M7.26062 5.05302C6.19531 5.39332 5.43839 6.34973 5.3438 7.47501"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>

                                                <span class="tp-header-action-badge"> {{ $wishlistcount }} </span>

                                            </a>
                                        </div>
                                    @endif

                                    {{-- cart --}}
                                    @if ($cartcount != 0)
                                        <div class="tp-header-action-item">
                                            <button class="tp-header-action-btn cartmini-open-btn">
                                                <svg width="21" height="22" viewBox="0 0 21 22"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M6.48626 20.5H14.8341C17.9004 20.5 20.2528 19.3924 19.5847 14.9348L18.8066 8.89359C18.3947 6.66934 16.976 5.81808 15.7311 5.81808H5.55262C4.28946 5.81808 2.95308 6.73341 2.4771 8.89359L1.69907 14.9348C1.13157 18.889 3.4199 20.5 6.48626 20.5Z"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M6.34902 5.5984C6.34902 3.21232 8.28331 1.27803 10.6694 1.27803V1.27803C11.8184 1.27316 12.922 1.72619 13.7362 2.53695C14.5504 3.3477 15.0081 4.44939 15.0081 5.5984V5.5984"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
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

                                    <div class="tp-header-action-item tp-header-hamburger mr-20 d-xl-none">
                                        <button type="button" class="tp-offcanvas-open-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16"
                                                viewBox="0 0 30 16">
                                                <rect x="10" width="20" height="2"
                                                    fill="currentColor" />
                                                <rect x="5" y="7" width="25" height="2"
                                                    fill="currentColor" />
                                                <rect x="10" y="14" width="20" height="2"
                                                    fill="currentColor" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>
    <!-- header area end -->

    <!-- filter offcanvas area start -->
    <div class="tp-filter-offcanvas-area">
        <div class="tp-filter-offcanvas-wrapper">
            <div class="tp-filter-offcanvas-close">
                <button type="button" class="tp-filter-offcanvas-close-btn filter-close-btn">
                    <i class="fa-solid fa-xmark"></i>
                    Close
                </button>
            </div>
            <div class="tp-shop-sidebar">
                <!-- filter -->
                <div class="tp-shop-widget mb-35">
                    <h3 class="tp-shop-widget-title no-border">Price Filter</h3>

                    <div class="tp-shop-widget-content">
                        <div class="tp-shop-widget-filter">
                            <div id="slider-range-offcanvas" class="mb-10"></div>
                            <div class="tp-shop-widget-filter-info d-flex align-items-center justify-content-between">
                                <span class="input-range">
                                    <input type="text" id="amount-offcanvas" readonly>
                                </span>
                                <button class="tp-shop-widget-filter-btn" type="button">Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- status -->
                <div class="tp-shop-widget mb-50">
                    <h3 class="tp-shop-widget-title">Product Status</h3>

                    <div class="tp-shop-widget-content">
                        <div class="tp-shop-widget-checkbox">
                            <ul class="filter-items filter-checkbox">
                                <li class="filter-item checkbox">
                                    <input id="on_sale2" type="checkbox">
                                    <label for="on_sale2">On sale</label>
                                </li>
                                <li class="filter-item checkbox">
                                    <input id="in_stock2" type="checkbox">
                                    <label for="in_stock2">In Stock</label>
                                </li>
                            </ul><!-- .filter-items -->
                        </div>
                    </div>
                </div>
                <!-- categories -->
                <div class="tp-shop-widget mb-50">
                    <h3 class="tp-shop-widget-title">Categories</h3>

                    <div class="tp-shop-widget-content">
                        <div class="tp-shop-widget-categories">
                            <ul>
                                <li><a href="shop.html#">Leather <span>10</span></a></li>
                                <li><a href="shop.html#">Classic Watch <span>18</span></a></li>
                                <li><a href="shop.html#">Leather Man Wacth <span>22</span></a></li>
                                <li><a href="shop.html#">Trending Watch <span>17</span></a></li>
                                <li><a href="shop.html#">Google <span>22</span></a></li>
                                <li><a href="shop.html#">Woman Wacth <span>14</span></a></li>
                                <li><a href="shop.html#">Tables <span>19</span></a></li>
                                <li><a href="shop.html#">Electronics <span>29</span></a></li>
                                <li><a href="shop.html#">Phones <span>05</span></a></li>
                                <li><a href="shop.html#">Grocery <span>14</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- color -->
                <div class="tp-shop-widget mb-50">
                    <h3 class="tp-shop-widget-title">Filter by Color</h3>

                    <div class="tp-shop-widget-content">
                        <div class="tp-shop-widget-checkbox-circle-list">
                            <ul>
                                <li>
                                    <div class="tp-shop-widget-checkbox-circle">
                                        <input type="checkbox" id="red2">
                                        <label for="red2">Red</label>
                                        <span data-bg-color="#FF401F"
                                            class="tp-shop-widget-checkbox-circle-self"></span>
                                    </div>
                                    <span class="tp-shop-widget-checkbox-circle-number">8</span>
                                </li>
                                <li>
                                    <div class="tp-shop-widget-checkbox-circle">
                                        <input type="checkbox" id="dark_blue2">
                                        <label for="dark_blue2">Dark Blue</label>
                                        <span data-bg-color="#4666FF"
                                            class="tp-shop-widget-checkbox-circle-self"></span>
                                    </div>
                                    <span class="tp-shop-widget-checkbox-circle-number">14</span>
                                </li>
                                <li>
                                    <div class="tp-shop-widget-checkbox-circle">
                                        <input type="checkbox" id="oragnge2">
                                        <label for="oragnge2">Orange</label>
                                        <span data-bg-color="#FF9E2C"
                                            class="tp-shop-widget-checkbox-circle-self"></span>
                                    </div>
                                    <span class="tp-shop-widget-checkbox-circle-number">18</span>
                                </li>
                                <li>
                                    <div class="tp-shop-widget-checkbox-circle">
                                        <input type="checkbox" id="purple2">
                                        <label for="purple2">Purple</label>
                                        <span data-bg-color="#B615FD"
                                            class="tp-shop-widget-checkbox-circle-self"></span>
                                    </div>
                                    <span class="tp-shop-widget-checkbox-circle-number">23</span>
                                </li>
                                <li>
                                    <div class="tp-shop-widget-checkbox-circle">
                                        <input type="checkbox" id="yellow2">
                                        <label for="yellow2">Yellow</label>
                                        <span data-bg-color="#FFD747"
                                            class="tp-shop-widget-checkbox-circle-self"></span>
                                    </div>
                                    <span class="tp-shop-widget-checkbox-circle-number">17</span>
                                </li>
                                <li>
                                    <div class="tp-shop-widget-checkbox-circle">
                                        <input type="checkbox" id="green2">
                                        <label for="green2">Green</label>
                                        <span data-bg-color="#41CF0F"
                                            class="tp-shop-widget-checkbox-circle-self"></span>
                                    </div>
                                    <span class="tp-shop-widget-checkbox-circle-number">15</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- product rating -->
                <div class="tp-shop-widget mb-50">
                    <h3 class="tp-shop-widget-title">Top Rated Products</h3>

                    <div class="tp-shop-widget-content">
                        <div class="tp-shop-widget-product">
                            <div class="tp-shop-widget-product-item d-flex align-items-center">
                                <div class="tp-shop-widget-product-thumb">
                                    <a href="product-details.html">
                                        <img src="assets/img/product/shop/sm/shop-sm-1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="tp-shop-widget-product-content">
                                    <div class="tp-shop-widget-product-rating-wrapper d-flex align-items-center">
                                        <div class="tp-shop-widget-product-rating">
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="tp-shop-widget-product-rating-number">
                                            <span>(4.2)</span>
                                        </div>
                                    </div>
                                    <h4 class="tp-shop-widget-product-title">
                                        <a href="product-details.html">Smart watches wood...</a>
                                    </h4>
                                    <div class="tp-shop-widget-product-price-wrapper">
                                        <span class="tp-shop-widget-product-price">$150.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="tp-shop-widget-product-item d-flex align-items-center">
                                <div class="tp-shop-widget-product-thumb">
                                    <a href="product-details.html">
                                        <img src="assets/img/product/shop/sm/shop-sm-2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="tp-shop-widget-product-content">
                                    <div class="tp-shop-widget-product-rating-wrapper d-flex align-items-center">
                                        <div class="tp-shop-widget-product-rating">
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="tp-shop-widget-product-rating-number">
                                            <span>(4.5)</span>
                                        </div>
                                    </div>
                                    <h4 class="tp-shop-widget-product-title">
                                        <a href="product-details.html">Decoration for panda.</a>
                                    </h4>
                                    <div class="tp-shop-widget-product-price-wrapper">
                                        <span class="tp-shop-widget-product-price">$120.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="tp-shop-widget-product-item d-flex align-items-center">
                                <div class="tp-shop-widget-product-thumb">
                                    <a href="product-details.html">
                                        <img src="assets/img/product/shop/sm/shop-sm-3.jpg" alt="">
                                    </a>
                                </div>
                                <div class="tp-shop-widget-product-content">
                                    <div class="tp-shop-widget-product-rating-wrapper d-flex align-items-center">
                                        <div class="tp-shop-widget-product-rating">
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="tp-shop-widget-product-rating-number">
                                            <span>(3.5)</span>
                                        </div>
                                    </div>
                                    <h4 class="tp-shop-widget-product-title">
                                        <a href="product-details.html">Trending Watch for Man</a>
                                    </h4>
                                    <div class="tp-shop-widget-product-price-wrapper">
                                        <span class="tp-shop-widget-product-price">$99.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="tp-shop-widget-product-item d-flex align-items-center">
                                <div class="tp-shop-widget-product-thumb">
                                    <a href="product-details.html">
                                        <img src="assets/img/product/shop/sm/shop-sm-4.jpg" alt="">
                                    </a>
                                </div>
                                <div class="tp-shop-widget-product-content">
                                    <div class="tp-shop-widget-product-rating-wrapper d-flex align-items-center">
                                        <div class="tp-shop-widget-product-rating">
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <span>
                                                <svg width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 0L7.854 3.756L12 4.362L9 7.284L9.708 11.412L6 9.462L2.292 11.412L3 7.284L0 4.362L4.146 3.756L6 0Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="tp-shop-widget-product-rating-number">
                                            <span>(4.8)</span>
                                        </div>
                                    </div>
                                    <h4 class="tp-shop-widget-product-title">
                                        <a href="product-details.html">Minimal Backpack.</a>
                                    </h4>
                                    <div class="tp-shop-widget-product-price-wrapper">
                                        <span class="tp-shop-widget-product-price">$165.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- brand -->
                <div class="tp-shop-widget mb-50">
                    <h3 class="tp-shop-widget-title">Popular Brands</h3>

                    <div class="tp-shop-widget-content ">
                        <div
                            class="tp-shop-widget-brand-list d-flex align-items-center justify-content-between flex-wrap">
                            <div class="tp-shop-widget-brand-item">
                                <a href="shop.html#">
                                    <img src="assets/img/product/shop/brand/logo_01.png" alt="">
                                </a>
                            </div>
                            <div class="tp-shop-widget-brand-item">
                                <a href="shop.html#">
                                    <img src="assets/img/product/shop/brand/logo_02.png" alt="">
                                </a>
                            </div>
                            <div class="tp-shop-widget-brand-item">
                                <a href="shop.html#">
                                    <img src="assets/img/product/shop/brand/logo_03.png" alt="">
                                </a>
                            </div>
                            <div class="tp-shop-widget-brand-item">
                                <a href="shop.html#">
                                    <img src="assets/img/product/shop/brand/logo_04.png" alt="">
                                </a>
                            </div>
                            <div class="tp-shop-widget-brand-item">
                                <a href="shop.html#">
                                    <img src="assets/img/product/shop/brand/logo_05.png" alt="">
                                </a>
                            </div>
                            <div class="tp-shop-widget-brand-item">
                                <a href="shop.html#">
                                    <img src="assets/img/product/shop/brand/logo_06.png" alt="">
                                </a>
                            </div>
                            <div class="tp-shop-widget-brand-item">
                                <a href="shop.html#">
                                    <img src="assets/img/product/shop/brand/logo_07.png" alt="">
                                </a>
                            </div>
                            <div class="tp-shop-widget-brand-item">
                                <a href="shop.html#">
                                    <img src="assets/img/product/shop/brand/logo_08.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- filter offcanvas area end -->


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
