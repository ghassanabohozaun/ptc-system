<div class="modal modal-pop fade" id="updateMonthlyReportModal" tabindex="-1" role="dialog"
    aria-labelledby="updateMonthlyReportModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <form class="form" action="" method="POST" enctype="multipart/form-data" id='update_monthly_report_form'>
            @csrf
            @method('PUT')
            <div class="modal-content shadow-lg border-0 premium-modal-content-styled">

                <!--begin::modal header-->
                <div class="modal-header border-0 pb-0 pt-2 px-2 d-flex justify-content-between align-items-center">
                    <h5 class="modal-title font-weight-bold text-dark ml-1 mt-1" id="updateMonthlyReportModalLabel">
                        <i class="la la-edit text-indigo mr-1"></i> {!! __('monthlyReports.update_monthly_report') !!}
                    </h5>
                    <button type="button" class="close premium-close premium-close-button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--end::modal header-->

                <!--begin::modal body-->
                <div class="modal-body pt-3">
                    <input type="hidden" id="id_edit" name="id">

                    <div class="row">
                        <!-- Employee (ReadOnly Style) -->
                        <div class="col-md-6 mb-3">
                            <div class="premium-form-group">
                                <label class="premium-label font-weight-bold text-dark">{!! __('monthlyReports.employee_id') !!}</label>
                                <div class="premium-input-wrapper shadow-none premium-readonly-wrapper">
                                    <div id="employee_name_edit" class="py-1 px-3 premium-readonly-text"></div>
                                    <i class="la la-user-tie"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Month (ReadOnly Style) -->
                        <div class="col-md-6 mb-3">
                            <div class="premium-form-group">
                                <label class="premium-label font-weight-bold text-dark">{!! __('monthlyReports.month') !!}</label>
                                <div class="premium-input-wrapper shadow-none premium-readonly-wrapper">
                                    <div id="month_edit" class="py-1 px-3 premium-readonly-text"></div>
                                    <i class="la la-calendar"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Status Select -->
                        <div class="col-md-12 mb-3">
                            <div class="premium-form-group">
                                <label class="premium-label font-weight-bold text-dark">{!! __('monthlyReports.status') !!}</label>
                                <div class="premium-input-wrapper">
                                    <select id="status_edit" name="status" class="form-control premium-input shadow-none">
                                        <option value="" selected>{!! __('employees.select_from_list') !!}</option>
                                        @if (admin()->user()->role->getTranslation('role', 'en') == 'SEO')
                                            <option value="initial_review">{!! __('monthlyReports.initial_review') !!}</option>
                                            <option value="initial_refuse">{!! __('monthlyReports.initial_refuse') !!}</option>
                                            <option value="intital_approved">{!! __('monthlyReports.intital_approved') !!}</option>
                                        @endif
                                        @if (admin()->user()->role->getTranslation('role', 'en') == 'Manger')
                                            <option value="final_review">{!! __('monthlyReports.final_review') !!}</option>
                                            <option value="final_refuse">{!! __('monthlyReports.final_refuse') !!}</option>
                                            <option value="approved">{!! __('monthlyReports.approved') !!}</option>
                                        @endif
                                    </select>
                                    <i class="la la-toggle-on"></i>
                                </div>
                                <span class="text text-danger small"><strong id="status_error_edit"></strong></span>
                            </div>
                        </div>

                        <!-- Refuse Reason -->
                        <div class="col-md-12 mb-3" id="refuse_reason_section">
                            <div class="premium-form-group">
                                <label class="premium-label font-weight-bold text-dark">{!! __('monthlyReports.refuse_reason') !!}</label>
                                <textarea id="refuse_reason_edit" name="refuse_reason" class="form-control premium-input shadow-none premium-textarea-md"
                                    placeholder="{!! __('monthlyReports.enter_refuse_reason') !!}"></textarea>
                                <span class="text text-danger small"><strong id="refuse_reason_error_edit"></strong></span>
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
        $("#refuse_reason_section").hide();

        $('#status_edit').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue == 'initial_refuse' || selectedValue == 'final_refuse') {
                $("#refuse_reason_section").slideDown();
            } else {
                $("#refuse_reason_section").slideUp();
            }
            $('#refuse_reason_edit').closest('.premium-input-wrapper').css('border-color', '');
            $('#refuse_reason_error_edit').text('');
        });

        $('body').on('click', '.monthly_report_change_status_button', function(e) {
            e.preventDefault();
            resetEditForm();

            var monthly_report_id = $(this).attr('monthly-report-id');
            var emplyee_name = $(this).attr('monthly-report-employee');
            var month = $(this).attr('monthly-report-month');
            var year = $(this).attr('monthly-report-year');
            var status = $(this).attr('monthly-report-status');
            var refuse_reason = $(this).attr('monthly-report-refuse-reason');

            $('#id_edit').val(monthly_report_id);
            $('#employee_name_edit').text(emplyee_name);
            $('#month_edit').text(month + ' / ' + year);
            $('#status_edit').val(status);
            $('#refuse_reason_edit').val(refuse_reason);

            if (status == 'initial_refuse' || status == 'final_refuse') {
                $("#refuse_reason_section").show();
            } else {
                $("#refuse_reason_section").hide();
            }

            $('#updateMonthlyReportModal').modal('show');
        });

        function resetEditForm() {
            $('#status_edit').closest('.premium-input-wrapper').css('border-color', '');
            $('#refuse_reason_edit').closest('.premium-input-wrapper').css('border-color', '');
            $('#status_error_edit').text('');
            $('#refuse_reason_error_edit').text('');
        }

        $('#updateMonthlyReportModal').on('hidden.bs.modal', function(e) {
            resetEditForm();
        });

        $('#update_monthly_report_form').on('submit', function(e) {
            e.preventDefault();
            resetEditForm();

            var id = $('#id_edit').val();
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = "{!! route('dashboard.monthlyReports.update', 'id') !!}".replace('id', id);

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
                    if (data.status == true) {
                        if (typeof fetch_data === 'function') { fetch_data(); }
                        $('#updateMonthlyReportModal').modal('hide');
                        flasher.success("{!! __('general.update_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.update_error_message') !!}");
                    }
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        $('#' + key + '_error_edit').text(value[0]);
                        $('#' + key + '_edit').closest('.premium-input-wrapper').css('border-color', '#F64E60');
                    });
                },
                complete: function() {
                    $('.spinner_loading').addClass('d-none');
                }
            });
        });
    </script>
@endpush
