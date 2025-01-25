<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BC22MLW7ZY"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
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
    <title>Imoth Insurance Brokers</title>
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


    <div class="header-area page-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-3 col-md-3">
                    <div class="header-left-bar-text">
                        <ul class="list-inline">
                            <li>
                                <a href="https://www.facebook.com/" target="_blank">
                                    <i class="bx bxl-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/" target="_blank">
                                    <i class="bx bxl-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/" target="_blank">
                                    <i class="bx bxl-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.google.com/" target="_blank">
                                    <i class="bx bxl-google"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-9 col-md-9">
                    <div class="header-right-content text-end">
                        <ul class="list-inline">
                            <li class="d-inline">
                                <img src={{ asset('frontend/assets/images/phone.svg') }} alt="Phone" />
                                <a href="tel:  +254112476114"> +254112476114</a>
                            </li>
                            <li class="d-inline">
                                <img src={{ asset('frontend/assets/images/email.svg') }} alt="Email" />
                                <a href="mailto:insurance@imoth.co.ke">insurance@imoth.co.ke
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="navbar-area page-navbar-area">
        <div class="main-responsive-nav">
            <div class="container">
                <div class="main-responsive-menu">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src={{ asset('frontend/assets/images/imoth1.png') }} class="black-logo"
                                style="width:100px; height:60px" alt="imoth">
                            <img src={{ asset('frontend/assets/images/imoth1.png') }} class="white-logo"
                                style="width:100px; height:60px" alt="imoth">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-navbar main-navbar-three">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src={{ asset('frontend/assets/images/imoth1.png') }} class="black-logo"
                            style="width:100px; height:60px" alt="imoth">
                        <img src={{ asset('frontend/assets/images/imoth1.png') }} class="white-logo"
                            style="width:100px; height:60px" alt="imoth">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="{{ route('home') }}" class="nav-link active">
                                    Home
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="{{ route('about') }}" class="nav-link active">
                                    About Us
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Our Products
                                    <i class='bx bx-down-arrow-alt'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="{{ route('motor') }}" class="nav-link">Motor Insurance</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('medical') }}" class="nav-link">Health Insurance</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('home.ins') }}" class="nav-link">Home Insurance</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('travel') }}" class="nav-link">Travel Insurance</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('business') }}" class="nav-link">Business Insurance</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Bonds
                                            <i class='bx bx-down-arrow-alt'></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a href="{{ route('bid_bond') }}" class="nav-link">Bid Bond</a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('life') }}" class="nav-link">Life Insurance</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('attachment') }}" class="nav-link">Attachment Insurance</a>
                                    </li>


                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Claims
                                    <i class='bx bx-down-arrow-alt'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="portfolio.html" class="nav-link">Register Claim</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="portfolio-details.html" class="nav-link">Download Forms</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('contact') }}" class="nav-link">Contact Us</a>
                            </li>

                            <li class="nav-item">
                                <a href="contact.html" class="nav-link">FAQs</a>
                            </li>
                        </ul>
                        <div class="others-options d-flex align-items-center">
                            <div class="option-item">
                                <button class="searchbtn" type="button">
                                    <i class='bx bx-search'></i>
                                </button>
                            </div>
                            <div class="option-item">
                                <a href="{{ route('faq') }}" class="default-btn">Get A Quote</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="others-option-for-responsive">
            <div class="container">
                <div class="dot-menu">
                    <div class="inner">
                        <div class="circle circle-one"></div>
                        <div class="circle circle-two"></div>
                        <div class="circle circle-three"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="option-inner">
                        <div class="others-options d-flex align-items-center">
                            <div class="option-item">
                                <button class="searchbtn" type="button">
                                    <i class="bx bx-search"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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



    <div class="contact-us-area pt-100">
        <div class="container">
            <div class="section-title">
                <span class="top-title">Get Instant Quote</span>
                <h2>Enter Your Details</h2>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-contact-img">
                        <div class="contact-main-img">
                            <img src={{ asset('frontend/assets/images/contact-us-img-5.webp') }} alt="contact-us">
                        </div>
                        <div class="contact-us-img1" data-cue="zoomIn">
                            <img src={{ asset('frontend/assets/images/contact-us-img-1.webp') }} alt="contact-us">
                        </div>
                        <div class="contact-us-img2" data-cue="rotateIn">
                            <img src={{ asset('frontend/assets/images/contact-us-img-2.webp') }} alt="contact-us">
                        </div>
                        <div class="contact-us-img3" data-cue="zoomIn" data-duration="2000">
                            <img src={{ asset('frontend/assets/images/contact-us-img-3.webp') }} alt="contact-us">
                        </div>
                        <div class="contact-us-img4" data-cue="slideInLeft">
                            <img src={{ asset('frontend/assets/images/contact-us-img-4.webp') }} alt="contact-us">
                        </div>
                        <div class="contact-main-image1s">
                            <img src={{ asset('frontend/assets/images/contact-main-bg-img.webp') }} alt="main">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <form method="POST" action="{{ route('front.third.bio.submit') }}" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="firstName" class="form-control"
                                            placeholder="First name" required
                                            data-error="Please enter your first name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="lastName" class="form-control"
                                            placeholder="Enter your last name" required data-error="Last name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email" required
                                            data-error="Please enter your email" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phoneNumber" placeholder="Phone number" required
                                            data-error="Please enter your phone number" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn">
                                        Submit Now
                                    </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
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
@include('front.layout2.tawk-to')

</html>
