<div class="modal modal-pop fade" id="createDepartmentModal" tabindex="-1" role="dialog"
    aria-labelledby="createDepartmentModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <form class="form" action="{!! route('dashboard.departments.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_department_form'>
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title font-weight-bold text-dark" id="createDepartmentModalLabel">
                        <i class="la la-plus-circle mr-1 text-primary"></i> {!! __('departments.create_new_department') !!}
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
                                    <div class="premium-form-group">
                                        <label for="name_ar">{!! __('departments.name_ar') !!}</label>
                                        <input type="text" id="name_ar" name="name[ar]"
                                            class="form-control premium-input shadow-none" autocomplete="off"
                                            placeholder="{!! __('departments.enter_name_ar') !!}">
                                        <span class="error-message-premium">
                                            <strong id="name_ar_error"></strong>
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
                                    <div class="premium-form-group">
                                        <label for="name_en">{!! __('departments.name_en') !!}</label>
                                        <input type="text" id="name_en" name="name[en]"
                                            class="form-control premium-input shadow-none" autocomplete="off"
                                            placeholder="{!! __('departments.enter_name_en') !!}">
                                        <span class="error-message-premium">
                                            <strong id="name_en_error"></strong>
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
                <div class="modal-footer border-0 pt-0">
                    <button type="submit" class="btn btn-premium-add px-4 font-weight-bold"
                        style="height: 42px; border-radius: 10px;">
                        <i class="la la-save mr-1"></i> {{ __('general.save') }}
                        <i class="la la-refresh la-spin spinner_loading d-none ml-1"></i>
                    </button>

                    <button type="button" id="cancel_department_btn" class="btn btn-light-dark font-weight-bold"
                        style="height: 42px; border-radius: 10px;" data-dismiss="modal">
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
        // reset
        function resetCreateForm() {
            $('.premium-input').removeClass('is-invalid-premium');
            $('.error-message-premium strong').text('');
        }

        // cancel
        $('body').on('click', '#cancel_department_btn', function(e) {
            $('#createDepartmentModal').modal('hide');
            $('#create_department_form')[0].reset();
            resetCreateForm();
        });

        // hide
        $('#createDepartmentModal').on('hidden.bs.modal', function(e) {
            $('#createDepartmentModal').modal('hide');
            $('#create_department_form')[0].reset();
            resetCreateForm();
        });


        // create
        $('#create_department_form').on('submit', function(e) {
            e.preventDefault();
            // reset
            resetCreateForm();

            // paramters
            // var currentPage = $('#yajra-datatable').DataTable().page();
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
                        $('#create_department_form')[0].reset();
                        resetCreateForm();
                        $('#createDepartmentModal').modal('hide');
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
                        $('#' + key).addClass('is-invalid-premium');
                        $('#' + key + '_error').text(value[0]);
                    });
                }, //end error
                complete: function() {
                    $('.spinner_loading').addClass('d-none');
                }
            });

        });
    </script>
@endpush
