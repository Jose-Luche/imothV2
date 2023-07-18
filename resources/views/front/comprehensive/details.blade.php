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
    <title>Imoth Insurance Brokers</title>
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
                <span class="top-title">Get an Instant Quote</span>
                <h2>Selected Cover Details</h2>
            </div>
            <div class="row">
                @include('partials.info')
                <div class="col-lg-6">
                    <div class="col-md-12" style="padding: 1em 1em !important;">
                        <div class="row">
                            <a href="#" class="card lift">
                                <div class="card-body p-5 d-flex flex-row">
                                    <div class="p-2">
                                        <img style="max-width: 100px"
                                            src="{{ asset('frontend/assets/images/imoth.jpeg') }}">
                                    </div>
                                    <div>
                                        {{--                                                        <span class="badge bg-pale-blue text-blue rounded py-1 mb-2">Full Time</span> --}}
                                        <h4 class="mb-1">{{ $details->company->name }}</h4>
                                        <p class="mb-0 text-body"> <i class="uil uil-wallet me-1"></i> Ksh
                                            {{ number_format($total, 2) }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <hr>
                            <div class="single-features-card bg-color-2">
                                {!! $html !!}<br>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <span onclick="alert('Coming Soon')"
                                            class="btn btn-outline-info btn-sm d-lg-block col-md-6 text-center text-body">
                                            Print Quote <i class="uil uil-location-arrow"></i>
                                        </span>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <a class="btn btn-outline-aqua btn-sm rounded-pill btn-send mb-3"
                                            href="{{ route('front.comprehensive.details.submit', ['applicationId' => $applicationDetails->id, 'id' => $details->id]) }}">
                                            <span
                                                class="btn btn-outline-info btn-sm d-lg-block col-md-16 text-center text-body">
                                                Submit & Pay <i class="uil uil-save"></i></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <div class="card">
                            <div class="card-body" style="padding: 1em 1em !important;">
                                <div class="col-md-12">
                                    <h6 class="mb-4">Upload your details</h6>
                                    <form class="contact-form needs-validation" method="post"
                                        action="{{ route('front.comprehensive.upload', $applicationDetails->id) }}"
                                        novalidate enctype="multipart/form-data">
                                        @csrf
                                        <div class="row gx-4">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-4">
                                                    <div class="v"> National ID/Passport(Pdf,Word Doc or Image)
                                                    </div>
                                                    <input id="form_name" type="file" name="identification"
                                                        class="form-control" required>
                                                    {{--                                                                    <label for="form_name">Vehicle current value *</label> --}}
                                                    @if ($errors->has('identification'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('identification') }} </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating mb-4">
                                                    <div class="v"> K.R.A pin(Pdf,Word Doc or Image)</div>
                                                    <input id="form_name" type="file" name="kra"
                                                        class="form-control" required>
                                                    {{--                                                                    <label for="form_name">Vehicle current value *</label> --}}
                                                    @if ($errors->has('kra'))
                                                        <div class="invalid-feedback"> {{ $errors->first('kra') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating mb-4">
                                                    <div class="v"> Logbook (Pdf,Word Doc or Image)</div>
                                                    <input id="form_name" type="file" name="logbook"
                                                        class="form-control" required>
                                                    {{--                                                                    <label for="form_name">Vehicle current value *</label> --}}
                                                    @if ($errors->has('logbook'))
                                                        <div class="invalid-feedback"> {{ $errors->first('logbook') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- /column -->
                                            <div class="col-12 text-center">
                                                <button type="submit"
                                                    class="btn btn-success btn-sm rounded-pill btn-send mb-3"
                                                    value="Send message">Upload documents <i
                                                        class="uil uil-upload"></i> </button>
                                            </div>
                                            <div class="col-12 text-center">
                                                OR
                                            </div>
                                            <div class="col-12 text-center">
                                                <h6 class="mb-12">Send your Documents to our Whatsapp</h6>
                                                <div class="touch-content">
                                                    <a href="https://wa.me/254759642797">
                                                        <div class="contact-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="currentColor"
                                                                class="bi bi-whatsapp" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                                            </svg>
                                                        </div>
                                                        +254 759 642797
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- /column -->
                                        </div>
                                        <!-- /.row -->
                                    </form>
                                    <!-- /form -->
                                </div>
                            </div>
                            <!-- /column -->
                        </div>
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
