<div class="badge badge-pill badge-light-primary salary_status_{{ $salary->id }} px-2">
    @if ($salary->status == 1)
        <i class="ft-check-circle mr-1 text-success"></i>
        <span class="text-success">{!! __('general.enable') !!}</span>
    @else
        <i class="ft-slash mr-1 text-danger"></i>
        <span class="text-danger">{!! __('general.disabled') !!}</span>
    @endif
</div>
