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

    <div class="banner-three-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="single-banner-three-content">
                        <h1>Seniors Medical Insurance</h1>
                        <p>
                            Get an enhanced insurance solution providing health benefits for life.
                        </p>
                        <div class="banner-btn d-flex align-items-center">
                            <a href="{{route('seniors')}}" class="default-btn">Get Quote</a>                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-banner-image">
                        <div class="banner-image3s">
                            <div class="banner-main-img">
                                <img src={{ asset('frontend/assets/images/senior-citizen-2.jpg') }} class="rounded-circle">
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>



    <!-- Our Partners -->
    <div class="panther-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-12">
                    <div class="client-odometer">
                        <p>Our Insurance Partners Include</p>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
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
        <div class="experts-area  pb-70">
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
    @include('front.layout2.footer')
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                items: 1, // Number of items to display
                loop: true, // Loop through items
                autoplay: true, // Auto play
                autoplayTimeout: 3000, // Time between transitions
                autoplayHoverPause: true // Pause on hover
            });
        });
    </script>
@endsection
