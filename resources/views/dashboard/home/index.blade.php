@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css/dashboard-home.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css/ajax-table.css') !!}">
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
                        </div>
                        <div class="welcome-date mb-1">
                            <i class="icon-calendar"></i>
                            {!! date('l, d F Y') !!}
                        </div>
                    </div>
                </div>
            </div> <!-- end :content header -->

            <!-- begin: Custom Dashboard Tabs -->
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills custom-home-tabs" id="dashboardTabs" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" id="overview-tab" data-toggle="pill" data-target="#overview"
                                type="button" role="tab" aria-controls="overview" aria-selected="true">
                                <i class="icon-grid"></i> {!! __('dashboard.overview') !!}
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="salary-analytics-tab" data-toggle="pill"
                                data-target="#salary-analytics" type="button" role="tab"
                                aria-controls="salary-analytics" aria-selected="false">
                                <i class="icon-wallet"></i> {!! __('dashboard.salary_analytics') !!}
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="monthly-reports-tab" data-toggle="pill"
                                data-target="#monthly-reports" type="button" role="tab" aria-controls="monthly-reports"
                                aria-selected="false">
                                <i class="icon-docs"></i> {!! __('dashboard.monthly_reports') !!}
                            </button>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content" id="dashboardTabsContent">
                <!-- Tab 1: Overview (Cards + Charts) -->
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                    @include('dashboard.home.tabs.overview')
                </div>

                <!-- Tab 2: Salary Analytics -->
                <div class="tab-pane fade" id="salary-analytics" role="tabpanel" aria-labelledby="salary-analytics-tab">
                    @include('dashboard.home.tabs.salary_analytics')
                </div>

                <!-- Tab 3: Monthly Reports -->
                <div class="tab-pane fade" id="monthly-reports" role="tabpanel" aria-labelledby="monthly-reports-tab">
                    @include('dashboard.home.tabs.monthly_reports')
                </div>
            </div>
            <!-- end: Custom Dashboard Tabs -->

        </div> <!-- end: content wrapper  -->
    </div><!-- end: content app  -->
    >

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
