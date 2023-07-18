<!DOCTYPE html>
<html lang="en">
@include('insurance.style')
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{{ env('APP_URL') }}">


    <title>{{ $payment->reference }}</title>
    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <style>
        .containers {
            position:relative;
            height: 200px;
            width: 200px;
        }
        .containers img {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            max-width: 200px;
            max-height: 200px;
            margin: auto;
            background-color: white;

        }
    </style>

</head>

<body >

<div class="container">
    <div class="row">
        <div class="card">

            <div class="col-md-12">
                <!-- Tab panes -->
                <div class="tab-content">
                    <!--second tab-->
                    <div class="tab-pane active" id="profile" role="tabpanel">
                        <div class="card-body">
                            <div class="row align-content-center">
                                <center>
                                    <div class="col-md-8 col-xs-6 ">
                                        <img style="height: 50px" src="http://maramoja.afrigarage.com/images/logo.png"><h4> &nbsp; <strong>IMOTH INSURANCE AGENCY</strong><br>
                                        </h4>
                                        <p class="text-muted" style="color: red;font-style: italic">Taking care of what is important</p>
                                    </div>
                                </center>
                            </div>
                            <hr style="padding: 0px !important;margin: 3px !important;">

                            <div class="row" style="padding-top: 0px !important;">
                                <div class="col-md-5 col-xs-5 col-lg-5 col-xl-5 col-sm-5">
                                    <h5 class="text-muted">Full Name </h5>
                                    <p>{{ $details->firstName." ".$details->lastName }}</p>
                                    <small class="text-muted">Phone number </small>
                                    <p>{{ $details->phone }}</p>
                                    <small class="text-muted p-t-30 db">Vehicle Make</small>
                                    <p>{{ $details->carMake }}</p>
                                    <small class="text-muted p-t-30 db">Vehicle Use</small>
                                    <p>{{ $details->vehicleUse }}</p>
                                    <small class="text-muted p-t-30 db">Vehicle YOM</small>
                                    <p>{{ $details->year }}</p>
                                    <small class="text-muted p-t-30 db">Date requested</small>
                                    <p>{{ \Carbon\Carbon::parse($details->created_at)->toDateString()  }}</p>
                                </div>
                                <div class="col-md-7 col-xs-7 col-lg-7 col-xl-7 col-sm-7">
                                    <small class="text-muted">Cover/Class </small>
                                    <p><strong>Motor private comprehensive</strong></p>
                                    <small class="text-muted">Cover start date </small>
                                    <p><strong>{{ \Carbon\Carbon::parse($details->date)->toDateString()  }}</strong></p>
{{--                                    <small class="text-muted">Policy Number </small>--}}
{{--                                    <p><strong>asdf}</strong></p>--}}
                                    <div class="col-md-4 col-xs-4 col-lg-4 col-xl-4 col-sm-4">
                                        <small class="text-muted">Excess Benefits</small>
                                        <p>   @foreach($details->benefits->where('isExcess',true) as $benefit)
                                            {{ $benefit->name }}<br>
                                        @endforeach
                                        </p>
                                        <small class="text-muted">Addon Benefits</small>
                                        <p>   @foreach($details->benefits->where('isExcess',true) as $benefit)
                                                {{ $benefit->name }}<br>
                                            @endforeach
                                        </p>
                                        </p>

                                        <br>
                                    </div>

                                    <br/>
                                </div>

                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-3 col-xs-3 col-lg-3 col-xl-3 col-sm-3">
                                    <h4>Total Premium : <span class="text-muted"> Ksh {{ number_format($payment->amount) }}</span></h4>
                                </div>
                                <div class="col-md-4 col-xs-4 col-lg-4 col-xl-4 col-sm-4">
                                    <p>Paybill no : 887940<br>
                                        Account number : {{ $payment->reference }}<br>
                                        Account name : Imoth Insurance Company</p>
                                </div>
                                <div class="col-md-5 col-xs-5 col-lg-5 col-xl-5 col-sm-5">
                                    <p>Salama House, Wabera street, suite 305.<br>
                                        NAIROBI, KENYA <br>
                                        Phone number : 254759642797<br>
                                        Email: insurance@imoth.co.ke</p>
                                </div>


                            </div>
                            {{--                            <div class="row">--}}
                            {{--                                <img style="max-height: 70px"  src="http://maramoja.afrigarage.com/images/logo.png">&nbsp; <strong>fsdfdsfds</strong>--}}
                            {{--                            </div>--}}
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <p style="text-align: center">SUBJECT TO OUR STANDARD POLICY TERMS AND CONDITIONS<br>
                                        THIS QUOATATION IS AN INVITATION TO OFFER AND DOES NOT CONSTITUTE AN OFFER
                                        QUOTATION VALID FOR 30 DAYS<br>
                                        PREMIUM INCLUSIVE OF ALL LEVIES </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>
