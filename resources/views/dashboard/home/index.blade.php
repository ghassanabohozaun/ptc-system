@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashboard/css/dashboard-home.css') !!}">
@endpush

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <!-- begin: content header -->
            <div class="content-header row">
                <div class="col-12 welcome-section animate-up">
                    <div class="d-flex justify-content-between align-items-end flex-wrap gap-4">
                        <div>
                            <h1 class="welcome-title">{!! greeting() !!}, {!! auth()->user()->name ?? 'Admin' !!}! 👋</h1>
                            {{-- <p class="welcome-subtitle">{!! __('dashboard.welcome_subtitle') !!}</p> --}}
                        </div>
                        <div class="welcome-date mb-1">
                            <i class="icon-calendar"></i>
                            {!! date('l, d F Y') !!}
                        </div>
                    </div>
                </div>
            </div> <!-- end :content header -->


            <!-- begin :statistics -->
            <div class="row">
                <!-- Employees Card -->
                <div class="col-xl-3 col-lg-6 col-md-6 mb-4 animate-up delay-1">
                    <div class="elite-stat-card">
                        <div class="stat-icon-glow glow-blue">
                            <i class="icon-users"></i>
                        </div>
                        <div class="stat-content">
                            <span class="stat-label">{!! __('dashboard.employees_count') !!}</span>
                            <div class="d-flex align-items-baseline gap-2">
                                <span class="stat-value">{!! employeesCount() !!}</span>
                            </div>
                            <div class="stat-trend trend-up">
                                <i class="icon-arrow-up"></i> {!! __('dashboard.active_personnel') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Daily Reports Card -->
                <div class="col-xl-3 col-lg-6 col-md-6 mb-4 animate-up delay-2">
                    <div class="elite-stat-card">
                        <div class="stat-icon-glow glow-orange">
                            <i class="icon-pencil"></i>
                        </div>
                        <div class="stat-content">
                            <span class="stat-label">{!! __('dashboard.daily_reports_count') !!}</span>
                            <div class="d-flex align-items-baseline gap-2">
                                <span class="stat-value">{!! dailyReportsCount() !!}</span>
                            </div>
                            <div class="stat-trend trend-stable">
                                <i class="icon-check"></i> {!! __('dashboard.todays_updates') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Monthly Reports Card -->
                <div class="col-xl-3 col-lg-6 col-md-6 mb-4 animate-up delay-3">
                    <div class="elite-stat-card">
                        <div class="stat-icon-glow glow-purple">
                            <i class="icon-docs"></i>
                        </div>
                        <div class="stat-content">
                            <span class="stat-label">{!! __('dashboard.monthly_reports_count') !!}</span>
                            <div class="d-flex align-items-baseline gap-2">
                                <span class="stat-value">{!! monthlyReportsCount() !!}</span>
                            </div>
                            <div class="stat-trend trend-up">
                                <i class="icon-graph"></i> {!! __('dashboard.processed') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Salaries Card -->
                <div class="col-xl-3 col-lg-6 col-md-6 mb-4 animate-up delay-4">
                    <div class="elite-stat-card">
                        <div class="stat-icon-glow glow-green">
                            <i class="icon-wallet"></i>
                        </div>
                        <div class="stat-content">
                            <span class="stat-label">{!! __('dashboard.salaries_count') !!}</span>
                            <div class="d-flex align-items-baseline gap-2">
                                <span class="stat-value">{!! salariesCount() !!}</span>
                            </div>
                            <div class="stat-trend trend-up">
                                <i class="icon-energy"></i> {!! __('dashboard.paid_this_month') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end :statistics -->

            <!-- begin :analytics insights -->
            <div class="row">
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
                                            class="btn btn-outline-primary btn-min-width mr-1 mr-1 mb-1  pull-right btn-line-height-small"
                                            data-toggle="modal" data-target="#monthlyReportsEmployeesModal">
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
