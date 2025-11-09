<div class="modal fade" id="createGovernorateModal" tabindex="-1" role="dialog"
    aria-labelledby="createGovernorateModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <form class="form" action="{!! route('dashboard.governorates.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_gvoernorate_form'>
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title" id="createGovernorateModalLabel">{!! __('world.create_new_governorate') !!}
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
                                    <div class="form-group">
                                        <label for="name">{!! __('world.governorate_name_ar') !!}</label>
                                        <input type="text" id="name_ar" name="name[ar]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('world.enter_governorate_name_ar') !!}">
                                        <span class="text text-danger">
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
                                    <div class="form-group">
                                        <label for="name">{!! __('world.governorate_name_en') !!}</label>
                                        <input type="text" id="name_en" name="name[en]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('world.enter_governorate_name_en') !!}">
                                        <span class="text text-danger">
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
                <div class="modal-footer">
                    <button type="submit" id="create_governorate_btn" class="btn btn-info font-weight-bold ">
                        {{ __('general.save') }}
                        <i class="la la-refresh spinner spinner_loading d-none">
                        </i>
                    </button>

                    <button type="button" id="cancel_governorate_btn" class="btn btn-light-dark font-weight-bold"
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
        // reset
        function resetCreateForm() {
            $('#name_ar').css('border-color', '');
            $('#name_en').css('border-color', '');

            $('#name_ar_error').text('');
            $('#name_en_error').text('');
        }

        // cancel
        $('body').on('click', '#cancel_governorate_btn', function(e) {
            $('#createGovernorateModal').modal('hide');
            $('#create_gvoernorate_form')[0].reset();
            resetCreateForm();
        });

        // hide
        $('#createGovernorateModal').on('hidden.bs.modal', function(e) {
            $('#createGovernorateModal').modal('hide');
            $('#create_gvoernorate_form')[0].reset();
            resetCreateForm();
        });


        // create
        $('#create_gvoernorate_form').on('submit', function(e) {
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
                        $('#create_gvoernorate_form')[0].reset();
                        resetCreateForm();
                        $('#createGovernorateModal').modal('hide');
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
