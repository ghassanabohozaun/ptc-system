<div class="form-group mb-0">
    <div class="btn-group" role="group">

        {{-- edit --}}
        <a href="{!! route('dashboard.roles.edit', $role->id) !!}" class="btn btn-sm btn-outline-primary"
            title="{!! __('general.edit') !!}">
            <i class="ft-edit-2"></i>
        </a>

        {{-- delete --}}
        <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger delete-confirm"
            data-id="{!! $role->id !!}" data-route="{!! route('dashboard.roles.destroy') !!}"
            data-title="{!! __('general.ask_delete_record') !!}" data-text="{!! __('general.delete_warning_text') !!}"
            data-confirm-btn="{!! __('general.yes') !!}" data-cancel-btn="{!! __('general.no') !!}"
            data-success-title="{!! __('general.deleted') !!}" data-success-text="{!! __('general.delete_success_message') !!}"
            title="{!! __('general.delete') !!}">
            <i class="ft-trash-2"></i>
        </a>

    </div>
</div>
