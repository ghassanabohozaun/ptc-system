<div class="modal modal-pop fade" id="monthlyReportsEmployeesModal" tabindex="-1" role="dialog"
    aria-labelledby="monthlyReportsEmployeesModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <!--begin::modal header-->
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold d-flex align-items-center"
                    id="monthlyReportsEmployeesModalLabel">
                    <i class="la la-users text-primary mr-2"></i>
                    {!! __('monthlyReports.show_employees') !!}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--end::modal header-->

            {{-- Modal Body --}}
            <div class="modal-body p-3">
                {{-- Search Filter Bar --}}
                <div class="row align-items-center mb-3">
                    <div class="col-md-8 col-12 mb-2 mb-md-0">
                        <div class="premium-input-wrapper">
                            <input type="text" id="month" name="month" class="form-control premium-input shadow-none ptc-monthpicker"
                                placeholder="{!! __('monthlyReports.enter_month') !!}" autocomplete="off">
                            <i class="la la-calendar text-indigo"></i>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 text-md-right">
                        <button type="button" class="btn btn-outline-primary mr-1"
                            id="monthly_report_employees_search_btn">
                            <i class="la la-search btn-search-icon"></i>
                            {!! __('general.search') !!}
                            <i class="la la-spinner spinner ml-1 d-none btn-search-spinner"></i>
                        </button>
                        <button type="button" class="btn btn-outline-danger" id="monthly_report_employees_reset_btn">
                            <i class="ft-x"></i> {!! __('general.reset') !!}
                        </button>
                    </div>
                </div>

                {{-- Table --}}
                <div id="table_data" class="table-responsive mt-2">
                    @include('dashboard.home.monthly-reports._table')
                </div>

            </div>
            {{-- End Modal Body --}}

        </div>
    </div>
</div>


@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var isRtl = $('html').attr('dir') === 'rtl' || '{!! Lang() !!}' === 'ar';

            // Initialization of the month picker is now handled globally via datepicker-initializer.js.
            // No local initialization required here.

            function fetch_data() {
                var month = $('#month').val();

                $.ajax({
                    url: "{{ route('dashboard.get.monthly.reports.employees') }}",
                    data: {
                        month: month
                    },
                    beforeSend: function() {
                        var searchBtn = $('#monthly_report_employees_search_btn');
                        searchBtn.prop('disabled', true);
                        searchBtn.find('.btn-search-icon').addClass('d-none');
                        searchBtn.find('.btn-search-spinner').removeClass('d-none');
                    },
                    success: function(data) {
                        var trHTML = '';
                        $('#records_table').empty();

                        if (data.status == true) {
                            $.each(data.data, function(i, item) {
                                var num = i + 1;
                                var statusClass = item.report_status_raw === 'approved' ?
                                    'badge-success' : (item.report_status_raw === 'rejected' ?
                                        'badge-danger' : 'badge-warning');

                                trHTML +=
                                    '<tr>' +
                                    '<td class="text-muted">' + num + '</td>' +
                                    '<td class="fw-bold text-dark">' + item.full_name +
                                    '</td>' +
                                    '<td>' + item.month + '</td>' +
                                    '<td>' + item.report_status + '</td>' +
                                    '<td>' + item.file + '</td>' +
                                    '</tr>';
                            });
                        } else {
                            trHTML =
                                '<tr>' +
                                '<td colspan="5" class="text-center py-4 text-muted">' +
                                '<i class="la la-inbox d-block empty-table-icon"></i>' +
                                '{{ __('employees.no_data_found') }}' +
                                '</td>' +
                                '</tr>';
                        }

                        $('#records_table').append(trHTML);
                    },
                    complete: function() {
                        var searchBtn = $('#monthly_report_employees_search_btn');
                        searchBtn.prop('disabled', false);
                        searchBtn.find('.btn-search-spinner').addClass('d-none');
                        searchBtn.find('.btn-search-icon').removeClass('d-none');
                    },
                });
            }

            $('body').on('click', '#monthly_report_employees_search_btn', function() {
                fetch_data();
            });

            $('body').on('click', '#monthly_report_employees_reset_btn', function(e) {
                e.preventDefault();
                $('#month').val('');
                $('#records_table').empty().append(
                    '<tr>' +
                    '<td colspan="5" class="text-center py-4 text-muted">' +
                    '<i class="la la-inbox d-block empty-table-icon"></i>' +
                    '{{ __('employees.no_data_found') }}' +
                    '</td>' +
                    '</tr>'
                );
            });

        });
    </script>
@endpush
