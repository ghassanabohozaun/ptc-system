<div class="modal modal-pop fade" id="updateAdminModal" tabindex="-1" role="dialog" aria-labelledby="updateAdminModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <form class="form" action="" method="POST" enctype="multipart/form-data" id='update_admin_form'>
            @csrf
            @method('PUT')
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title font-weight-bold text-dark" id="updateAdminModalLabel">
                        <i class="la la-edit mr-1 text-info"></i> {!! __('admins.update_admin') !!}
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
                                    <div class="premium-form-group">
                                        <label for="name_ar_edit">{!! __('admins.name_ar') !!}</label>
                                        <input type="text" id="name_ar_edit" name="name[ar]" class="form-control premium-input"
                                            autocomplete="off" placeholder="{!! __('admins.enter_name_ar') !!}">
                                        <span class="error-message-premium">
                                            <strong id="name_ar_error_edit"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->

                                <!-- begin: input -->
                                <div class="col-md-6">
                                    <div class="premium-form-group">
                                        <label for="name_en_edit">{!! __('admins.name_en') !!}</label>
                                        <input type="text" id="name_en_edit" name="name[en]" class="form-control premium-input"
                                            autocomplete="off" placeholder="{!! __('admins.enter_name_en') !!}">
                                        <span class="error-message-premium">
                                            <strong id="name_en_error_edit"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->
                            </div>
                            <!-- end: row -->


                            <!-- begin: row -->
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="premium-form-group">
                                        <label for="password_edit">{!! __('admins.password') !!}</label>
                                        <div class="premium-input-wrapper">
                                            <input type="password" id="password_edit" name="password"
                                                class="form-control premium-input" autocomplete="off"
                                                placeholder="{!! __('admins.enter_password') !!}">
                                            <i class="icon-eye" onclick="showPasswordEdit();" style="color: #6366f1;"></i>
                                        </div>
                                        <span class="error-message-premium">
                                            <strong id="password_error_edit"></strong>
                                        </span>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="premium-form-group">
                                        <label for="password_confirm_edit">{!! __('admins.password_confirm') !!}</label>
                                        <div class="premium-input-wrapper">
                                            <input type="password" id="password_confirm_edit" name="password_confirm"
                                                class="form-control premium-input" autocomplete="off"
                                                placeholder="{!! __('admins.enter_password_confirm') !!}">
                                            <i class="icon-eye" onclick="showPasswordConfirmEdit();" style="color: #6366f1;"></i>
                                        </div>
                                        <span class="error-message-premium">
                                            <strong id="password_confirm_error_edit"></strong>
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <!-- end: row -->


                            <!-- begin: row -->
                            <div class="row">
                                <!-- begin: input -->
                                <div class="col-md-4">
                                    <div class="premium-form-group">
                                        <label for="email_edit">{!! __('admins.email') !!}</label>
                                        <input type="text" id="email_edit" name="email" class="form-control premium-input"
                                            autocomplete="off" placeholder="{!! __('admins.enter_email') !!}">
                                        <span class="error-message-premium">
                                            <strong id="email_error_edit"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->
                                <!-- begin: input -->
                                <div class="col-md-4">
                                    <div class="premium-form-group">
                                        <label for="role_id_edit">{!! __('admins.role_id') !!}</label>
                                        <select class="form-control premium-input" id='role_id_edit' name="role_id">
                                            <option value="" selected="">
                                                {!! __('general.select_from_list') !!}</option>
                                            @foreach ($roles as $role)
                                                <option value="{!! $role->id !!}">
                                                    {!! $role->role !!}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="error-message-premium">
                                            <strong id="role_id_error_edit"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->
                                <!-- begin: input -->
                                <div class="col-md-4">
                                    <div class="premium-form-group">
                                        <label for="status">{!! __('admins.status') !!}</label>
                                        <div class="input-group pt-2">
                                            <div class="d-inline-block custom-control custom-radio mr-2">
                                                <input type="radio" class="custom-control-input"
                                                    name="status" id="status_active_edit" value="1">
                                                <label class="custom-control-label font-weight-bold text-success"
                                                    for="status_active_edit">{!! __('general.active') !!}
                                                </label>
                                            </div>
                                            <div class="d-inline-block custom-control custom-radio">
                                                <input type="radio" class="custom-control-input"
                                                    name="status" id="status_inactive_edit" value="0">
                                                <label class="custom-control-label font-weight-bold text-danger"
                                                    for="status_inactive_edit">{!! __('general.inactive') !!}
                                                </label>
                                            </div>
                                        </div>
                                        <span class="error-message-premium">
                                            <strong id="status_error_edit"> </strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->
                            </div>
                            <!-- end: row -->

                            <!-- begin: row -->
                            <div class="row mb-0">
                                <!-- begin: input -->
                                <div class="col-md-12">
                                    <div class="premium-form-group mb-0">
                                        <label class="font-weight-bold text-dark">{!! __('admins.photo') !!}</label>
                                        <div class="premium-photo-container">
                                            <input type="file" name="photo" id="admin_photo_edit"
                                                class="form-control" accept="image/*" data-show-caption="true"
                                                data-show-upload="false">
                                        </div>
                                        <span class="error-message-premium"><strong id="photo_error_edit"></strong></span>
                                    </div>
                                </div>
                                <!-- end: input -->
                            </div>
                            <!-- end: row mb-0 -->



                        </div>
                    </div>
                    <!--end: form-->
                </div>
                <!--end::modal body-->

                <!--begin::modal footer-->
                <div class="modal-footer border-0 pt-0">
                    <button type="submit" id="create_admin_btn_edit" class="btn btn-premium-blue px-4 font-weight-bold ">
                        <i class="la la-save mr-1"></i> {{ trans('general.save') }}
                        <i class="la la-refresh la-spin spinner_loading d-none ml-1"></i>
                    </button>

                    <button type="button" id="cancel_admin_btn_edit" class="btn btn-light-dark font-weight-bold"
                        data-dismiss="modal">
                        <i class="la la-times mr-1"></i> {{ trans('general.cancel') }}
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
        function showPasswordEdit() {
            var password_edit = document.getElementById('password_edit');
            if (password_edit.type == 'password') {
                password_edit.type = 'text';
            } else {
                password_edit.type = 'password';
            }
        }

        // show password confirm
        function showPasswordConfirmEdit() {
            // body...
            var password_confirm_edit = document.getElementById('password_confirm_edit');
            if (password_confirm_edit.type == 'password') {
                password_confirm_edit.type = 'text';
            } else {
                password_confirm_edit.type = 'password';
            }
        }


        // show edit modal
        $('body').on('click', '.edit_admin_button', function(e) {
            e.preventDefault();
            var admin_id = $(this).attr('admin-id');
            var admin_name_ar = $(this).attr('admin-name-ar');
            var admin_name_en = $(this).attr('admin-name-en');
            var admin_email = $(this).attr('admin-email');
            var admin_role_id = $(this).attr('admin-role-id');
            var admin_status = $(this).attr('admin-status');

            $('#id_edit').val(admin_id);
            $('#name_ar_edit').val(admin_name_ar);
            $('#name_en_edit').val(admin_name_en);
            $('#email_edit').val(admin_email);
            $('#role_id_edit').val(admin_role_id);

            if (admin_status == 1) {
                $('#status_active_edit').prop('checked', true);
            } else {
                $('#status_inactive_edit').prop('checked', true);
            }

            // Photo Preview
            var admin_photo = $(this).attr('admin-photo');
            var admin_photo_url = $(this).attr('admin-photo-url');

            $("#admin_photo_edit").fileinput('destroy');
            $("#admin_photo_edit").fileinput({
                theme: 'fa5',
                language: lang,
                allowedFileTypes: ['image'],
                maxFileCount: 1,
                showCancel: false,
                showUpload: false,
                initialPreview: admin_photo ? [admin_photo_url] : [],
                initialPreviewAsData: true,
                browseClass: "btn btn-sm btn-primary",
                removeClass: "btn btn-sm btn-danger",
                removeLabel: "{!! __('general.delete') !!}",
                browseLabel: "{!! __('general.choose_file') !!}"
            });

            $('#updateAdminModal').modal('show');
        })

        // reset
        function resetEditForm() {
            $('#name_ar_edit').css('border-color', '');
            $('#name_en_edit').css('border-color', '');
            $('#email_edit').css('border-color', '');
            $('#password_confirm_edit').css('border-color', '');
            $('#role_id_edit').css('border-color', '');
            $('#photo_edit').css('border-color', '');

            $('#name_ar_error_edit').text('');
            $('#name_en_error_edit').text('');
            $('#email_error_edit').text('');
            $('#password_confirm_error_edit').text('');
            $('#role_id_error_edit').text('');
            $('#photo_error_edit').text('');

            // reset password type
            var password_edit = document.getElementById('password_edit');
            password_edit.type = 'password';

            var password_confirm_edit = document.getElementById('password_confirm_edit');
            password_confirm_edit.type = 'password';

        }

        // cancel
        $('body').on('click', '#cancel_admin_btn_edit', function(e) {
            $('#updateAdminModal').modal('hide');
            $('#update_admin_form')[0].reset();
            resetEditForm();
        });

        // hide
        $('#updateAdminModal').on('hidden.bs.modal', function(e) {
            $('#updateAdminModal').modal('hide');
            $('#update_admin_form')[0].reset();
            resetEditForm();
        });


        // update
        $('#update_admin_form').on('submit', function(e) {
            e.preventDefault();
            // reset
            resetEditForm();

            // paramters
            var admin_id = $('#id_edit').val();
            //var currentPage = $('#yajra-datatable').DataTable().page();
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = "{!! route('dashboard.admins.update', 'id') !!}".replace('id', admin_id);

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
                        $('#update_admin_form')[0].reset();
                        resetEditForm();
                        $('.admin_name_section').load(location.href + ' .admin_name_section');
                        $('#updateAdminModal').modal('hide');
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
