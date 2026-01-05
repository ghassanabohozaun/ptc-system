<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">


        {{-- edit --}}
        <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary edit_governorate_button"
            title="{!! __('general.edit') !!}" governorate-id="{!! $governorate->id !!}"
            governorate-name-ar="{!! $governorate->getTranslation('name', 'ar') !!}" governorate-name-en="{!! $governorate->getTranslation('name', 'en') !!}">
            <i class="la la-edit"></i>
        </a>

        {{-- delete --}}
        {{-- <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger delete_governorate_btn"
            data-id="{!! $governorate->id !!}">
            <i class="la la-trash"></i>
        </a> --}}
    </div>
</div>
