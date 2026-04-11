<div class="d-flex justify-content-center align-items-center mb-0">
    <div class="btn-group" role="group">

        {{-- edit --}}
        <a href="javascript:void(0)" class="btn-premium-action btn-premium-action-edit edit_governorate_button"
            title="{!! __('general.edit') !!}" governorate-id="{!! $governorate->id !!}"
            governorate-name-ar="{!! $governorate->getTranslation('name', 'ar') !!}"
            governorate-name-en="{!! $governorate->getTranslation('name', 'en') !!}">
            <i class="la la-edit"></i>
        </a>

        {{-- delete --}}
        <a href="javascript:void(0)" class="btn-premium-action btn-premium-action-danger delete-confirm"
            data-id="{!! $governorate->id !!}" data-route="{!! route('dashboard.governorates.destroy') !!}"
            data-title="{!! __('general.ask_delete_record') !!}" data-text="{!! __('general.delete_warning_text') !!}"
            data-confirm-btn="{!! __('general.yes') !!}" data-cancel-btn="{!! __('general.no') !!}"
            data-success-title="{!! __('general.deleted') !!}" data-success-text="{!! __('general.delete_success_message') !!}"
            title="{!! __('general.delete') !!}">
            <i class="la la-trash"></i>
        </a>

    </div>
</div>
