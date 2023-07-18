@extends('admin.layouts.loginLayout')
@section('title','Login')
@section('content')
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <a href="#">
                                    <span><img src="{{ asset('images/logo.png') }}" alt="" height="50"></span>
                                </a>
                                <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p>
                            </div>
                            @include('partials.info')
                            <form action="{{ route('admin.login.action') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email address</label>
                                    <input name="email" class="form-control @error('email') is-invalid @enderror" type="email" id="emailaddress" required="" placeholder="Enter your email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input name="password" class="form-control @error('password') is-invalid @enderror" type="password" required="" id="password" placeholder="Enter your password">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                </div>

                            </form>

                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <p> <a href="{{ route('admin.password.reset') }}" class=" ml-1">Forgot your password?</a></p>
                                </div> <!-- end col -->
                            </div>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->


                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->
@endsection
