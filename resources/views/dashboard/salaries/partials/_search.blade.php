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
    <div class="card-content collapse ">
        <div class="card-body">
            <form class="form">
                <div class="form-body">
                    <div class="row">

                        <!-- begin: input -->
                        <div class="form-group col-md-3">
                            <label class="sr-only" for="month">{!! __('salaries.month') !!}</label>
                            <input type="text" class="form-control" placeholder="{!! __('salaries.enter_month') !!}"
                                id="month">
                        </div>
                        <!-- end: input -->

                        <!-- begin: input -->
                        <div class="form-group col-md-3">
                            <label class="sr-only" for="year">{!! __('salaries.year') !!}</label>
                            <input type="text" class="form-control" placeholder="{!! __('salaries.enter_year') !!}"
                                id="year">
                        </div>
                        <!-- end: input -->
                    </div>

                </div>

                <div class="form-actions" style="margin-top: -8px">
                    <button type="button" class="btn btn-sm btn-secondary mr-1" id="salaries_search_btn">
                        <i class="la la-search"></i> {!! __('general.search') !!}
                    </button>
                    <button type="submit" class="btn btn-sm btn-light-dark mr-1" id="salaries_reset_btn">
                        <i class="la la-close"></i> {!! __('general.reset') !!}
                    </button>
                </div>

            </form>

        </div>
    </div>
    <!-- end: card content -->

</div> <!-- end: card  -->
