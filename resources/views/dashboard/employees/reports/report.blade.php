@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/dashbaord/vendors/css/forms/selects/select2.min.css') }}">
@endpush

@section('content')
    <div class="app-content content">

        <form class="form" action="{!! route('dashboard.employees.reports.export.excel') !!}" method="post" enctype="multipart/form-data"
            id="exportEmployeesForm">
            @csrf
            <div class="content-wrapper">
                <!-- begin: content header -->
                <div class="content-header row">
                    <!-- begin: content header left-->
                    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                        <h3 class="content-header-title mb-0 d-inline-block">{!! __('employees.employees') !!}</h3>
                        <div class="row breadcrumbs-top d-inline-block">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.index') !!}">
                                            {!! __('dashboard.home') !!}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.employees.index') !!}">
                                            {!! __('employees.employees') !!}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <a href="#">
                                            {!! __('employees.employees_reports') !!}
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

                            <a href="" class="btn btn-sm btn-outline-danger mr-1 btn-premium-reset" id="employees_reset_btn">
                                <i class="la la-refresh"></i> {!! __('general.reset') !!}
                            </a>

                            <button class="btn btn-success btn-glow px-2 btn-premium-excel" type="submit">
                                <i class="la la-file-excel-o"></i> {!! __('general.excel') !!}
                            </button>
                        </div>
                    </div>
                    <!-- end: content header right-->


                </div> <!-- end :content header -->

                <!-- begin: content body -->
                <div class="content-body">

                    <section id="basic-form-layouts">
                        <div class="row match-height">
                            <div class="col-md-12">

                                @include('dashboard.employees.reports.partials._search-report')

                                @include('dashboard.employees.reports.partials._columns')

                            </div> <!-- end: card  -->
                        </div><!-- end: row  -->
                    </section><!-- end: sections  -->
                </div><!-- end: content body  -->
            </div> <!-- end: content wrapper  -->
        </form>
    </div><!-- end: content app  -->
@endsection

@push('scripts')
    <script src="{{ asset('assets/dashbaord/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Initialize Select2 for normal selects
            $('select:not([multiple])').select2({
                width: '100%',
                placeholder: "{!! __('general.select') !!}"
            });

            // Initialize Multi-select with Tags style
            var $employeeSelect = $('#employee_ids');
            $employeeSelect.select2({
                width: '100%',
                placeholder: "{!! __('general.all_employees') !!}",
                allowClear: true,
                closeOnSelect: false,
                scrollAfterSelect: false,
                dir: $('html').attr('data-textdirection') == 'rtl' ? 'rtl' : 'ltr',
                language: {
                    noResults: function() {
                        return "{!! __('general.noResults2') !!}";
                    }
                }
            });

            // Handle the closeOnSelect: false bug in some versions
            $employeeSelect.on('select2:select', function(e) {
                // This helps ensure it stays open in all environments
                if (e.params.originalEvent) {
                    e.params.originalEvent.stopPropagation();
                }
            });

            // Select All Employees
            $('#select_all_employees').on('click', function() {
                $('#employee_ids option').prop('selected', true);
                $('#employee_ids').trigger('change');
            });

            // Deselect All Employees
            $('#deselect_all_employees').on('click', function() {
                $('#employee_ids').val(null).trigger('change');
            });

            // address dependency
            $('#governoate_id').on('change', function() {
                var id = $(this).val();
                var $citySelect = $('#city_id');

                if (id) {
                    $.ajax({
                        url: '{!! route('dashboard.governorates.get.all.cities') !!}',
                        type: 'GET',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(response) {
                            $citySelect.empty().append(
                                '<option value=""> {!! __('employees.select') !!} {!! __('employees.city_id') !!}</option>'
                            );

                            if (response.status && response.data) {
                                $.each(response.data, function(index, city) {
                                    // Handle translated city name
                                    var cityName = typeof city.name === 'object' ? 
                                                   ( $('html').attr('data-textdirection') == 'rtl' ? city.name.ar : city.name.en ) : 
                                                   city.name;
                                                   
                                    $citySelect.append('<option value="' + city.id + '">' + cityName + '</option>');
                                });
                                // Enable and refresh select2
                                $citySelect.prop('disabled', false).trigger('change');
                            }
                        },
                        error: function() {
                            $citySelect.prop('disabled', true).trigger('change');
                        }
                    });
                } else {
                    $citySelect.empty().append(
                        '<option value=""> {!! __('employees.select') !!} {!! __('employees.city_id') !!}</option>'
                    ).prop('disabled', true).trigger('change');
                }
            });

            // Reset button
            $('#employees_reset_btn').on('click', function(e) {
                e.preventDefault();
                var $form = $('#exportEmployeesForm');
                $form[0].reset();

                // Properly reset all Select2 elements
                $form.find('select').val(null).trigger('change');

                // Specifically ensure city is disabled again
                var $citySelect = $('#city_id');
                $citySelect.empty().append(
                        '<option value=""> {!! __('employees.select') !!} {!! __('employees.city_id') !!}</option>')
                    .prop('disabled', true).trigger('change');

                // Clear all checkboxes/switches
                $form.find('input[type="checkbox"]').prop('checked', false);
            });
        });
    </script>
@endpush
