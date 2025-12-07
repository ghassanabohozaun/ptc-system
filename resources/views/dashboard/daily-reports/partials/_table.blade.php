<div class="card">
    <!-- begin: card header -->
    <div class="card-header">
        <h4 class="card-title" id="basic-layout-colored-form-control">
            {!! __('dailyReports.show_all_daily_reports') !!}
        </h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
        </div>
    </div>
    <!-- end: card header -->

    <!-- begin: card content -->
    <div class="card-content collapse show">
        <div class="card-body">
            <div class="table-responsive"></div>
            <table id="yajra-datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{!! __('dailyReports.employee_id') !!}</th>
                        <th>{!! __('dailyReports.details') !!}</th>
                        <th>{!! __('dailyReports.date') !!}</th>
                        <th>{!! __('dailyReports.time') !!}</th>
                        <th>{!! __('dailyReports.created_at') !!}</th>
                        <th>{!! __('dailyReports.status') !!}</th>
                        <th>{!! __('dailyReports.manage_status') !!}</th>
                        <th>{!! __('general.actions') !!}</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end: card content -->
