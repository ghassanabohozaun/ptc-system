<div class="table-responsive">
    <table class="table table-hover mb-0" id='myTable'>
        <thead class="bg-white">
            <tr>
                <th class="text-center d-lg-none border-0" style="width: 40px;">#</th>
                <th class="text-center d-none d-lg-table-cell align-middle py-3 border-top-0">#</th>
                <th class="text-center align-middle py-3 border-top-0">{!! __('departments.name') !!}</th>
                <th class="text-center align-middle py-3 border-top-0">{!! __('departments.status') !!}</th>
                <th class="text-center align-middle py-3 border-top-0">{!! __('departments.manage_status') !!}</th>
                <th class="text-center align-middle py-3 border-top-0" style="min-width: 140px;">{!! __('general.actions') !!}
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($departments as $key=>$department)
                <tr id="row{{ $department->id }}">
                    <!-- Mobile Details Control -->
                    <td class="text-center align-middle d-lg-none">
                        <span class="details-control">
                            <i class="la la-plus-circle text-primary" style="font-size: 1.4rem;"></i>
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
                                            <i class="la la-briefcase" style="font-size: 40px;"></i>
                                        </div>
                                    </div>
                                    <h4 class="modal-name-title">{!! $department->name !!}</h4>
                                    <span class="modal-role-badge">{!! __('departments.department') !!}</span>
                                </div>

                                <!-- Detail Items List -->
                                <div class="modal-info-list mt-2">
                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="la la-hashtag"></i></div>
                                        <div class="detail-info-box">
                                            <span class="detail-info-label">{!! __('general.system_id') !!}</span>
                                            <span class="detail-info-value text-muted"># {!! $department->id !!}</span>
                                        </div>
                                    </div>

                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="la la-check-circle"></i></div>
                                        <div class="detail-info-box">
                                            <span class="detail-info-label">{!! __('departments.status') !!}</span>
                                            <div class="detail-info-value">
                                                @include('dashboard.employees.departments.parts.status')
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>

                    <!-- Desktop ID Badge -->
                    <td class="text-center align-middle d-none d-lg-table-cell">
                        <div class="d-inline-flex align-items-center justify-content-center">
                            <span
                                class="badge badge-pill badge-glow badge-info d-inline-flex align-items-center justify-content-center"
                                style="width: 35px; height: 22px; font-size: 11px; padding: 0;">{!! $loop->iteration !!}</span>
                        </div>
                    </td>

                    <!-- Name -->
                    <td class="text-center align-middle font-weight-bold text-dark">{!! $department->name !!}</td>

                    <!-- Status -->
                    <td class="text-center align-middle">
                        @include('dashboard.employees.departments.parts.status')
                    </td>

                    <!-- Manage Status -->
                    <td class="text-center align-middle">
                        @include('dashboard.employees.departments.parts.manage_status')
                    </td>

                    <!-- Actions -->
                    <td class="text-center align-middle">
                        @include('dashboard.employees.departments.parts.actions')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        {!! __('departments.no_departments_found') !!}
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>
    <div class="float-right">
        {!! $departments->links() !!}
    </div>
</div>
