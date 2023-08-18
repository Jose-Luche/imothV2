@extends('front.layout2.master')

@section('admin')
    @include('front.layout2.header')
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

    

    <div class="banner-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="single-banner-content">
                        <span>Get Reliable Insurance Coverage Today</span>
                        <h1>Protect what matters most</h1>
                        <p>Welcome to Imoth Insurance Brokers. We are your trusted partner in safeguarding your future. We
                            offer comprehensive
                            insurance solutions tailored to your unique needs.
                        </p>

                        <div class="banner-btn d-flex align-items-center">
                            <a href="#" class="default-btn">Get Started</a>

                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-banner-image">
                        <div class="banner-image3s">
                            <div class="banner-main-img">
                                <img src={{ asset('frontend/assets/images/cheerful_man.png') }} alt="banner-1">        
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="features-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span class="top-title">Our Strengths</span>
                <h2>Why Insure with us?</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-features-card">
                        <div class="features-icon">
                            <img src={{ asset('frontend/assets/images/features/features-icon-1.svg') }} alt="features-1">
                        </div>
                        <h3>Trustworthy Partnerships</h3>
                        <p>We have partnered with leading insurance companies, offering top-tier coverage options at
                            competitive rates, giving you the best value for your insurance investment.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-features-card bg-color-1">
                        <div class="features-icon">
                            <img src={{ asset('frontend/assets/images/features/features-icon-2.svg') }} alt="features-1">
                        </div>
                        <h3>Financial Protection</h3>
                        <p>We offer a reliable safety net. We guarantee reliable claims processes assistance that ensures
                            you get a fair settlement with a quick turn around time.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-features-card bg-color-2">
                        <div class="features-icon">
                            <img src={{ asset('frontend/assets/images/features/features-icon-3.svg') }} alt="features-1">
                        </div>
                        <h3>Customer Support</h3>
                        <p>Our friendly and knowledgeable team is dedicated to providing you with prompt, courteous service
                            at every step of the insurance process.

                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="single-features-card bg-color-3">
                        <div class="features-icon">
                            <img src={{ asset('frontend/assets/images/features/features-icon-4.svg') }} alt="features-1">
                        </div>
                        <h3>Personalized Approach</h3>
                        <p>Our experienced insurance professionals will work closely with you to assess your risks
                            and customize a policy that fits your budget.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="about-area pt-100 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="single-about-image">
                        <img src={{ asset('frontend/assets/images/happy_family.png') }}>
                            
                        <div class="about-shape">
                            <!--<img src="assets/images/about/about-shape-1.webp" alt="about-shape">-->
                        </div>
                        <div class="about-shape-1">
                            <!--<img src="assets/images/about/about-shape-2.webp" alt="about-shape">-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-about-content">
                        <div class="section-title left-title">
                            <span class="top-title">About Our Company</span>
                            <h2>Get Reliable Insurance Coverage Today!</h2>
                            <p>We are your trusted partner in safeguarding your future. We offer comprehensive
                                insurance solutions tailored to your unique needs. Our strengths include:</p>
                        </div>
                        <ul>
                            <li class="list-inline"><img src={{ asset('frontend/assets/images/about/about-icon.svg') }}
                                    alt="about-icon"> Robust Customer Support.
                            </li>
                            <li class="list-inline"><img src={{ asset('frontend/assets/images/about/about-icon.svg') }}
                                    alt="about-icon">Trustworthy partnerships with the panel of insurance companies we work
                                with.
                            </li>
                            <li class="list-inline"><img src={{ asset('frontend/assets/images/about/about-icon.svg') }}
                                    alt="about-icon">Extensive coverage options tailor-made to suit your insurance needs.
                            </li>
                            <li class="list-inline"><img src={{ asset('frontend/assets/images/about/about-icon.svg') }}
                                    alt="about-icon">Financial protection for your Insurance assets by guaranteeing quick
                                and effective claims processing.
                            </li>
                        </ul>
                        <div class="about-btn d-flex align-items-center">
                            <a href="{{ route('about') }}" class="default-btn">Read More</a>
                            <div class="call-experts">
                                <div class="phone-call">
                                    <img src={{ asset('frontend/assets/images/phone-call.svg') }} alt="phone-call">
                                </div>
                                <span>Call To Our Experts</span>
                                <a href="tel:+254759642797">+254 759 642797</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="services-area pt-100 pb-70">
        <div class="container">
            <div class="services-top-item d-flex align-items-end justify-content-between">
                <div class="section-title left-title">
                    <span class="top-title">Our Services</span>
                    <h2>Imoth Insurance Services</h2>
                </div>
                <a href="{{ route('products') }}" class="default-btn">All Services</a>
            </div>
            <div class="row" data-cues="slideInUp">
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-services-card d-flex align-items-center">
                        <div class="services-icon">
                            <img src={{ asset('frontend/assets/images/services/couple.svg') }} alt="couple">
                        </div>
                        <h3><a href="{{ route('life') }}">Life Insurance</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-services-card d-flex align-items-center">
                        <div class="services-icon">
                            <img src={{ asset('frontend/assets/images/services/home.svg') }} alt="home">
                        </div>
                        <h3><a href="{{ route('home.ins') }}">Home Insurance</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-services-card d-flex align-items-center">
                        <div class="services-icon bg-icon-color">
                            <img src={{ asset('frontend/assets/images/services/lightbulb.svg') }} alt="lightbulb">
                        </div>
                        <h3><a href="{{ route('business') }}">Business Insurance</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-services-card d-flex align-items-center">
                        <div class="services-icon bg-icon-color1">
                            <img src={{ asset('frontend/assets/images/services/heart.svg') }} alt="heart">
                        </div>
                        <h3><a href="{{ route('medical') }}">Medical Insurance</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-services-card d-flex align-items-center">
                        <div class="services-icon bg-icon-color2">
                            <img src={{ asset('frontend/assets/images/services/car.svg') }} alt="car">
                        </div>
                        <h3><a href="{{ route('motor') }}">Motor Insurance</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-services-card d-flex align-items-center">
                        <div class="services-icon bg-icon-color2">
                            <img src={{ asset('frontend/assets/images/services/services-icon-1.svg') }} alt="lightbulb">
                        </div>
                        <h3><a href="{{ route('travel') }}">Travel Insurance</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (\App\Models\Admin::where('avatar', '!=', null)->first())
        <div class="experts-area pt-100 pb-70">
            <div class="container">
                <div class="section-title">
                    <span class="top-title">Our Experts</span>
                    <h2>Meet Our Experienced Team</h2>
                </div>
                <div class="experts-slider owl-carousel owl-theme">
                    @foreach (\App\Models\Admin::all() as $row)
                        <div class="single-experts-card">
                            <div class="experts-img">
                                <img src={{ asset('storage/' . $row->avatar) }} alt="experts">
                                <div class="experts-list">
                                    <ul>
                                        <li>
                                            <a href="https://www.facebook.com/" target="_blank">
                                                <i class='bx bxl-facebook'></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/" target="_blank">
                                                <i class='bx bxl-twitter'></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.linkedin.com/" target="_blank">
                                                <i class='bx bxl-linkedin'></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.google.com/" target="_blank">
                                                <i class='bx bxl-google'></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="experts-content">
                                <h3>{!! $row->firstName . ' ' . $row->midName . ' ' . $row->lastName !!}</h3>
                                <p>{!! $row->firstName !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="panther-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12">
                    <div class="client-odometer">
                        <h2>

                        </h2>
                        <p>Our Insurance Partners Include</p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="panther-slider owl-carousel owl-theme">
                        <div class="panther-logo">
                            <img src={{ asset('frontend/assets/images/partners/1.png') }} alt="panther-logo">
                        </div>
                        <div class="panther-logo">
                            <img src={{ asset('frontend/assets/images/partners/2.png') }} alt="panther-logo">
                        </div>
                        <div class="panther-logo">
                            <img src={{ asset('frontend/assets/images/partners/3.png') }} alt="panther-logo">
                        </div>
                        <div class="panther-logo">
                            <img src={{ asset('frontend/assets/images/partners/4.png') }} alt="panther-logo">
                        </div>
                        <div class="panther-logo">
                            <img src={{ asset('frontend/assets/images/partners/5.png') }} alt="panther-logo">
                        </div>
                        <div class="panther-logo">
                            <img src={{ asset('frontend/assets/images/partners/6.png') }} alt="panther-logo">
                        </div>
                        <div class="panther-logo">
                            <img src={{ asset('frontend/assets/images/partners/7.png') }} alt="panther-logo">
                        </div>
                        <div class="panther-logo">
                            <img src={{ asset('frontend/assets/images/partners/8.png') }} alt="panther-logo">
                        </div>
                        <div class="panther-logo">
                            <img src={{ asset('frontend/assets/images/partners/9.png') }} alt="panther-logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    @include('front.layout2.footer')
@endsection
