<div class="card premium-card shadow-lg border-0">
    <div class="card-header border-0 bg-transparent py-3">
        <h4 class="card-title font-weight-bold">
            <i class="la la-list-alt mr-1 text-primary"></i> {!! __('monthlyReports.show_all_monthly_reports') !!}
        </h4>
    </div>
    <div class="card-content collapse show">
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-center d-none d-lg-table-cell col-w-45">#</th>
                            <th>{!! __('monthlyReports.employee_id') !!}</th>
                            <th class="text-center">{!! __('monthlyReports.month') !!} / {!! __('monthlyReports.year') !!}</th>
                            <th class="text-center">{!! __('monthlyReports.status') !!}</th>
                            <th class="text-center d-none d-lg-table-cell">{!! __('monthlyReports.created_at') !!}</th>
                            <th class="text-center col-w-150">{!! __('general.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($monthlyReports as $monthlyReport)
                            <tr id="row{{ $monthlyReport->id }}">
                                <td class="text-center d-none d-lg-table-cell">
                                    <span class="badge badge-info badge-pill badge-glow premium-badge-circle">{!! $loop->iteration !!}</span>
                                </td>
                                <td class="font-weight-bold text-primary">
                                    {!! $monthlyReport->employee->EmployeeShortName() !!}
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-pill bg-light-info text-info px-1 font-weight-bold">
                                        {!! $monthlyReport->month !!} / {!! $monthlyReport->year !!}
                                    </span>
                                </td>
                                <td class="text-center">
                                    @include('dashboard.employees.monthly-reports.parts.status')
                                </td>
                                <td class="text-center d-none d-lg-table-cell text-muted small">
                                    {!! $monthlyReport->created_at !!}
                                </td>
                                <td class="text-center">
                                    @include('dashboard.employees.monthly-reports.parts.actions')
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center p-3 text-muted">
                                    <i class="ft-info mr-1"></i> {!! __('monthlyReports.no_monthly_reports_found') !!}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="pagination-links float-right mt-2">
                {!! $monthlyReports->links() !!}
            </div>
        </div>
    </div>
</div>
