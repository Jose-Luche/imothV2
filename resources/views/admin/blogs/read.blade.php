@extends('admin.layouts.layout')
@section('title',$blog->title)
@section('content')

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Email</a></li>
                                    <li class="breadcrumb-item active">Read</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Email Read</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <!-- Right Sidebar -->
                <div class="row">
                    <div class="col-lg-12">
                        @include('partials.info')
                        <div class="card-box">

                            <!-- End Left sidebar -->

                            <div class="">


                                @if($blog->status == 0)
                                    <a href="{{ route('admin.blog.publish',$blog->slug) }}" class="btn btn-outline-success">Publish Blog</a>
                                @else
                                    <a href="{{ route('admin.blog.unpublish',$blog->slug) }}" class="btn btn-outline-danger">Un-Publish Blog</a>

                                @endif
                                    <a href="{{ route('admin.blog.details',$blog->slug) }}" class="btn btn-outline-info">Update</a>



                                <div class="mt-4">
                                    <h2 class="font-18">{{ $blog->title }}</h2>

                                    <div class="media mb-4 mt-1">

                                        <img class="d-flex mr-2 rounded-circle avatar-sm" src="{{ \Illuminate\Support\Facades\Auth::user()->avatar == null ? asset('images/logo.png'):$blog->admin->avatar }}" alt="Generic placeholder image">

                                        <div class="media-body">
                                            <span class="float-right">{{ $blog->created_at->diffForHumans() }}</span>
                                            <h6 class="m-0 font-14">{{ $blog->admin->firstName." ".$blog->admin->midName." ".$blog->admin->lastName }}</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <img src="{{ asset('uploads/'.$blog->image) }}" alt="attachment" style="max-height: 400px" class="img-thumbnail img-responsive">
                                        </div>
                                    </div>

                                    {!! $blog->content !!}


                                    <hr/>

                                </div> <!-- card-box -->



                                <div class="text-right">
                                    @if($blog->status == 0)
                                    <a href="{{ route('admin.blog.publish',$blog->slug) }}" class="btn btn-outline-success">Publish Blog</a>
                                        @else
                                        <a href="{{ route('admin.blog.unpublish',$blog->slug) }}" class="btn btn-outline-danger">Un-Publish Blog</a>

                                    @endif
                                </div>

                            </div>
                            <!-- end inbox-rightbar-->

                            <div class="clearfix"></div>
                        </div>

                    </div> <!-- end Col -->

                </div><!-- End row -->


            </div> <!-- container -->

        </div> <!-- content -->

    </div>
@endsection
