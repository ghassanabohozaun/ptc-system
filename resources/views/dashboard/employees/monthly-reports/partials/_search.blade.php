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

        <form class="js-filter-form d-flex align-items-center gap-2" data-container="#table_data" data-loader=".table-loader-overlay">
            
            <!-- Employee Keyword Search (Unified UI) -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="emp_search_popover">
                    <i class="la la-user"></i>
                    <span class="chip-text">{!! __('employees.employees') !!}</span>
                </div>
                <div class="ptc-query-panel" id="emp_search_popover">
                    <div class="mb-3">
                        <label class="form-label fw-bold mb-2">{!! __('employees.employees') !!}</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword"
                                placeholder="{!! __('general.search') !!}..." autocomplete="off">
                        </div>
                    </div>
                    <div class="popover-actions">
                        <button type="button" class="btn btn-primary btn-sm text-white js-apply-filter">
                            {!! __('general.submit') !!}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Date Filter (Month/Year) -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="date_popover">
                    <i class="la la-calendar"></i>
                    <span class="chip-text">{!! __('monthlyReports.month') !!} / {!! __('monthlyReports.year') !!}</span>
                </div>
                <div class="ptc-query-panel" id="date_popover" style="min-width: 250px;">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label class="form-label fw-bold mb-2">{!! __('monthlyReports.month') !!}</label>
                            <select name="month" class="form-control">
                                <option value="">{!! __('general.show_all') !!}</option>
                                @for($m=1; $m<=12; $m++)
                                    <option value="{{ sprintf('%02d', $m) }}">{{ sprintf('%02d', $m) }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label fw-bold mb-2">{!! __('monthlyReports.year') !!}</label>
                            <select name="year" class="form-control">
                                <option value="">{!! __('general.show_all') !!}</option>
                                @for($y=date('Y'); $y>=date('Y')-10; $y--)
                                    <option value="{{ $y }}">{{ $y }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="popover-actions">
                        <button type="button" class="btn btn-primary btn-sm text-white js-apply-filter">
                            {!! __('general.submit') !!}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Status Filter (IMPORTANT) -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="status_popover">
                    <i class="la la-toggle-on"></i>
                    <span class="chip-text">{!! __('general.status') !!}</span>
                </div>
                <div class="ptc-query-panel" id="status_popover">
                    <div class="mb-3">
                        <label class="form-label fw-bold mb-2">{!! __('general.status') !!}</label>
                        <select class="form-control js-select2" name="status" style="width: 100%">
                            <option value="">{!! __('general.show_all') !!}</option>
                            <option value="new">{!! __('monthlyReports.new') !!}</option>
                            <option value="initial_review">{!! __('monthlyReports.initial_review') !!}</option>
                            <option value="initial_refuse">{!! __('monthlyReports.initial_refuse') !!}</option>
                            <option value="intital_approved">{!! __('monthlyReports.intital_approved') !!}</option>
                            <option value="final_review">{!! __('monthlyReports.final_review') !!}</option>
                            <option value="final_refuse">{!! __('monthlyReports.final_refuse') !!}</option>
                            <option value="approved">{!! __('monthlyReports.approved') !!}</option>
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
                <i class="la la-refresh"></i>
                <span>{!! __('general.reset') !!}</span>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script src="{!! asset('assets/dashbaord/vendors/select2/select2.min.js') !!}"></script>
    <script src="{!! asset('assets/dashbaord/js/filter-system.js') !!}"></script>
@endpush
