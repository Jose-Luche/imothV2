@extends('front.layout.app')
@section('title','Comprehensive insurance')
@section('content')
    <!-- /header -->
    <section class="wrapper bg-light">
        <div class="container pt-10 pt-md-14 pb-5">
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
        <div class="container pt-10 pt-md-14 pb-5">
            <div class="row">
                <div class="col-12">
                    <article class="mt-n21">
                        <figure class="rounded mb-8 mb-md-12"><img src="assets/img/photos/pp1.jpg" alt="" /></figure>
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">

                                <div class="row gx-0">
                                    <div class="col-md-6" style="padding: 1em 1em !important;">
                                        <h2 class="display-4 mb-4">Comprehensive Insurance</h2>
                                        <p>This is a comprehensive cover that protects the vehicles used by you for private purposes.</p>
                                        <p>This covers personal cars e.g salon cars, station wagons, SUVs,  & double cabins against vehicle damage and claims from third parties against you.
                                        </p>
                                        <h4>Benefits of Imoth Comprehensive Motor Insurance</h4>
                                        <ul>
                                            <li>Free valuation from our panel of valuers</li>
                                            <li>Medical expenses in case of an accident </li>
                                            <li>Courtesy car extension while the vehicle is in a garage following an accident </li>
                                        </ul>
                                    </div>
                                    <!--/column -->
                                    <div class="col-md-6 ms-auto">
                                        <div class="card">
                                            <div class="card-body" style="padding: 1em 1em !important;">
                                                <div class="col-12">
                                                  @yield('form')
                                                </div>
                                            </div>
                                            <!-- /column -->
                                        </div>
                                    </div>
                                    <!--/column -->
                                </div>
                                <!--/.row -->
                            </div>
                            <!-- /column -->
                        </div>
                        <!--/.row -->


                        <div class="container py-14 py-md-16" style="padding-top: 3rem!important;padding-bottom: 3rem!important;">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="fs-15 text-uppercase text-muted mb-3">What is covered?</h2>
                                        <h6 class="display-4 mb-9">What is covered under Comprehensive Car Insurance?</h6>
                                    </div>
                                    <!-- /column -->
                                </div>
                                <!-- /.row -->
                                <div class="row gx-md-8 gy-8">
                                    <div class="col-md-4">

                                        <h4>
                                            <div class="icon btn btn-block btn-sm btn-soft-yellow disabled">
                                                <i class="uil uil-phone-volume"></i>
                                            </div>
                                            Damages Due to Accidents</h4>
                                        <p class="mb-3">Unfortunate accidents occur, and they can cause so much trouble. That’s why this coves you and your car during all misfortunes.</p>
                                        {{--                                        <a href="#" class="more hover link-yellow">Learn More</a>--}}
                                    </div>
                                    <!--/column -->
                                    <div class="col-md-4">
                                        <h4>
                                            <span class="icon btn btn-block btn-sm btn-soft-red disabled ">
                                                <i class="uil uil-shield-exclamation"></i>
                                            </span>
                                            &nbsp;Car Theft</h4>
                                        <p class="mb-3">Unfortunately, if your lovely car is stolen- your
                                            comprehensive car insurance will help you in making the situation better.</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>
                                            <span class="icon btn btn-block btn-sm btn-soft-red disabled ">
                                                <i class="uil uil-arrow-break"></i>
                                            </span>
                                            &nbsp;Losses to a Third-Party</h4>
                                        <p class="mb-3">One gets bitter over strangers for both minor and major accidents – but with Comprehensive Car Insurance,
                                            it takes care of the same hence there is no need to become bitter</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>
                                            <span class="icon btn btn-block btn-sm btn-soft-red disabled ">
                                                <i class="uil uil-water-drop-slash"></i>
                                            </span>
                                            Damages Due to a Natural Disaster</h4>
                                        <p class="mb-3">Nature is not in our control. Therefore, don’t worry if a flood or a tree falls and damages your car.
                                            If you have Comprehensive Car insurance, you are covered!.</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>
                                            <span class="icon btn btn-block btn-sm btn-soft-red disabled ">
                                                <i class="uil uil-fire"></i>
                                            </span>
                                            Damages Caused in a Fire</h4>
                                        <p class="mb-3">Even a small fire can lead to major damages of your car or its parts. That’s why,
                                            a Comprehensive Car Insurance ensures you don’t need to bear the brunt of it.</p>
                                    </div>

                                    <!--/column -->
                                    <!--/column -->
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
    </div>
@endsection
