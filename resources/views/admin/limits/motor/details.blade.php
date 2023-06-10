@extends('admin.layouts.layout')
@section('title','Motor Limits/Clauses Details')
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
                                {{$clause->product." - ".$clause->class}} Clauses Details
                            </div>
                            <h4 class="page-title">{{$clause->product." - ".$clause->class}} Clauses Details  </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">{{$clause->product." - ".$clause->class}} Clauses Details</h4>

                                <div class="row">
                                    <br>
                                    <textarea id="mytextarea" rows="15" name="clauses" class="form-control @error('content') is-invalid @enderror" >{{ old('content') }} {{$clause->clauses}}</textarea> <!-- end Snow-editor-->
                                    <br>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div><!-- end col -->
                </div>
                <!-- end row -->
            </div> <!-- container -->

        </div> <!-- content -->
    </div>
@endsection


