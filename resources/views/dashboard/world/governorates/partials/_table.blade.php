<div class="table-responsive">
    <table class="table" id='myTable'>
        <thead>
            <tr>
                <th class="text-center d-lg-none">#</th> <!-- For Details Control -->
                <th class="text-center d-none d-lg-table-cell" style="width: 80px;">#</th>
                <th class="text-center">{!! __('world.governorate_name') !!}</th>
                <th class="text-center d-none d-lg-table-cell">{!! __('world.cities_count') !!}</th>
                <th class="text-center" style="min-width: 150px;">{!! __('general.actions') !!}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($governorates as $key=>$governorate)
                <tr id="row{{ $governorate->id }}">
                    <!-- Mobile Details Control -->
                    <td class="text-center d-lg-none">
                        <span class="details-control">
                            <i class="ft-plus-circle"></i>
                        </span>

                        <!-- Hidden Row Details for AJAX Modal -->
                        <div class="row-details d-none">
                            <div class="modal-details-card">
                                <div class="premium-modal-header"></div>
                                <div class="text-center">
                                    <div class="modal-profile-wrapper">
                                        <div class="avatar-circle avatar-size-100 d-inline-flex align-items-center justify-content-center text-white text-uppercase shadow-sm"
                                            style="background-color: #1F3BB3;">
                                            <i class="la la-map-marked-alt" style="font-size: 40px;"></i>
                                        </div>
                                    </div>
                                    <h4 class="modal-name-title">{!! $governorate->name !!}</h4>
                                    <span class="modal-role-badge">{!! __('world.governorate') !!}</span>
                                </div>

                                <div class="modal-info-list mt-2">
                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-hash"></i></div>
                                        <div class="detail-info-box">
                                            <span class="detail-info-label">{!! __('general.system_id') !!}</span>
                                            <span class="detail-info-value text-muted"># {!! $governorate->id !!}</span>
                                        </div>
                                    </div>

                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-layers"></i></div>
                                        <div class="detail-info-box">
                                            <span class="detail-info-label">{!! __('world.cities_count') !!}</span>
                                            <span class="detail-info-value">{!! $governorate->cities_count !!}</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="text-center d-none d-lg-table-cell align-middle">
                        <span class="badge badge-pill badge-glow badge-info d-inline-flex align-items-center justify-content-center" style="font-size: 11px; width: 35px; height: 22px; padding: 0;">
                            {!! $loop->iteration !!}
                        </span>
                    </td>
                    <td class="text-center align-middle font-weight-bold text-dark">{!! $governorate->name !!}</td>
                    <td class="text-center align-middle d-none d-lg-table-cell">
                        <span class="badge badge-pill badge-glow badge-primary d-inline-flex align-items-center justify-content-center" style="font-size: 11px; width: 50px; height: 22px; padding: 0;">
                            {!! $governorate->cities_count !!}
                        </span>
                    </td>
                    <td class="text-center align-middle">
                        <div class="d-flex justify-content-center align-items-center">
                            @include('dashboard.world.governorates.parts.actions')
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        {!! __('world.no_governorates_found') !!}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="float-right">
        {!! $governorates->links() !!}
    </div>
</div>
