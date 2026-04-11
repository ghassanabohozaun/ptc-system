<div class="badge badge-pill badge-glow admin_status_{!! $admin->id !!} {!! $admin->status == 1 ? 'badge-success' : 'badge-danger' !!}" style="font-size: 11px; padding: 4px 10px;">
    {!! $admin->status == 1 ? __('general.enable') : __('general.disabled') !!}
</div>
