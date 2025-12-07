@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/vendors/css/forms/selects/select2.min.css') !!}">
    <link href="{!! asset('vendor/summernote/summernote-bs4.css') !!}" rel="stylesheet">
    @if (Lang() == 'ar')
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css-rtl/my-select2-style.css') !!}">
    @endif
@endpush
@section('content')
    <div class="app-content content">

        <form class="form" action="" method="post" enctype="multipart/form-data" id="updateSDailyReportFrom">
            @csrf
            @method('PUT')
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
                                    <li class="breadcrumb-item active">
                                        <a href="#">
                                            {!! __('dailyReports.create_new_daily_report') !!}
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
                            <button class="btn btn-info btn-glow px-2" type="submit">
                                <i class="la la-save"></i>
                                {!! __('general.save') !!}
                                <i class="la la-refresh spinner spinner_loading d-none">
                                </i>
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
                                <div class="card">
                                    <!-- begin: card header -->
                                    <div class="card-header">
                                        <h4 class="card-title" id="basic-layout-colored-form-control">
                                            {!! __('dailyReports.create_new_daily_report') !!}
                                        </h4>
                                        <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                <li><a data-action="reload-form"><i class="ft-rotate-cw"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end: card header -->

                                    <!-- begin: card content -->
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <!--begin::table-->
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <!-- begin: row id -->
                                                    <div class="row d-none">
                                                        <!-- begin: input -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" id="dailyReportID" name="id"
                                                                    value="{!! $dailyReport->id !!}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <!-- end: input -->



                                                    </div>
                                                    <!-- end: row id -->

                                                    <!-- begin: row -->
                                                    <div class="row">
                                                        <!-- begin: input -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="employee_id">{!! __('dailyReports.employee_id') !!}</label>
                                                                <select class="employee_id_select form-control" disabled
                                                                    id="employee_id" style="width: 100%">
                                                                    @foreach ($employees as $employee)
                                                                        <option value="{{ $employee->id }}"
                                                                            {{ old('employee_id', $dailyReport->employee_id) == $employee->id ? 'selected' : '' }}>
                                                                            {{ $employee->EmployeeFullName() }}
                                                                        </option>
                                                                    @endforeach
                                                                    <input type="hidden" name="employee_id"
                                                                        value="{!! !$employee->employee_id !!}">
                                                                </select>
                                                                <span class="text text-danger" id="employee_id_error">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- end: input -->

                                                        <!-- begin: input -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="date">{!! __('dailyReports.date') !!}</label>
                                                                <input type="date" id="date" name="date" readonly
                                                                    value="{!! old('date', $dailyReport->date) !!}" class="form-control"
                                                                    autocomplete="off"
                                                                    placeholder="{!! __('dailyReports.enter_date') !!}">
                                                                <span class="text text-danger" id="date_error">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- end: input -->

                                                        <!-- begin: input -->
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="time">{!! __('dailyReports.time') !!}</label>
                                                                <input type="time" id="time" name="time" readonly
                                                                    value="{!! old('date', $dailyReport->time) !!}" class="form-control"
                                                                    autocomplete="off"
                                                                    placeholder="{!! __('dailyReports.enter_time') !!}">
                                                                <span class="text text-danger" id="time_error">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- end: input -->
                                                    </div>
                                                    <!-- end: row -->


                                                    <!-- begin: row  -->
                                                    <div class="row">
                                                        <!-- begin: input details-->
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="details">{!! __('dailyReports.details') !!}</label>
                                                                <textarea type="text" rows="12" id="details" name="details" class="form-control details_summernote"
                                                                    placeholder="{!! __('dailyReports.enter_details') !!}">{!! old('details', $dailyReport->details) !!}</textarea>
                                                                <span class="text text-danger" id="details_error">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- end: input -->
                                                    </div>
                                                    <!-- end: row -->

                                                </div>
                                                <!--end: form-->
                                            </div>
                                            <!--end::table-->

                                        </div>
                                        <!-- end: card content -->
                                    </div>
                                </div> <!-- end: card  -->
                            </div><!-- end: row  -->
                    </section><!-- end: sections  -->
                </div><!-- end: content body  -->
            </div> <!-- end: content wrapper  -->
        </form>
    </div><!-- end: content app  -->
@endsection
@push('scripts')
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>
    <script src="{!! asset('vendor/summernote/summernote.js') !!}"></script>

    <script type="text/javascript">
        // select 2
        var employeePath = "{{ route('dashboard.employees.autocomplete.employee') }}";


        $(".employee_id_select").select2({
            minimumInputLength: 1,
            maximumInputLength: 20,
            placeholder: '{!! __('general.select_from_list') !!}',
            allowClear: true,

            escapeMarkup: function(markup) {
                return markup;
            },
            language: {
                inputTooShort: function() {
                    return "{!! __('general.inputTooShort') !!}";
                },
                inputTooLong: function() {
                    return "{!! __('general.inputTooLong') !!}";
                },
                errorLoading: function() {
                    return "{!! __('general.errorLoading') !!}";
                },
                noResults: function() {
                    return "<span>{!! __('general.noResults2') !!}";
                },
                searching: function() {
                    return " {!! __('general.searching') !!}";
                }
            },

            ajax: {
                url: employeePath,
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    console.log(data);
                    return {
                        results: $.map(data, function(item) {
                            if ('{!! Lang() !!}' === 'en') {
                                return {
                                    text: item.employee_en,
                                    id: item.id
                                }
                            } else {
                                return {
                                    text: item.employee_ar,
                                    id: item.id
                                }
                            }

                        })
                    };
                },
                cache: true
            }
        });




        // details  summernote
        $('.details_summernote').summernote({
            placeholder: '{!! __('general.write_here') !!}',
            tabsize: 2,
            height: 370,
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


        // reset create slider from
        function resetupdateDailyReportFrom() {
            $('#employee_id').css('border-color', '');
            $('#date').css('border-color', '');
            $('#time').css('border-color', '');
            $('#details').css('border-color', '');
            $('#status').css('border-color', '');
            $('.details_summernote').next('.note-editor').removeClass(
                'is-invalid-summernote-editor');

            $('#employee_id_error').text('');
            $('#date_error').text('');
            $('#time_error').text('');
            $('#details_error').text('');
            $('#status_error').text('');

        }

        // store
        $("#updateSDailyReportFrom").on('submit', function(e) {

            e.preventDefault();
            resetupdateDailyReportFrom()
            var data = new FormData(this);

            var id = $('#dailyReportID').val();
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = "{!! route('dashboard.dailyReports.update', ':id') !!}".replace(':id', id);

            $.ajax({
                url: url,
                type: type,
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
                        console.log(data);
                        resetupdateDailyReportFrom()
                        flasher.success("{!! __('general.update_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.update_error_message') !!}");
                    }
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {

                        if (key == 'details') {
                            $('.details_summernote').next('.note-editor').addClass(
                                'is-invalid-summernote-editor');
                        }
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', '#F64E60');
                    });
                }, //end error
                complete: function() {
                    $('.spinner_loading').addClass('d-none');
                }

            }); // end ajax


        });
    </script>
@endpush
