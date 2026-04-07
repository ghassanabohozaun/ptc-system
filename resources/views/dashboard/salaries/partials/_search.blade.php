@push('style')
    <link rel="stylesheet" href="{!! asset('assets/dashbaord/css/filter.css') !!}">
@endpush

<div class="query-bar-container mt-1">
    <div class="query-bar js-query-bar">
        <span class="query-bar-label">
            <i class="la la-filter"></i> {!! __('general.filters') !!}:
        </span>

        <form class="js-filter-form d-flex align-items-center gap-2" action="{{ route('dashboard.salaries.index') }}"
            method="GET" data-container="#table_data" data-loader="#tableLoader">

            <!-- Month Filter -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="month_popover">
                    <i class="la la-calendar"></i>
                    <span class="chip-text">{!! __('salaries.month') !!}</span>
                </div>
                <div class="ptc-query-panel" id="month_popover">
                    <div class="mb-3">
                        <label class="form-label fw-bold mb-2">{!! __('salaries.enter_month') !!}</label>
                        <select name="month" class="form-control js-select2"
                            data-placeholder="{!! __('salaries.enter_month') !!}">
                            <option value="">{!! __('general.show_all') !!}</option>
                            @for ($i = 1; $i <= 12; $i++)
                                @php $val = sprintf('%02d', $i); @endphp
                                <option value="{{ $val }}" {{ request('month') == $val ? 'selected' : '' }}>
                                    {{ $val }} - {{ __('salaries.' . $i) }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="popover-actions">
                        <button type="button" class="btn btn-primary btn-sm text-white js-apply-filter">
                            {!! __('general.apply') !!}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Year Filter -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="year_popover">
                    <i class="la la-hashtag"></i>
                    <span class="chip-text">{!! __('salaries.year') !!}</span>
                </div>
                <div class="ptc-query-panel" id="year_popover">
                    <div class="mb-3">
                        <label class="form-label fw-bold mb-2">{!! __('salaries.enter_year') !!}</label>
                        <input type="number" name="year" class="form-control" value="{{ request('year') }}"
                            placeholder="2026" autocomplete="off">
                    </div>
                    <div class="popover-actions">
                        <button type="button" class="btn btn-primary btn-sm text-white js-apply-filter">
                            {!! __('general.apply') !!}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Status Filter -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="status_popover">
                    <i class="la la-check-circle"></i>
                    <span class="chip-text">{!! __('general.status') !!}</span>
                </div>
                <div class="ptc-query-panel" id="status_popover">
                    <div class="mb-3">
                        <label class="form-label fw-bold mb-2">{!! __('general.select_status') !!}</label>
                        <select name="status" class="form-control">
                            <option value="">{!! __('general.show_all') !!}</option>
                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>
                                {!! __('general.enable') !!}</option>
                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>
                                {!! __('general.disabled') !!}</option>
                        </select>
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
