<div>

    {{-- edit --}}
    <a href="javascript:void(0)" class="btn btn-outline-secondary  btn-fw text-dark edit_employees_daily_report_btn"
        title="{!! __('general.edit') !!}" daily-report-id="{!! $dailyReport->id !!}"
        daily-report-date="{!! $dailyReport->date !!}" daily-report-time="{!! $dailyReport->time !!}"
        daily-report-details="{{ $dailyReport->details }}">
        <i class="fa fa-edit"></i>
    </a>

    {{-- delete --}}
    <a href="javascript:void(0)" class="btn btn-outline-danger btn-fw text-dark  delete_employees_daily_report_btn"
        data-id="{!! $dailyReport->id !!}" title = "{!! __('general.delete') !!}">
        <i class="fa fa-trash"></i>

    </a>


</div>
