@push('style')
    <link rel="stylesheet" href="{!! asset('assets/dashbaord/css/filter.css') !!}">
@endpush

<div class="query-bar-container">
    <div class="query-bar js-query-bar">
        <span class="query-bar-label">
            <i class="la la-filter"></i> {!! __('general.filters') !!}:
        </span>

        <form class="js-filter-form d-flex align-items-center gap-2" data-container="#table_data" data-loader=".table-loader-overlay">
            <!-- Governorate Search -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="gov_search_panel">
                    <i class="la la-search"></i>
                    <span class="chip-text">{!! __('world.governorate_name') !!}</span>
                </div>

                <!-- Governorate Search Panel -->
                <div class="ptc-query-panel" id="gov_search_panel">
                    <div class="mb-3">
                        <label class="form-label fw-bold mb-2">{!! __('world.governorate_name') !!}</label>
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

            <!-- Reset Button -->
            <div class="filter-chip reset-chip js-reset-btn">
                <i class="la la-refresh"></i>
                <span>{!! __('general.reset') !!}</span>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script src="{!! asset('assets/dashbaord/js/filter-system.js') !!}"></script>
@endpush
