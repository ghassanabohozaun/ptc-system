<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">


        {{-- edit --}}
        <a href="#" class="btn btn-sm btn-outline-primary edit_status_button" title="{!! __('general.edit') !!}"
            status-id="{!! $status->id !!}" status-name-ar="{!! $status->getTranslation('name', 'ar') !!}"
            status-name-en="{!! $status->getTranslation('name', 'en') !!}">
            <i class="la la-edit"></i>
        </a>

        {{-- delete --}}
        <a href="#" class="btn btn-sm btn-outline-danger delete_employee_status_btn"
            data-id="{!! $status->id !!}">
            <i class="la la-trash"></i>
        </a>
    </div>
</div>
