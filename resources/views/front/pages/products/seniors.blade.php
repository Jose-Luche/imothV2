<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="description"
        content="We have partnered with the best Medical Insurance Providers in Kenya, to cover your medical expenses in the event of an illness or an accident. ">
    <meta name="keywords" content="medical insurance, health insurance, illnesses">
    <meta name="robots" content="index, follow" />

    <!-- Open Graph Tags -->
    <meta property="og:title" content="Medical Insurance Kenya">
    <meta property="og:description"
        content="We have partnered with the best Medical Insurance Providers in Kenya, to cover your medical expenses in the event of an illness or an accident.">
    <meta property="og:image" content="https://www.imoth.co.ke/frontend/assets/images/services/medical_insurance.jpg">
    <meta property="og:url" content="https://www.imoth.co.ke/medical-insurance">
    <meta property="og:type" content="website">
    <title>Seniors Medical Insurance Kenya| Imoth Insurance Brokers, Nairobi, Kenya</title>

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
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BC22MLW7ZY"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BC22MLW7ZY');
</script>

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
                <h1>Seniors Medical Insurance</h1>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Seniors Medical Insurance</li>
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
                            <img src={{ asset('frontend/assets/images/services/medical_insurance.jpg') }}
                                alt="services-details" />
                        </div>
                        <h2 class="services-text">Seniors Medical Insurance</h2>
                        <p>
                            Illnesses oftenly occur when we least expect. This may cause financial strain that may alter
                            our lives.
                            At imoth, we help you stay ahead of the curve by helping you plan your health.
                            We have a health insurance plan that will cater for your seniors medical bills in the event of an
                            ilness.
                        </p>
                        <p>
                            Our health insurance plan caters for members and dependants, inpatient,outpatient,
                            seniors medical,and optical expenses.
                        </p>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="download-app">
                        <h2>Instant Quotation</h2>
                        <div class="option-item">
                            <a href="{{ route('front.seniors.index') }}" style="background-color: #0031AA; color:white"
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
