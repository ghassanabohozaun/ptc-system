<div class="badge badge-md {!! $dailyReport->status == 'on' ? 'badge-success' : 'badge-danger' !!} dailyReport_status_{!! $dailyReport->id !!}">
    {!! $dailyReport->status == 'on' ? __('general.enable') : __('general.disabled') !!}
</div>
