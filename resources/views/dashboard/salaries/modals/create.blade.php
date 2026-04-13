<div class="modal modal-pop fade" id="createSalaryModal" tabindex="-1" role="dialog" aria-labelledby="createSalaryModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <form class="form" action="{!! route('dashboard.salaries.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_salary_form'>
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title" id="createSalaryModalLabel">{!! __('salaries.create_new_salary') !!}
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
                                <div class="col-md-6">
                                    <div class="form-group pb-1">
                                        <label for="month" class="font-weight-bold text-dark">{!! __('salaries.month') !!}</label>
                                        <div class="premium-input-wrapper">
                                            <input type="text" id="month" name="month" class="form-control premium-input shadow-none ptc-monthpicker"
                                                autocomplete="off" placeholder="{!! __('salaries.enter_month') !!}">
                                            <i class="la la-calendar text-indigo"></i>
                                        </div>
                                        <span class="text text-danger small">
                                            <strong id="month_error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->

                                <!-- begin: input -->
                                <div class="col-md-6">
                                    <div class="form-group pb-1">
                                        <label for="release_date" class="font-weight-bold text-dark">{!! __('salaries.release_date') !!}</label>
                                        <div class="premium-input-wrapper">
                                            <input type="text" id="release_date" name="release_date" class="form-control premium-input shadow-none ptc-datepicker"
                                                autocomplete="off" placeholder="{!! __('salaries.enter_release_date') !!}">
                                            <i class="la la-calendar-check text-indigo"></i>
                                        </div>
                                        <span class="text text-danger small">
                                            <strong id="release_date_error"></strong>
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
                                        <label for="details">{!! __('salaries.details') !!}</label>
                                        <textarea rows="5" id="details" name="details" class="form-control" autocomplete="off"
                                            placeholder="{!! __('salaries.enter_details') !!}"></textarea>
                                        <span class="text text-danger">
                                            <strong id="details_error"></strong>
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
                                        <label for="notes">{!! __('salaries.notes') !!}</label>
                                        <textarea rows="5" id="notes" name="notes" class="form-control notes_summernote" autocomplete="off"
                                            placeholder="{!! __('salaries.enter_notes') !!}"></textarea>
                                        <span class="text text-danger">
                                            <strong id="notes_error"></strong>
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
                        <i class="ft-refresh-cw spinner spinner_loading d-none">
                        </i>
                    </button>

                    <button type="button" id="cancel_salary_btn" class="btn btn-light-dark font-weight-bold"
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
        // Initialization of date and month pickers is now handled globally via datepicker-initializer.js.
        // No local initialization required here as standardized classes are auto-detected.

        // notes  summernote
        $('.notes_summernote').summernote({
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
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        // reset
        function resetCreateForm() {
            $('#month').css('border-color', '');
            $('#release_date').css('border-color', '');

            $('#month_error').text('');
            $('#release_date_error').text('');
            $('#details_error').text('');
            $('#notes_error').text('');
        }

        // cancel
        $('body').on('click', '#cancel_salary_btn', function(e) {
            $('#createSalaryModal').modal('hide');
            $('#create_salary_form')[0].reset();
            resetCreateForm();
        });

        // hide
        $('#createSalaryModal').on('hidden.bs.modal', function(e) {
            $('#createSalaryModal').modal('hide');
            $('#create_salary_form')[0].reset();
            resetCreateForm();
        });


        // create
        $('#create_salary_form').on('submit', function(e) {
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
                    if (data.status == 'added') {
                        if (typeof fetch_data === 'function') {
                            fetch_data();
                        }
                        $('#create_salary_form')[0].reset();
                        $('.notes_summernote').summernote('code', '');
                        resetCreateForm();
                        $('#createSalaryModal').modal('hide');
                        flasher.success("{!! __('general.add_success_message') !!}");

                    } else if (data.status == 'error') {
                        flasher.error("{!! __('general.add_error_message') !!}");
                    } else if (data.status == 'exists') {
                        flasher.error("{!! __('general.recored_exists') !!}");
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




