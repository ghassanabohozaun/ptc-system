<div class="d-flex align-items-center justify-content-center">
    <!-- Manage Status / Review (Blue Circle) -->
    <a href="javascript:void(0)" 
        class="btn-premium-action btn-premium-action-edit mr-1 monthly_report_change_status_button"
        title="{!! __('general.edit') !!} / {!! __('monthlyReports.manage_status') !!}" 
        monthly-report-id="{!! $monthlyReport->id !!}"
        monthly-report-employee="{!! $monthlyReport->employee->EmployeeShortName() !!}" 
        monthly-report-month="{!! $monthlyReport->month !!}"
        monthly-report-year="{!! $monthlyReport->year !!}" 
        monthly-report-status="{!! $monthlyReport->status !!}" 
        monthly-report-refuse-reason="{!! $monthlyReport->refuse_reason !!}">
        <i class="la la-edit"></i>
    </a>

    <!-- Delete (Red Circle) -->
    <a href="javascript:void(0)" 
        class="btn-premium-action btn-premium-action-delete delete-confirm" 
        data-id="{!! $monthlyReport->id !!}" 
        data-route="{!! route('dashboard.monthly.reports.destroy') !!}" 
        data-title="{!! __('general.ask_delete_record') !!}"
        data-text="{!! __('general.delete_warning_text') !!}" 
        data-confirm-btn="{!! __('general.yes') !!}"
        data-cancel-btn="{!! __('general.no') !!}" 
        data-success-title="{!! __('general.deleted') !!}"
        data-success-text="{!! __('general.delete_success_message') !!}" 
        title="{!! __('general.delete') !!}">
        <i class="la la-trash-alt"></i>
    </a>
</div>
