<div class="modal modal-pop fade text-left" id="editEmployeeContractModal" tabindex="-1" role="dialog"
    aria-labelledby="editEmployeeContractModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <form class="form" action="" method="POST" enctype="multipart/form-data"
            id='update_employee_contract_form'>
            @csrf
            @method('PUT')
            <div class="modal-content shadow-lg border-0 premium-modal-content-styled">

                <!--begin::modal header-->
                <div class="modal-header border-0 pb-0 pt-2 px-2 d-flex justify-content-between align-items-center">
                    <h5 class="modal-title font-weight-bold text-dark ml-1 mt-1" id="editEmployeeContractModalLabel">
                        <i class="la la-edit text-indigo mr-1"></i> {!! __('employeeContracts.update_contract') !!}
                    </h5>
                    <button type="button" class="close premium-close premium-close-button" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--end::modal header-->

                <!--begin::modal body-->
                <div class="modal-body pt-3">
                    <input type="hidden" id="id_edit" name="id">

                    <div class="row">
                        <!-- Employee Select -->
                        <div class="col-md-6 mb-3">
                            <div class="premium-form-group">
                                <label class="premium-label font-weight-bold text-dark"
                                    for="employee_contract_employee_id_edit">{!! __('employeeContracts.employee_name') !!}</label>
                                <div class="premium-input-wrapper">
                                    <select
                                        class="employee_contract_employee_id_edit_select form-control premium-input shadow-none"
                                        id="employee_contract_employee_id_edit" name="employee_id" style="width: 100%">
                                    </select>
                                    <i class="la la-user-tie text-indigo"></i>
                                </div>
                                <span class="text text-danger small"><strong
                                        id="employee_id_error_edit"></strong></span>
                            </div>
                        </div>

                        <!-- Contract Duration -->
                        <div class="col-md-6 mb-3">
                            <div class="premium-form-group">
                                <label class="premium-label font-weight-bold text-dark"
                                    for="contract_duration_edit">{!! __('employeeContracts.contract_duration') !!}</label>
                                <div class="premium-input-wrapper">
                                    <input type="number" min="1" id="contract_duration_edit"
                                        name="contract_duration" class="form-control premium-input shadow-none"
                                        autocomplete="off" placeholder="{!! __('employeeContracts.enter_contract_duration') !!}">
                                    <i class="la la-clock text-indigo"></i>
                                </div>
                                <span class="text text-danger small"><strong
                                        id="contract_duration_error_edit"></strong></span>
                            </div>
                        </div>

                        <!-- Start Date -->
                        <div class="col-md-6 mb-3">
                            <div class="premium-form-group">
                                <label class="premium-label font-weight-bold text-dark"
                                    for="contract_start_date_edit">{!! __('employeeContracts.contract_start_date') !!}</label>
                                <div class="premium-input-wrapper">
                                    <input type="date" id="contract_start_date_edit" name="contract_start_date"
                                        class="form-control premium-input shadow-none" autocomplete="off">
                                    <i class="la la-calendar text-indigo"></i>
                                </div>
                                <span class="text text-danger small"><strong
                                        id="contract_start_date_error_edit"></strong></span>
                            </div>
                        </div>

                        <!-- Expiry Date -->
                        <div class="col-md-6 mb-3">
                            <div class="premium-form-group">
                                <label class="premium-label font-weight-bold text-dark"
                                    for="contract_expiry_date_edit">{!! __('employeeContracts.contract_expiry_date') !!}</label>
                                <div class="premium-input-wrapper">
                                    <input type="date" id="contract_expiry_date_edit" name="contract_expiry_date"
                                        class="form-control premium-input shadow-none" autocomplete="off">
                                    <i class="la la-calendar-times text-indigo"></i>
                                </div>
                                <span class="text text-danger small"><strong
                                        id="contract_expiry_date_error_edit"></strong></span>
                            </div>
                        </div>

                        <!-- Monthly Salary -->
                        <div class="col-md-12 mb-3">
                            <div class="premium-form-group">
                                <label class="premium-label font-weight-bold text-dark"
                                    for="monthly_salary_edit">{!! __('employeeContracts.monthly_salary') !!}</label>
                                <div class="premium-input-wrapper">
                                    <input type="number" step="0.01" id="monthly_salary_edit" name="monthly_salary"
                                        class="form-control premium-input shadow-none" autocomplete="off">
                                    <i class="la la-dollar text-indigo"></i>
                                </div>
                                <span class="text text-danger small"><strong
                                        id="monthly_salary_error_edit"></strong></span>
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
            // Re-initialize Select2 when modal is shown
            $('#editEmployeeContractModal').on('shown.bs.modal', function() {
                var employeePath = "{{ route('dashboard.employees.autocomplete.employee') }}";
                $(".employee_contract_employee_id_edit_select").select2({
                    dropdownParent: $('#editEmployeeContractModal'),
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
                                        text: '{!! Lang() !!}' === 'en' ? item
                                            .employee_en : item.employee_ar,
                                        id: item.id
                                    }
                                })
                            };
                        },
                        cache: true
                    }
                });

                // Set initial value if we are coming from an edit click
                var employee_id = $('#employee_contract_employee_id_edit').data('initial-id');
                var employee_name = $('#employee_contract_employee_id_edit').data('initial-name');

                if (employee_id && employee_name) {
                    var option = new Option(employee_name, employee_id, true, true);
                    $('.employee_contract_employee_id_edit_select').append(option).trigger('change');
                }
            });

            // show edit modal logic
            $('body').on('click', '.edit-btn', function(e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                var employee_id = $(this).attr('data-employee_id');
                var employee_name = $(this).closest('tr').find('.font-weight-bold.text-primary').text()
                    .trim();

                $('#id_edit').val(id);
                $('#contract_duration_edit').val($(this).attr('data-duration'));
                $('#contract_start_date_edit').val($(this).attr('data-start'));
                $('#contract_expiry_date_edit').val($(this).attr('data-expiry'));
                $('#monthly_salary_edit').val($(this).attr('data-salary'));

                // Store initial values to be picked up by shown.bs.modal
                $('#employee_contract_employee_id_edit').data('initial-id', employee_id);
                $('#employee_contract_employee_id_edit').data('initial-name', employee_name);

                $('#editEmployeeContractModal').modal('show');
            });

            function resetEditForm() {
                $('.premium-input-wrapper').css('border-color', '');
                $('#employee_id_error_edit').text('');
                $('#contract_duration_error_edit').text('');
                $('#contract_start_date_error_edit').text('');
                $('#contract_expiry_date_error_edit').text('');
                $('#monthly_salary_error_edit').text('');
            }

            $('#editEmployeeContractModal').on('hidden.bs.modal', function(e) {
                $('#update_employee_contract_form')[0].reset();
                resetEditForm();
            });

            $('#update_employee_contract_form').on('submit', function(e) {
                e.preventDefault();
                resetEditForm();

                var id = $('#id_edit').val();
                var data = new FormData(this);
                var type = $(this).attr('method');
                var url = "{!! route('dashboard.employeeContracts.update', 'id') !!}".replace('id', id);

                var empId = $('#employee_contract_employee_id_edit').val();
                if (empId) {
                    data.append('employee_id', empId);
                }

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
                            if (typeof fetch_data === 'function') {
                                fetch_data();
                            }
                            resetEditForm();
                            $('#editEmployeeContractModal').modal('hide');
                            flasher.success("{!! __('general.update_success_message') !!}");
                        } else {
                            flasher.error("{!! __('general.update_error_message') !!}");
                        }
                    },
                    error: function(reject) {
                        var response = $.parseJSON(reject.responseText);
                        $.each(response.errors, function(key, value) {
                            $('#' + key + '_error_edit').text(value[0]);
                            $('#' + key + '_edit').closest('.premium-input-wrapper')
                                .css('border-color', '#F64E60');
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
