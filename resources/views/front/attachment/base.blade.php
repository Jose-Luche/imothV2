@extends('front.layout.app')
@section('title','Industrial attachment Insurance')
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
                                        <h2 class="display-4 mb-4">Industrial attachment Insurance</h2>
                                        <p>
                                            The Imoth Student personal accident cover insures you in case of death, permanent total disablement, and medical expenses arising from an accident during an internship at the place of work and in the learning institution during the specified period of cover

                                        </p>
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
