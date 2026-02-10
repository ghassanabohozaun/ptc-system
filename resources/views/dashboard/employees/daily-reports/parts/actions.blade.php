<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        {{-- <a href="{!! route('dashboard.dailyReports.edit', $dailyReport->id) !!}" class="btn btn-sm btn-outline-primary" title="{!! __('general.edit') !!}">
            <i class="la la-edit"></i>
        </a> --}}


        {{-- delete --}}
        <a href="javascript:void(0)" class="btn btn-sm delete-confirm btn-outline-danger !!} "
            data-id="{!! $dailyReport->id !!}" data-route="{!! route('dashboard.daliy.reports.destroy') !!}" data-title="{!! __('general.ask_delete_record') !!}"
            data-text="{!! __('general.delete_warning_text') !!}" data-confirm-btn="{!! __('general.yes') !!}"
            data-cancel-btn="{!! __('general.no') !!}" data-success-title="{!! __('general.deleted') !!}"
            data-success-text="{!! __('general.delete_success_message') !!}">
            <i class="la la-trash"></i>
        </a>


    </div>
</div>
