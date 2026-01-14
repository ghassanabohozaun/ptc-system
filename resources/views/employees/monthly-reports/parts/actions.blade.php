<div>

    {{-- edit --}}
    <a href="javascript:void(0)" class="btn btn-outline-secondary  btn-fw text-dark edit_employees_monthly_report_btn"
        title="{!! __('general.edit') !!}" monthly-report-id="{!! $monthlyReport->id !!}"
        monthly-report-month="{!! $monthlyReport->month !!}" monthly-report-year="{!! $monthlyReport->year !!}"
        monthly-report-details="{{ $monthlyReport->details }}">
        <i class="fa fa-edit"></i>
    </a>

    {{-- delete --}}
    <a href="javascript:void(0)" class="btn btn-outline-danger btn-fw text-dark  delete_employees_monthly_report_btn"
        data-id="{!! $monthlyReport->id !!}" title = "{!! __('general.delete') !!}">
        <i class="fa fa-trash"></i>

    </a>


</div>
