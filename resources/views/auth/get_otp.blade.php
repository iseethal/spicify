
@include('frontend.templates.header')
@include('frontend.templates.toastr-notifications')

   <main>

    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg text-center pt-95 pb-50">
       <div class="container">
          <div class="row">
             <div class="col-xxl-12">
                <div class="breadcrumb__content p-relative z-index-1">
                   <h3 class="breadcrumb__title">Verify Email</h3>
                   <div class="breadcrumb__list">
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- login area start -->
    <section class="tp-login-area pb-140 p-relative z-index-1 fix">
       <div class="tp-login-shape">
          <img class="tp-login-shape-1" src="assets/img/login/login-shape-1.png" alt="">
          <img class="tp-login-shape-2" src="assets/img/login/login-shape-2.png" alt="">
          <img class="tp-login-shape-3" src="assets/img/login/login-shape-3.png" alt="">
          <img class="tp-login-shape-4" src="assets/img/login/login-shape-4.png" alt="">
       </div>
       <div class="container">
          <div class="row justify-content-center">
             <div class="col-xl-6 col-lg-8">
                <div class="tp-login-wrapper">

                <form method="POST" action="{{ route('otp.verify') }}">
                    @csrf

                <div class="tp-login-option">
                      <div class="tp-login-input-wrapper">
                         <div class="tp-login-input-box">
                            <div class="tp-login-input">
                               <input id="otp" type="text" name="otp"  placeholder="otp">
                            </div>
                            <div class="tp-login-input-title">
                               <label for="otp">Enter the otp send to your email</label>
                            </div>
                         </div>


                         </div>
                      </div>

                      <div class="tp-login-bottom">
                        <button type="submit"  class="tp-login-btn w-100"> submit </button>
                      </div>
                   </div>

                </form>

                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- login area end -->

 </main>

@include('frontend.templates.footer')

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