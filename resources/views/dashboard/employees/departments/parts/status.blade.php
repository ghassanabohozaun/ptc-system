<div class="badge badge-pill badge-glow department_status_{!! $department->id !!} {!! $department->status == 1 ? 'badge-success' : 'badge-danger' !!}" style="font-size: 11px; padding: 4px 10px;">
    {!! $department->status == 1 ? __('general.enable') : __('general.disabled') !!}
</div>
