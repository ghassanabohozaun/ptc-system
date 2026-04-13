<div class="query-bar-container">
    <div class="query-bar js-query-bar">
        <span class="query-bar-label">
            <i class="la la-filter text-indigo"></i> {!! __('general.filters') !!}:
        </span>

        <form class="js-filter-form d-flex align-items-center gap-2" data-container="#table_data"
            data-loader=".table-loader-overlay">
            
            <!-- Employee Keyword Search -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="employee_search_popover">
                    <i class="la la-user text-indigo"></i>
                    <span class="chip-text">{!! __('employees.employees') !!}</span>
                    <span class="badge badge-primary badge-pill badge-glow premium-badge-pill-md">{!! $monthlyReports->total() !!}</span>
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

            <!-- Unified Month & Year Filter Popover -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="month_year_popover">
                    <i class="la la-calendar text-indigo"></i>
                    <span class="chip-text">{!! __('monthlyReports.month') !!} / {!! __('monthlyReports.year') !!}</span>
                </div>
                
                <div class="ptc-query-panel shadow-lg border-0 premium-popover-panel min-w-300" id="month_year_popover">
                    <div class="mb-3 text-left">
                        <label class="premium-label mb-2 font-weight-bold text-dark">{!! __('monthlyReports.month') !!} / {!! __('monthlyReports.year') !!}</label>
                        <div class="premium-input-wrapper">
                            {{-- Standardized PTC Month Picker --}}
                            <input type="text" id="month_year_picker" class="form-control premium-input shadow-none ptc-monthpicker js-month-year-filter" 
                                placeholder="{!! __('general.select_from_list') !!}..." autocomplete="off">
                            <i class="la la-calendar-check text-indigo"></i>
                            
                            {{-- Hidden inputs for backend compatibility --}}
                            <input type="hidden" name="month" id="filter_month" value="{{ request('month') }}">
                            <input type="hidden" name="year" id="filter_year" value="{{ request('year') }}">
                        </div>
                    </div>
                    <div class="popover-actions mt-4 text-right">
                        <button type="button" class="btn btn-premium-blue btn-sm js-apply-filter px-4">
                            <i class="la la-check-circle mr-1"></i> {!! __('general.apply') !!}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Status Filter Popover (Native Select) -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="status_popover">
                    <i class="la la-toggle-on text-indigo"></i>
                    <span class="chip-text">{!! __('general.status') !!}</span>
                </div>
                
                <div class="ptc-query-panel shadow-lg border-0 premium-popover-panel" id="status_popover">
                    <div class="mb-3 text-left">
                        <label class="premium-label mb-2 font-weight-bold text-dark">{!! __('general.status') !!}</label>
                        <div class="premium-input-wrapper">
                            <select class="form-control premium-input shadow-none w-100" name="status">
                                <option value="">{!! __('general.show_all') !!}</option>
                                <option value="new">{!! __('monthlyReports.new') !!}</option>
                                <option value="initial_review">{!! __('monthlyReports.initial_review') !!}</option>
                                <option value="initial_refuse">{!! __('monthlyReports.initial_refuse') !!}</option>
                                <option value="intital_approved">{!! __('monthlyReports.intital_approved') !!}</option>
                                <option value="final_review">{!! __('monthlyReports.final_review') !!}</option>
                                <option value="final_refuse">{!! __('monthlyReports.final_refuse') !!}</option>
                                <option value="approved">{!! __('monthlyReports.approved') !!}</option>
                            </select>
                            <i class="la la-toggle-on"></i>
                        </div>
                    </div>
                    <div class="popover-actions mt-4 text-right">
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
