<div class="query-bar-container">
    <div class="query-bar js-query-bar">
        <span class="query-bar-label">
            <i class="la la-filter text-indigo"></i> {!! __('general.filters') !!}:
        </span>

        <form class="js-filter-form d-flex align-items-center gap-2" data-container="#table_data"
            data-loader=".table-loader-overlay">
            <!-- Keyword Search -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="keyword_search_popover">
                    <i class="la la-user-tag text-indigo"></i>
                    <span class="chip-text">{!! __('employees.status') !!}</span>
                    <span
                        class="badge badge-primary badge-pill badge-glow ml-1 premium-badge-pill-md">{!! $employeeStatuses->total() !!}</span>
                </div>

                <!-- Keyword Search Popover -->
                <div class="ptc-query-panel shadow-lg border-0 premium-popover-panel" id="keyword_search_popover">
                    <div class="mb-3">
                        <label class="premium-label mb-2 font-weight-bold text-dark">{!! __('employees.status') !!}</label>
                        <div class="premium-input-wrapper">
                            <input type="text" class="form-control premium-input shadow-none"
                                name="keyword" placeholder="{!! __('general.search') !!}..."
                                autocomplete="off">
                            <i class="la la-search text-indigo"></i>
                        </div>
                    </div>
                    <div class="popover-actions mt-4">
                        <button type="button" class="btn btn-premium-blue btn-sm js-apply-filter px-4">
                            <i class="la la-check-circle"></i> {!! __('general.apply') !!}
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
