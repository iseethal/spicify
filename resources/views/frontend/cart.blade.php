@include('frontend.templates.header')
@include('frontend.templates.toastr-notifications')

<style>
    .tp-cart-checkout-btn:hover {
        background-color: #006677;
        color: var(--tp-common-white);
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<?php
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
?>

@php
$cartcount  = Cart::where('user_id', Auth::id())->count();
$grandtotal = 0;
@endphp

<main>

    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h4 class="breadcrumb__title">SHOPPING CART</h4>
                        <div class="breadcrumb__list">
                            <span><a href="{{ route('frontend.home') }}">Home</a></span>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- cart area start -->

    @if (session('cart'))

        <section class="tp-cart-area pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="tp-cart-list mb-25 mr-30">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="tp-cart-header-product">Product</th>
                                        <th class="tp-cart-header-price">Price</th>
                                        <th class="tp-cart-header-quantity">Quantity</th>
                                        <th class="tp-cart-header-quantity">Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $grandtotal = 0;
                                        $i = 0;
                                    @endphp
                                    @foreach (session('cart') as $id => $cart_items)
                                            @php
                                            // dd($cart_items);
                                                $amt_id = $cart_items['amount_id'];
                                                $quant_name = App\Models\ProductAmountOptions::where('id',$amt_id)->pluck('qty_name')->first();
                                            @endphp

                                        <tr data-id="{{ $id }}">

                                            <td class="tp-cart-img">
                                                <a href="{{ route('frontend.single_product', ['id' => $cart_items['id']]) }}">
                                                    <img src="{{ url('backend/images/product_images/' . $cart_items['image']) }}" alt="">
                                                </a>
                                            </td>

                                            <td class="tp-cart-title">
                                                <a href="{{ route('frontend.single_product', ['id' => $cart_items['id']]) }}">{{ $cart_items['product_name'] }}.</a>
                                            </td>

                                            <td class="tp-cart-price" >  <span> {{ $quant_name}} x ₹ {{$cart_items['amount']}}</span></td>


                                            <td class="tp-cart-quantity">
                                                <div class="tp-product-quantity mt-10 mb-10">
                                                    <div class="tp-product-details-quantity">
                                                        <div class="tp-product-quantity mb-15 mr-15">
                                                            <div class="mx-0 pt-0">

                                                                <input name="cart_id_<?= $i ?>" id="cart_id_<?= $i ?>" type="hidden" value="{{ $cart_items['id'] }}">
                                                                <input name="amount_<?= $i ?>" id="p_amount_<?= $i ?>" type="hidden" value="{{ $cart_items['amount'] }}">

                                                                <input class="form-input" name="quantity_<?= $i ?>" id="quantity_<?= $i ?>" type="number" min="1" max="100" step="1" value="{{ $cart_items['quantity'] }}" style="width: 80px; height: 50px; text-align: center;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-info" onclick="cartupdate(<?= $i ?>)">Update</button>
                                                </div>
                                            </td>


                                            @php
                                            $total_amt = $cart_items['amount'] * $cart_items['quantity'];
                                            @endphp


                                            <td class="tp-cart-price"><span>₹{{ $total_amt }}</span></td>

                                            <!-- action -->
                                            <td class="tp-cart-action">

                                            <a href="{{ route('remove.from.cart', $id) }}"
                                                    lass="tp-cart-action-btn remove-from-cart">
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

                                        @php
                                            $grandtotal += $cart_items['amount'] * $cart_items['quantity'];
                                            $i++;
                                        @endphp
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="tp-cart-bottom">
                <div class="row align-items-end">
                    <div class="col-xl-6 col-md-8">
                        <div class="tp-cart-coupon">
                            <form action="#">
                            <div class="tp-cart-coupon-input-box">
                                <label>Coupon Code:</label>
                                <div class="tp-cart-coupon-input d-flex align-items-center">
                                    <input type="text" placeholder="Enter Coupon Code">
                                    <button type="submit">Apply</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-4">
                        <div class="tp-cart-update text-md-end">
                            <button type="button" class="tp-cart-update-btn">Update Cart</button>
                        </div>
                    </div>
                </div>
                </div> --}}
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="tp-cart-checkout-wrapper">
                            <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                                <span class="tp-cart-checkout-top-title">Subtotal</span>
                                <span class="tp-cart-checkout-top-price">₹{{ $grandtotal }}</span>
                            </div>
                            {{-- <div class="tp-cart-checkout-shipping">
                    <h4 class="tp-cart-checkout-shipping-title">Shipping</h4>

                    <div class="tp-cart-checkout-shipping-option-wrapper">
                        <div class="tp-cart-checkout-shipping-option">
                            <input id="flat_rate" type="radio" name="shipping">
                            <label for="flat_rate">Flat rate: <span>$20.00</span></label>
                        </div>
                        <div class="tp-cart-checkout-shipping-option">
                            <input id="local_pickup" type="radio" name="shipping">
                            <label for="local_pickup">Local pickup: <span> $25.00</span></label>
                        </div>
                        <div class="tp-cart-checkout-shipping-option">
                            <input id="free_shipping" type="radio" name="shipping">
                            <label for="free_shipping">Free shipping</label>
                        </div>
                    </div>
                </div> --}}
                            <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
                                <span>Total</span>
                                <span>₹{{ $grandtotal }}</span>
                            </div>
                            <div class="tp-cart-checkout-proceed">
                                <a href="{{ route('checkout') }}" class="tp-cart-checkout-btn w-100">Proceed to
                                    Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @elseif($cartcount != null)
        <section class="tp-cart-area pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="tp-cart-list mb-25 mr-30">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="tp-cart-header-product">Product</th>
                                        <th class="tp-cart-header-price">Price</th>
                                        <th class="tp-cart-header-quantity">Quantity</th>
                                        <th class="tp-cart-header-quantity">Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php  $i = 1;  @endphp

                                    @foreach ($cart as $cart_items)
                                        <tr data-id="{{ $cart_items->id }}">
                                            <!-- img -->
                                            <td class="tp-cart-img"><a
                                                    href="{{ route('frontend.single_product', ['id' => $cart_items['id']]) }}">
                                                    <img src="{{ url('backend/images/product_images/' . $cart_items['image']) }}"
                                                        alt=""></a></td>
                                            <!-- title -->
                                            <td class="tp-cart-title"><a
                                                    href="{{ route('frontend.single_product', ['id' => $cart_items['id']]) }}">{{ $cart_items['product_name'] }}.</a>
                                            </td>
                                            <!-- price -->
                                            <td class="tp-cart-price"><span>₹{{ $cart_items['amount'] }}</span></td>
                                            <!-- quantity -->
                                            <td class="tp-cart-quantity">
                                                <div class="tp-product-quantity mt-10 mb-10">
                                                    <div class="tp-product-details-quantity">
                                                        <div class="tp-product-quantity mb-15 mr-15">
                                                            <div class="mx-0 pt-0">
                                                                <input name="cart_id_<?= $i ?>" id="cart_id_<?= $i ?>"
                                                                    type="hidden" value="{{ $cart_items->id }}">
                                                                <input name="amount_<?= $i ?>" id="p_amount_<?= $i ?>"
                                                                    type="hidden" value="{{ $cart_items->amount }}">
                                                                <input class="form-input" name="quantity_<?= $i ?>"
                                                                    id="quantity_<?= $i ?>" type="number"
                                                                    min="1" max="100" step="1"
                                                                    value="{{ $cart_items->quantity }}"
                                                                    style="width: 80px; height: 50px; text-align: center;">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-info"
                                                        style="background-color: #006677;border-color:#006677; color:white"
                                                        onclick="cartupdate(<?= $i ?>)">Update</button>

                                                </div>
                                            </td>
                                            <td class="tp-cart-price"><span>₹{{ $cart_items->total_amount }}</span>
                                            </td>

                                            <td class="tp-cart-action">

                                                <a href="{{ route('cart.delete', $cart_items->id) }}"
                                                    lass="tp-cart-action-btn remove-from-cart">
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

                                        @php
                                            $grandtotal += $cart_items['amount'] * $cart_items['quantity'];
                                            $i++;
                                        @endphp
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="tp-cart-bottom">
                   <div class="row align-items-end">
                       <div class="col-xl-6 col-md-8">
                           <div class="tp-cart-coupon">
                               <form action="#">
                               <div class="tp-cart-coupon-input-box">
                                   <label>Coupon Code:</label>
                                   <div class="tp-cart-coupon-input d-flex align-items-center">
                                       <input type="text" placeholder="Enter Coupon Code">
                                       <button type="submit">Apply</button>
                                   </div>
                               </div>
                               </form>
                           </div>
                       </div>
                       <div class="col-xl-5 col-md-4">
                           <div class="tp-cart-update text-md-end">
                               <button type="button" class="tp-cart-update-btn">Update Cart</button>
                           </div>
                       </div>
                   </div>
                   </div> --}}
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="tp-cart-checkout-wrapper">
                            <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                                <span class="tp-cart-checkout-top-title">Subtotal</span>
                                <span class="tp-cart-checkout-top-price">₹{{ $grandtotal }}</span>
                            </div>
                            {{-- <div class="tp-cart-checkout-shipping">
                       <h4 class="tp-cart-checkout-shipping-title">Shipping</h4>

                       <div class="tp-cart-checkout-shipping-option-wrapper">
                           <div class="tp-cart-checkout-shipping-option">
                               <input id="flat_rate" type="radio" name="shipping">
                               <label for="flat_rate">Flat rate: <span>$20.00</span></label>
                           </div>
                           <div class="tp-cart-checkout-shipping-option">
                               <input id="local_pickup" type="radio" name="shipping">
                               <label for="local_pickup">Local pickup: <span> $25.00</span></label>
                           </div>
                           <div class="tp-cart-checkout-shipping-option">
                               <input id="free_shipping" type="radio" name="shipping">
                               <label for="free_shipping">Free shipping</label>
                           </div>
                       </div>
                   </div> --}}
                            <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
                                <span>Total</span>
                                <span>₹{{ $grandtotal }}</span>
                            </div>
                            <div class="tp-cart-checkout-proceed">
                                <a href="{{ route('checkout') }}" class="tp-cart-checkout-btn w-100">Proceed to
                                    Checkout</a>
                            </div>
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
                            <h5>Your shopping cart is empty </h5>
                            <a href="{{ route('frontend.shop') }}">back to the shop page</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>

    @endif
    <!-- cart area end -->

</main>
<script type="text/javascript">
    function cartupdate(rid) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var id              = document.getElementById('cart_id_' + rid).value;
        var amount          = document.getElementById('p_amount_' + rid).value;
        var quantity        = document.getElementById('quantity_' + rid).value;
        var total_amount    = Math.round(quantity * amount);

        const formData = new FormData();
        formData.append('id', id);
        formData.append('quantity', quantity);
        formData.append('total_amount', total_amount);

        $.ajax({
            type: 'POST',

            url: "{{ route('cart.update') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {

                $('.alert-success').html(data.success).fadeIn('slow');
                $('.alert-success').delay(3000).fadeOut('slow');
                window.location.reload();
            }
        });
    }
</script>

<script>
    // session - remove-from-cart

    $(".remove-from-cart").click(function(e) {

        var ele = $(this);

        if (confirm("Are you sure want to remove?")) {
            $.ajax({
                url: "",
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });
</script>

@include('frontend.templates.footer')
