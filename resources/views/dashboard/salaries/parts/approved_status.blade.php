@if ($salary->employees->count() > 0)
    <div class="badge badge-pill badge-success px-2">
        <i class="ft-check mr-1"></i>
        <span>{!! __('salaries.approved') !!}</span>
    </div>
@else
    <div class="badge badge-pill badge-danger px-2">
        <i class="ft-x mr-1"></i>
        <span>{!! __('salaries.not_approved') !!}</span>
    </div>
@endif
