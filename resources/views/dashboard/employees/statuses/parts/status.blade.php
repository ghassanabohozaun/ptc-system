<div class="badge badge-pill badge-glow premium-status-badge employee_status_status_{!! $status->id !!} {!! $status->status == 1 ? 'badge-success' : 'badge-danger' !!}">
    {!! $status->status == 1 ? __('general.enable') : __('general.disabled') !!}
</div>
