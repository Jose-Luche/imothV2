@extends('admin.layouts.layout')
@section('title', 'Health Insurance')
@section('content')
    <script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=el10nm9y1p1ac1opfal1yarz6fodknkyv7zj6x11aijer3u8">
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
                                    <li class="breadcrumb-item active">Health Insurance.</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Health Insurance.</h4>
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
                                action="{{ route('admin.health.submit') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-3">
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
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="inpatientLimit">Limit Type:</label>
                                            <select name="limitType"
                                                class="form-control @error('limitType') is-invalid @enderror">
                                                <option value="">Select Limit Type</option>
                                                <option value="inpatient">Inpatient Limit</option>
                                                <option value="outpatient">Outpatient Limit</option>
                                                <option value="dental">Dental Limit</option>
                                                <option value="optical">Optical Limit</option>
                                                <option value="maternity">Maternity Limit</option>
                                            </select>
                                            @if ($errors->has('limit'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('limit') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="inpatientLimit">PF/PP:</label>
                                            <select name="pp_pf"
                                                class="form-control @error('pp_pf') is-invalid @enderror">
                                                <option value="pf">Per Family (PF)</option>
                                                <option value="pp">Per Person (PP)</option>
                                            </select>
                                            @if ($errors->has('pp_pf'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('pp_pf') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="inpatientLimit">Limit Amount:</label>
                                            <input type="text" name="limit" class="form-control"
                                                placeholder="Limit Amount" value="{{ old('limit') }}">
                                            @if ($errors->has('limit'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('limit') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fullname">Covered Benefit Details :</label>
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
