@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/dashbaord/css/ajax-table.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashbaord/css/filter.css') }}">
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
                                <li class="breadcrumb-item"><a href="{!! route('dashboard.index') !!}">{!! __('dashboard.home') !!}</a></li>
                                <li class="breadcrumb-item"><a href="{!! route('dashboard.dailyReports.index') !!}">{!! __('dailyReports.daily_reports') !!}</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end: content header left-->

                <!-- begin: content header right-->
                <div class="content-header-right col-md-6 col-12">
                    <div class="float-md-right mb-2">
                        <a href="{{ route('dashboard.dailyReports.create') }}" class="btn btn-info btn-glow px-2">
                            <span class="la la-pencil"></span> {!! __('dailyReports.create_new_daily_report') !!}
                        </a>
                    </div>
                </div>
                <!-- end: content header right-->
            </div> 

            <!-- begin: content body -->
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="content-body">
                        <section id="basic-form-layouts">
                            <div class="row match-height">
                                <div class="col-md-12">
                                    @include('dashboard.employees.daily-reports.partials._search')

                                    <div class="table-loader-container">
                                        <div class="table-loader-overlay">
                                            <span class="premium-loader"></span>
                                        </div>
                                        <div id="table_data">
                                            @include('dashboard.employees.daily-reports.partials._table')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div> 
    </div>

    @include('dashboard.employees.daily-reports.modals.details')
@endsection

@push('scripts')
    <script src="{{ asset('assets/dashbaord/js/ajax-table.js') }}"></script>
    <script src="{{ asset('assets/dashbaord/js/filter-system.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            if (typeof initIndexTable === "function") {
                initIndexTable({
                    container: "#table_data",
                    loader: ".table-loader-overlay"
                });
            }

            // Compatibility shim for AJAX refreshes that preserve page/filters
            window.fetch_data = function(page = null) {
                const urlParams = new URLSearchParams(window.location.search);
                const currentPage = page || urlParams.get('page') || 1;
                $('.js-filter-form').trigger('submit', { page: currentPage });
            };
        });

        // change status
        $(document).on('change', '.change_status', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var statusSwitch = $(this).is(':checked') ? 1 : 0;

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
                },
            });
        });
    </script>
@endpush
