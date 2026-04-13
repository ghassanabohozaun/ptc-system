<div class="query-bar-container">
    <div class="query-bar js-query-bar">
        <span class="query-bar-label">
            <i class="la la-filter text-indigo"></i> {!! __('general.filters') !!}:
        </span>

        <form class="js-filter-form d-flex align-items-center gap-2" data-container="#table_data"
            data-loader=".table-loader-overlay">
            
            <!-- Employee Keyword Search (Monthly Reports Style) -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="employee_search_popover">
                    <i class="la la-user text-indigo"></i>
                    <span class="chip-text">{!! __('employees.employees') !!}</span>
                    <span class="badge badge-primary badge-pill badge-glow ml-1 premium-badge-pill-md">{!! $dailyReports->total() !!}</span>
                </div>

                <div class="ptc-query-panel shadow-lg border-0 premium-popover-panel" id="employee_search_popover">
                    <div class="mb-3 text-left">
                        <label class="premium-label mb-2 font-weight-bold text-dark">{!! __('employees.employees') !!}</label>
                        <div class="premium-input-wrapper">
                            <input type="text" class="form-control premium-input shadow-none" 
                                name="keyword" placeholder="{!! __('general.search') !!}..." autocomplete="off">
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

            <!-- Date Filter Popover -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="date_popover">
                    <i class="la la-calendar text-indigo"></i>
                    <span class="chip-text">{!! __('dailyReports.date') !!}</span>
                </div>
                
                <div class="ptc-query-panel shadow-lg border-0 premium-popover-panel min-w-300" id="date_popover">
                    <div class="mb-3 text-left">
                        <label class="premium-label mb-2 font-weight-bold text-dark">{!! __('dailyReports.date') !!}</label>
                        <div class="premium-input-wrapper">
                            <input type="text" name="date" class="form-control premium-input shadow-none ptc-datepicker bg-white" placeholder="{!! __('general.select_from_list') !!}...">
                            <i class="la la-calendar"></i>
                        </div>
                    </div>
                    <hr class="my-3">
                    <div class="mb-3 text-left">
                        <label class="premium-label mb-1 font-weight-bold text-dark">{!! __('dailyReports.from_date') !!}</label>
                        <div class="premium-input-wrapper">
                            <input type="text" name="from_date" class="form-control premium-input shadow-none ptc-datepicker bg-white" placeholder="{!! __('general.select_from_list') !!}...">
                            <i class="la la-calendar"></i>
                        </div>
                    </div>
                    <div class="mb-3 text-left">
                        <label class="premium-label mb-1 font-weight-bold text-dark">{!! __('dailyReports.to_date') !!}</label>
                        <div class="premium-input-wrapper">
                            <input type="text" name="to_date" class="form-control premium-input shadow-none ptc-datepicker bg-white" placeholder="{!! __('general.select_from_list') !!}...">
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
