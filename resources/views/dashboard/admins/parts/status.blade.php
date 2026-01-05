<div class="badge badge-md {!! $admin->status == 'on' ? 'badge-success' : 'badge-danger' !!} admin_status_{!! $admin->id !!}" >
    {!! $admin->status == 'on' ? __('general.enable') : __('general.disabled') !!}
</div>
