<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        {{-- edit --}}
        <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary edit_department_button"
            title="{!! __('general.edit') !!}" department-id="{!! $department->id !!}"
            department-name-ar="{!! $department->getTranslation('name', 'ar') !!}" department-name-en="{!! $department->getTranslation('name', 'en') !!}">
            <i class="la la-edit"></i>
        </a>


        {{-- delete --}}
        <a href="javascript:void(0)" class="btn btn-sm delete-confirm btn-outline-danger !!} "
            data-id="{!! $department->id !!}" data-route="{!! route('dashboard.departments.destroy') !!}" data-title="{!! __('general.ask_delete_record') !!}"
            data-text="{!! __('general.delete_warning_text') !!}" data-confirm-btn="{!! __('general.yes') !!}"
            data-cancel-btn="{!! __('general.no') !!}" data-success-title="{!! __('general.deleted') !!}"
            data-success-text="{!! __('general.delete_success_message') !!}">
            <i class="la la-trash"></i>
        </a>

    </div>
</div>
