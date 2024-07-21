@include('frontend.templates.header')

<main>

    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg text-center pt-95 pb-50">
       <div class="container">
          <div class="row">
             <div class="col-xxl-12">
                <div class="breadcrumb__content p-relative z-index-1">
                   <h3 class="breadcrumb__title">FSSAI Licence</h3>
                   <div class="breadcrumb__list">
                      <span><a href="{{ route('frontend.home')}}">Home</a></span>
                      <span>FSSAI Licence</span>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- breadcrumb area end -->

    <section class="tp-postbox-area">
        <div class="container">
           <div class="row">
              <div class="col-xl-12 col-lg-8">
                 <div class="tp-postbox-wrapper pr-50">
                    <article class="tp-postbox-item format-image mb-50 transition-3">
                       <div class="tp-postbox-content">
                          
                          <div class="tp-postbox-text">
                             
                            <iframe src="assets/img/fssai/FSSAI_License.pdf" width="100%" height="600px"></iframe>
                          </div>

                       </div>
                    </article>

                 </div>
              </div>
           </div>
        </div>
     </section>

 </main>

@include('frontend.templates.footer')