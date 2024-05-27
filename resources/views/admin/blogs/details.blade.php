@extends('admin.layouts.layout')
@section('title', $details->title)
@section('content')
    <script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=29qj3xynrj1ylz6s6pcvt0sfrztqxlu52k55du7ph1yjnwes">
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
                                Blog Details
                            </div>
                            <h4 class="page-title">Blog Details </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Blog Details</h4>
                                @include('partials.info')
                                <form method="post" action="{{ route('admin.blog.update', $details->slug) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="fullname">Title * :</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title') == null ? $details->title : old('title') }}" name="title"
                                            id="title" placeholder="Title">
                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    {{--                                <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug"> --}}
                                    <textarea rows="25" name="content" class="form-control">{!! old('content') == null ? $details->content : old('content') !!}</textarea> <!-- end Snow-editor-->
                                    <br>
                                    <div class="form-group">
                                        <label for="fullname">Image (Optional) <p style="color: red">Adding new image
                                                overrides the existing one.</p></label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            value="{{ old('image') }}" name="image" id="image" placeholder="Title">
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <br>
                                    <div class="form-group" style="text-align: center">
                                        <input type="submit" class="btn btn-outline-success" value="Update Blog">
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
