<div class="badge badge-md {!! $salary->status == 1 ? 'border-success success' : 'border-danger danger ' !!} salary_status_{!! $salary->id !!}">
    {!! $salary->status == 1 ? __('general.enable') : __('general.disabled') !!}
</div>
