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
                                    <li class="breadcrumb-item active">Edit {{ $details->name }}</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Edit.</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->



                <div class="row">

                    <div class="col-12">
                        <div class="card-box">
                            <h2 class="header-title">Edit {{ $details->name }}</h2>
                            <hr>
                            @include('partials.info')
                            <form id="demo-form" data-parsley-validate="" method="post" action="{{ route('admin.comprehensive.update',$details->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-6">
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category">Cover Type * :</label>
                                            <select name="category"  class="form-control @error('name') is-invalid @enderror" >
                                                @if($details->category)
                                                    <option value="{{$details->category}}">{{ucwords($details->category)}} Use</option>
                                                @endif
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="firstname">SI From* :</label>
                                            <input type="text"  name="si_from" class="form-control" id="si-from"
                                                   placeholder="SI From" value="{{ $details->si_from }}">
                                            @if ($errors->has('si_from'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('si_from') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="firstname">SI To* :</label>
                                            <input type="text"  name="si_to" class="form-control" id="si-to"
                                                   placeholder="SI To" value="{{ $details->si_to }}">
                                            @if ($errors->has('si_to'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('si_to') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="firstname">Rate in %* :</label>
                                            <input type="number"  name="rate" class="form-control" id="location"
                                                   placeholder="Rate in %" value="{{ $details->rate }}">
                                            @if ($errors->has('rate'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('rate') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="firstname">Minimum Premium (Ksh)* :</label>
                                            <input type="number"  name="minRate" class="form-control" id="location"
                                                   placeholder="Minimum Rate (Ksh)" value="{{ $details->minRate }}">
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
                                                   placeholder="Minimum Car Year" value="{{ $details->minYear }}">
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
                                                      is-invalid @enderror" >{{ $details->details }}</textarea> <!-- end Snow-editor-->
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
                                        @foreach($details->benefits as $benefit)
                                            <div class="container" >
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label for="firstname">Benefit Name* :</label>
                                                            <input type="text" placeholder="Benefit Name"
                                                                   class="form-control" value="{{ $benefit->name }}" name="benefitName[]" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="firstname">Rate(%) * :</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Benefit Rate" name="benefitRate[]" value="{{ $benefit->rate }}" required>
                                                            <input type="hidden" value="1" name="benefitRateType[]">
                                                            <input type="hidden" value="1" name="type[]">
                                                            <input type="hidden" value="{{ $benefit->id }}" name="bId[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="firstname">Minimum Premium :</label>
                                                            <input type="number" class="form-control"
                                                                   placeholder="Minimum Premium" name="benefitMinimum[]" value="{{ $benefit->price }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <div class="form-group"  style="padding-top: 25px;">
                                                                <button onclick="deleteBenefit({{ $benefit->id }})" type="button" name="add" id="0"
                                                                        class="btn btn-outline-danger">Delete <i class="fa fa-trash-alt"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <button type="button" name="add" id="add" class="btn btn-success">Add More <i class="fa fa-plus-circle"></i> </button>
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
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append(' <div class="container" id="contain'+i+'">\n' +
                    '                                            <div class="row">\n' +
                    '                                                <div class="col-md-10">\n' +
                    '                                                    <div class="form-group">\n' +
                    '                                                        <label for="firstname">Benefit * :</label>\n' +
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
                    '                                                           <input type="hidden" value="0" name="type[]">\n' +
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
                    '                                                            <button type="button" name="add" id="0"\n' +
                    '                                                                    class="btn btn-outline-danger btn_remove">Remove <i class="fa fa-trash-alt"></i></button>\n' +
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
        function deleteBenefit(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        var url = '{{ route("admin.comprehensive.benefit.delete", ":id") }}';

                        url = url.replace(':id', id);

                        window.location.href=url;

                    }
                });
        }
    </script>
@endsection
