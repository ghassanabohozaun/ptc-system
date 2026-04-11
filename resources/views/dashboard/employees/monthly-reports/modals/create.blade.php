<div class="modal modal-pop fade" id="createMonthlyReportModal" role="dialog" aria-labelledby="createMonthlyReportModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <form class="form" action="{!! route('dashboard.monthlyReports.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_monthly_report_form'>
            @csrf
            <div class="modal-content shadow-lg border-0 premium-modal-content-styled">

                <!--begin::modal header-->
                <div class="modal-header border-0 pb-0 pt-2 px-2 d-flex justify-content-between align-items-center">
                    <h5 class="modal-title font-weight-bold text-dark ml-1 mt-1" id="createMonthlyReportModalLabel">
                        <i class="la la-plus-circle text-indigo mr-1"></i> {!! __('monthlyReports.create_new_monthly_report') !!}
                    </h5>
                    <button type="button" class="close premium-close premium-close-button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--end::modal header-->

                <!--begin::modal body-->
                <div class="modal-body pt-3">
                    <div class="row">
                        <!-- Employee Input -->
                        <div class="col-md-6 mb-3">
                            <div class="premium-form-group">
                                <label class="premium-label font-weight-bold text-dark">{!! __('monthlyReports.employee_id') !!}</label>
                                <div class="premium-input-wrapper">
                                    <select class="monthly_report_employee_id_select form-control premium-input shadow-none w-100" id="employee_id"
                                        name="employee_id">
                                    </select>
                                    <i class="la la-user-tie"></i>
                                </div>
                                <span class="text text-danger small"><strong id="employee_id_error"></strong></span>
                            </div>
                        </div>

                        <!-- Month Input -->
                        <div class="col-md-6 mb-3">
                            <div class="premium-form-group">
                                <label class="premium-label font-weight-bold text-dark">{!! __('monthlyReports.month') !!}</label>
                                <div class="premium-input-wrapper">
                                    <input type="month" id="month" name="month" class="form-control premium-input shadow-none"
                                        autocomplete="off" placeholder="{!! __('monthlyReports.enter_month') !!}">
                                    <i class="la la-calendar"></i>
                                </div>
                                <span class="text text-danger small"><strong id="month_error"></strong></span>
                            </div>
                        </div>

                        <!-- Details Input (Summernote targeted) -->
                        <div class="col-md-12 mb-3">
                            <div class="premium-form-group">
                                <label class="premium-label font-weight-bold text-dark">{!! __('monthlyReports.details') !!}</label>
                                <textarea id="details" name="details" class="form-control premium-input shadow-none premium-textarea-md" autocomplete="off"
                                    placeholder="{!! __('monthlyReports.enter_details') !!}"></textarea>
                                <span class="text text-danger small"><strong id="details_error"></strong></span>
                            </div>
                        </div>

                        <!-- File Input -->
                        <div class="col-md-12">
                            <div class="premium-form-group">
                                <label class="premium-label font-weight-bold text-dark">{!! __('monthlyReports.file') !!}</label>
                                <div class="premium-input-wrapper">
                                    <input type="file" id="file" name="file" class="form-control premium-input shadow-none"
                                        placeholder="{!! __('monthlyReports.enter_file') !!}">
                                    <i class="la la-cloud-upload"></i>
                                </div>
                                <span class="text text-danger small"><strong id="file_error"></strong></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::modal body-->

                <!--begin::modal footer-->
                <div class="modal-footer border-0 pt-0">
                    <button type="submit" class="btn btn-premium-add px-4 font-weight-bold">
                        <i class="la la-save mr-1"></i> {{ __('general.save') }}
                        <i class="la la-refresh la-spin spinner_loading d-none ml-1"></i>
                    </button>

                    <button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">
                        <i class="la la-times mr-1"></i> {{ __('general.cancel') }}
                    </button>
                </div>
                <!--end::modal footer-->

            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        // Initialize Select2 when modal is shown to avoid focus/parent issues
        $('#createMonthlyReportModal').on('shown.bs.modal', function () {
            var employeePath = "{{ route('dashboard.employees.autocomplete.employee') }}";
            
            $(".monthly_report_employee_id_select").select2({
                dropdownParent: $('#createMonthlyReportModal'),
                minimumInputLength: 1,
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
        });

        // reset
        function resetCreateForm() {
            $('#employee_id').closest('.premium-input-wrapper').css('border-color', '');
            $('#month').closest('.premium-input-wrapper').css('border-color', '');
            $('#file').closest('.premium-input-wrapper').css('border-color', '');
            $('#details').css('border-color', '');

            $('#employee_id_error').text('');
            $('#month_error').text('');
            $('#file_error').text('');
            $('#details_error').text('');
        }

        // cancel & hide cleanup
        $('#createMonthlyReportModal').on('hidden.bs.modal', function(e) {
            $('#create_monthly_report_form')[0].reset();
            $(".monthly_report_employee_id_select").val('').trigger('change');
            resetCreateForm();
        });

        // create
        $('#create_monthly_report_form').on('submit', function(e) {
            e.preventDefault();
            resetCreateForm();

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
                    if (data.status == 'added') {
                        if (typeof fetch_data === 'function') { fetch_data(1); }
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
                        // Apply red border to premium-input-wrapper
                        $('#' + key).closest('.premium-input-wrapper').css('border-color', '#F64E60');
                        // Special check for details if it's summernote (it won't have the wrapper)
                        if(key === 'details') { $('#details').css('border-color', '#F64E60'); }
                    });
                },
                complete: function() {
                    $('.spinner_loading').addClass('d-none');
                }
            });
        });
    </script>
@endpush
