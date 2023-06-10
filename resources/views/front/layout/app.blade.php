@include('front.layout.meta')

<body>
<div class="content-wrapper">
    <header class="wrapper bg-light">
        <nav class="navbar navbar-expand-lg classic transparent navbar-light">
            <div class="container flex-lg-row flex-nowrap align-items-center">
                <div class="navbar-brand w-100">
                    <a href="/">
                        <img class="pl-20" style="max-height: 80px" src="{{ asset('images/logo-landscape2.png') }}" srcset="{{ asset('images/logo-landscape2.png') }}" alt="" />
                    </a>
                </div>
                <div class="navbar-collapse offcanvas-nav">
                    <div class="offcanvas-header d-lg-none d-xl-none">
                        <a href="/">
                            <img style="max-height: 100px" src="{{ asset('images/logo-landscape2.png') }}" srcset="{{ asset('images/logo-landscape2.png') }}" alt="{{ env('APP_NAME') }}" />
                        </a>
                        <button type="button" class="btn-close btn-close-white offcanvas-close offcanvas-nav-close" aria-label="Close"></button>
                    </div>
                    @include('front.layout.nav')
                    <!-- /.navbar-nav -->
                </div>
                <!-- /.navbar-collapse -->
                <div class="navbar-other ms-lg-4">
                    <ul class="navbar-nav flex-row align-items-center ms-auto" data-sm-skip="true">
                        <li class="nav-item d-none d-md-block">
                            <a href="{{ route('contact') }}" class="btn btn-sm btn-primary rounded-pill">Contact us</a>
                        </li>
                        <li class="nav-item d-lg-none">
                            <div class="navbar-hamburger"><button class="hamburger animate plain" data-toggle="offcanvas-nav"><span></span></button></div>
                        </li>
                    </ul>
                    <!-- /.navbar-nav -->
                </div>
                <!-- /.navbar-other -->
            </div>
            <!-- /.container -->
        </nav>
        <!-- /.navbar -->

    </header>
@yield('content')
<footer class="bg-navy text-inverse">
    <div class="container pt-12 pt-lg-6 pb-13 pb-md-15">
        <div class="d-lg-flex flex-row align-items-lg-center">
            <h3 class="display-3 mb-6 mb-lg-0 pe-lg-20 pe-xl-22 pe-xxl-25 text-white">Have any concern or question on our services?</h3>
            <a href="{{ route('contact') }}" class="btn btn-primary rounded-pill mb-0 text-nowrap">Contact us now</a>
        </div>
        <!--/div -->
        <hr class="mt-11 mb-12" />
        <div class="row gy-6 gy-lg-0">
            <div class="col-md-4 col-lg-3">
                <div class="widget">
                    <img class="" style="max-height: 70px" src="{{ asset('images/logo-landscape-dark.png') }}" srcset="{{ asset('images/logo-landscape-dark.png') }}" alt="" />
                    <p class="mb-1">© {{ date('Y') }} {{ env('APP_NAME') }}. <br class="d-none d-lg-block" />All rights reserved.</p>
                    <nav class="nav social social-white">
                        <a href="https://twitter.com/IMaramoja" target="_blank"><i class="uil uil-twitter"></i></a>
                        <a href="https://web.facebook.com/IMaramoja?_rdc=1&_rdr" target="_blank"><i class="uil uil-facebook-f"></i></a>
                        <a href="https://www.instagram.com/insurance_maramoja/" target="_blank"><i class="uil uil-instagram"></i></a>
                    </nav>
                    <!-- /.social -->
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div class="col-md-5 col-lg-4">
                <div class="widget">
                    <h4 class="widget-title text-white mb-3">Get in Touch</h4>
                    <address class="pe-xl-15 pe-xxl-17">Salama House, Wabera street, suite 305.<br>
                        NAIROBI, KENYA<br>Open:
                        Mon - Fri : 8:00-17:00
                        Sat : 9:00 - 12:00</address>
                    <a href="mailto:insurance@imoth.co.ke"><span> insurance@imoth.co.ke</span></a><br /> +254 759 642797
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div class="col-md-4 col-lg-3">
                <div class="widget">
                    <h4 class="widget-title text-white mb-3">Quick Links</h4>
                    <ul class="list-unstyled  mb-0">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('front.comprehensive.index') }}">Comprehensive Insurance</a></li>
                        <li><a href="{{ route('front.third.index') }}">Third Party Insurance</a></li>
                        <li><a href="{{ route('front.bond.index') }}">Bid Bond Insurance</a></li>
                        <li><a href="{{ route('front.attachment.index') }}">Industrial Attachment Insurance</a></li>
                        <li><a href="{{ route('home') }}">Contact Us</a></li>
                    </ul>
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div class="col-md-12 col-lg-2">
                <div class="widget">
                    <h4 class="widget-title text-white mb-3">Our Newsletter</h4>
                    <p class="mb-5">Subscribe to our newsletter to get our news & deals delivered to you.</p>
                    <div class="newsletter-wrapper">
                        <!-- Begin Mailchimp Signup Form -->
                        <div id="mc_embed_signup2">
                            <form action="https://elemisfreebies.us20.list-manage.com/subscribe/post?u=aa4947f70a475ce162057838d&amp;id=b49ef47a9a" method="post" id="mc-embedded-subscribe-form2" name="mc-embedded-subscribe-form" class="validate dark-fields" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll2">
                                    <div class="mc-field-group input-group form-floating">
                                        <input type="email" value="" name="EMAIL" class="required email form-control" placeholder="Email Address" id="mce-EMAIL2">
                                        <label for="mce-EMAIL2">Email Address</label>
                                        <input type="submit" value="Join" name="subscribe" id="mc-embedded-subscribe2" class="btn btn-primary ">
                                    </div>
                                    <div id="mce-responses2" class="clear">
                                        <div class="response" id="mce-error-response2" style="display:none"></div>
                                        <div class="response" id="mce-success-response2" style="display:none"></div>
                                    </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ddc180777a163e0f9f66ee014_4b1bcfa0bc" tabindex="-1" value=""></div>
                                    <div class="clear"></div>
                                </div>
                            </form>
                        </div>
                        <!--End mc_embed_signup-->
                    </div>
                    <!-- /.newsletter-wrapper -->
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</footer>
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>
    @livewireScripts
</body>

</html>
