@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <!-- begin: content header -->
            <div class="content-header row">

                <!-- begin: content header left-->
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('dashboard.dashboard') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.index') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end: content header left-->
            </div> <!-- end :content header -->


            <!-- begin :statistics -->
            <div class="row">
                <div class="col-xl-3 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="bg-info p-2 media-middle">
                                    <i class="icon-users font-large-2 text-white"></i>
                                </div>
                                <div class="media-body p-2  mt-1">
                                    <h4>{!! __('dashboard.employees_count') !!}</h4>

                                </div>
                                <div class="media-right p-1  mt-1 media-middle">
                                    <h1 class="info">{!! employeesCount() !!}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="bg-warning p-2 media-middle rounded-left">
                                    <i class="la la-pencil-square font-large-2 text-white"></i>
                                </div>
                                <div class="media-body p-2 mt-1">
                                    <h4>{!! __('dashboard.daily_reports_count') !!}</h4>

                                </div>
                                <div class="media-right p-1 mt-1 media-middle">
                                    <h1 class="warning">{!! dailyReportsCount() !!}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="bg-primary p-2 media-middle rounded-left">
                                    <i class="la la-file-text font-large-2 text-white"></i>
                                </div>
                                <div class="media-body p-2 mt-1">
                                    <h4>{!! __('dashboard.monthly_reports_count') !!}</h4>

                                </div>
                                <div class="media-right p-1 mt-1 media-middle">
                                    <h1 class="warning">{!! monthlyReportsCount() !!}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="bg-blue-grey p-2 media-middle rounded-left">
                                    <i class="la la-money font-large-2 text-white"></i>
                                </div>
                                <div class="media-body p-2 mt-1">
                                    <h4>{!! __('dashboard.salaries_count') !!}</h4>
                                </div>
                                <div class="media-right p-1 mt-1 media-middle">
                                    <h1 class="warning">{!! salariesCount() !!}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end :statistics -->

            <!-- begin :analytics insights -->
            <div class="row mt-3">
                <div class="col-xl-8 col-lg-12">
                    <div class="card h-100">
                        <div class="card-header">
                            <h4 class="card-title">{!! __('dashboard.monthly_reports_analytics') !!}</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div id="reports-trends-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12">
                    <div class="card h-100">
                        <div class="card-header">
                            <h4 class="card-title">{!! __('dashboard.department_distribution') !!}</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div id="dept-distribution-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{!! __('dashboard.salary_analytics') !!}</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div id="salary-history-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end :analytics insights -->

            <div class="row mt-2">
                <!-- begin :monthly reports -->
                <div id="recent-transactions" class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{!! __('monthlyReports.show_latest_monthly_reports') !!}</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li>
                                        <button type="button"
                                            class="btn btn-outline-primary btn-min-width mr-1 mr-1 mb-1  pull-right"
                                            style="line-height :0.8rem" data-toggle="modal"
                                            data-target="#monthlyReportsEmployeesModal">
                                            {!! __('monthlyReports.show_employees') !!}
                                        </button>
                                    </li>

                                    <li>
                                        <a class="btn btn-outline-secondary btn-min-width mr-1 mb-1  pull-right"
                                            href="{!! route('dashboard.monthlyReports.index') !!}">
                                            <i class="fa fa-link"></i>
                                            {!! __('general.show_all') !!}
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <div class="card-content mt-2">
                            <div class="table-responsive">
                                <table class="table table-hover table-xl mb-0">
                                    <thead>
                                        <tr>
                                            <th>{!! __('monthlyReports.employee_id') !!}</th>
                                            <th>{!! __('monthlyReports.date') !!}</th>
                                            <th>{!! __('monthlyReports.file') !!}</th>
                                            <th>{!! __('monthlyReports.status') !!}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($monthlyReports as $monthlyReport)
                                            <tr>
                                                <td> {!! $monthlyReport->employee->EmployeeShortName() !!}</td>
                                                <td> {!! $monthlyReport->month !!} / {!! $monthlyReport->year !!} </td>
                                                <td> @include('dashboard.employees.monthly-reports.parts.file') </td>
                                                <td> @include('dashboard.employees.monthly-reports.parts.status') </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    {!! __('monthlyReports.no_monthly_reports_found') !!}
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end :monthly reports -->



                <!-- begin :daily reports -->
                {{-- <div id="recent-transactions" class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{!! __('dailyReports.show_latest_daily_reports') !!}</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li>
                                        <a class="btn btn-outline-secondary btn-min-width mr-1 mb-1  pull-right"
                                            href="{!! route('dashboard.dailyReports.index') !!}">
                                            <i class="fa fa-link"></i>
                                            {!! __('general.show_all') !!}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content mt-2">
                            <div class="table-responsive">
                                <table class="table table-hover table-xl mb-0">
                                    <thead>
                                        <tr>
                                            <th>{!! __('dailyReports.employee_id') !!}</th>
                                            <th>{!! __('dailyReports.date') !!}</th>
                                            <th>{!! __('dailyReports.details') !!}</th>
                                            <th>{!! __('dailyReports.file') !!}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($dailyReports as $dailyReport)
                                            <tr>
                                                <td> {!! $dailyReport->employee->EmployeeShortName() !!}</td>
                                                <td> {!! $dailyReport->date !!}</td>
                                                <td> @include('dashboard.employees.daily-reports.parts.details')</td>
                                                <td> @include('dashboard.employees.daily-reports.parts.file') </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    {!! __('dailyReports.no_daily_reports_found') !!}
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- end :daily reports -->
            </div>



        </div> <!-- end: content wrapper  -->
    </div><!-- end: content app  -->

    @include('dashboard.home.monthly-reports.modal')

    @push('scripts')
        <script>
            $(window).on("load", function() {
                // Shared Colors
                const colors = ['#1E9FF2', '#FF9149', '#28D094', '#FF4961', '#666EE8', '#cc90c3'];

                // 1. Report Trends (Area Chart)
                const reportTrendsOptions = {
                    series: [{
                        name: '{!! __('dashboard.monthly_reports') !!}',
                        data: @json($reportTrends['monthly'] ?? [])
                    }],
                    chart: {
                        type: 'area',
                        height: 350,
                        toolbar: {
                            show: false
                        },
                        fontFamily: 'Tajawal, sans-serif'
                    },
                    colors: ['#1E9FF2'],
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.45,
                            opacityTo: 0.05,
                            stops: [20, 100]
                        }
                    },
                    xaxis: {
                        categories: @json($months ?? []),
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val + " {!! __('dashboard.report') !!}"
                            }
                        },
                        x: {
                            format: 'MMM yyyy'
                        }
                    },
                    legend: {
                        show: false
                    }
                };

                const reportTrendsChart = new ApexCharts(document.querySelector("#reports-trends-chart"),
                    reportTrendsOptions);
                reportTrendsChart.render();

                // 2. Department Distribution (Donut Chart)
                const deptOptions = {
                    series: @json($deptData['series'] ?? []),
                    chart: {
                        type: 'donut',
                        height: 350,
                        fontFamily: 'Tajawal, sans-serif'
                    },
                    labels: @json($deptData['labels'] ?? []),
                    colors: colors,
                    legend: {
                        position: 'bottom'
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }],
                    plotOptions: {
                        pie: {
                            donut: {
                                labels: {
                                    show: true,
                                    total: {
                                        show: true,
                                        label: '{!! __('dashboard.total_employees') !!}',
                                        formatter: function(w) {
                                            return w.globals.seriesTotals.reduce((a, b) => a + b, 0)
                                        }
                                    }
                                }
                            }
                        }
                    }
                };

                const deptChart = new ApexCharts(document.querySelector("#dept-distribution-chart"), deptOptions);
                deptChart.render();

                // 3. Salary History (Column Chart)
                const salaryHistoryOptions = {
                    series: [{
                        name: '{!! __('dashboard.total_salaries') !!}',
                        data: @json($salaryHistory['series'] ?? [])
                    }],
                    chart: {
                        type: 'bar',
                        height: 350,
                        toolbar: {
                            show: false
                        },
                        fontFamily: 'Tajawal, sans-serif'
                    },
                    colors: ['#FF9149'],
                    plotOptions: {
                        bar: {
                            borderRadius: 10,
                            columnWidth: '45%',
                            distributed: true,
                            dataLabels: {
                                position: 'top'
                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function(val) {
                            return "{!! __('dashboard.currency') !!} " + val.toLocaleString()
                        },
                        offsetY: -20,
                        style: {
                            fontSize: '12px',
                            colors: ["#304758"]
                        }
                    },
                    xaxis: {
                        categories: @json($months ?? []),
                        position: 'bottom',
                        axisBorder: {
                            show: false
                        },
                        axisTicks: {
                            show: false
                        }
                    },
                    yaxis: {
                        axisBorder: {
                            show: false
                        },
                        axisTicks: {
                            show: false
                        },
                        labels: {
                            show: true,
                            formatter: function(val) {
                                return "{!! __('dashboard.currency') !!} " + val.toLocaleString()
                            }
                        }
                    },
                    title: {
                        text: '{!! __('dashboard.monthly_budget_analysis') !!}',
                        floating: true,
                        offsetY: 0,
                        align: 'center',
                        style: {
                            color: '#444'
                        }
                    }
                };

                const salaryChart = new ApexCharts(document.querySelector("#salary-history-chart"),
                    salaryHistoryOptions);
                salaryChart.render();
            });
        </script>
    @endpush
@endsection
