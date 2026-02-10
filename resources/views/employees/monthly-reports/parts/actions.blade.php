<div>

    {{-- edit --}}
    <a href="javascript:void(0)" class="btn btn-outline-secondary  btn-fw text-dark edit_employees_monthly_report_btn"
        title="{!! __('general.edit') !!}" monthly-report-id="{!! $monthlyReport->id !!}"
        monthly-report-month="{!! $monthlyReport->month !!}" monthly-report-year="{!! $monthlyReport->year !!}"
        monthly-report-details="{{ $monthlyReport->details }}">
        <i class="fa fa-edit"></i>
    </a>


    {{-- delete --}}
    <a href="javascript:void(0)" class="delete-confirm btn btn-outline-danger btn-fw text-dark!!} "
        data-id="{!! $monthlyReport->id !!}" data-route="{!! route('employees.monthly.reports.destroy') !!}" data-title="{!! __('general.ask_delete_record') !!}"
        data-text="{!! __('general.delete_warning_text') !!}" data-confirm-btn="{!! __('general.yes') !!}"
        data-cancel-btn="{!! __('general.no') !!}" data-success-title="{!! __('general.deleted') !!}"
        data-success-text="{!! __('general.delete_success_message') !!}">
        <i class="fa fa-trash"></i>
    </a>

</div>
