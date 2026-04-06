<div class="table-responsive">
    <table class="table" id='myTable'>
        <thead>
            <tr>
                <th class="text-center d-lg-none">#</th> <!-- For Details Control -->
                <th class="text-center d-none d-lg-table-cell">{!! __('admins.photo') !!}</th>
                <th class="text-center">{!! __('admins.name') !!}</th>
                <th class="text-center d-none d-lg-table-cell">{!! __('admins.email') !!}</th>
                <th class="text-center">{!! __('admins.role_id') !!}</th>
                <th class="text-center">{!! __('admins.status') !!}</th>
                <th class="text-center">{!! __('admins.manage_status') !!}</th>
                <th class="text-center">{!! __('general.actions') !!}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($admins as $key=>$admin)
                <tr id="row{{ $admin->id }}">
                    <td class="text-center d-lg-none">
                        <span class="details-control">
                            <i class="ft-plus-circle"></i>
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

                                    <h4 class="modal-name-title">{!! $admin->name !!}</h4>
                                    <span class="modal-role-badge">{!! $admin->role->role !!}</span>

                                    <div class="modal-member-since-box">
                                        <i class="ft-calendar small mr-1"></i>
                                        {!! __('general.created_at') !!}: {!! is_string($admin->created_at) ? $admin->created_at : $admin->created_at->format('Y-m-d') !!}
                                    </div>
                                </div>

                                <!-- Detail Items List -->
                                <div class="modal-info-list">
                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-user"></i></div>
                                        <div class="detail-info-box">
                                            <span class="detail-info-label">{!! __('general.system_id') !!}</span>
                                            <span class="detail-info-value text-muted"># {!! $admin->id !!}</span>
                                        </div>
                                    </div>

                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-mail"></i></div>
                                        <div class="detail-info-box">
                                            <span class="detail-info-label">{!! __('admins.email') !!}</span>
                                            <span class="detail-info-value">{!! $admin->email !!}</span>
                                        </div>
                                    </div>

                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-shield"></i></div>
                                        <div class="detail-info-box">
                                            <span class="detail-info-label">{!! __('admins.role_id') !!}</span>
                                            <span
                                                class="detail-info-value text-primary font-weight-bold">{!! $admin->role->role !!}</span>
                                        </div>
                                    </div>

                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-activity"></i></div>
                                        <div class="detail-info-box">
                                            <span class="detail-info-label">{!! __('admins.status') !!}</span>
                                            <div class="detail-info-value">
                                                @if ($admin->status == 1)
                                                    <span
                                                        class="badge badge-success badge-glow">{!! __('general.enable') !!}</span>
                                                @else
                                                    <span
                                                        class="badge badge-danger badge-glow">{!! __('general.disabled') !!}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="col-lg-1 text-center d-none d-lg-table-cell">
                        @include('dashboard.admins.parts.photo')
                    </td>
                    <td class="col-lg-1 text-center">{!! $admin->name !!}</td>
                    <td class="col-lg-2 text-center d-none d-lg-table-cell">{!! $admin->email !!}</td>
                    <td class="col-lg-2 text-center">{!! $admin->role->role !!}</td>
                    <td class="col-lg-1 text-center">
                        @include('dashboard.admins.parts.status')
                    </td>
                    <td class="col-lg-1 text-center">
                        @include('dashboard.admins.parts.manage_status')
                    </td>
                    <td class="col-lg-1 text-center">
                        @include('dashboard.admins.parts.actions')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">
                        {!! __('admins.no_admins_found') !!}
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>
    <div class="float-right">
        {!! $admins->links() !!}
    </div>
</div>
