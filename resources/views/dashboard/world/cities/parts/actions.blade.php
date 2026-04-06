<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        {{-- edit --}}
        <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary edit_city_button"
            title="{!! __('general.edit') !!}" city-id="{!! $city->id !!}" city-name-ar="{!! $city->getTranslation('name', 'ar') !!}"
            city-name-en="{!! $city->getTranslation('name', 'en') !!}" governorate-id="{!! $city->governorate_id !!}">
            <i class="la la-edit"></i>
        </a>

        {{-- delete --}}
        <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger delete-confirm" 
            data-id="{!! $city->id !!}"
            data-route="{!! route('dashboard.cities.destroy') !!}" 
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
