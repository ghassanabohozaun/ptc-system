<div class="modal fade" id="selectCloumnsModal" tabindex="-1" role="dialog" aria-labelledby="selectCloumnsModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <form class="form" action="{!! route('dashboard.reservations.export.excel') !!}" method="POST" enctype="multipart/form-data"
            id="excel_export_reservations_form">
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title" id="selectCloumnsModalLabel">{!! __('reservations.select_columns') !!}
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
                            <div class="form-body">
                                <div class="row mt-2">
                                    @foreach (Schema::getColumnListing('reservations') as $key => $value)
                                        <div class="col-md-3 mt-1">
                                            <fieldset class="checkboxsas">
                                                <label>
                                                    <input type="checkbox" value="{!! $value !!}"
                                                        name="columns[]" class="checkbox pt-2">
                                                    {!! __('reservations.' . $value) !!}
                                                </label>
                                            </fieldset>

                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <span class="text text-danger">
                                            <strong id="columns_error" style="font-size: 20px"> </strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end: form-->
                </div>
                <!--end::modal body-->

                <!--begin::modal footer-->
                <div class="modal-footer">
                    {{--
                    <a href="#" class="btn btn-sm btn-light mr-1" id="excel_btn">
                        <i class="la la-file-excel-o"></i> {!! __('general.excel') !!}
                    </a> --}}

                    <button type="submit" class="btn btn-info font-weight-bold ">
                        <i class="la la-file-excel-o"></i> {!! __('general.excel') !!}
                    </button>


                    <button type="button" id="cancel_admin_btn" class="btn btn-light-dark font-weight-bold"
                        data-dismiss="modal">
                        <span class="la la-close"></span>
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
        // // reset
        // function resetCreateForm() {
        //     $('#name_ar').css('border-color', '');
        //     $('#name_en').css('border-color', '');
        //     $('#email').css('border-color', '');
        //     $('#mobile').css('border-color', '');
        //     $('#password').css('border-color', '');
        //     $('#password_confirm').css('border-color', '');
        //     $('#role_id').css('border-color', '');
        //     $('#status').css('border-color', '');

        //     $('#name_ar_error').text('');
        //     $('#name_en_error').text('');
        //     $('#email_error').text('');
        //     $('#mobile_error').text('');
        //     $('#password_error').text('');
        //     $('#password_confirm_error').text('');
        //     $('#role_id_error').text('');
        //     $('#status_error').text('');
        // }

        // // cancel
        // $('body').on('click', '#cancel_admin_btn', function(e) {
        //     $('#createAdminModal').modal('hide');
        //     $('#create_admin_form')[0].reset();
        //     resetCreateForm();
        // });

        // // hide
        // $('#createAdminModal').on('hidden.bs.modal', function(e) {
        //     $('#createAdminModal').modal('hide');
        //     $('#create_admin_form')[0].reset();
        //     resetCreateForm();
        // });


        // create
        $('body').on('click', '#excel_btn', function(e) {
            e.preventDefault();
            // reset
            // resetCreateForm();


            // paramters
            // var data = new FormData(this);
            // var type = $(this).attr('method');
            // var url = $(this).attr('action');

            $.ajax({
                url: '{!! route('dashboard.reservations.export.excel') !!}', // Your Laravel route for exporting Excel
                method: 'GET', // Or 'POST' if you are sending data
                data: {
                    // ... (Any data you need to send to the server) ...
                },
                success: function(response) {
                    if (response.success) {
                        console.log('success');
                        const downloadLink = document.createElement('a');
                        downloadLink.href = response.filePath; // The URL to the stored Excel file
                        downloadLink.download = 'your_export_file.xlsx'; // Desired filename
                        document.body.appendChild(downloadLink);
                        downloadLink.click();
                        document.body.removeChild(downloadLink); // Clean up the temporary link
                    } else {
                        console.log('error');
                        console.error('Error exporting Excel:', response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', error);
                }
            });

            // $.ajax({
            //     url: url,
            //     data: data,
            //     type: type,
            //     dataType: 'json',
            //     cache: false,
            //     processData: false,
            //     contentType: false,
            //     beforeSend: function() {
            //         $('.spinner_loading').removeClass('d-none');
            //     },
            //     success: function(data) {
            //         console.log(data);
            //         if (data.status == true) {

            //             // $('#myTable').load(location.href + (' #myTable'));
            //             // $('#create_admin_form')[0].reset();
            //             // resetCreateForm();
            //             // $('#createAdminModal').modal('hide');
            //             // flasher.success("{!! __('general.add_success_message') !!}");
            //         } else {
            //             // flasher.error("{!! __('general.add_error_message') !!}");
            //         }
            //     },
            //     error: function(reject) {
            //         var response = $.parseJSON(reject.responseText);
            //         $.each(response.errors, function(key, value) {
            //             $('#' + key + '_error').text(value[0]);
            //             $('#' + key).css('border-color', '#F64E60');
            //         });
            //     }, //end error
            //     complete: function() {
            //         $('.spinner_loading').addClass('d-none');
            //     }
            // });

        });
    </script>
@endpush
