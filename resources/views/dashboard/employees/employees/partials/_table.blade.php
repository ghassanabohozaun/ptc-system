<div class="card">
    <!-- begin: card header -->
    <div class="card-header">
        <h4 class="card-title" id="basic-layout-colored-form-control">
            {!! __('employees.show_all_employees') !!}
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
                            <th>{!! __('employees.full_name') !!}</th>
                            <th class="d-none d-lg-table-cell">{!! __('employees.personal_id') !!}</th>
                            <th class="d-none d-md-table-cell">{!! __('employees.title') !!}</th>
                            <th>{!! __('employees.department_id') !!}</th>
                            <th class="d-none d-lg-table-cell">{!! __('employees.gender') !!}</th>
                            <th class="d-none d-lg-table-cell">{!! __('employees.basic_salary') !!}</th>
                            <th class="text-center">{!! __('general.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $employee)
                            <tr id="row{{ $employee->id }}">
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
                                                    @if (!empty($employee->photo) && file_exists(public_path('uploads/tickets/' . $employee->photo)))
                                                        <div class="avatar-circle avatar-size-100 d-inline-flex align-items-center justify-content-center shadow-sm overflow-hidden"
                                                            style="background-color: #f0f0f0;">
                                                            <img src="{!! asset('/uploads/tickets/' . $employee->photo) !!}"
                                                                alt="{{ $employee->first_name }}" class="img-fluid"
                                                                style="object-fit: cover; width: 100%; height: 100%;">
                                                        </div>
                                                    @else
                                                        <div class="avatar-circle avatar-size-100 d-inline-flex align-items-center justify-content-center text-white shadow-sm"
                                                            style="background-image: linear-gradient(135deg, #626E82 0%, #424e62 100%);">
                                                            <i class="ft-user" style="font-size: 45px;"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                <h4 class="modal-name-title">{{ $employee->EmployeeFullName() }}</h4>
                                                @if ($employee->employeeJobDetails && $employee->employeeJobDetails->employeeStatus)
                                                    <span
                                                        class="modal-role-badge bg-info">{{ $employee->employeeJobDetails->employeeStatus->name }}</span>
                                                @endif
                                            </div>

                                            <div class="modal-info-list mt-2">
                                                <div class="detail-item-modern">
                                                    <div class="icon-circle"><i class="ft-briefcase"></i></div>
                                                    <div class="detail-info-box">
                                                        <span class="detail-info-label">{!! __('employees.title') !!}</span>
                                                        <span
                                                            class="detail-info-value font-weight-bold">{{ $employee->employeeJobDetails->title ?? '-' }}</span>
                                                    </div>
                                                </div>

                                                <div class="detail-item-modern">
                                                    <div class="icon-circle"><i class="ft-layers"></i></div>
                                                    <div class="detail-info-box">
                                                        <span class="detail-info-label">{!! __('employees.department_id') !!}</span>
                                                        <span
                                                            class="detail-info-value">{{ $employee->employeeJobDetails->department->name ?? '-' }}</span>
                                                    </div>
                                                </div>

                                                <div class="detail-item-modern">
                                                    <div class="icon-circle"><i class="ft-hash"></i></div>
                                                    <div class="detail-info-box">
                                                        <span class="detail-info-label">{!! __('employees.personal_id') !!} /
                                                            {!! __('employees.gender') !!}</span>
                                                        <span class="detail-info-value">{{ $employee->personal_id }}
                                                            ({{ $employee->EmployeeGender() }})
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="detail-item-modern border-bottom-0">
                                                    <div class="icon-circle"><i class="ft-pocket"></i></div>
                                                    <div class="detail-info-box">
                                                        <span class="detail-info-label">{!! __('employees.basic_salary') !!}</span>
                                                        <span class="detail-info-value text-success font-weight-bold">
                                                            {{ number_format($employee->basic_salary, 2) }}
                                                            {{ $employee->currency }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center d-none d-lg-table-cell">{!! $loop->iteration !!}</td>
                                <td class="font-weight-bold text-primary">{!! $employee->EmployeeShortName() !!}</td>
                                <td class="d-none d-lg-table-cell">{!! $employee->personal_id !!}</td>
                                <td class="d-none d-md-table-cell text-center">
                                    <span class="badge badge-pill bg-light-info text-info px-1 font-weight-bold">
                                        {{ $employee->employeeJobDetails->title ?? '-' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="text-muted">
                                        {!! $employee->employeeJobDetails->department->name ?? '' !!}
                                    </span>
                                </td>
                                <td class="d-none d-lg-table-cell">{!! $employee->EmployeeGender() !!}</td>
                                <td class="d-none d-lg-table-cell">
                                    <span class="text-success font-weight-bold">{!! number_format($employee->basic_salary, 2) !!}</span>
                                    <small class="text-muted">{!! $employee->currency !!}</small>
                                </td>
                                <td class="text-center">
                                    @include('dashboard.employees.employees.parts.actions')
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center p-3 text-muted">
                                    <i class="ft-info mr-1"></i> {!! __('employees.no_employees_found') !!}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="pagination-links float-right mt-2">
                {!! $employees->links() !!}
            </div>
        </div>
    </div>
    <!-- end: card content -->
</div>
