@include('frontend.templates.header')
@include('frontend.templates.toastr-notifications')

<style>
    .tp-btn-blue {
        background-color: #006677;
    }

    .tp-cart-update-btn:hover {
        background-color: #006677;
        border-color: #006677;
        color: var(--tp-common-white);
    }

    .tp-cart-title a:hover {
        color: #006677;
    }
</style>

@php
    $count = App\Models\WishList::where('user_id', Auth::id())->count();
    $grandtotal = 0;
@endphp

<main>

    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h4 class="breadcrumb__title">WISHLIST</h4>
                        <div class="breadcrumb__list">
                            <span><a href="{{ route('frontend.home') }}">Home</a></span>
                            <span>Wishlist</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    @if (session('wishlist'))

        <section class="tp-cart-area pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tp-cart-list mb-45 mr-30">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="tp-cart-header-product">Product</th>
                                        <th class="tp-cart-header-price">Price</th>
                                        <th>Action</th>
                                        <th></th>

                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach (session('wishlist') as $id => $wishlist_items)
                                        <tr data-id="{{ $id }}">

                                            <td class="tp-cart-img">
                                                <a
                                                    href="{{ route('frontend.single_product', ['id' => $wishlist_items['id']]) }}">
                                                    <img src="{{ url('backend/images/product_images/' . $wishlist_items['image']) }}"
                                                        alt="">
                                                </a>
                                            </td>

                                            <td class="tp-cart-title">
                                                <a
                                                    href="{{ route('frontend.single_product', ['id' => $wishlist_items['id']]) }}">{{ $wishlist_items['product_name'] }}</a>
                                            </td>

                                            @php
                                                $pid = $wishlist_items['id'];
                                                $min_amount = App\Models\ProductAmountOptions::where('is_deleted', '<>', 1)->where('product_id', '=', $pid)->min('amount');
                                                $min_amount_id = App\Models\ProductAmountOptions::where('product_id', '=', $id)->where('amount', '=', $min_amount)->pluck('id')->first();

                                            @endphp

                                            <td class="tp-cart-price"><span>₹{{ $min_amount }}</span></td>
                                            @csrf
                                            <!-- <td class="tp-cart-quantity">
                                                <div class="tp-product-quantity mt-10 mb-10">
                                                    <div class="tp-product-details-quantity">
                                                        <div class="tp-product-quantity mb-15 mr-15">
                                                            <div class="mx-0 pt-0">
                                                                <input class="form-input" name="product_qty"
                                                                    id="product_qty"type="number" min="1"
                                                                    max="100"
                                                                    step="1"value="{{ $wishlist_items['quantity'] }}"
                                                                    style="width: 80px; height: 50px; text-align: center;"
                                                                    onchange="calculateAmount()">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td> -->

                                            <form action="{{ route('wishlist.to.cart', ['id' => $id]) }}"
                                                method="post">
                                                @csrf


                                                <input type="hidden" name="wishlist_id" id="wishlist_id" value="{{ $id }}">
                                                <input type="hidden" name="product_name"  value="{{ $wishlist_items['product_name'] }}">
                                                <input type="hidden" name="image"  value="{{ $wishlist_items['image'] }}">
                                                <input type="hidden" name="amount"  value="{{ $min_amount }}">
                                                <input type="hidden" name="amount_id"  value="{{ $min_amount_id }}">

                                                <td class="tp-cart-add-to-cart">
                                                    <button type="submit" class="tp-btn tp-btn-2 tp-btn-blue">Add To
                                                        Cart
                                                    </button>
                                                </td>

                                            </form>

                                            <td class="tp-cart-action">
                                                <a href="{{ route('wishlist.delete', $id) }}"
                                                    class="tp-cart-action-btn">
                                                    <svg width="10" height="10" viewBox="0 0 10 10"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                    <span>Remove</span>
                                                </a>
                                            </td>


                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @elseif($count != null)
        <section class="tp-cart-area pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tp-cart-list mb-45 mr-30">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="tp-cart-header-product">Product</th>
                                        <th class="tp-cart-header-price">Price</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($wishlist as $wishlist_items)
                                        @php
                                            $pid = $wishlist_items->id;
                                            $min_amount = App\Models\ProductAmountOptions::where('is_deleted', '<>', 1)->where('product_id', '=', $pid)->min('amount');
                                            $min_amount_id = App\Models\ProductAmountOptions::where('product_id', '=', $pid)->where('amount', '=', $min_amount)->pluck('id')->first();

                                        @endphp
                                        <tr>

                                            <td class="tp-cart-img">
                                                <a
                                                    href="{{ route('frontend.single_product', ['id' => $wishlist_items['variant_option_id']]) }}">
                                                    <img src="{{ url('backend/images/product_images/' . $wishlist_items['image']) }}"
                                                        alt="">
                                                </a>
                                            </td>

                                            <td class="tp-cart-title">
                                                <a
                                                    href="{{ route('frontend.single_product', ['id' => $wishlist_items['variant_option_id']]) }}">{{ $wishlist_items['product_name'] }}</a>
                                            </td>

                                            <td class="tp-cart-price"><span>₹{{ $wishlist_items['amount'] }}</span>
                                            </td>


                                            <form action="{{ route('wishlist.to.cart', ['id' => $pid]) }}"
                                                method="post">
                                                @csrf


                                                <input type="hidden" name="wishlist_id" id="wishlist_id"
                                                    value="{{ $pid }}">

                                                <td class="tp-cart-add-to-cart">
                                                    <button type="submit" class="tp-btn tp-btn-2 tp-btn-blue">Add To
                                                        Cart
                                                    </button>
                                                </td>

                                            </form>


                                            <td class="tp-cart-action">
                                                <a href="{{ route('wishlist.delete', $wishlist_items->id) }}"
                                                    class="tp-cart-action-btn">
                                                    <svg width="10" height="10" viewBox="0 0 10 10"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                    <span>Remove</span>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="container" style="margin-top: 25px;width: 40%;">
            <div class="container-fluid">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <center>
                            <h5>Your Wishlist is empty </h5>
                            <a href="{{ route('frontend.shop') }}">Back to the shop page</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>

    @endif
</main>

@include('frontend.templates.footer')
