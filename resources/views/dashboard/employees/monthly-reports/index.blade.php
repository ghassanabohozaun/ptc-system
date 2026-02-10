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
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('monthlyReports.monthly_reports') !!}</h3>
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
                <!-- end: content header left-->

                <!-- begin: content header right-->
                <div class="content-header-right col-md-6 col-12">
                    <div class="float-md-right mb-1">
                        <button type="button" class="btn btn-info  btn-glow px-2" data-toggle="modal"
                            data-target="#createMonthlyReportModal">
                            {!! __('monthlyReports.create_new_monthly_report') !!}
                        </button>
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
                                    @include('dashboard.employees.monthly-reports.partials._search')
                                    <div class="table-container">
                                        <div id="loading-indicator" class="loader">
                                            <!-- You can use text, an image, or CSS-only spinners -->
                                            <i class="la la-spinner spinner" id="spinner"></i> {!! __('general.loading') !!}
                                            <!-- or <img src="loading.gif" alt="Loading..."> -->
                                        </div>
                                        <div id="table_data">
                                            @include(
                                                'dashboard.employees.monthly-reports.partials._table',
                                                [
                                                    'monthlyReports' => $monthlyReports,
                                                ]
                                            )
                                        </div>
                                    </div>

                                </div><!-- end: row  -->
                        </section><!-- end: sections  -->
                    </div>
                </div>
            </div>
            <!-- end: content body  -->
        </div> <!-- end: content wrapper  -->
    </div><!-- end: content app  -->

    @include('dashboard.employees.monthly-reports.modals.create')
    @include('dashboard.employees.monthly-reports.modals.edit')
@endsection


@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            let page = 1;

            // fetch data
            function fetch_data(page) {

                var employee_id = $('#employee_id').val();
                var month = $('#month').val();


                $.ajax({
                    url: "{{ route('dashboard.monthlyReports.index') }}?page=" + page,
                    data: {
                        employee_id: employee_id,
                        month: month,
                    },
                    beforeSend: function() {
                        // Show the loading indicator before the request is sent
                        $('#loading-indicator').show();
                        // Optional: clear previous table data
                        $('#data-table tbody').empty();
                    },
                    success: function(data) {
                        $('#table_data').html(data);
                    },
                    complete: function() {
                        // Hide the loading indicator when the request is complete (whether success or error)
                        $('#loading-indicator').hide();
                    },
                });
            }

            // Handle pagination link clicks
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            // search
            $('body').on('click', '#monthly_report_search_btn', function(e) {
                fetch_data(1);
            })

            // reset
            $('body').on('click', '#monthly_report_reset_btn', function(e) {
                e.preventDefault();
                $("#employee_id").val('').trigger('change');
                $('#month').val('');
                fetch_data(1);
            });

            // Handle search input (e.g., on keyup)
            $('#search').on('keyup', function() {
                fetch_data(1); // Reset to page 1 on new search
            });

        });
    </script>
@endpush
