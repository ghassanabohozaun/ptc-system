<div class="table-responsive">
    <table class="table table-hover mb-0" id='myTable'>
        <thead class="bg-white">
            <tr>
                <th class="text-center d-lg-none border-0" style="width: 40px;">#</th>
                <th class="text-center d-none d-lg-table-cell align-middle py-3 border-top-0">#</th>
                <th class="text-center align-middle py-3 border-top-0">{!! __('employees.employee_status_name') !!}</th>
                <th class="text-center align-middle py-3 border-top-0">{!! __('employees.status') !!}</th>
                <th class="text-center align-middle py-3 border-top-0">{!! __('employees.manage_status') !!}</th>
                <th class="text-center align-middle py-3 border-top-0" style="min-width: 140px;">{!! __('general.actions') !!}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employeeStatuses as $key=>$status)
                    <!-- Mobile Details Control -->
                    <td class="text-center d-lg-none border-0 align-middle">
                        <span class="details-control">
                            <i class="ft-plus-circle text-primary" style="font-size: 1.2rem;"></i>
                        </span>

                        <!-- Hidden Row Details for AJAX Modal -->
                        <div class="row-details d-none">
                            <div class="modal-details-card">
                                <!-- Header Gradient -->
                                <div class="premium-modal-header"></div>

                                <div class="text-center">
                                    <div class="modal-profile-wrapper">
                                        <div class="avatar-circle avatar-size-100 d-inline-flex align-items-center justify-content-center text-white text-uppercase shadow-sm"
                                            style="background-color: #1F3BB3;">
                                            <i class="la la-user-cog" style="font-size: 40px;"></i>
                                        </div>
                                    </div>
                                    <h4 class="modal-name-title">{!! $status->name !!}</h4>
                                    <span class="modal-role-badge">{!! __('employees.employee_status') !!}</span>
                                </div>

                                <!-- Detail Items List -->
                                <div class="modal-info-list mt-2">
                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-hash"></i></div>
                                        <div class="detail-info-box">
                                            <span class="detail-info-label">{!! __('general.system_id') !!}</span>
                                            <span class="detail-info-value text-muted"># {!! $status->id !!}</span>
                                        </div>
                                    </div>

                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-activity"></i></div>
                                        <div class="detail-info-box">
                                            <span class="detail-info-label">{!! __('employees.status') !!}</span>
                                            <div class="detail-info-value">
                                                @if ($status->status == 1)
                                                    <span class="badge badge-success badge-glow">{!! __('general.enable') !!}</span>
                                                @else
                                                    <span class="badge badge-danger badge-glow">{!! __('general.disabled') !!}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>

                    <!-- Desktop ID -->
                    <td class="text-center d-none d-lg-table-cell align-middle">
                        <span class="badge badge-pill badge-glow badge-info d-inline-flex align-items-center justify-content-center" style="font-size: 11px; width: 35px; height: 22px; padding: 0;">
                            {!! $loop->iteration !!}
                        </span>
                    </td>

                    <!-- Name -->
                    <td class="text-center align-middle font-weight-bold text-dark">{!! $status->name !!}</td>

                    <!-- Status -->
                    <td class="text-center align-middle">
                        @include('dashboard.employees.statuses.parts.status')
                    </td>

                    <!-- Manage Status -->
                    <td class="text-center align-middle">
                        @include('dashboard.employees.statuses.parts.manage_status')
                    </td>

                    <!-- Actions -->
                    <td class="text-center align-middle">
                        <div class="d-flex justify-content-center align-items-center">
                            @include('dashboard.employees.statuses.parts.actions')
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        {!! __('employees.no_statuses_found') !!}
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>
    <div class="float-right">
        {!! $employeeStatuses->links() !!}
    </div>
</div>
