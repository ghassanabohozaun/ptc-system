<div class="modal fade" id="updateMonthlyReportModal" tabindex="-1" role="dialog"
    aria-labelledby="updateMonthlyReportModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <form class="form" action="" method="POST" enctype="multipart/form-data" id='update_monthly_report_form'>
            @csrf
            @method('PUT')
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title" id="updateMonthlyReportModalLabel">{!! __('monthlyReports.update_monthly_report') !!}
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" id="id_edit" name="id" class="form-control">
                                    </div>
                                </div>
                                <!-- end: input -->
                            </div>
                            <!-- end: row -->


                            <!-- begin: row -->
                            <div class="row">

                                <!-- begin: input -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="month">{!! __('monthlyReports.employee') !!}</label>
                                        <label id="employee_name_edit" name="employee_name_edit"
                                            style="background-color: #e9e9e9" class="form-control"></label>
                                    </div>
                                </div>
                                <!-- end: input -->

                                <!-- begin: input -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="month">{!! __('monthlyReports.month') !!}</label>
                                        <label id="month_edit" name="month" style="background-color: #e9e9e9"
                                            class="form-control"></label>
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
                                        <label for="currency">{!! __('monthlyReports.status') !!}</label>
                                        <select id="status_edit" name="status" class="form-control">
                                            <option value="new">{!! __('monthlyReports.new') !!}</option>
                                            <option value="initial_review">{!! __('monthlyReports.initial_review') !!}</option>
                                            <option value="initial_refuse">{!! __('monthlyReports.initial_refuse') !!}</option>
                                            <option value="intital_approved">{!! __('monthlyReports.intital_approved') !!}</option>
                                            <option value="final_review">{!! __('monthlyReports.final_review') !!}</option>
                                            <option value="final_refuse">{!! __('monthlyReports.final_refuse') !!}</option>
                                            <option value="approved">{!! __('monthlyReports.approved') !!}</option>
                                        </select>
                                        <span class="text text-danger">
                                            <strong id="status_error_edit"></strong>
                                        </span>
                                    </div>

                                </div>
                                <!-- end: input -->
                            </div>
                            <!-- end: row -->

                            <div class="row" id="refuse_reason_section">
                                <!-- begin: input -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="refuse_reason">{!! __('monthlyReports.refuse_reason') !!}</label>
                                        <textarea rows="6" id="refuse_reason_edit" name="refuse_reason" class="form-control"
                                            placeholder="{!! __('monthlyReports.enter_refuse_reason') !!}"></textarea>
                                        <span class="text text-danger">
                                            <strong id="refuse_reason_error_edit"></strong>
                                        </span>
                                    </div>

                                </div>
                                <!-- end: input -->
                            </div>

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

                    <button type="button" id="cancel_monthly_report_btn_edit"
                        class="btn btn-light-dark font-weight-bold" data-dismiss="modal">
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
        $("#refuse_reason_section").hide();
        $('#status_edit').on('change', function() {
            var selectedValue = $(this).val(); // Get the selected value
            console.log(selectedValue);

            if (selectedValue == 'initial_refuse' || selectedValue == 'final_refuse') {
                $("#refuse_reason_section").show();
            } else {
                $("#refuse_reason_section").hide();
            }

            $('#refuse_reason_edit').css('border-color', '');
            $('#refuse_reason_error_edit').text('');

        });


        // show edit modal
        $('body').on('click', '.monthly_report_change_status_button', function(e) {

            e.preventDefault();
            var monthly_report_id = $(this).attr('monthly-report-id');
            var emplyee_name = $(this).attr('monthly-report-employee');
            var month = $(this).attr('monthly-report-month');
            var year = $(this).attr('monthly-report-year');
            var status = $(this).attr('monthly-report-status');
            var refuse_reason = $(this).attr('monthly-report-refuse-reason');

            let monthYear = month + ' / ' + year;

            $('#id_edit').val(monthly_report_id);
            $('#employee_name_edit').text(emplyee_name);
            $('#month_edit').text(monthYear);
            $('#status_edit').val(status);
            $('#refuse_reason_edit').val(refuse_reason);


            if (status == 'initial_refuse' || status == 'final_refuse') {
                $("#refuse_reason_section").show();
            } else {
                $("#refuse_reason_section").hide();
            }

            $('#updateMonthlyReportModal').modal('show');
        })


        // reset
        function resetEditForm() {
            $('#status_edit').css('border-color', '');
            $('#refuse_reason_edit').css('border-color', '');

            $('#status_error_edit').text('');
            $('#refuse_reason_error_edit').text('');
        }

        // cancel
        $('body').on('click', '#cancel_monthly_report_btn_edit', function(e) {
            $('#updateMonthlyReportModal').modal('hide');
            $('#update_monthly_report_form')[0].reset();
            resetEditForm();
        });

        // hide
        $('#updateMonthlyReportModal').on('hidden.bs.modal', function(e) {
            $('#updateMonthlyReportModal').modal('hide');
            $('#update_monthly_report_form')[0].reset();
            resetEditForm();
        });

        // update
        $('#update_monthly_report_form').on('submit', function(e) {
            e.preventDefault();

            // reset
            resetEditForm();

            // paramters
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
                        console.log(data);
                        $('#myTable').load(location.href + (' #myTable'));
                        resetEditForm();
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
                        $('#' + key + '_edit').css('border-color', '#F64E60');
                    });
                }, //end error
                complete: function() {
                    $('.spinner_loading').addClass('d-none');
                }
            });
        });
    </script>
@endpush
