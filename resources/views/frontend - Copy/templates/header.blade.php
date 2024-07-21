<?php
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

?>

@php
    if (session::has('cart')) {
        $cartcount = count(Session::get('cart', []));
    } else {
        $cartcount = Cart::where('buy_now', 0)->where('user_id', Auth::id())->count();
    }

    if (session::has('wishlist')) {
        $wishlistcount = count(Session::get('wishlist', []));
    } else {
        $wishlistcount = App\Models\WishList::where('user_id', Auth::id())->count();
    }

    $categories        = App\Models\Category::where('is_deleted', '<>', 1)->where('is_active', '=', 1)->get();

@endphp



{{-- toster --}}

<!doctype html>
<html class="no-js" lang="zxx">

<head>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include Select2 CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


</head>

<style>
element.style {
    color: #006677;

}
</style>

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

                        <img src="assets/img/logo/preloader/logo.png" alt=""  width="130px" height="140px">
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
                            <img src="{{asset('assets/img/logo/preloader/logo.png')}}"  width="110px" height="80px" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="tp-main-menu-mobile fix mb-40"></div>
            </div>

        </div>
    </div>
    <div class="body-overlay"></div>
    <!-- offcanvas area end -->

    @include('frontend.templates.mini_cart')

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
                                    <a href="https://www.facebook.com/profile.php?id=61551929348458" target="_blank">
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
                                    <a href="tel:+919538098111">
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
                                        </span> 9090 29 9494
                                    </a>
                                </div>
                            </div>
                        </div>


                        @auth

                        {{-- <div class="col-md-6">
                            <div
                                class="tp-header-top-right tp-header-top-black d-flex align-items-center justify-content-end">
                                <div class="tp-header-top-menu d-flex align-items-center justify-content-end">

                                    <div class="tp-header-top-menu-item tp-header-setting">
                                        <span class="tp-header-setting-toggle"
                                            id="tp-header-setting-toggle">{{ Auth::user()->name }}</span>
                                        <ul>

                                            <li>
                                                <a href="{{ route('logout') }}">Logout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-md-6">
                            <div
                                class="tp-header-top-right tp-header-top-black d-flex align-items-center justify-content-end">
                                <div class="tp-header-top-menu d-flex align-items-center justify-content-end">

                                    <div class="tp-header-top tp-header-setting">
                                        <span>{{ Auth::user()->name }} </span> <br>

                                        <span><a href="{{ route('logout') }}" style="font-family: var(--tp-ff-body);">Logout </a></span>
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
                                            <span><a href="{{ route('login') }}" style="font-family: var(--tp-ff-body);">Login </a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endauth

                    </div>
                </div>
            </div>

            <!-- header bottom start -->
            <div id="header-sticky" class="tp-header-bottom-2 tp-header-sticky">
                <div class="container">
                    <div class="tp-mega-menu-wrapper p-relative">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-5 col-md-5 col-sm-4 col-6">
                                <div class="logo">
                                    <a href="">
                                        <img class="logo-light" src="assets/img/logo/preloader/logo.png"
                                            alt="logo" width="110px" height="100px">

                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-5 d-none d-xl-block">
                                <div class="main-menu menu-style-2">
                                    <nav class="tp-main-menu-content">
                                        <ul>
                                            <li><a href="{{ route('frontend.home') }}">Home</a></li>
                                            <li><a href="{{ route('frontend.shop') }}">Shop</a></li>
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
                                                <li><a href="{{ route('frontend.shop', ['id' => $item['id']]) }}">{{$item->category_name}}</a></li>
                                            @endforeach

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-7 col-md-7 col-sm-8 col-6">
                                <div class="tp-header-bottom-right d-flex align-items-center justify-content-end pl-30">
                                    <div class="tp-header-action d-flex align-items-center ml-30">
                                        {{-- @include('frontend.search') --}}
                                    <!-- WISHLIST -->
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

                                    <!-- CART -->
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


    <script>
        $(document).ready(function() {

            $('.livesearch').select2({
                ajax: {
                    url: '/ajax-autocomplete-search',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }

            });

        });
    </script>



</body>
</html>
