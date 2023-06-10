@extends('admin.layouts.layout')
@section('title','New Blog')
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
                                New Blog
                            </div>
                            <h4 class="page-title">New   </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">New Blog</h4>
                                @include('partials.info')
                                <form method="post" action="{{ route('admin.blog.create') }}" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label for="fullname">Title * :</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title" id="title" placeholder="Title">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('title') }}</strong>
                                            </span>
                                    @endif
                                </div>
{{--                                <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug">--}}
                                <textarea id="mytextarea" rows="25" name="content" class="form-control @error('content') is-invalid @enderror" >{{ old('content') }}</textarea> <!-- end Snow-editor-->
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('content') }}</strong>
                                            </span>
                                    @endif
                                    <br>
                                <div class="form-group">
                                    <label for="fullname">Image (Optional) :</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" name="image" id="image" placeholder="Title">
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <br>
                                <div class="form-group" style="text-align: center">
                                    <input type="submit" class="btn btn-outline-success" value="Save Draft">
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
