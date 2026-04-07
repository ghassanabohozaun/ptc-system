<div class="form-group">
    <div class="btn-group" role="group">


        <button type="button" class="btn btn-sm btn-outline-danger delete-confirm" data-id="{!! $dailyReport->id !!}"
            data-route="{!! route('dashboard.daliy.reports.destroy') !!}" data-title="{!! __('general.ask_delete_record') !!}" data-text="{!! __('general.delete_warning_text') !!}"
            data-confirm-btn="{!! __('general.yes') !!}" data-cancel-btn="{!! __('general.no') !!}"
            data-success-title="{!! __('general.deleted') !!}" data-success-text="{!! __('general.delete_success_message') !!}"
            title="{!! __('general.delete') !!}">
            <i class="ft-trash-2"></i>
        </button>
    </div>
</div>
