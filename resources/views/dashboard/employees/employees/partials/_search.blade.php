@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{!! asset('assets/dashbaord/vendors/select2/select2.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/dashbaord/css/filter.css') !!}">
@endpush

<div class="query-bar-container">
    <div class="query-bar js-query-bar">
        <span class="query-bar-label">
            <i class="mdi mdi-filter-variant"></i> {!! __('general.filters') !!}:
        </span>

        <form class="js-filter-form d-flex align-items-center gap-2">
            <!-- Keyword Search Chip -->
            <div class="filter-chip js-filter-chip" data-target="emp_search_popover">
                <i class="mdi mdi-account-search-outline"></i>
                <span class="chip-text">{!! __('employees.employees') !!}</span>
                <div class="filter-popover" id="emp_search_popover">
                    <div class="mb-3">
                        <label class="form-label fw-bold mb-2">{!! __('employees.employees') !!}</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword"
                                placeholder="{!! __('general.search') !!}...">
                        </div>
                    </div>
                    <div class="popover-actions">
                        <button type="button" class="btn btn-primary btn-sm text-white js-apply-filter">
                            {!! __('general.submit') !!}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Department Filter Chip -->
            <div class="filter-chip js-filter-chip" data-target="dept_popover">
                <i class="mdi mdi-office-building-outline"></i>
                <span class="chip-text">{!! __('employees.department_id') !!}</span>
                <div class="filter-popover" id="dept_popover">
                    <div class="mb-3">
                        <label class="form-label fw-bold mb-2">{!! __('employees.department_id') !!}</label>
                        <select class="form-control js-select2" name="department_id" style="width: 100%">
                            <option value="">{!! __('general.show_all') !!}</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="popover-actions">
                        <button type="button" class="btn btn-primary btn-sm text-white js-apply-filter">
                            {!! __('general.submit') !!}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Status Filter Chip -->
            <div class="filter-chip js-filter-chip" data-target="status_popover">
                <i class="mdi mdi-shield-check-outline"></i>
                <span class="chip-text">{!! __('employees.status_id') !!}</span>
                <div class="filter-popover" id="status_popover">
                    <div class="mb-3">
                        <label class="form-label fw-bold mb-2">{!! __('employees.status_id') !!}</label>
                        <select class="form-control js-select2" name="employee_status_id" style="width: 100%">
                            <option value="">{!! __('general.show_all') !!}</option>
                            @foreach ($employeeStatuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="popover-actions">
                        <button type="button" class="btn btn-primary btn-sm text-white js-apply-filter">
                            {!! __('general.submit') !!}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Reset Button -->
            <div class="filter-chip reset-chip js-reset-btn">
                <i class="mdi mdi-refresh"></i>
                <span>{!! __('general.reset') !!}</span>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script src="{!! asset('assets/dashbaord/vendors/select2/select2.min.js') !!}"></script>
    <script src="{!! asset('assets/dashbaord/js/filter-system.js') !!}"></script>
@endpush
