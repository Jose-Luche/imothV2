<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="description"
          content="We are the number one funeral expense insurance broker, also known as Last expense, in Kenya. Get an insurance cover to protect you and your family.">
    <meta name="keywords"
          content="last expense insurance, funeral expense insurance.">
    <meta name="robots" content="index, follow" />


    <meta property="og:title" content="Funeral Expense Insurance">
    <meta property="og:description"
          content="We are the number one funeral expense insurance broker, also known as Last expense, in Kenya. Get an insurance cover to protect you and your family.">
    <meta property="og:image" content="https://www.imoth.co.ke/frontend/assets/images/last_expense.jpeg">
    <meta property="og:url" content="https://www.imoth.co.ke/funeral-expense-insurance">
    <meta property="og:type" content="website">
    <title>Last Expense Insurance | Imoth Insurance Brokers, Nairobi, Kenya</title>

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
            <h1>Last Expense Insurance</h1>
            <ul>
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>Last Expense Insurance</li>
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
                        <img src={{ asset('frontend/assets/images/last_expense.jpeg') }} alt="services-details" />
                    </div>
                    <h2 class="services-text">Description For Our Services</h2>
                    <p>
                        At Imoth Insurance Brokers, we are determined to EASE the need to fundraise for a funeral by bereaved
                        families in kenya. To this end, we have developed a unique product that guarantees cash pay-outs to provide
                        a befiting farewell in case of demise of a member
                    </p>
                    <p>
                        We guarantee a one off payment towards funeral expenses. The cover caters for both natural and accidental death. Also,
                        it extends to parents and parents-in-law. The criteria below will make you qualify for this cover, as follows:
                    </p>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <ul class="blog-details-list">
                                <li>
                                    <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" />A registered organization with a minimum of 10 principal members.
                                </li>
                                <li>
                                    <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" />Members and their families including spouse, 4 children, 2 parents, and 2 parents-in-law.
                                </li>
                                <li>
                                    <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" />Principal members aged between 18 to 70 years.
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <ul class="blog-details-list">
                                <li>
                                    <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" />Maximum entry age for parents and in-laws is 80 years.
                                </li>
                                <li>
                                    <img src={{ asset('frontend/assets/images/services/services-check.svg') }}
                                            alt="blog-check" />Children from 30 days to 18 years and up to 25 years with proof of dependency.
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
                        <a href="{{ route('front.lastExpense.index') }}" style="background-color: #0031AA; color:white;"
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
