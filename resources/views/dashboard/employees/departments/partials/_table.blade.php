<div class="table-responsive">
    <table class="table" id='myTable'>
        <thead>
            <tr>
                <th class="text-center d-lg-none">#</th> <!-- For Details Control -->
                <th class="text-center d-none d-lg-table-cell">#</th>
                <th class="text-center">{!! __('departments.name') !!}</th>
                <th class="text-center">{!! __('departments.status') !!}</th>
                <th class="text-center">{!! __('departments.manage_status') !!}</th>
                <th class="text-center">{!! __('general.actions') !!}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($departments as $key=>$department)
                <tr id="row{{ $department->id }}">
                    <!-- Mobile Details Control -->
                    <td class="text-center d-lg-none">
                        <span class="details-control">
                            <i class="ft-plus-circle"></i>
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
                                            <i class="ft-briefcase" style="font-size: 40px;"></i>
                                        </div>
                                    </div>
                                    <h4 class="modal-name-title">{!! $department->name !!}</h4>
                                    <span class="modal-role-badge">{!! __('departments.department') !!}</span>
                                </div>

                                <!-- Detail Items List -->
                                <div class="modal-info-list mt-2">
                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-hash"></i></div>
                                        <div class="detail-info-box">
                                            <span class="detail-info-label">{!! __('general.system_id') !!}</span>
                                            <span class="detail-info-value text-muted"># {!! $department->id !!}</span>
                                        </div>
                                    </div>

                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-activity"></i></div>
                                        <div class="detail-info-box">
                                            <span class="detail-info-label">{!! __('departments.status') !!}</span>
                                            <div class="detail-info-value">
                                                @if ($department->status == 1)
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
                    <td class="col-lg-1 text-center d-none d-lg-table-cell">{!! $loop->iteration !!} </td>

                    <!-- Name -->
                    <td class="col-lg-7 text-center font-weight-bold">{!! $department->name !!}</td>

                    <!-- Status -->
                    <td class="col-lg-1 text-center">
                        @include('dashboard.employees.departments.parts.status')
                    </td>

                    <!-- Manage Status -->
                    <td class="col-lg-1 text-center">
                        @include('dashboard.employees.departments.parts.manage_status')
                    </td>

                    <!-- Actions -->
                    <td class="col-lg-1 text-center">
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
