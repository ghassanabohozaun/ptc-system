<div class="query-bar-container">
    <div class="query-bar js-query-bar">
        <span class="query-bar-label">
            <i class="la la-filter text-indigo"></i> {!! __('general.filters') !!}:
        </span>

        <form class="js-filter-form d-flex align-items-center gap-2" action="{{ route('dashboard.employeeContracts.index') }}" 
              method="GET" data-container="#table_data" data-loader=".table-loader-overlay">
            
            <!-- Employee Search (Keyword) -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="emp_search_popover">
                    <i class="la la-user text-indigo"></i>
                    <span class="chip-text">{!! __('employeeContracts.employee_name') !!}</span>
                    <span class="badge badge-primary badge-pill badge-glow ml-1 d-inline-flex align-items-center justify-content-center"
                        style="font-size: 11px; width: 35px; height: 18px; padding: 0;">{!! $employeeContracts->total() !!}</span>
                </div>
                <div class="ptc-query-panel shadow-lg border-0 premium-popover-panel" id="emp_search_popover" style="min-width: 280px;">
                    <div class="mb-3 text-left">
                        <label class="premium-label mb-2 font-weight-bold text-dark">{!! __('employeeContracts.employee_name') !!}</label>
                        <div class="premium-input-wrapper">
                            <input type="text" class="form-control premium-input shadow-none" name="keyword"
                                placeholder="{!! __('employeeContracts.search_placeholder_contract') !!}..." 
                                value="{{ request('keyword') }}" autocomplete="off">
                            <i class="la la-search"></i>
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
                <div class="ptc-query-panel shadow-lg border-0 premium-popover-panel" id="salary_popover" style="min-width: 250px;">
                    <div class="mb-3 text-left">
                        <label class="premium-label mb-2 font-weight-bold text-dark">{!! __('employeeContracts.monthly_salary') !!}</label>
                        <div class="premium-input-wrapper">
                            <input type="number" name="monthly_salary" class="form-control premium-input shadow-none" 
                                   placeholder="{!! __('employeeContracts.enter_salary') !!}..." 
                                   value="{{ request('monthly_salary') }}">
                            <i class="la la-dollar"></i>
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
                <div class="ptc-query-panel shadow-lg border-0 premium-popover-panel" id="date_popover" style="min-width: 280px;">
                    <div class="mb-3 text-left">
                        <label class="premium-label mb-2 font-weight-bold text-dark">{!! __('employeeContracts.contract_start_date') !!}</label>
                        <div class="premium-input-wrapper">
                            <input type="date" name="contract_start_date" class="form-control premium-input shadow-none" 
                                   value="{{ request('contract_start_date') }}">
                            <i class="la la-calendar"></i>
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
