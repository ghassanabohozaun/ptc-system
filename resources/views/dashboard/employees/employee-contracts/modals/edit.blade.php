<div class="modal fade" id="editEmployeeContractModal" tabindex="-1" role="dialog"
    aria-labelledby="editEmployeeContractModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <form class="form" action="" method="POST" enctype="multipart/form-data" id='update_employee_contract_form'>
            @csrf
            @method('PUT')
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title" id="editEmployeeContractModalLabel">{!! __('employeeContracts.update_contract') !!}
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
                            <div class="row d-none">
                                <!-- begin: input -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" id="id_edit" name="id" class="form-control">
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
                                        <label for="employee_id">{!! __('employeeContracts.employee_name') !!}</label>
                                        <select class="employee_contract_employee_id_edit_select form-control" id="employee_contract_employee_id_edit"
                                            name="employee_id" style="width: 100%">
                                        </select>
                                        <span class="text text-danger">
                                            <strong id="employee_id_error_edit"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->

                                <!-- begin: input -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contract_duration">{!! __('employeeContracts.contract_duration') !!}</label>
                                        <input type="text" id="contract_duration_edit" name="contract_duration" class="form-control"
                                            autocomplete="off" placeholder="{!! __('employeeContracts.enter_contract_duration') !!}">
                                        <span class="text text-danger">
                                            <strong id="contract_duration_error_edit"></strong>
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
                                        <label for="contract_start_date">{!! __('employeeContracts.contract_start_date') !!}</label>
                                        <input type="date" id="contract_start_date_edit" name="contract_start_date" class="form-control"
                                            autocomplete="off">
                                        <span class="text text-danger">
                                            <strong id="contract_start_date_error_edit"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->

                                <!-- begin: input -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contract_expiry_date">{!! __('employeeContracts.contract_expiry_date') !!}</label>
                                        <input type="date" id="contract_expiry_date_edit" name="contract_expiry_date" class="form-control"
                                            autocomplete="off">
                                        <span class="text text-danger">
                                            <strong id="contract_expiry_date_error_edit"></strong>
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
                                        <label for="monthly_salary">{!! __('employeeContracts.monthly_salary') !!}</label>
                                        <input type="number" step="0.01" id="monthly_salary_edit" name="monthly_salary" class="form-control"
                                            autocomplete="off">
                                        <span class="text text-danger">
                                            <strong id="monthly_salary_error_edit"></strong>
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

                    <button type="button" id="cancel_employee_contract_btn_edit"
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
        // select 2
        var employeePath = "{{ route('dashboard.employees.autocomplete.employee') }}";
        $(".employee_contract_employee_id_edit_select").select2({
            dropdownParent: $('#editEmployeeContractModal'),
            minimumInputLength: 1,
            maximumInputLength: 20,
            placeholder: '{!! __('employeeContracts.select_employee') !!}',
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
                    return {
                        results: $.map(data, function(item) {
                            if ('{!! Lang() !!}' === 'en') {
                                return { text: item.employee_en, id: item.id }
                            } else {
                                return { text: item.employee_ar, id: item.id }
                            }
                        })
                    };
                },
                cache: true
            }
        });

        // show edit modal
        $('body').on('click', '.edit-btn', function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var employee_id = $(this).attr('data-employee_id');
            // Assuming we pass employee name if we had it, but for select2 we can append if needed, or let user search again
            var employee_name = $(this).closest('tr').find('td:nth-child(2)').text().trim();
            var duration = $(this).attr('data-duration');
            var start = $(this).attr('data-start');
            var expiry = $(this).attr('data-expiry');
            var salary = $(this).attr('data-salary');

            $('#id_edit').val(id);
            $('#contract_duration_edit').val(duration);
            $('#contract_start_date_edit').val(start);
            $('#contract_expiry_date_edit').val(expiry);
            $('#monthly_salary_edit').val(salary);

            // Set Select2 value
            if (employee_id) {
                var option = new Option(employee_name, employee_id, true, true);
                $('.employee_contract_employee_id_edit_select').append(option).trigger('change');
            } else {
                $('.employee_contract_employee_id_edit_select').val(null).trigger('change');
            }

            $('#editEmployeeContractModal').modal('show');
        })

        // reset
        function resetEditForm() {
            $('#employee_contract_employee_id_edit').css('border-color', '');
            $('#contract_duration_edit').css('border-color', '');
            $('#contract_start_date_edit').css('border-color', '');
            $('#contract_expiry_date_edit').css('border-color', '');
            $('#monthly_salary_edit').css('border-color', '');

            $('#employee_id_error_edit').text('');
            $('#contract_duration_error_edit').text('');
            $('#contract_start_date_error_edit').text('');
            $('#contract_expiry_date_error_edit').text('');
            $('#monthly_salary_error_edit').text('');
        }

        // cancel
        $('body').on('click', '#cancel_employee_contract_btn_edit', function(e) {
            $('#editEmployeeContractModal').modal('hide');
            $('#update_employee_contract_form')[0].reset();
            resetEditForm();
        });

        // hide
        $('#editEmployeeContractModal').on('hidden.bs.modal', function(e) {
            $('#editEmployeeContractModal').modal('hide');
            $('#update_employee_contract_form')[0].reset();
            resetEditForm();
        });

        // update
        $('#update_employee_contract_form').on('submit', function(e) {
            e.preventDefault();

            // reset
            resetEditForm();

            // paramters
            var id = $('#id_edit').val();
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = "{!! route('dashboard.employeeContracts.update', 'id') !!}".replace('id', id);

            // explicitly add employee_id if it's missing (put method sometimes loses inputs)
            var empId = $('#employee_contract_employee_id_edit').val();
            if (empId) {
                data.append('employee_id', empId);
            }

            $.ajax({
                url: url,
                data: data,
                type: type, // Some Laravel setups require 'POST' with _method='PUT' which is handled by FormData
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('.spinner_loading').removeClass('d-none');
                },
                success: function(data) {
                    if (data.status == true) {
                        $('#myTable').load(location.href + (' #myTable'));
                        resetEditForm();
                        $('#editEmployeeContractModal').modal('hide');
                        if (typeof flasher !== 'undefined') {
                            flasher.success("{!! __('general.update_success_message') !!}");
                        } else {
                            toastr.success("{!! __('general.updated_successfully') !!}");
                        }
                    } else {
                        if (typeof flasher !== 'undefined') {
                            flasher.error("{!! __('general.update_error_message') !!}");
                        } else {
                            toastr.error('Error');
                        }
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
