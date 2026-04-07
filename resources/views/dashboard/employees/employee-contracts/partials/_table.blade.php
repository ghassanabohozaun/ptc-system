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
        <div class="card-body px-1">
            <div class="table-responsive">
                <table class="table table-hover table-xl" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>{!! __('employeeContracts.employee_name') !!}</th>
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
                                <td class="text-center">
                                    <span class="details-control pointer d-lg-none">
                                        <i class="ft-plus-circle text-info font-medium-3"></i>
                                    </span>
                                    <span class="d-none d-lg-inline">{{ $loop->iteration }}</span>

                                    <!-- Hidden Details for AJAX Modal -->
                                    <div class="row-details d-none">
                                        <div class="modal-details-card">
                                            <div class="premium-modal-header"></div>
                                            <div class="text-center">
                                                <div class="modal-profile-wrapper">
                                                    <div class="avatar-circle avatar-size-100 d-inline-flex align-items-center justify-content-center text-white text-uppercase shadow-sm"
                                                        style="background-color: #1F3BB3; border: 4px solid #fff;">
                                                        <i class="ft-file-text" style="font-size: 40px;"></i>
                                                    </div>
                                                </div>
                                                <h4 class="modal-name-title">
                                                    {{ $contract->employee->EmployeeFullName() }}</h4>
                                                <span
                                                    class="modal-role-badge text-muted small">{{ $contract->employee->employeeJobDetails->title ?? __('employeeContracts.employee_contracts') }}</span>
                                            </div>
                                            <div class="modal-info-list mt-2">
                                                <div class="detail-item-modern">
                                                    <div class="icon-circle"><i class="ft-clock"></i></div>
                                                    <div class="detail-info-box">
                                                        <span class="detail-info-label">{!! __('employeeContracts.contract_duration') !!}</span>
                                                        <span
                                                            class="detail-info-value">{{ $contract->contract_duration }}</span>
                                                    </div>
                                                </div>
                                                <div class="detail-item-modern">
                                                    <div class="icon-circle"><i class="ft-calendar"></i></div>
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
                                                    <div class="icon-circle"><i class="la la-dollar"></i></div>
                                                    <div class="detail-info-box">
                                                        <span class="detail-info-label">{!! __('employeeContracts.monthly_salary') !!}</span>
                                                        <span
                                                            class="detail-info-value">{{ number_format($contract->monthly_salary, 0) }}
                                                            {{ __('general.usd') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="font-weight-bold employee-name-cell">{{ $contract->employee->EmployeeFullName() }}</span>
                                    </div>
                                </td>
                                <td class="text-center d-none d-lg-table-cell">
                                    <span
                                        class="badge badge-pill badge-secondary">{{ $contract->contract_duration }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="text-primary font-small-3"><i
                                            class="ft-calendar mr-1"></i>{{ $contract->contract_start_date }}</span>
                                </td>
                                <td class="text-center d-none d-lg-table-cell">
                                    <span class="text-muted font-small-3">{{ $contract->contract_expiry_date }}</span>
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
                                    <div class="p-3">
                                        <i class="ft-info font-large-1 d-block mb-1"></i>
                                        {!! __('employeeContracts.no_contracts_found') !!}
                                    </div>
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
