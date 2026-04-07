<div class="query-bar-container">
    <div class="query-bar js-query-bar">
        <span class="query-bar-label">
            <i class="mdi mdi-filter-variant"></i> {!! __('general.filters') !!}:
        </span>

        <form class="js-filter-form d-flex align-items-center gap-2" data-container="#table_data"
            data-loader=".table-loader-overlay">
            <!-- Keyword Search (Unified with Employees UI) -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="emp_search_popover">
                    <i class="la la-user"></i>
                    <span class="chip-text">{!! __('employees.employees') !!}</span>
                </div>
                <!-- Keyword Popover -->
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


            <!-- Date Filter -->
            <div class="filter-item">
                <div class="filter-chip js-filter-chip" data-filter-target="date_popover">
                    <i class="la la-calendar"></i>
                    <span class="chip-text">{!! __('dailyReports.date') !!}</span>
                </div>
                <div class="ptc-query-panel" id="date_popover" style="min-width: 280px;">
                    <div class="mb-3">
                        <label class="form-label fw-bold mb-2">{!! __('dailyReports.date') !!}</label>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label class="form-label fw-bold mb-2">{!! __('dailyReports.from_date') !!}</label>
                        <input type="date" name="from_date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold mb-2">{!! __('dailyReports.to_date') !!}</label>
                        <input type="date" name="to_date" class="form-control">
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
    <script type="text/javascript">
        $(document).ready(function() {
            // Re-initialize AJAX Select2 when popover opens
            $(document).on('click', '.js-filter-chip[data-filter-target="employee_popover"]', function() {
                const $panel = $('#employee_popover');
                const $select = $panel.find('.js-select2-ajax');

                if ($select.length && !$select.hasClass("select2-hidden-accessible")) {
                    $select.select2({
                        dropdownParent: $panel,
                        minimumInputLength: 1,
                        placeholder: '{!! __('general.select_from_list') !!}',
                        allowClear: true,
                        ajax: {
                            url: "{{ route('dashboard.employees.autocomplete.employee') }}",
                            dataType: 'json',
                            delay: 250,
                            processResults: function(data) {
                                return {
                                    results: $.map(data, function(item) {
                                        return {
                                            text: '{!! Lang() !!}' === 'en' ?
                                                item.employee_en : item.employee_ar,
                                            id: item.id
                                        }
                                    })
                                };
                            }
                        }
                    });
                }
            });
        });
    </script>
@endpush
