<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">


        {{-- edit --}}
        <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary edit_admin_button"
            title="{!! __('general.edit') !!}" admin-id="{!! $admin->id !!}" admin-name-ar="{!! $admin->getTranslation('name', 'ar') !!}"
            admin-name-en="{!! $admin->getTranslation('name', 'en') !!}" admin-email="{!! $admin->email !!}"
            admin-role-id="{!! $admin->role_id !!}" admin-status="{!! $admin->status !!}">
            <i class="la la-edit"></i>
        </a>


        {{-- delete --}}
        <a href="javascript:void(0)" class="btn btn-sm  {!! Auth::guard('admin')->id() != $admin->id ? 'delete-confirm btn-outline-danger' : ' btn-outline-secondary ' !!} " data-id="{!! $admin->id !!}"
            data-route="{!! route('dashboard.admins.destroy') !!}" data-title="{!! __('general.ask_delete_record') !!}"
            data-text="{!! __('general.delete_warning_text') !!}" data-confirm-btn="{!! __('general.yes') !!}"
            data-cancel-btn="{!! __('general.no') !!}" data-success-title="{!! __('general.deleted') !!}"
            data-success-text="{!! __('general.delete_success_message') !!}" title = '{!! Auth::guard('admin')->id() == $admin->id ? __('general.prevent_delete') : '' !!}'>
            <i class="la la-trash"></i>
        </a>


    </div>
</div>
