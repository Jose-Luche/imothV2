@extends('admin.layouts.layout')
@section('title','Seniors Medical Insurance IP Premiums')
@section('content')
    <script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=29qj3xynrj1ylz6s6pcvt0sfrztqxlu52k55du7ph1yjnwes"></script>
    <script src={{ asset('frontend/assets/js/jquery.min.js') }}></script>
    <script>

        $(document).ready(function (){
            /**Once a Benefit has been Selected, show the Insurer Option**/
            $('#benefit-type').change(function (){
                let benefit = $(this).val();
                let pp_pf = $('#pp_pf').val();
                $('#insurers-div').hide();
                if(benefit != ""){
                    $('#insurers-div').show();

                    /**In case the Insurer option is not empty, load available benefits**/
                    let insurer = $('#insurance-company').val() || '';

                    if(insurer != ""){
                        $('#available-limits').show();

                        $.ajax({
                            method: 'GET',
                            url: '/admin/seniors/limits/'+insurer+'/'+benefit+'/'+pp_pf,
                            success: function (res){

                                if(res != ""){
                                    $('#available-limits').html(res);
                                    $('#premiums-section').show();
                                    $('#premiums-section-spouse').show();
                                }else{
                                    $('#available-limits').hide();
                                }
                            }
                        });
                    }else{
                        $('#available-limits').hide();
                        $('#premiums-section').hide();
                        $('#premiums-section-spouse').hide();
                    }
                }
            });


            $('#insurance-company').change(function (){
                let benefit = $('#benefit-type').val();
                let insurer = $(this).val();
                let pp_pf = $('#pp_pf').val();
                /**Go and get all Limits present for a given insurer**/
                if(insurer != ''){
                    $('#available-limits').show();

                    $.ajax({
                        method: 'GET',
                        url: '/admin/seniors/limits/'+insurer+'/'+benefit+'/'+pp_pf,
                        success: function (res){

                            if(res != ""){
                                $('#available-limits').html(res);
                                $('#premiums-section').show();
                                $('#premiums-section-spouse').show();
                            }else{
                                $('#available-limits').hide();
                            }
                        }
                    });
                }else{
                    $('#available-limits').hide();
                    $('#premiums-section').hide();
                    $('#premiums-section-spouse').hide();
                }

            });

            /**Also anytime someone changes the PP or PF option, display available premiums**/
            $('#pp_pf').change(function (){
                let pp_pf = $(this).val();
                let benefit = $('#benefit-type').val();
                if(pp_pf != ""){
                    /**In case the Insurer option is not empty, load available benefits**/
                    let insurer = $('#insurance-company').val() || '';

                    if(insurer != ""){
                        $('#available-limits').show();

                        $.ajax({
                            method: 'GET',
                            url: '/admin/seniors/limits/'+insurer+'/'+benefit+'/'+pp_pf,
                            success: function (res){

                                if(res != ""){
                                    $('#available-limits').html(res);
                                    $('#premiums-section').show();
                                    $('#premiums-section-spouse').show();
                                }else{
                                    $('#available-limits').hide();
                                }
                            }
                        });
                    }else{
                        $('#available-limits').hide();
                        $('#premiums-section').hide();
                        $('#premiums-section-spouse').hide();
                    }
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
                                    <li class="breadcrumb-item active">Medical Premiums.</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Medical Premiums.</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h2 class="header-title">Setup Medical Premiums</h2>
                            <hr>
                            @include('partials.info')
                            <form id="demo-form" data-parsley-validate="" method="post" action="{{ route('admin.seniors.submit_ip_premiums') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="inpatientLimit">Limit Type:</label>
                                            <select name="limitType" id="benefit-type"  class="form-control @error('limitType') is-invalid @enderror">
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
                                    <div class="col-md-3" >
                                        <div class="form-group">
                                            <label for="inpatientLimit">PF/PP:</label>
                                            <select name="pp_pf" id="pp_pf"  class="form-control @error('pp_pf') is-invalid @enderror">
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
                                    <div class="col-md-3" style="display: none" id="insurers-div">
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
                                    <div class="col-md-3" id="available-limits" style="display: none"></div>
                                </div>
                                {{--To make this interactive, we can display any limits in the database, otherwise we create new premiums--}}
                                <div id="append-limits-div"></div>
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
