<div class="card">
    <!-- begin: card header -->
    <div class="card-header">
        <h4 class="card-title" id="basic-layout-colored-form-control">
            {!! __('monthlyReports.show_all_monthly_reports') !!}
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
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{!! __('monthlyReports.employee_id') !!}</th>
                            <th>{!! __('monthlyReports.month') !!}</th>
                            <th>{!! __('monthlyReports.file') !!}</th>
                            <th>{!! __('monthlyReports.created_at') !!}</th>
                            <th>{!! __('monthlyReports.status') !!}</th>
                            <th>{!! __('general.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($monthlyReports as $monthlyReport)
                            <tr>
                                <td>{!! $loop->iteration !!}</td>
                                <td>{!! $monthlyReport->employee->EmployeeShortName() !!}</td>
                                <td>{!! $monthlyReport->month !!} / {!! $monthlyReport->year !!}</td>

                                <td>@include('dashboard.employees.monthly-reports.parts.file')</td>
                                <td>{!! $monthlyReport->created_at !!}</td>
                                <td>@include('dashboard.employees.monthly-reports.parts.status')</td>
                                <td>@include('dashboard.employees.monthly-reports.parts.actions')</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">
                                    {!! __('monthlyReports.no_monthly_reports_found') !!}
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            <div class="pagination-links float-right">
                {!! $monthlyReports->links() !!}
            </div>
        </div>
    </div>
    <!-- end: card content -->
</div>
