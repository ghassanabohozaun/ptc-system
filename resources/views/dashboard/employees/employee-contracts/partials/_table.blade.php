<div class="table-responsive">
    <table class="table table-hover mb-0" id="myTable">
        <thead class="bg-white">
            <tr>
                <th class="text-center d-none d-lg-table-cell align-middle py-3 border-top-0 col-w-45">#</th>
                <th class="align-middle py-3 border-top-0">{!! __('employeeContracts.employee_name') !!}</th>
                <th class="text-center d-none d-lg-table-cell align-middle py-3 border-top-0">{!! __('employeeContracts.contract_duration') !!}</th>
                <th class="text-center align-middle py-3 border-top-0">{!! __('employeeContracts.contract_start_date') !!}</th>
                <th class="text-center d-none d-lg-table-cell align-middle py-3 border-top-0">{!! __('employeeContracts.contract_expiry_date') !!}</th>
                <th class="text-center d-none d-lg-table-cell align-middle py-3 border-top-0">{!! __('employeeContracts.monthly_salary') !!}</th>
                <th class="text-center align-middle py-3 border-top-0 col-w-150">{!! __('general.actions') !!}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employeeContracts as $contract)
                <tr id="row{{ $contract->id }}">
                    <td class="text-center d-none d-lg-table-cell align-middle">
                        <span class="badge badge-info badge-pill badge-glow premium-badge-circle">
                            {{ $loop->iteration }}
                        </span>
                    </td>
                    <td class="align-middle font-weight-bold text-primary">
                        {{ $contract->employee->EmployeeShortName() }}
                    </td>
                    <td class="text-center d-none d-lg-table-cell align-middle">
                        <span class="badge badge-pill bg-light-info text-info px-1 font-weight-bold">
                            {{ contract_duration_arabic($contract->contract_duration) }}
                        </span>
                    </td>
                    <td class="text-center align-middle">
                        <span class="text-muted small">
                            <i class="la la-calendar-check mr-1 text-indigo"></i>{{ $contract->contract_start_date }}
                        </span>
                    </td>
                    <td class="text-center d-none d-lg-table-cell align-middle text-muted small">
                        <i class="la la-calendar-times mr-1 text-danger"></i>{{ $contract->contract_expiry_date }}
                    </td>
                    <td class="text-center d-none d-lg-table-cell align-middle font-weight-bold text-success">
                        {{ number_format($contract->monthly_salary, 0) }} {{ __('general.usd') }}
                    </td>
                    <td class="text-center align-middle">
                        @include('dashboard.employees.employee-contracts.parts.actions', [
                            'contract' => $contract,
                        ])
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center p-3 text-muted border-0">
                        <i class="la la-info-circle mr-1"></i> {!! __('employeeContracts.no_contracts_found') !!}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="pagination-links float-right mt-2">
    {!! $employeeContracts->links() !!}
</div>
