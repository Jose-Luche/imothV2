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
                <span class="top-title">Seniors Medical Insurance</span>
                <h2>Payment</h2>
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
                                            src="{{ asset('frontend/assets/images/imoth1.png') }}">
                                    </div>
                                    <div>
                                        {{-- <span class="badge bg-pale-blue text-blue rounded py-1 mb-2">Full Time</span> --}}
                                        <h4 class="mb-1">Seniors Medical Insurance</h4>
                                        <p class="mb-0 text-body"> <i class="uil uil-wallet me-1"></i> Ksh
                                            @if($payment)
                                            {{ number_format($payment->balance_after, 2) }}
                                            @else
                                            {{ number_format($details->premiumPayable, 2) }}
                                            @endif
                                        </p>

                                        {{--Only show this form when the Balance is greater than 0--}}
                                        @if($payment)
                                        <form id="paymentForm">
                                            <div class="form-submit">
                                                
                                                <input type="hidden" id="name" value="{{$details->id}}">
                                                <input type="hidden" id="email" value="{!!$details->email!!}">
                                                <input type="hidden" id="amount" value="{{round($payment->balance_after)}}">
                                                <br><br>
                                                @if($payment->balance_after > 0)
                                                <button style="float:right" type="submit" class="btn btn-success btn-sm rounded-pill btn-send mb-3"  onclick="payWithPaystack()">Pay to Get Cover </button>
                                                @else
                                                <b>Fully Paid!</b>
                                                @endif
                                                
                                            </div>
                                        </form>
                                        @else
                                        <form id="paymentForm">
                                            <div class="form-submit">
                                                
                                                <input type="hidden" id="name" value="{{$details->id}}">
                                                <input type="hidden" id="email" value="{!!$details->email!!}">
                                                <input type="hidden" id="amount" value="{{round($details->premiumPayable)}}">
                                                <br><br>
                                                <button style="float:right" type="submit" class="btn btn-success btn-sm rounded-pill btn-send mb-3"  onclick="payWithPaystack()">Pay to Get Cover </button>
                                            </div>
                                        </form>
                                        @endif
                                        
                                        <script src="https://js.paystack.co/v1/inline.js"></script>
    
                                        <script>
                                            function payWithPaystack(e) {
                                                e.preventDefault(); // Prevent form submission

                                                
                                                let customerName = document.getElementById("name").value;
                                                let customerEmail = document.getElementById("email").value;
                                                let amount = document.getElementById("amount").value * 100;

                                                // Initialize Paystack payment
                                                let handler = PaystackPop.setup({
                                                    key: "{{ env('PAYSTACK_PUBLIC_KEY') }}", // Use your public key
                                                    email: customerEmail,
                                                    amount: amount,
                                                    currency: "KES",
                                                    metadata: {
                                                        custom_fields: [
                                                            {
                                                                display_name: "Customer Name",
                                                                variable_name: "customer_name",
                                                                value: customerName
                                                            }
                                                        ]
                                                    },
                                                    onClose: function(){
                                                        alert('Payment window closed.');
                                                    },
                                                    callback: function(response){
                                                        // Redirect to your backend with the reference
                                                        window.location.href = "{{ route('callback') }}?reference=" + response.reference;
                                                    }
                                                });

                                                handler.openIframe();
                                            }

                                            document.getElementById("paymentForm").addEventListener("submit", payWithPaystack);
                                        </script>
                                        
                                    </div>
                                </div>
                            </a>

                            
                        </div>
                        
                    </div>
                    
                </div>
                

            </div>
        </div>
    </div>

    @include('front.layout2.footer')


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
