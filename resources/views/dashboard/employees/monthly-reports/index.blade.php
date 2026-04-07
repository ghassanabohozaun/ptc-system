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
                        <a href="{!! route('dashboard.monthlyReports.create') !!}" class="btn btn-info btn-glow px-2">
                            <span class="la la-pencil"></span>
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
    <script type="text/javascript">
        $(document).ready(function() {
            // Initialize Standard AJAX Table
            if (typeof initIndexTable === "function") {
                initIndexTable({
                    container: "#table_data",
                    loader: "#tableLoader"
                });
            }

            // Specific Fetch for Search/Refresh
            window.fetch_data = function(page = 1) {
                $.ajax({
                    url: "{{ route('dashboard.monthlyReports.index') }}?page=" + page,
                    data: {
                        employee_id: $('#employee_id').val(),
                        month: $('#month').val(),
                        year: $('#year').val(),
                    },
                    beforeSend: function() {
                        $('#tableLoader').fadeIn(200);
                    },
                    success: function(data) {
                        $('#table_data').html(data);
                    },
                    complete: function() {
                        $('#tableLoader').fadeOut(200);
                    },
                });
            }

            // search
            $('body').on('click', '#monthly_report_search_btn', function(e) {
                e.preventDefault();
                fetch_data(1);
            });

            // reset
            $('body').on('click', '#monthly_report_reset_btn', function(e) {
                e.preventDefault();
                $("#employee_id").val('').trigger('change');
                $('#month').val('');
                $('#year').val('');
                fetch_data(1);
            });
        });
    </script>
@endpush
