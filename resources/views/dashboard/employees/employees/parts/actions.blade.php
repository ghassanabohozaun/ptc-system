<div class="form-group mb-0">
    <div class="btn-group" role="group">

        {{-- edit --}}
        <a href="{!! route('dashboard.employees.edit', $employee->id) !!}" class="btn btn-sm btn-outline-primary"
            title="{!! __('general.edit') !!}">
            <i class="ft-edit-2"></i>
        </a>

        {{-- show --}}
        <a href="{!! route('dashboard.employees.show', $employee->id) !!}" class="btn btn-sm btn-outline-info"
            title="{!! __('general.show') !!}">
            <i class="ft-eye"></i>
        </a>

        {{-- delete --}}
        <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger delete-confirm"
            data-id="{!! $employee->id !!}" data-route="{!! route('dashboard.employees.destroy') !!}"
            data-title="{!! __('general.ask_delete_record') !!}" data-text="{!! __('general.delete_warning_text') !!}"
            data-confirm-btn="{!! __('general.yes') !!}" data-cancel-btn="{!! __('general.no') !!}"
            data-success-title="{!! __('general.deleted') !!}" data-success-text="{!! __('general.delete_success_message') !!}"
            title="{!! __('general.delete') !!}">
            <i class="ft-trash-2"></i>
        </a>

    </div>
</div>
