<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">


        {{-- edit --}}
        <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary edit_governorate_button"
            title="{!! __('general.edit') !!}" governorate-id="{!! $governorate->id !!}"
            governorate-name-ar="{!! $governorate->getTranslation('name', 'ar') !!}" governorate-name-en="{!! $governorate->getTranslation('name', 'en') !!}">
            <i class="la la-edit"></i>
        </a>

        {{-- delete --}}
        <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger delete-confirm" 
            data-id="{!! $governorate->id !!}"
            data-route="{!! route('dashboard.governorates.destroy') !!}" 
            data-title="{!! __('general.ask_delete_record') !!}"
            data-text="{!! __('general.delete_warning_text') !!}" 
            data-confirm-btn="{!! __('general.yes') !!}"
            data-cancel-btn="{!! __('general.no') !!}" 
            data-success-title="{!! __('general.deleted') !!}"
            data-success-text="{!! __('general.delete_success_message') !!}">
            <i class="la la-trash"></i>
        </a>
    </div>
</div>
