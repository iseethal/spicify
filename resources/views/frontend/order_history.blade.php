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

$count      = App\Models\Order::where('user_id', Auth::id())->count();
$grandtotal = 0;

@endphp

<main>

    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h4 class="breadcrumb__title">Orders History</h4>
                        <div class="breadcrumb__list">
                            <span><a href="{{ route('frontend.home') }}">Home</a></span>
                            <span>Order Hisory</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    @if($count != null)

        <section class="tp-cart-area pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tp-cart-list mb-45 mr-30">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="tp-cart-header-product">Order Id</th>
                                        <th class="tp-cart-header-price">Order Date</th>
                                        <th class="tp-cart-header-quantity">Notes</th>
                                        <th class="tp-cart-header-quantity">Tax</th>
                                        <th class="tp-cart-header-quantity">Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($orders as $items)
                                        <tr>
                                            <td class="tp-cart-img">{{ $items['id'] }}</td>
                                            <td class="tp-cart-title">{{ $items['order_date'] }}</td> 
                                            <td class="tp-cart-title">{{ $items['order_notes'] }}</td> 
                                            <td class="tp-cart-price"><span>₹{{ $items['tax'] }}</span></td>
                                            <td class="tp-cart-price"><span>₹{{ $items['total'] }}</span></td>

                                                <!-- <td class="tp-cart-quantity">
                                                    <div class="tp-product-quantity mt-10 mb-10">
                                                        <div class="tp-product-details-quantity">
                                                            <div class="tp-product-quantity mb-15 mr-15">
                                                                <div class="mx-0 pt-0">
                                                                    <input class="form-input" name="product_qty"
                                                                        id="product_qty"type="number" min="1"
                                                                        max="100"
                                                                        step="1"value="{{ $items['quantity'] }}"
                                                                        style="width: 80px; height: 50px; text-align: center;"
                                                                        onchange="calculateAmount()">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td> -->

                                                <!-- @php
                                                $id      = $items->variant_option_id;
                                                $enquiry = App\Models\VariantOptions::where('id', $id)->pluck('enquiry')->first();
                                                @endphp -->

                                                <!-- @if ($enquiry == 0)
                                                    <form action="{{ route('wishlist.to.cart', ['id' => $items->id]) }}" method="post">
                                                        @csrf

                                                        <input type="hidden" name="product_id" id="product_id" value="{{ $items->variant_option_id }}">
                                                        <input type="hidden" name="wishlist_id" id="wishlist_id" value="{{ $items->id }}">
                                                        <input type="hidden" name="product_qty" id="product_qty" value="1">
                                                        <td class="tp-cart-add-to-cart">
                                                            <button type="submit" class="tp-btn tp-btn-2 tp-btn-blue">Add To Cart</button>
                                                        </td>
                                                    </form>
                                                @else
                                                    <td class="tp-cart-add-to-cart">
                                                        <a href="{{ route('frontend.single_product', ['id' => $items['variant_option_id']]) }}" class="tp-btn tp-btn-2 tp-btn-blue">Enquire Now</a>
                                                    </td>
                                                @endif -->

                                                <!-- action -->
                                                <!-- <td class="tp-cart-action">
                                                    <a href="{{ route('wishlist.delete',$items->id)}}" class="tp-cart-action-btn">
                                                        <svg width="10" height="10" viewBox="0 0 10 10"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                        <span>Remove</span>
                                                    </a>
                                                </td> -->
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
                            <h5>Your Order History is empty </h5>
                            <a href="{{ route('frontend.shop') }}">back to the shop page</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>

    @endif

</main>


@include('frontend.templates.footer')
