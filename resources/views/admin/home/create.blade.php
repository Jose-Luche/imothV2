@extends('admin.layouts.layout')
@section('title', 'New Home Insurance')
@section('content')
    <script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=29qj3xynrj1ylz6s6pcvt0sfrztqxlu52k55du7ph1yjnwes">
    </script>
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
                                    <li class="breadcrumb-item active">Home Insurance.</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Home Insurance.</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->



                <div class="row">

                    <div class="col-12">
                        <div class="card-box">
                            <h2 class="header-title">Details</h2>
                            <hr>
                            @include('partials.info')
                            <form id="demo-form" data-parsley-validate="" method="post"
                                action="{{ route('admin.home.submit') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="fullname">Insurance Company * :</label>
                                    <select name="company" class="form-control @error('name') is-invalid @enderror">
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('company'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('company') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label for="fullname">Home Category * :</label>
                                    <select name="category" class="form-control @error('name') is-invalid @enderror">
                                        <option value="">Select Category</option>
                                        <option value="Building">Building</option>
                                        <option value="Contents">Contents</option>
                                        <option value="All Risks">All Risks</option>
                                        <option value="Domestic Workers">Domestic Workers</option>
                                        <option value="Owners Liability">Owners Liability</option>
                                        <option value="Occupiers Liability">Occupiers Liability</option>
                                    </select>
                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">Rate in %* :</label>
                                            <input type="text" name="rate" class="form-control" id="location"
                                                placeholder="Rate in %" value="{{ old('rate') }}">
                                            @if ($errors->has('rate'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('rate') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">Min Premium :</label>
                                            <input type="text" name="minRate" class="form-control" id="location"
                                                placeholder="Min Rate" value="{{ old('minRate') }}">
                                            @if ($errors->has('minRate'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('minRate') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="fullname">Details(Optional) :</label>
                                    <textarea rows="10" name="details"
                                        class="form-control @error('details')
                                                      is-invalid @enderror">{{ old('details') }}</textarea> <!-- end Snow-editor-->
                                    @if ($errors->has('details'))
                                        <span class="help-block">
                                            <strong style="color: red">{{ $errors->first('details') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <br>


                                <div style="padding-top: 10px" class="form-group mb-0">
                                    <input type="submit" class="btn btn-success" value="Submit">
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
