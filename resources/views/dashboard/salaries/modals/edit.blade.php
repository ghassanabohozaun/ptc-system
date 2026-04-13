<div class="modal modal-pop fade" id="updateSalaryModal" tabindex="-1" role="dialog" aria-labelledby="updateSalaryModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <form class="form" action="" method="POST" enctype="multipart/form-data" id='update_salary_form'>
            @csrf
            @method('PUT')
            <div class="modal-content shadow-lg border-0 premium-modal-content-styled">
                <!--begin::modal header-->
                <div class="modal-header border-0 pb-0 pt-2 px-2 d-flex justify-content-between align-items-center">
                    <h5 class="modal-title font-weight-bold text-dark ml-1 mt-1" id="updateSalaryModalLabel">
                        <i class="la la-money-bill-wave text-indigo mr-1"></i> {!! __('salaries.update_salary') !!}
                    </h5>
                    <button type="button" class="close premium-close premium-close-button border-0 shadow-sm" data-dismiss="modal" aria-label="Close">
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

                                <!-- Month -->
                                <div class="col-md-6 mb-3">
                                    <div class="premium-form-group">
                                        <label class="premium-label font-weight-bold text-dark">{!! __('salaries.month') !!}</label>
                                        <div class="premium-input-wrapper shadow-none premium-readonly-wrapper">
                                            <input type="month" id="month_edit" name="month" readonly class="premium-input bg-transparent border-0 font-weight-bold">
                                            <i class="la la-calendar-alt"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Release Date -->
                                <div class="col-md-6 mb-3">
                                    <div class="premium-form-group">
                                        <label class="premium-label font-weight-bold text-dark">{!! __('salaries.release_date') !!}</label>
                                        <div class="premium-input-wrapper">
                                            <input type="text" id="release_date_edit" name="release_date"
                                                class="form-control premium-input shadow-none js-datepicker" autocomplete="off"
                                                placeholder="{!! __('salaries.enter_release_date') !!}">
                                            <i class="la la-calendar-check"></i>
                                        </div>
                                        <span class="text text-danger small"><strong id="release_date_error_edit"></strong></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Details -->
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="premium-form-group">
                                        <label class="premium-label font-weight-bold text-dark">{!! __('salaries.details') !!}</label>
                                        <div class="premium-input-wrapper align-items-start pt-2">
                                            <textarea rows="3" id="details_edit" name="details" class="form-control premium-input shadow-none premium-textarea-md border-0" 
                                                placeholder="{!! __('salaries.enter_details') !!}"></textarea>
                                            <i class="la la-file-alt mt-2"></i>
                                        </div>
                                        <span class="text text-danger small"><strong id="details_error_edit"></strong></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Notes -->
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="premium-form-group">
                                        <label class="premium-label font-weight-bold text-dark">{!! __('salaries.notes') !!}</label>
                                        <div class="premium-summernote-wrapper">
                                            <textarea id="notes_edit" name="notes" class="form-control notes_summernote_edit"></textarea>
                                        </div>
                                        <span class="text text-danger small"><strong id="notes_error_edit"></strong></span>
                                    </div>
                                </div>
                            </div>
                            <!-- end: row -->

                        </div>
                    </div>
                    <!--end: form-->
                </div>
                <!--end::modal body-->

                <!--begin::modal footer-->
                <div class="modal-footer border-0 pt-0 pb-2">
                    <button type="button" id="cancel_salary_btn_edit" class="btn btn-light-dark px-3 font-weight-bold" data-dismiss="modal">
                        <i class="la la-times mr-1"></i> {{ __('general.cancel') }}
                    </button>

                    <button type="submit" class="btn btn-premium-add px-4 font-weight-bold ">
                        <i class="la la-save mr-1"></i> {{ __('general.save') }}
                        <i class="la la-refresh la-spin spinner_loading d-none ml-1"></i>
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
        $('body').on('click', '.edit_salary_button', function(e) {
            e.preventDefault();
            var salary_id = $(this).attr('data-id');
            var salary_month = $(this).attr('data-month');
            var salary_year = $(this).attr('data-year');
            
            // Format month for <input type="month"> (expects YYYY-MM)
            var monthVal = parseInt(salary_month);
            var formattedMonth = salary_year + '-' + (monthVal < 10 ? '0' + monthVal : monthVal);
            
            var salary_release_date = $(this).attr('data-release-date');
            var salary_details = $(this).attr('data-details');
            var salary_notes = $(this).attr('data-notes');

            $('#id_edit').val(salary_id);
            $('#month_edit').val(formattedMonth);
            $('#release_date_edit').val(salary_release_date);
            $('#details_edit').val(salary_details);
            $('.notes_summernote_edit').summernote('code', salary_notes);

            // Re-init datepicker for the dynamic field
            if (typeof $.fn.datepicker === "function") {
                $('.js-datepicker').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true,
                    rtl: $('html').attr('data-textdirection') === 'rtl'
                });
            }

            $('#updateSalaryModal').modal('show');
        })


        // notes  summernote
        $('.notes_summernote_edit').summernote({
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
        function resetEditForm() {
            $('#release_date_edit').css('border-color', '');
            $('#release_date_error_edit').text('');
            $('#details_error_edit').text('');
            $('#notes_error_edit').text('');
        }

        // cancel
        $('body').on('click', '#cancel_salary_btn_edit', function(e) {
            $('#updateSalaryModal').modal('hide');
            $('#update_salary_form')[0].reset();
            resetEditForm();
        });

        // hide
        $('#updateSalaryModal').on('hidden.bs.modal', function(e) {
            $('#updateSalaryModal').modal('hide');
            $('#update_salary_form')[0].reset();
            resetEditForm();
        });


        // update
        $('#update_salary_form').on('submit', function(e) {
            e.preventDefault();
            // reset
            resetEditForm();

            // paramters
            var salary_id = $('#id_edit').val();
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = "{!! route('dashboard.salaries.update', 'id') !!}".replace('id', salary_id);

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
                        if (typeof fetch_data === 'function') {
                            fetch_data();
                        }
                        resetEditForm();
                        $('#updateSalaryModal').modal('hide');
                        flasher.success("{!! __('general.update_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.update_error_message') !!}");
                    }
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, value) {
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




