@include('frontend.templates.header')

<main>

    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-50">
       <div class="container">
          <div class="row">
             <div class="col-xxl-12">
                <div class="breadcrumb__content p-relative z-index-1">
                   <h3 class="breadcrumb__title">Grab Best Offer</h3>
                   <div class="breadcrumb__list">
                      <span><a href="{{ route('frontend.home')}}">Home</a></span>
                      <span>Coupon</span>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- coupon area start -->
    <div class="tp-coupon-area pb-120">
       <div class="container">
          <div class="row">
            @foreach ($coupons as $coupon)
                @php
                  $sd_date    = Illuminate\Support\Carbon::parse($coupon->valid_from)->format('M-d');
                  $ld_date    = Illuminate\Support\Carbon::parse($coupon->valid_to)->format('M-d');

                  $product_id = $coupon->product_id;
                  $image      = App\Models\VariantOptions::where('id',$product_id)->pluck('image')->first();
                  $name       = App\Models\VariantOptions::where('id',$product_id)->pluck('name')->first();
                  $validTo    = $coupon->valid_to;

                  if($validTo != null){
                        $date      = $coupon->valid_to;
                    } else {
                        $date      = $coupon->valid_from;
                    }

                    $time       = strtotime($date) + 86400;
                    $expiryDate = date('Y-m-d', $time);
                    $today      = Illuminate\Support\Carbon::now()->format('Y-m-d');
                    $time1      = strtotime($date);

                @endphp

            @if ($expiryDate > $today )

                <div class="col-xl-6">
                    <div class="tp-coupon-item mb-30 p-relative d-md-flex justify-content-between align-items-center">
                    <span class="tp-coupon-border"></span>
                    <div class="tp-coupon-item-left d-sm-flex align-items-center">
                        <div class="tp-coupon-thumb">
                            <a href="{{ route('frontend.single_product',['id'=>$product_id]) }}">
                                <img alt="logo" src="{{ asset('backend/images/product_images/'.$image) }}">
                            </a>
                        </div>
                        <div class="tp-coupon-content">
                            <h3 class="tp-coupon-title"> {{ $coupon->coupon_name}} </h3>
                            <p class="tp-coupon-offer mb-15"><span>{{ $coupon->discount}}%</span>Off</p>
                            <a href="{{ route('frontend.single_product',['id'=>$product_id]) }}"><h3 class="tp-coupon-title"> {{ $name}} </h3></a>
                            <h3 class="tp-coupon-title" style="font-size: 12px">Coupon Code:  {{ $coupon->coupon_code}} </h3>
                        </div>
                    </div>
                    <div class="tp-coupon-item-right pl-20">
                        <div class="tp-coupon-status mb-10 d-flex align-items-center">
                            <h4>Coupon <span class="active">Active</span></h4>
                            <div class="tp-coupon-info-details">
                                <span>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9 1.5C4.99594 1.5 1.75 4.74594 1.75 8.75C1.75 12.7541 4.99594 16 9 16C13.0041 16 16.25 12.7541 16.25 8.75C16.25 4.74594 13.0041 1.5 9 1.5ZM0.25 8.75C0.25 3.91751 4.16751 0 9 0C13.8325 0 17.75 3.91751 17.75 8.75C17.75 13.5825 13.8325 17.5 9 17.5C4.16751 17.5 0.25 13.5825 0.25 8.75ZM9 7.75C9.55229 7.75 10 8.19771 10 8.75V11.95C10 12.5023 9.55229 12.95 9 12.95C8.44771 12.95 8 12.5023 8 11.95V8.75C8 8.19771 8.44771 7.75 9 7.75ZM9 4.5498C8.44771 4.5498 8 4.99752 8 5.5498C8 6.10209 8.44771 6.5498 9 6.5498H9.008C9.56028 6.5498 10.008 6.10209 10.008 5.5498C10.008 4.99752 9.56028 4.5498 9.008 4.5498H9Z" fill="currentColor"></path>
                                </svg>
                                </span>
                                <div class="tp-coupon-info-tooltip transition-3">
                                <p>*This coupon code will apply on <span>Grocery type products</span> and when you shopping more than <span>$500</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="tp-coupon-date"><button><span> {{ $sd_date}} <br>@if ($coupon->valid_to != null) {{ $ld_date}}  @endif </span></button></div>
                    </div>
                    </div>
                </div>

            @endif
            @endforeach

            </div>
        </div>
    </div>
    <!-- coupon area end -->

</main>
@include('frontend.templates.footer')