@include('frontend.templates.header')
@include('frontend.templates.toastr-notifications')


      <main>

         <!-- breadcrumb area start -->
         <section class="breadcrumb__area include-bg pt-95 pb-50" data-bg-color="#EFF1F5">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-12">
                     <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Checkout</h3>
                        <div class="breadcrumb__list">
                           <span><a href="checkout.html#">Home</a></span>
                           <span>Checkout</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- breadcrumb area end -->

         <!-- checkout area start -->
         <section class="tp-checkout-area" data-bg-color="#EFF1F5">
        <div class="container">
           <div class="row">
              <div class="col-xl-7 col-lg-7">
                 <div class="tp-checkout-verify">
                    <div class="tp-checkout-verify-item">
                       <p class="tp-checkout-verify-reveal">Have a coupon? <button type="button" class="tp-checkout-coupon-form-reveal-btn">Click here to enter your code</button></p>

                       <div id="tpCheckoutCouponForm" class="tp-return-customer">
                         <form action="{{ route('coupon.apply') }}"  method="POST" >
                             @csrf
                             <div class="tp-return-customer-input">
                                <label>Coupon Code :</label>
                                <input type="text" name="coupon_code" id="coupon_code" placeholder="Coupon">
                             </div>
                             <button type="submit" class="tp-return-customer-btn tp-checkout-btn">Apply</button>
                          </form>
                       </div>

                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>

    @php

        $user_details = App\Models\Order::where('user_id',Auth::id())->orderBy('id','desc')->limit(1)->get();

        foreach ($user_details as  $value) {

           $first_name = $value->billing_firstname;
           $last_name  = $value->billing_lastname;
           $email      = $value->billing_email;
           $phone      = $value->billing_phone;
           $address1   = $value->billing_address1;
           $address2   = $value->billing_address2;
           $address2   = $value->billing_address2;
           $city       = $value->billing_city;
           $state      = $value->billing_state;
           $zipcode    = $value->billing_zip_code;
           $country    = $value->country;
           $email    = $value->billing_email;

        }

    @endphp

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
    <section class="tp-checkout-area pb-120" data-bg-color="#EFF1F5">
       <div class="container">
          <div class="row">
             <div class="col-lg-7">
                <div class="tp-checkout-bill-area">
                    <h3 class="tp-checkout-bill-title">Billing Details</h3>

                    @if(Request()->product_name != null)
                        <input type="hidden" name="product_name" value="{{ Request()->product_name }}">
                    @endif

                    <div class="tp-checkout-bill-form">
                            <div class="tp-checkout-bill-inner">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="tp-checkout-input">
                                            <label>First Name <span>*</span></label>

                                            <input type="text" name="billing_firstname" id="billing_firstname"
                                                 placeholder="First Name" @if(!$user_details->isEmpty())  value="{{$first_name}}" @endif required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="tp-checkout-input">
                                            <label>Last Name <span>*</span></label>
                                            <input type="text" name="billing_lastname" id="billing_lastname"
                                                placeholder="Last Name" @if(!$user_details->isEmpty())  value="{{$last_name}}" @endif required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="tp-checkout-input">
                                            <label>Country / Region </label>
                                            <input type="text" name="country" id="country"
                                                placeholder="country" @if(!$user_details->isEmpty())  value="{{$country}}" @endif required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="tp-checkout-input">
                                            <label>Street address</label>
                                            <input type="text" name="billing_address1" id="billing_address1"
                                                placeholder="House number and street name"   @if(!$user_details->isEmpty())  value="{{$address1}}" @endif required>
                                        </div>

                                        <div class="tp-checkout-input">
                                            <input type="text" name="billing_address2" id="billing_address2"
                                                placeholder="Apartment, suite, unit, etc. (optional)"  @if(!$user_details->isEmpty())  value="{{$address2}}" @endif required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="tp-checkout-input">
                                            <label>State</label>
                                            <input type="text" name="billing_state" id="billing_state"
                                                placeholder="state"   @if(!$user_details->isEmpty())  value="{{$address1}}" @endif required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="tp-checkout-input">
                                            <label>Town / City</label>
                                            <input type="text" name="billing_city" id="billing_city"
                                                placeholder="city"   @if(!$user_details->isEmpty())  value="{{$city}}" @endif required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="tp-checkout-input">
                                            <label>Postcode ZIP</label>
                                            <input type="text" id="billing_zip_code" type="text"
                                                name="billing_zip_code"  @if(!$user_details->isEmpty()) value="{{$zipcode}}" @endif placeholder="pin code" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="tp-checkout-input">
                                            <label>Phone <span>*</span></label>
                                            <input type="number" name="billing_phone" id="billing_phone"
                                                placeholder="phone"  @if(!$user_details->isEmpty())  value="{{$phone}}" @endif required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="tp-checkout-input">
                                            <label>Email address <span>*</span></label>
                                            <input type="email" name="billing_email" id="billing_email"
                                                type="email" placeholder="email" @if(!$user_details->isEmpty()) value="{{$email}}" @endif required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="tp-checkout-input">
                                            <label>Order notes (optional)</label>
                                            <textarea id="order_notes" type="text" name="order_notes"
                                                placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>


            <div class="col-lg-5">
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
                            @php $total_amount = 0; $total_discount = 0; $sub_total = 0; @endphp
                            @foreach ($cart as $item)
                            @php
                            $total         = $item->amount * $item->quantity;
                            $total_amount += $total;
                            $sub_total    += $item->total_amount;
                            $discount      = $item->discount;
                            $total_discount += $discount;
                            @endphp

                                <li class="tp-order-info-list-desc">
                                    <p>{{ $item->product_name }} <span> x {{ $item->quantity }} x {{ $item->amount }}</span></p>
                                    <span>₹{{ $total }}</span>
                                </li>


                            @endforeach

                            <li class="tp-order-info-list-total">
                                <span> Total</span>
                                <span>₹{{ $total_amount }}</span>
                            </li>

                            <!-- discount -->
                            @if ($total_discount != 0)
                                <li class="tp-order-info-list-discount">
                                    <span>Discount</span>
                                    <span>₹{{ $total_discount }} </span>
                                </li>
                            @endif


                            {{-- <li class="tp-order-info-list-subtotal">
                                <span>Total</span>
                                <span>₹{{ $grandtotal }} </span>
                            </li> --}}

                            <li class="tp-order-info-list-total">
                                <span>Sub Total</span>
                                <span>₹{{ $sub_total }}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="tp-checkout-payment">

                        <div class="tp-checkout-payment-item paypal-payment">
                            <input type="radio" id="paypal" name="payment_type" value="pay_now" checked>
                            <label for="paypal">Pay Now <img src="assets/img/icon/payment-option.png" alt=""> <a href="#">What is PayPal?</a></label>
                        </div>
                        <div class="tp-checkout-payment-item">
                            <input type="radio" id="cod" name="payment_type" value="cash_on_delivery">
                            <label for="cod">Cash on Delivery</label>
                        </div>

                    </div>

                    <div class="tp-checkout-btn-wrapper">
                        <button type="submit" class="tp-checkout-btn w-100">Place Order</button>
                    </div>
                </div>
            </div>

          </div>
       </div>
    </section>

</form>
               </div>
            </div>
         </section>
         <!-- checkout area end -->


      </main>



@include('frontend.templates.footer')
