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
                                                <h4 class="mt-0 mb-1"><strong>Insurance Type : </strong>
                                                    @if($details->type == 1)
                                                        Medical Insurance
                                                    @elseif($details->type == 2)
                                                        Life Insurance
                                                    @elseif($details->type == 3)
                                                        Motor Insurance
                                                    @elseif($details->type == 4)
                                                        Assets Insurance
                                                    @elseif($details->type == 5)
                                                        Marine Insurance
                                                    @elseif($details->type == 6)
                                                        Small Business Insurance
                                                    @endif</h4>
                                                <h4 class="mt-0 mb-1"><strong>Client Name : </strong>{{ $details->firstName." ".$details->lastName }}</h4>
                                                <h4 class="mt-0 mb-1"><strong>Phone: </strong>{{ $details->phone }}</h4>
                                                <h4 class="mt-0 mb-1"><strong>Email: </strong>{{ $details->email }}</h4>
                                                <h4 class="mt-0 mb-1"><strong>Company Name: </strong>{{ $details->companyName }}</h4>
                                                <h4 class="font-13 text-muted text-uppercase">Message :</h4>
                                                <p class="mb-3">
                                                    {!! $details->message !!}
                                                </p>
                                                <h4 class="mt-0 mb-1"><strong>Created At: </strong>{{ $details->created_at->format('D dS,F Y') }}</h4>
                                                <a  onclick="deleteCompany({{$details->id}})" class="btn btn-outline-danger btn-sm"> Delete <i class="fa fa-trash-alt"></i></a>



                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    {{--                                                    <img style="max-height: 100px;padding-left: 10px" class="" src="{{ asset('uploads/'.$details->company->logo) }}">--}}
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
                        var url = '{{ route("admin.reports.corporate.delete", ":id") }}';

                        url = url.replace(':id', id);

                        window.location.href=url;

                    }
                });
        }
    </script>
@endsection
