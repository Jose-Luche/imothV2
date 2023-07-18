@extends('admin.layouts.layout')
@section('title',$details->name)
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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.life') }}">Life Insurance Covers</a></li>
                                    <li class="breadcrumb-item active">{{ $details->name }}</li>
                                </ol>
                            </div>
                            <h4 class="page-title">{{ $details->name }}</h4>
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
                                                <h4 class="mt-0 mb-1"><strong>Insurance Company : </strong>{{ $details->company->name }}</h4>
                                                <h4 class="mt-0 mb-1"><strong>Rate : </strong>{{ $details->rate }}%</h4>
                                               <h4 class="mt-0 mb-1"><strong>Created On: </strong>{{ $details->created_at->format('d M, Y') }}</h4>
                                                <h4 class="font-13 text-muted text-uppercase">Details :</h4>
                                                <p class="mb-3">
                                                    {!! $details->details !!}
                                                </p>
                                                <span>
                                                    <a  href="{{ route('admin.performanceBonds.edit',$details->id) }}" class="btn btn-outline-success btn-sm"> Edit <i class="fa fa-edit"></i></a> |
                                                    <a  onclick="deleteCompany({{$details->id}})" class="btn btn-outline-danger btn-sm"> Delete <i class="fa fa-edit"></i></a>
                                               </span>

                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <img style="max-height: 100px;padding-left: 10px" class="" src="{{ asset('uploads/'.$details->company->logo) }}">
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
                        var url = '{{ route("admin.performanceBonds.delete", ":id") }}';

                        url = url.replace(':id', id);

                        window.location.href=url;

                    }
                });
        }
    </script>
@endsection
