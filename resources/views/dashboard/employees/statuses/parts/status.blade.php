<div class="badge badge-pill badge-glow employee_status_status_{!! $status->id !!} {!! $status->status == 1 ? 'badge-success' : 'badge-danger' !!}" style="font-size: 12px; font-weight: bold; padding: 5px 12px;">
    {!! $status->status == 1 ? __('general.enable') : __('general.disabled') !!}
</div>
