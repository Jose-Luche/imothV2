<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{--<meta name="description"
        content="Get the best motor vehicle insurance rates in Kenya. Do a motor quotation online with a click of a button. ">
    <meta name="keywords"
        content="car insurance, motor insurance, Comprehensive motor insurance, Third party motor insurance">
    <meta name="robots" content="index, follow" />
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="Motor Insurance Kenya">
    <meta property="og:description"
        content="Get the best motor vehicle insurance rates in Kenya. Do a motor quotation online with a click of a button.">
    <meta property="og:image" content="https://www.imoth.co.ke/frontend/assets/images/services/car_insurance.jpg">
    <meta property="og:url" content="https://www.imoth.co.ke/car-insurance">
    <meta property="og:type" content="website">--}}
    <title>Motor Insurance Kenya| Imoth Insurance Brokers, Nairobi, Kenya</title>

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



    <div class="page-banner-area">
        <div class="container">
            <div class="single-page-banner-content">
                <h1>Motor Insurance</h1>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Motor Insurance</li>
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
                            <img src={{ asset('frontend/assets/images/services/car_insurance.jpg') }}
                                alt="services-details" />
                        </div>
                        <h2 class="services-text">Motor Insurance</h2>
                        <p>
                            Imoth insurance brokers is a leading intermediary with regards to car insurance in Kenya.
                            We value client satisfaction, and that’s why we have partnered with the leading insurance
                            companies to cover your private and comercial vehicles.
                        </p>
                        <p>
                            Comprehensive car insurance protects you against:
                        </p>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <ul class="blog-details-list">
                                    <li>
                                        <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" /> Physical damage
                                    </li>
                                    <li>
                                        <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" /> Fire or theft to the insured vehicle
                                    </li>

                                </ul>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <ul class="blog-details-list">
                                    <li>
                                        <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" />Losses to a third party
                                    </li>
                                    <li>
                                        <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" />Damages due to natural disaster
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <h3>Why Insure with us?​</h3>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <ul class="blog-details-list">
                                    <li>
                                        <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" /> Free valuation from our panel of valuers
                                    </li>
                                    <li>
                                        <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" /> Medical expenses in case of an accident
                                    </li>

                                </ul>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <ul class="blog-details-list">
                                    <li>
                                        <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" />Courtesy car extension while the vehicle is in a garage
                                        following an accident.
                                    </li>


                                </ul>
                            </div>
                        </div>
                        <h4>Motor Categories Covered</h4>
                        <div class="faqs-content">
                            <div class="faqs-item">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                01. Why Do I Need A General Insurance Company?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    Luptatem accusantium doloremque laudantium totam rem
                                                    aperiam, eaque ipsa quae ab illo inventtatis et
                                                    quasi architecto beatae vitae dicta sunt explicabo.
                                                    Nemo enim ipsam voluptatem quia voluptas sit
                                                    aspernatur aut odit aut fugit sed quia consequuntur
                                                    magni dolores eos qui ratione voluptatem sequi
                                                    nesciunt.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                02. Does Own Damage Cover Include Personal Accident
                                                Cover?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    Luptatem accusantium doloremque laudantium totam rem
                                                    aperiam, eaque ipsa quae ab illo inventtatis et
                                                    quasi architecto beatae vitae dicta sunt explicabo.
                                                    Nemo enim ipsam voluptatem quia voluptas sit
                                                    aspernatur aut odit aut fugit sed quia consequuntur
                                                    magni dolores eos qui ratione voluptatem sequi
                                                    nesciunt.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                03. How To File An Own Damage Car Insurance Claim?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    Luptatem accusantium doloremque laudantium totam rem
                                                    aperiam, eaque ipsa quae ab illo inventtatis et
                                                    quasi architecto beatae vitae dicta sunt explicabo.
                                                    Nemo enim ipsam voluptatem quia voluptas sit
                                                    aspernatur aut odit aut fugit sed quia consequuntur
                                                    magni dolores eos qui ratione voluptatem sequi
                                                    nesciunt.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="download-app">
                        <h2>Instant Quotation</h2>
                        <div class="option-item">
                            <a href="{{ route('front.comprehensive.index') }}"
                                style="background-color: #0031AA; color:white" class="default-btn">Get A
                                Quote</a>
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
