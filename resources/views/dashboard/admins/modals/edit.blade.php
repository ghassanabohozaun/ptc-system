<div class="modal fade" id="updateAdminModal" tabindex="-1" role="dialog" aria-labelledby="updateAdminModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <form class="form" action="" method="POST" enctype="multipart/form-data" id='update_admin_form'>
            @csrf
            @method('PUT')
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title" id="updateAdminModalLabel">{!! __('admins.update_admin') !!}
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
                                        <label for="name_ar">{!! __('admins.name_ar') !!}</label>
                                        <input type="text" id="name_ar_edit" name="name[ar]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('admins.enter_name_ar') !!}">
                                        <span class="text text-danger">
                                            <strong id="name_ar_error_edit"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->

                                <!-- begin: input -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_en">{!! __('admins.name_en') !!}</label>
                                        <input type="text" id="name_en_edit" name="name[en]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('admins.enter_name_en') !!}">
                                        <span class="text text-danger">
                                            <strong id="name_en_error_edit"></strong>
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
                                        <input type="text" id="email_edit" name="email" class="form-control"
                                            autocomplete="off" placeholder="{!! __('admins.enter_email') !!}">
                                        <span class="text text-danger">
                                            <strong id="email_error_edit"></strong>
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
                                        <label for="password">{!! __('admins.password') !!}</label>
                                        <input type="text" id="password_edit" name="password" class="form-control"
                                            autocomplete="off" placeholder="{!! __('admins.enter_password') !!}">
                                        <span class="text text-danger">
                                            <strong id="password_error_edit"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->

                                <!-- begin: input -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirm">{!! __('admins.password_confirm') !!}</label>
                                        <input type="text" id="password_confirm_edit" name="password_confirm"
                                            class="form-control" autocomplete="off"
                                            placeholder="{!! __('admins.enter_password_confirm') !!}">
                                        <span class="text text-danger">
                                            <strong id="password_confirm_error_edit"></strong>
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
                                        <label for="role_id">{!! __('admins.role_id') !!}</label>
                                        <select class="form-control" id='role_id_edit' name="role_id">
                                            <option value="" selected="">
                                                {!! __('general.select_from_list') !!}</option>
                                            @foreach ($roles as $role)
                                                <option value="{!! $role->id !!}">
                                                    {!! $role->role !!}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text text-danger">
                                            <strong id="role_id_error_edit"></strong>
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
                                                    name="status" id="status_active_edit" value="1">
                                                <label class="custom-control-label"
                                                    for="status_active_edit">{!! __('general.active') !!}
                                                </label>
                                            </div>
                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                <input type="radio" class="custom-control-input bg-danger"
                                                    name="status" id="status_inactive_edit" value="0">
                                                <label class="custom-control-label"
                                                    for="status_inactive_edit">{!! __('general.inactive') !!}
                                                </label>
                                            </div>
                                        </div>
                                        <span class="text text-danger">
                                            <strong id="status_error_edit"> </strong>
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

            $('#updateAdminModal').modal('show');
        })

        // reset
        function resetEditForm() {
            $('#name_ar_edit').css('border-color', '');
            $('#name_en_edit').css('border-color', '');

            $('#name_ar_error_edit').text('');
            $('#name_en_error_edit').text('');
        }

        // cancel
        $('body').on('click', '#cancel_admin_btn', function(e) {
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
