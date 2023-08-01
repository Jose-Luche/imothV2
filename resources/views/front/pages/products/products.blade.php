<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href={{ asset('frontend/assets/css/bootstrap.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/animate.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/boxicons.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/magnific-popup.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/meanmenu.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/fancybox.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/odometer.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/owl.carousel.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/owl.theme.default.min.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/scrollCue.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/navbar.css') }}>
    <link rel="stylesheet" href={{ asset('frontend/assets/css/footer.css') }}>
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
                <h1>Our Products</h1>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Our Products</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="services-three-area pt-100 pb-100">
        <div class="container">
            <div class="section-title">
                @include('partials.info')
                <span class="top-title">Our Services</span>
                <h2>Imoth Insurance Services</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="services-three-card services-page-card">
                        <div class="services-card d-flex align-items-center">
                            <div class="services-icon">
                                <img src={{ asset('frontend/assets/images/services/couple.svg') }} alt="couple">
                            </div>
                            <h3><a href="services-details.html">Life Insurance</a></h3>
                        </div>
                        <p>Life Insurance is an annual contract that provides compensation
                            to the deceased’s beneficiaries in the unfortunate event
                            that the assured dies while in the employer's service.</p>
                        <a href="{{ route('life') }}" class="default-btn">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="services-three-card services-page-card">
                        <div class="services-card d-flex align-items-center">
                            <div class="services-icon">
                                <img src={{ asset('frontend/assets/images/services/home.svg') }} alt="home">
                            </div>
                            <h3><a href="services-details.html">Home Insurance</a></h3>
                        </div>
                        <p>Home Insurance protects against the loss of your house/home
                            in the event of a fire or a natural calamity such as an earthquake,
                            lightning, flooding event, landslides, and storms.</p>
                        <a href="{{ route('home.ins') }}" class="default-btn">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="services-three-card services-page-card">
                        <div class="services-card d-flex align-items-center">
                            <div class="services-icon bg-icon-color1">
                                <img src={{ asset('frontend/assets/images/services/heart.svg') }} alt="heart">
                            </div>
                            <h3><a href="services-details.html">Health Insurance</a></h3>
                        </div>
                        <p>At imoth, we help you stay ahead of the curve by helping you plan your health.
                            We have a health insurance plan that will cater for your medical bills in the event of an
                            ilness.</p>
                        <a href="services-details.html" class="default-btn">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="services-three-card services-page-card">
                        <div class="services-card d-flex align-items-center">
                            <div class="services-icon bg-icon-color2">
                                <img src={{ asset('frontend/assets/images/services/car.svg') }} alt="car">
                            </div>
                            <h3><a href="services-details.html">Motor Insurance</a></h3>
                        </div>
                        <p>Imoth insurance brokers is a leading intermediary with regards to car insurance in Kenya.
                            We value client satisfaction, and that’s why we have partnered with the leading insurance
                            companies to cover your private and comercial vehicles.</p>
                        <a href="services-details.html" class="default-btn">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="services-three-card services-page-card">
                        <div class="services-card d-flex align-items-center">
                            <div class="services-icon bg-icon-color">
                                <img src={{ asset('frontend/assets/images/services/lightbulb.svg') }} alt="lightbulb">
                            </div>
                            <h3><a href="services-details.html">Student Personal Accident</a></h3>
                        </div>
                        <p>Personal accident insurance is designed to cover unexpected events resulting in bodily
                            injury,
                            disability, or death caused solely by accidents.
                        </p>
                        <a href="{{ route('attachment') }}" class="default-btn">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="services-three-card services-page-card">
                        <div class="services-card d-flex align-items-center">
                            <div class="services-icon bg-icon-color2">
                                <img src={{ asset('frontend/assets/images/services/services-icon-1.svg') }}
                                    alt="lightbulb">
                            </div>
                            <h3><a href="services-details.html">Travel Insurance</a></h3>
                        </div>
                        <p>Our agents at imoth insurance brokers allow you to travel hassle free.
                            Focus on your travels and let us handle the rest on your behalf.</p>
                        <a href="{{ route('travel') }}" class="default-btn">Read More</a>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="services-three-card services-page-card">
                        <div class="services-card d-flex align-items-center">
                            <div class="services-icon bg-icon-color">
                                <img src={{ asset('frontend/assets/images/services/lightbulb.svg') }} alt="lightbulb">
                            </div>
                            <h3><a href="services-details.html">Business Insurance</a></h3>
                        </div>
                        <p>Tailor made insurance solutions for the Small Medium Enterprises in Kenya covering a wide
                            range of risks faced by business owners.
                            The package has several flexible sections which the insured may choose to include or exclude
                        </p>
                        <a href="{{ route('business') }}" class="default-btn">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="services-three-card services-page-card">
                        <div class="services-card d-flex align-items-center">
                            <div class="services-icon bg-icon-color">
                                <img src={{ asset('frontend/assets/images/services/lightbulb.svg') }} alt="lightbulb">
                            </div>
                            <h3><a href="services-details.html">Bid Bond</a></h3>
                        </div>
                        <p>These bonds are normally issued for tenders,
                            where the only obligation is a “Promisory Note”
                            to the effect that in case the tenderer wins the tender,
                            we will issue a Performance Bond.
                        </p>
                        <a href="{{ route('bid_bond') }}" class="default-btn">Read More</a>
                    </div>
                </div>
            </div>
            <div class="pagination-area">
                <a href="{{ route('products') }}" class="prev page-numbers">
                    <i class='bx bx-chevron-left'></i>
                </a>
                <span class="page-numbers current" aria-current="page">01</span>
                <a href="{{ route('products') }}" class="page-numbers">02</a>

                <a href="services.html" class="prev page-numbers">
                    <i class='bx bx-chevron-right'></i>
                </a>
            </div>
        </div>
    </div>


    <div class="insurance-benefits-area pt-100 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="insurance-benefits-img">
                        <img src={{ asset('frontend/assets/images/insurance-benefits.webp') }}
                            alt="insurance-benefits">
                        <div class="insurance-benefits-shape-1">
                            <img src={{ asset('frontend/assets/images/insurance-benefits-shape-1.webp') }}
                                alt="insurance-benefits-shape-1">
                        </div>
                        <div class="insurance-benefits-shape-2">
                            <img src={{ asset('frontend/assets/images/insurance-benefits-shape-2.webp') }}
                                alt="insurance-benefits-shape-1">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-insurance-benefits-content">
                        <div class="section-title left-title">
                            <span class="top-title">Insurance Benefits</span>
                            <h2>Get Reliable Insurance Coverage Today!</h2>
                            <p>We are your trusted partner in safeguarding your future. We offer comprehensive
                                insurance solutions tailored to your unique needs.</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="insurance-benefits-card">
                                    <div class="insurance-benefits-text d-flex align-items-center">
                                        <span>01</span>
                                        <h3>Robust Customer Support.</h3>
                                    </div>
                                    <p>Our team is always ready to assist
                                        in every step of insurance
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="insurance-benefits-card">
                                    <div class="insurance-benefits-text d-flex align-items-center">
                                        <span>02</span>
                                        <h3>Trustworthy Partnerships</h3>
                                    </div>
                                    <p>Partnerships with reliable insurance companies.</p>
                                    <div class="insurance-shape">
                                        <img src={{ asset('frontend/assets/images/insurance-benefits-shape-3.webp') }}
                                            alt="insurance">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="features-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span class="top-title">Our Strengths</span>
                <h2>Why Insure with us?</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-features-card">
                        <div class="features-icon">
                            <img src={{ asset('frontend/assets/images/features/features-icon-1.svg') }}
                                alt="features-1">
                        </div>
                        <h3>Trustworthy Partnerships</h3>
                        <p>We have partnered with leading insurance companies, offering top-tier coverage options at
                            competitive rates, giving you the best value for your insurance investment.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-features-card bg-color-1">
                        <div class="features-icon">
                            <img src={{ asset('frontend/assets/images/features/features-icon-2.svg') }}
                                alt="features-1">
                        </div>
                        <h3>Financial Protection</h3>
                        <p>We offer a reliable safety net. We boost of our reliable claims processes assistance that
                            ensures
                            you get a fair settlement with a quick turn around time.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-features-card bg-color-2">
                        <div class="features-icon">
                            <img src={{ asset('frontend/assets/images/features/features-icon-3.svg') }}
                                alt="features-1">
                        </div>
                        <h3>Customer Support</h3>
                        <p>Our friendly and knowledgeable team is dedicated to providing you with prompt, courteous
                            service at every step of the insurance process.

                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-features-card bg-color-3">
                        <div class="features-icon">
                            <img src={{ asset('frontend/assets/images/features/features-icon-4.svg') }}
                                alt="features-1">
                        </div>
                        <h3>Personalized Approach</h3>
                        <p>Our experienced insurance professionals will work closely with you to assess your risks
                            and customize a policy that fits your budget.
                        </p>
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
