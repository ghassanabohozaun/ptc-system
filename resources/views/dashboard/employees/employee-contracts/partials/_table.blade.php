<div class="card">
    <!-- begin: card header -->
    <div class="card-header">
        <h4 class="card-title" id="basic-layout-colored-form-control">
            {!! __('employeeContracts.employee_contracts') !!}
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
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{!! __('employeeContracts.employee_name') !!}</th>
                            <th>{!! __('employeeContracts.contract_duration') !!}</th>
                            <th>{!! __('employeeContracts.contract_start_date') !!}</th>
                            <th>{!! __('employeeContracts.contract_expiry_date') !!}</th>
                            <th>{!! __('employeeContracts.monthly_salary') !!}</th>
                            <th>{!! __('general.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($employeeContracts as $contract)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $contract->employee->name ?? '-' }}</td>
                                <td>{{ $contract->contract_duration }}</td>
                                <td>{{ $contract->contract_start_date }}</td>
                                <td>{{ $contract->contract_expiry_date }}</td>
                                <td>{{ $contract->monthly_salary }}</td>
                                <td>
                                    @include('dashboard.employees.employee-contracts.parts.actions', ['contract' => $contract])
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    {!! __('employeeContracts.no_contracts_found') !!}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination-links float-right">
                {!! $employeeContracts->links() !!}
            </div>
        </div>
    </div>
    <!-- end: card content -->
</div>
