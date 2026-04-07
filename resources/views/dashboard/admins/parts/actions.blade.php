<div class="form-group mb-0">
    <div class="btn-group" role="group">

        {{-- edit --}}
        <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary edit_admin_button"
            title="{!! __('general.edit') !!}" admin-id="{!! $admin->id !!}" admin-name-ar="{!! $admin->getTranslation('name', 'ar') !!}"
            admin-name-en="{!! $admin->getTranslation('name', 'en') !!}" admin-email="{!! $admin->email !!}"
            admin-role-id="{!! $admin->role_id !!}" admin-status="{!! $admin->status !!}"
            admin-photo="{!! $admin->photo !!}" admin-photo-url="{!! $admin->adminPhoto() !!}">
            <i class="ft-edit-2"></i>
        </a>

        {{-- delete --}}
        <a href="javascript:void(0)"
            class="btn btn-sm {!! Auth::guard('admin')->id() != $admin->id ? 'delete-confirm btn-outline-danger' : 'btn-outline-secondary disable-click' !!}"
            data-id="{!! $admin->id !!}" data-route="{!! route('dashboard.admins.destroy') !!}"
            data-title="{!! __('general.ask_delete_record') !!}" data-text="{!! __('general.delete_warning_text') !!}"
            data-confirm-btn="{!! __('general.yes') !!}" data-cancel-btn="{!! __('general.no') !!}"
            data-success-title="{!! __('general.deleted') !!}" data-success-text="{!! __('general.delete_success_message') !!}"
            title="{!! Auth::guard('admin')->id() == $admin->id ? __('general.prevent_delete') : __('general.delete') !!}">
            <i class="ft-trash-2"></i>
        </a>

    </div>
</div>
