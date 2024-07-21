<?php
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

?>


<style>
    .cartmini__checkout-btn .tp-btn:hover {
        background-color: #006677;
        color: var(--tp-common-white);
        border-color: #006475;
    }

    .cartmini__title a:hover {
        color: #006475;
    }

    .cartmini__price {
        color: #010f1c;
    }
</style>
<!-- cart mini area start -->
@php
    $grandtotal = 0;

    if (session::has('cart')) {
        $cartcount = count(Session::get('cart', []));
    } else {
        $cartcount = Cart::where('buy_now', 0)->where('user_id', Auth::id())->count();
        // dd($cartcount);
    }
@endphp
@if (session('cart'))

    @foreach (session('cart') as $id => $cart_items)
        @php
            $grandtotal += $cart_items['amount'] * $cart_items['quantity'];
        @endphp
    @endforeach

        <div class="cartmini__area">
            <div class="cartmini__wrapper d-flex justify-content-between flex-column">
                <div class="cartmini__top-wrapper">
                    <div class="cartmini__top p-relative">
                        <div class="cartmini__top-title">
                            <h4>Shopping cart</h4>
                        </div>
                        <div class="cartmini__close">
                            <button type="button" class="cartmini__close-btn cartmini-close-btn"><i
                                    class="fal fa-times"></i></button>
                        </div>
                    </div>


                    <div class="cartmini__widget">

                        @foreach (session('cart') as $id => $cart_items)
                            @php
                                $amt_id = $cart_items['amount_id'];
                                $quant_name = App\Models\ProductAmountOptions::where('id', $amt_id)
                                    ->pluck('qty_name')
                                    ->first();
                            @endphp

                            <div class="cartmini__widget-item">
                                <div class="cartmini__thumb">
                                    <a href="{{ route('frontend.single_product', ['id' => $id]) }}">
                                        <img src="{{ url('backend/images/product_images/' . $cart_items['image']) }}"
                                            alt="" style="width: 70px; height: 60px">
                                    </a>
                                </div>
                                <div class="cartmini__content">
                                    <h5 class="cartmini__title"><a
                                            href="{{ route('frontend.single_product', ['id' => $id]) }}">{{ Str::limit($cart_items['product_name'], 20) }}</a>
                                    </h5>
                                    <div class="cartmini__price-wrapper">
                                        <span class="cartmini__price" style="color: 006475">{{ $quant_name }} -
                                            ₹{{ $cart_items['amount'] }}</span>
                                        <span class="cartmini__quantity">x{{ $cart_items['quantity'] }}</span>
                                    </div>
                                </div>

                                <a href="{{ route('remove.from.cart', $id) }}" class="cartmini__del"><i
                                        class="fa-regular fa-xmark"></i></a>
                            </div>
                        @endforeach

                    </div>

                    {{--
                        <div class="cartmini__empty text-center d-none">
                            <img src="assets/img/product/cartmini/empty-cart.png" alt="">
                            <p>Your Cart is empty</p>
                            <a href="shop.html" class="tp-btn">Go to Shop</a>
                        </div> --}}

                </div>

                @if ($cartcount != null)
                    <div class="cartmini__checkout">
                        <div class="cartmini__checkout-title mb-30">
                            <h4>Subtotal:</h4>
                            <span> ₹{{ $grandtotal }}</span>
                        </div>
                        <div class="cartmini__checkout-btn">
                            <a href="{{ route('cart') }}" class="tp-btn mb-10 w-100"> view cart</a>
                            <a href=" {{ route('checkout') }}" class="tp-btn tp-btn-border w-100"> checkout</a>
                        </div>
                    </div>
                @endif



            </div>
        </div>

@else
    @php
        $cart = App\Models\Cart::where('buy_now', 0)->where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->get();
    @endphp


    @if($cartcount != 0)

        <div class="cartmini__area">
            <div class="cartmini__wrapper d-flex justify-content-between flex-column">
                <div class="cartmini__top-wrapper">
                    <div class="cartmini__top p-relative">
                        <div class="cartmini__top-title">
                            <h4>Shopping cart</h4>
                        </div>
                        <div class="cartmini__close">
                            <button type="button" class="cartmini__close-btn cartmini-close-btn"><i
                                    class="fal fa-times"></i></button>
                        </div>
                    </div>

                    <div class="cartmini__widget">
                        @foreach ($cart as $cart_items)
                            <div class="cartmini__widget-item">
                                <div class="cartmini__thumb">
                                    <a
                                        href="{{ route('frontend.single_product', ['id' => $cart_items['variant_option_id']]) }}">
                                        <img src="{{ url('backend/images/product_images/' . $cart_items['image']) }}"
                                            alt="" style="width: 70px; height: 60px">
                                    </a>
                                </div>
                                <div class="cartmini__content">
                                    <h5 class="cartmini__title"><a
                                            href="{{ route('frontend.single_product', ['id' => $cart_items['variant_option_id']]) }}">{{ Str::limit($cart_items['product_name'], 15) }}</a>
                                    </h5>
                                    <div class="cartmini__price-wrapper">
                                        <span class="cartmini__price">₹{{ $cart_items['amount'] }}</span>
                                        <span class="cartmini__quantity">x{{ $cart_items['quantity'] }}</span>
                                    </div>
                                </div>

                                <a href="{{ route('cart.delete', $cart_items->id) }}" class="cartmini__del"><i
                                        class="fa-regular fa-xmark"></i></a>

                            </div>

                            @php  $grandtotal += $cart_items['amount'] * $cart_items['quantity']; @endphp
                        @endforeach


                    </div>

                    <div class="cartmini__empty text-center d-none">
                        <img src="assets/img/product/cartmini/empty-cart.png" alt="">
                        <p>Your Cart is empty</p>
                        <a href="shop.html" class="tp-btn">Go to Shop</a>
                    </div>
                </div>
                <div class="cartmini__checkout">
                    <div class="cartmini__checkout-title mb-30">
                        <h4>Subtotal:</h4>
                        <span> ₹{{ $grandtotal }}</span>
                    </div>
                    <div class="cartmini__checkout-btn">
                        <a href="{{ route('cart') }}" class="tp-btn mb-10 w-100"> view cart</a>
                        <a href="{{ route('checkout') }}" class="tp-btn tp-btn-border w-100"> checkout</a>
                    </div>
                </div>
            </div>
        </div>
    @endif


@endif
<!-- cart mini area end -->
