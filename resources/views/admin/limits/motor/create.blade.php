@extends('admin.layouts.layout')
@section('title','Motor Limits/Clauses')
@section('content')
    {{--    <link href="{{ asset('admins/assets/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />--}}
    {{--    <link href="{{ asset('admins/assets/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />--}}
    {{--    <link href="{{ asset('admins/assets/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />--}}
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
                                New Motor Clauses
                            </div>
                            <h4 class="page-title">New Motor Clauses  </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">New Motor Clauses</h4>
                                @include('partials.info')
                                <form method="post" action="{{ route('admin.limits.motor.submit') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="fullname">Insurance Company * :</label>
                                        <select name="company"  class="form-control @error('name') is-invalid @enderror" required>
                                            <option value="">--Select Insurance Company--</option>
                                            @foreach($companies as $company)
                                                <option value="{{$company->id}}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('company'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('company') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="product">Product * :</label>
                                                <select name="product"  class="form-control" required>
                                                    <option value="">--Select Product--</option>
                                                    <option value="Motor Insurance">Motor Insurance</option>
                                                    <option value="Motorcycle Insurance">Motorcycle Insurance</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="class">Class of Insurance * :</label>
                                                <select name="class"  class="form-control" required>
                                                    <option value="">--Select Class--</option>
                                                    <option value="Comprehensive">Comprehensive Covers</option>
                                                    <option value="Third Party">Third Party Covers</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <label for="product">Clauses Section * :</label>
                                    <textarea id="mytextarea" rows="15" name="clauses" class="form-control @error('content') is-invalid @enderror" >{{ old('content') }}</textarea> <!-- end Snow-editor-->
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('content') }}</strong>
                                            </span>
                                    @endif
                                    <br>
                                    <div class="form-group" style="text-align: center">
                                        <input type="submit" class="btn btn-outline-success" value="Save Clauses">
                                    </div>
                                </form>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div><!-- end col -->
                </div>
                <!-- end row -->
            </div> <!-- container -->

        </div> <!-- content -->
    </div>
@endsection
