@extends('admin.layouts.layout')
@section('title',$details->firstName." ".$details->midName." ".$details->lastName)

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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Clients</a></li>
                                    <li class="breadcrumb-item active">Client Profile</li>
                                </ol>
                            </div>
                            <h4 class="page-title">User Profile</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-4 col-xl-4">
                        <div class="card-box text-center">
                            <img src="{{ $details->avatar == null ? asset('images/logo.png') : $details->avatar }}" class="rounded-circle avatar-lg img-thumbnail"
                                 alt="profile-image">

                            <h4 class="mb-0">{{ $details->firstName." ".$details->middleName." ".$details->lastName }}</h4>
                            {{--                            <p class="text-muted">@webdesigner</p>--}}
                            <br>

                            @if($details->authDetails->status == true)
                                <button onclick="suspendUser({{ $details->authDetails->id }})" type="button" class="btn btn-warning btn-xs waves-effect mb-2 waves-light">Suspend</button>
                            @else
                                <button onclick="activateUser({{ $details->authDetails->id }})" type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Activate</button>
                            @endif


                            <button onclick="deleteUser({{ $details->id }})" type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Delete</button>


                            <div class="text-left mt-3">

                                <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2">{{ $details->firstName." ".$details->middleName." ".$details->lastName }}</span></p>

                                <p class="text-muted mb-2 font-13"><strong>Phone :</strong><span class="ml-2">{{ $details->phone }}</span></p>

                                <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">{{ $details->email }}</span></p>
                                <p class="text-muted mb-2 font-13"><strong>Access Level :</strong> <span class="ml-2 ">{{ $details->authDetails->roles->name }}</span></p>

                                <p class="text-muted mb-1 font-13"><strong>Status :</strong>
                                    @if($details->authDetails->status == true)
                                        <span class="badge bg-success text-white ml-2">Active</span>
                                    @else
                                        <span class="badge bg-warning text-white ml-2">Inactive</span>
                                    @endif
                                </p>
                                <h4 class="font-13 text-uppercase">About:</h4>
                                <p class="text-muted font-13 mb-3">
                                    {{ $details->details }}
                                </p>
                            </div>

                        </div> <!-- end card-box -->
                    </div> <!-- end col-->

                    <div class="col-lg-8 col-xl-8">
                        <div class="card-box">
                            @include('partials.info')
                            <h5 class="mb-3 mt-4 text-uppercase">User Details.&nbsp;&nbsp;<i class="fa fa-edit"></i></h5>
                            <hr>
                            <div class="tab-content">
                                <div class="tab-pane show active">

                                    <form id="demo-form" data-parsley-validate="" method="post" action="{{ route('admin.users.update',$details->id) }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="firstname">First Name * :</label>
                                                    <input type="text"  name="firstName" class="form-control" id="firstname" placeholder="Enter first name" value="{{ $details->firstName }}">
                                                    @if ($errors->has('firstName'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('firstName') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="lastname">Middle Name:</label>
                                                    <input type="text" name="midName" class="form-control" id="lastname" placeholder="Enter Middle Name" value="{{ $details->midName }}">
                                                    @if ($errors->has('midName'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('midName') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="lastname">Last Name * :</label>
                                                    <input type="text" name="lastName" class="form-control" id="lastname" placeholder="Enter last Name" value="{{ $details->lastName }}">
                                                    @if ($errors->has('lastName'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('lastName') }}</strong>
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
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="fullname">Phone * :</label>
                                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $details->phone }}" required="">
                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="message">Role *:</label>
                                            <select class="form-control" name="role">
                                                @foreach($roles as $role)
                                                    <option {{ $details->authDetails->role == $role->id ? "selected":"" }} value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('role'))
                                                <span class="help-block">
                                                <strong>Role is required</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="fullname">Details *:</label>
                                            <textarea name="details" placeholder="Details" required class="form-control @error('phone') is-invalid @enderror">{{ $details->details }}</textarea>
{{--                                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $details->phone }}" required="">--}}
                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                            @endif
                                        </div>

{{--                                        <div style="padding-top: 10px" class="form-group mb-0 " >--}}
{{--                                            <input type="submit" class="btn btn-success pull" value="Edit Details">--}}
{{--                                        </div>--}}

                                    </form>


                                </div> <!-- end tab-pane -->

                            </div> <!-- end tab-content -->
                        </div> <!-- end card-box-->

                    </div> <!-- end col -->
                </div>
                <!-- end row-->

            </div> <!-- container -->

        </div> <!-- content -->
        <script>
            function deleteUser(id) {
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            var url = '{{ route("admin.users.delete", ":id") }}';

                            url = url.replace(':id', id);

                            window.location.href=url;

                        }
                    });
            }
            function suspendUser(id) {
                swal({
                    title: "Are you sure?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            var url = '{{ route("admin.users.suspend", ":id") }}';

                            url = url.replace(':id', id);

                            window.location.href=url;

                        }
                    });
            }
            function activateUser(id) {
                swal({
                    title: "Are you sure?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            var url = '{{ route("admin.users.activate", ":id") }}';

                            url = url.replace(':id', id);

                            window.location.href=url;

                        }
                    });
            }
        </script>

@endsection
