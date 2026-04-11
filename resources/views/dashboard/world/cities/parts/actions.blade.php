<div class="d-flex justify-content-center align-items-center">
    {{-- edit --}}
    <a href="javascript:void(0)" class="btn-premium-action btn-premium-action-edit edit_city_button mr-2"
        title="{!! __('general.edit') !!}" city-id="{!! $city->id !!}"
        city-name-ar="{!! $city->getTranslation('name', 'ar') !!}" city-name-en="{!! $city->getTranslation('name', 'en') !!}"
        governorate-id="{!! $city->governorate_id !!}">
        <i class="la la-edit"></i>
    </a>

    {{-- delete --}}
    <a href="javascript:void(0)" class="btn-premium-action btn-premium-action-danger delete-confirm"
        data-id="{!! $city->id !!}" data-route="{!! route('dashboard.cities.destroy') !!}"
        data-title="{!! __('general.ask_delete_record') !!}" data-text="{!! __('general.delete_warning_text') !!}"
        data-confirm-btn="{!! __('general.yes') !!}" data-cancel-btn="{!! __('general.no') !!}"
        data-success-title="{!! __('general.deleted') !!}" data-success-text="{!! __('general.delete_success_message') !!}"
        title="{!! __('general.delete') !!}">
        <i class="la la-trash"></i>
    </a>
</div>
