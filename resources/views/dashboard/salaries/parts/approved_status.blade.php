@if ($salary->employees->count() > 0)
    <div class="badge badge-md  badge-danger"></div>

    <div class="badge border-left-success border-right-success round badge-striped">
        <i class="la la-check font-medium-2 text-success"></i>
        {{-- <span>{!! __('salaries.approved') !!}</span> --}}
    </div>
@else
    <div class="badge badge-md  badge-danger"></div>

    <div class="badge border-left-danger border-right-danger round badge-striped">
        <i class="la la-close font-medium-2 text-danger"></i>
        {{-- <span>{!! __('salaries.not_approved') !!}</span> --}}
    </div>
@endif
