<div class="modal modal-pop fade" id="employeeChangePasswordModal" tabindex="-1" aria-labelledby="employeeChangePasswordModalLabel"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">

    <div class="modal-dialog modal-md" role="document">
        <form class="form" action="{!! route('employees.overview.change.password') !!}" method="POST" enctype="multipart/form-data"
            id='employee_change_password_form'>
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title" id="employeeChangePasswordModalLabel">{!! __('employees.change_password') !!}
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="employee_id" id="employee_id" class="form-control"
                                            value="{!! employee()->user()->id !!}">
                                    </div>
                                </div>
                            </div>

                            <!-- begin: row -->
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password">{!! __('employees.password') !!}</label>
                                        <div class="input-group">
                                            <input type="password" id="password" name="password" class="form-control"
                                                autocomplete="off" placeholder="{!! __('employees.enter_password') !!}"
                                                aria-describedby="basic-addon3">
                                            <div class="input-group-append" onclick="showPassword();">
                                                <span class="input-group-text" id="basic-addon3"
                                                    style="color: black;font-size: 15px;cursor: pointer;">
                                                    <i class="icon-eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="text text-danger">
                                            <strong id="password_error"></strong>
                                        </span>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password_confirm">{!! __('employees.password_confirm') !!}</label>
                                        <div class="input-group">
                                            <input type="password" id="password_confirm" name="password_confirm"
                                                class="form-control" autocomplete="off"
                                                placeholder="{!! __('employees.enter_password_confirm') !!}" aria-describedby="basic-addon3">
                                            <div class="input-group-append" onclick="showPasswordConfirm();">
                                                <span class="input-group-text" id="basic-addon3"
                                                    style="color: black;font-size: 15px;cursor: pointer;">
                                                    <i class="icon-eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="text text-danger">
                                            <strong id="password_confirm_error"></strong>
                                        </span>
                                    </div>
                                </div>



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
                        <div class="spinner-border spinner-border-sm spinner_loading d-none" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>

                    <button type="button" id="cancel_employee_change_password_btn"
                        class="btn btn-light-dark font-weight-bold">
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
        // show password
        function showPassword() {
            var password = document.getElementById('password');
            if (password.type == 'password') {
                password.type = 'text';
            } else {
                password.type = 'password';
            }
        }

        // show password confirm
        function showPasswordConfirm() {
            var password_confirm = document.getElementById('password_confirm');
            if (password_confirm.type == 'password') {
                password_confirm.type = 'text';
            } else {
                password_confirm.type = 'password';
            }
        }


        $(document).ready(function() {





            // open create modal
            $('body').on('click', '#employee_change_password_btn', function(e) {
                $('#employeeChangePasswordModal').modal('show');
            });



            // reset
            function resetCreateForm() {
                $('#password').css('border-color', '');
                $('#password_confirm').css('border-color', '');

                $('#password_error').text('');
                $('#password_confirm_error').text('');
            }

            // cancel
            $('body').on('click', '#cancel_employee_change_password_btn', function(e) {
                $('#employeeChangePasswordModal').modal('hide');
                $('#employee_change_password_form')[0].reset();
                resetCreateForm();
            });

            // hide
            $('#employeeChangePasswordModal').on('hidden.bs.modal', function(e) {
                $('#employeeChangePasswordModal').modal('hide');
                $('#employee_change_password_form')[0].reset();
                resetCreateForm();
            });


            // create
            $('#employee_change_password_form').on('submit', function(e) {
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
                        if (data.status == true) {
                            $('#employee_change_password_form')[0].reset();
                            resetCreateForm();
                            $('#employeeChangePasswordModal').modal('hide');
                            flasher.success("{!! __('general.change_password_success_message') !!}");
                        } else {
                            flasher.error("{!! __('general.change_password_error_message') !!}");
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


        });
    </script>
@endpush




