<div class="table-responsive">
    <table class="table" id='myTable'>
        <thead>
            <tr>
                <th class="text-center d-lg-none">#</th> <!-- For Details Control -->
                <th class="text-center d-none d-lg-table-cell">#</th>
                <th class="text-center">{!! __('roles.role_name') !!}</th>
                <th class="text-center d-none d-lg-table-cell">{!! __('roles.permissions') !!}</th>
                <th class="text-center">{!! __('general.actions') !!}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($roles as $key=>$role)
                <tr id="row{{ $role->id }}">
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
                                            <i class="ft-shield" style="font-size: 40px;"></i>
                                        </div>
                                    </div>
                                    <h4 class="modal-name-title">{!! $role->role !!}</h4>
                                    <span class="modal-role-badge">{!! __('roles.role') !!}</span>
                                </div>

                                <!-- Detail Items List -->
                                <div class="modal-info-list mt-2">
                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-hash"></i></div>
                                        <div class="detail-info-box">
                                            <span class="detail-info-label">{!! __('general.system_id') !!}</span>
                                            <span class="detail-info-value text-muted"># {!! $role->id !!}</span>
                                        </div>
                                    </div>

                                    <div class="detail-item-modern align-items-start">
                                        <div class="icon-circle"><i class="ft-lock"></i></div>
                                        <div class="detail-info-box">
                                            <span class="detail-info-label">{!! __('roles.permissions') !!}</span>
                                            <div class="permissions-container mt-1">
                                                @foreach (config('global.permissions') as $name => $translationKey)
                                                    @if (in_array($name, $role->permissions))
                                                        @php
                                                            $badgeClass = 'badge-permission';
                                                            if (in_array($name, ['settings', 'roles', 'admins'])) $badgeClass .= ' badge-critical';
                                                            elseif (in_array($name, ['salaries', 'monthlyReports', 'dailyReports'])) $badgeClass .= ' badge-info';
                                                            elseif (in_array($name, ['employees', 'departments'])) $badgeClass .= ' badge-success';
                                                            elseif ($name == 'messages') $badgeClass .= ' badge-warning';
                                                        @endphp
                                                        <span class="{{ $badgeClass }} mb-1 d-inline-block">
                                                            {{ __($translationKey) }}
                                                        </span>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </td>

                    <!-- Desktop ID -->
                    <td class="col-lg-1 text-center d-none d-lg-table-cell">{!! $loop->iteration !!} </td>
                    
                    <!-- Role Name -->
                    <td class="col-lg-2 text-center font-weight-bold">{!! $role->role !!}</td>
                    
                    <!-- Permissions (Desktop Only) -->
                    <td class="col-lg-7 d-none d-lg-table-cell">
                        <div class="permissions-container text-center">
                            @foreach (config('global.permissions') as $name => $translationKey)
                                @if (in_array($name, $role->permissions))
                                    @php
                                        $badgeClass = 'badge-permission';
                                        if (in_array($name, ['settings', 'roles', 'admins'])) $badgeClass .= ' badge-critical';
                                        elseif (in_array($name, ['salaries', 'monthlyReports', 'dailyReports'])) $badgeClass .= ' badge-info';
                                        elseif (in_array($name, ['employees', 'departments'])) $badgeClass .= ' badge-success';
                                        elseif ($name == 'messages') $badgeClass .= ' badge-warning';
                                    @endphp
                                    <span class="{{ $badgeClass }}">
                                        {{ __($translationKey) }}
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    </td>
                    
                    <!-- Actions -->
                    <td class="col-lg-2 text-center">
                        @include('dashboard.roles.parts.actions')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        {!! __('roles.no_roles_found') !!}
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>
    <div class="float-right">
        {!! $roles->links() !!}
    </div>
</div>
