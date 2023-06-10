@extends('admin.layouts.layout')
@section('title','Dashboard')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
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
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">

                    <div class="col-md-6 col-xl-4">
                        <a href="{{ route('admin.companies') }}">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-sm bg-blue rounded">
                                        <i class="fa fa-store avatar-title font-22 text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark my-1"><span data-plugin="counterup">{{ $companies->count() }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Companies</p>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card-box-->
                        </a>
                    </div> <!-- end col -->


                    <div class="col-md-6 col-xl-4">
                        <a href="{{ route('admin.reports.motor') }}">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-sm bg-success rounded">
                                        <i class="fa fa-users avatar-title font-22 text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark my-1">
                                            <span data-plugin="counterup">
                                                {{ $bidBondApplications->count() + $comprehensiveApplications->count() + $corporateApplication->count()
                                                    + $healthApplications->count() + $performanceApplications->count() +
                                                    $personalLiabilityApplications->count() + $motorInsuranceApplications->count() }}
                                            </span>
                                        </h3>
                                        <p class="text-muted mb-1 text-truncate">Requests</p>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card-box-->
                        </a>
                    </div> <!-- end col -->

                    <div class="col-md-6 col-xl-4">
                        <a href="{{ route('admin.comprehensive') }}">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-sm bg-warning rounded">
                                        <i class="fa fa-hand-holding  avatar-title font-22 text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-right">
                                        <h3 class="text-dark my-1">
                                            <span data-plugin="counterup">
                                                {{ $comprehensive->count() + $bidBonds->count() + $performanceBond->count() + $thirdParty->count() }}
                                            </span>
                                        </h3>
                                        <p class="text-muted mb-1 text-truncate">Insurance Covers</p>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card-box-->
                        </a>
                    </div> <!-- end col -->


            </div> <!-- container -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="header-title mb-0">Requests - Last 7 days</h4>

                                <div id="cardCollpase4" class="collapse pt-3 show">
                                    <canvas id="appointmentsChart"></canvas>
                                </div> <!-- collapsed end -->
                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
            </div>


        </div>
    </div>
    <script>
        new Chart(document.getElementById("appointmentsChart"), {
            type: 'line',
            data: {
                labels:
                    [
                        @foreach($graphData as $data)
                            '{{ $data["date"] }}',
                        @endforeach

                    ],
                datasets: [{
                    data:
                        [
                            @foreach($graphData as $data)
                                '{{ $data["requests"] }}',
                            @endforeach

                        ],
                    borderColor: "#3e95cd",
                    fill: true
                }
                ]
            },
            options: {
                legend: {
                    display: false
                }
            }

        });
    </script>

@endsection
