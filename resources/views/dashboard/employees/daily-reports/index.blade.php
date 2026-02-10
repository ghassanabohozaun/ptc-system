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


                                    <div class="table-container">
                                        <div id="loading-indicator" class="loader">
                                            <!-- You can use text, an image, or CSS-only spinners -->
                                            <i class="la la-spinner spinner" id="spinner"></i> {!! __('general.loading') !!}
                                            <!-- or <img src="loading.gif" alt="Loading..."> -->
                                        </div>
                                        <div id="table_data">
                                            @include('dashboard.employees.daily-reports.partials._table', [
                                                'dailyReports' => $dailyReports,
                                            ])
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
@endsection


@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            let page = 1;

            // fetch data
            function fetch_data(page) {

                var employee_id = $('#employee_id').val();
                var date = $('#date').val();
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();


                $.ajax({
                    url: "{{ route('dashboard.dailyReports.index') }}?page=" + page,
                    data: {
                        employee_id: employee_id,
                        date: date,
                        from_date: from_date,
                        to_date: to_date,
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
            $('body').on('click', '#daily_report_search_btn', function(e) {
                fetch_data(1);
            })

            // reset
            $('body').on('click', '#daily_report_reset_btn', function(e) {
                e.preventDefault();
                $("#employee_id").val('').trigger('change');
                $('#date').val('');
                $('#from_date').val('');
                $('#to_date').val('');
                fetch_data(1);
            });

            // Handle search input (e.g., on keyup)
            $('#search').on('keyup', function() {
                fetch_data(1); // Reset to page 1 on new search
            });

        });



        //  change status
        var statusSwitch = false;
        $('body').on('change', '.change_status', function(e) {
            e.preventDefault();

            var id = $(this).data('id');

            if ($(this).is(':checked')) {
                statusSwitch = 1;
            } else {
                statusSwitch = 0;
            }

            $.ajax({
                url: "{{ route('dashboard.daliy.reports.change.status') }}",
                data: {
                    statusSwitch: statusSwitch,
                    id: id
                },
                type: 'post',
                dataType: 'JSON',
                success: function(data) {

                    if (data.status == true) {
                        flasher.success("{!! __('general.change_status_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.change_status_error_message') !!}");
                    }
                }, //end success
            })
        });
    </script>
@endpush
