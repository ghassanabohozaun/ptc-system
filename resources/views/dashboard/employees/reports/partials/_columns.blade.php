<div class="card">
    <div class="card-header">
        <h4 class="card-title">{!! __('general.select_columns') !!}</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
            </ul>
        </div>
    </div>

    <div class="card-content collapse show">
        <div class="card-body">

            <!-- Employee Columns -->
            <div class="row">
                <div class="col-md-12">
                    <h5 class="mb-2">{!! __('employees.basic') !!}</h5>
                </div>
                @foreach ($employeeColumnNames as $column)
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="columns[]" value="{{ $column }}"
                                id="column_{{ $column }}">
                            <label class="form-check-label" for="column_{{ $column }}">
                                {!! __('employees.' . $column) !!}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>

            <hr class="my-3">

            <!-- Job Details Columns -->
            <div class="row">
                <div class="col-md-12">
                    <h5 class="mb-2">{!! __('employees.job_details') !!}</h5>
                </div>
                @foreach ($jobDetailsColumnNames as $column)
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="columns[]" value="{{ $column }}"
                                id="column_{{ $column }}">
                            <label class="form-check-label" for="column_{{ $column }}">
                                {!! __('employees.' . $column) !!}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <button type="button" class="btn btn-sm btn-info" id="select_all_columns">
                        <i class="la la-check-square"></i> {!! __('general.select_all') !!}
                    </button>
                    <button type="button" class="btn btn-sm btn-warning" id="deselect_all_columns">
                        <i class="la la-square-o"></i> {!! __('general.deselect_all') !!}
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

@push('scripts')
    <script>
        // Select all columns
        $('#select_all_columns').on('click', function() {
            $('input[name="columns[]"]').prop('checked', true);
        });

        // Deselect all columns
        $('#deselect_all_columns').on('click', function() {
            $('input[name="columns[]"]').prop('checked', false);
        });
    </script>
@endpush
