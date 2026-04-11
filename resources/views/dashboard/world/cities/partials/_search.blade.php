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
                <div class="filter-chip js-filter-chip" data-filter-target="city_search_panel">
                    <i class="la la-search"></i>
                    <span class="chip-text">{!! __('world.city_name') !!}</span>
                    <span class="badge badge-primary badge-pill badge-glow ml-1 d-inline-flex align-items-center justify-content-center" style="font-size: 11px; width: 35px; height: 18px; padding: 0;">{!! $cities->total() !!}</span>
                </div>

                <!-- City Search Panel -->
                <div class="ptc-query-panel shadow-lg border-0" id="city_search_panel" style="border-radius: 16px;">
                    <div class="mb-3">
                        <label class="premium-label mb-2">{!! __('world.city_name') !!}</label>
                        <div class="premium-input-wrapper">
                            <input type="text" class="form-control premium-input shadow-none" name="keyword"
                                placeholder="{!! __('general.search') !!}..." autocomplete="off">
                            <i class="la la-search text-primary"></i>
                        </div>
                    </div>
                    <div class="popover-actions mt-4 text-right">
                        <button type="button" class="btn btn-premium-blue btn-sm js-apply-filter px-4">
                            <i class="la la-check-circle mr-1"></i> {!! __('general.apply') !!}
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
                <div class="ptc-query-panel shadow-lg border-0" id="governorate_popover" style="border-radius: 16px;">
                    <div class="mb-3">
                        <label class="premium-label mb-2">{!! __('world.governorate_name') !!}</label>
                        <select class="form-control js-select2" name="governorate_id" style="width: 100%">
                            <option value="">{!! __('general.show_all') !!}</option>
                            @foreach ($governorates as $governorate)
                                <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                            @endforeach
                        </select>
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
