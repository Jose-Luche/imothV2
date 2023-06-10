@extends('admin.layouts.layout')
@section('title','Blog List')
@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                               <a href="{{ route('admin.blog.new') }}" class="btn btn-success">New Blog</a>
                            </div>
                            <h4 class="page-title">Blog List</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">

                    <div class="col-xl-12 order-xl-1 order-2">
                        @include('partials.info')
                        @foreach($blogs as $blog)
                        <div class="card-box mb-2">
                            <div class="row align-items-center">
                                <div class="col-sm-12">
                                    <div class="media">
                                        @if($blog->image != null)
                                            <img class="d-flex align-self-center mr-3" src="{{ asset('uploads/'.$blog->image) }}" alt="Generic placeholder image" height="64">
                                        @endif
                                            <div class="media-body">
                                            <h4 class="font-16">{{ $blog->title }}.</h4>
                                        <br>
                                                <p>
                                                    {!! str_limit(strip_tags($blog->content), $limit = 350, $end = '... &nbsp;&nbsp;<a href="'.route('admin.blog.read',$blog->slug).'">Read More</a>
')  !!}
                                                </p>
                                                <br>
                                                @if($blog->status == 0)
                                                <a class="btn btn-xs btn-outline-success" href="{{ route('admin.blog.publish',$blog->slug) }}">Publish Blog <i class="fa fa-check"></i></a>

                                                @else
                                                    <a class="btn btn-xs btn-outline-danger" href="{{ route('admin.blog.unpublish',$blog->slug) }}">Un-Publish Blog <i class="fa fa-check"></i></a>
                                                @endif
                                                    |
                                                    <a class="btn btn-xs btn-outline-success" href="{{ route('admin.blog.details',$blog->slug) }}">Edit <i class="fa fa-edit"></i> </a>
                                                |
                                                <a class="btn btn-xs btn-outline-info" href="{{ route('admin.blog.read',$blog->slug) }}"> Read <i class="fa fa-eye"></i> </a>
                                                <a class="btn btn-xs btn-outline-danger pull-right" href="{{ route('admin.blog.delete',$blog->id) }}">Delete <i class="fa fa-trash-alt"></i> </a>

                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end row -->
                        </div> <!-- end card-box-->
                        @endforeach



                        <div class="text-center my-4">
                           {{ $blogs->appends(request()->query())->links() }}
                        </div>

                    </div> <!-- end col -->

                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->



    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


    </div>

@endsection
