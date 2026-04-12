<!-- begin :monthly reports -->
<div id="recent-transactions" class="row">
    <div class="col-lg-12">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                <h4 class="card-title m-0">{!! __('monthlyReports.show_latest_monthly_reports') !!}</h4>
                <div class="d-flex align-items-center gap-2">
                    <button type="button"
                        class="btn btn-primary btn-sm ml-2 mx-sm-1"
                        data-toggle="modal" data-target="#monthlyReportsEmployeesModal">
                        <i class="la la-users"></i> {!! __('monthlyReports.show_employees') !!}
                    </button>
                    <a class="btn btn-secondary btn-sm"
                        href="{!! route('dashboard.monthlyReports.index') !!}">
                        <i class="la la-link"></i> {!! __('general.show_all') !!}
                    </a>
                </div>
            </div>
            <div class="card-content mt-2">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th>#</th>
                                <th>{!! __('monthlyReports.employee_id') !!}</th>
                                <th>{!! __('monthlyReports.date') !!}</th>
                                <th>{!! __('monthlyReports.status') !!}</th>
                                <th>{!! __('general.created_at') !!}</th>
                                <th>{!! __('monthlyReports.file') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($monthlyReports as $monthlyReport)
                                <tr>
                                    <td class="text-muted">{{ $loop->iteration }}</td>
                                    <td class="fw-bold text-dark"> {!! $monthlyReport->employee->EmployeeShortName() !!}</td>
                                    <td> {!! $monthlyReport->month !!} / {!! $monthlyReport->year !!} </td>
                                    <td> @include('dashboard.employees.monthly-reports.parts.status') </td>
                                    <td class="text-muted small">{{ \Carbon\Carbon::createFromFormat('d/m/Y h:i A', $monthlyReport->created_at)->diffForHumans() }}</td>
                                    <td> @include('dashboard.employees.monthly-reports.parts.file') </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        <i class="icon-info d-block fs-2 mb-2"></i>
                                        {!! __('monthlyReports.no_monthly_reports_found') !!}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end :monthly reports -->
