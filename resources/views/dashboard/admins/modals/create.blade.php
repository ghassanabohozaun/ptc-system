<div class="modal fade" id="createAdminModal" tabindex="-1" role="dialog" aria-labelledby="createAdminModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <form class="form" action="{!! route('dashboard.admins.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_admin_form'>
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title" id="createAdminModalLabel">{!! __('admins.create_new_admin') !!}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--end::modal header-->

                <!--begin::modal body-->
                <div class="modal-body">

                    <!--begin: form-->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- begin: row -->
                            <div class="row">
                                <!-- begin: input -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_ar">{!! __('admins.name_ar') !!}</label>
                                        <input type="text" id="name_ar" name="name[ar]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('admins.enter_name_ar') !!}">
                                        <span class="text text-danger">
                                            <strong id="name_ar_error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->
                                <!-- begin: input -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_en">{!! __('admins.name_en') !!}</label>
                                        <input type="text" id="name_en" name="name[en]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('admins.enter_name_en') !!}">
                                        <span class="text text-danger">
                                            <strong id="name_en_error"></strong>
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
                                        <label for="email">{!! __('admins.email') !!}</label>
                                        <input type="text" id="email" name="email" class="form-control"
                                            autocomplete="off" placeholder="{!! __('admins.enter_email') !!}">
                                        <span class="text text-danger">
                                            <strong id="email_error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->
                            </div>
                            <!-- end: row -->

                            <!-- begin: row -->
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">{!! __('admins.password') !!}</label>
                                        <div class="input-group">
                                            <input type="password" id="password" name="password" class="form-control"
                                                autocomplete="off" placeholder="{!! __('admins.enter_password') !!}"
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


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirm">{!! __('admins.password_confirm') !!}</label>
                                        <div class="input-group">
                                            <input type="password" id="password_confirm" name="password_confirm"
                                                class="form-control" autocomplete="off"
                                                placeholder="{!! __('admins.enter_password_confirm') !!}" aria-describedby="basic-addon3">
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


                            <!-- begin: row -->
                            <div class="row">
                                <!-- begin: input -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="role_id">{!! __('admins.role_id') !!}</label>
                                        <select class="form-control" id="DefaultSelect" id='role_id'
                                            name="role_id">
                                            <option value="" selected="">
                                                {!! __('general.select_from_list') !!}</option>
                                            @foreach ($roles as $role)
                                                <option value="{!! $role->id !!}" {!! old('role_id') == $role->id ? 'selected' : '' !!}>
                                                    {!! $role->role !!}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text text-danger">
                                            <strong id="role_id_error"></strong>
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
                                        <label for="status">{!! __('admins.status') !!}</label>
                                        <div class="input-group">
                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                <input type="radio" class="custom-control-input bg-success"
                                                    name="status" id="colorRadio1" value="1">
                                                <label class="custom-control-label"
                                                    for="colorRadio1">{!! __('general.active') !!}
                                                </label>
                                            </div>
                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                <input type="radio" class="custom-control-input bg-danger"
                                                    name="status" id="colorRadio2" value="0">
                                                <label class="custom-control-label"
                                                    for="colorRadio2">{!! __('general.inactive') !!}
                                                </label>
                                            </div>
                                        </div>
                                        <span class="text text-danger">
                                            <strong id="status_error"> </strong>
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
                    <button type="submit" id="create_admin_btn" class="btn btn-info font-weight-bold ">
                        {{ trans('general.save') }}
                        <i class="la la-refresh spinner spinner_loading d-none">
                        </i>
                    </button>

                    <button type="button" id="cancel_admin_btn" class="btn btn-light-dark font-weight-bold"
                        data-dismiss="modal">
                        {{ trans('general.cancel') }}
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
            // body...
            var password_confirm = document.getElementById('password_confirm');
            if (password_confirm.type == 'password') {
                password_confirm.type = 'text';
            } else {
                password_confirm.type = 'password';
            }
        }

        // reset
        function resetCreateForm() {
            $('#name_ar').css('border-color', '');
            $('#name_en').css('border-color', '');
            $('#email').css('border-color', '');
            $('#password').css('border-color', '');
            $('#password_confirm').css('border-color', '');
            $('#role_id').css('border-color', '');
            $('#status').css('border-color', '');

            $('#name_ar_error').text('');
            $('#name_en_error').text('');
            $('#email_error').text('');
            $('#password_error').text('');
            $('#password_confirm_error').text('');
            $('#role_id_error').text('');
            $('#status_error').text('');

            // default values
            var password = document.getElementById('password');
            password.type = 'password';

            var password_confirm = document.getElementById('password_confirm');
            password_confirm.type = 'password';
        }

        // cancel
        $('body').on('click', '#cancel_admin_btn', function(e) {
            $('#createAdminModal').modal('hide');
            $('#create_admin_form')[0].reset();
            resetCreateForm();
        });

        // hide
        $('#createAdminModal').on('hidden.bs.modal', function(e) {
            $('#createAdminModal').modal('hide');
            $('#create_admin_form')[0].reset();
            resetCreateForm();
        });


        // create
        $('#create_admin_form').on('submit', function(e) {
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
                        console.log(data);
                        $('#myTable').load(location.href + (' #myTable'));
                        $('#create_admin_form')[0].reset();
                        resetCreateForm();
                        $('#createAdminModal').modal('hide');
                        flasher.success("{!! __('general.add_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.add_error_message') !!}");
                    }
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
                        if (key == 'name.en') {
                            key = 'name_en';
                        } else if (key == 'name.ar') {
                            key = 'name_ar';
                        }
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
