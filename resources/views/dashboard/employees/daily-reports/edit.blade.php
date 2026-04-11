@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/vendors/css/forms/selects/select2.min.css') !!}">
    @if (Lang() == 'ar')
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css-rtl/my-select2-style.css') !!}">
    @endif
    <style>
        .is-invalid-summernote-editor { border: 1px solid #F64E60 !important; }
    </style>
@endpush

@section('content')
    <div class="app-content content">
        <form class="form" action="{!! route('dashboard.dailyReports.update', $dailyReport->id) !!}" method="post" enctype="multipart/form-data" id="updateDailyReportForm">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{!! $dailyReport->id !!}">
            
            <div class="content-wrapper">
                <!-- Page Header (Roles Style) -->
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
                                    <li class="breadcrumb-item">
                                        <a href="{!! route('dashboard.dailyReports.index') !!}">
                                             {!! __('dailyReports.daily_reports') !!}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        {!! __('dailyReports.update_daily_report') !!}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="content-header-right col-md-6 col-12">
                        <div class="float-md-right mb-1">
                            <button class="btn btn-premium-save shadow-pulse" type="submit">
                                <i class="la la-save mr-1"></i>
                                {!! __('general.update') !!}
                                <i class="la la-refresh spinner spinner_loading d-none ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Page Body (Roles Style Architecture) -->
                <div class="content-body">
                    <section id="basic-form-layouts">
                        <div class="row match-height">
                            <div class="col-md-12">
                                <div class="card premium-card shadow-lg border-0">
                                    <div class="card-header border-0 pb-0">
                                        <h4 class="card-title text-primary font-weight-bold">
                                            <i class="la la-edit mr-1"></i>
                                            {!! __('dailyReports.update_daily_report') !!}
                                        </h4>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="la la-minus"></i></a></li>
                                                <li><a data-action="expand"><i class="la la-expand"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <div class="form-body">
                                                <!-- Row 1: Employee & Date (col-md-6 like Roles) -->
                                                <div class="row">
                                                    <!-- Employee Selection -->
                                                    <div class="col-md-6">
                                                        <div class="premium-form-group">
                                                            <label class="premium-label" for="employee_id">
                                                                {!! __('dailyReports.employee_id') !!}
                                                            </label>
                                                            <div class="premium-input-wrapper">
                                                                <select class="employee_id_select form-control premium-input shadow-none"
                                                                    id="employee_id" name="employee_id" style="width: 100%">
                                                                    <option value="{!! $dailyReport->employee_id !!}" selected>
                                                                        {!! $dailyReport->employee->EmployeeShortName() !!}
                                                                    </option>
                                                                </select>
                                                                <i class="la la-user-tie text-primary"></i>
                                                            </div>
                                                            <span class="text-danger small mt-1 d-block font-weight-bold" id="employee_id_error"></span>
                                                        </div>
                                                    </div>

                                                    <!-- Date Selection -->
                                                    <div class="col-md-6">
                                                        <div class="premium-form-group">
                                                            <label class="premium-label" for="date">
                                                                {!! __('dailyReports.date') !!}
                                                            </label>
                                                            <div class="premium-input-wrapper">
                                                                <input type="date" id="date" name="date" value="{!! $dailyReport->date !!}" 
                                                                    class="form-control premium-input shadow-none" autocomplete="off">
                                                                <i class="la la-calendar text-primary"></i>
                                                            </div>
                                                            <span class="text-danger small mt-1 d-block font-weight-bold" id="date_error"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Row 2: Details (Full Width) -->
                                                <div class="row mt-2">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="premium-label mb-1" for="details">
                                                                {!! __('dailyReports.details') !!}
                                                            </label>
                                                            <textarea id="details" name="details" class="form-control details_summernote">{!! $dailyReport->details !!}</textarea>
                                                            <span class="text-danger small mt-1 d-block font-weight-bold" id="details_error"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Row 3: File Upload -->
                                                <div class="row mt-2">
                                                    <div class="col-md-12">
                                                        <div class="premium-form-group">
                                                            <label class="premium-label" for="file">
                                                                {!! __('dailyReports.file') !!}
                                                            </label>
                                                            <div class="custom-file shadow-sm mb-2">
                                                                <input type="file" id="file" name="file" class="custom-file-input">
                                                                <label class="custom-file-label text-left" for="file">{!! $dailyReport->file ?? __('dailyReports.enter_file') !!}</label>
                                                            </div>
                                                            <span class="text-danger small mt-1 d-block font-weight-bold" id="file_error"></span>
                                                            
                                                            @if($dailyReport->file)
                                                            <div class="mt-2 text-left">
                                                                <span class="text-muted small d-inline-block mr-2">{!! __('dailyReports.current_file') !!}:</span>
                                                                @include('dashboard.employees.daily-reports.parts.file')
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>

    <script type="text/javascript">
        // select 2
        var employeePath = "{{ route('dashboard.employees.autocomplete.employee') }}";

        $(".employee_id_select").select2({
            minimumInputLength: 1,
            maximumInputLength: 20,
            placeholder: '{!! __('general.select_from_list') !!}',
            allowClear: true,
            ajax: {
                url: employeePath,
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: '{!! Lang() !!}' === 'en' ? item.employee_en : item.employee_ar,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

        // details summernote
        $('.details_summernote').summernote({
            placeholder: '{!! __('general.write_here') !!}',
            tabsize: 2,
            height: 350,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        function resetUpdateDailyReportFrom() {
            $('.premium-input').css('border-color', '');
            $('.select2-selection').css('border-color', '');
            $('.details_summernote').next('.note-editor').removeClass('is-invalid-summernote-editor');
            $('[id$="_error"]').text('');
        }

        $("#updateDailyReportForm").on('submit', function(e) {
            e.preventDefault();
            resetUpdateDailyReportFrom();
            var data = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST', // Use POST with _method PUT for file uploads
                data: data,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.spinner_loading').removeClass('d-none');
                },
                success: function(data) {
                    if (data.status == true) {
                        flasher.success("{!! __('general.update_success_message') !!}");
                        setTimeout(function(){
                            window.location.href = "{!! route('dashboard.dailyReports.index') !!}";
                        }, 1000);
                    } else {
                        flasher.error("{!! __('general.update_error_message') !!}");
                    }
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        if (key == 'details') {
                            $('.details_summernote').next('.note-editor').addClass('is-invalid-summernote-editor');
                        } else if (key == 'employee_id') {
                             $('.employee_id_select').next('.select2-container').find('.select2-selection').css('border-color', '#F64E60');
                        }
                        
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', '#F64E60');
                    });
                },
                complete: function() {
                    $('.spinner_loading').addClass('d-none');
                }
            });
        });
    </script>
@endpush
