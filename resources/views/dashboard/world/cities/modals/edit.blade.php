<div class="modal fade" id="updateCityModal" tabindex="-1" role="dialog" aria-labelledby="updateCityModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <form class="form" action="" method="POST" enctype="multipart/form-data" id='update_city_form'>
            @csrf
            @method('PUT')
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title" id="updateCityModalLabel">{!! __('world.update_city') !!}
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">{!! __('world.city_name_ar') !!}</label>
                                        <input type="text" id="name_ar_edit" name="name[ar]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('world.enter_city_name_ar') !!}">
                                        <span class="text text-danger">
                                            <strong id="name_ar_error_edit"></strong>
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
                                        <label for="name">{!! __('world.city_name_en') !!}</label>
                                        <input type="text" id="name_en_edit" name="name[en]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('world.enter_city_name_en') !!}">
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
                                        <label for="governorate_id">{!! __('world.governorate_id') !!}</label>
                                        <select class="form-control" id='governorate_id_edit' name="governorate_id">
                                            <option value="" selected="">
                                                {!! __('general.select_from_list') !!}</option>
                                            @foreach ($governorates as $governorate)
                                                <option value="{!! $governorate->id !!}">
                                                    {!! $governorate->name !!}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text text-danger">
                                            <strong id="governorate_id_error_edit"></strong>
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
                    <button type="submit" id="create_city_btn" class="btn btn-info font-weight-bold ">
                        {{ __('general.save') }}
                        <i class="la la-refresh spinner spinner_loading d-none">
                        </i>
                    </button>

                    <button type="button" id="cancel_city_btn" class="btn btn-light-dark font-weight-bold"
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
        $('body').on('click', '.edit_city_button', function(e) {
            e.preventDefault();
            var city_id = $(this).attr('city-id');
            var city_name_ar = $(this).attr('city-name-ar');
            var city_name_en = $(this).attr('city-name-en');
            var governorate_id = $(this).attr('governorate-id');

            $('#id_edit').val(city_id);
            $('#name_ar_edit').val(city_name_ar);
            $('#name_en_edit').val(city_name_en);
            $('#governorate_id_edit').val(governorate_id);

            $('#updateCityModal').modal('show');
        })

        // reset
        function resetEditForm() {
            $('#name_ar_edit').css('border-color', '');
            $('#name_en_edit').css('border-color', '');
            $('#governorate_id_edit').css('border-color', '');

            $('#name_ar_error_edit').text('');
            $('#name_en_error_edit').text('');
            $('#governorate_id_error_edit').text('');
        }

        // cancel
        $('body').on('click', '#cancel_city_btn', function(e) {
            $('#updateCityModal').modal('hide');
            $('#update_city_form')[0].reset();
            resetEditForm();
        });

        // hide
        $('#updateCityModal').on('hidden.bs.modal', function(e) {
            $('#updateCityModal').modal('hide');
            $('#update_city_form')[0].reset();
            resetEditForm();
        });


        // update
        $('#update_city_form').on('submit', function(e) {
            e.preventDefault();
            // reset
            resetEditForm();

            // paramters
            var city_id = $('#id_edit').val();
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = "{!! route('dashboard.cities.update', 'id') !!}".replace('id', city_id);

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
                        $('#update_city_form')[0].reset();
                        resetEditForm();
                        $('#updateCityModal').modal('hide');
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
