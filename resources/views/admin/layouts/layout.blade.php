
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title') | {{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Imoth Insurance." name="description" />
    <meta content="Imoth Insurance." name="Imoth Insurance." />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/fav.png') }}">
    <script src="https://unpkg.com/feather-icons"></script>
    {{--    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>--}}
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Plugins css -->
    <link href="{{ asset('admins/assets/libs/custombox/custombox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admins/assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('feathericon/css/feathericon.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admins/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admins/assets/libs/jquery-toast/jquery.toast.min.css') }}" rel="stylesheet" type="text/css" />


    <!-- App css -->
    <link href="{{ asset('admins/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admins/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admins/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admins/assets/libs/clockpicker/bootstrap-clockpicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admins/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admins/assets/libs/custombox/custombox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admins/assets/libs/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"></script>




</head>

<body>

<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">



            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{  Auth::user()->admin->avatar == null? asset('images/avatar.png'): asset('uploads/'.Auth::user()->admin->avatar) }}" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                                {{ Auth::user()->admin->firstName." ". Auth::user()->admin->midName." ". Auth::user()->admin->lastName }} <i class="fa fa-chevron-down"></i>
                            </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <!-- item-->
                    <a href="{{  route('admin.profile') }}" class="dropdown-item notify-item">
                        <i class="fa fa-user"></i>
                        <span>Profile</span>
                    </a>

                    <div class="dropdown-divider"></div>
                    <!-- item-->
                    <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                        <i class="fa fa-power-off"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>
        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{ route('admin.dashboard') }}" class="logo text-center">
                        <span class="logo-lg">
                            <img src="{{ asset('images/logo.png') }}" alt="" height="35">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">U</span> -->
                            <img src="{{ asset('images/logo.png') }}" alt="" height="24">
                        </span>
            </a>
        </div>

    </div>

    @include('admin.layouts.nav')
    @yield('content')

</div> <!-- content -->

<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                {{ date('Y') }} &copy; <a href="">{{ env('PROJECT_TITTLE') }}</a>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="{{ asset('admins/assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('admins/assets/libs/custombox/custombox.min.js') }}"></script>
<script>
    feather.replace()
</script>
<!-- Plugins js-->
<script src="{{ asset('admins/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('admins/assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('admins/assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('admins/assets/libs/flot-charts/jquery.flot.js') }}"></script>
<script src="{{ asset('admins/assets/libs/flot-charts/jquery.flot.time.js') }}"></script>
<script src="{{ asset('admins/assets/libs/flot-charts/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset('admins/assets/libs/flot-charts/jquery.flot.selection.js') }}"></script>
<script src="{{ asset('admins/assets/libs/flot-charts/jquery.flot.crosshair.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('admins/assets/libs/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
<script src="{{ asset('admins/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('admins/assets/js/pages/form-pickers.init.js') }}"></script>

{{--<script src="{{ asset('admins/assets/libs/sweetalert2/sweetalert2.min.js') }} "></script>--}}

<!-- Sweet alert init js-->
{{--<script src="{{ asset('admins/assets/js/pages/sweet-alerts.init.js') }}"></script>--}}
<!-- Dashboar 1 init js-->
{{--<script src="{{ asset('admins/assets/js/pages/dashboard-1.init.js') }}"></script>--}}
<!-- App js-->
<script src="{{ asset('admins/assets/js/app.min.js') }}"></script>

<script src="{{ asset('admins/assets/libs/custombox/custombox.min.js') }} "></script>
<script src="{{ asset('admins/assets/libs/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('admins/assets/js/pages/calendar.init.js') }}"></script>
</body>
</html>
