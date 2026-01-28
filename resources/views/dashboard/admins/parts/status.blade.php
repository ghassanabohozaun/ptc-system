<div class="badge badge-md {!! $admin->status == 1 ? 'badge-success' : 'badge-danger' !!} admin_status_{!! $admin->id !!}">
    {!! $admin->status == 1 ? __('general.enable') : __('general.disabled') !!}
</div>
