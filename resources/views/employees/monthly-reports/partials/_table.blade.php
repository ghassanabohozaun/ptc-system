<div class="card card-rounded">
    <div class="card-body">
        <div>
            <h4 class="card-title card-title-dash">{!! __('monthlyReports.show_all_monthly_reports') !!}</h4>
        </div>

        <div class="table-responsive mt-4">
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th style="width:15%"> {!! __('monthlyReports.month') !!} </th>
                        <th style="width:20%"> {!! __('monthlyReports.details') !!} </th>
                        <th style="width:20%"> {!! __('monthlyReports.refuse_reason') !!} </th>
                        <th style="width:10%"> {!! __('monthlyReports.file') !!} </th>
                        <th style="width:10%">{!! __('monthlyReports.status') !!}</th>
                        <th style="width:10%">{!! __('general.actions') !!}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($monthlyReports as $monthlyReport)
                        <tr>
                            <td>{!! $monthlyReport->month !!} / {!! $monthlyReport->year !!}</td>
                            <td>{!! $monthlyReport->details !!}</td>
                            @if ($monthlyReport->status == 'initial_refuse' || $monthlyReport->status == 'final_refuse')
                                <td>@include('employees.monthly-reports.parts.refuse-reason')</td>
                            @else
                                <td></td>
                            @endif
                            <td>@include('employees.monthly-reports.parts.file')</td>
                            <td>@include('employees.monthly-reports.parts.status')</td>
                            <td>@include('employees.monthly-reports.parts.actions')</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                {!! __('monthlyReports.no_monthly_reports_found') !!}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
        <div class="{!! Lang() == 'ar' ? 'pull-left' : 'pull-right' !!} mt-3">
            {!! $monthlyReports->links() !!}
        </div>
    </div>
</div>
