<div class="modal fade" id="createMonthlyReportModal" role="dialog" aria-labelledby="createMonthlyReportModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <form class="form" action="{!! route('dashboard.monthlyReports.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_monthly_report_form'>
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title" id="createMonthlyReportModalLabel">{!! __('monthlyReports.create_new_monthly_report') !!}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--end::modal header-->

                <!--begin::modal body-->
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-12">


                            <!-- begin: row -->
                            <div class="row">

                                <!-- begin: input -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="employee_id">{!! __('monthlyReports.employee_id') !!}</label>
                                        <select class="monthly_report_employee_id_select form-control" id="employee_id"
                                            name="employee_id" style="width: 100%">
                                        </select>
                                        <span class="text text-danger">
                                            <strong id="employee_id_error"></strong>
                                        </span>

                                    </div>
                                </div>
                                <!-- end: input -->

                                <!-- begin: input -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="month">{!! __('monthlyReports.month') !!}</label>
                                        <input type="month" id="month" name="month" class="form-control"
                                            autocomplete="off" placeholder="{!! __('monthlyReports.enter_month') !!}">
                                        <span class="text text-danger">
                                            <strong id="month_error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->


                            </div>


                            <!-- begin: row -->
                            <div class="row">
                                <!-- begin: input -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="details">{!! __('monthlyReports.details') !!}</label>
                                        <textarea rows="5" id="details" name="details" class="form-control" autocomplete="off"
                                            placeholder="{!! __('monthlyReports.enter_details') !!}"></textarea>
                                        <span class="text text-danger">
                                            <strong id="details_error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->

                            </div>
                            <!-- end: row -->

                            <!-- begin: row -->
                            <div class="row">
                                <!-- begin: input -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="file">{!! __('monthlyReports.file') !!}</label>
                                        <input type="file" id="file" name="file" class="form-control"
                                            placeholder="{!! __('monthlyReports.enter_file') !!}"></input>
                                        <span class="text text-danger">
                                            <strong id="file_error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->

                            </div>
                            <!-- end: row -->

                        </div>
                    </div>
                    <!--end: form-->
                </div>
                <!--end::modal body-->

                <!--begin::modal footer-->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info font-weight-bold ">
                        {{ __('general.save') }}
                        <i class="la la-refresh spinner spinner_loading d-none">
                        </i>
                    </button>

                    <button type="button" id="cancel_monthly_report_btn" class="btn btn-light-dark font-weight-bold"
                        data-dismiss="modal">
                        {{ __('general.cancel') }}
                    </button>
                </div>
                <!--end::modal footer-->

            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        // select 2
        var employeePath = "{{ route('dashboard.employees.autocomplete.employee') }}";

        $(".monthly_report_employee_id_select").select2({
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

        // reset
        function resetCreateForm() {
            $('#employee_id').css('border-color', '');
            $('#month').css('border-color', '');
            $('#file').css('border-color', '');

            $('#employee_id_error').text('');
            $('#month_error').text('');
            $('#file_error').text('');
        }

        // cancel
        $('body').on('click', '#cancel_monthly_report_btn', function(e) {
            $('#createMonthlyReportModal').modal('hide');
            $('#create_monthly_report_form')[0].reset();
            $(".monthly_report_employee_id_select").val('').trigger('change');
            resetCreateForm();
        });

        // hide
        $('#createMonthlyReportModal').on('hidden.bs.modal', function(e) {
            $('#createMonthlyReportModal').modal('hide');
            $('#create_monthly_report_form')[0].reset();
            $(".monthly_report_employee_id_select").val('').trigger('change');
            resetCreateForm();
        });


        // create
        $('#create_monthly_report_form').on('submit', function(e) {
            e.preventDefault();
            // reset
            resetCreateForm();

            // paramters
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('.spinner_loading').removeClass('d-none');
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 'added') {
                        $('#myTable').load(location.href + (' #myTable'));
                        $('#create_monthly_report_form')[0].reset();
                        $(".monthly_report_employee_id_select").val('').trigger('change');
                        resetCreateForm();
                        $('#createMonthlyReportModal').modal('hide');
                        flasher.success("{!! __('general.add_success_message') !!}");
                    } else if (data.status == 'error') {
                        flasher.error("{!! __('general.add_error_message') !!}");
                    } else if (data.status == 'exists') {
                        flasher.error("{!! __('general.recored_exists') !!}");
                    }
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', '#F64E60');
                    });
                }, //end error
                complete: function() {
                    $('.spinner_loading').addClass('d-none');
                }
            });

        });
    </script>
@endpush
