<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        <a href="{!! route('dashboard.roles.edit', $role->id) !!}" class="btn btn-sm btn-outline-primary">
            <i class="la la-edit"></i>
        </a>

        {{-- edit --}}
        {{-- <a href="#" class="btn btn-sm btn-outline-primary edit_role_button" title="{!! __('general.edit') !!}"
            role-id="{!! $role->id !!}" role-ar="{!! $role->getTranslation('role', 'ar') !!}" role-en="{!! $role->getTranslation('role', 'en') !!}"
            permissions="{!! implode(' ', $role->permissions) !!}">
            <i class="la la-edit"></i>
        </a> --}}


        {{-- <a href="javascript:void(0)"
            onclick="if(confirm('Are you want to delete recors')) {document.getElementById('delete_form_{{ $role->id }}').submit();} return false"
            class="btn btn-social-icon btn-sm mr-1 btn-outline-danger btn-round ">
            <i class="la la-trash"></i>
        </a> --}}

        <a href="#" class="btn btn-sm btn-outline-danger delete_role_btn" data-id="{!! $role->id !!}"
            title="{!! __('general.delete') !!}">
            <i class="la la-trash"></i>
        </a>

    </div>
</div>
