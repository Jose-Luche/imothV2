@extends('admin.layouts.loginLayout')
@section('title','Activate Account')
@section('content')
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <a href="#">
                                    <span><img src="{{ asset('images/logo.png') }}" alt="" height="70"></span>
                                </a>
                                <p class="text-muted mb-4 mt-3">Enter your  Email and New password.</p>
                            </div>
                            @include('partials.info')
                            <form action="{{ route('admin.users.activate.action') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email address</label>
                                    <input name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" type="email" id="emailaddress" required="" placeholder="Enter your email">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <input type="hidden" name="token" value="{{ $details->remember_token }}">
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input name="password" class="form-control @error('password') is-invalid @enderror" type="password" required="" id="password" placeholder="Enter your password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Confirm Password</label>
                                    <input name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" type="password" required="" id="password" placeholder="Confirm your password">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                    @endif
                                </div>



                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" type="submit"> Reset Password </button>
                                </div>

                            </form>

                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <p> <a href="{{ route('admin.login') }}" class=" ml-1">Login</a></p>
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
