<div class="card">
    <div class="card-header">
        <h4 class="card-title">{!! __('monthlyReports.show_all_monthly_reports') !!}</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-content collapse show">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-center d-none d-lg-table-cell">#</th>
                            <th>{!! __('monthlyReports.employee_id') !!}</th>
                            <th class="text-center">{!! __('monthlyReports.month') !!} / {!! __('monthlyReports.year') !!}</th>
                            <th class="text-center d-none d-lg-table-cell">{!! __('general.details') !!}</th>
                            <th class="text-center">{!! __('monthlyReports.status') !!}</th>
                            <th class="text-center d-none d-lg-table-cell">{!! __('monthlyReports.created_at') !!}</th>
                            <th class="text-center">{!! __('general.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($monthlyReports as $monthlyReport)
                            <tr id="row{{ $monthlyReport->id }}">
                                <td class="text-center d-none d-lg-table-cell">{!! $loop->iteration !!}</td>
                                <td class="font-weight-bold text-primary">
                                    {!! $monthlyReport->employee->EmployeeShortName() !!}
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-pill bg-light-info text-info px-1 font-weight-bold">
                                        {!! $monthlyReport->month !!} / {!! $monthlyReport->year !!}
                                    </span>
                                </td>
                                <td class="text-center d-none d-lg-table-cell">
                                    <button type="button" class="btn btn-sm btn-outline-info details-control" title="{!! __('general.details') !!}" data-id="{{ $monthlyReport->id }}">
                                        <i class="ft-eye"></i>
                                    </button>
                                    <!-- Hidden Details for AJAX / Popover -->
                                    <div class="row-details d-none">
                                        <div class="p-2">
                                            <h6 class="font-weight-bold text-primary mb-1">{!! __('general.details') !!}:</h6>
                                            <p class="text-muted small">{!! $monthlyReport->details !!}</p>
                                        </div>
                                    </div>
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
