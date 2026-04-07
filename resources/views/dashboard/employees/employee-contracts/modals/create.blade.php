<div class="modal modal-pop fade text-left" id="createEmployeeContractModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <form class="form" action="{!! route('dashboard.employeeContracts.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_employee_contract_form'>
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header bg-info white">
                    <h5 class="modal-title white" id="createEmployeeContractModalLabel">
                        <i class="ft-plus mr-1"></i>{!! __('employeeContracts.create_new_contract') !!}
                    </h5>
                    <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
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

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-bold-600" for="employee_id">{!! __('employeeContracts.employee_name') !!}</label>
                                        <select class="employee_contract_employee_id_select form-control" id="employee_contract_employee_id"
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
                                        <label class="text-bold-600" for="contract_duration">{!! __('employeeContracts.contract_duration') !!}</label>
                                        <input type="text" id="contract_duration" name="contract_duration" class="form-control"
                                            autocomplete="off" placeholder="{!! __('employeeContracts.enter_contract_duration') !!}">
                                        <span class="text text-danger">
                                            <strong id="contract_duration_error"></strong>
                                        </span>
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
                                        <label class="text-bold-600" for="contract_start_date">{!! __('employeeContracts.contract_start_date') !!}</label>
                                        <input type="date" id="contract_start_date" name="contract_start_date" class="form-control"
                                            autocomplete="off">
                                        <span class="text text-danger">
                                            <strong id="contract_start_date_error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->

                                <!-- begin: input -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-bold-600" for="contract_expiry_date">{!! __('employeeContracts.contract_expiry_date') !!}</label>
                                        <input type="date" id="contract_expiry_date" name="contract_expiry_date" class="form-control"
                                            autocomplete="off">
                                        <span class="text text-danger">
                                            <strong id="contract_expiry_date_error"></strong>
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
                                        <label class="text-bold-600" for="monthly_salary">{!! __('employeeContracts.monthly_salary') !!}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="la la-dollar"></i></span>
                                            </div>
                                            <input type="number" step="0.01" id="monthly_salary" name="monthly_salary" class="form-control"
                                                autocomplete="off" placeholder="{!! __('employeeContracts.enter_monthly_salary') !!}">
                                        </div>
                                        <span class="text text-danger">
                                            <strong id="monthly_salary_error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->

                            </div>
                            <!-- end: row -->

                        </div>
                    </div>
                </div>
                <!--end::modal body-->

                <!--begin::modal footer-->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-glow font-weight-bold">
                        <i class="ft-save mr-1"></i>{{ __('general.save') }}
                        <i class="ft-refresh-cw spinner spinner_loading d-none ml-1"></i>
                    </button>

                    <button type="button" id="cancel_employee_contract_btn" class="btn btn-outline-secondary font-weight-bold"
                        data-dismiss="modal">
                        <i class="ft-x mr-1"></i>{{ __('general.cancel') }}
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

            // reset
            function resetCreateForm() {
                $('#employee_contract_employee_id').css('border-color', '');
                $('#contract_duration').css('border-color', '');
                $('#contract_start_date').css('border-color', '');
                $('#contract_expiry_date').css('border-color', '');
                $('#monthly_salary').css('border-color', '');

                $('#employee_id_error').text('');
                $('#contract_duration_error').text('');
                $('#contract_start_date_error').text('');
                $('#contract_expiry_date_error').text('');
                $('#monthly_salary_error').text('');
            }

            // cancel
            $('body').on('click', '#cancel_employee_contract_btn', function(e) {
                $('#createEmployeeContractModal').modal('hide');
                $('#create_employee_contract_form')[0].reset();
                $(".employee_contract_employee_id_select").val('').trigger('change');
                resetCreateForm();
            });

            // hide
            $('#createEmployeeContractModal').on('hidden.bs.modal', function(e) {
                $('#create_employee_contract_form')[0].reset();
                $(".employee_contract_employee_id_select").val('').trigger('change');
                resetCreateForm();
            });

            // create
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
                        if (typeof fetch_data === 'function') {
                            fetch_data();
                        }
                        $('#create_employee_contract_form')[0].reset();
                        $(".employee_contract_employee_id_select").val('').trigger('change');
                        resetCreateForm();
                        $('#createEmployeeContractModal').modal('hide');
                        if (typeof flasher !== 'undefined') {
                            flasher.success("{!! __('general.add_success_message') !!}");
                        } else {
                            toastr.success("{!! __('general.added_successfully') !!}");
                        }
                    },
                    error: function(reject) {
                        var response = $.parseJSON(reject.responseText);
                        $.each(response.errors, function(key, value) {
                            $('#' + key + '_error').text(value[0]);
                            $('#' + key).css('border-color', '#F64E60');
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
