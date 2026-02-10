@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

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

                            <a href="" class="btn btn-sm btn-dark mr-1" id="employees_reset_btn">
                                <i class="la la-close"></i> {!! __('general.reset') !!}
                            </a>

                            <button class="btn btn-success btn-glow px-2" type="submit">
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
    <script type="text/javascript">
        // address dependency
        $('#governoate_id').on('change', function() {
            var id = $(this).val();
            if (id) {
                $.ajax({
                    url: '{!! route('dashboard.governorates.get.cities.by.governorate.id', ':id') !!}'.replace(':id', id),
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#city_id').empty().append(
                            '<option value=""> {!! __('employees.select') !!} {!! __('employees.city_id') !!}</option>'
                        );
                        $.each(data, function(key, value) {
                            $('#city_id').append('<option value="' + key +
                                '">' + value + '</option>');
                        });
                        $('#city_id').prop('disabled', false);
                    }
                });
            } else {
                $('#city_id').empty().append(
                    '<option value=""> {!! __('employees.select') !!} {!! __('employees.city_id') !!}</option>').prop(
                    'disabled', true);
            }
        });

        // Reset button
        $('#employees_reset_btn').on('click', function(e) {
            e.preventDefault();
            $('#exportEmployeesForm')[0].reset();
            $('#city_id').prop('disabled', true);
            $('input[type="checkbox"]').prop('checked', false);
        });
    </script>
@endpush
