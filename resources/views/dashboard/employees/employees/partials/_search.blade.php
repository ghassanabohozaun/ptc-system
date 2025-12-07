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


                        <!-- begin: full name arabic -->
                        @if (Lang() == 'ar')
                            <!-- begin: input -->
                            <div class="form-group col-md-3">
                                <label class="sr-only" for="first_name_ar">{!! __('employees.first_name_ar') !!}</label>
                                <input type="text" class="form-control" placeholder="{!! __('employees.enter_first_name_ar') !!}"
                                    id="first_name_ar">
                            </div>
                            <!-- end: input -->

                            <!-- begin: input -->
                            <div class="form-group col-md-3">
                                <label class="sr-only" for="father_name_ar">{!! __('employees.father_name_ar') !!}</label>
                                <input type="text" class="form-control" placeholder="{!! __('employees.enter_father_name_ar') !!}"
                                    id="father_name_ar">
                            </div>
                            <!-- end: input -->


                            <!-- begin: input -->
                            <div class="form-group col-md-3">
                                <label class="sr-only" for="grand_father_name_ar">{!! __('employees.grand_father_name_ar') !!}</label>
                                <input type="text" class="form-control" placeholder="{!! __('employees.enter_grand_father_name_ar') !!}"
                                    id="grand_father_name_ar">
                            </div>
                            <!-- end: input -->


                            <!-- begin: input -->
                            <div class="form-group col-md-3">
                                <label class="sr-only" for="family_name_ar">{!! __('employees.family_name_ar') !!}</label>
                                <input type="text" class="form-control" placeholder="{!! __('employees.enter_family_name_ar') !!}"
                                    id="family_name_ar">
                            </div>
                            <!-- end: input -->

                            <!-- end: full name arabic -->
                        @else
                            <!-- begin: full name english -->

                            <!-- begin: input -->
                            <div class="form-group col-md-3">
                                <label class="sr-only" for="first_name_en">{!! __('employees.first_name_en') !!}</label>
                                <input type="text" class="form-control" placeholder="{!! __('employees.enter_first_name_en') !!}"
                                    id="first_name_en">
                            </div>
                            <!-- end: input -->

                            <!-- begin: input -->
                            <div class="form-group col-md-3">
                                <label class="sr-only" for="father_name_en">{!! __('employees.father_name_en') !!}</label>
                                <input type="text" class="form-control" placeholder="{!! __('employees.enter_father_name_en') !!}"
                                    id="father_name_en">
                            </div>
                            <!-- end: input -->


                            <!-- begin: input -->
                            <div class="form-group col-md-3">
                                <label class="sr-only" for="grand_father_name_en">{!! __('employees.grand_father_name_en') !!}</label>
                                <input type="text" class="form-control" placeholder="{!! __('employees.enter_grand_father_name_en') !!}"
                                    id="grand_father_name_en">
                            </div>
                            <!-- end: input -->

                            <!-- begin: input -->
                            <div class="form-group col-md-3">
                                <label class="sr-only" for="family_name_en">{!! __('employees.family_name_en') !!}</label>
                                <input type="text" class="form-control" placeholder="{!! __('employees.enter_family_name_en') !!}"
                                    id="family_name_en">
                            </div>
                            <!-- end: input -->

                            <!-- end: full name english -->
                        @endif

                        <!-- begin: input -->
                        <div class="form-group col-md-3">
                            <label class="sr-only" for="personal_id">{!! __('employees.personal_id') !!}</label>
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

    <script>
        // search
        $('body').on('click', '#employee_search_btn', function(e) {

            e.preventDefault();
            var personal_id = $('#personal_id').val();
            var first_name_en = $('#first_name_en').val();
            var father_name_en = $('#father_name_en').val();
            var grand_father_name_en = $('#grand_father_name_en').val();
            var family_name_en = $('#family_name_en').val();

            var first_name_ar = $('#first_name_ar').val();
            var father_name_ar = $('#father_name_ar').val();
            var grand_father_name_ar = $('#grand_father_name_ar').val();
            var family_name_ar = $('#family_name_ar').val();

            loadData(
                personal_id,
                first_name_en,
                father_name_en,
                grand_father_name_en,
                family_name_en,
                first_name_ar,
                father_name_ar,
                grand_father_name_ar,
                family_name_ar,
            );

        })


        // reset
        $('body').on('click', '#employee_reset_btn', function(e) {
            e.preventDefault();

            $('#personal_id').val('');
            $('#first_name_en').val('');
            $('#father_name_en').val('');
            $('#grand_father_name_en').val('');
            $('#family_name_en').val('');

            $('#first_name_ar').val('');
            $('#father_name_ar').val('');
            $('#grand_father_name_ar').val('');
            $('#family_name_ar').val('');

            loadData();
        });
    </script>
@endpush
