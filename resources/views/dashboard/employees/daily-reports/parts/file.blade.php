@if ($dailyReport->file)
    <a class="btn btn-outline-info" href="{!! asset('uploads/dailyReports/' . $dailyReport->file) !!}" target="_blank">{!! __('general.download') !!}</a>
@else
    <div class="btn btn-warning pr-2 disabled">{!! __('general.no_file_found') !!}</div>
@endif
