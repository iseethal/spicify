@include('frontend.templates.header')
@include('frontend.templates.toastr-notifications')

<style>
    .tp-contact-btn:hover {
        color: var(--tp-common-white);
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
                        <h3 class="breadcrumb__title">Keep In Touch with Us</h3>
                        <div class="breadcrumb__list">
                            <span><a href="{{ route('frontend.home') }}">Home</a></span>
                            <span>Contact</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->


    <!-- contact area start -->
    <section class="tp-contact-area pb-100">
        <div class="container">
            <div class="tp-contact-inner">
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="tp-contact-wrapper">
                            <h3 class="tp-contact-title">Sent A Message</h3>

                            <form action="{{ route('contact.save') }}" method="POST">
                                @csrf

                                <div class="tp-contact-form">
                                    <form id="contact-form" action="assets/mail.php" method="POST">
                                        <div class="tp-contact-input-wrapper">
                                            <div class="tp-contact-input-box">
                                                <div class="tp-contact-input">
                                                    <input name="name" id="name" type="text"
                                                        placeholder="name"
                                                        @auth value="{{ Auth::user()->name }}" @endauth required>
                                                </div>
                                                <div class="tp-contact-input-title">
                                                    <label for="name">Your Name</label>
                                                </div>
                                            </div>
                                            <div class="tp-contact-input-box">
                                                <div class="tp-contact-input">
                                                    <input name="phone" type="text" placeholder="phone" required>
                                                </div>
                                                <div class="tp-contact-input-title">
                                                    <label for="email">Your Phone</label>
                                                </div>
                                            </div>
                                            <div class="tp-contact-input-box">
                                                <div class="tp-contact-input">
                                                    <input name="email" id="email" type="email"
                                                        placeholder="email"
                                                        @auth value="{{ Auth::user()->email }}" @endauth required>
                                                </div>
                                                <div class="tp-contact-input-title">
                                                    <label for="email">Your Email</label>
                                                </div>
                                            </div>
                                            <div class="tp-contact-input-box">
                                                <div class="tp-contact-input">
                                                    <input name="subject" id="subject" type="text"
                                                        placeholder="Write your subject">
                                                </div>
                                                <div class="tp-contact-input-title">
                                                    <label for="subject">Subject</label>
                                                </div>
                                            </div>
                                            <div class="tp-contact-input-box">
                                                <div class="tp-contact-input">
                                                    <textarea id="message" name="message" placeholder="Write your message here..."></textarea>
                                                </div>
                                                <div class="tp-contact-input-title">
                                                    <label for="message">Your Message</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tp-contact-btn">
                                            <button type="submit">Send Message</button>
                                        </div>
                                    </form>
                                    <p class="ajax-response"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="tp-contact-info-wrapper">
                            <div class="tp-contact-info-item">
                                <div class="tp-contact-info-icon">
                                    <span>
                                        <img src="assets/img/contact/contact-icon-1.png" alt="">
                                    </span>
                                </div>
                                <div class="tp-contact-info-content">
                                    <p data-info="mail"><a href="mailto:support@spiciffy.com">support@spiciffy.com</a>
                                    </p>
                                    <p data-info="phone">
                                        <a href="tel: 9090299494">9090 29 9494</a><br>
                                        <a href="tel: 9090299595">9090 29 9595</a>
                                    </p>
                                </div>
                            </div>
                            <div class="tp-contact-info-item">
                                <div class="tp-contact-info-icon">
                                    <span>
                                        <img src="assets/img/contact/contact-icon-2.png" alt="">
                                    </span>
                                </div>
                                <div class="tp-contact-info-content">
                                    <p>
                                        <a href="https://maps.app.goo.gl/49Nj2ZQLBNDDxFVM7" target="_blank">Ekatra Enterprises<br> 29A, Sathvikam, Vrindavan Nagar, Ezhacherry PO, Kollappally, Kottayam 686651, Kerala 
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <!-- <div class="tp-contact-info-item">
                                <div class="tp-contact-info-icon">
                                    <span>
                                        <img src="assets/img/contact/contact-icon-3.png" alt="">
                                    </span>
                                </div>
                                <div class="tp-contact-info-content">
                                    <div class="tp-contact-social-wrapper mt-5">
                                        <h4 class="tp-contact-social-title">Find on social media</h4>

                                        <div class="tp-contact-social-icon">
                                            <a href="contact.html#"><i class="fa-brands fa-facebook-f"></i></a>
                                            <a href="contact.html#"><i class="fa-brands fa-twitter"></i></a>
                                            <a href="contact.html#"><i class="fa-brands fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact area end -->

    <!-- map area start -->
    <section class="tp-map-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-map-wrapper">
                        <div class="tp-map-hotspot">
                            <span class="tp-hotspot tp-pulse-border">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="6" cy="6" r="6" fill="#821F40" />
                                </svg>
                            </span>
                        </div>
                        <div class="tp-map-iframe">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1966.0179709191696!2d76.6920439!3d9.763023!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b07cf3df72a6977%3A0xfdf08977207d6539!2sEkatra%20Enterprises!5e0!3m2!1sen!2sin!4v1704878133428!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- map area end -->

</main>


@include('frontend.templates.footer')
