@extends('admin.layouts.layout')
@section('title','Travel Insurance')

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
                                    <li class="breadcrumb-item active">Travel Insurance Covers</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Travel Insurance Covers</h4>
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
                                    <div class="col-sm-12">
                                        <div class="text-sm-right">
                                            <a href="{{ route('admin.travel.create') }}" class="btn btn-success waves-effect waves-light">
                                                Travel Insurance Cover <i data-feather="plus-circle"></i>
                                            </a>
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered table-striped" id="products-datatable">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Company Logo</th>
                                            <th>Company Name</th>
                                            <th>Limit</th>
                                            <th>Premium</th>
                                            <th>Details</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($covers as $count=>$cover)
                                            <tr>
                                                <td>{{ ++$count }}</td>

                                                <td><img style="max-height: 30px" class="" src="{{ url('upload/company/'.$cover->company->logo) }}"></td>
                                                <td>{{ $cover->company->name }}</td>
                                                <td>{{ $cover->limit }}</td>
                                                <td>{{ $cover->premium }}</td>
                                                <td>{{ Str::limit(strip_tags($cover->details),100) }}</td>
                                                <td>
                                                    <span>
                                                         <a  href="{{ route('admin.travel.details',$cover->id) }}" class="btn btn-outline-info btn-sm"> Details <i class="fa fa-eye"></i></a> |
                                                        <a  href="{{ route('admin.travel.edit',$cover->id) }}" class="btn btn-outline-success btn-sm"> Edit <i class="fa fa-edit"></i></a> |
                                                        <a  onclick="deleteCompany({{$cover->id}})" class="btn btn-outline-danger btn-sm"> Delete <i class="fa fa-edit"></i></a>
                                                   </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <ul class="pagination pagination-rounded justify-content-end mb-0">
                                    {{ $covers->appends(request()->query())->links() }}
                                </ul>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

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
                        var url = '{{ route("admin.travel.delete", ":id") }}';

                        url = url.replace(':id', id);

                        window.location.href=url;

                    }
                });
        }
    </script>
@endsection
