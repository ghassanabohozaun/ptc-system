@push('style')
    <link rel="stylesheet" href="{!! asset('assets/dashbaord/vendors/select2/select2.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/dashbaord/css/filter.css') !!}">
@endpush

<div class="query-bar-container">
    <div class="query-bar js-query-bar">
        <span class="query-bar-label">
            <i class="la la-filter"></i> {!! __('general.filters') !!}:
        </span>

        <form class="js-filter-form d-flex align-items-center gap-2" data-container="#table_data" data-loader=".table-loader-overlay">
            <!-- City Search -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="search_popover">
                    <i class="la la-search"></i>
                    <span class="chip-text">{!! __('world.city_name') !!}</span>
                </div>
                
                <!-- City Search Popover -->
                <div class="ptc-query-panel" id="search_popover">
                    <div class="mb-3">
                        <label class="form-label fw-bold mb-2">{!! __('world.city_name') !!}</label>
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

            <!-- Governorate Filter -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="governorate_popover">
                    <i class="la la-map-marker"></i>
                    <span class="chip-text">{!! __('world.governorate_name') !!}</span>
                </div>

                <!-- Governorate Popover -->
                <div class="ptc-query-panel" id="governorate_popover">
                    <div class="mb-3">
                        <label class="form-label fw-bold mb-2">{!! __('world.governorate_name') !!}</label>
                        <select class="form-control js-select2" name="governorate_id" style="width: 100%">
                            <option value="">{!! __('general.show_all') !!}</option>
                            @foreach ($governorates as $governorate)
                                <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
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
