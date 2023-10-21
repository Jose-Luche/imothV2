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
                                    <li class="breadcrumb-item"><a href="{{ route('view.enquiries') }}">Back</a></li>
                                </ol>
                            </div>
                            <h4 class="page-title">Details</h4>
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

                                <div>
                                    <input type="hidden" id="enquiryId" value="0" name="enquiryId">
                                    <p><strong>Name : </strong><span id="name"></span>{{$details->name}}</p>
                                    <p><strong>Email : </strong><span id="email"></span>{{$details->email}}</p>
                                    <p><strong>Phone : </strong><span id="phone"></span>{{$details->phone}}</p>
                                    <p><strong>Subject : </strong><span id="phone"></span>{{$details->subject}}</p>
                                    <h5>Message</h5>
                                    {{$details->message}}
                                    <hr>
                                    <blockquote><span id="message"></span></blockquote>
                                </div>
                                

                                

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->
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
                url: '{{ route('enquiries.details') }}',
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

