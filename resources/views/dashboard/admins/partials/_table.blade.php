<div class="table-responsive">
    <table class="table table-hover mb-0" id='myTable'>
        <thead class="bg-white">
            <tr>
                <th class="text-center d-lg-none align-middle py-3 border-top-0">#</th> <!-- For Details Control -->
                <th class="text-center d-none d-lg-table-cell align-middle py-3 border-top-0">{!! __('admins.photo') !!}</th>
                <th class="text-center align-middle py-3 border-top-0">{!! __('admins.name') !!}</th>
                <th class="text-center d-none d-lg-table-cell align-middle py-3 border-top-0">{!! __('admins.email') !!}</th>
                <th class="text-center d-none d-lg-table-cell align-middle py-3 border-top-0">{!! __('admins.role_id') !!}</th>
                <th class="text-center align-middle py-3 border-top-0">{!! __('admins.status') !!}</th>
                <th class="text-center align-middle py-3 border-top-0" style="min-width: 120px;">{!! __('admins.manage_status') !!}</th>
                <th class="text-center align-middle py-3 border-top-0" style="min-width: 150px;">{!! __('general.actions') !!}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($admins as $key=>$admin)
                <tr id="row{{ $admin->id }}">
                    <td class="text-center d-lg-none align-middle">
                        <span class="details-control pointer">
                            <i class="ft-plus-circle text-primary font-medium-3"></i>
                        </span>
                        <!-- Hidden Row Details -->
                        <div class="row-details d-none">
                            <div class="modal-details-card">
                                <!-- Header Gradient -->
                                <div class="premium-modal-header"></div>

                                <div class="text-center">
                                    <!-- Simple & Clean Profile Image -->
                                    <div class="modal-profile-wrapper">
                                        @include('dashboard.admins.parts.photo', ['size' => 100])
                                    </div>

                                    <h4 class="modal-name-title font-weight-bold">{!! $admin->name !!}</h4>
                                    <span class="modal-role-badge">{!! $admin->role->role !!}</span>

                                    <div class="modal-member-since-box">
                                        <i class="ft-calendar small mr-1"></i>
                                        {!! __('general.created_at') !!}: {!! is_string($admin->created_at) ? $admin->created_at : $admin->created_at->format('Y-m-d') !!}
                                    </div>
                                </div>

                                <!-- Detail Items List -->
                                <div class="modal-info-list mt-2">
                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-user"></i></div>
                                        <div class="detail-info-box text-left">
                                            <span class="detail-info-label">{!! __('general.system_id') !!}</span>
                                            <span class="detail-info-value text-muted"># {!! $admin->id !!}</span>
                                        </div>
                                    </div>

                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-mail"></i></div>
                                        <div class="detail-info-box text-left">
                                            <span class="detail-info-label">{!! __('admins.email') !!}</span>
                                            <span class="detail-info-value">{!! $admin->email !!}</span>
                                        </div>
                                    </div>

                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-shield"></i></div>
                                        <div class="detail-info-box text-left">
                                            <span class="detail-info-label">{!! __('admins.role_id') !!}</span>
                                            <span
                                                class="detail-info-value text-primary font-weight-bold">{!! $admin->role->role !!}</span>
                                        </div>
                                    </div>

                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-activity"></i></div>
                                        <div class="detail-info-box text-left">
                                            <span class="detail-info-label">{!! __('admins.status') !!}</span>
                                            <div class="detail-info-value mt-1">
                                                @if ($admin->status == 1)
                                                    <span
                                                        class="badge badge-success badge-glow badge-pill px-2">{!! __('general.enable') !!}</span>
                                                @else
                                                    <span
                                                        class="badge badge-danger badge-glow badge-pill px-2">{!! __('general.disabled') !!}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center d-none d-lg-table-cell align-middle">
                        <div class="d-flex justify-content-center">
                            @include('dashboard.admins.parts.photo')
                        </div>
                    </td>
                    <td class="text-center align-middle font-weight-bold text-primary">{!! $admin->name !!}</td>
                    <td class="text-center align-middle d-none d-lg-table-cell">{!! $admin->email !!}</td>
                    <td class="text-center align-middle d-none d-lg-table-cell">
                        <span class="badge badge-pill badge-glow bg-light-primary text-primary font-weight-bold px-3 py-1">
                            {!! $admin->role->role !!}
                        </span>
                    </td>
                    <td class="text-center align-middle">
                        @include('dashboard.admins.parts.status')
                    </td>
                    <td class="text-center align-middle">
                        @include('dashboard.admins.parts.manage_status')
                    </td>
                    <td class="text-center align-middle">
                        @include('dashboard.admins.parts.actions')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center p-3 text-muted">
                        <i class="ft-info mr-1"></i> {!! __('admins.no_admins_found') !!}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
    <div class="float-right">
        {!! $admins->links() !!}
    </div>
</div>
