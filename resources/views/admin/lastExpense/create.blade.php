@extends('admin.layouts.layout')
@section('title','New Last Expense Cover')
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Last Expense</a></li>
                                    <li class="breadcrumb-item active">Create Last Expense Cover.</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Create Last Expense Cover.</h4>
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
                            <form id="demo-form" data-parsley-validate="" method="post" action="{{ route('admin.lastExpense.submit') }}" enctype="multipart/form-data">
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
                                            <label for="category">Principal Member Cover Limit * :</label>
                                            <input type="text"  name="limit" class="form-control" id="limit"
                                                   placeholder="Limit" value="{{ old('limit') }}">
                                            @if ($errors->has('limit'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('limit') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="firstname">Spouse Limit :</label>
                                            <input type="text"  name="spouseLimit" class="form-control" id="spouseLimit"
                                                   placeholder="Spouse Limit" value="{{ old('spouseLimit') }}">
                                            @if ($errors->has('spouseLimit'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('spouseLimit') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category">Child Limit* :</label>
                                            <input type="text"  name="childLimit" class="form-control" id="childLimit"
                                                   placeholder="Child Limit" value="{{ old('childLimit') }}">
                                            @if ($errors->has('childLimit'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('childLimit') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category">Parent's & Parent's-in-Law Limit * :</label>
                                            <input type="text"  name="parentLimit" class="form-control" id="parentLimit"
                                                   placeholder="Parent's Limit" value="{{ old('parentLimit') }}">
                                            @if ($errors->has('parentLimit'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('parentLimit') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category">Max Children Free Limit * :</label>
                                            <input type="text"  name="max_children" class="form-control" id="max_children"
                                                   placeholder="Max Children Free Limit" value="{{ old('max_children') }}">
                                            @if ($errors->has('max_children'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('max_children') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category">Extra Child Premium * :</label>
                                            <input type="text"  name="extra_premium" class="form-control" id="extra_premium"
                                                   placeholder="Extra Child Premium" value="{{ old('extra_premium') }}">
                                            @if ($errors->has('extra_premium'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('max_children') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="firstname">Group Premium :</label>
                                            <input type="text"  name="premium" class="form-control" id="premium"
                                                   placeholder="Group/Total Premium" value="{{ old('premium') }}">
                                            @if ($errors->has('premium'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('premium') }}</strong>
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
    <script type="text/javascript">
        $(document).ready(function(){
            var i=1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append(' <div class="container" id="contain'+i+'">\n' +
                    '                                            <div class="row">\n' +
                    '                                                <div class="col-md-10">\n' +
                    '                                                    <div class="form-group">\n' +
                    '                                                        <label for="firstname">Benefit * :</label>\n' +
                    '                                                        <input type="text" placeholder="Benefit Name" class="form-control" name="benefitName[]">\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                                </div>\n' +
                    '                                            <div class="row">\n' +
                    '                                                <div class="col-md-7">\n' +
                    '                                                    <div class="form-group">\n' +
                    '                                                        <label for="firstname">Rate * :</label>\n' +
                    '                                                        <input type="text"  name="benefitRate[]" class="form-control"\n' +
                    '                                                               placeholder="Benefit Rate">\n' +
                    '                                                    </div>\n' +
                    '                                                </div> <!-- end col -->\n' +
                    '                                                <div class="col-md-3">\n' +
                    '                                                    <div class="form-group">\n' +
                    '                                                        <label for="firstname">Rate Type * :</label>\n' +
                    '                                                        <select class="form-control" name="benefitRateType[]" required>\n' +
                    '                                                            <option value="1">Percentage(%)</option>\n' +
                    '                                                            <option value="1">Ksh</option>\n' +
                    '                                                        </select>\n' +
                    '                                                    </div>\n' +
                    '                                                </div> <!-- end col -->\n' +
                    '                                                   <div class="col-md-2">\n' +
                    '                                                <div class="form-group">\n' +
                    '                                                    <div class="form-group" style="padding-top: 25px;" >\n' +
                    '                                                        <button type="button" name="add" id="'+i+'" class="btn btn-outline-danger btn_remove">Remove <i class="fa fa-trash-alt"></i></button>\n' +
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
