<div class="modal fade" id="createCityModal" tabindex="-1" role="dialog" aria-labelledby="createCityModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-md" role="document">
        <form class="form" action="{!! route('dashboard.cities.store') !!}" method="POST" enctype="multipart/form-data"
            id='create_city_form'>
            @csrf
            <div class="modal-content">

                <!--begin::modal header-->
                <div class="modal-header">
                    <h5 class="modal-title" id="createCityModalLabel">{!! __('world.create_new_city') !!}
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
                                        <label for="name">{!! __('world.city_name_ar') !!}</label>
                                        <input type="text" id="name_ar" name="name[ar]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('world.enter_city_name_ar') !!}">
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
                                        <label for="name">{!! __('world.city_name_en') !!}</label>
                                        <input type="text" id="name_en" name="name[en]" class="form-control"
                                            autocomplete="off" placeholder="{!! __('world.enter_city_name_en') !!}">
                                        <span class="text text-danger">
                                            <strong id="name_en_error"></strong>
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
                                        <select class="form-control" id='governorate_id' name="governorate_id">
                                            <option value="" selected="">
                                                {!! __('general.select_from_list') !!}</option>
                                            @foreach ($governorates as $governorate)
                                                <option value="{!! $governorate->id !!}" {!! old('governorate_id') == $governorate->id ? 'selected' : '' !!}>
                                                    {!! $governorate->name !!}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text text-danger">
                                            <strong id="governorate_id_error"></strong>
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
        // reset
        function resetCreateForm() {
            $('#name_ar').css('border-color', '');
            $('#name_en').css('border-color', '');
            $('#governorate_id').css('border-color', '');

            $('#name_ar_error').text('');
            $('#name_en_error').text('');
            $('#governorate_id_error').text('');

        }

        // cancel
        $('body').on('click', '#cancel_city_btn', function(e) {
            $('#createCityModal').modal('hide');
            $('#create_city_form')[0].reset();
            resetCreateForm();
        });

        // hide
        $('#createCityModal').on('hidden.bs.modal', function(e) {
            $('#createCityModal').modal('hide');
            $('#create_city_form')[0].reset();
            resetCreateForm();
        });


        // create
        $('#create_city_form').on('submit', function(e) {
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
                    if (data.status == true) {
                        console.log(data);
                        $('#myTable').load(location.href + (' #myTable'));
                        $('#create_city_form')[0].reset();
                        resetCreateForm();
                        $('#createCityModal').modal('hide');
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
