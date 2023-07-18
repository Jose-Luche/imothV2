@extends('admin.layouts.layout')
@section('title','Health Insurance IP Premiums')
@section('content')
    <script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=29qj3xynrj1ylz6s6pcvt0sfrztqxlu52k55du7ph1yjnwes"></script>
    <script src={{ asset('frontend/assets/js/jquery.min.js') }}></script>
    <script>

        $(document).ready(function (){
            $('#insurance-company').change(function (){
                let insurer = $(this).val();
                /**Go and get all Limits present for a given insurer**/
                if(insurer != ''){
                    $('#inpatient-limit').show();

                    $.ajax({
                        method: 'GET',
                        url: '/admin/health/limits/'+insurer,
                        data: insurer,
                        success: function (res){
                            if(res != ""){
                                $('#inpatient-limit').html(res);
                                $('#premiums-section').show();
                                $('#premiums-section-spouse').show();
                            }else{
                                $('#inpatient-limit').hide();
                            }
                        }
                    });
                }else{
                    $('#inpatient-limit').hide();
                    $('#premiums-section').hide();
                    $('#premiums-section-spouse').hide();
                }

            });
        });

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
                                    <li class="breadcrumb-item active">Inpatient Premiums.</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Inpatient Premiums.</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->



                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h2 class="header-title">Setup Inpatient Premiums</h2>
                            <hr>
                            @include('partials.info')
                            <form id="demo-form" data-parsley-validate="" method="post" action="{{ route('admin.health.submit_ip_premiums') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fullname">Insurance Company * :</label>
                                            <select name="companyId" id="insurance-company"  class="form-control @error('name') is-invalid @enderror" >
                                                <option value="">--Select Insurance Company--</option>
                                                @foreach($companies as $company)
                                                    <option value="{{$company->id}}">{{ $company->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('companyId'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('companyId') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="inpatient-limit" style="display: none"></div>
                                </div>
                                <div class="row" id="premiums-section" style="display: none">
                                    <div id="principal-member">
                                        <p style="color: red">1. Principal Member Details</p>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="ageFrom">Age:</label>
                                                    <input type="text"  name="age_from[]" class="form-control" placeholder="Age From" value="{{ old('age_from') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="ageTo">Age To:</label>
                                                    <input type="text"  name="age_to[]" class="form-control" placeholder="Age To" value="{{ old('age_to') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="principalPremium">IP Premium:</label>
                                                    <input type="text"  name="princ_premium[]" class="form-control" placeholder="Premium Amount" value="{{ old('princ_premium') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="childPremium">Child Premium:</label>
                                                    <input type="text"  name="child_premium[]" class="form-control" placeholder="Child Premium" value="{{ old('child_premium') }}">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div style="padding-top: 10px" class="form-group mb-0">
                                        <button type="button" name="add-principal-range" id="add-principal-range" class="btn btn-success"> <i class="fa fa-plus-circle"></i>  Add Range</button>
                                    </div>
                                </div>

                                <hr>
                                <div class="row" id="premiums-section-spouse" style="display: none">
                                    <div id="spouse-member">
                                        <p style="color: red">2. Spouse Premium Details</p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="ageFrom">Spouse Age From:</label>
                                                    <input type="text"  name="sp_age_from[]" class="form-control" placeholder="Age From" value="{{ old('sp_age_from') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="ageTo">Spouse Age To:</label>
                                                    <input type="text"  name="sp_age_to[]" class="form-control" placeholder="Age To" value="{{ old('sp_age_to') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="principalPremium">Spouse Premium:</label>
                                                    <input type="text"  name="sp_premium[]" class="form-control" placeholder="Spouse Premium Amount" value="{{ old('sp_premium') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="padding-top: 10px" class="form-group mb-0">
                                        <button type="button" name="add-spouse-range" id="add-spouse-range" class="btn btn-success"> <i class="fa fa-plus-circle"></i>  Add Spouse Range</button>
                                    </div>
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
    <script type="text/javascript">
        $(document).ready(function(){
            var i=1;
            var j=1;
            $('#add-principal-range').click(function(){
                i++;
                $('#principal-member').append(' <div class="container" id="contain'+i+'">\n' +
                    '                                            <div class="row">\n' +
                    '                                                <div class="col-md-2">\n' +
                    '                                                    <div class="form-group">\n' +
                    '                                                        <label for="ageFrom">Age From:</label>\n' +
                    '                                                        <input type="text"  name="age_from[]" class="form-control" placeholder="Age From" value="">\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="col-md-2">\n' +
                    '                                                    <div class="form-group">\n' +
                    '                                                        <label for="ageFrom">Age To:</label>\n' +
                    '                                                        <input type="text"  name="age_to[]" class="form-control" placeholder="Age To" value="">\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="col-md-3">\n' +
                    '                                                    <div class="form-group">\n' +
                    '                                                        <label for="ageFrom">Premium:</label>\n' +
                    '                                                        <input type="text"  name="princ_premium[]" class="form-control" placeholder="Prinicpal Premium" value="">\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="col-md-3">\n' +
                    '                                                    <div class="form-group">\n' +
                    '                                                        <label for="ageFrom">Child Premium:</label>\n' +
                    '                                                        <input type="text"  name="child_premium[]" class="form-control" placeholder="Child Premium" value="">\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="col-md-2">\n' +
                    '                                                    <div class="form-group">\n' +
                    '                                                        <div class="form-group"  style="padding-top: 25px;">\n' +
                    '                                                            <button type="button" name="add" id="'+i+'"\n' +
                    '                                                                    class="btn btn-outline-danger btn_remove">Remove <i class="fa fa-trash-alt"></i></button>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                            </div>\n'+
                    '                                        </div>');
            });
            $('#add-spouse-range').click(function(){
                j++;
                $('#spouse-member').append(' <div class="container" id="contain2'+i+'">\n' +
                    '                                            <div class="row">\n' +
                    '                                                <div class="col-md-3">\n' +
                    '                                                    <div class="form-group">\n' +
                    '                                                        <label for="ageFrom">Age From:</label>\n' +
                    '                                                        <input type="text"  name="sp_age_from[]" class="form-control" placeholder="Spouse Age From" value="">\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="col-md-3">\n' +
                    '                                                    <div class="form-group">\n' +
                    '                                                        <label for="ageFrom">Age To:</label>\n' +
                    '                                                        <input type="text"  name="sp_age_to[]" class="form-control" placeholder="Spouse Age To" value="">\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="col-md-3">\n' +
                    '                                                    <div class="form-group">\n' +
                    '                                                        <label for="ageFrom">Premium:</label>\n' +
                    '                                                        <input type="text"  name="sp_premium[]" class="form-control" placeholder="Spouse Premium" value="">\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="col-md-3">\n' +
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
