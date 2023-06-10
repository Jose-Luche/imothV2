@extends('front.layout.app')
@section('title','Industrial attachment insurance')
@section('content')
    <!-- /header -->
    <section class="wrapper bg-light">
        <div class="container pt-10 pt-md-14 pb-2">
            <div class="row">
                <div class="col-lg-10 col-xxl-8">
                    <h2>&nbsp;</h2>
                    {{--                    <h1 class="display-1 mb-0">Comprehensive insurance.</h1>--}}
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light wrapper-border">
        <div class="container pt-10 pt-md-14 pb-2">
            <div class="row">
                <div class="col-12">
                    <article class="mt-n21">
                        <figure class="rounded mb-8 mb-md-12"><img src="assets/img/photos/pp1.jpg" alt="" /></figure>

                        <div class="container py-14 py-md-16" style="padding-top: 3rem!important;padding-bottom: 3rem!important;">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="fs-15 text-uppercase text-muted mb-3">Industrial attachment insurance</h2>
                                        <h6 class="display-4 mb-3">Payment</h6>
                                    </div>
                                    <!-- /column -->
                                </div>
                                <!-- /.row -->
                                <div class="row gx-md-8 gy-8">
                                    @include('partials.info')
                                    <div class="row pt-10">
                                        <a href="#" class="card">
                                            <div class="card-body p-5 d-flex flex-row">
                                                <div class="p-2">
                                                    <img style="max-width: 100px" src="{{ asset('images/logo.png') }}">
                                                </div>
                                                <div>
                                                    {{--                                                        <span class="badge bg-pale-blue text-blue rounded py-1 mb-2">Full Time</span>--}}
                                                    <h4 class="mb-1">{{ $details->quoteDetails->company->name }}</h4>
                                                    <p class="mb-0 text-body">	<i class="uil uil-wallet me-1"></i> Ksh
                                                        {{ number_format($payment->amount) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6" style="padding: 1em 1em !important;">

                                        <div class="row p-0">
                                            <h4>How To Pay</h4>
                                            <ul>
                                                <li>Go to M-PESA on your phone</li>
                                                <li>Go to <strong>Lipa na M-pessa and select PayBill </strong>option</li>
                                                <li>Enter paybill number <strong>887940</strong></li>
                                                <li>Enter <strong>{{ $payment->reference }}</strong> as the account number</li>
                                                <li>Enter <strong>KSH {{ number_format($payment->amount) }}</strong> </li>
                                                <li>Enter your <strong>M-pesa pin</strong> and select Ok</li>
                                                <li>Your will receive a confirmation message from m-pesa</li>
                                            </ul>

                                        </div>

                                    </div>
                                    <!--/column -->
                                    <div class="col-md-6 ms-auto">
                                        <div class="card">
                                            <div class="card-body" style="padding: 1em 1em !important;">
                                                <div class="col-md-12">
                                                    <h6 class="mb-4">Or Submit your number to get a payment prompt</h6>
                                                    <form class="coaantact-form needs-validation" id="paymentRequestForm" method="post" action="{{ route('payment.stk') }}"  novalidate>
                                                        @csrf
                                                        <input type="hidden" name="invoice" value="{{ $payment->reference }}">
                                                        <input type="hidden" name="amount" value="{{ $payment->amount - $payment->paid_amount }}">
                                                        <div class="row gx-4">
                                                            <div class="col-md-12">
                                                                <div class="form-floating mb-4">
                                                                    {{--                                                                    <div class="v"> Safaricom phone number</div>--}}
                                                                    <input id="form_name" type="text" name="phone" class="form-control" value="{{ $payment->phone }}"  required>
                                                                    <label for="form_name">Enter your safaricom phone number *</label>
                                                                    @if ($errors->has('phone'))
                                                                        <div class="invalid-feedback"> {{ $errors->first('phone') }} </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <!-- /column -->
                                                            <div class="col-12 text-center">
                                                                <button type="submit" id="submitButton" class="btn btn-success btn-sm rounded-pill btn-send mb-3" value="Send message">Submit phone number  <i class="uil uil-arrow-circle-right"></i> </button>
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
                                <!--/.row -->
                            </div>
                            <!-- /.container -->
                        </div>
                        <!-- /.row -->
                    </article>
                    <!-- /.project -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
    <script>
        $(document).ready(function() {
            $('#paymentRequestForm').on('submit', function (e) {
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
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                    success: function (response) {
                        if (response.success === true) {
                            // $('#privateCarForm').trigger("reset");
                            $('#results').text('');
                            $('#results').append('<div class="alert alert-success">\n' +
                                '  <strong>'+response.message+'</strong>\n' +
                                '</div>\n');
                            {{--window.location.replace("{{ route('trade.bidBonds.complete',['#form']) }}");--}}
                            // swal("Success!", ""+response.message+"", "success");
                        } else {
                            $('#results').text('');
                            $('#results').append('<div class="alert alert-danger">\n' +
                                '  <strong>'+response.message+'</strong>\n' +
                                '</div>\n');
                            swal("Errors!",""+response.message+"","error");
                        }
                        $('#submitButton').text('');
                        $('#submitButton').append("Submit request</i>");
                    }
                });
            });
        });
        setInterval(function(){
            checkPayment();
        }, 5000);


        function checkPayment(){
            var data = $('#paymentRequestForm').serialize();
            $.ajax({
                url: "{{ route('payment.check') }}",
                method: "POST",
                data: data,
                type: 'json',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                success: function (response) {
                    console.log(response);
                    if (response.success === true) {
                        // $('#privateCarForm').trigger("reset");
                        $('#results').text('');
                        $('#results').append('<div class="alert alert-success">\n' +
                            '  <strong>'+response.message+'</strong>\n' +
                            '</div>\n');
                        {{--window.location.replace("{{ route('trade.bidBonds.complete',['#form']) }}");--}}
                        swal({ title: "Success!",
                            text: response.message,
                            type: "success"}).then(okay => {
                            if (okay) {
                                // window.location.href = "/pay/success/"+response.pay_id;
                                window.location.href="/";
                            }
                        });
                    } else {
                        $('#results').text('');
                        $('#results').append('<div class="alert alert-danger">\n' +
                            '  <strong>'+response.message+'</strong>\n' +
                            '</div>\n');
                        // swal("Errors!",""+response.message+"","error");
                    }
                }
            });
        }
    </script>
@endsection
