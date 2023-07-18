@extends('admin.layouts.layout')
@section('title','Enquiries')
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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.enquiries') }}">Enquiries</a></li>
                                </ol>
                            </div>
                            <h4 class="page-title">Enquiries(From contact us)</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-12">
                                        @include('partials.info')
                                    </div><!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered table-striped" id="products-datatable">
                                        <thead>
                                        <tr>
                                            <th style="width: 20px;">#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th>Added</th>
                                            <th style="width: 85px;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($enquiries as $count=>$enquiry)
                                            <tr>
                                                <td>{{ ++$count }}</td>
                                                <td>{{ $enquiry->name }}</td>
                                                <td>{{ $enquiry->email }}</td>
                                                <td>{{ $enquiry->phone }}</td>
                                                <td>{{ str_limit($enquiry->message, $limit = 100, $end = '...') }}</td>
                                                <td>{{ $enquiry->created_at->diffForHumans() }}</td>
                                                <td>
                                                    @if($enquiry->status == 2)
                                                        <span class="btn btn-xs btn-success">Read <i class="fa fa-check-circle"></i> </span>
                                                    @elseif($enquiry->status == 1)
                                                        <span class="btn btn-xs btn-info">New <i class="fa fa-recycle"></i> </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span>
                                                       <button id="{{$enquiry->id}}_button" class="btn btn-info btn-xs" onclick="requestDetails({{$enquiry->id}})">Details</button>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <ul class="pagination pagination-rounded justify-content-end mb-0">
                                    {{ $enquiries->appends(request()->query())->links() }}
                                </ul>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->
    </div>
    <div class="modal fade" id="requestDetailsModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Enquiry Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="enquiryId" value="0" name="enquiryId">
                    <p><strong>Name : </strong><span id="name"></span></p>
                    <p><strong>Email : </strong><span id="email"></span></p>
                    <p><strong>Phone : </strong><span id="phone"></span></p>
                    <h5>Message</h5>
                    <hr>
                    <blockquote><span id="message"></span></blockquote>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="markAsReadButton" onclick="markAsRead()" class="btn btn-success">Mark As Read</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function requestDetails(requestId) {
            $('#markAsReadButton').text('');
            $("#markAsReadButton").attr("disabled", false);
            $('#markAsReadButton').append("Mark As Read <i class='fa fa-check'></i>");
            var data = {'requestId': requestId};

            console.log(data);


            $('#'+requestId+'_button').text('');
            $('#'+requestId+'_button').append("Please wait...<i class='fa fa-spinner'></i>");

            $.ajax({
                type: "POST",
                dataType:'json',
                url: '{{ route('admin.enquiries.details') }}',
                data: data,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                success: function(response) {
                    if (response.success == true)
                    {
                        console.log(response);
                        $('#name').html(response.details.name);
                        $('#email').html(response.details.email);
                        $('#phone').html(response.details.phone);
                        $('#message').html(response.details.message);
                        $('#enquiryId').val(requestId);

                        if(response.details.status == 2)
                        {
                            $('#markAsReadButton').text('');
                            $("#markAsReadButton").attr("disabled", true);
                            $('#markAsReadButton').append("Read <i class='fa fa-check'></i>");
                        }

                        $('#requestDetailsModal').modal('show');
                    }else{
                        console.log('Error adding');
                    }
                    $('#'+requestId+'_button').text('');
                    $('#'+requestId+'_button').append("Details");

                }
            });
        }

        //Reject booking
        function markAsRead() {
            var enquiryId = $('#enquiryId').val();
            swal({
                title: "Are you sure?",
                text: "You cant undo this action.!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        var url = '{{ route("admin.enquiries.read", ":id") }}';

                        url = url.replace(':id', enquiryId);

                        window.location.href=url;

                    }
                });
        }


    </script>
@endsection
