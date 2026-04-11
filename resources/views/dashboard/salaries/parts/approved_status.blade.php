@if ($salary->employees->count() > 0)
    <div class="badge badge-pill badge-glow badge-success px-2 py-1" style="font-size: 12px; font-weight: bold;">
        <i class="la la-check-circle mr-1"></i>
        <span>{!! __('salaries.approved') !!}</span>
    </div>
@else
    <div class="badge badge-pill badge-glow badge-danger px-2 py-1" style="font-size: 12px; font-weight: bold;">
        <i class="la la-times-circle mr-1"></i>
        <span>{!! __('salaries.not_approved') !!}</span>
    </div>
@endif
