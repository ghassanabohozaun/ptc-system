@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/dashbaord/vendors/css/forms/selects/select2.min.css') }}">
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
                                    {!! __('employeeContracts.employee_contracts') !!}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- begin: content header right-->
                <div class="content-header-right col-md-6 col-12">
                    <div class="float-md-right mb-1">
                        <button type="button" class="btn btn-premium-add shadow-pulse premium-btn-standard"
                            data-toggle="modal" data-target="#createEmployeeContractModal">
                            <i class="la la-plus-circle mr-1"></i>
                            {!! __('employeeContracts.create_new_contract') !!}
                        </button>
                    </div>
                </div>
            </div>

            <!-- begin: content body -->
            <div class="content-body">
                @include('dashboard.employees.employee-contracts.partials._search')

                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card premium-card">
                                <!-- begin: card header -->
                                <div class="card-header border-0 pb-0">
                                    <h4 class="card-title text-dark font-weight-bold d-flex align-items-center">
                                        <i class="la la-file-text text-primary mr-2 font-24"></i>
                                        {!! __('employeeContracts.employee_contracts') !!}
                                        <span
                                            class="badge badge-primary badge-pill badge-glow ml-2 font-11">{!! $employeeContracts->total() !!}</span>
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
                                                @include(
                                                    'dashboard.employees.employee-contracts.partials._table',
                                                    [
                                                        'employeeContracts' => $employeeContracts,
                                                    ]
                                                )
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end: card content -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    @include('dashboard.employees.employee-contracts.modals.create')
    @include('dashboard.employees.employee-contracts.modals.edit')
    @include('dashboard.employees.employee-contracts.modals.details')
@endsection

@push('scripts')
    <script src="{{ asset('assets/dashbaord/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/dashbaord/js/ajax-table.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            // Initialize Standard AJAX Table
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
                $('.js-filter-form').trigger('submit', {
                    page: currentPage
                });
            };
        });
    </script>
@endpush
