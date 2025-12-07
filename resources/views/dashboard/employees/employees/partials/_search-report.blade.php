@push('style')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/vendors/css/forms/selects/select2.min.css') !!}">
    @if (Lang() == 'ar')
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/dashbaord/css-rtl/my-select2-style.css') !!}">
    @endif
@endpush

<div class="card">
    <!-- begin: card header -->
    <div class="card-header">
        <h4 class="card-title" id="basic-layout-colored-form-control">
            {!! __('general.filters') !!}
        </h4>
        <a class="heading-elements" data-action="collapse"><i class="ft-minus"></i></a>
    </div>
    <!-- end: card header -->

    <!-- begin: card content  show-->
    <div class="card-content collapse  show">
        <div class="card-body">
            <form class="form">
                <div class="form-body">

                    <div class="row">

                        <!-- begin: input  class="sr-only"-->
                        <div class="form-group col-md-3">
                            <label for="flight_id">{!! __('reservations.flight_id') !!}</label>
                            <select id="flight_id" name="flight_id" class="form-control">
                                <option value="" selected='selected'>
                                    {!! __('general.select_from_list') !!}
                                </option>
                                @foreach ($flights as $key => $flight)
                                    <option value="{!! $flight->id !!}">
                                        {!! $flight->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- end: input -->

                        <!-- begin: input -->
                        <div class="form-group col-md-3">
                            <label for="service">{!! __('reservations.service') !!}</label>
                            <select id="service" name="service" class="form-control">
                                <option value="" selected='selected'>
                                    {!! __('general.select_from_list') !!}
                                </option>
                                <option value="flight">{!! __('reservations.flight') !!}
                                </option>
                                <option value="tour">{!! __('reservations.tour') !!}
                                </option>
                                <option value="ticket">{!! __('reservations.ticket') !!}
                                </option>
                            </select>
                        </div>
                        <!-- end: input -->

                        <!-- begin: input -->
                        <div class="form-group col-md-3">
                            <label for="ticket_id">{!! __('reservations.ticket_id') !!}</label>
                            <select id="ticket_id" name="ticket_id" class="form-control">
                                <option value="" selected='selected'>
                                    {!! __('general.select_from_list') !!}
                                </option>
                                @foreach ($tickets as $key => $ticket)
                                    <option value="{!! $ticket->id !!}">
                                        {!! $ticket->title !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- end: input -->



                        <!-- begin: input -->
                        <div class="form-group col-md-3">
                            <label for="economy_class_type">{!! __('reservations.economy_class_type') !!}</label>
                            <select id="economy_class_type" name="economy_class_type" class="form-control">
                                <option value="" selected='selected'>
                                    {!! __('general.select_from_list') !!}
                                </option>
                                <option value="transit">{!! __('reservations.transit') !!}
                                </option>
                                <option value="direct_flight">{!! __('reservations.direct_flight') !!}
                                </option>
                            </select>
                        </div>
                        <!-- end: input -->

                        <!-- begin: input -->
                        <div class="form-group col-md-3">
                            <label for="depature_country_id">{!! __('reservations.depature_country_id') !!}</label>
                            <br />
                            <select class="depature_country_id_select form-control" id="depature_country_id"
                                name="depature_country_id" style="width: 100%">
                            </select>
                        </div>
                        <!-- end: input -->


                        <!-- begin: input -->
                        <div class="form-group col-md-3">
                            <label for="created_at">{!! __('reservations.created_at') !!}</label>
                            <input type="date" id="created_at" name="created_at" class="form-control"
                                autocomplete="off" placeholder="{!! __('reservations.created_at') !!}">
                        </div>
                        <!-- end: input -->


                        <!-- begin: input -->
                        <div class="form-group col-md-3">
                            <label for="depature_date">{!! __('reservations.depature_date') !!}</label>
                            <input type="date" id="depature_date" name="depature_date" class="form-control"
                                autocomplete="off" placeholder="{!! __('reservations.enter_depature_date') !!}">
                        </div>
                        <!-- end: input -->


                        <!-- begin: input -->
                        <div class="form-group col-md-3">
                            <label for="return_date">{!! __('reservations.return_date') !!}</label>
                            <input type="date" id="return_date" name="return_date" class="form-control"
                                autocomplete="off" placeholder="{!! __('reservations.enter_return_date') !!}">
                        </div>
                        <!-- end: input -->


                        {{-- <!-- begin: input -->
                        <div class="form-group col-md-2">
                            <label for="status">{!! __('tickets.status') !!}</label>
                            <select class="form-control" id="status" name="status">
                                <option value="">{!! __('general.select_from_list') !!}</option>
                                <option value="1">{!! __('general.enable') !!}</option>
                                <option value="0">{!! __('general.disabled') !!}</option>
                            </select>
                        </div>
                        <!-- end: input --> --}}
                    </div>

                </div>

            </form>
        </div>
    </div>
    <!-- end: card content -->

</div> <!-- end: card  -->
@push('scripts')
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>

    <script>
        // select 2 language
        var select2Language = {
            inputTooShort: function() {
                return "{!! __('general.inputTooShort') !!}";
            },
            inputTooLong: function() {
                return "{!! __('general.inputTooLong') !!}";
            },
            errorLoading: function() {
                return "{!! __('general.errorLoading') !!}";
            },
            noResults: function() {
                return "<span>{!! __('general.noResults2') !!}";
            },
            searching: function() {
                return " {!! __('general.searching') !!}";
            }
        };


        // select 2
        var countryPath = "{{ route('dashboard.countries.autocomplete.country') }}";
        $(".depature_country_id_select").select2({
            minimumInputLength: 1,
            maximumInputLength: 20,
            placeholder: '{!! __('general.select_from_list') !!}',
            allowClear: true,
            escapeMarkup: function(markup) {
                return markup;
            },

            language: select2Language,

            ajax: {
                url: countryPath,
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    console.log(data);
                    return {
                        results: $.map(data, function(item) {
                            if ('{!! Lang() !!}' === 'en') {
                                return {
                                    text: item.country_en,
                                    id: item.id
                                }
                            } else {
                                return {
                                    text: item.country_ar,
                                    id: item.id
                                }
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
@endpush
