@extends('admin.layouts.layout')
@section('title','Motor')

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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Reports</a></li>
                                    <li class="breadcrumb-item active">Motor</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Motor Insurance Applications.</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">
                    <div class="col-12">
                        @include('partials.info')
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-4 text-right">
                                        <h4>Search</h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <form class="" method="get">
                                            <div class="form-row">
                                                <div class="col">
                                                    <input type="text" name="from" value="{{ Request::get('from') }}" class="form-control basic-datepicker" placeholder="From Date">
                                                </div>
                                                <div class="col">
                                                    <input type="text" name="to" value="{{ Request::get('to') }}" class="form-control basic-datepicker" placeholder="To Date">
                                                </div>
                                                <div class="col">
                                                    <button class="btn btn-info" type="submit">Filter <i class="fa fa-filter"></i> </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered table-striped" id="products-datatable">
                                        <thead>
                                        <tr>
                                            <th style="width: 20px;">#</th>
                                            <th>Insurance Type</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Car Make</th>
                                            <th style="width: 85px;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($items as $count=>$row)
                                            <tr>
                                                <td>{{ ++$count }}</td>

                                                <td>{{ $row->insuranceType == 1?"Comprehensive Insurance":"Third Party Insurance" }}</td>
                                                <td>{{ $row->firstName." ".$row->lastName }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->phone }}</td>
                                                <td>{{ $row->carMake }}</td>
                                                <td>
                                                    <span>
                                                        <a  href="{{ route('admin.reports.motor.details',$row->id) }}" class="btn btn-success btn-sm"> Details </a>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <ul class="pagination pagination-rounded justify-content-end mb-0">
                                    {{ $items->appends(request()->query())->links() }}
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
