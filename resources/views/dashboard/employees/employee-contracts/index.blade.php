@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <!-- begin: content header -->
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('employeeContracts.employee_contracts') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{!! route('dashboard.index') !!}">{!! __('dashboard.home') !!}</a></li>
                                <li class="breadcrumb-item"><a href="{!! route('dashboard.employeeContracts.index') !!}">{!! __('employeeContracts.employee_contracts') !!}</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- begin: content header right-->
                <div class="content-header-right col-md-6 col-12">
                    <div class="float-md-right mb-1">
                        <button type="button" class="btn btn-info btn-glow px-2" data-toggle="modal" data-target="#createEmployeeContractModal">
                            {!! __('employeeContracts.create_new_contract') !!}
                        </button>
                    </div>
                </div>
            </div>

            <!-- begin: content body -->
            <div class="row" style="display: flex; justify-content: center;">
                <div class="col-md-12">
                    <div class="content-body">
                        <section id="basic-form-layouts">
                            <div class="row match-height">
                                <div class="col-md-12">
                                    @include('dashboard.employees.employee-contracts.partials._search')
                                    <div class="table-container">
                                        <div id="loading-indicator" class="loader">
                                            <i class="la la-spinner spinner" id="spinner"></i> {!! __('general.loading') !!}
                                        </div>
                                        <div id="table_data">
                                            @include('dashboard.employees.employee-contracts.partials._table', ['employeeContracts' => $employeeContracts])
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

    @include('dashboard.employees.employee-contracts.modals.create')
    @include('dashboard.employees.employee-contracts.modals.edit')

@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            let page = 1;

            function fetch_data(page) {
                var employee_id = $('#employee_id').val();
                $.ajax({
                    url: "{{ route('dashboard.employeeContracts.index') }}?page=" + page,
                    data: {
                        employee_id: employee_id,
                    },
                    beforeSend: function() {
                        $('#loading-indicator').show();
                        $('#data-table tbody').empty();
                    },
                    success: function(data) {
                        $('#table_data').html(data);
                    },
                    complete: function() {
                        $('#loading-indicator').hide();
                    },
                });
            }

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            $('body').on('click', '#employee_contract_search_btn', function(e) {
                fetch_data(1);
            });

            $('body').on('click', '#employee_contract_reset_btn', function(e) {
                e.preventDefault();
                $("#employee_id").val('').trigger('change');
                fetch_data(1);
            });



            // Delete action is now handled globally by .delete-confirm in my-scripts.js
        });
    </script>
@endpush
