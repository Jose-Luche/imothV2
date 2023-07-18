<div class="header-area">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-3 col-md-3">
                <div class="header-left-bar-text">
                    <ul class="list-inline">
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
            <div class="col-lg-6 col-sm-9 col-md-9">
                <div class="header-right-content text-end">
                    <ul class="list-inline">
                        <li class="d-inline">
                            <img src={{ asset('frontend/assets/images/phone.svg') }} alt="Phone">
                            <a href="tel: +254 759 642797">+254 759 642797</a>
                        </li>
                        <li class="d-inline">
                            <img src={{ asset('frontend/assets/images/email.svg') }} alt="Email">
                            <a href="mailto:insurance@imoth.co.ke">insurance@imoth.co.ke
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="navbar-area">
    <div class="main-responsive-nav">
        <div class="container">
            <div class="main-responsive-menu">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src={{ asset('frontend/assets/images/imoth.jpeg') }} class="black-logo"
                            style="width:180px; height:140px" alt="imoth">
                        <img src={{ asset('frontend/assets/images/imoth.jpeg') }} class="white-logo"
                            style="width:180px; height:140px" alt="imoth">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main-navbar">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src={{ asset('frontend/assets/images/imoth.jpeg') }} class="black-logo"
                        style="width:180px; height:140px" alt="imoth">
                    <img src={{ asset('frontend/assets/images/imoth.jpeg') }} class="white-logo"
                        style="width:180px; height:140px" alt="imoth">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link active">
                                Home
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="{{ route('about') }}" class="nav-link active">
                                About Us
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Our Products
                                <i class='bx bx-down-arrow-alt'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{ route('motor') }}" class="nav-link">Motor Insurance</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('attachment') }}" class="nav-link">Attachment Insurance</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('medical') }}" class="nav-link">Health Insurance</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('home.ins') }}" class="nav-link">Home Insurance</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('travel') }}" class="nav-link">Travel Insurance</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('business') }}" class="nav-link">Business Insurance</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('bid_bond') }}" class="nav-link">Bid Bond Insurance</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="{{ route('life') }}" class="nav-link">Life Insurance</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('pa') }}" class="nav-link">Personal Accident</a>
                                </li>

                            </ul>
                        </li>
                        <!--<li class="nav-item">
                            <a href="#" class="nav-link">
                                Claims
                                <i class='bx bx-down-arrow-alt'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="portfolio.html" class="nav-link">Register Claim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="portfolio-details.html" class="nav-link">Download Forms</a>
                                </li>
                            </ul>
                        </li>-->

                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link">Contact Us</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('faq') }}" class="nav-link">FAQs</a>
                        </li>
                    </ul>
                    <div class="others-options d-flex align-items-center">
                        <div class="option-item">
                            <button class="searchbtn" type="button">
                                <i class='bx bx-search'></i>
                            </button>
                        </div>
                        <div class="option-item">
                            <a href="{{ route('products') }}" class="default-btn">Get A Quote</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>
            <div class="container">
                <div class="option-inner">
                    <div class="others-options d-flex align-items-center">
                        <div class="option-item">
                            <button class="searchbtn" type="button">
                                <i class='bx bx-search'></i>
                            </button>
                        </div>
                        <div class="option-item">
                            <a href="{{ route('products') }}" class="default-btn">Get A Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
