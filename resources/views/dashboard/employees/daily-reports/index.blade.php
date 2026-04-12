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
            <div class="content-header row align-items-center mb-2">
                <div class="content-header-left col-md-6 col-12 mb-2 mb-md-0">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb premium-breadcrumb shadow-sm">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.index') !!}">
                                        <i class="la la-home mr-1"></i> {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <i class="la la-file-alt mr-1 pointer-events-none"></i> {!! __('dailyReports.daily_reports') !!}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="content-header-right col-md-6 col-12 text-md-right">
                    <div class="mb-1">
                        <a href="{{ route('dashboard.dailyReports.create') }}" class="btn btn-premium-add shadow-pulse h-42 radius-10 d-inline-flex align-items-center">
                            <i class="la la-plus-circle mr-1"></i>
                            {!! __('dailyReports.create_new_daily_report') !!}
                        </a>
                    </div>
                </div>
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
