<div class="card">
    <!-- begin: card header -->
    <div class="card-header">
        <h4 class="card-title" id="basic-layout-colored-form-control">
            {!! __('reservations.columns') !!}
        </h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload-form"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
        </div>
    </div>
    <!-- end: card header -->

    <!-- begin: card content -->
    <div class="card-content collapse show">
        <div class="card-body">
            <!--begin::form-->


            <!--begin: form-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-body">
                        <div class="row mt-2">
                            @foreach ($filteredColumnNames as $key => $value)
                                <div class="col-md-3 mt-1">
                                    <fieldset class="checkboxsas">
                                        <label>
                                            <input type="checkbox" value="{!! $value !!}" name="columns[]"
                                                class="checkbox pt-2">
                                            {!! __('reservations.' . $value) !!}
                                        </label>
                                    </fieldset>

                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span class="text text-danger">
                                    <strong id="columns_error" style="font-size: 20px">
                                    </strong>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end: form-->


            <!--end: form-->
        </div>
        <!--end::table-->
    </div>
    <!-- end: card content -->
</div>
