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

    <meta name="description" content="Get your Health Insurance  Quote instantly,anywhere in Kenya.">
    <meta name="keywords" content="Health insurance quotation">
    <meta name="robots" content="index, follow" />


    <meta property="og:title" content="Motor Insurance Quotation">
    <meta property="og:description" content="Get your health insurance quotation instantly in Kenya.">
    <meta property="og:url" content="https://www.imoth.co.ke/covers/health">
    <meta property="og:type" content="website">
    <title>Health Insurance Quotation | Imoth Insurance Brokers, Nairobi, Kenya</title>

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
    <script src={{ asset('frontend/assets/js/jquery.min.js') }}></script>
    <script>
        $(document).ready(function() {
            $('#hasSpouse').click(function() {
                if ($('#hasSpouse').is(':checked')) {
                    $('#spouse-age').show();
                } else {
                    $('#spouse-age').hide();
                }
            });
            $('#hasChildren').click(function() {
                if ($('#hasChildren').is(':checked')) {
                    $('#children-number').show();
                } else {
                    $('#children-number').hide();
                }

            });
        });
    </script>
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
                <h1>Health Insurance</h1>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Health Insurance</li>
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
                        <form method="post" action="{{ route('front.health.submit') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" id="principalAge" name="principalAge"
                                            value="{{ old('principalAge') }}" class="form-control"
                                            placeholder="Principal Member Age" required
                                            data-error="Please enter your Age">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-5" style="padding: 20px">
                                    <div class="form-group">
                                        Do you have a Spouse?
                                        <input type="checkbox" id="hasSpouse" name="hasSpouse" value="yes"
                                            style="width: 20px; height: 20px; margin-left: 30px">
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7" id="spouse-age" style="display: none">
                                    <div class="form-group">
                                        <input type="text" id="spouseAge" class="form-control"
                                            placeholder="Spouse Age" name="spouseAge" value="{{ old('spouseAge') }}"
                                            data-error="Please enter Spouse Age">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-5" style="padding: 20px">
                                    <div class="form-group">
                                        Do you have Children?
                                        <input type="checkbox" id="hasChildren" name="hasChildren" value="yes"
                                            style="width: 20px; height: 20px; margin-left: 30px">
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7" id="children-number" style="display: none">
                                    <div class="form-group">
                                        <input type="text" id="childrenNumber" class="form-control"
                                            placeholder="Children Number" name="childrenNumber"
                                            value="{{ old('childrenNumber') }}" required
                                            data-error="Please enter Number of Children">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-floating mb-4">
                                        <input id="commencementDate" type="date" name="commencementDate"
                                            value="{{ old('commencementDate') }}" class="form-control" required>
                                        <label for="commencementDate">Commencement Date *</label>
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
