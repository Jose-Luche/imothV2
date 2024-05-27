@extends('admin.layouts.layout')
@section('title','New Institution')
@section('content')
    <script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=29qj3xynrj1ylz6s6pcvt0sfrztqxlu52k55du7ph1yjnwes"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Institutions</a></li>
                                    <li class="breadcrumb-item active">Create Institution.</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Create Institution.</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->



                <div class="row">

                    <div class="col-12">
                        <div class="card-box">
                            <h2 class="header-title">Company Details</h2>
                            <hr>
                            @include('partials.info')
                            <form id="demo-form" data-parsley-validate="" method="post" action="{{ route('admin.companies.submit') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="fullname">Name * :</label>
                                    <input type="text" name="name" placeholder="Institution Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required="">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="firstname">Location * :</label>
                                            <input type="text"  name="location" class="form-control" id="location" placeholder="Location" value="{{ old('location') }}">
                                            @if ($errors->has('location'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('location') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fullname">Details(Optional)  :</label>
                                    <textarea  name="details"
                                              class="form-control @error('details')
                                                      is-invalid @enderror" >{{ old('details') }}</textarea> <!-- end Snow-editor-->
                                    @if ($errors->has('details'))
                                        <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('details') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="fullname">Logo *:</label>
                                    <input type="file" name="logo"
                                           class="form-control @error('logo') is-invalid @enderror" value="{{ old('logo') }}" required="">
                                    @if ($errors->has('logo'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('logo') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div style="padding-top: 10px" class="form-group mb-0">
                                    <input type="submit" class="btn btn-success" value="Submit Company">
                                </div>

                            </form>
                        </div> <!-- end card-box-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->
            </div> <!-- container -->

        </div> <!-- content -->
    </div>
@endsection
