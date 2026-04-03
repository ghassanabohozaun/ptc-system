<div class="modal fade" id="createEmployeeContractModal" role="dialog" aria-labelledby="createEmployeeContractModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <form class="form" action="{!! route('dashboard.employeeContracts.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_employee_contract_form'>
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title" id="createEmployeeContractModalLabel">{!! __('employeeContracts.create_new_contract') !!}
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

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="employee_id">{!! __('employeeContracts.employee_name') !!}</label>
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
                                        <label for="contract_duration">{!! __('employeeContracts.contract_duration') !!}</label>
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
                                        <label for="contract_start_date">{!! __('employeeContracts.contract_start_date') !!}</label>
                                        <input type="date" id="contract_start_date" name="contract_start_date" class="form-control"
                                            autocomplete="off" placeholder="{!! __('employeeContracts.enter_contract_start_date') !!}">
                                        <span class="text text-danger">
                                            <strong id="contract_start_date_error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->

                                <!-- begin: input -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contract_expiry_date">{!! __('employeeContracts.contract_expiry_date') !!}</label>
                                        <input type="date" id="contract_expiry_date" name="contract_expiry_date" class="form-control"
                                            autocomplete="off" placeholder="{!! __('employeeContracts.enter_contract_expiry_date') !!}">
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
                                        <label for="monthly_salary">{!! __('employeeContracts.monthly_salary') !!}</label>
                                        <input type="number" step="0.01" id="monthly_salary" name="monthly_salary" class="form-control"
                                            autocomplete="off" placeholder="{!! __('employeeContracts.enter_monthly_salary') !!}">
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
                    <button type="submit" class="btn btn-info font-weight-bold ">
                        {{ __('general.save') }}
                        <i class="la la-refresh spinner spinner_loading d-none">
                        </i>
                    </button>

                    <button type="button" id="cancel_employee_contract_btn" class="btn btn-light-dark font-weight-bold"
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

        $(".employee_contract_employee_id_select").select2({
            dropdownParent: $('#createEmployeeContractModal'),
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
            $('#createEmployeeContractModal').modal('hide');
            $('#create_employee_contract_form')[0].reset();
            $(".employee_contract_employee_id_select").val('').trigger('change');
            resetCreateForm();
        });


        // create
        $('#create_employee_contract_form').on('submit', function(e) {
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
                    $('#myTable').load(location.href + (' #myTable'));
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
                }, //end error
                complete: function() {
                    $('.spinner_loading').addClass('d-none');
                }
            });

        });
    </script>
@endpush
