@extends('admin.layouts.layout')
@section('title', 'Motor Limits/Clauses')
@section('content')
    {{--    <link href="{{ asset('admins/assets/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" /> --}}
    {{--    <link href="{{ asset('admins/assets/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" /> --}}
    {{--    <link href="{{ asset('admins/assets/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" /> --}}
    <script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=29qj3xynrj1ylz6s6pcvt0sfrztqxlu52k55du7ph1yjnwes">
    </script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                Update {{ $clause->product . ' - ' . $clause->class }} Clauses
                            </div>
                            <h4 class="page-title">Update {{ $clause->product . ' - ' . $clause->class }} Clauses </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Update {{ $clause->product . ' - ' . $clause->class }} Clauses</h4>
                                @include('partials.info')
                                <form method="post" action="{{ route('admin.limits.nonmotor.store', $id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="fullname">Insurance Company * :</label>
                                        <select name="company" class="form-control @error('name') is-invalid @enderror"
                                            required>
                                            @if ($clause->compId != null)
                                                <option value="{{ $clause->compId }}">
                                                    @if ($clause->insurer != null)
                                                        {{ $clause->insurer->name }}
                                                    @else
                                                        -
                                                    @endif
                                                </option>
                                            @endif
                                            <option value="">--Select Insurance Company--</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('company'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('company') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="product">Product * :</label>
                                                <select name="product" class="form-control" required>
                                                    @if ($clause->product != null)
                                                        <option value="{{ $clause->product }}">{{ $clause->product }}
                                                        </option>
                                                    @endif
                                                    <option value="">--Select Product--</option>
                                                    <option value="Life Insurance">Life Insurance</option>
                                                    <option value="Home Insurance">Home Insurance</option>
                                                    <option value="Health Insurance">Health Insurance</option>
                                                    <option value="Attachment Insurance">Attachment Insurance</option>
                                                    <option value="Travel Insurance">Travel Insurance</option>
                                                    <option value="Business Insurance">Business Insurance</option>
                                                    <option value="Bid Bond Insurance">Bid Bond Insurance</option>
                                                    <option value="Performance Insurance">Performance Insurance</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="class">Class of Insurance * :</label>
                                                <select name="class" class="form-control" required>
                                                    @if ($clause->class != null)
                                                        <option value="{{ $clause->class }}">{{ $clause->class }} Covers
                                                        </option>
                                                    @endif
                                                    <option value="Full Cover">Full Cover</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <label for="product">Clauses Section * :</label>
                                    <textarea rows="15" name="clauses" class="form-control @error('content') is-invalid @enderror">{{ old('content') }} {{ $clause->clauses }}</textarea> <!-- end Snow-editor-->
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                            <strong style="color: red">{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                    <br>
                                    <div class="form-group" style="text-align: center">
                                        <input type="submit" class="btn btn-outline-success" value="Save Changes Made">
                                    </div>
                                </form>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div><!-- end col -->
                </div>
                <!-- end row -->
            </div> <!-- container -->

        </div> <!-- content -->
    </div>
@endsection
