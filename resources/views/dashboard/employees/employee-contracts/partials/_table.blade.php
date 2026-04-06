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
                            <th class="text-center d-lg-none">#</th>
                            <th class="text-center d-none d-lg-table-cell">#</th>
                            <th class="text-center">{!! __('employeeContracts.employee_name') !!}</th>
                            <th class="text-center d-none d-lg-table-cell">{!! __('employeeContracts.contract_duration') !!}</th>
                            <th class="text-center">{!! __('employeeContracts.contract_start_date') !!}</th>
                            <th class="text-center d-none d-lg-table-cell">{!! __('employeeContracts.contract_expiry_date') !!}</th>
                            <th class="text-center d-none d-lg-table-cell">{!! __('employeeContracts.monthly_salary') !!}</th>
                            <th class="text-center">{!! __('general.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($employeeContracts as $contract)
                            <tr id="row{{ $contract->id }}">
                                <td class="text-center d-lg-none">
                                    <span class="details-control pointer">
                                        <i class="ft-plus-circle text-info font-medium-3"></i>
                                    </span>
                                    <!-- Hidden Details for AJAX Modal -->
                                    <div class="row-details d-none">
                                        <div class="modal-details-card">
                                            <div class="premium-modal-header"></div>
                                            <div class="text-center">
                                                <div class="modal-profile-wrapper">
                                                    <div class="avatar-circle avatar-size-100 d-inline-flex align-items-center justify-content-center text-white text-uppercase shadow-sm"
                                                        style="background-color: #00A5A8;">
                                                        {!! strtoupper(substr($contract->employee->first_name ?? 'E', 0, 1)) !!}
                                                    </div>
                                                </div>
                                                <h4 class="modal-name-title">
                                                    {{ $contract->employee->EmployeeFullName() }}</h4>
                                                <span
                                                    class="modal-role-badge">{{ $contract->employee->employeeJobDetails->title ?? __('employeeContracts.employee_contracts') }}</span>
                                            </div>
                                            <div class="modal-info-list mt-2">
                                                <div class="detail-item-modern">
                                                    <div class="icon-circle"><i class="ft-calendar"></i></div>
                                                    <div class="detail-info-box">
                                                        <span class="detail-info-label">{!! __('employeeContracts.contract_duration') !!}</span>
                                                        <span
                                                            class="detail-info-value">{{ $contract->contract_duration }}</span>
                                                    </div>
                                                </div>
                                                <div class="detail-item-modern">
                                                    <div class="icon-circle"><i class="ft-clock"></i></div>
                                                    <div class="detail-info-box">
                                                        <span class="detail-info-label">{!! __('employeeContracts.contract_start_date') !!}</span>
                                                        <span
                                                            class="detail-info-value">{{ $contract->contract_start_date }}</span>
                                                    </div>
                                                </div>
                                                <div class="detail-item-modern">
                                                    <div class="icon-circle"><i class="ft-alert-circle"></i></div>
                                                    <div class="detail-info-box">
                                                        <span class="detail-info-label">{!! __('employeeContracts.contract_expiry_date') !!}</span>
                                                        <span
                                                            class="detail-info-value">{{ $contract->contract_expiry_date }}</span>
                                                    </div>
                                                </div>
                                                <div class="detail-item-modern">
                                                    <div class="icon-circle"><i class="ft-pocket"></i></div>
                                                    <div class="detail-info-box">
                                                        <span class="detail-info-label">{!! __('employeeContracts.monthly_salary') !!}</span>
                                                        <span
                                                            class="detail-info-value">{{ number_format($contract->monthly_salary, 2) }}
                                                            {{ __('general.usd') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center d-none d-lg-table-cell">{{ $loop->iteration }}</td>
                                <td class="text-center font-weight-bold">{{ $contract->employee->name ?? '-' }}</td>
                                <td class="text-center d-none d-lg-table-cell">{{ $contract->contract_duration }}</td>
                                <td class="text-center text-info">{{ $contract->contract_start_date }}</td>
                                <td class="text-center d-none d-lg-table-cell text-danger">
                                    {{ $contract->contract_expiry_date }}</td>
                                <td class="text-center d-none d-lg-table-cell font-weight-bold">
                                    {{ number_format($contract->monthly_salary, 0) }}</td>
                                <td class="text-center">
                                    @include('dashboard.employees.employee-contracts.parts.actions', [
                                        'contract' => $contract,
                                    ])
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center p-3 text-muted">
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
    <!-- end: card content -->
</div>
