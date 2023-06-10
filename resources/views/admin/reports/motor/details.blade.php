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
                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="fa fa-list-alt"></i> Cover Details</h5>
                                <div class="media mb-3">

                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h4 class="mt-0 mb-1"><strong>Insurance Type : </strong>{{ $details->insuranceType == 1?"Comprehensive Insurance":"Third Party Insurance"}}</h4>
                                                <h4 class="mt-0 mb-1"><strong>Client Name : </strong>{{ $details->firstName." ".$details->lastName }}</h4>
                                                <h4 class="mt-0 mb-1"><strong>Phone: </strong>{{ $details->phone }}</h4>
                                                <h4 class="mt-0 mb-1"><strong>Email: </strong>{{ $details->email }}</h4>
                                                <h4 class="mt-0 mb-1"><strong>Car Value: </strong> Ksh {{ number_format($details->value) }}</h4>
                                                <h4 class="mt-0 mb-1"><strong>Valued In the last 18 Months: </strong>{{ $details->valued }}</h4>
                                                <h4 class="mt-0 mb-1"><strong>Vehicle Use: </strong>{{ $details->vehicleUse }}</h4>
                                                <h4 class="mt-0 mb-1"><strong>Car make: </strong>{{ $details->carMake }}</h4>
                                                <h4 class="mt-0 mb-1"><strong>Cover start date: </strong>{{ $details->date }}</h4>

                                                @if($details->insuranceType == 2)
                                                <h4 class="mt-0 mb-1"><strong>Car Year: </strong>{{ $details->year }}</h4>
                                                <h4 class="mt-0 mb-1"><strong>Passengers: </strong>{{ $details->passengers }}</h4>
                                                <h4 class="mt-0 mb-1"><strong>Tonnage: </strong>{{ $details->tonnage }}t</h4>
                                                <h4 class="mt-0 mb-1"><strong>Policy: </strong>{{ $details->policy }}</h4>
                                                @endif
                                                <br>
                                                <h4 class="mt-0 mb-1"><strong>Amount Payable: </strong>Ksh {{ number_format($details->amountPayable) }}</h4>
                                                <br>
                                                <h4 class="mt-0 mb-1"><strong>Created At: </strong>{{ $details->created_at->format('D dS,F Y') }}</h4>
                                                <hr>
                                                @if($details->files()->exists())
                                                <h4 class="font-13 text-muted text-uppercase">Files :</h4>
                                                <p class="mb-3">
                                                    K.R.A : <a target="_blank" href="{{ asset("uploads/".$details->files->kra) }}" class="btn btn-xs btn-success">Download/View <i class="fa fa-download"></i> </a>
                                                </p>
                                                <p class="mb-3">
                                                    National Id : <a target="_blank" href="{{ asset("uploads/".$details->files->identification) }}" class="btn btn-xs btn-success">Download/View <i class="fa fa-download"></i> </a>
                                                </p>
                                                <p class="mb-3">
                                                    Log Book : <a target="_blank" href="{{ asset("uploads/".$details->files->logbook) }}" class="btn btn-xs btn-success">Download/View <i class="fa fa-download"></i> </a>
                                                </p>
                                                @endif
                                                <span>
{{--                                                    <a  href="{{ route('admin.bidBonds.edit',$details->id) }}" class="btn btn-outline-success btn-sm"> Edit--}}
{{--                                                        <i class="fa fa-edit"></i></a> |--}}
                                                    <a  onclick="deleteCompany({{$details->id}})" class="btn btn-outline-danger btn-sm"> Delete <i class="fa fa-trash-alt"></i></a>

                                                </span>

                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    @if($details->insuranceType == 1)
                                                        <a href="{{ route('admin.comprehensive.details',$details->quoteId) }}" class="btn btn-outline-info">View Cover Details <i class="fa fa-tasks"></i> </a>
                                                    @else
                                                        <a href="{{ route('admin.thirdParty.details',$details->quoteId) }}" class="btn btn-success-info">View Cover Details <i class="fa fa-tasks"></i> </a>
                                                    @endif
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
                        var url = '{{ route("admin.reports.motor.delete", ":id") }}';

                        url = url.replace(':id', id);

                        window.location.href=url;

                    }
                });
        }
    </script>
@endsection
