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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Comprehensive Insurance</a></li>
                                    <li class="breadcrumb-item active">Create Comprehensive Insurance.</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Create Comprehensive Insurance.</h4>
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
                            <form id="demo-form" data-parsley-validate="" method="post" action="{{ route('admin.comprehensive.submit') }}" enctype="multipart/form-data">
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">Rate in %* :</label>
                                            <input type="text"  name="rate" class="form-control" id="location"
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
                                            <label for="firstname">Minimum Premium (Ksh)* :</label>
                                            <input type="number"  name="minRate" class="form-control" id="location"
                                                   placeholder="Minimum Rate (Ksh)" value="{{ old('minRate') }}">
                                            @if ($errors->has('minRate'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('minRate') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="firstname">Minimum Car Year* :</label>
                                            <input type="number"  name="minYear" class="form-control" id="location"
                                                   placeholder="Minimum Car Year" value="{{ old('minYear') }}">
                                            @if ($errors->has('minYear'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('minYear') }}</strong>
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

                                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Comprehensive Benefits</h5>
                                <div id="results"></div>
                                <div class="row">
                                    <div id="dynamic_field" class="col-lg-12">
                                        <div class="container" id="contain0">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="firstname">Benefit Name* :</label>
                                                        <input type="text" placeholder="Benefit Name"
                                                               class="form-control" name="benefitName[]" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="firstname">Rate(%) * :</label>
                                                        <input type="text" class="form-control"
                                                               placeholder="Benefit Rate" name="benefitRate[]" required>
                                                        <input type="hidden" value="1" name="benefitRateType[]">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="firstname">Minimum Premium :</label>
                                                        <input type="number" class="form-control"
                                                               placeholder="Minimum Premium" name="benefitMinimum[]" required>
                                                    </div>
                                                </div>
{{--                                                <div class="col-md-3">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label for="firstname">Rate Type * :</label>--}}
{{--                                                        <select class="form-control @error('benefitRateType') is-invalid @enderror"--}}
{{--                                                                name="benefitRateType[]" required>--}}
{{--                                                            <option value="1">Percentage(%)</option>--}}
{{--                                                            <option value="2">Ksh</option>--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div> <!-- end col -->--}}
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="form-group"  style="padding-top: 25px;">
                                                            <button type="button" name="add" id="0"
                                                                    class="btn btn-outline-danger btn_remove">Remove <i class="fa fa-trash-alt"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <button type="button" name="add" id="add" class="btn btn-success">Add Excess Benefit <i class="fa fa-plus-circle"></i> </button>

                                                    <button type="button" name="add2" id="add2" class="btn btn-success">Add Addon Benefit <i class="fa fa-plus-circle"></i> </button>

                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                    </div>
                                </div>

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
            var i=1;
            var j=1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append(' <div class="container" id="contain'+i+'">\n' +
                    '                                            <div class="row">\n' +
                    '                                                <div class="col-md-10">\n' +
                    '                                                    <div class="form-group">\n' +
                    '                                                        <label for="firstname">Addon Benefit * :</label>\n' +
                    '                                                        <input type="text" placeholder="Benefit Name" ' +
                    '                                                       class="form-control" name="benefitName[]">\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                            </div>\n'+
                    '                                            <div class="row">\n' +
                    '                                                <div class="col-md-5">\n' +
                    '                                                    <div class="form-group">\n' +
                    '                                                        <label for="firstname">Rate(%) * :</label>\n' +
                    '                                                        <input type="text" class="form-control" ' +
                    '                                                           placeholder="Benefit Rate" name="benefitRate[]" required>\n' +
                    '                                                           <input type="hidden" value="1" name="benefitRateType[]">\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="col-md-5">\n' +
                    '                                                    <div class="form-group">\n' +
                    '                                                        <label for="firstname">Minimum Premium * :</label>\n' +
                    '                                                        <input type="number" class="form-control" \n' +
                    '                                           placeholder="Minimum Premium" name="benefitMinimum[]" required>\n' +
                    '                                                    </div>\n' +
                    '                                                </div> <!-- end col -->\n' +
                    '                                                <div class="col-md-2">\n' +
                    '                                                    <div class="form-group">\n' +
                    '                                                        <div class="form-group"  style="padding-top: 25px;">\n' +
                    '                                                            <button type="button" name="add" id="'+i+'"\n' +
                    '                                                                    class="btn btn-outline-danger btn_remove">Remove <i class="fa fa-trash-alt"></i></button>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                            </div>\n'+
                    '                                            </div>\n' +
                    '                                        </div><hr>');
            });
            $('#add2').click(function(){
                j++;
                $('#dynamic_field').append(' <div class="container" id="contain2'+j+'">\n' +
                    '                                            <div class="row">\n' +
                    '                                                <div class="col-md-10">\n' +
                    '                                                    <div class="form-group">\n' +
                    '                                                        <label for="firstname">Excess Benefit * :</label>\n' +
                    '                                                        <input type="text" placeholder="Benefit Name" ' +
                    '                                                       class="form-control" name="benefitName[]">\n' +
                    '                                                           <input type="hidden" value="2" name="benefitRateType[]">\n' +
                    '                                                           <input type="hidden" value="0" name="benefitMinimum[]">\n' +
                    '                                                           <input type="hidden" value="0" name="benefitRate[]">\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                            </div>\n'+
                    '                                                <div class="col-md-2">\n' +
                    '                                                    <div class="form-group">\n' +
                    '                                                        <div class="form-group"  style="padding-top: 25px;">\n' +
                    '                                                            <button type="button" name="add" id="'+j+'"\n' +
                    '                                                                    class="btn btn-outline-danger btn_remove2">Remove <i class="fa fa-trash-alt"></i></button>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                            </div>\n'+
                    '                                            </div>\n' +
                    '                                        </div><hr>');
            });
            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#contain'+button_id+'').remove();
            });
            $(document).on('click', '.btn_remove2', function(){
                var button_id = $(this).attr("id");
                $('#contain2'+button_id+'').remove();
            });



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
