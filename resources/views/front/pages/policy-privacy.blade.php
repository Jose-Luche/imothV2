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

    <div class="page-banner-area blog-page-are">
        <div class="container">
            <div class="single-page-banner-content">
                <h1>Policy Privacy</h1>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Policy Privacy</li>
                </ul>
            </div>
        </div>
    </div>



    <!-- Our Partners -->
    <div class="panther-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-12">
                    <div class="client-odometer">
                        <p>1. Introduction </p>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    Welcome to Imoth Insurance Brokers. Your privacy is important to us, and we are committed to protecting your personal information. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our mobile application
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-12">
                    <div class="client-odometer">
                        <p>2. Information We Collect  </p>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    We may collect the following types of information through our mobile app:
                    <ul>
                        <li>•	<b>Personal Data:</b> Includes your name, ID number, email address, phone number, password, and KRA PIN. This information is provided when you register or interact with our services.</li>
                        <li>•	<b>Aggregated Data:</b> We may collect aggregated statistical data that does not personally identify you but helps us improve our services.</li>
                        <li>•	<b>Device Access:</b> We may request access to your device’s storage, camera, and location (if required for service functionality). These permissions can be managed in your device settings.</li>
                        <li>•	<b>Device Data:</b> Information about your device, such as its IP address, model, manufacturer, operating system version, location, phone number, and country.</li>
                        <li>•	<b>Usage Data:</b>Information about how you interact with our mobile application, including pages visited and transaction history. </li>
                        <li>•	<b>Payment Data:</b>Mobile number used for payments (collected through STK push); we do not store full financial details. </li>
                        <li>•	<b>Insurance Data:</b> Client insurance history, quotations, claims, and policy details.</li>

                    </ul>
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-12">
                    <div class="client-odometer">
                        <p>3. How We Use Your Information  </p>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    We use your information for the following purposes:
                    <ul>
                        <li>•	To manage your account and authenticate users</li>
                        <li>•	To process insurance quotations, policies, and claims. </li>
                        <li>•	To maintain and enhance our services (including security, troubleshooting, and system updates). </li>
                        <li>•	To contact you with updates, promotional information, and customer support responses. </li>
                        <li>•	To monitor and prevent unauthorized access or fraudulent activity. </li>
                        <li>•	To use data analytics for improving customer experience. </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-12">
                    <div class="client-odometer">
                        <p>4. Tracking Technologies   </p>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    We use tracking technologies like cookies and web beacons to enhance functionality and collect analytics data. You can disable cookies in your browser settings, but this may affect service availability.
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-12">
                    <div class="client-odometer">
                        <p>5. Sharing Your Information    </p>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    We do not sell your personal information. However, we may share it with:
                    <ul>
                        <li>•	<b>Service Providers:</b> Third-party vendors such as payment processors and insurance authorities (e.g., Association of Kenya Insurers - AKI).</li>
                        <li>•	<b>Legal and Safety Requirements:</b>If required by law, regulation, or to protect our rights and security. </li>
                        <li>•	<b>Business Transfers:</b>If our company is merged, acquired, or undergoes restructuring. </li>
                        <li>•	<b>Marketing and Analytics:</b>We may share anonymized data with third parties for analytics and service improvement. </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-12">
                    <div class="client-odometer">
                        <p>6. Data Security    </p>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    We employ administrative, technical, and physical security measures to protect your personal data. However, no system is entirely secure, and we cannot guarantee complete protection against unauthorized access.
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-12">
                    <div class="client-odometer">
                        <p>7. Your Rights and Choices   </p>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    You have the right to:
                    <ul>
                        <li>•	Access, update, or delete your personal data within the app.</li>
                        <li>•	Restrict or object to certain types of data processing.</li>
                        <li>•	Opt out of marketing communications.</li>
                    </ul>
                    To exercise your rights, contact us at <b style="color: blue">insurance@imoth.co.ke</b>.
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-12">
                    <div class="client-odometer">
                        <p>8. Data Retention     </p>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    We retain personal data only for as long as necessary to fulfil its intended purposes, comply with legal obligations, and ensure service functionality. Data may be anonymized and retained for research or analytics purposes.
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-12">
                    <div class="client-odometer">
                        <p>9.Third-Party Links and Services      </p>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    Our app may contain links to third-party websites and services. We are not responsible for their privacy practices, and we encourage users to review their policies before providing information.
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-12">
                    <div class="client-odometer">
                        <p>10. Changes to This Policy </p>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    We may update this Privacy Policy periodically. Any significant changes will be communicated via the app or email.
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-12">
                    <div class="client-odometer">
                        <p>11. Contact Us  </p>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    If you have any questions about this Privacy Policy, please contact us at: Imoth Insurance Brokers
                    <ul>
                        <li>Email Address:	<b style="color: blue">insurance@imoth.co.ke</b></li>
                        <li>Phone Number:	<b style="color: blue">+254112476114</b></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div style="text-align: center">
                <b style="color: black">By using our mobile application, you agree to the terms outlined in this Privacy Policy.</b>
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
@endsection
