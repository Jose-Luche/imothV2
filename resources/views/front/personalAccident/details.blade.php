<!DOCTYPE html>
<html lang="en">

<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BC22MLW7ZY"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BC22MLW7ZY');
</script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href={{ asset('frontend/assets/css/bootstrap.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/animate.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/boxicons.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/magnific-popup.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/meanmenu.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/odometer.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/fancybox.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/owl.carousel.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/owl.theme.default.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/scrollCue.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/navbar.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/footer.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/portfolio-details.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/style.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/dark.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/responsive.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/select2.mini.css') }}>
    <title>Imoth Insurance Brokers</title>
    <link rel="icon" type="image/png" href={{ asset('frontend/assets/images/favicon/favicon.ico') }} />
    <script src={{ asset('frontend/assets/js/jquery.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/select2.min.js') }}></script>
</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    @include('front.pages.master.header')


    <div class="search-area">
        <div class="container">
            <button type="button" class="close-searchbox">
                <i class='bx bx-x'></i>
            </button>
            <form action="#" class="search-form">
                <div class="form-group">
                    <input type="search" placeholder="Search Here">
                </div>
            </form>
        </div>
    </div>
    <div class="contact-us-area pt-70">
        <div class="container">
            <div class="section-title">
                <span class="top-title">Get an Instant Quote</span>
                <h2>Selected Cover Details</h2>
            </div>
            <div class="row">
                @include('partials.info')
                <div class="col-lg-6">
                    <div class="col-md-12" style="padding: 1em 1em !important;">
                        <div class="row">
                            <a href="#" class="card lift">
                                <div class="card-body p-5 d-flex flex-row">
                                    <div class="p-2">
                                        <img style="max-width: 100px"
                                            src="{{ asset('frontend/assets/images/imoth1.png') }}">
                                    </div>
                                    <div>
                                        {{--                                                        <span class="badge bg-pale-blue text-blue rounded py-1 mb-2">Full Time</span> --}}
                                        <h4 class="mb-1">{{ $details->company->name }}</h4>
                                        <p class="mb-0 text-body"> <i class="uil uil-wallet me-1"></i> Ksh
                                            {{ number_format($total, 2) }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <hr>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <div class="card">
                            <div class="card-body" style="padding: 1em 1em !important;">
                                <div class="col-md-12">
                                    <h6 class="mb-4">Premium Computations</h6>
                                    <div class="single-features-card bg-color-2">
                                        {!! $html !!}<br>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <a
                                                    href="{{ route('front.pages.quotations.quotation-pdf', ['applicationId' => $applicationDetails->id, 'id' => $details->id, 'personalAccident']) }}">
                                                    <span
                                                        class="btn btn-outline-info btn-sm d-lg-block col-md-6 text-center text-body">
                                                        Print Quote <i class="uil uil-location-arrow"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <a class="btn btn-outline-aqua btn-sm rounded-pill btn-send mb-3"
                                                    href="{{ route('front.personalAccident.details.submit', ['applicationId' => $applicationDetails->id, 'id' => $details->id]) }}">
                                                    <span
                                                        class="btn btn-outline-info btn-sm d-lg-block col-md-16 text-center text-body">
                                                        Submit & Pay <i class="uil uil-save"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /form -->
                                </div>
                            </div>
                            <!-- /column -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('front.layout2.footer')
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>

    <script src={{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/ajaxchimp.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/form-validator.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/contact-form-script.js') }}></script>
    <script src={{ asset('frontend/assets/js/appear.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/odometer.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/jquery.meanmenu.js') }}></script>
    <script src={{ asset('frontend/assets/js/magnific-popup.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/fancybox.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/owl.carousel.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/scrollCue.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/subscribe-custom.js') }}></script>
    <script src={{ asset('frontend/assets/js/main.js') }}></script>
</body>
@include('front.layout2.tawk-to')

</html>
