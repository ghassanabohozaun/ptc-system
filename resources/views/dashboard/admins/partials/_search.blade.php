
<div class="query-bar-container">
    <div class="query-bar js-query-bar">
        <span class="query-bar-label">
            <i class="la la-filter"></i> {!! __('general.filters') !!}:
        </span>

        <form class="js-filter-form d-flex align-items-center gap-2" data-container="#table_data" data-loader=".table-loader-overlay">
            <!-- Admin Search -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="admin_search_popover">
                    <i class="la la-user"></i>
                    <span class="chip-text">{!! __('admins.admins') !!}</span>
                </div>

                <!-- Admin Search Popover -->
                <div class="ptc-query-panel" id="admin_search_popover">
                    <div class="mb-3">
                        <label class="form-label fw-bold mb-2">{!! __('admins.admins') !!}</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword"
                                placeholder="{!! __('general.search') !!}..." autocomplete="off">
                        </div>
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
    <script src="{!! asset('assets/dashbaord/js/filter-system.js') !!}"></script>
@endpush
