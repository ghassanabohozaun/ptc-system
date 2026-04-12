<div class="modal modal-pop fade" id="createStatusModal" tabindex="-1" role="dialog" aria-labelledby="createStatusModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <form class="form" action="{!! route('dashboard.employeeStatuses.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_status_form'>
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title font-weight-bold text-dark" id="createStatusModalLabel">
                        <i class="la la-plus-circle mr-1 text-primary"></i> {!! __('employees.create_new_employee_status') !!}
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
                                        <label for="name_ar">{!! __('employees.employee_status_name_ar') !!}</label>
                                        <input type="text" id="name_ar" name="name[ar]" class="form-control premium-input shadow-none"
                                            autocomplete="off" placeholder="{!! __('employees.enter_employee_status_name_ar') !!}">
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
                                        <label for="name_en">{!! __('employees.employee_status_name_en') !!}</label>
                                        <input type="text" id="name_en" name="name[en]" class="form-control premium-input shadow-none"
                                            autocomplete="off" placeholder="{!! __('employees.enter_employee_status_name_en') !!}">
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
                    <button type="submit" class="btn btn-premium-add px-4 font-weight-bold h-42 radius-10">
                        <i class="la la-save mr-1"></i> {{ __('general.save') }}
                        <i class="la la-refresh la-spin spinner_loading d-none ml-1"></i>
                    </button>

                    <button type="button" id="cancel_status_btn" class="btn btn-light-dark font-weight-bold h-42 radius-10"
                        data-dismiss="modal">
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
        $('body').on('click', '#cancel_status_btn', function(e) {
            $('#createStatusModal').modal('hide');
            $('#create_status_form')[0].reset();
            resetCreateForm();
        });

        // hide
        $('#createStatusModal').on('hidden.bs.modal', function(e) {
            $('#createStatusModal').modal('hide');
            $('#create_status_form')[0].reset();
            resetCreateForm();
        });


        // create
        $('#create_status_form').on('submit', function(e) {
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
                        $('#create_status_form')[0].reset();
                        resetCreateForm();
                        $('#createStatusModal').modal('hide');
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




