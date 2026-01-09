<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        {{-- change status --}}
        <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary monthly_report_change_status_button"
            title="{!! __('general.edit') !!}" monthly-report-id="{!! $monthlyReport->id !!}"
            monthly-report-employee="{!! $monthlyReport->employee->EmployeeShortName() !!}" monthly-report-month="{!! $monthlyReport->month !!}"
            monthly-report-year="{!! $monthlyReport->year !!}" monthly-report-status="{!! $monthlyReport->status !!}" ,
            monthly-report-refuse-reason="{!! $monthlyReport->refuse_reason !!}">
            <i class="la la-edit"></i>
        </a>

        <a href="{javascript:void(0)}" data-id="{!! $monthlyReport->id !!}"
            class="btn btn-sm btn-outline-danger delete_monthly_report_btn" title="  {!! __('general.delete') !!}">
            <i class="la la-trash"></i>
        </a>

    </div>
</div>
