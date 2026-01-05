<div class="badge badge-md {!! $status->status == 1 ? 'badge-success' : 'badge-danger' !!} employee_status_status_{!! $status->id !!}">
    {!! $status->status == 1 ? __('general.enable') : __('general.disabled') !!}
</div>
