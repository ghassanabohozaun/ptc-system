<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        <a href="{!! route('dashboard.dailyReports.edit', $dailyReport->id) !!}" class="btn btn-sm btn-outline-primary" title="{!! __('general.edit') !!}">
            <i class="la la-edit"></i>
        </a>

        <a href="#" data-id="{!! $dailyReport->id !!}" class="btn btn-sm btn-outline-danger delete_daily_report_btn"
            title="  {!! __('general.delete') !!}">
            <i class="la la-trash"></i>
        </a>

    </div>
</div>
