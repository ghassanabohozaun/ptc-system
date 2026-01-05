<div class="badge badge-md {!! $department->status == 1 ? 'badge-success' : 'badge-danger' !!} department_status_{!! $department->id !!}">
    {!! $department->status == 1 ? __('general.enable') : __('general.disabled') !!}
</div>
