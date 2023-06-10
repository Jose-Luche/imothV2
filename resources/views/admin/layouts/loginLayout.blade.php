<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title') | {{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Imoth Insurance." name="description" />
    <meta content="Imoth Insurance." name="Imoth Insurance." />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('admins/assets/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('admins/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admins/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admins/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg authentication-bg-pattern">

@yield('content')

<footer class="footer footer-alt">
    {{ date('Y') }} &copy;<a href="" class="text-white-50">{{ env('APP_NAME') }}</a>
</footer>

<!-- Vendor js -->
<script src="{{asset('admins/assets/js/vendor.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('admins/assets/js/app.min.js')}}"></script>

</body>
</html>
