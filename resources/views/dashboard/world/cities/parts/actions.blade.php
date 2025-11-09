<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        {{-- edit --}}
        <a href="#" class="btn btn-sm btn-outline-primary edit_city_button" title="{!! __('general.edit') !!}"
            city-id="{!! $city->id !!}" city-name-ar="{!! $city->getTranslation('name', 'ar') !!}" city-name-en="{!! $city->getTranslation('name', 'en') !!}"
            governorate-id="{!! $city->governorate_id !!}">
            <i class="la la-edit"></i>
        </a>

        {{-- delete --}}
        {{-- <a href="#" class="btn btn-sm btn-outline-danger delete_city_btn" data-id="{!! $city->id !!}">
            <i class="la la-trash"></i>
        </a> --}}

    </div>
</div>
