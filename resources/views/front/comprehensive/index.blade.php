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

    <meta name="description" content="Get your Motor Insurance Comprehensive Quote instantly,anywhere in Kenya.">
    <meta name="keywords" content="motor insurance quotation">
    <meta name="robots" content="index, follow" />

    <meta property="og:title" content="Motor Insurance Quotation">
    <meta property="og:description" content="Get your motor insurance quotation instantly in Kenya.">
    <meta property="og:url" content="https://www.imoth.co.ke/covers/comprehensive">
    <meta property="og:type" content="website">
    <title>Motor Insurance Quotation | Imoth Insurance Brokers, Nairobi, Kenya</title>


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
    <link rel="stylesheet" href={{ asset('frontend/assets/css/select2.mini.css') }}>

    <link rel="icon" type="image/png" href={{ asset('frontend/assets/images/favicon/favicon.ico') }} />
    <script src={{ asset('frontend/assets/js/jquery.min.js') }}></script>
    <script src={{ asset('frontend/assets/js/select2.min.js') }}></script>
    <script>
        $(document).ready(function() {
            //$('#motor-makes').select2();

            $('#motor-makes').change(function() {
                let make = $(this).val();
                if (make != "") {
                    $.ajax({
                        method: 'GET',
                        url: '/quotation/motor-models/' + make,
                        data: make,
                        success: function(res) {
                            if (res != "") {
                                $('#motor-models').show();
                                $('#motor-models-select').html(res);
                            } else {
                                $('#motor-models').hide();
                            }
                        }
                    });
                } else {
                    $('#motor-models').hide();
                }

            });
        });

        //Auto-focus on search window
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });

        function showComprehensiveForm() {
            $('#comprehensiveForm').show();
            $('#TPOForm').hide();
        }

        function showTPOForm() {
            $('#comprehensiveForm').hide();
            $('#TPOForm').show();
        }
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
    <div class="contact-us-area pt-70">
        <div class="container">
            <div class="section-title">
                <span class="top-title">Generate an Instant Quote</span>
                <h2>Motor Vehicle Quotation</h2>
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
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <button type="button" class="default-btn" onclick="showComprehensiveForm()">
                                    Comprehensive Cover
                                </button>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <button type="button" class="default-btn" onclick="showTPOForm()">
                                    Third Party Cover
                                </button>
                            </div>
                        </div>
                        <form id="comprehensiveForm" style="display: none" method="POST"
                            action="{{ route('front.comprehensive.vehicle.submit') }}">
                            @csrf
                            <div class="row">
                                <div class="section-title">
                                    <h4>Comprehensive Cover</h4>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <select name="vehicleUse" class="form-control" required
                                            data-error="Please Select Vehicle Use">
                                            <option value="">--Select Vehicle Use--</option>
                                            <option value="personal">Personal/Private Use</option>
                                            <option value="psv">PSV - Chauffeur Driven</option>
                                            <option value="own-goods">Commercial - Own Goods</option>
                                            <option value="general-cartage">Commercial - General Cartage</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <select name="carMake" id="motor-makes" class="form-control" required>
                                            <option value="">--What is the Make of your Car--</option>
                                            @include('front.pages.quotations.motor-makes')
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6" id="motor-models" style="display: none">
                                    <div class="form-group">
                                        <div id="motor-models-select"></div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <select name="year" class="form-control" required
                                            data-error="Please Select Vehicle Use">
                                            <option value="">--Select Year Of Manufacture--</option>
                                            @for ($i = 2000; $i <= date('Y'); $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="value" id="value"
                                            placeholder="Current Vehicle Value" required
                                            data-error="Please enter Current Value" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="RegNo" id="RegNo" placeholder="Reg No.."
                                            required data-error="Please enter Car Registration Number"
                                            class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="form_name">When do you want your cover to start?*</label>
                                        <input type="date" name="date" id="message" class="form-control"
                                            min="{{ date('Y-m-d') }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input name="gridCheck" style="border:2px solid black;"
                                                value="I agree to the terms and privacy policy."
                                                class="form-check-input" type="checkbox" id="gridCheck" required>
                                            <label class="form-check-label" for="gridCheck">
                                                Accept <a href="{{ asset('frontend/assets/motor.pdf') }}">Terms Of
                                                    Services</a> And<a
                                                    href="{{ asset('frontend/assets/Privacy.pdf') }}">Privacy
                                                    Policy</a>
                                            </label>
                                            <div class="help-block with-errors gridCheck-error"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn" name="save-comprehensive">
                                        Submit Now
                                    </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>

                        <form id="TPOForm" style="display: none" method="POST"
                            action="{{ route('front.third.vehicle.submit') }}">
                            @csrf
                            <div class="row">
                                <div class="section-title">
                                    <h4>Third Party Cover</h4>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <select name="vehicleUse" class="form-control" required
                                            data-error="Please Select Vehicle Use">
                                            <option value="">--Select Vehicle Use--</option>
                                            <option value="personal">Personal/Private Use</option>
                                            <option value="psv">PSV -Chauffeur Driven</option>
                                            <option value="own-goods">Commercial - Own Goods</option>
                                            <option value="general-cartage">Commercial - General Cartage</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <select name="carMake" id="motor-makes" class="form-control" required
                                            data-error="Please Select Vehicle Use">
                                            <option value="">--What is the Make of your Car--</option>
                                            @include('front.pages.quotations.motor-makes')
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="form_name">When do you want your cover to start?*</label>
                                        <input type="date" name="date" id="message" class="form-control"
                                            min="{{ date('Y-m-d') }}" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="RegNo" id="RegNo" placeholder="Reg No.."
                                            required data-error="Please enter Car Registration Number"
                                            class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <select name="policy" class="form-control" required
                                            data-error="Please Select Policy Duration">
                                            <option selected disabled value="">Policy Duration *</option>
                                            <option {{ Session::get('policy') == 'Annually' ? 'selected' : '' }}
                                                value="Annually">Annually</option>
                                            <option {{ Session::get('policy') == 'Monthly' ? 'selected' : '' }}
                                                value="Monthly">Monthly</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input name="gridCheck" style="border:2px solid black;"
                                                value="I agree to the terms and privacy policy."
                                                class="form-check-input" type="checkbox" id="gridCheck" required>
                                            <label class="form-check-label" for="gridCheck">
                                                Accept <a href="{{ asset('frontend/assets/motor.pdf') }}">Terms Of
                                                    Services</a> And<a
                                                    href="{{ asset('frontend/assets/Privacy.pdf') }}">Privacy
                                                    Policy</a>
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
