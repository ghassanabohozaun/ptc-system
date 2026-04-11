<div class="modal modal-pop fade" id="createEmployeeContractModal" tabindex="-1" role="dialog" aria-labelledby="createEmployeeContractModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <form class="form" action="{!! route('dashboard.employeeContracts.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_employee_contract_form'>
            @csrf
            <div class="modal-content shadow-lg border-0 premium-modal-content-styled">

                <!--begin::modal header-->
                <div class="modal-header border-0 pb-0 pt-2 px-2 d-flex justify-content-between align-items-center">
                    <h5 class="modal-title font-weight-bold text-dark ml-1 mt-1" id="createEmployeeContractModalLabel">
                        <i class="la la-plus-circle text-indigo mr-1"></i> {!! __('employeeContracts.create_new_contract') !!}
                    </h5>
                    <button type="button" class="close premium-close premium-close-button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--end::modal header-->

                <!--begin::modal body-->
                <div class="modal-body pt-3">
                    <div class="row">
                        <!-- Employee Select -->
                        <div class="col-md-6 mb-3">
                            <div class="premium-form-group">
                                <label class="premium-label font-weight-bold text-dark" for="employee_id">{!! __('employeeContracts.employee_name') !!}</label>
                                <div class="premium-input-wrapper">
                                    <select class="employee_contract_employee_id_select form-control premium-input shadow-none" id="employee_contract_employee_id"
                                        name="employee_id" style="width: 100%">
                                    </select>
                                    <i class="la la-user-tie text-indigo"></i>
                                </div>
                                <span class="text text-danger small"><strong id="employee_id_error"></strong></span>
                            </div>
                        </div>

                        <!-- Contract Duration -->
                        <div class="col-md-6 mb-3">
                            <div class="premium-form-group">
                                <label class="premium-label font-weight-bold text-dark" for="contract_duration">{!! __('employeeContracts.contract_duration') !!}</label>
                                <div class="premium-input-wrapper">
                                    <input type="number" min="1" id="contract_duration" name="contract_duration" class="form-control premium-input shadow-none"
                                        autocomplete="off" placeholder="{!! __('employeeContracts.enter_contract_duration') !!}">
                                    <i class="la la-clock text-indigo"></i>
                                </div>
                                <span class="text text-danger small"><strong id="contract_duration_error"></strong></span>
                            </div>
                        </div>

                        <!-- Start Date -->
                        <div class="col-md-6 mb-3">
                            <div class="premium-form-group">
                                <label class="premium-label font-weight-bold text-dark" for="contract_start_date">{!! __('employeeContracts.contract_start_date') !!}</label>
                                <div class="premium-input-wrapper">
                                    <input type="date" id="contract_start_date" name="contract_start_date" class="form-control premium-input shadow-none"
                                        autocomplete="off">
                                    <i class="la la-calendar text-indigo"></i>
                                </div>
                                <span class="text text-danger small"><strong id="contract_start_date_error"></strong></span>
                            </div>
                        </div>

                        <!-- Expiry Date -->
                        <div class="col-md-6 mb-3">
                            <div class="premium-form-group">
                                <label class="premium-label font-weight-bold text-dark" for="contract_expiry_date">{!! __('employeeContracts.contract_expiry_date') !!}</label>
                                <div class="premium-input-wrapper">
                                    <input type="date" id="contract_expiry_date" name="contract_expiry_date" class="form-control premium-input shadow-none"
                                        autocomplete="off">
                                    <i class="la la-calendar-times text-indigo"></i>
                                </div>
                                <span class="text text-danger small"><strong id="contract_expiry_date_error"></strong></span>
                            </div>
                        </div>

                        <!-- Monthly Salary -->
                        <div class="col-md-12 mb-3">
                            <div class="premium-form-group">
                                <label class="premium-label font-weight-bold text-dark" for="monthly_salary">{!! __('employeeContracts.monthly_salary') !!}</label>
                                <div class="premium-input-wrapper">
                                    <input type="number" step="0.01" id="monthly_salary" name="monthly_salary" class="form-control premium-input shadow-none"
                                        autocomplete="off" placeholder="{!! __('employeeContracts.enter_monthly_salary') !!}">
                                    <i class="la la-dollar text-indigo"></i>
                                </div>
                                <span class="text text-danger small"><strong id="monthly_salary_error"></strong></span>
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
        $(document).ready(function() {
            // Re-initialize Select2 when modal is shown to avoid focus/z-index issues
            $('#createEmployeeContractModal').on('shown.bs.modal', function() {
                var employeePath = "{{ route('dashboard.employees.autocomplete.employee') }}";
                $(".employee_contract_employee_id_select").select2({
                    dropdownParent: $('#createEmployeeContractModal'),
                    minimumInputLength: 1,
                    placeholder: '{!! __('employeeContracts.select_employee') !!}',
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

            function resetCreateForm() {
                $('.premium-input-wrapper').css('border-color', '');
                $('#employee_id_error').text('');
                $('#contract_duration_error').text('');
                $('#contract_start_date_error').text('');
                $('#contract_expiry_date_error').text('');
                $('#monthly_salary_error').text('');
            }

            $('#createEmployeeContractModal').on('hidden.bs.modal', function(e) {
                $('#create_employee_contract_form')[0].reset();
                $(".employee_contract_employee_id_select").val('').trigger('change');
                resetCreateForm();
            });

            $('#create_employee_contract_form').on('submit', function(e) {
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
                        if (typeof fetch_data === 'function') { fetch_data(); }
                        $('#create_employee_contract_form')[0].reset();
                        $(".employee_contract_employee_id_select").val('').trigger('change');
                        resetCreateForm();
                        $('#createEmployeeContractModal').modal('hide');
                        flasher.success("{!! __('general.add_success_message') !!}");
                    },
                    error: function(reject) {
                        var response = $.parseJSON(reject.responseText);
                        $.each(response.errors, function(key, value) {
                            $('#' + key + '_error').text(value[0]);
                            $('#' + key).closest('.premium-input-wrapper').css('border-color', '#F64E60');
                        });
                    },
                    complete: function() {
                        $('.spinner_loading').addClass('d-none');
                    }
                });
            });
        });
    </script>
@endpush
