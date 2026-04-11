<div class="card premium-card shadow-lg border-0">
    <div class="card-header border-0 bg-transparent py-3">
        <h4 class="card-title font-weight-bold">
            <i class="la la-file-text mr-1 text-primary"></i> {!! __('employeeContracts.employee_contracts') !!}
        </h4>
    </div>

    <div class="card-content collapse show">
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-center d-none d-lg-table-cell col-w-45">#</th>
                            <th>{!! __('employeeContracts.employee_name') !!}</th>
                            <th class="text-center d-none d-lg-table-cell">{!! __('employeeContracts.contract_duration') !!}</th>
                            <th class="text-center">{!! __('employeeContracts.contract_start_date') !!}</th>
                            <th class="text-center d-none d-lg-table-cell">{!! __('employeeContracts.contract_expiry_date') !!}</th>
                            <th class="text-center d-none d-lg-table-cell">{!! __('employeeContracts.monthly_salary') !!}</th>
                            <th class="text-center col-w-150">{!! __('general.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($employeeContracts as $contract)
                            <tr id="row{{ $contract->id }}">
                                <td class="text-center d-none d-lg-table-cell">
                                    <span class="badge badge-info badge-pill badge-glow premium-badge-circle">
                                        {{ $loop->iteration }}
                                    </span>
                                </td>
                                <td class="font-weight-bold text-primary">
                                    {{ $contract->employee->EmployeeFullName() }}
                                </td>
                                <td class="text-center d-none d-lg-table-cell">
                                    <span class="badge badge-pill bg-light-info text-info px-1 font-weight-bold">
                                        {{ $contract->contract_duration }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="text-muted small">
                                        <i class="la la-calendar-check mr-1"></i>{{ $contract->contract_start_date }}
                                    </span>
                                </td>
                                <td class="text-center d-none d-lg-table-cell text-muted small">
                                    {{ $contract->contract_expiry_date }}
                                </td>
                                <td class="text-center d-none d-lg-table-cell font-weight-bold text-success">
                                    {{ number_format($contract->monthly_salary, 0) }} {{ __('general.usd') }}
                                </td>
                                <td class="text-center">
                                    @include('dashboard.employees.employee-contracts.parts.actions', [
                                        'contract' => $contract,
                                    ])
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center p-3 text-muted">
                                    <i class="ft-info mr-1"></i> {!! __('employeeContracts.no_contracts_found') !!}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination-links float-right mt-2">
                {!! $employeeContracts->links() !!}
            </div>
        </div>
    </div>
</div>
