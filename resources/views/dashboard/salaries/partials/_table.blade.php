<div class="card">
    <!-- begin: card header -->
    <div class="card-header">
        <h4 class="card-title" id="basic-layout-colored-form-control">
            {!! __('salaries.show_all_salaries') !!}
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
            <div class="table-responsive">
                <table class="table" id='myTable'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{!! __('salaries.month') !!}</th>
                            <th>{!! __('salaries.admin_id') !!}</th>
                            <th class="text-center">{!! __('salaries.salareis_count') !!}</th>
                            <th class="text-center">{!! __('salaries.salareis_sum') !!}</th>
                            <th class="text-center">{!! __('salaries.approved_status') !!}</th>
                            <th class="text-center">{!! __('salaries.status') !!}</th>
                            <th class="text-center">{!! __('salaries.manage_status') !!}</th>
                            <th class="text-center">{!! __('general.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($salaries as $salary)
                            <tr>
                                <th class="col-lg-1">{!! $loop->iteration !!} </th>
                                <td class="col-lg-2">{!! $salary->month !!} / {!! $salary->year !!}</td>
                                <td class="col-lg-2">{!! $salary->admin->name !!}</td>
                                <td class="col-lg-2 text-center">{!! $salary->employees->count() !!}</td>
                                <td class="col-lg-2 text-center">{!! $salary->employees->sum('pivot.amount') !!}</td>
                                <td class="col-lg-2 text-center">
                                    @include('dashboard.salaries.parts.approved_status')
                                </td>
                                <td class="col-lg-2 text-center">
                                    @include('dashboard.salaries.parts.status')
                                </td>
                                <td class="col-lg-2 text-center">
                                    @include('dashboard.salaries.parts.manage_status')
                                </td>
                                <td class="col-lg-1">
                                    @include('dashboard.salaries.parts.actions')
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">
                                    {!! __('salaries.no_salaries_found') !!}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
            <div class="float-right">
                {!! $salaries->links() !!}
            </div>
        </div>
    </div>
    <!-- end: card content -->
</div>
