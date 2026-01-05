<div class="card">
    <!-- begin: card header -->
    <div class="card-header">
        <h4 class="card-title" id="basic-layout-colored-form-control">
            {!! __('dailyReports.show_all_daily_reports') !!}
        </h4>
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
    <!-- end: card header -->

    <!-- begin: card content -->
    <div class="card-content collapse show">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{!! __('dailyReports.employee_id') !!}</th>
                            <th>{!! __('dailyReports.date') !!}</th>
                            <th>{!! __('dailyReports.details') !!}</th>
                            <th>{!! __('dailyReports.file') !!}</th>
                            <th>{!! __('dailyReports.created_at') !!}</th>
                            <th>{!! __('dailyReports.status') !!}</th>
                            <th>{!! __('general.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dailyReports as $dailyReport)
                            <tr>
                                <td>{!! $loop->iteration !!}</td>
                                <td>{!! $dailyReport->employee->EmployeeShortName() !!}</td>
                                <td>{!! $dailyReport->date !!}</td>
                                <td>@include('dashboard.employees.daily-reports.parts.details')</td>
                                <td>@include('dashboard.employees.daily-reports.parts.file')</td>
                                <td>{!! $dailyReport->created_at !!}</td>
                                <td>@include('dashboard.employees.daily-reports.parts.status')</td>
                                <td>@include('dashboard.employees.daily-reports.parts.actions')</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">
                                    {!! __('dailyReports.no_daily_reports_found') !!}
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            <div class="pagination-links float-right">
                {!! $dailyReports->links() !!}
            </div>
        </div>
    </div>
    <!-- end: card content -->
</div>
