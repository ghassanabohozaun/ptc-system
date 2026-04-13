@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/dashbaord/css/ajax-table.css') }}">
@endpush

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <!-- begin: content header -->
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
                                    <i class="la la-money-bill-wave mr-1 pointer-events-none"></i> {!! __('salaries.salaries') !!}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- begin: content header right-->
                <div class="content-header-right col-md-6 col-12 text-md-right">
                    <div class="mb-1">
                        <button type="button" class="btn btn-premium-add shadow-pulse" data-toggle="modal"
                            data-target="#createSalaryModal" style="height: 42px; border-radius: 10px;">
                            <i class="la la-plus-circle mr-1"></i>
                            {!! __('salaries.create_new_salary') !!}
                        </button>
                    </div>
                </div>
                <!-- end: content header right-->
            </div> <!-- end :content header -->

            <!-- begin: content body -->
            <div class="content-body">
                @include('dashboard.salaries.partials._search')
                
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card premium-card">
                                <!-- begin: card header -->
                                <div class="card-header border-0 pb-0">
                                    <h4 class="card-title text-dark font-weight-bold d-flex align-items-center">
                                        <i class="la la-money-bill-wave text-primary mr-2" style="font-size: 24px;"></i> 
                                        {!! __('salaries.salaries') !!}
                                        <span class="badge badge-primary badge-pill badge-glow ml-2"
                                            style="font-size: 11px;">{!! $salaries->total() !!}</span>
                                    </h4>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="la la-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="la la-refresh"></i></a></li>
                                            <li><a data-action="expand"><i class="la la-expand"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end: card header -->

                                <!-- begin: card content -->
                                <div class="card-content collapse show">
                                    <div class="card-body pt-0">
                                        <div class="table-loader-container">
                                            <div class="table-loader-overlay" id="tableLoader">
                                                <span class="premium-loader"></span>
                                            </div>
                                            <div id="table_data">
                                                @include('dashboard.salaries.partials._table', [
                                                    'salaries' => $salaries,
                                                ])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end: card content -->
                            </div>
                        </div>
                    </div>
                </section>
            </div><!-- end: content body  -->
        </div> <!-- end: content wrapper  -->
    </div><!-- end: content app  -->
    @include('dashboard.salaries.modals.create')
    @include('dashboard.salaries.modals.edit')
    @include('dashboard.salaries.modals.details')
@endsection

@push('scripts')
    <script src="{{ asset('assets/dashbaord/js/ajax-table.js') }}"></script>
    <script src="{!! asset('assets/dashbaord/js/filter-system.js') !!}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Initialize Standard AJAX Table
            if (typeof initIndexTable === "function") {
                initIndexTable({
                    container: "#table_data",
                    loader: "#tableLoader"
                });
            }

            // Initialize Filter System
            if (typeof initFilterSystem === "function") {
                initFilterSystem();
            }

            // Compatibility Shim for Modal CRUD Refreshes
            window.fetch_data = function() {
                if (typeof $ !== 'undefined' && $('.js-filter-form').length > 0) {
                    const urlParams = new URLSearchParams(window.location.search);
                    const page = urlParams.get('page') || 1;
                    $('.js-filter-form').trigger('submit', {
                        page: page
                    });
                }
            };
        });


        // change status
        $(document).on('change', '.change_status', function(e) {
            var id = $(this).data('id');
            var statusSwitch = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('dashboard.salaries.change.status') }}",
                data: {
                    statusSwitch: statusSwitch,
                    id: id
                },
                type: 'post',
                dataType: 'JSON',
                success: function(data) {
                    if (data.status === true) {
                        // Refresh the table partial to update statuses and badges correctly
                        if (typeof fetch_data === 'function') {
                            fetch_data();
                        }
                        flasher.success("{!! __('general.change_status_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.change_status_error_message') !!}");
                    }
                }
            });
        });
    </script>
@endpush
