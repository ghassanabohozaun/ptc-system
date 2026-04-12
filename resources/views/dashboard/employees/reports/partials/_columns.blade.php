<div class="card">
    <div class="card-header premium-card-header-alt">
        <h4 class="card-title">
            <i class="la la-columns text-info"></i> {!! __('general.select_columns') !!}
        </h4>
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

            <!-- Control Buttons -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <button type="button" class="btn btn-info btn-glow btn-bulk-select mr-1 radius-12" id="select_all_columns">
                        <i class="la la-check-square"></i> {!! __('general.select_all') !!}
                    </button>
                    <button type="button" class="btn btn-outline-danger btn-bulk-select radius-12" id="deselect_all_columns">
                        <i class="la la-square-o"></i> {!! __('general.deselect_all') !!}
                    </button>
                </div>
            </div>

            <!-- Employee Columns -->
            <div class="row">
                <div class="col-md-12">
                    <h5 class="premium-section-title premium-section-title-blue">
                        <i class="la la-user text-primary"></i> {!! __('employees.basic') !!}
                    </h5>
                </div>
                @foreach ($employeeColumnNames as $column)
                    <div class="col-md-3 mb-1">
                        <div class="premium-switch-box">
                            <span class="premium-switch-label">{!! __('employees.' . $column) !!}</span>
                            <label class="modern-switch">
                                <input type="checkbox" name="columns[]" value="{{ $column }}"
                                    id="column_{{ $column }}">
                                <span class="modern-slider"></span>
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>

            <hr class="my-3">

            <!-- Job Details Columns -->
            <div class="row">
                <div class="col-md-12">
                    <h5 class="premium-section-title premium-section-title-green">
                        <i class="la la-briefcase text-success"></i> {!! __('employees.job_details') !!}
                    </h5>
                </div>
                @foreach ($jobDetailsColumnNames as $column)
                    <div class="col-md-3 mb-1">
                        <div class="premium-switch-box">
                            <span class="premium-switch-label">{!! __('employees.' . $column) !!}</span>
                            <label class="modern-switch">
                                <input type="checkbox" name="columns[]" value="{{ $column }}"
                                    id="column_{{ $column }}">
                                <span class="modern-slider"></span>
                            </label>
                        </div>
                    </div>
                @endforeach
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
