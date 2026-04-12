<div class="table-responsive">
    <table class="table table-hover mb-0" id="myTable">
        <thead class="bg-white">
            <tr>
                <th class="text-center d-lg-none align-middle py-3 border-top-0">#</th>
                <th class="d-none d-lg-table-cell align-middle py-3 border-top-0">#</th>
                <th class="text-center align-middle py-3 border-top-0" style="width: 60px;">{!! __('employees.photo') !!}</th>
                <th class="align-middle py-3 border-top-0">{!! __('employees.full_name') !!}</th>
                <th class="d-none d-lg-table-cell align-middle py-3 border-top-0">{!! __('employees.personal_id') !!}</th>
                <th class="d-none d-md-table-cell text-center align-middle py-3 border-top-0">{!! __('employees.title') !!}</th>
                <th class="align-middle py-3 border-top-0">{!! __('employees.department_id') !!}</th>
                <th class="d-none d-lg-table-cell align-middle py-3 border-top-0">{!! __('world.governorate') !!} / {!! __('world.city') !!}</th>
                <th class="d-none d-lg-table-cell align-middle py-3 border-top-0">{!! __('employees.gender') !!}</th>
                <th class="d-none d-lg-table-cell align-middle py-3 border-top-0">{!! __('employees.basic_salary') !!}</th>
                <th class="text-center align-middle py-3 border-top-0">{!! __('general.actions') !!}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employees as $employee)
                <tr id="row{{ $employee->id }}">
                    <td class="text-center d-lg-none align-middle">
                        <span class="details-control pointer">
                            <i class="ft-plus-circle text-primary font-medium-3"></i>
                        </span>

                        <!-- Hidden Details for AJAX Modal -->
                        <div class="row-details d-none">
                            <div class="modal-details-card">
                                <div class="premium-modal-header"></div>
                                <div class="text-center">
                                    <div class="modal-profile-wrapper">
                                        @if (!empty($employee->photo) && file_exists(public_path('uploads/employeesPhotos/' . $employee->photo)))
                                            <div class="avatar-circle avatar-size-100 d-inline-flex align-items-center justify-content-center shadow-lg overflow-hidden avatar-gray-bg">
                                                <img src="{!! asset('/uploads/employeesPhotos/' . $employee->photo) !!}"
                                                    alt="{{ $employee->first_name }}" class="img-fluid avatar-img-fit">
                                            </div>
                                        @else
                                            <div class="avatar-circle avatar-size-100 d-inline-flex align-items-center justify-content-center text-white shadow-lg avatar-initials font-40">
                                                {{ mb_substr($employee->first_name, 0, 1) }}
                                            </div>
                                        @endif
                                    </div>
                                    <h4 class="modal-name-title font-weight-bold">{{ $employee->EmployeeFullName() }}</h4>
                                    @if ($employee->employeeJobDetails && $employee->employeeJobDetails->employeeStatus)
                                        <span
                                            class="modal-role-badge badge-glow bg-info badge-premium-lg">{{ $employee->employeeJobDetails->employeeStatus->name }}</span>
                                    @endif
                                    <div class="modal-member-since-box">
                                        <i class="la la-calendar small mr-1"></i>
                                        {!! __('general.created_at') !!}: {!! is_string($employee->created_at) ? $employee->created_at : $employee->created_at->format('Y-m-d') !!}
                                    </div>
                                </div>

                                <div class="modal-info-list mt-2">
                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="la la-briefcase text-primary"></i></div>
                                        <div class="detail-info-box">
                                            <span class="detail-info-label">{!! __('employees.title') !!}</span>
                                            <span
                                                class="detail-info-value font-weight-bold">{{ !empty($employee->employeeJobDetails->title) ? $employee->employeeJobDetails->title : '---' }}</span>
                                        </div>
                                    </div>

                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="la la-server text-indigo"></i></div>
                                        <div class="detail-info-box">
                                            <span class="detail-info-label">{!! __('employees.department_id') !!}</span>
                                            <span
                                                class="detail-info-value">{{ $employee->employeeJobDetails->department->name ?? '-' }}</span>
                                        </div>
                                    </div>

                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="la la-id-card text-success"></i></div>
                                        <div class="detail-info-box">
                                            <span class="detail-info-label">{!! __('employees.personal_id') !!} /
                                                {!! __('employees.gender') !!}</span>
                                            <span class="detail-info-value">{{ $employee->personal_id }}
                                                ({{ $employee->EmployeeGender() }})
                                            </span>
                                        </div>
                                    </div>

                                    <div class="detail-item-modern border-bottom-0">
                                        <div class="icon-circle"><i class="la la-money text-warning"></i></div>
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
                    <td class="text-center d-none d-lg-table-cell align-middle">{!! $loop->iteration !!}</td>
                    <td class="text-center align-middle">
                        <div class="avatar-wrapper d-inline-block">
                            @if (!empty($employee->photo) && file_exists(public_path('uploads/employeesPhotos/' . $employee->photo)))
                                <div class="avatar-circle avatar-size-40 d-inline-flex align-items-center justify-content-center shadow-sm overflow-hidden avatar-gray-bg">
                                    <img src="{!! asset('/uploads/employeesPhotos/' . $employee->photo) !!}"
                                        alt="{{ $employee->first_name }}" class="img-fluid avatar-img-fit">
                                </div>
                            @else
                                <div class="avatar-circle avatar-size-40 d-inline-flex align-items-center justify-content-center text-white shadow-sm avatar-initials">
                                    {{ mb_substr($employee->first_name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                    </td>
                    <td class="font-weight-bold text-primary align-middle">{!! $employee->EmployeeShortName() !!}</td>
                    <td class="d-none d-lg-table-cell align-middle">{!! $employee->personal_id !!}</td>
                    <td class="d-none d-md-table-cell text-center align-middle">
                        @if(!empty($employee->employeeJobDetails->title))
                            <span class="badge badge-pill badge-glow bg-light-primary text-primary px-3 py-1 font-weight-bold badge-premium-lg">
                                {{ $employee->employeeJobDetails->title }}
                            </span>
                        @else
                            <span class="text-muted small">---</span>
                        @endif
                    </td>
                    <td class="align-middle">
                        <span class="text-muted">
                            {!! $employee->employeeJobDetails->department->name ?? '' !!}
                        </span>
                    </td>
                    <td class="d-none d-lg-table-cell align-middle">
                        <div class="d-flex flex-column">
                            <span class="font-weight-bold text-dark">{{ $employee->governorate->name ?? '-' }}</span>
                            <small class="text-muted">{{ $employee->city->name ?? '-' }}</small>
                        </div>
                    </td>
                    <td class="d-none d-lg-table-cell align-middle">{!! $employee->EmployeeGender() !!}</td>
                    <td class="d-none d-lg-table-cell align-middle">
                        <span class="text-success font-weight-bold">{!! number_format($employee->basic_salary, 2) !!}</span>
                        <small class="text-muted">{!! $employee->currency !!}</small>
                    </td>
                    <td class="text-center align-middle">
                        @include('dashboard.employees.employees.parts.actions')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11" class="text-center p-3 text-muted">
                        <i class="ft-info mr-1"></i> {!! __('employees.no_employees_found') !!}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="float-right mt-2">
    {!! $employees->links() !!}
</div>
