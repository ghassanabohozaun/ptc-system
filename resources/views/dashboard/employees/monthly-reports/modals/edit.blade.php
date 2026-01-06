<div class="modal fade" id="updateSalaryModal" tabindex="-1" role="dialog" aria-labelledby="updateSalaryModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <form class="form" action="" method="POST" enctype="multipart/form-data" id='update_salary_form'>
            @csrf
            @method('PUT')
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title" id="updateSalaryModalLabel">{!! __('salaries.update_salary') !!}
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="month">{!! __('salaries.month') !!}</label>
                                        <input type="number" id="month_edit" name="month" class="form-control"
                                            autocomplete="off" placeholder="{!! __('salaries.enter_month') !!}" readonly>
                                        <span class="text text-danger">
                                            <strong id="month_error_edit"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->

                                <!-- begin: input -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="year">{!! __('salaries.year') !!}</label>
                                        <input type="number" id="year_edit" name="year" class="form-control"
                                            autocomplete="off" placeholder="{!! __('salaries.enter_year') !!}" readonly>
                                        <span class="text text-danger">
                                            <strong id="year_error_edit"></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end: input -->

                                <!-- begin: input -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="release_date">{!! __('salaries.release_date') !!}</label>
                                        <input type="date" id="release_date_edit" name="release_date"
                                            class="form-control" autocomplete="off"
                                            placeholder="{!! __('salaries.enter_release_date') !!}">
                                        <span class="text text-danger">
                                            <strong id="release_date_error_edit"></strong>
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
                                        <textarea rows="5" id="details_edit" name="details" class="form-control" autocomplete="off"
                                            placeholder="{!! __('salaries.enter_details') !!}"></textarea>
                                        <span class="text text-danger">
                                            <strong id="details_error_edit"></strong>
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
                                        <textarea rows="5" id="notes_edit" name="notes" class="form-control notes_summernote_edit" autocomplete="off"
                                            placeholder="{!! __('salaries.enter_notes') !!}"></textarea>
                                        <span class="text text-danger">
                                            <strong id="notes_error_edit"></strong>
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
                        <i class="la la-refresh spinner spinner_loading d-none">
                        </i>
                    </button>

                    <button type="button" id="cancel_salary_btn_edit" class="btn btn-light-dark font-weight-bold"
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
        // show edit modal
        $('body').on('click', '.edit_salary_button', function(e) {
            e.preventDefault();
            var salary_id = $(this).attr('salary-id');
            var salary_month = $(this).attr('salary-month');
            var salary_year = $(this).attr('salary-year');
            var salary_release_date = $(this).attr('salary-release-date');
            var salary_details = $(this).attr('salary-details');
            var salary_notes = $(this).attr('salary-notes');

            $('#id_edit').val(salary_id);
            $('#month_edit').val(salary_month);
            $('#year_edit').val(salary_year);
            $('#release_date_edit').val(salary_release_date);
            $('#details_edit').val(salary_details);
            $('.notes_summernote_edit').summernote('code', salary_notes);

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
            $('#month_edit').css('border-color', '');
            $('#year_edit').css('border-color', '');
            $('#release_date_edit').css('border-color', '');

            $('#month_error_edit').text('');
            $('#year_error_edit').text('');
            $('#release_date_error_edit').text('');
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
                        console.log(data);
                        $('#myTable').load(location.href + (' #myTable'));
                        resetEditForm();
                        $('#updateSalaryModal').modal('hide');
                        flasher.success("{!! __('general.add_success_message') !!}");
                    } else {
                        flasher.error("{!! __('general.add_error_message') !!}");
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
