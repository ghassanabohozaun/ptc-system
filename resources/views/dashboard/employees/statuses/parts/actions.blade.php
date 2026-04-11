<div class="d-flex justify-content-center align-items-center mb-0">
    <div class="btn-group" role="group">
        <!-- Edit -->
        <a href="javascript:void(0)" 
           class="btn-premium-action btn-premium-action-edit mr-1 edit_status_button text-decoration-none" 
           title="{!! __('general.edit') !!}" 
           status-id="{!! $status->id !!}"
           status-name-ar="{!! $status->getTranslation('name', 'ar') !!}" 
           status-name-en="{!! $status->getTranslation('name', 'en') !!}">
            <i class="la la-edit"></i>
        </a>

        <!-- Delete -->
        <a href="javascript:void(0)" 
           class="btn-premium-action btn-premium-action-danger delete-confirm text-decoration-none" 
           data-id="{!! $status->id !!}" 
           data-route="{!! route('dashboard.employee.statues.destroy') !!}"
           data-title="{!! __('general.ask_delete_record') !!}" 
           data-text="{!! __('general.delete_warning_text') !!}"
           data-confirm-btn="{!! __('general.yes') !!}" 
           data-cancel-btn="{!! __('general.no') !!}"
           data-success-title="{!! __('general.deleted') !!}" 
           data-success-text="{!! __('general.delete_success_message') !!}"
           title="{!! __('general.delete') !!}">
            <i class="la la-trash"></i>
        </a>
    </div>
</div>
