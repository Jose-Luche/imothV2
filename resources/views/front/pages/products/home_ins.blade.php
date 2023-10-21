<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <meta name="description"
        content="Get the best rates for your home insurance, also known as Domestic Package. Insure your buildings, homes, home contents, all risks, and your employees">
    <meta name="keywords" content="home insurance, domestic package, all risks, legal liability, home items or contents">
    <meta name="robots" content="index, follow" />
    

    <meta property="og:title" content="Home Insurance">
    <meta property="og:description"
        content="Get the best rates for your home insurance cover, also known as Domestic Package. Insure your buildings, homes, home contents, all risks, and your employees">
    <meta property="og:image" content="https://www.imoth.co.ke/frontend/assets/images/services/home_insurance.jpg">
    <meta property="og:url" content="https://www.imoth.co.ke/home-insurance">
    <meta property="og:type" content="website">
    <title>Home Insurance | Imoth Insurance Brokers, Nairobi, Kenya</title>

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
                <h1>Home Insurance</h1>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Home Insurance</li>
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
                            <img src={{ asset('frontend/assets/images/services/home_insurance.jpg') }}
                                alt="services-details" />
                        </div>
                        <h2 class="services-text">Domestic Package</h2>
                        <p>
                            Home Insurance protects against the loss of your house/home
                            in the event of a fire or a natural calamity such as an earthquake,
                            lightning, flooding event, landslides, and storms.
                        </p>
                        <p>
                            Also, theft or damage of property within the house/home is
                            covered under our home insurance plan.
                        </p>

                        <p>
                            What you can cover under Home Insurance?
                        </p>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <ul class="blog-details-list">
                                    <li>
                                        <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" />Buildings
                                    </li>
                                    <li>
                                        <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" />Home items or contents
                                    </li>

                                </ul>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <ul class="blog-details-list">
                                    <li>
                                        <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" />All risks: Belongings such as laptops, phones, tablets,
                                        and jewelry.
                                    </li>
                                    <li>
                                        <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" />Legal Liability for extra persons, who are not family,
                                        that you share your living space with. Eg tenants, or workers.
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
                            <a href="{{ route('front.home.index') }}" style="background-color: #0031AA; color:white"
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
