<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        {{-- <a href="{!! route('dashboard.admins.edit', $admin->id) !!}" class="btn btn-sm btn-outline-primary">
            <i class="la la-edit"></i>
        </a> --}}


        {{-- edit --}}
        <a href="#" class="btn btn-sm btn-outline-primary edit_admin_button" title="{!! __('general.edit') !!}"
            admin-id="{!! $admin->id !!}" admin-name-ar="{!! $admin->getTranslation('name', 'ar') !!}"
            admin-name-en="{!! $admin->getTranslation('name', 'en') !!}" admin-email="{!! $admin->email !!}"
            admin-role-id="{!! $admin->role_id !!}" admin-status="{!! $admin->status !!}">
            <i class="la la-edit"></i>
        </a>

        <a href="#" class="btn btn-sm  {!! Auth::guard('admin')->id() != $admin->id ? 'delete_admin_btn btn-outline-danger' : ' btn-outline-secondary ' !!} " data-id="{!! $admin->id !!}"
            title = '{!! Auth::guard('admin')->id() == $admin->id ? __('general.prevent_delete') : '' !!}'>
            <i class="la la-trash"></i>
        </a>
        <!-- #endregion -->

    </div>
</div>
