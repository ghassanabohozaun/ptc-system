<div class="d-flex justify-content-center align-items-center mb-0">
    <div class="btn-group" role="group">

        {{-- show --}}
        <a href="{!! route('dashboard.employees.show', $employee->id) !!}" class="btn-premium-action btn-premium-action-info"
            title="{!! __('general.show') !!}">
            <i class="la la-eye"></i>
        </a>

        {{-- edit --}}
        <a href="{!! route('dashboard.employees.edit', $employee->id) !!}" class="btn-premium-action btn-premium-action-edit"
            title="{!! __('general.edit') !!}">
            <i class="la la-edit"></i>
        </a>

        {{-- delete --}}
        <a href="javascript:void(0)" class="btn-premium-action btn-premium-action-danger delete-confirm"
            data-id="{!! $employee->id !!}" data-route="{!! route('dashboard.employees.destroy') !!}"
            data-title="{!! __('general.ask_delete_record') !!}" data-text="{!! __('general.delete_warning_text') !!}"
            data-confirm-btn="{!! __('general.yes') !!}" data-cancel-btn="{!! __('general.no') !!}"
            data-success-title="{!! __('general.deleted') !!}" data-success-text="{!! __('general.delete_success_message') !!}"
            title="{!! __('general.delete') !!}">
            <i class="la la-trash"></i>
        </a>

    </div>
</div>
