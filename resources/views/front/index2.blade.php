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
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-services-card d-flex align-items-center">
                        <div class="services-icon bg-icon-color">
                            <img src={{ asset('frontend/assets/images/services/couple.svg') }} alt="couple">
                        </div>
                        <h3><a href="{{ route('attachment') }}">Student Personal Accident</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-services-card d-flex align-items-center">
                        <div class="services-icon bg-icon-color">
                            <img src={{ asset('frontend/assets/images/services/couple.svg') }} alt="couple">
                        </div>
                        <h3><a href="{{ route('pa') }}">Personal Accident</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-services-card d-flex align-items-center">
                        <div class="services-icon bg-icon-color">
                            <img src={{ asset('frontend/assets/images/services/lightbulb.svg') }} alt="lightbulb">
                        </div>
                        <h3><a href="{{ route('bid_bond') }}">Bid Bond</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-services-card d-flex align-items-center">
                        <div class="services-icon bg-icon-color">
                            <img src={{ asset('frontend/assets/images/services/couple.svg') }} alt="lightbulb">
                        </div>
                        <h3><a href="{{ route('last_expense') }}">Funeral Expense</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Partners -->
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



    </div>
    @include('front.layout2.footer')
@endsection
