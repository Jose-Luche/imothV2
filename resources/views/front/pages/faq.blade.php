<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Frequently Asked Insurance Questions| Imoth Insurance Brokers, Nairobi, Kenya</title>

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


    <div class="page-banner-area portfolio-page-area">
        <div class="container">
            <div class="single-page-banner-content">
                <h1>FAQ's</h1>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Frequently Asked Questions</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="faqs-area pt-100 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="faqs-img">
                        <img src={{ asset('frontend/assets/images/about/family.jpg') }} alt="faqs"
                            class="rounded-circle" style="height: 550px; width:550px;">

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="faqs-content">
                        <div class="section-title left-title">
                            <span class="top-title">FAQ</span>
                            <h2>Frequently Asked Questions</h2>
                        </div>
                        <div class="faqs-item">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            1. Who is Imoth Insurance Brokers?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>We are financial services private limited company registered under the
                                                Companies Act of Kenya.
                                                We are an insurance intermediary providing convenient and
                                                comparative services for the insurance services sector to consumers in
                                                Kenya.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            2. Are we regulated and by who?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>We are a registered Insurance intermediary under the name Imoth Insurance
                                                Brokers.
                                                We are authorized and regulated by the Insurance Regulatory Authority
                                                (IRA) of Kenya.
                                                We act by the guidelines and regulations of the IRA and the laws of
                                                Kenya.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            3. Shouldn't I just buy directly from the insurance companies/ providers?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                We compare the different insurance products offered by over 10 different
                                                companies at present.
                                                You don't have to go to each and every insurance company in Kenya (trust
                                                me there are many...over 40 of them!).
                                                You can compare and purchase your insurance from the convenience of your
                                                mobile or
                                                computer from any of the leading insurance companies of your choice.
                                            </p>
                                            <p>
                                                We know that price is important to consumers, after all, that’s why
                                                you’re comparing.
                                                But everyone has different needs and so we’ll help you to find the right
                                                product for you,
                                                whether that’s by letting you filter search results or ensuring help is
                                                on hand to
                                                answer any questions you may have or help you along with your purchase.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFore">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFore"
                                            aria-expanded="false" aria-controls="collapseFore">
                                            4. What Insurance products do you offer?
                                        </button>
                                    </h2>
                                    <div id="collapseFore" class="accordion-collapse collapse"
                                        aria-labelledby="headingFore" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>We have combined our years of experience in insurance with our technology
                                                expertise in order to serve Kenyans</p>
                                            <p>Imoth Insurance agency provides a range of insurance products with
                                                benefits to suit our clients' insurance needs at their on convenience.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="massage-area pt-100 pb-100">
        <div class="container">
            <div class="massage-item">
                <div class="section-title">
                    <span class="top-title">Message Us</span>
                    <h2>Do You Have Any Questions</h2>
                </div>
                <form>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Message" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="massage-btn d-flex justify-content-center">
                        <button type="submit" class="default-btn">Submit Now</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="faqs-shape-1">
            <img src={{ asset('frontend/assets/images/faqs-shape-1.webp') }} alt="faqs">
        </div>
        <div class="faqs-shape-2">
            <img src={{ asset('frontend/assets/images/faqs-shape-2.webp') }} alt="faqs">
        </div>
        <div class="faqs-shape-3">
            <img src={{ asset('frontend/assets/images/faqs-shape-3.webp') }} alt="faqs">
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
