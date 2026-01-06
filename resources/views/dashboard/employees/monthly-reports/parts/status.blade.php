<div class="badge badge-md {!! $monthlyReport->status == 'on' ? 'badge-success' : 'badge-danger' !!} monthlyReport_status_{!! $monthlyReport->id !!}">
    {!! $monthlyReport->status == 'on' ? __('general.enable') : __('general.disabled') !!}
</div>
