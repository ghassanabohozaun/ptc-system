<div class="d-flex justify-content-center align-items-center mb-0">
    <div class="btn-group" role="group">

        {{-- edit --}}
        <a href="javascript:void(0)" class="btn-premium-action btn-premium-action-edit edit_admin_button"
            title="{!! __('general.edit') !!}" admin-id="{!! $admin->id !!}" admin-name-ar="{!! $admin->getTranslation('name', 'ar') !!}"
            admin-name-en="{!! $admin->getTranslation('name', 'en') !!}" admin-email="{!! $admin->email !!}"
            admin-role-id="{!! $admin->role_id !!}" admin-status="{!! $admin->status !!}"
            admin-photo="{!! $admin->photo !!}" admin-photo-url="{!! $admin->adminPhoto() !!}">
            <i class="la la-edit"></i>
        </a>

        {{-- delete --}}
        @if (Auth::guard('admin')->id() != $admin->id)
            <a href="javascript:void(0)" class="btn-premium-action btn-premium-action-danger delete-confirm"
                data-id="{!! $admin->id !!}" data-route="{!! route('dashboard.admins.destroy') !!}"
                data-title="{!! __('general.ask_delete_record') !!}" data-text="{!! __('general.delete_warning_text') !!}"
                data-confirm-btn="{!! __('general.yes') !!}" data-cancel-btn="{!! __('general.no') !!}"
                data-success-title="{!! __('general.deleted') !!}"
                data-success-text="{!! __('general.delete_success_message') !!}" title="{!! __('general.delete') !!}">
                <i class="la la-trash"></i>
            </a>
        @else
            <button type="button" class="btn-premium-action btn-premium-action-danger disabled"
                style="opacity: 0.5; cursor: not-allowed;" title="{!! __('general.prevent_delete') !!}">
                <i class="la la-trash"></i>
            </button>
        @endif

    </div>
</div>
