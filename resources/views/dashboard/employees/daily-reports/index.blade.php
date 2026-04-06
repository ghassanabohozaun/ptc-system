@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/ajax-table.css') }}">
@endpush

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <!-- begin: content header -->
            <div class="content-header row">

                <!-- begin: content header left-->
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('dailyReports.daily_reports') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.index') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.dailyReports.index') !!}">
                                        {!! __('dailyReports.daily_reports') !!}
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end: content header left-->

                <!-- begin: content header right-->
                <div class="content-header-right col-md-6 col-12">
                    <div class="float-md-right mb-2">
                        <a href="{{ route('dashboard.dailyReports.create') }}" class="btn btn-info btn-glow px-2">
                            <span class="la la-pencil"></span>
                            {!! __('dailyReports.create_new_daily_report') !!}
                        </a>
                    </div>
                </div>
                <!-- end: content header right-->

            </div> <!-- end :content header -->

            <!-- begin: content body -->
            <div class="row" style="display: flex ; justify-content: center;">
                <div class="col-md-12">
                    <div class="content-body">

                        <section id="basic-form-layouts">
                            <div class="row match-height">
                                <div class="col-md-12">
                                    @include('dashboard.employees.daily-reports.partials._search')


                                    <div class="table-loader-container">
                                        <div class="table-loader-overlay" id="tableLoader">
                                            <span class="premium-loader"></span>
                                        </div>
                                        <div id="table_data">
                                            @include('dashboard.employees.daily-reports.partials._table')
                                        </div>
                                    </div>

                                </div><!-- end: row  -->
                        </section><!-- end : sections  -->
                    </div>
                </div>
            </div>
            <!-- end: content body  -->
        </div> <!-- end: content wrapper  -->
    </div><!-- end: content app  -->

    @include('dashboard.employees.daily-reports.modals.details')
@endsection


@push('scripts')
    <script src="{{ asset('assets/dashboard/js/ajax-table.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Initialize Standard AJAX Table
            if (typeof initIndexTable === "function") {
                initIndexTable({
                    container: "#table_data",
                    loader: "#tableLoader"
                });
            }

            // Specific Fetch for Search/Filter/Refresh
            window.fetch_data = function(page = 1) {
                $.ajax({
                    url: "{{ route('dashboard.dailyReports.index') }}?page=" + page,
                    data: {
                        employee_id: $('#employee_id').val(),
                        date: $('#date').val(),
                        from_date: $('#from_date').val(),
                        to_date: $('#to_date').val(),
                    },
                    beforeSend: function() { $('#tableLoader').fadeIn(200); },
                    success: function(data) { $('#table_data').html(data); },
                    complete: function() { $('#tableLoader').fadeOut(200); },
                });
            }

            // search
            $('body').on('click', '#daily_report_search_btn', function(e) {
                e.preventDefault();
                fetch_data(1);
            });

            // reset
            $('body').on('click', '#daily_report_reset_btn', function(e) {
                e.preventDefault();
                $("#employee_id").val('').trigger('change');
                $('#date').val('');
                $('#from_date').val('');
                $('#to_date').val('');
                fetch_data(1);
            });
        });

        // change status
        $(document).on('change', '.change_status', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var statusSwitch = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('dashboard.daliy.reports.change.status') }}",
                data: { statusSwitch: statusSwitch, id: id },
                type: 'post',
                dataType: 'JSON',
                success: function(data) {
                    if (data.status == true) {
                        flasher.success("{!! __('general.change_status_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.change_status_error_message') !!}");
                    }
                },
            });
        });
    </script>
@endpush
