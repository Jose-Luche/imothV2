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

                <h2>Pay for Cover</h2>
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
                                        <h4 class="mb-1">Total Premium</h4>
                                        <p class="mb-0 text-body"> <i class="uil uil-wallet me-1"></i> Ksh
                                            {{ number_format($payment->amount, 2) }}
                                        </p>
                                    </div>
                                </div>
                            </a>


                        </div>
                    </div>
                </div>
                <div class="features-area pt-100 pb-70">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>How To Pay</h4>
                            <ul>
                                <li>Go to M-PESA on your phone</li>
                                <li>Go to <strong>Lipa na M-pesa and select PayBill </strong>option</li>
                                <li>Enter paybill number <strong>4108121</strong></li>
                                <li>Enter <strong>{{ $payment->reference }}</strong> as the account number</li>
                                <li>Enter <strong>KSH {{ number_format($payment->amount) }}</strong> </li>
                                <li>Enter your <strong>M-pesa pin</strong> and select Ok</li>
                                <li>Your will receive a confirmation message from m-pesa</li>
                            </ul>

                        </div>

                        {{--<div class="col-md-6">
                            <h6 class="mb-4">Or Submit your number to get a payment prompt</h6>
                            <form class="coaantact-form needs-validation" id="paymentRequestForm" method="post"
                                action="{{ route('payment.stk') }}" novalidate>
                                @csrf
                                <input type="hidden" name="invoice" value="{{ $payment->reference }}">
                                <input type="hidden" name="amount"
                                    value="{{ round($payment->amount) - $payment->paid_amount ?? 0 }}">
                                <div class="row gx-4">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-4">
                                            
                                            <input id="form_name" type="text" name="phone" class="form-control"
                                                value="{{ $payment->phone }}" required>
                                            <label for="form_name">Enter your safaricom phone number *</label>
                                            @if ($errors->has('phone'))
                                                <div class="invalid-feedback"> {{ $errors->first('phone') }} </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /column -->
                                    <div class="col-12 text-center">
                                        <button type="submit" id="submitButton"
                                            class="btn btn-success btn-sm rounded-pill btn-send mb-3"
                                            value="Send message">Submit phone number <i
                                                class="uil uil-arrow-circle-right"></i> </button>
                                    </div>

                                    <!-- /column -->
                                </div>
                                <!-- /.row -->
                            </form>
                            <!-- /form -->
                        </div>--}}
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('front.layout2.footer')
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#paymentRequestForm').on('submit', function(e) {
                $('#submitButton').text('');
                $('#submitButton').append("Please wait <i class='fa fa-spinner'></i>");
                var data = $('#paymentRequestForm').serialize();
                console.log(data)
                e.preventDefault();
                $.ajax({
                    url: "{{ route('payment.stk') }}",
                    method: "POST",
                    data: data,
                    type: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success === true) {
                            // $('#privateCarForm').trigger("reset");
                            $('#results').text('');
                            $('#results').append('<div class="alert alert-success">\n' +
                                '  <strong>' + response.message + '</strong>\n' +
                                '</div>\n');
                            {{-- window.location.replace("{{ route('trade.bidBonds.complete',['#form']) }}"); --}}
                            // swal("Success!", ""+response.message+"", "success");
                        } else {
                            $('#results').text('');
                            $('#results').append('<div class="alert alert-danger">\n' +
                                '  <strong>' + response.message + '</strong>\n' +
                                '</div>\n');
                            swal("Errors!", "" + response.message + "", "error");
                        }
                        $('#submitButton').text('');
                        $('#submitButton').append("Submit request</i>");
                    }
                });
            });
        });
        setInterval(function() {
            checkPayment();
        }, 5000);


        function checkPayment() {
            var data = $('#paymentRequestForm').serialize();
            $.ajax({
                url: "{{ route('payment.check') }}",
                method: "POST",
                data: data,
                type: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    if (response.success === true) {
                        // $('#privateCarForm').trigger("reset");
                        $('#results').text('');
                        $('#results').append('<div class="alert alert-success">\n' +
                            '  <strong>' + response.message + '</strong>\n' +
                            '</div>\n');
                        {{-- window.location.replace("{{ route('trade.bidBonds.complete',['#form']) }}"); --}}
                        swal({
                            title: "Success!",
                            text: response.message,
                            type: "success"
                        }).then(okay => {
                            if (okay) {
                                // window.location.href = "/pay/success/"+response.pay_id;
                                window.location.href = "/";
                            }
                        });
                    } else {
                        $('#results').text('');
                        $('#results').append('<div class="alert alert-danger">\n' +
                            '  <strong>' + response.message + '</strong>\n' +
                            '</div>\n');
                        // swal("Errors!",""+response.message+"","error");
                    }
                }
            });
        }
    </script>

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
