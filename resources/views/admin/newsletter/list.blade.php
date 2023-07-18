@extends('admin.layouts.layout')
@section('title','Newsletter Email List')
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
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Newsletter</a></li>
                                    <li class="breadcrumb-item active">Email List</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Email List</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
{{--                                <div class="row mb-2">--}}
{{--                                    <div class="col-sm-12">--}}
{{--                                        <div class="text-sm-right">--}}
{{--                                            <a data-toggle="modal" data-target="#myModal" class="btn btn-success waves-effect waves-light"> Add Contact <i data-feather="plus-circle"></i></a>--}}
{{--                                            <a href="{{ route('admin.notifications.contact.excel') }}" class="btn btn-success waves-effect waves-light"> Upload Via Excell <i data-feather="plus-circle"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </div><!-- end col-->--}}
{{--                                </div>--}}
                                @include('partials.info')

                                <div class="table-responsive">
                                    <table class="table table-centered table-striped" id="products-datatable">
                                        <thead>
                                        <tr>
                                            <th style="width: 20px;">#</th>
                                            <th>Email.</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($emails as $count=>$email)
                                            <tr>
                                                <td>{{ ++$count }}</td>

                                                <th>{{ $email->email }}</th>
                                                <td>
                                                    <span><a class="btn btn-success btn-sm" onclick="alert('Coming Soon')" style="color: white">Action</a></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <ul class="pagination pagination-rounded justify-content-end mb-0">
                                    {{ $emails->appends(request()->query())->links() }}
                                </ul>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->
    </div>
@endsection
