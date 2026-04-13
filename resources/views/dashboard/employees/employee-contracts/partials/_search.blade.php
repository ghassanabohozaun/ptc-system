<div class="query-bar-container">
    <div class="query-bar js-query-bar">
        <span class="query-bar-label">
            <i class="la la-filter text-indigo"></i> {!! __('general.filters') !!}:
        </span>

        <form class="js-filter-form d-flex align-items-center gap-2"
            action="{{ route('dashboard.employeeContracts.index') }}" method="GET" data-container="#table_data"
            data-loader=".table-loader-overlay">

            <!-- Employee Search (Keyword) -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="emp_search_popover">
                    <i class="la la-user text-indigo"></i>
                    <span class="chip-text">{!! __('employeeContracts.employee_name') !!}</span>
                    <span
                        class="badge badge-primary badge-pill badge-glow ml-1 premium-badge-pill-md">{!! $employeeContracts->total() !!}</span>
                </div>
                <div class="ptc-query-panel shadow-lg border-0 premium-popover-panel" id="emp_search_popover">
                    <div class="mb-3 text-left">
                        <label class="premium-label mb-2 font-weight-bold text-dark">{!! __('employeeContracts.employee_name') !!}</label>
                        <div class="premium-input-wrapper">
                            <input type="text" class="form-control premium-input shadow-none" name="keyword"
                                placeholder="{!! __('employeeContracts.search_placeholder_contract') !!}..." value="{{ request('keyword') }}"
                                autocomplete="off">
                            <i class="la la-search text-indigo"></i>
                        </div>
                    </div>
                    <div class="popover-actions mt-4 text-right">
                        <button type="button" class="btn btn-premium-blue btn-sm js-apply-filter px-4">
                            <i class="la la-check-circle mr-1"></i> {!! __('general.apply') !!}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Salary Filter -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="salary_popover">
                    <i class="la la-dollar text-indigo"></i>
                    <span class="chip-text">{!! __('employeeContracts.monthly_salary') !!}</span>
                </div>
                <div class="ptc-query-panel shadow-lg border-0 premium-popover-panel min-w-250" id="salary_popover">
                    <div class="mb-3 text-left">
                        <label class="premium-label mb-2 font-weight-bold text-dark">{!! __('employeeContracts.monthly_salary') !!}</label>
                        <div class="premium-input-wrapper">
                            <input type="number" name="monthly_salary" class="form-control premium-input shadow-none"
                                placeholder="{!! __('employeeContracts.enter_salary') !!}..." value="{{ request('monthly_salary') }}">
                            <i class="la la-dollar text-indigo"></i>
                        </div>
                    </div>
                    <div class="popover-actions mt-4 text-right">
                        <button type="button" class="btn btn-premium-blue btn-sm js-apply-filter px-4">
                            <i class="la la-check-circle mr-1"></i> {!! __('general.apply') !!}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Start Date Filter -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="date_popover">
                    <i class="la la-calendar text-indigo"></i>
                    <span class="chip-text">{!! __('employeeContracts.contract_start_date') !!}</span>
                </div>
                <div class="ptc-query-panel shadow-lg border-0 premium-popover-panel" id="date_popover">
                    <div class="mb-3 text-left">
                        <label class="premium-label mb-2 font-weight-bold text-dark">{!! __('employeeContracts.contract_start_date') !!}</label>
                        <div class="premium-input-wrapper">
                            <input type="text" name="contract_start_date"
                                class="form-control premium-input shadow-none ptc-datepicker"
                                value="{{ request('contract_start_date') }}" placeholder="YYYY-MM-DD"
                                autocomplete="off">
                            <i class="la la-calendar text-indigo"></i>
                        </div>
                    </div>
                    <div class="popover-actions mt-3 text-right">
                        <button type="button" class="btn btn-premium-blue btn-sm js-apply-filter px-4">
                            <i class="la la-check-circle mr-1"></i> {!! __('general.apply') !!}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Reset Button -->
            <div class="filter-chip reset-chip js-reset-btn">
                <i class="la la-refresh text-danger"></i>
                <span>{!! __('general.reset') !!}</span>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script src="{!! asset('assets/dashbaord/js/filter-system.js') !!}"></script>
@endpush
