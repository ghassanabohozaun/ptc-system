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
    <div class="card-content collapse  hide">
        <div class="card-body">
            <form class="form">
                <div class="form-body">

                    <div class="row">


                        <!-- begin: input -->
                        <div class="form-group col-md-3">
                            <label for="employee_id">{!! __('dailyReports.employee_id') !!}</label>
                            <select class="employee_id_select form-control" id="employee_id" name="employee_id"
                                style="width: 100%">
                            </select>
                        </div>
                        <!-- end: input -->

                        <!-- begin: input -->
                        <div class="form-group col-md-3">
                            <label for="personal_id">{!! __('employees.personal_id') !!}</label>
                            <input type="text" class="form-control" placeholder="{!! __('employees.personal_id') !!}"
                                id="personal_id">
                        </div>
                        <!-- end: input -->


                    </div>
                    <div class="form-actions" style="margin-top: -8px">
                        <button type="button" class="btn btn-sm btn-secondary mr-1" id="employee_search_btn">
                            <i class="la la-search"></i> {!! __('general.search') !!}
                        </button>
                        <button type="submit" class="btn btn-sm btn-light-dark mr-1" id="employee_reset_btn">
                            <i class="la la-close"></i> {!! __('general.reset') !!}
                        </button>
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

    <script type="text/javascript">
        // select 2
        var employeePath = "{{ route('dashboard.employees.autocomplete.employee') }}";

        $(".employee_id_select").select2({
            minimumInputLength: 1,
            maximumInputLength: 20,
            placeholder: '{!! __('general.select_from_list') !!}',
            allowClear: true,
            escapeMarkup: function(markup) {
                return markup;
            },
            language: {
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
            },

            ajax: {
                url: employeePath,
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    console.log(data);
                    return {
                        results: $.map(data, function(item) {
                            if ('{!! Lang() !!}' === 'en') {
                                return {
                                    text: item.employee_en,
                                    id: item.id
                                }
                            } else {
                                return {
                                    text: item.employee_ar,
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
