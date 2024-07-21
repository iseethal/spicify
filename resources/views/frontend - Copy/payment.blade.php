@include('frontend.templates.header')
@include('frontend.templates.toastr-notifications')


<style>
    .tp-checkout-btn {
        background-color: #006677;
    }
</style>

<main>

    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg text-center pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Payment</h3>
                        <div class="breadcrumb__list">
                            <span><a href="{{ route('frontend.home') }}">Home</a></span>
                            <span>Payment</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->



    <!-- checkout area start -->
    <section class="tp-contact-area pb-100">
        <div class="container">
            <div class="tp-contact-inner">
                <div class="row">

                    <div class="col-md-6 ">
                        <div class="tp-checkout-bill-area">
                            <h3 class="tp-checkout-bill-title">Billing Details</h3>

                            @foreach ($details as $item)
                                @php
                                    $name = $item->billing_firstname . '' . $item->billing_lastname;
                                    $phone = $item->billing_phone;
                                    $email = $item->billing_email;
                                @endphp

                                <div class="tp-checkout-bill-form">
                                    <p style="font-size: 18px;"> {{ $item->billing_firstname }}
                                        {{ $item->billing_lastname }} </p>
                                    <p style="font-size: 18px;"> {{ $item->billing_email }} </p>
                                    <p style="font-size: 18px;"> {{ $item->billing_phone }} </p>
                                    <p style="font-size: 18px;"> {{ $item->billing_address1 }} </p>
                                    <p style="font-size: 18px;"> {{ $item->billing_address2 }} </p>
                                    <p style="font-size: 18px;"> {{ $item->billing_city }} ,
                                        {{ $item->country }},{{ $item->billing_state }}</p>
                                    <p style="font-size: 18px;"> {{ $item->billing_zip_code }} </p>

                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- checkout place order -->
                        <div class="tp-checkout-place white-bg">
                            <h3 class="tp-checkout-place-title">Your Order</h3>

                            <div class="tp-order-info-list">
                                <ul>

                                    <!-- header -->
                                    <li class="tp-order-info-list-header">
                                        <h4>Product</h4>
                                        <h4>Total</h4>
                                    </li>

                                    <!-- item list -->
                                    @php $grandtotal = 0; $discount = 0; $amount = 0;@endphp
                                    @foreach ($orders as $item)
                                        @php
                                            $order_id = $item->id;
                                            $order_items = App\Models\OrderItem::where('order_id', $order_id)->get();

                                        @endphp

                                        @foreach ($order_items as $item1)
                                            @php
                                                  $amount      = $item1->amount;
                                                  $grandtotal += $amount;
                                                  $discount    += $item1->discount;
                                            @endphp
                                            <li class="tp-order-info-list-desc">
                                                <p>{{ $item1->product_name }} <span> x {{ $item1->quantity }} x
                                                        {{ $item1->amount }}</span></p>
                                                <span>₹{{ $amount * $item1->quantity}}</span>
                                            </li>

                                            @php
                                                $grandtotal += $item->total_amount;
                                            @endphp
                                        @endforeach
                                    @endforeach

                                    {{-- total --}}

                                    <li class="tp-order-info-list-total">
                                        <span>Total</span>
                                        <span>₹{{ $grandtotal }} </span>
                                    </li>

                                    {{-- discount --}}

                                    @if ($discount != 0)
                                        <li class="tp-order-info-list-discount">
                                            <span>Discount</span>
                                            <span>₹{{ $discount }} </span>
                                        </li>
                                    @endif


                                    <!-- subtotal -->
                                        {{--
                                    <li class="tp-order-info-list-subtotal">

                                        <span>Subtotal</span>
                                        <span>₹{{ $item->total }} </span>
                                    </li> --}}



                                    <!-- total -->
                                    <li class="tp-order-info-list-total">
                                        <span>Subtotal</span>
                                        <span>₹{{ $item->total }}</span>
                                    </li>
                                </ul>
                            </div>
                            <br><br>
                            <div class="tp-checkout-btn-wrapper">
                                <button type="submit" class="tp-checkout-btn w-100" value="paynow" id="rzp-button1">Pay
                                    Now</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- checkout area end -->


</main>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var urls = "{{ route('success') }}"

    var options = {
        "key": "rzp_test_C70VSqySrUJ1h7", // Enter the Key ID generated from the Dashboard
        "amount": "{{ $razorpayOrder->amount }}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "currency": "INR",
        "name": "Spiciffy",
        "description": "Supermarket",
        "image": "https://www.gisaxiom.com/assets/images/logo-dark.png",
        "order_id": "{{ $razorpayOrder->id }}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1

        "handler": function(response) {

            console.log();

            window.location.href = urls + '?payment_id=' + response.razorpay_payment_id;
        },

        "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
        "prefill": {
            "name": "{{ $name }}",
            "email": "{{ $email }}",
            "contact": "{{ $phone }}"
        },
        "notes": {
            "address": "Razorpay Corporate Office"
        },
        "theme": {
            "color": "#3399cc"
        }
    };
    var rzp1 = new Razorpay(options);
    document.getElementById('rzp-button1').onclick = function(e) {
        rzp1.open();
        e.preventDefault();
    }
</script>

@include('frontend.templates.footer')
