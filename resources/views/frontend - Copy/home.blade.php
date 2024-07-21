
@include('frontend.templates.header')


	 <main>

			<!-- slider area start -->
			<section class="tp-slider-area p-relative z-index-1" style="display : none;">
				<div class="tp-slider-active-3 swiper-container">
					<div class="swiper-wrapper">
				@foreach ($sliders as $slider)

						<div class="tp-slider-item-3 tp-slider-height-3 p-relative swiper-slide black-bg d-flex align-items-center" >
							<div class="tp-slider-thumb-3 include-bg" data-background="{{ asset('backend/images/slider/'.$slider->image) }}" class="cover"></div>
							<div class="container">
								<div class="row align-items-center">
									<div class="col-xl-6 col-lg-6 col-md-8">
										<div class="tp-slider-content-3">
											<span>{{ $slider->title}}</span>
											<h3 class="tp-slider-title-3">{{ $slider->description}}</h3>

											<div class="tp-slider-btn-3">
												<a href="{{ route('frontend.shop')}}" class="tp-btn tp-btn-border tp-btn-border-white">Shop Now</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
				@endforeach

					</div>
					<!-- dot style -->
					<div class="tp-swiper-dot tp-slider-3-dot d-sm-none"></div>
					<!-- arrow style -->
					<div class="tp-slider-arrow-3 d-none d-sm-block">
						<button type="button" class="tp-slider-3-button-prev">
							<svg width="22" height="42" viewBox="0 0 22 42" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M21 0.999999L1 21L21 41" stroke="currentColor" stroke-opacity="0.3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>
						<button type="button" class="tp-slider-3-button-next">
							<svg width="22" height="42" viewBox="0 0 22 42" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1 0.999999L21 21L1 41" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>
					</div>
				</div>
			</section>
			<!-- slider area end -->

		  <!-- feature area start -->
		  <section class="tp-feature-area tp-feature-border-3 tp-feature-style-2 pb-40 pt-45" style="display : none;">
		  <div class="container">
				<div class="row">
					 <div class="col-xl-12">
						  <div class="tp-feature-inner-2 d-flex flex-wrap align-items-center justify-content-between">
						  <div class="tp-feature-item-2 d-flex align-items-start mb-40">
								<div class="tp-feature-icon-2 mr-10">
									 <span>
										  <svg width="33" height="27" viewBox="0 0 33 27" fill="none" xmlns="http://www.w3.org/2000/svg">
										  <path d="M10.7222 1H31.5555V19.0556H10.7222V1Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										  <path d="M10.7222 7.94446H5.16667L1.00001 12.1111V19.0556H10.7222V7.94446Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										  <path d="M25.3055 26C23.3879 26 21.8333 24.4454 21.8333 22.5278C21.8333 20.6101 23.3879 19.0555 25.3055 19.0555C27.2232 19.0555 28.7778 20.6101 28.7778 22.5278C28.7778 24.4454 27.2232 26 25.3055 26Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										  <path d="M7.25001 26C5.33235 26 3.77778 24.4454 3.77778 22.5278C3.77778 20.6101 5.33235 19.0555 7.25001 19.0555C9.16766 19.0555 10.7222 20.6101 10.7222 22.5278C10.7222 24.4454 9.16766 26 7.25001 26Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										  </svg>
									 </span>
								</div>
								<div class="tp-feature-content-2">
									 <h3 class="tp-feature-title-2">Free Delivary</h3>
									 <p>Orders from all item</p>
								</div>
						  </div>
						  <div class="tp-feature-item-2 d-flex align-items-start mb-40">
								<div class="tp-feature-icon-2 mr-10">
									 <span>
										  <svg width="21" height="35" viewBox="0 0 21 35" fill="none" xmlns="http://www.w3.org/2000/svg">
										  <path d="M10.3636 1V34" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										  <path d="M17.8636 7H6.61365C5.22126 7 3.8859 7.55312 2.90134 8.53769C1.91677 9.52226 1.36365 10.8576 1.36365 12.25C1.36365 13.6424 1.91677 14.9777 2.90134 15.9623C3.8859 16.9469 5.22126 17.5 6.61365 17.5H14.1136C15.506 17.5 16.8414 18.0531 17.826 19.0377C18.8105 20.0223 19.3636 21.3576 19.3636 22.75C19.3636 24.1424 18.8105 25.4777 17.826 26.4623C16.8414 27.4469 15.506 28 14.1136 28H1.36365" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										  </svg>
									 </span>
								</div>
								<div class="tp-feature-content-2">
									 <h3 class="tp-feature-title-2">Return & Refunf</h3>
									 <p>Maney back guarantee</p>
								</div>
						  </div>
						  <div class="tp-feature-item-2 d-flex align-items-start mb-40">
								<div class="tp-feature-icon-2 mr-10">
									 <span>
										  <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
										  <mask id="mask0_1211_583" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="31" height="30">
										  <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H30.0024V29.9998H0V0Z" fill="white"/>
										  </mask>
										  <g mask="url(#mask0_1211_583)">
										  <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4168 27.1116C14.3017 27.9756 15.7266 27.9651 16.6056 27.0816L17.6885 26.0017C18.5285 25.1632 19.6894 24.6848 20.8728 24.6848H22.4178C23.6687 24.6848 24.6856 23.6678 24.6856 22.4184V20.875C24.6856 19.6736 25.1506 18.5441 25.9995 17.6937L27.0795 16.6122C27.519 16.1713 27.7544 15.5998 27.7529 14.9938C27.7514 14.3894 27.513 13.8209 27.0825 13.3919L26.001 12.309C25.1506 11.4525 24.6856 10.3246 24.6856 9.12318V7.58277C24.6856 6.33184 23.6687 5.3149 22.4178 5.3149H20.8758C19.6744 5.3149 18.545 4.84842 17.6945 4.00397L16.6116 2.91954C15.7101 2.02709 14.2717 2.03159 13.3913 2.91804L12.3128 3.99947C11.4519 4.84992 10.3225 5.3149 9.12553 5.3149H7.58212C6.33269 5.3164 5.31575 6.33334 5.31575 7.58277V9.12018C5.31575 10.3216 4.84927 11.451 4.00332 12.303L2.93839 13.3694C2.92789 13.3814 2.91739 13.3904 2.90689 13.4009C2.02644 14.2874 2.03094 15.7258 2.91739 16.6062L4.00032 17.6892C4.84927 18.5411 5.31575 19.6706 5.31575 20.872V22.4184C5.31575 23.6678 6.33119 24.6848 7.58212 24.6848H9.12253C10.3255 24.6863 11.4549 25.1527 12.3053 26.0002L13.3868 27.0786C13.3958 27.0891 13.4063 27.0996 13.4168 27.1116ZM14.9972 30.0002C13.8468 30.0002 12.6963 29.5652 11.8159 28.6923C11.8039 28.6803 11.7919 28.6683 11.7799 28.6548L10.715 27.5914C10.2905 27.1699 9.72352 26.9359 9.12055 26.9344H7.58164C5.09029 26.9344 3.06541 24.908 3.06541 22.4182V20.8717C3.06541 20.2688 2.82992 19.7033 2.40694 19.2773L1.32851 18.2004C-0.423392 16.4575 -0.444391 13.6197 1.27601 11.8498C1.28951 11.8363 1.30301 11.8228 1.31651 11.8093L2.40844 10.7143C2.82992 10.2899 3.06541 9.72139 3.06541 9.11993V7.58252C3.06541 5.09266 5.09029 3.06628 7.58014 3.06478H9.12505C9.72652 3.06478 10.2935 2.82929 10.724 2.40482L11.7964 1.32938C13.5498 -0.436017 16.4161 -0.445016 18.1845 1.31288L19.281 2.40932C19.7054 2.83079 20.2724 3.06478 20.8754 3.06478H22.4173C24.9086 3.06478 26.935 5.09116 26.935 7.58252V9.12293C26.935 9.72439 27.169 10.2929 27.5935 10.7203L28.6704 11.7988C29.5239 12.6462 29.9978 13.7787 30.0023 14.9861C30.0068 16.1935 29.5404 17.329 28.6899 18.1854L27.5905 19.2818C27.169 19.7063 26.935 20.2718 26.935 20.8747V22.4182C26.935 24.908 24.9086 26.9344 22.4188 26.9344H20.8724C20.2784 26.9344 19.6979 27.1744 19.2765 27.5929L18.1995 28.6698C17.3191 29.5562 16.1581 30.0002 14.9972 30.0002Z" fill="currentColor"/>
										  </g>
										  <path fill-rule="evenodd" clip-rule="evenodd" d="M11.145 19.9811C10.857 19.9811 10.569 19.8716 10.3501 19.6511C9.91058 19.2116 9.91058 18.5006 10.3501 18.0612L18.0596 10.3501C18.4991 9.91064 19.2115 9.91064 19.651 10.3501C20.0905 10.7896 20.0905 11.502 19.651 11.9415L11.94 19.6511C11.721 19.8716 11.433 19.9811 11.145 19.9811Z" fill="currentColor"/>
										  <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7544 20.2476C17.925 20.2476 17.247 19.5772 17.247 18.7477C17.247 17.9183 17.9115 17.2478 18.7409 17.2478H18.7544C19.5839 17.2478 20.2543 17.9183 20.2543 18.7477C20.2543 19.5772 19.5839 20.2476 18.7544 20.2476Z" fill="currentColor"/>
										  <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2548 12.748C10.4254 12.748 9.74744 12.0775 9.74744 11.2481C9.74744 10.4186 10.4119 9.74817 11.2413 9.74817H11.2548C12.0843 9.74817 12.7548 10.4186 12.7548 11.2481C12.7548 12.0775 12.0843 12.748 11.2548 12.748Z" fill="currentColor"/>
										  </svg>
									 </span>
								</div>
								<div class="tp-feature-content-2">
									 <h3 class="tp-feature-title-2">Member Discount</h3>
									 <p>Onevery order over $140.00</p>
								</div>
						  </div>
						  <div class="tp-feature-item-2 d-flex align-items-start mb-40">
								<div class="tp-feature-icon-2 mr-10">
									 <span>
										  <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
										  <path d="M1.5 24.3333V15C1.5 11.287 2.975 7.72602 5.60051 5.10051C8.22602 2.475 11.787 1 15.5 1C19.213 1 22.774 2.475 25.3995 5.10051C28.025 7.72602 29.5 11.287 29.5 15V24.3333" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										  <path d="M29.5 25.8889C29.5 26.714 29.1722 27.5053 28.5888 28.0888C28.0053 28.6722 27.214 29 26.3889 29H24.8333C24.0082 29 23.2169 28.6722 22.6335 28.0888C22.05 27.5053 21.7222 26.714 21.7222 25.8889V21.2222C21.7222 20.3971 22.05 19.6058 22.6335 19.0223C23.2169 18.4389 24.0082 18.1111 24.8333 18.1111H29.5V25.8889ZM1.5 25.8889C1.5 26.714 1.82778 27.5053 2.41122 28.0888C2.99467 28.6722 3.78599 29 4.61111 29H6.16667C6.99179 29 7.78311 28.6722 8.36656 28.0888C8.95 27.5053 9.27778 26.714 9.27778 25.8889V21.2222C9.27778 20.3971 8.95 19.6058 8.36656 19.0223C7.78311 18.4389 6.99179 18.1111 6.16667 18.1111H1.5V25.8889Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										  </svg>
									 </span>
								</div>
								<div class="tp-feature-content-2">
									 <h3 class="tp-feature-title-2">Support 24/7</h3>
									 <p>Contact us 24 hours a day</p>
								</div>
						  </div>
						  </div>
					 </div>
				</div>
		  </div>
		  </section>
		  <!-- feature area end -->

		  <!-- SHOP BY CATEGORY start -->
		  <section class="tp-category-area pt-115 pb-105 tp-category-plr-85" data-bg-color="#EFF1F5">
		  <div class="container-fluid">
				<div class="row">
					 <div class="col-xl-12">
						  <div class="tp-section-title-wrapper-4 mb-60 text-center">
						  <!-- <span class="tp-section-title-pre-4">Shop by Category</span> -->
						  <h3 class="tp-section-title-4">Popular on the Spiciffy store</h3>
						  </div>
					 </div>
				</div>
				<div class="row">
					 <div class="col-xl-12">
						  <div class="tp-category-slider-4">
						  <div class="tp-category-slider-active-4 swiper-container mb-70">
								<div class="swiper-wrapper">

									 @foreach ($categories as $category)

									 <div class="tp-category-item-4 p-relative z-index-1 fix swiper-slide text-center">
										  <div class="tp-category-thumb-4 include-bg" data-background="{{ asset('backend/image/category/'.$category->image) }}"></div>
										  <!-- product action -->
										  <div class="tp-product-action-3 tp-product-action-4 tp-product-action-blackStyle tp-product-action-brownStyle">

										  </div>
										  <div class="tp-category-content-4">
										  <h3 class="tp-category-title-4" style="color: white; font-size:16px;">
												<a href="{{ route('frontend.shop',['id'=>$category['id']]) }}"> <b>{{ ucfirst(strtolower( $category->category_name)) }}</b> </a>
										  </h3>
										  <div class="tp-category-price-wrapper-4">
												{{-- <span class="tp-category-price-4">$48.00</span> --}}

										  </div>
										  </div>
									 </div>

									 @endforeach

								</div>
						  </div>
						  <div class="tp-category-swiper-scrollbar tp-swiper-scrollbar"></div>
						  </div>
					 </div>
				</div>
		  </div>
		  </section>
		  <!-- SHOP BY CATEGORY end -->

		  <!-- FEATURED PRODUCTS start -->
		  <section class="tp-special-area fix">
		  <div class="container">
				<div class="row gx-2">
					 <div class="col-xl-5 col-md-6">
						<div class="tp-special-slider-thumb">
						    <div class="tp-special-thumb">
								<img src="assets/img/product/special/big/special-big-1.jpeg" alt="">
							</div>
						</div>
					 </div>
					 <div class="col-xl-7 col-md-6">
						  <div class="tp-special-wrapper grey-bg-9 pt-85 pb-35">
						  <div class="tp-section-title-wrapper-3 mb-40 text-center">
								<span class="tp-section-title-pre-3">Trending This Week’s</span>
								<h3 class="tp-section-title-3">Featured products</h3>
						  </div>
						  <div class="tp-special-slider ">
								<div class="row gx-0 justify-content-center">
									 <div class="col-xl-5 col-lg-7 col-md-9 col-sm-7">
										  <div class="tp-special-slider-inner p-relative  ">
										  <div class="tp-special-slider-active swiper-container">
												<div class="swiper-wrapper">

												@foreach ($featured_products as $featured)

													 <div class="tp-special-item swiper-slide grey-bg-9">
														  <div class="tp-product-item-3 mb-50 text-center">
														  <div class="tp-product-thumb-3 mb-15 fix p-relative z-index-1">
																<a href="{{ route('frontend.single_product',['id'=>$featured['id']]) }}">
																	<img src="{{ asset('backend/images/product_images/'.$featured->image) }}" alt="" style="width: 320px; height: 320px;">
																</a>
														  </div>
														  <div class="tp-product-content-3">

																<h3 class="tp-product-title-3">
																	 <a href="{{ route('frontend.single_product',['id'=>$featured['id']]) }}"> {{ $featured->name}} </a>
																</h3>
																<div class="tp-product-price-wrapper-3">
																	 <!-- <span class="tp-product-price-3">₹ {{ $featured->amount}} </span> -->
																</div>
														  </div>
														  </div>
													 </div>

												 @endforeach

												</div>
										  </div>
										  <!-- dot style -->
										  <div class="tp-swiper-dot tp-special-slider-dot d-sm-none text-center "></div>
										  <div class="tp-special-arrow d-none d-sm-block">
												<button class="tp-special-slider-button-prev">
													 <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
														  <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
													 </svg>
												</button>

												<button class="tp-special-slider-button-next">
													 <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
														  <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
													 </svg>
												</button>
										  </div>
										  </div>
									 </div>
								</div>
						  </div>
						  </div>
					 </div>
				</div>
		  </div>
		  </section>
		  <!-- FEATURED PRODUCTS end -->

		  <!-- best area start -->
		  <section class="tp-best-area pt-115">
		  <div class="container">
				<div class="row">
					 <div class="col-xl-12">
						  <div class="tp-section-title-wrapper-4 mb-50 text-center">
						  <span class="tp-section-title-pre-4">Best Sellers This Week’s</span>
						  <h3 class="tp-section-title-4">Top Sellers </h3>
						  </div>
					 </div>
				</div>
				<div class="row">
					 <div class="col-xl-12">
						  <div class="tp-best-slider">
						  <div class="tp-best-slider-active swiper-container mb-10">
								<div class="swiper-wrapper">
                                @foreach ($product_ids as $item)

                                     @php   $top_sellers = App\Models\VariantOptions::where('id',$item)->get();  @endphp

                                    @foreach ($top_sellers as $options)

                                        @php
                                        $pid 		= $options->id;
                                        $min_amount = App\Models\ProductAmountOptions::where('product_id','=', $pid)->where('is_deleted', 0)->min('amount');
                                        @endphp

                                        <div class="tp-best-item-4 swiper-slide">
                                            <div class="tp-product-item-4 p-relative mb-40">
                                            <div class="tp-product-thumb-4 w-img fix">
                                                <a href="{{ route('frontend.single_product',['id'=>$options['id']]) }}">
                                                    <img src="{{ asset('backend/images/product_images/'.$options->support_image1) }}" alt="" height="300px" width="350px">
                                                </a>
                                            </div>
                                            <div class="tp-product-content-4">
                                                <h3 class="tp-product-title-4">
                                                    <a href="{{ route('frontend.single_product',['id'=>$options['id']]) }}">{{ $options->name}} - ₹{{ $min_amount }}</a>
                                                </h3>
                                            </div>
                                            </div>
                                        </div>

                                    @endforeach
                                @endforeach
								</div>
						  </div>
						  <div class="tp-best-swiper-scrollbar tp-swiper-scrollbar"></div>
						  </div>
					 </div>
				</div>
		  </div>
		  </section>
		  <!-- best area end -->

		  <br><br>

		  <!-- TESTIMONIAL start -->
		  @if(count($contacts)>0)

          <section class="tp-testimonial-area pt-115 pb-100">
			<div class="container">
				 <div class="row">
					  <div class="col-xl-12">
							<div class="tp-section-title-wrapper-3 mb-45 text-center">
							<span class="tp-section-title-pre-3">Customers Review</span>
							<h3 class="tp-section-title-3">What our Clients say</h3>
							</div>
					  </div>
				 </div>
				 <div class="row">
					  <div class="col-xl-12" >
							<div class="tp-testimonial-slider-3">
							<div class="tp-testimoinal-slider-active-3 swiper-container">
								 <div class="swiper-wrapper" style="width: 500px; height: 300px ">

                                    @foreach ($contacts as $item)

									  <div class="tp-testimonial-item-3 swiper-slide grey-bg-7 p-relative z-index-1">
											<div class="tp-testimonial-shape-3">
											<img class="tp-testimonial-shape-3-quote" src="assets/img/testimonial/testimonial-quote.png" alt="">
											</div>

											<div class="tp-testimonial-content-3">
											<p> {{ $item->message}} </p>
											</div>
											<div class="tp-testimonial-user-wrapper-3 d-flex">
											<div class="tp-testimonial-user-3 d-flex align-items-center">
												 <div class="tp-testimonial-avater-3 mr-10">
													  <img src="assets/img/users/user-1.jpg" alt="">
												 </div>
												 <div class="tp-testimonial-user-3-info tp-testimonial-user-translate">
													  <h3 class="tp-testimonial-user-3-title">{{ $item->name}} </h3>
													  {{-- <span class="tp-testimonial-3-designation">CO Founder</span> --}}
												 </div>
											</div>
											</div>
									  </div>

                                    @endforeach





								 </div>
							</div>
							<div class="tp-testimoinal-slider-dot-3 tp-swiper-dot-border text-center mt-50"></div>
							</div>
					  </div>
				 </div>
			</div>
		  </section>

		  @endif
		  <!-- TESTIMONIAL end -->



		  <!-- brand area start -->
		  {{-- <section class="tp-brand-area pt-120">
		  <div class="container">
				<div class="row">
					 <div class="col-xl-12">
						  <div class="tp-brand-slider p-relative">
						  <div class="tp-brand-slider-active swiper-container">
								<div class="swiper-wrapper">
									 <div class="tp-brand-item swiper-slide text-center">
										  <a href="index-4.html#">
										  <img src="assets/img/brand/logo_01.png" alt="">
										  </a>
									 </div>
									 <div class="tp-brand-item swiper-slide text-center">
										  <a href="index-4.html#">
										  <img src="assets/img/brand/logo_02.png" alt="">
										  </a>
									 </div>
									 <div class="tp-brand-item swiper-slide text-center">
										  <a href="index-4.html#">
										  <img src="assets/img/brand/logo_03.png" alt="">
										  </a>
									 </div>
									 <div class="tp-brand-item swiper-slide text-center">
										  <a href="index-4.html#">
										  <img src="assets/img/brand/logo_04.png" alt="">
										  </a>
									 </div>
									 <div class="tp-brand-item swiper-slide text-center">
										  <a href="index-4.html#">
										  <img src="assets/img/brand/logo_05.png" alt="">
										  </a>
									 </div>
								</div>
						  </div>
						  <div class="tp-brand-slider-arrow">
								<button class="tp-brand-slider-button-prev">
									 <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										  <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
									 </svg>
								</button>
								<button class="tp-brand-slider-button-next">
									 <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										  <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
									 </svg>
								</button>
						  </div>
						  </div>
					 </div>
				</div>
		  </div>
		  </section> --}}
		  <!-- brand area end -->


		  <div class="modal fade tp-product-modal tp-product-modal-styleBrown tp-product-modal-styleBrown-2" id="producQuickViewModal" tabindex="-1" aria-labelledby="producQuickViewModal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					 <div class="tp-product-modal-content d-lg-flex align-items-start">
						  <button type="button" class="tp-product-modal-close-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal"><i class="fa-regular fa-xmark"></i></button>
						  <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">
						  <nav>
								<div class="nav nav-tabs flex-sm-column " id="productDetailsNavThumb" role="tablist">
									 <button class="nav-link active" id="nav-1-tab" data-bs-toggle="tab" data-bs-target="#nav-1" type="button" role="tab" aria-controls="nav-1" aria-selected="true">
										  <img src="assets/img/product/details/4/nav/product-details-nav-1.jpg" alt="">
									 </button>
									 <button class="nav-link" id="nav-2-tab" data-bs-toggle="tab" data-bs-target="#nav-2" type="button" role="tab" aria-controls="nav-2" aria-selected="false">
										  <img src="assets/img/product/details/4/nav/product-details-nav-2.jpg" alt="">
									 </button>
									 <button class="nav-link" id="nav-3-tab" data-bs-toggle="tab" data-bs-target="#nav-3" type="button" role="tab" aria-controls="nav-3" aria-selected="false">
										  <img src="assets/img/product/details/4/nav/product-details-nav-3.jpg" alt="">
									 </button>
									 <button class="nav-link" id="nav-4-tab" data-bs-toggle="tab" data-bs-target="#nav-4" type="button" role="tab" aria-controls="nav-4" aria-selected="false">
										  <img src="assets/img/product/details/4/nav/product-details-nav-4.jpg" alt="">
									 </button>
								</div>
						  </nav>
						  <div class="tab-content m-img" id="productDetailsNavContent">
								<div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab" tabindex="0">
									 <div class="tp-product-details-nav-main-thumb">
										  <img src="assets/img/product/details/4/main/product-details-main-1.jpg" alt="">
									 </div>
								</div>
								<div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab" tabindex="0">
									 <div class="tp-product-details-nav-main-thumb">
										  <img src="assets/img/product/details/4/main/product-details-main-2.jpg" alt="">
									 </div>
								</div>
								<div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab" tabindex="0">
									 <div class="tp-product-details-nav-main-thumb">
										  <img src="assets/img/product/details/4/main/product-details-main-3.jpg" alt="">
									 </div>
								</div>
								<div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-4-tab" tabindex="0">
									 <div class="tp-product-details-nav-main-thumb">
										  <img src="assets/img/product/details/4/main/product-details-main-4.jpg" alt="">
									 </div>
								</div>
								</div>
						  </div>
						  <div class="tp-product-details-wrapper">
						  <div class="tp-product-details-category">
								<span>jewellery, Diamond</span>
						  </div>
						  <h3 class="tp-product-details-title">Gold malachite earrings</h3>

						  <!-- inventory details -->
						  <div class="tp-product-details-inventory d-flex align-items-center mb-10">
								<div class="tp-product-details-stock mb-10">
									 <span>In Stock</span>
								</div>
								<div class="tp-product-details-rating-wrapper d-flex align-items-center mb-10">
									 <div class="tp-product-details-rating">
										  <span><i class="fa-solid fa-star"></i></span>
										  <span><i class="fa-solid fa-star"></i></span>
										  <span><i class="fa-solid fa-star"></i></span>
										  <span><i class="fa-solid fa-star"></i></span>
										  <span><i class="fa-solid fa-star"></i></span>
									 </div>
									 <div class="tp-product-details-reviews">
										  <span>(36 Reviews)</span>
									 </div>
								</div>
						  </div>
						  <p>A Screen Everyone Will Love: Whether your family is streaming or video chatting with friends tablet A8... <span>See more</span></p>

						  <!-- price -->
						  <div class="tp-product-details-price-wrapper mb-20">
								<span class="tp-product-details-price old-price">$320.00</span>
								<span class="tp-product-details-price new-price">$236.00</span>
						  </div>

						  <!-- variations -->
						  <div class="tp-product-details-variation">
								<!-- single item -->
								<div class="tp-product-details-variation-item">
									 <h4 class="tp-product-details-variation-title">Color :</h4>
									 <div class="tp-product-details-variation-list">
										  <button type="button" class="color tp-color-variation-btn" >
										  <span data-bg-color="#F8B655"></span>
										  <span class="tp-color-variation-tootltip">Yellow</span>
										  </button>
										  <button type="button" class="color tp-color-variation-btn active" >
										  <span data-bg-color="#CBCBCB"></span>
										  <span class="tp-color-variation-tootltip">Gray</span>
										  </button>
										  <button type="button" class="color tp-color-variation-btn" >
										  <span data-bg-color="#494E52"></span>
										  <span class="tp-color-variation-tootltip">Black</span>
										  </button>
										  <button type="button" class="color tp-color-variation-btn" >
										  <span data-bg-color="#B4505A"></span>
										  <span class="tp-color-variation-tootltip">Brown</span>
										  </button>
									 </div>
								</div>
						  </div>

						  <!-- actions -->
						  <div class="tp-product-details-action-wrapper">
								<h3 class="tp-product-details-action-title">Quantity</h3>
								<div class="tp-product-details-action-item-wrapper d-flex align-items-center">
									 <div class="tp-product-details-quantity">
										  <div class="tp-product-quantity mb-15 mr-15">
										  <span class="tp-cart-minus">
												<svg width="11" height="2" viewBox="0 0 11 2" fill="none" xmlns="http://www.w3.org/2000/svg">
													 <path d="M1 1H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
										  </span>
										  <input class="tp-cart-input" type="text" value="1">
										  <span class="tp-cart-plus">
												<svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
													 <path d="M1 6H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
													 <path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
										  </span>
										  </div>
									 </div>
									 <div class="tp-product-details-add-to-cart mb-15 w-100">
										  <button class="tp-product-details-add-to-cart-btn w-100">Add To Cart</button>
									 </div>
								</div>
								<button class="tp-product-details-buy-now-btn w-100">Buy Now</button>
						  </div>
						  <div class="tp-product-details-action-sm">
								<button type="button" class="tp-product-details-action-sm-btn">
									 <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										  <path d="M1 3.16431H10.8622C12.0451 3.16431 12.9999 4.08839 12.9999 5.23315V7.52268" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
										  <path d="M3.25177 0.985168L1 3.16433L3.25177 5.34354" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
										  <path d="M12.9999 12.5983H3.13775C1.95486 12.5983 1 11.6742 1 10.5295V8.23993" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
										  <path d="M10.748 14.7774L12.9998 12.5983L10.748 10.4191" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
									 </svg>
									 Compare
								</button>
								<button type="button" class="tp-product-details-action-sm-btn">
									 <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										  <path fill-rule="evenodd" clip-rule="evenodd" d="M2.33541 7.54172C3.36263 10.6766 7.42094 13.2113 8.49945 13.8387C9.58162 13.2048 13.6692 10.6421 14.6635 7.5446C15.3163 5.54239 14.7104 3.00621 12.3028 2.24514C11.1364 1.8779 9.77578 2.1014 8.83648 2.81432C8.64012 2.96237 8.36757 2.96524 8.16974 2.81863C7.17476 2.08487 5.87499 1.86999 4.69024 2.24514C2.28632 3.00549 1.68259 5.54167 2.33541 7.54172ZM8.50115 15C8.4103 15 8.32018 14.9784 8.23812 14.9346C8.00879 14.8117 2.60674 11.891 1.29011 7.87081C1.28938 7.87081 1.28938 7.8701 1.28938 7.8701C0.462913 5.33895 1.38316 2.15812 4.35418 1.21882C5.7492 0.776121 7.26952 0.97088 8.49895 1.73195C9.69029 0.993159 11.2729 0.789057 12.6401 1.21882C15.614 2.15956 16.5372 5.33966 15.7115 7.8701C14.4373 11.8443 8.99571 14.8088 8.76492 14.9332C8.68286 14.9777 8.592 15 8.50115 15Z" fill="currentColor"/>
										  <path d="M8.49945 13.8387L8.42402 13.9683L8.49971 14.0124L8.57526 13.9681L8.49945 13.8387ZM14.6635 7.5446L14.5209 7.4981L14.5207 7.49875L14.6635 7.5446ZM12.3028 2.24514L12.348 2.10211L12.3478 2.10206L12.3028 2.24514ZM8.83648 2.81432L8.92678 2.93409L8.92717 2.9338L8.83648 2.81432ZM8.16974 2.81863L8.25906 2.69812L8.25877 2.69791L8.16974 2.81863ZM4.69024 2.24514L4.73548 2.38815L4.73552 2.38814L4.69024 2.24514ZM8.23812 14.9346L8.16727 15.0668L8.16744 15.0669L8.23812 14.9346ZM1.29011 7.87081L1.43266 7.82413L1.39882 7.72081H1.29011V7.87081ZM1.28938 7.8701L1.43938 7.87009L1.43938 7.84623L1.43197 7.82354L1.28938 7.8701ZM4.35418 1.21882L4.3994 1.36184L4.39955 1.36179L4.35418 1.21882ZM8.49895 1.73195L8.42 1.85949L8.49902 1.90841L8.57801 1.85943L8.49895 1.73195ZM12.6401 1.21882L12.6853 1.0758L12.685 1.07572L12.6401 1.21882ZM15.7115 7.8701L15.5689 7.82356L15.5686 7.8243L15.7115 7.8701ZM8.76492 14.9332L8.69378 14.8011L8.69334 14.8013L8.76492 14.9332ZM2.19287 7.58843C2.71935 9.19514 4.01596 10.6345 5.30013 11.744C6.58766 12.8564 7.88057 13.6522 8.42402 13.9683L8.57487 13.709C8.03982 13.3978 6.76432 12.6125 5.49626 11.517C4.22484 10.4185 2.97868 9.02313 2.47795 7.49501L2.19287 7.58843ZM8.57526 13.9681C9.12037 13.6488 10.4214 12.8444 11.7125 11.729C12.9999 10.6167 14.2963 9.17932 14.8063 7.59044L14.5207 7.49875C14.0364 9.00733 12.7919 10.4 11.5164 11.502C10.2446 12.6008 8.9607 13.3947 8.42364 13.7093L8.57526 13.9681ZM14.8061 7.59109C15.1419 6.5613 15.1554 5.39131 14.7711 4.37633C14.3853 3.35729 13.5989 2.49754 12.348 2.10211L12.2576 2.38816C13.4143 2.75381 14.1347 3.54267 14.4905 4.48255C14.8479 5.42648 14.8379 6.52568 14.5209 7.4981L14.8061 7.59109ZM12.3478 2.10206C11.137 1.72085 9.72549 1.95125 8.7458 2.69484L8.92717 2.9338C9.82606 2.25155 11.1357 2.03494 12.2577 2.38821L12.3478 2.10206ZM8.74618 2.69455C8.60221 2.8031 8.40275 2.80462 8.25906 2.69812L8.08043 2.93915C8.33238 3.12587 8.67804 3.12163 8.92678 2.93409L8.74618 2.69455ZM8.25877 2.69791C7.225 1.93554 5.87527 1.71256 4.64496 2.10213L4.73552 2.38814C5.87471 2.02742 7.12452 2.2342 8.08071 2.93936L8.25877 2.69791ZM4.64501 2.10212C3.39586 2.49722 2.61099 3.35688 2.22622 4.37554C1.84299 5.39014 1.85704 6.55957 2.19281 7.58826L2.478 7.49518C2.16095 6.52382 2.15046 5.42513 2.50687 4.48154C2.86175 3.542 3.58071 2.7534 4.73548 2.38815L4.64501 2.10212ZM8.50115 14.85C8.43415 14.85 8.36841 14.8341 8.3088 14.8023L8.16744 15.0669C8.27195 15.1227 8.38645 15.15 8.50115 15.15V14.85ZM8.30897 14.8024C8.19831 14.7431 6.7996 13.9873 5.26616 12.7476C3.72872 11.5046 2.07716 9.79208 1.43266 7.82413L1.14756 7.9175C1.81968 9.96978 3.52747 11.7277 5.07755 12.9809C6.63162 14.2373 8.0486 15.0032 8.16727 15.0668L8.30897 14.8024ZM1.29011 7.72081C1.31557 7.72081 1.34468 7.72745 1.37175 7.74514C1.39802 7.76231 1.41394 7.78437 1.42309 7.8023C1.43191 7.81958 1.43557 7.8351 1.43727 7.84507C1.43817 7.8504 1.43869 7.85518 1.43898 7.85922C1.43913 7.86127 1.43923 7.8632 1.43929 7.865C1.43932 7.86591 1.43934 7.86678 1.43936 7.86763C1.43936 7.86805 1.43937 7.86847 1.43937 7.86888C1.43937 7.86909 1.43937 7.86929 1.43938 7.86949C1.43938 7.86959 1.43938 7.86969 1.43938 7.86979C1.43938 7.86984 1.43938 7.86992 1.43938 7.86994C1.43938 7.87002 1.43938 7.87009 1.28938 7.8701C1.13938 7.8701 1.13938 7.87017 1.13938 7.87025C1.13938 7.87027 1.13938 7.87035 1.13938 7.8704C1.13938 7.8705 1.13938 7.8706 1.13938 7.8707C1.13938 7.8709 1.13938 7.87111 1.13938 7.87131C1.13939 7.87173 1.13939 7.87214 1.1394 7.87257C1.13941 7.87342 1.13943 7.8743 1.13946 7.8752C1.13953 7.87701 1.13962 7.87896 1.13978 7.88103C1.14007 7.88512 1.14059 7.88995 1.14151 7.89535C1.14323 7.90545 1.14694 7.92115 1.15585 7.93861C1.16508 7.95672 1.18114 7.97896 1.20762 7.99626C1.2349 8.01409 1.26428 8.02081 1.29011 8.02081V7.72081ZM1.43197 7.82354C0.623164 5.34647 1.53102 2.26869 4.3994 1.36184L4.30896 1.0758C1.23531 2.04755 0.302663 5.33142 1.14679 7.91665L1.43197 7.82354ZM4.39955 1.36179C5.7527 0.932384 7.22762 1.12136 8.42 1.85949L8.57791 1.60441C7.31141 0.820401 5.74571 0.619858 4.30881 1.07585L4.39955 1.36179ZM8.57801 1.85943C9.73213 1.14371 11.2694 0.945205 12.5951 1.36192L12.685 1.07572C11.2763 0.632908 9.64845 0.842602 8.4199 1.60447L8.57801 1.85943ZM12.5948 1.36184C15.4664 2.27018 16.3769 5.34745 15.5689 7.82356L15.8541 7.91663C16.6975 5.33188 15.7617 2.04893 12.6853 1.07581L12.5948 1.36184ZM15.5686 7.8243C14.9453 9.76841 13.2952 11.4801 11.7526 12.7288C10.2142 13.974 8.80513 14.7411 8.69378 14.8011L8.83606 15.0652C8.9555 15.0009 10.3826 14.2236 11.9413 12.9619C13.4957 11.7037 15.2034 9.94602 15.8543 7.91589L15.5686 7.8243ZM8.69334 14.8013C8.6337 14.8337 8.56752 14.85 8.50115 14.85V15.15C8.61648 15.15 8.73201 15.1217 8.83649 15.065L8.69334 14.8013Z" fill="currentColor"/>
										  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.8384 6.93209C12.5548 6.93209 12.3145 6.71865 12.2911 6.43693C12.2427 5.84618 11.8397 5.34743 11.266 5.1656C10.9766 5.07361 10.8184 4.76962 10.9114 4.48718C11.0059 4.20402 11.3129 4.05023 11.6031 4.13934C12.6017 4.45628 13.3014 5.32371 13.3872 6.34925C13.4113 6.64606 13.1864 6.90622 12.8838 6.92993C12.8684 6.93137 12.8538 6.93209 12.8384 6.93209Z" fill="currentColor"/>
										  <path d="M12.8384 6.93209C12.5548 6.93209 12.3145 6.71865 12.2911 6.43693C12.2427 5.84618 11.8397 5.34743 11.266 5.1656C10.9766 5.07361 10.8184 4.76962 10.9114 4.48718C11.0059 4.20402 11.3129 4.05023 11.6031 4.13934C12.6017 4.45628 13.3014 5.32371 13.3872 6.34925C13.4113 6.64606 13.1864 6.90622 12.8838 6.92993C12.8684 6.93137 12.8538 6.93209 12.8384 6.93209" stroke="currentColor" stroke-width="0.3"/>
									 </svg>
									 Add Wishlist
								</button>
								<button type="button" class="tp-product-details-action-sm-btn">
									 <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										  <path d="M8.575 12.6927C8.775 12.6927 8.94375 12.6249 9.08125 12.4895C9.21875 12.354 9.2875 12.1878 9.2875 11.9907C9.2875 11.7937 9.21875 11.6275 9.08125 11.492C8.94375 11.3565 8.775 11.2888 8.575 11.2888C8.375 11.2888 8.20625 11.3565 8.06875 11.492C7.93125 11.6275 7.8625 11.7937 7.8625 11.9907C7.8625 12.1878 7.93125 12.354 8.06875 12.4895C8.20625 12.6249 8.375 12.6927 8.575 12.6927ZM8.55625 5.0638C8.98125 5.0638 9.325 5.17771 9.5875 5.40553C9.85 5.63335 9.98125 5.92582 9.98125 6.28294C9.98125 6.52924 9.90625 6.77245 9.75625 7.01258C9.60625 7.25272 9.3625 7.5144 9.025 7.79763C8.7 8.08087 8.44063 8.3795 8.24688 8.69352C8.05313 9.00754 7.95625 9.29385 7.95625 9.55246C7.95625 9.68792 8.00938 9.79567 8.11563 9.87572C8.22188 9.95576 8.34375 9.99578 8.48125 9.99578C8.63125 9.99578 8.75625 9.94653 8.85625 9.84801C8.95625 9.74949 9.01875 9.62635 9.04375 9.47857C9.08125 9.23228 9.16562 9.0137 9.29688 8.82282C9.42813 8.63195 9.63125 8.42568 9.90625 8.20402C10.2812 7.89615 10.5531 7.58829 10.7219 7.28042C10.8906 6.97256 10.975 6.62775 10.975 6.246C10.975 5.59333 10.7594 5.06996 10.3281 4.67589C9.89688 4.28183 9.325 4.0848 8.6125 4.0848C8.1375 4.0848 7.7 4.17716 7.3 4.36187C6.9 4.54659 6.56875 4.81751 6.30625 5.17463C6.20625 5.31009 6.16563 5.44863 6.18438 5.59025C6.20313 5.73187 6.2625 5.83962 6.3625 5.91351C6.5 6.01202 6.64688 6.04281 6.80313 6.00587C6.95937 5.96892 7.0875 5.88272 7.1875 5.74726C7.35 5.5256 7.54688 5.35627 7.77813 5.23929C8.00938 5.1223 8.26875 5.0638 8.55625 5.0638ZM8.5 15.7775C7.45 15.7775 6.46875 15.5897 5.55625 15.2141C4.64375 14.8385 3.85 14.3182 3.175 13.6532C2.5 12.9882 1.96875 12.2062 1.58125 11.3073C1.19375 10.4083 1 9.43547 1 8.38873C1 7.35431 1.19375 6.38762 1.58125 5.48866C1.96875 4.58969 2.5 3.80772 3.175 3.14273C3.85 2.47775 4.64375 1.95438 5.55625 1.57263C6.46875 1.19088 7.45 1 8.5 1C9.5375 1 10.5125 1.19088 11.425 1.57263C12.3375 1.95438 13.1313 2.47775 13.8063 3.14273C14.4813 3.80772 15.0156 4.58969 15.4094 5.48866C15.8031 6.38762 16 7.35431 16 8.38873C16 9.43547 15.8031 10.4083 15.4094 11.3073C15.0156 12.2062 14.4813 12.9882 13.8063 13.6532C13.1313 14.3182 12.3375 14.8385 11.425 15.2141C10.5125 15.5897 9.5375 15.7775 8.5 15.7775ZM8.5 14.6692C10.2625 14.6692 11.7656 14.0534 13.0094 12.822C14.2531 11.5905 14.875 10.1128 14.875 8.38873C14.875 6.6647 14.2531 5.18695 13.0094 3.95549C11.7656 2.72404 10.2625 2.10831 8.5 2.10831C6.7125 2.10831 5.20312 2.72404 3.97188 3.95549C2.74063 5.18695 2.125 6.6647 2.125 8.38873C2.125 10.1128 2.74063 11.5905 3.97188 12.822C5.20312 14.0534 6.7125 14.6692 8.5 14.6692Z" fill="currentColor" stroke="currentColor" stroke-width="0.3"/>
									 </svg>
									 Ask a question
								</button>
						  </div>
						  </div>
					 </div>
				</div>
		  </div>
		  </div>
	 </main>

<script src="assets/js/main.js"></script>

@include('frontend.templates.footer')
