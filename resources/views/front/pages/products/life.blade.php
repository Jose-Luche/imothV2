<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{--<meta name="description"
        content="We are the number one life insurance broker in Kenya. We offer solutions such as: Retirement planning and education planning for your loved ones">
    <meta name="keywords"
        content="life insurance, death benefit, critical illness cover, funeral expenses, education policy, retirement policy">
    <meta name="robots" content="index, follow" />
    

    <!-- Open Graph Tags -->
    <meta property="og:title" content="Life Insurance Kenya">
    <meta property="og:description"
        content="We are the number one life insurance broker in Kenya. We offer solutions such as: Retirement planning and education planning for your loved ones.">
    <meta property="og:image" content="https://www.imoth.co.ke/frontend/assets/images/about/family.jpg">
    <meta property="og:url" content="https://www.imoth.co.ke/life-insurance">
    <meta property="og:type" content="website">--}}
    <title>Life Insurance Kenya| Imoth Insurance Brokers, Nairobi, Kenya</title>

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
                <h1>Life Insurance</h1>
                <ul>
                    <li>
                        <a href="{{ url('index2') }}">Home</a>
                    </li>
                    <li>Life Insurance</li>
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
                            <img src={{ asset('frontend/assets/images/about/family.jpg') }} alt="services-details" />
                        </div>
                        <h2 class="services-text">Description of Cover</h2>
                        <p>
                            Life Insurance is an annual contract that provides compensation
                            to the deceased’s beneficiaries in the unfortunate event
                            that the assured dies while in the employer's service.

                        </p>
                        <p>
                            This is a benefit given by the employer to his employees,
                            and it is the employer who pays for the premiums.
                            The rule of thumb is that the benefits are calculated
                            based on the member’s annual salary, age, and gender,
                            and the sum assured is paid to the dependents.
                        </p>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <ul class="blog-details-list">
                                    <li>
                                        <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" />Death
                                    </li>
                                    <li>
                                        <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" />Permanent Total Disability (PTD)
                                    </li>

                                </ul>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <ul class="blog-details-list">
                                    <li>
                                        <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" />Critical Illness Cover
                                    </li>
                                    <li>
                                        <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" />Funeral Expenses
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h3>Better Strategy With Quality Guidance​</h3>
                        <p>
                            Understanding what suites you as a person,
                            company or family on life matters is what we've developed our career in.
                            We stand in a position to engage you by educating you first,
                            then offering necessary tools for your growth and protection.
                            To climb the ladder, give us a try on this matter.
                        </p>

                        <h4>We Help To Get Solutions on the following Life Benefits</h4>
                        <div class="faqs-content">
                            <div class="faqs-item">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                01. Death
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    Death while in service is the main benefit covered
                                                    under this policy.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                02. Critical Illness Cover
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    Upon first-time diagnosis of certain conditions,
                                                    a lump sum will be paid to the life assured/staff member.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                03. Permanent Total Disability
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    This is a condition in which an individual is no longer
                                                    able to work due to injuries.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                04. Funeral Expenses
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    This caters to the funeral expenses of a member in the
                                                    event of their demise. Payable within 48 hours after
                                                    notification and complete documentation.
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
                            <a href="{{ route('front.life.index')}}" style="background-color: #0031AA; color: white"
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
