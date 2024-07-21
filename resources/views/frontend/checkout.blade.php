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
                                        <div class="tp-checkout-input" style="display:none;">
                                            <label>Country / Region </label>
                                            <input type="text" name="country" id="country" value="India"
                                                placeholder="country">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="tp-checkout-input">
                                            <label> address</label>
                                            <input type="text" name="billing_address1" id="billing_address1"
                                                placeholder="House number and name"   @if(!$user_details->isEmpty())  value="{{$address1}}" @endif required>
                                        </div>

                                        <div class="tp-checkout-input">
                                            <input type="text" name="billing_address2" id="billing_address2"
                                                placeholder="Apartment, suite, unit, etc. (optional)"  @if(!$user_details->isEmpty())  value="{{$address2}}" @endif required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="tp-checkout-input">
                                            <label>Town / City</label>
                                            <input type="text" name="billing_city" id="billing_city"
                                                placeholder="city"   @if(!$user_details->isEmpty())  value="{{$city}}" @endif required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="tp-checkout-input">
                                            <label>State</label>
                                            {{-- <input type="text" name="billing_state" id="billing_state" placeholder="state"   @if(!$user_details->isEmpty())  value="{{$address1}}" @endif required> --}}

                                             <select name="billing_state" id="billing_state">
                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                <option value="Assam">Assam</option>
                                                <option value="Bihar">Bihar</option>
                                                <option value="Chandigarh">Chandigarh</option>
                                                <option value="Chhattisgarh">Chhattisgarh</option>
                                                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                                <option value="Daman and Diu">Daman and Diu</option>
                                                <option value="Delhi">Delhi</option>
                                                <option value="Lakshadweep">Lakshadweep</option>
                                                <option value="Puducherry">Puducherry</option>
                                                <option value="Goa">Goa</option>
                                                <option value="Gujarat">Gujarat</option>
                                                <option value="Haryana">Haryana</option>
                                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                <option value="Jharkhand">Jharkhand</option>
                                                <option value="Karnataka">Karnataka</option>
                                                <option value="Kerala">Kerala</option>
                                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                <option value="Maharashtra">Maharashtra</option>
                                                <option value="Manipur">Manipur</option>
                                                <option value="Meghalaya">Meghalaya</option>
                                                <option value="Mizoram">Mizoram</option>
                                                <option value="Nagaland">Nagaland</option>
                                                <option value="Odisha">Odisha</option>
                                                <option value="Punjab">Punjab</option>
                                                <option value="Rajasthan">Rajasthan</option>
                                                <option value="Sikkim">Sikkim</option>
                                                <option value="Tamil Nadu">Tamil Nadu</option>
                                                <option value="Telangana">Telangana</option>
                                                <option value="Tripura">Tripura</option>
                                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                <option value="Uttarakhand">Uttarakhand</option>
                                                <option value="West Bengal">West Bengal</option>
                                            </select>

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
                            @php
                            $total_amount = 0; $total_discount = 0; $sub_total = 0;
                            @endphp



                            @foreach ($cart as $item)

                                @php
                                $total         = $item->amount * $item->quantity;
                                $total_amount += $total;
                                $sub_total    += $item->total_amount;
                                $discount      = $item->discount;
                                $total_discount += $discount;

                                $product_qty_name   = App\Models\ProductAmountOptions::where('is_deleted','<>', 1)->where('id', $item->amount_id)->pluck('qty_name')->first();

                                @endphp

                                <li class="tp-order-info-list-desc">
                                    <p>{{ $item->product_name }} {{ $product_qty_name }} <span> - {{ $item->quantity }} x {{ $item->amount }}</span></p>
                                    <span>₹{{ $total }}</span>
                                </li>

                            @endforeach

                            <li class="tp-order-info-list-total">
                                <span>Sub Total</span>
                                <span>₹{{ $sub_total }}</span>
                            </li>

                            <!-- discount -->
                            @if ($total_discount != 0)
                                <li class="tp-order-info-list-discount">
                                    <span>Discount</span>
                                    <span>₹{{ $total_discount }} </span>
                                </li>
                            @endif

                            <li class="tp-order-info-list-total">
                                <span> Total</span>
                                <span>₹{{ $total_amount }}</span>
                            </li>

                        </ul>
                    </div>

                    <div class="tp-checkout-payment">
                        <div class="tp-checkout-payment-item paypal-payment">
                            <input type="radio" id="paypal" name="payment_type" value="pay_now" checked>
                            <label for="paypal">Pay Now <img src="assets/img/icon/payment-option.png" alt=""> <a href="#">What is PayPal?</a></label>
                        </div>
                        <!-- <div class="tp-checkout-payment-item">
                            <input type="radio" id="cod" name="payment_type" value="cash_on_delivery">
                            <label for="cod">Cash on Delivery</label>
                        </div> -->
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

      <!-- JS here -->
      <script src="assets/js/meanmenu.js"></script>
      <script src="assets/js/nice-select.js"></script>
      <script src="assets/js/main.js"></script>


@include('frontend.templates.footer')
