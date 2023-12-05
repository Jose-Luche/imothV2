@extends('front.layout.app')
@section('title', 'Contact Us')
@section('content')
    <!-- /header -->
    <section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-400 text-white"
        data-image-src="./assets/img/photos/bg3.jpg">
        <div class="container pt-17 pb-20 pt-md-19 pb-md-21 text-center">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1 class="display-1 mb-3 text-white">Get in Touch</h1>
                    <nav class="d-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb text-white">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                    <!-- /nav -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light angled upper-end">
        <div class="container pb-11">
            <div class="row mb-14 mb-md-16">
                <div class="col-xl-10 mx-auto mt-n19">
                    <div class="card">
                        <div class="row gx-0">
                            <div class="col-lg-6 align-self-stretch">
                                <div class="map map-full rounded-top rounded-lg-start">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10568.843779799692!2d36.82847802136817!3d-1.2844398475114567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1172d84d49a7%3A0xf7cf0254b297924c!2sNairobi!5e0!3m2!1sen!2ske!4v1646002149112!5m2!1sen!2ske"
                                        width="600" height="450" style="border:0;" allowfullscreen=""
                                        loading="lazy"></iframe>
                                </div>
                                <!-- /.map -->
                            </div>
                            <!--/column -->
                            <div class="col-lg-6">
                                <div class="p-10 p-md-11 p-lg-14">
                                    <div class="d-flex flex-row">
                                        <div>
                                            <div class="icon text-primary fs-28 me-4 mt-n1"> <i
                                                    class="uil uil-location-pin-alt"></i> </div>
                                        </div>
                                        <div class="align-self-start justify-content-start">
                                            <h5 class="mb-1">Address</h5>
                                            <address>Salama House, Wabera street, suite 305. <br
                                                    class="d-none d-md-block" />NAIROBI, KENYA</address>
                                        </div>
                                    </div>
                                    <!--/div -->
                                    <div class="d-flex flex-row">
                                        <div>
                                            <div class="icon text-primary fs-28 me-4 mt-n1"> <i
                                                    class="uil uil-phone-volume"></i> </div>
                                        </div>
                                        <div>
                                            <h5 class="mb-1">Phone</h5>
                                            <p> +254112476114 <br class="d-none d-md-block" /></p>
                                        </div>
                                    </div>
                                    <!--/div -->
                                    <div class="d-flex flex-row">
                                        <div>
                                            <div class="icon text-primary fs-28 me-4 mt-n1"> <i
                                                    class="uil uil-envelope"></i> </div>
                                        </div>
                                        <div>
                                            <h5 class="mb-1">E-mail</h5>
                                            <p class="mb-0"><a href="mailto:insurance@imoth.co.ke" class="link-body"><span
                                                        class="__cf_email__"> insurance@imoth.co.ke</span></a></p>
                                            {{--                                            <p class="mb-0"><a href="/cdn-cgi/l/email-protection#83ebe6eff3c3f0e2ede7e1ecfbade0ecee" class="link-body"><span class="__cf_email__" data-cfemail="d1b9b4bda191a2b0bfb5b3bea9ffb2bebc">[email&#160;protected]</span></a></p> --}}
                                        </div>
                                    </div>
                                    <!--/div -->
                                </div>
                                <!--/div -->
                            </div>
                            <!--/column -->
                        </div>
                        <!--/.row -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                    <h2 class="display-4 mb-3 text-center">Drop Us a Line</h2>
                    <p class="lead text-center mb-10">Reach out to us from our contact form and we will get back to you
                        shortly.</p>
                    <form class="contact-form needs-valdidation" method="post" action="{{ route('contact.action') }}"
                        novalidate>
                        <div class="messages"></div>
                        <div class="row gx-4">
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="form_name" type="text" name="name" class="form-control"
                                        placeholder="Jane" required>
                                    <label for="form_name">First Name *</label>
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please enter your first name. </div>
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="form_lastname" type="text" name="surname" class="form-control"
                                        placeholder="Doe" required>
                                    <label for="form_lastname">Last Name *</label>
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please enter your last name. </div>
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="form_email" type="email" name="email" class="form-control"
                                        placeholder="jane.doe@example.com" required>
                                    <label for="form_email">Phone number *</label>
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please provide a valid email address. </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="form_email" type="email" name="email" class="form-control"
                                        placeholder="jane.doe@example.com" required>
                                    <label for="form_email">Email </label>
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please provide a valid email address. </div>
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="col-md-12">
                                <div class="form-floating mb-4">
                                    <input id="form_email" type="email" name="email" class="form-control"
                                        placeholder="jane.doe@example.com" required>
                                    <label for="form_email">Subject </label>
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please provide a valid email address. </div>
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="col-12">
                                <div class="form-floating mb-4">
                                    <textarea id="form_message" name="message" class="form-control" placeholder="Your message" style="height: 150px"
                                        required></textarea>
                                    <label for="form_message">Message *</label>
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please enter your messsage. </div>
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="col-12 text-center">
                                <input type="submit" class="btn btn-primary rounded-pill btn-send mb-3"
                                    value="Send message">
                                <p class="text-muted"><strong>*</strong> These fields are required.</p>
                            </div>
                            <!-- /column -->
                        </div>
                        <!-- /.row -->
                    </form>
                    <!-- /form -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
