<div class="table-responsive">
    <table class="table table-hover mb-0" id='myTable'>
        <thead class="bg-white">
            <tr>
                <th class="text-center d-lg-none align-middle py-3 border-top-0">#</th> <!-- For Details Control -->
                <th class="text-center d-none d-lg-table-cell align-middle py-3 border-top-0" style="width: 80px;">#</th>
                <th class="text-center align-middle py-3 border-top-0">{!! __('world.city_name') !!}</th>
                <th class="text-center d-none d-lg-table-cell align-middle py-3 border-top-0">{!! __('world.governorate_name') !!}</th>
                <th class="text-center align-middle py-3 border-top-0" style="min-width: 150px;">{!! __('general.actions') !!}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cities as $key=>$city)
                <tr id="row{{ $city->id }}">
                    <!-- Mobile Details Control -->
                    <td class="text-center d-lg-none align-middle">
                        <span class="details-control pointer">
                            <i class="ft-plus-circle text-primary font-medium-3"></i>
                        </span>

                        <!-- Hidden Row Details for AJAX Modal -->
                        <div class="row-details d-none">
                            <div class="modal-details-card">
                                <div class="premium-modal-header"></div>
                                <div class="text-center">
                                    <div class="modal-profile-wrapper">
                                        <div class="avatar-circle avatar-size-100 d-inline-flex align-items-center justify-content-center text-white text-uppercase shadow-sm"
                                            style="background-color: #1F3BB3;">
                                            <i class="la la-city" style="font-size: 40px;"></i>
                                        </div>
                                    </div>
                                    <h4 class="modal-name-title font-weight-bold">{!! $city->name !!}</h4>
                                    <span class="modal-role-badge">{!! __('world.city') !!}</span>
                                </div>

                                <div class="modal-info-list mt-2">
                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-hash"></i></div>
                                        <div class="detail-info-box text-left">
                                            <span class="detail-info-label">{!! __('general.system_id') !!}</span>
                                            <span class="detail-info-value text-muted"># {!! $city->id !!}</span>
                                        </div>
                                    </div>

                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-map"></i></div>
                                        <div class="detail-info-box text-left">
                                            <span class="detail-info-label">{!! __('world.governorate_name') !!}</span>
                                            <span class="detail-info-value">{!! $city->governorate->name !!}</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="text-center d-none d-lg-table-cell align-middle">
                        <span class="badge badge-info badge-pill badge-glow premium-badge-circle">
                            {!! $loop->iteration !!}
                        </span>
                    </td>
                    <td class="text-center align-middle font-weight-bold text-primary">{!! $city->name !!}</td>
                    <td class="text-center align-middle d-none d-lg-table-cell font-weight-bold text-muted">{!! $city->governorate->name !!}</td>
                    <td class="text-center align-middle">
                        @include('dashboard.world.cities.parts.actions')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center p-3 text-muted">
                        <i class="ft-info mr-1"></i> {!! __('world.no_cities_found') !!}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
    <div class="float-right">
        {!! $cities->links() !!}
    </div>
</div>
