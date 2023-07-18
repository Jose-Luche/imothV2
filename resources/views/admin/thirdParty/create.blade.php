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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Third Party</a></li>
                                    <li class="breadcrumb-item active">Create Third Party Cover.</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Create Third Party Cover.</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->



                <div class="row">

                    <div class="col-12">
                        <div class="card-box">
                            <h2 class="header-title">Cover Details</h2>
                            <hr>
                            @include('partials.info')
                            <form id="demo-form" data-parsley-validate="" method="post" action="{{ route('admin.thirdParty.submit') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fullname">Insurance Company * :</label>
                                            <select name="company"  class="form-control @error('name') is-invalid @enderror" >
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category">Cover Type * :</label>
                                            <select name="category"  class="form-control @error('name') is-invalid @enderror" >
                                                <option value="">--Select Vehicle Use--</option>
                                                <option value="personal">Personal/Private Use</option>
                                                <option value="psv">PSV - Chauffeur Driven</option>
                                                <option value="own-goods">Commercial - Own Goods</option>
                                                <option value="general-cartage">Commercial - General Cartage</option>
                                            </select>
                                            @if ($errors->has('category'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('category') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="firstname">Standard Fee :</label>
                                            <input type="text"  name="rate" class="form-control" id="location"
                                                   placeholder="Standared Fee" value="{{ old('rate') }}">
                                            @if ($errors->has('rate'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('rate') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="firstname">Policy Duration * :</label>
                                            <select class="form-control" name="type">
                                                <option value="Annually">Annually</option>
                                                <option value="Monthly" >Monthly</option>
                                            </select>
                                            @if ($errors->has('type'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('type') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fullname">Details(Optional)  :</label>
                                    <textarea id="mytextarea" rows="5" name="details"
                                              class="form-control @error('details')
                                                      is-invalid @enderror" >{{ old('details') }}</textarea> <!-- end Snow-editor-->
                                    @if ($errors->has('details'))
                                        <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('details') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <br>



                                <div style="padding-top: 10px" class="form-group mb-0">
                                    <input type="submit" class="btn btn-success" value="Submit Insurance">
                                </div>

                            </form>
                        </div> <!-- end card-box-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->
            </div> <!-- container -->

        </div> <!-- content -->
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

@endsection
