<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        {{-- edit --}}
        <a href="#" class="btn btn-sm btn-outline-primary edit_department_button" title="{!! __('general.edit') !!}"
            department-id="{!! $department->id !!}" department-name-ar="{!! $department->getTranslation('name', 'ar') !!}"
            department-name-en="{!! $department->getTranslation('name', 'en') !!}">
            <i class="la la-edit"></i>
        </a>

        {{-- delete --}}
        <a href="#" class="btn btn-sm btn-outline-danger delete_department_btn" data-id="{!! $department->id !!}">
            <i class="la la-trash"></i>
        </a>
    </div>
</div>
