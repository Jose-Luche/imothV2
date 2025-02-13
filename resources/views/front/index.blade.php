@extends('front.layout.app')
@section('title','Home')
@section('content')
    <!-- /header -->
    <section class="wrapper bg-gradient-primary">
        <div class="container py-14 pt-md-15 pb-md-18">
            <div class="row text-center">
                <div class="col-lg-9 col-xxl-7 mx-auto" data-cues="zoomIn" data-group="welcome" data-interval="-200">
                    <h2 class="display-1 mb-4">Convenient & Reliable Insurance Solution</h2>
                    <p class="lead fs-24 lh-sm px-md-5 px-xl-15 px-xxl-10 mb-7">We provide a range of insurance products with benefits to suit your insurance needs at your convenience.</p>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
            <div class="d-flex justify-content-center" data-cues="slideInDown" data-group="join" data-delay="900">
                <span><a href="#covers" class="btn btn-lg btn-primary rounded-pill mx-1">See Covers</a></span>
                <span><a href="{{ route('contact.index') }}" class="btn btn-lg btn-outline-primary rounded-pill mx-1">Contact Us</a></span>
            </div>
            <!-- /div -->
{{--            <div class="row mt-12" data-cue="fadeIn" data-delay="1600">--}}
{{--                <div class="col-lg-8 mx-auto">--}}
{{--                    <figure><img class="img-fluid" src="./assets/img/illustrations/i12.png" srcset="./assets/img/illustrations/i12@2x.png 2x" alt=""></figure>--}}
{{--                </div>--}}
{{--                <!-- /column -->--}}
{{--            </div>--}}
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <section class="wrapper bg-light">
        <div class="container pb-14 pb-md-17">
            <div class="row gx-md-8 gx-xl-12 gy-10 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="card shadow-lg me-lg-6">
                        <div class="card-body p-6">
                            <div class="d-flex flex-row">
                                <div>
                                    <span class="icon btn btn-circle btn-lg btn-soft-primary disabled me-4"><span class="number">01</span></span>
                                </div>
                                <div>
                                    <h4 class="mb-1">Select the insurance you need</h4>
                                    <p class="mb-0">Fill our the details required.</p>
                                </div>
                            </div>
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!--/.card -->
                    <div class="card shadow-lg ms-lg-13 mt-6">
                        <div class="card-body p-6">
                            <div class="d-flex flex-row">
                                <div>
                                    <span class="icon btn btn-circle btn-lg btn-soft-primary disabled me-4"><span class="number">02</span></span>
                                </div>
                                <div>
                                    <h4 class="mb-1">Submit the details</h4>
                                    <p class="mb-0">Submit your details and complete the process.</p>
                                </div>
                            </div>
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!--/.card -->
                    <div class="card shadow-lg mx-lg-6 mt-6">
                        <div class="card-body p-6">
                            <div class="d-flex flex-row">
                                <div>
                                    <span class="icon btn btn-circle btn-lg btn-soft-primary disabled me-4"><span class="number">03</span></span>
                                </div>
                                <div>
                                    <h4 class="mb-1">Your will be contacted</h4>
                                    <p class="mb-0">You will be contacted when/if necessary by one of our representatives</p>
                                </div>
                            </div>
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!--/.card -->
                </div>
                <!--/column -->
                <div class="col-lg-6">
                    <h2 class="fs-16 text-uppercase text-primary mb-3">Application process</h2>
                    <h3 class="display-3 mb-4">How to apply.</h3>
                    <p class="intro-text">
                        Imoth Insurance agency is a registered Trade Name under Kenya Insurance Regulatory Authority.. We offer convenient and reliable insurance services to our clients through our online platform.
                        .</p>

                    <p class="mb-6">
                        We provide an easy way to apply for insurances on our website. Follow these steps to complete your application.</p>
                    <a href="#" class="btn btn-primary rounded-pill mb-0">Apply now</a>
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </section>
    <section class="wrapper bg-light" id="covers">
        <div class="container pt-5 pb-5 pt-md-5 pb-md-5" >
            <div class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-5 mb-xl-5 align-items-center">
                <div class="col-lg-7 order-lg-2">
                    <div class="row gx-md-5 gy-5">
                        <div class="col-md-6">
                            <a href="{{ route('front.comprehensive.index') }}">
                                <div class="card bg-pale-yellow">
                                    <div class="card-body">
                                        {{--                                    <img src="./assets/img/icons/lineal/telephone-3.svg" class="svg-inject icon-svg icon-svg-md text-yellow mb-3" alt="" />--}}
                                        <h4>Comprehensive Insurance</h4>
                                        <p class="mb-0 text-black-50">
                                            This is a comprehensive cover that protects the vehicles used by you for private purposes.
                                        </p>
                                        <a href="{{ route('front.comprehensive.index') }}" class="btn btn-warning rounded-pill mt-3">More Details <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                    <!--/.card-body -->
                                </div>
                            </a>
                            <!--/.card -->
                        </div>
                        <!--/column -->
                        <div class="col-md-6">
                            <a href="{{ route('front.third.index') }}">
                                <div class="card bg-pale-red">
                                    <div class="card-body">
                                        {{--                                    <img src="./assets/img/icons/lineal/shield.svg" class="svg-inject icon-svg icon-svg-md text-red mb-3" alt="" />--}}
                                        <h4>Third Party Insurance</h4>
                                        <p class="mb-0 text-black-50">
                                            Covers third-party bodily injury and property damage arising out of a vehicle accident.
                                        </p>
                                        <a href="{{ route('front.third.index') }}" class="btn btn-danger rounded-pill mt-3">More Details <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                    <!--/.card-body -->
                                </div>
                            </a>

                            <!--/.card -->
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('front.bond.index') }}">
                                <div class="card bg-pale-leaf">
                                    <div class="card-body">
                                        {{--                                    <img src="./assets/img/icons/lineal/cloud-computing-3.svg" class="svg-inject icon-svg icon-svg-md text-leaf mb-3" alt="" />--}}
                                        <h4>Bidbonds insurance</h4>
                                        <p class="mb-0 text-black-50">
                                            These bonds are normally issued for tenders, where the only obligation is a “Promisory Note”.
                                        </p>
                                        <a href="{{ route('front.bond.index') }}" class="btn btn-success rounded-pill mt-3">More Details <i class="fa fa-arrow-circle-right"></i> </a>
                                    </div>
                                    <!--/.card-body -->
                                </div>
                            </a>
                            <!--/.card -->
                        </div>
                        <!--/column -->
                        <div class="col-md-6">
                            <a href="{{ route('front.attachment.index') }}">
                                <div class="card bg-pale-primary">
                                    <div class="card-body">
                                        {{--                                    <img src="./assets/img/icons/lineal/analytics.svg" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />--}}
                                        <h4>Industrial attachment insurance</h4>
                                        <p class="mb-0 text-black-50">
                                            The Imoth Student personal accident cover insures you in case of death, permanent total...
                                        </p>
                                        <a href="{{ route('front.attachment.index') }}" class="btn btn-primary rounded-pill mt-3">More Details <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                    <!--/.card-body -->
                                </div>
                            </a>
                            <!--/.card -->
                        </div>
                    </div>

                    <!--/.row -->
                </div>
                <!--/column -->
                <div class="col-lg-5">
                    <h2 class="fs-15 text-uppercase text-muted mb-3">What We Offer?</h2>
                    <h3 class="display-4 mb-5">The covers we offer is specifically designed to meet your needs.</h3>
                    <p>We have combined our years of experience in insurance with our technology expertise
                        in order to serve Kenyans</p>
                    <p>Imoth Insurance agency provides a range of insurance products with benefits to suit our clients' insurance needs at their on convenience.</p>
                    <a href="#" class="btn btn-navy rounded-pill mt-3">More Details</a>
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </section>


    <section class="wrapper bg-light">
        <div class="container pt-6 pb-14 pb-md-16">
            <div class="row gx-lg-8 gx-xl-12 gy-10">
                <div class="col-lg-6 mb-0">
                    <h2 class="fs-16 text-uppercase text-primary mb-4">FAQ</h2>
                    <h3 class="display-3 mb-4">What is Imoth.co.ke?</h3>
                    <p class="mb-6">We are financial services private limited company registered under the Companies Act of Kenya. We are an insurance intermediary providing convenient and comparative services for the insurance services sector to consumers in Kenya
                    </p>
                </div>
                <!--/column -->
                <div class="col-lg-6">
                    <div id="accordion-3" class="accordion-wrapper">
                        <div class="card accordion-item shadow-lg">
                            <div class="card-header" id="accordion-heading-3-1">
                                <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-3-1" aria-expanded="false" aria-controls="accordion-collapse-3-1">Are we regulated and by who?
                                </button>
                            </div>
                            <!-- /.card-header -->
                            <div id="accordion-collapse-3-1" class="collapse" aria-labelledby="accordion-heading-3-1" data-bs-target="#accordion-3">
                                <div class="card-body">
                                    <p> We are a registered Insurance intermediary under the name Imoth Insurance Agency. We are authorized and regulated by the Insurance Regulatory Authority (IRA) of Kenya. We act by the guidelines and regulations of the IRA and the laws of Kenya
                                    </p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.collapse -->
                        </div>
                        <!-- /.card -->
                        <div class="card accordion-item shadow-lg">
                            <div class="card-header" id="accordion-heading-3-2">
                                <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-3-2" aria-expanded="false" aria-controls="accordion-collapse-3-2">
                                    Shouldn't I just buy directly from the insurance companies/ providers?
                                </button>
                            </div>
                            <!-- /.card-header -->
                            <div id="accordion-collapse-3-2" class="collapse" aria-labelledby="accordion-heading-3-2" data-bs-target="#accordion-3">
                                <div class="card-body">
                                    <p>We compare the different insurance products offered by over 10 different companies at present. You don't have to go to each and every insurance company in Kenya (trust me there are many...over 40 of them!). You can compare and purchase your insurance from the convenience of your mobile or computer from any of the leading insurance companies of your choice.
                                    </p>
                                    <p>We know that price is important to consumers, after all, that’s why you’re comparing. But everyone has different needs and so we’ll help you to find the right product for you, whether that’s by letting you filter search results or ensuring help is on hand to answer any questions you may have or help you along with your purchase.
                                    </p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.collapse -->
                        </div>

                    </div>
                    <!-- /.accordion-wrapper -->
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
        <div class="overflow-hidden">
            <div class="divider text-navy mx-n2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100">
                    <path fill="currentColor" d="M1260,1.65c-60-5.07-119.82,2.47-179.83,10.13s-120,11.48-180,9.57-120-7.66-180-6.42c-60,1.63-120,11.21-180,16a1129.52,1129.52,0,0,1-180,0c-60-4.78-120-14.36-180-19.14S60,7,30,7H0v93H1440V30.89C1380.07,23.2,1319.93,6.15,1260,1.65Z" />
                </svg>
            </div>
        </div>
        <!-- /.overflow-hidden -->
    </section>
    <!-- /section -->
</div>
@endsection
