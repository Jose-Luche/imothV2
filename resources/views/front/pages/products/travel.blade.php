<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   {{-- <meta name="description"
        content="Insure yourself against loss or property damage, or accidents with our Travel Insurance packages. ">
    <meta name="keywords" content="travel insurance, emergency medical expenses, damage or loss of property.">
    <meta name="robots" content="index, follow" />
   
    <!-- Open Graph Tags -->
    <meta property="og:title" content="Motor Insurance Kenya">
    <meta property="og:description"
        content="Insure yourself against loss or property damage, or accidents with our Travel Insurance packages.">
    <meta property="og:image" content="https://www.imoth.co.ke/frontend/assets/images/services/travel_insurance.jpg">
    <meta property="og:url" content="https://www.imoth.co.ke/travel-insurance">
    <meta property="og:type" content="website">--}}
    <title>Travel Insurance Kenya| Imoth Insurance Brokers, Nairobi, Kenya</title>

    <link rel="stylesheet" href={{ asset('frontend/assets/css/bootstrap.min.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/animate.min.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/boxicons.min.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/magnific-popup.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/meanmenu.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/odometer.min.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/fancybox.min.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/owl.carousel.min.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/owl.theme.default.min.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/scrollCue.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/navbar.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/footer.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/services-details.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/portfolio-details.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/blog-details.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/style.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/dark.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/responsive.css') }} />
    <link rel="icon" type="image/png" href={{ asset('frontend/assets/images/favicon/favicon.ico') }} />

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
                <i class="bx bx-x"></i>
            </button>
            <form action="#" class="search-form">
                <div class="form-group">
                    <input type="search" placeholder="Search Here" />
                </div>
            </form>
        </div>
    </div>
    <div class="page-banner-area">
        <div class="container">
            <div class="single-page-banner-content">
                <h1>Travel Insurance</h1>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Travel Insurance</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="services-details-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-services-details-content">
                        <div class="services-details-img">
                            <img src={{ asset('frontend/assets/images/services/travel_insurance.jpg') }}
                                alt="services-details" />
                        </div>
                        <h2 class="services-text">Travel Insurance</h2>
                        <p>
                            Our agents at imoth insurance brokers allow you to travel hassle free.
                            Focus on your travels and let us handle the rest on your behalf.
                        </p>
                        <p>
                            With a travel insurance policy, you will be covered against:
                        </p>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <ul class="blog-details-list">
                                    <li>
                                        <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" />Emergency medical expenses in yor country of travel.
                                    </li>
                                    <li>
                                        <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" />Travel delay and cancellation.
                                    </li>

                                </ul>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <ul class="blog-details-list">
                                    <li>
                                        <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" />Baggage loss or delay.
                                    </li>
                                    <li>
                                        <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" />Loss of passport/ID.
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="download-app">
                        <h2>Instant Quotation</h2>
                        <div class="option-item">
                            <a href="{{ route('front.travel.index') }}" style="background-color: #0031AA; color:white"
                                class="default-btn">Get A Quote</a>
                        </div>

                    </div>
                    @include('front.pages.master.services')

                </div>
            </div>
        </div>
    </div>
    @include('front.layout2.footer')
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src={{ asset('frontend/assets/js/jquery.min.js') }}></script>
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

</html>
