<div class="form-group">
    <div class="btn-group" role="group">
        {{-- change status --}}
        <button type="button" class="btn btn-sm btn-outline-primary monthly_report_change_status_button"
            title="{!! __('general.edit') !!}" 
            monthly-report-id="{!! $monthlyReport->id !!}"
            monthly-report-employee="{!! $monthlyReport->employee->EmployeeShortName() !!}" 
            monthly-report-month="{!! $monthlyReport->month !!}"
            monthly-report-year="{!! $monthlyReport->year !!}" 
            monthly-report-status="{!! $monthlyReport->status !!}" 
            monthly-report-refuse-reason="{!! $monthlyReport->refuse_reason !!}">
            <i class="ft-edit"></i>
        </button>

        {{-- delete --}}
        <button type="button" class="btn btn-sm btn-outline-danger delete-confirm" 
            data-id="{!! $monthlyReport->id !!}" 
            data-route="{!! route('dashboard.monthly.reports.destroy') !!}" 
            data-title="{!! __('general.ask_delete_record') !!}"
            data-text="{!! __('general.delete_warning_text') !!}" 
            data-confirm-btn="{!! __('general.yes') !!}"
            data-cancel-btn="{!! __('general.no') !!}" 
            data-success-title="{!! __('general.deleted') !!}"
            data-success-text="{!! __('general.delete_success_message') !!}" 
            title="{!! __('general.delete') !!}">
            <i class="ft-trash-2"></i>
        </button>
    </div>
</div>
