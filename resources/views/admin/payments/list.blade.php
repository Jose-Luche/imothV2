@extends('admin.layouts.layout')
@section('title','Mpesa Payments')

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
                                    <li class="breadcrumb-item active">Payments</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Mpesa Payments.</h4>
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
                                            <th>Full name</th>
                                            <th>TransID</th>
                                            <th>Phone</th>
                                            <th>BillRefNumber</th>
{{--                                            <th>InvoiceNumber</th>--}}
                                            <th>Amount</th>
                                            <th>Balance After</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($payments as $count=>$row)
                                            <tr>
                                                <td>{{ ++$count }}</td>

                                                <td>{{ $row->FirstName." ".$row->MiddleName." ".$row->LastName }}</td>
                                                <td>{{ $row->TransID }}</td>
                                                <td>{{ $row->MSISDN }}</td>
                                                <td>{{ $row->BillRefNumber }}</td>
{{--                                                <td>{{ $row->InvoiceNumber }}</td>--}}
                                                <td>Ksh {{ number_format($row->TransAmount) }}</td>
                                                <td>Ksh {{ number_format($row->OrgAccountBalance) }}</td>
                                                <td>{{ $row->created_at->toDateTimeString() }}</td>
                                                <td>
                                                   @if($row->uncaimed)
                                                        <span class="label label-warning">Unclaimed</span>
                                                    @else
                                                       <span class="label label-success">Resolved</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <ul class="pagination pagination-rounded justify-content-end mb-0">
                                    {{ $payments->appends(request()->query())->links() }}
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
