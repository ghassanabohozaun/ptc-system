<div class="tab-pane fade" id="overview" role="tabpanel" aria-labelledby="overview">

    <!-- begin: Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(99, 102, 241, 0.1); color: var(--premium-indigo);">
                    <i class="mdi mdi-clipboard-text-outline"></i>
                </div>
                <h6 class="text-muted mb-1">{!! __('dashboard.pending_tasks') !!}</h6>
                <h3 class="mb-0 fw-bold">{!! $stats['pending_tasks'] !!}</h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(59, 130, 246, 0.1); color: var(--premium-blue);">
                    <i class="mdi mdi-email-outline"></i>
                </div>
                <h6 class="text-muted mb-1">{!! __('dashboard.unread_messages') !!}</h6>
                <h3 class="mb-0 fw-bold">{!! $stats['unread_messages'] !!}</h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">
                    <i class="mdi mdi-file-check-outline"></i>
                </div>
                <h6 class="text-muted mb-1">{!! __('dashboard.monthly_reports') !!}</h6>
                <h3 class="mb-0 fw-bold">{!! $stats['reports_count'] !!}</h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(245, 158, 11, 0.1); color: #f59e0b;">
                    <i class="mdi mdi-check-underline"></i>
                </div>
                <h6 class="text-muted mb-1">{!! __('dashboard.completed_tasks') !!}</h6>
                <h3 class="mb-0 fw-bold">{!! $stats['completed_tasks'] !!}</h3>
            </div>
        </div>
    </div>
    <!-- end: Statistics Cards -->

    <!-- begin: Main Content row -->
    <div class="row">

        <div class="col-lg-5 d-flex flex-column">
            <div class="row flex-grow">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card card-rounded shadow-sm border-0">
                        <div class="card-body p-0">
                             @livewire('employee.tasks.todo-list')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- begin: col-lg-7 Latest Reports -->
        <div class="col-lg-7 d-flex flex-column">
            <div class="row flex-grow">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card card-rounded shadow-sm border-0">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-start mb-4">
                                <div>
                                    <h4 class="card-title card-title-dash fw-bold">{!! __('monthlyReports.show_latest_monthly_reports') !!}</h4>
                                    <p class="text-muted small">{!! __('general.recent_activity_summary') !!}</p>
                                </div>
                                <a href="{!! route('employees.monthlyReports.index') !!}" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                    {!! __('general.show_all') !!}
                                    <i class="mdi mdi-arrow-right ms-1"></i>
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table premium-table">
                                    <thead>
                                        <tr class="bg-light">
                                            <th class="border-0">{!! __('monthlyReports.month') !!}</th>
                                            <th class="border-0">{!! __('monthlyReports.file') !!}</th>
                                            <th class="border-0">{!! __('monthlyReports.status') !!}</th>
                                            <th class="border-0 text-center">{!! __('monthlyReports.details') !!}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($monthlyReports as $monthlyReport)
                                            <tr>
                                                <td class="fw-semibold"> {!! $monthlyReport->month !!}</td>
                                                <td> @include('employees.monthly-reports.parts.file') </td>
                                                <td> @include('employees.monthly-reports.parts.status')</td>
                                                <td class="text-center">{!! $monthlyReport->details !!}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center py-5">
                                                    <div class="text-muted">
                                                        <i class="mdi mdi-file-outline display-4 mb-2 d-block"></i>
                                                        {!! __('monthlyReports.no_monthly_reports_found') !!}
                                                    </div>
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
        </div>
        <!-- end: col-lg-7 -->

    </div>
    <!-- end: row -->

</div>
