<div class="badge badge-pill badge-glow department_status_{!! $department->id !!} {!! $department->status == 1 ? 'badge-success' : 'badge-danger' !!}" style="font-size: 12px; font-weight: bold; padding: 5px 12px;">
    {!! $department->status == 1 ? __('general.enable') : __('general.disabled') !!}
</div>
