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
                            <ol class="breadcrumb premium-breadcrumb">
                                <li class="breadcrumb-item"><a href="{!! route('dashboard.index') !!}">{!! __('dashboard.home') !!}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{!! route('dashboard.employeeContracts.index') !!}">{!! __('employeeContracts.employee_contracts') !!}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- begin: content header right-->
                <div class="content-header-right col-md-6 col-12">
                    <div class="text-right">
                        <button type="button" class="btn btn-premium-add shadow-sm" data-toggle="modal"
                            data-target="#createEmployeeContractModal">
                            <i class="la la-plus"></i>
                            {!! __('employeeContracts.create_new_contract') !!}
                        </button>
                    </div>
                </div>
            </div>

            <!-- begin: content body -->
            <div class="content-body">
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            @include('dashboard.employees.employee-contracts.partials._search')
                            
                            <div class="table-loader-container mt-2">
                                <div class="table-loader-overlay" id="tableLoader">
                                    <span class="premium-loader"></span>
                                </div>
                                <div id="table_data">
                                    @include('dashboard.employees.employee-contracts.partials._table', [
                                        'employeeContracts' => $employeeContracts,
                                    ])
                                </div>
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
                $('.js-filter-form').trigger('submit', { page: currentPage });
            };
        });
    </script>
@endpush
