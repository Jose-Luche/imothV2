@extends('admin.layouts.layout')
@section('title',$details->firstName." ".$details->firstName)
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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.comprehensive') }}">Cover Application</a></li>
                                    <li class="breadcrumb-item active">{{ $details->firstName." ".$details->firstName }}</li>
                                </ol>
                            </div>
                            <h4 class="page-title">{{ $details->firstName." ".$details->firstName }}</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="container card-box">
                            <div class="col-lg-20">
                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="fa fa-list-alt"></i> Cover Details
                                    <span class="pull-right">
                                         @if($details->complete)
                                            <label class="btn btn-outline-success btn-xs">Complete <i class="fa fa-check"></i> </label>
                                        @else
                                            <label class="btn btn-outline-warning btn btn-xs">Incomplete <i class="fa fa-times-circle"></i> </label>
                                        @endif
                                    </span></h5>
                                <div class="media mb-3">

                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h4 class="mt-0 mb-1"><strong>Insurance Type : </strong>
                                                    @if($details->type == 1)
                                                        Industrial Personal Accident (PA)
                                                    @elseif($details->type == 2)
                                                        Family/Individual Personal Accident
                                                    @elseif($details->type == 3)
                                                        Group Personal Accident
                                                    @endif
                                                </h4>
                                                <h4 class="mt-0 mb-1"><strong>Client Name : </strong>{{ $details->firstName." ".$details->lastName }}</h4>
                                                <h4 class="mt-0 mb-1"><strong>Phone: </strong>{{ $details->phone }}</h4>
                                                <h4 class="mt-0 mb-1"><strong>Email: </strong>{{ $details->email }}</h4>
                                                <h4 class="mt-0 mb-1"><strong>Start Date: </strong>{{ $details->startDate }}</h4>
                                                <h4 class="mt-0 mb-1"><strong>Duration: </strong>{{ $details->duration }}</h4>

                                                @if($details->type == 2)
                                                <h4 class="mt-0 mb-1"><strong>Children: </strong>{{ $details->children }}</h4>
                                                    <h4 class="mt-0 mb-1"><strong>Children Ages: </strong>{{ $details->childrenAges }}</h4>
                                                    <h4 class="mt-0 mb-1"><strong>Spouse Name: </strong>{{ $details->spouseName }}</h4>
                                                    <h4 class="mt-0 mb-1"><strong>Spouse Age: </strong>{{ $details->spouseAge }}</h4>

                                                @endif
                                                @if($details->type == 1)

                                                    <h4 class="mt-0 mb-1"><strong>Amount Payable: </strong>Ksh {{ $details->amount_payable }}</h4>
                                                    <h4 class="mt-0 mb-1"><strong>Company Name(Institution): </strong>{{ $details->companyName }}</h4>
                                                    <h4 class="mt-0 mb-1"><strong>Id Number: </strong>{{ $details->idNumber }}</h4>

                                                    <h4 class="mt-0 mb-1"><strong>Cover Details : </strong> <a href="{{ route('admin.attachment.details',$details->insurance_id) }}">View Quote Details</a></h4>
                                                @endif

                                                <h4 class="font-13 text-muted text-uppercase">Message :</h4>
                                                <p class="mb-3">
                                                    {!! $details->message !!}
                                                </p>
                                                <h4 class="mt-0 mb-1"><strong>Created At: </strong>{{ $details->created_at->format('D dS,F Y') }}</h4>

                                                <a  onclick="deleteCompany({{$details->id}})" class="btn btn-outline-danger btn-sm"> Delete <i class="fa fa-trash-alt"></i></a>

                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div> <!-- end card-box-->


                </div> <!-- end col-->

            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->
    </div>
    <script>
        function deleteCompany(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        var url = '{{ route("admin.reports.accidents.delete", ":id") }}';

                        url = url.replace(':id', id);

                        window.location.href=url;

                    }
                });
        }
    </script>
@endsection
