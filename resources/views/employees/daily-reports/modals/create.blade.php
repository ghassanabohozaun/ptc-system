<div class="modal fade" id="createDailyReportModal" tabindex="-1" aria-labelledby="createDailyReportModalLabel"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">

    <div class="modal-dialog modal-md" role="document">
        <form class="form" action="{!! route('employees.dailyReports.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_daily_report_form'>
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title" id="createDailyReportModalLabel">{!! __('dailyReports.create_new_daily_report') !!}
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

                                <!-- begin: input -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="date">{!! __('dailyReports.date') !!}</label>
                                        <input type="date" id="date" name="date"
                                            value="{!! old('date') !!}" class="form-control" autocomplete="off"
                                            placeholder="{!! __('dailyReports.enter_date') !!}">
                                        <span class="text text-danger" id="date_error">
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->


                            </div>
                            <!-- end: row -->


                            <!-- begin: row  -->
                            <div class="row">
                                <!-- begin: input details-->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="details">{!! __('dailyReports.details') !!}</label>
                                        <textarea type="text" rows="12" id="details" name="details" class="form-control details_summernote_create"
                                            placeholder="{!! __('dailyReports.enter_details') !!}"></textarea>
                                        <span class="text text-danger" id="details_error">
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->
                            </div>
                            <!-- end: row -->

                            <!-- begin: row  -->
                            <div class="row">
                                <!-- begin: input -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="file">{!! __('dailyReports.file') !!}</label>
                                        <input type="file" id="file" name="file" class="form-control"
                                            autocomplete="off" placeholder="{!! __('dailyReports.enter_file') !!}">
                                        <span class="text text-danger" id="file_error">
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
                        <div class="spinner-border spinner-border-sm spinner_loading d-none" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>

                    <button type="button" id="cancel_daily_report_btn" class="btn btn-light-dark font-weight-bold">
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
        $(document).ready(function() {

            // open create modal
            $('body').on('click', '#create_daily_report_btn', function(e) {
                $('#createDailyReportModal').modal('show');
            });


            // summernote
            $('.details_summernote_create').summernote({
                placeholder: '{!! __('general.write_here') !!}',
                tabsize: 2,
                height: 370,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'video']],
                ]
            });


            // reset
            function resetCreateForm() {
                $('#date').css('border-color', '');
                $('#details').css('border-color', '');
                $('.details_summernote_create').next('.note-editor').removeClass(
                    'is-invalid-summernote-editor');

                $('#file').css('border-color', '');

                $('#date_error').text('');
                $('#details_error').text('');
                $('#file_error').text('');
            }

            // cancel
            $('body').on('click', '#cancel_daily_report_btn', function(e) {
                $('#createDailyReportModal').modal('hide');
                $('#create_daily_report_form')[0].reset();
                $('.details_summernote_create').summernote('code', '');
                resetCreateForm();
            });

            // hide
            $('#createDailyReportModal').on('hidden.bs.modal', function(e) {
                $('#createDailyReportModal').modal('hide');
                $('#create_daily_report_form')[0].reset();
                $('.details_summernote_create').summernote('code', '');
                resetCreateForm();
            });


            // create
            $('#create_daily_report_form').on('submit', function(e) {
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
                        if (data.data === 'added') {

                            $('#myTable').load(location.href + (' #myTable'));
                            $('#create_daily_report_form')[0].reset();
                            resetCreateForm();
                            $('.details_summernote_create').summernote('code', '');
                            $('#createDailyReportModal').modal('hide');

                            flasher.success("{!! __('general.add_success_message') !!}");
                        } else if (data.data == 'error') {
                            flasher.error("{!! __('general.add_error_message') !!}");
                        } else if (data.data == 'exists') {
                            flasher.error("{!! __('general.recored_exists') !!}");
                        }
                    },
                    error: function(reject) {
                        var response = $.parseJSON(reject.responseText);
                        $.each(response.errors, function(key, value) {
                            if (key == 'details') {
                                $('.details_summernote_create').next('.note-editor')
                                    .addClass(
                                        'is-invalid-summernote-editor');
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


        });
    </script>
@endpush
