@if ($monthlyReport->status == 'new')
    <div class="badge badge-info">
        {!! __('monthlyReports.new') !!}
    </div>
@elseif($monthlyReport->status == 'initial_review')
    <div class="badge badge-warning">
        {!! __('monthlyReports.initial_review') !!}
    </div>
@elseif($monthlyReport->status == 'initial_refuse')
    <div class="badge badge-danger">
        {!! __('monthlyReports.initial_refuse') !!}
    </div>
@elseif($monthlyReport->status == 'intital_approved')
    <div class="badge badge-success">
        {!! __('monthlyReports.intital_approved') !!}
    </div>
@elseif($monthlyReport->status == 'final_review')
    <div class="badge badge-warning">
        {!! __('monthlyReports.final_review') !!}
    </div>
@elseif($monthlyReport->status == 'final_refuse')
    <div class="badge badge-danger">
        {!! __('monthlyReports.final_refuse') !!}
    </div>
@elseif($monthlyReport->status == 'approved')
    <div class="badge badge-success">
        {!! __('monthlyReports.approved') !!}
    </div>
@endif
