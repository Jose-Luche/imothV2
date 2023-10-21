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

    <meta name="description" content="Get your Bid Bond Quote instantly.">
    <meta name="keywords" content="bid bond insurance, bid bond quote">
    <meta name="robots" content="index, follow" />


    <meta property="og:title" content="Bid Bond Quotation">
    <meta property="og:description" content="Get a bid bond quotation instantly in Kenya.">
    <meta property="og:url" content="https://www.imoth.co.ke/covers/bid-bond">
    <meta property="og:type" content="website">
    <title>Personal Accident Quotation | Imoth Insurance Brokers, Nairobi, Kenya</title>

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
                <i class='bx bx-x'></i>
            </button>
            <form action="#" class="search-form">
                <div class="form-group">
                    <input type="search" placeholder="Search Here">
                </div>
            </form>
        </div>
    </div>


    <div class="page-banner-area blog-page-are">
        <div class="container">
            <div class="single-page-banner-content">
                <h1>Personal Accident</h1>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Personal Accident</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="contact-us-area pt-100">
        <div class="container">
            <div class="section-title">
                <span class="top-title">Generate Instant Quote</span>
                <h2>Provide Details below to get a Quote</h2>
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
                        <form method="post" action="{{ route('front.personalAccident.submit') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="firstName" name="firstName"
                                               value="{{ old('firstName') }}" class="form-control"
                                               placeholder="Enter First name" required
                                               data-error="Please enter your First Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="lastName" name="lastName"
                                               value="{{ old('lastName') }}" class="form-control"
                                               placeholder="Enter Last Name" required data-error="Please enter Last Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input id="phoneNumber" type="text" name="phoneNumber"
                                               value="{{ old('phoneNumber') }}" placeholder="Phone Number" required
                                               data-error="Please enter your Phone Number" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input id="email" type="email" name="email"
                                               value="{{ old('email') }}" placeholder="Email Address" required
                                               data-error="Please enter your Email Address" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="companyName" name="companyName"
                                               value="{{ old('companyName') }}" placeholder="Institution"
                                               required data-error="Attachment Institution" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <select id="cover-type" class="form-control" name="category">
                                            <option value="">--Select Cover Type--</option>
                                            <option value="self">Self Personal Accident</option>
                                            <option value="driver">Drivers Personal Accident</option>
                                            <option value="family">Family Personal Accident</option>
                                            <option value="school">School Personal Accident</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <select id="duration" class="form-control" name="duration">
                                            <option value="">--Select Duration--</option>
                                            <option value="3">3 Months</option>
                                            <option value="6">6 Months</option>
                                            <option value="12">12 Months</option>

                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="form_name">When do you want your cover to start?*</label>
                                        <input type="date" id="startDate" name="startDate"
                                               value="{{ old('startDate') }}" class="form-control" required
                                               data-error="Please enter Duration" min="{{date('Y-m-d')}}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input name="gridCheck" style="border:2px solid black;" value="I agree to the terms and privacy policy."
                                                   class="form-check-input" type="checkbox" id="gridCheck" required>
                                            <label class="form-check-label" for="gridCheck">
                                                Accept <a href="{{ url('#') }}">Terms Of Services</a> And<a
                                                    href="{{ url('#') }}">privacy policy</a>
                                            </label>
                                            <div class="help-block with-errors gridCheck-error"></div>
                                        </div>
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


</html>
