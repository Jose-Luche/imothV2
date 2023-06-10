@extends('admin.layouts.layout')
@section('title',$details->firstName.' '.$details->midName.' '.$details->lastName)
@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Users</a></li>
                                    <li class="breadcrumb-item active">{{ $details->firstName." ".$details->midName." ".$details->lastName }}</li>
                                </ol>
                            </div>
                            <h4 class="page-title">{{ $details->firstName." ".$details->midName." ".$details->lastName }}</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-5 col-xl-5">
                        <div class="card-box text-center">
                            <img src="{{ $details->avatar == null ? asset('images/logo.png') :asset('uploads/'.$details->avatar) }}" class="rounded-circle avatar-lg img-thumbnail"
                                 alt="profile-image">

                            <h4 class="mb-0">{{ $details->firstName." ".$details->midName." ".$details->lastName }}</h4>
                            <br>
                            <div class="text-left mt-3">
                                <p class="text-muted mb-2 font-13"><strong>Phone :</strong><span class="ml-2">{{ $details->phone }}</span></p>

                                <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">{{ $details->email }}</span></p>
                                <p class="text-muted mb-2 font-13"><strong>Gender :</strong> <span class="ml-2 ">{{ $details->gender }}</span></p>
                                <p class="text-muted mb-2 font-13"><strong>Added On :</strong> <span class="ml-2 ">{{ \Carbon\Carbon::parse($details->created_at)->format('D d ,F Y')}}</span></p>
                           </div>

                        </div> <!-- end card-box -->
                    </div> <!-- end col-->

                    <div class="col-lg-7 col-xl-7">
                        <div class="card-box">
                            @include('partials.info')
                            <ul class="nav nav-pills navtab-bg nav-justified">
                                <li class="nav-item">
                                    <a href="#details" data-toggle="tab" aria-expanded="false" class="nav-link active" >
                                        Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#password" data-toggle="tab" aria-expanded="false" class="nav-link">
                                        Update Password
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#avatar" data-toggle="tab" aria-expanded="false" class="nav-link">
                                        Update Avatar
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="details">
                                    <h5>Details</h5>
                                    <hr>
                                    <form id="demo-form" data-parsley-validate="" method="post" action="{{  route('admin.profile.update',$details->id) }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="firstname">First Name * :</label>
                                                    <input type="text"  name="firstName" class="form-control @error('firstName') is-invalid @enderror" id="firstname" placeholder="Enter first name" value="{{ $details->firstName }}">
                                                    @if ($errors->has('firstName'))
                                                        <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('firstName') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="lastname">Middle Name:</label>
                                                    <input type="text" name="midName" class="form-control @error('midName') is-invalid @enderror" id="lastname" placeholder="Enter Middle Name" value="{{ $details->midName }}">
                                                    @if ($errors->has('midName'))
                                                        <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('midName') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="lastname">Last Name * :</label>
                                                    <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" id="lastname" placeholder="Enter last Name" value="{{ $details->lastName }}">
                                                    @if ($errors->has('lastName'))
                                                        <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('lastName') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </div> <!-- end col -->
                                        </div>

                                        <div class="form-group">
                                            <label for="fullname">Email * :</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $details->email }}" required="">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="fullname">Phone *(User format 254700000000) :</label>
                                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $details->phone }}" required="">
                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('phone') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="fullname">Gender  *:</label>
                                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                                <option {{ $details->gender == 'Female'? 'selected':''  }} value="Female">Female</option>
                                                <option {{ $details->gender == 'Male' ? 'selected':''  }} value="Male">Male</option>
                                            </select>
                                            @if ($errors->has('gender'))
                                                <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('gender') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div style="padding-top: 10px" class="form-group mb-0">
                                            <input type="submit" class="btn btn-success" value="Update Profile">
                                        </div>

                                    </form>


                                </div> <!-- end tab-pane -->
                                <div class="tab-pane show" id="password">
                                    <h5>Update Password</h5>
                                    <hr>
                                    <form id="demo-form" data-parsley-validate="" method="post" action="{{ route('admin.profile.password') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="fullname">Old Password * :</label>
                                            <input type="password" name="oldPassword" class="form-control @error('password') is-invalid @enderror"  required="">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="fullname">New Password * :</label>
                                            <input type="password" name="newPassword" class="form-control @error('newPassword') is-invalid @enderror"  required="">
                                            @if ($errors->has('newPassword'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('newPassword') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="fullname">Confirm Password * :</label>
                                            <input type="password" name="confirmPassword" class="form-control @error('password_confirmation') is-invalid @enderror" required="">
                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                            @endif
                                        </div>



                                        <div style="padding-top: 10px" class="form-group mb-0 " >
                                            <input type="submit" class="btn btn-success pull" value="Update Password">
                                        </div>

                                    </form>


                                </div> <!-- end tab-pane -->
                                <div class="tab-pane show" id="avatar">
                                    <h5>Update Avatar</h5>
                                    <hr>
                                    <form id="demo-form" data-parsley-validate="" method="post" action="{{  route('admin.profile.avatar')}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                        <label for="message">Avatar *:</label>
                                        <div class="fallback">
                                            <input required name="image" type="file" />
                                        </div>
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div style="padding-top: 10px" class="form-group mb-0">
                                        <input type="submit" class="btn btn-success" value="Update Avatar">
                                    </div>
                                    </form>
                                </div>

                            </div> <!-- end tab-content -->
                        </div> <!-- end card-box-->

                    </div> <!-- end col -->
                </div>
                <!-- end row-->

            </div> <!-- container -->

        </div> <!-- content -->
@endsection
