@extends('layouts.dashboard.app')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/dashbaord/css/ajax-table.css') }}">
@endpush

@section('title')
    {!! $title !!}
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <!-- begin: content header -->
            <div class="content-header row">

                <!-- begin: content header left -->
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{!! $title !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.index') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.monthlyReports.index') !!}">
                                        {!! __('monthlyReports.monthly_reports') !!}
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end: content header left -->

                <!-- begin: content header right -->
                <div class="content-header-right col-md-6 col-12">
                    <div class="float-md-right mb-1">
                        <a href="javascript:void(0)" class="btn btn-premium-add" data-toggle="modal"
                            data-target="#createMonthlyReportModal">
                            <i class="la la-plus"></i>
                            {!! __('monthlyReports.create_new_monthly_report') !!}
                        </a>
                    </div>
                </div>
                <!-- end: content header right -->

            </div>
            <!-- end: content header -->

            <!-- begin: content body -->
            <div class="content-body">
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            @include('dashboard.employees.monthly-reports.partials._search')

                            <div class="table-loader-container">
                                <div class="table-loader-overlay" id="tableLoader">
                                    <span class="premium-loader"></span>
                                </div>
                                <div id="table_data">
                                    @include('dashboard.employees.monthly-reports.partials._table')
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- end: content body -->
        </div>
    </div>

    @include('dashboard.employees.monthly-reports.modals.create')
    @include('dashboard.employees.monthly-reports.modals.edit')
    @include('dashboard.employees.monthly-reports.modals.details')
@endsection


@push('scripts')
    <script src="{{ asset('assets/dashbaord/js/ajax-table.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Unify table loading
            if (typeof initIndexTable === "function") {
                initIndexTable({
                    container: "#table_data",
                    loader: ".table-loader-overlay"
                });
            }

            // Compatibility shim for modals that call fetch_data(1)
            window.fetch_data = function(page = null) {
                const urlParams = new URLSearchParams(window.location.search);
                const currentPage = page || urlParams.get('page') || 1;
                $('.js-filter-form').trigger('submit', { page: currentPage });
            };
        });
    </script>
@endpush
