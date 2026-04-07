<div class="query-bar-container mt-1">
    <div class="query-bar js-query-bar">
        <span class="query-bar-label">
            <i class="la la-filter"></i> {!! __('general.filters') !!}:
        </span>

        <form class="js-filter-form d-flex align-items-center gap-2" action="{{ route('dashboard.employeeContracts.index') }}" method="GET" data-container="#table_data" data-loader=".table-loader-overlay">
            
            <!-- Employee Search (Keyword) -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="emp_search_popover">
                    <i class="la la-user"></i>
                    <span class="chip-text">{!! __('employeeContracts.employee_name') !!}</span>
                </div>
                <div class="ptc-query-panel" id="emp_search_popover">
                    <div class="mb-3">
                        <label class="form-label fw-bold mb-2">{!! __('employeeContracts.employee_name') !!}</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword"
                                placeholder="{!! __('employeeContracts.search_placeholder_contract') !!}" 
                                value="{{ request('keyword') }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="popover-actions">
                        <button type="button" class="btn btn-primary btn-sm text-white js-apply-filter">
                            {!! __('general.apply') !!}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Salary Filter -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="salary_popover">
                    <i class="la la-dollar"></i>
                    <span class="chip-text">{!! __('employeeContracts.monthly_salary') !!}</span>
                </div>
                <div class="ptc-query-panel" id="salary_popover">
                    <div class="mb-3">
                        <label class="form-label fw-bold mb-2">{!! __('employeeContracts.monthly_salary') !!}</label>
                        <input type="number" name="monthly_salary" class="form-control" 
                               placeholder="{!! __('employeeContracts.enter_salary') !!}" 
                               value="{{ request('monthly_salary') }}">
                    </div>
                    <div class="popover-actions">
                        <button type="button" class="btn btn-primary btn-sm text-white js-apply-filter">
                            {!! __('general.apply') !!}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Start Date Filter -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="date_popover">
                    <i class="la la-calendar"></i>
                    <span class="chip-text">{!! __('employeeContracts.contract_start_date') !!}</span>
                </div>
                <div class="ptc-query-panel" id="date_popover">
                    <div class="mb-3">
                        <label class="form-label fw-bold mb-2">{!! __('employeeContracts.contract_start_date') !!}</label>
                        <input type="date" name="contract_start_date" class="form-control" 
                               value="{{ request('contract_start_date') }}">
                    </div>
                    <div class="popover-actions">
                        <button type="button" class="btn btn-primary btn-sm text-white js-apply-filter">
                            {!! __('general.apply') !!}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Reset Button -->
            <div class="filter-chip reset-chip js-reset-btn">
                <i class="la la-refresh"></i>
                <span>{!! __('general.reset') !!}</span>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script src="{!! asset('assets/dashbaord/vendors/js/forms/select/select2.full.min.js') !!}"></script>
    <script src="{!! asset('assets/dashbaord/js/filter-system.js') !!}"></script>
@endpush
