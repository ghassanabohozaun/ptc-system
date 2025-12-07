<div class="badge badge-md {!! $dailyReport->status == 1 ? 'badge-success' : 'badge-danger' !!} dailyReport_status_{!! $dailyReport->id !!}">
    {!! $dailyReport->status == 1 ? __('general.enable') : __('general.disabled') !!}
</div>
