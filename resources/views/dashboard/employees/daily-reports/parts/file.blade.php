@if ($dailyReport->file)
    <a class="btn btn-sm btn-outline-primary btn-icon" href="{!! asset('uploads/dailyReports/' . $dailyReport->file) !!}" target="_blank" title="{!! __('general.download') !!}">
        <i class="ft-download-cloud font-medium-3"></i>
    </a>
@else
    <span class="text-muted" title="{!! __('general.no_file_found') !!}">
        <i class="ft-slash font-medium-3"></i>
    </span>
@endif
