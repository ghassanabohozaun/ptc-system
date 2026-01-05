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
                <div class="col-xl-6 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="bg-info p-2 media-middle">
                                    <i class="icon-users font-large-2 text-white"></i>
                                </div>
                                <div class="media-body p-2  mt-1">
                                    <h4>{!! __('dashboard.employees_count') !!}</h4>

                                </div>
                                <div class="media-right p-2  mt-1 media-middle">
                                    <h1 class="info">{!! employeesCount() !!}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="bg-warning p-2 media-middle rounded-left">
                                    <i class="icon-pencil font-large-2 text-white"></i>
                                </div>
                                <div class="media-body p-2 mt-1">
                                    <h4>{!! __('dashboard.daily_reports_count') !!}</h4>

                                </div>
                                <div class="media-right p-2 mt-1 media-middle">
                                    <h1 class="warning">{!! dailyReportsCount() !!}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end :statistics -->

            <!-- begin :daily reports -->
            <div class="row">
                <div id="recent-transactions" class="col-lg-12">
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
                </div>




            </div>
            <!-- end :daily reports -->

        </div> <!-- end: content wrapper  -->
    </div><!-- end: content app  -->
@endsection
