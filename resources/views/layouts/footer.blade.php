{{-- ==== footer start ==== --}}
<footer class="footer section pb-0 bg-[#62068d]">
    <div class="container">
        <div class="row gaper">
            {{-- Company Info --}}
            <div class="col-12 col-lg-5 col-xl-5">
                <div class="footer__single">
                    <a href="{{ route('home.page') }}" class="logo">
                        <img src="{{ asset('logo-wt.svg') }}" alt="AI Digital Agency" style="height:40px;width:auto;filter:brightness(0) invert(1);">
                    </a>
                    <div class="footer__single-meta">
                        <a href="https://maps.google.com" target="_blank">
                            <i class="fa-sharp fa-solid fa-location-dot"></i>
                            Lagos State, Nigeria
                        </a>
                        <a href="tel:+2347077776734">
                            <i class="fa-sharp fa-solid fa-phone-volume"></i>
                            +234 707 777 6734
                        </a>
                        <a href="mailto:aidigitalagency08@gmail.com">
                            <i class="fa-sharp fa-solid fa-envelope"></i>
                            aidigitalagency08@gmail.com
                        </a>
                    </div>
                    <div class="footer__cta text-start">
                        <a href="{{ route('contact.page') }}" class="btn btn--secondary">Book a Call Now</a>
                    </div>
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="col-12 col-lg-2 col-xl-2">
                <div class="footer__single">
                    <div class="footer__single-intro">
                        <h5>Discover</h5>
                    </div>
                    <div class="footer__single-content">
                        <ul>
                            <li><a href="{{ route('about.page') }}">About Us</a></li>
                            <li><a href="{{ route('services.page') }}">Our Services</a></li>
                            <li><a href="{{ route('blog.list') }}">News & Blog</a></li>
                            <li><a href="{{ route('contact.page') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Services --}}
            <div class="col-12 col-lg-2 col-xl-2">
                <div class="footer__single">
                    <div class="footer__single-intro">
                        <h5>Services</h5>
                    </div>
                    <div class="footer__single-content">
                        <ul>
                            <li><a href="{{ route('services.page') }}">Content Creation</a></li>
                            <li><a href="{{ route('services.page') }}">Social Media Mgmt</a></li>
                            <li><a href="{{ route('services.page') }}">Content Strategy</a></li>
                            <li><a href="{{ route('services.page') }}">Community Mgmt</a></li>
                            <li><a href="{{ route('services.page') }}">Brand Positioning</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Newsletter --}}
            <div class="col-12 col-lg-3 col-xl-3">
                <div class="footer__single">
                    <div class="footer__single-intro">
                        <h5>Stay in the Loop</h5>
                    </div>
                    <div class="footer__single-content">
                        <p>Get insights on social media strategy and brand growth straight to your inbox.</p>
                        <div class="footer__single-form">
                            <form action="#" method="post">
                                @csrf
                                <div class="input-email">
                                    <input type="email" name="subscribe_email" placeholder="Enter Your Email" required>
                                    <button type="submit" class="subscribe" aria-label="Subscribe">
                                        <i class="fa-sharp fa-solid fa-paper-plane"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Copyright bar --}}
        <div class="row">
            <div class="col-12">
                <div class="footer__copyright">
                    <div class="row align-items-center gaper">
                        <div class="col-12 col-lg-8">
                            <div class="footer__copyright-text text-center text-lg-start">
                                <p>Copyright &copy; <span id="copyYear"></span> AI Digital Agency. All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="social justify-content-center justify-content-lg-end">
                                <a href="#" target="_blank" aria-label="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#" target="_blank" aria-label="twitter"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#" target="_blank" aria-label="instagram"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#" target="_blank" aria-label="linkedin"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#" target="_blank" aria-label="behance"><i class="fa-brands fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
{{-- ==== / footer end ==== --}}
