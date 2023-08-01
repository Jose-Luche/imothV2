<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="description"
        content="Get various insurance products at imoth insurance brokers Kenya. Our products panel include: Home Insurance, Motor Insurance, Life Insurance, Travel Insurance among others. ">
    <meta name="keywords" content="travel insurance, emergency medical expenses, damage or loss of property.">
    <meta name="robots" content="index, follow" />

    <!-- Open Graph Tags -->
    <meta property="og:title" content="Top Insurance Broker in Kenya">
    <meta property="og:description"
        content="Get various insurance products at imoth insurance brokers Kenya. Our products panel include: Home Insurance, Motor Insurance, Life Insurance, Travel Insurance among others.">
    <meta property="og:url" content="https://www.imoth.co.ke/about-imoth-insurance">
    <meta property="og:type" content="website">
    <title>Top Insurance Broker Kenya| Imoth Insurance Brokers, Nairobi, Kenya</title>

    <link rel="stylesheet" href={{ asset('frontend/assets/css/bootstrap.min.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/animate.min.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/boxicons.min.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/magnific-popup.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/meanmenu.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/fancybox.min.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/odometer.min.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/owl.carousel.min.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/owl.theme.default.min.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/scrollCue.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/navbar.css') }} />
    <link rel="stylesheet" href={{ asset('frontend/assets/css/footer.css') }} />
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
                <h1>About Us</h1>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="about-area pt-100 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="single-about-image">
                        <img src={{ asset('frontend/assets/images/home.jpg') }} style="padding:10px;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-about-content">
                        <div class="section-title left-title">
                            <span class="top-title">About Imoth Insurance Brokers</span>
                            <h2>Get Reliable Insurance Coverage Today!</h2>
                            <p>We are your trusted partner in safeguarding your future. We offer comprehensive
                                insurance solutions tailored to your unique needs. Our strengths include:</p>
                        </div>
                        <ul>
                            <li class="list-inline"><img src={{ asset('frontend/assets/images/about/about-icon.svg') }}
                                    alt="about-icon">
                                Robust Customer Support.
                            </li>
                            <li class="list-inline"><img src={{ asset('frontend/assets/images/about/about-icon.svg') }}
                                    alt="about-icon">Trustworthy partnerships with the panel of insurance companies we
                                work with.
                            </li>
                            <li class="list-inline"><img src={{ asset('frontend/assets/images/about/about-icon.svg') }}
                                    alt="about-icon">Extensive coverage options tailor-made to suit your insurance
                                needs.
                            </li>
                            <li class="list-inline"><img src={{ asset('frontend/assets/images/about/about-icon.svg') }}
                                    alt="about-icon">Financial protection for your Insurance assets by guaranteeing
                                quick and effective claims processing.
                            </li>
                        </ul>
                        <div class="about-btn d-flex align-items-center">

                            <div class="call-experts">
                                <div class="phone-call">
                                    <img src={{ asset('frontend/assets/images/phone-call.svg') }} alt="phone-call">
                                </div>
                                <span>Call To Our Experts</span>
                                <a href="tel:+254759642797">+254 759 642797</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="services-area pt-100 pb-70">
        <div class="container">
            <div class="services-top-item d-flex align-items-end justify-content-between">
                <div class="section-title left-title">
                    <span class="top-title">Our Services</span>
                    <h2>Imoth Insurance Services</h2>
                </div>
                <a href="{{ route('products') }}" class="default-btn">All Products</a>
            </div>
            <div class="row" data-cues="slideInUp">
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-services-card d-flex align-items-center">
                        <div class="services-icon">
                            <img src={{ asset('frontend/assets/images/services/couple.svg') }} alt="couple" />
                        </div>
                        <h3><a href="{{ route('life') }}">Life Insurance</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-services-card d-flex align-items-center">
                        <div class="services-icon">
                            <img src={{ asset('frontend/assets/images/services/home.svg') }} alt="home" />
                        </div>
                        <h3><a href="{{ route('home.ins') }}">Home Insurance</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-services-card d-flex align-items-center">
                        <div class="services-icon bg-icon-color">
                            <img src={{ asset('frontend/assets/images/services/lightbulb.svg') }} alt="lightbulb" />
                        </div>
                        <h3><a href="{{ route('business') }}">Business Insurance</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-services-card d-flex align-items-center">
                        <div class="services-icon bg-icon-color1">
                            <img src={{ asset('frontend/assets/images/services/heart.svg') }} alt="heart" />
                        </div>
                        <h3><a href="{{ route('medical') }}">Health Insurance</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-services-card d-flex align-items-center">
                        <div class="services-icon bg-icon-color2">
                            <img src={{ asset('frontend/assets/images/services/car.svg') }} alt="car" />
                        </div>
                        <h3><a href="{{ route('motor') }}">Motor Insurance</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-services-card d-flex align-items-center">
                        <div class="services-icon bg-icon-color2">
                            <img src={{ asset('frontend/assets/images/services/services-icon-1.svg') }}
                                alt="lightbulb" />
                        </div>
                        <h3><a href="{{ route('travel') }}">Travel Insurance</a></h3>
                    </div>
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
