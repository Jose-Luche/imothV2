@extends('admin.layouts.layout')
@section('title','Edit'. $details->name)
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
                                    <li class="breadcrumb-item active">Edit {{ $details->name }}.</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Edit {{ $details->name }}.</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h2 class="header-title">Edit {{ $details->name }}.</h2>
                            <hr>
                            @include('partials.info')
                            <form id="demo-form" data-parsley-validate="" method="post" action="{{ route('admin.personalAccident.update',$details->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="fullname">Insurance Company * :</label>
                                    <select name="company"  class="form-control @error('name') is-invalid @enderror" >
                                        @foreach($companies as $company)
                                            <option {{ $details->companyId == $company->id ? "selected":"" }} value="{{$company->id}}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('company'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('company') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="firstname">Three months Fee :</label>
                                    <input type="text"  name="three_month" class="form-control" id="location"
                                           placeholder="Three months Fee" value="{{ $details->three_month }}">
                                    @if ($errors->has('three_month'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('three_month') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="firstname">Six months Fee :</label>
                                    <input type="text"  name="six_month" class="form-control" id="location"
                                           placeholder="Six months Fee" value="{{ $details->six_month }}">
                                    @if ($errors->has('six_month'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('six_month') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="firstname">One year Fee :</label>
                                    <input type="text"  name="one_year" class="form-control" id="one_year"
                                           placeholder="One year Fee" value="{{ $details->one_year }}">
                                    @if ($errors->has('one_year'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('one_year') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="fullname">Details(Optional)  :</label>
                                    <textarea id="mytextarea" rows="5" name="details"
                                              class="form-control @error('details')
                                                  is-invalid @enderror" >{{ $details->details }}</textarea> <!-- end Snow-editor-->
                                    @if ($errors->has('details'))
                                        <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('details') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <input type="hidden"  name="minYear" class="form-control" id="location"
                                       placeholder="Minimum Car Year" value="{{ $details->minYear }}">
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
    <script type="text/javascript">
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '#remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });

            function printErrorMsg (msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display','block');
                $(".print-success-msg").css('display','none');
                $.each( msg, function( key, value ) {
                    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                });
            }
        });
    </script>
@endsection
