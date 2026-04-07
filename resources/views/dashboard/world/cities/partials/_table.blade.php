<div class="table-responsive">
    <table class="table" id='myTable'>
        <thead>
            <tr>
                <th class="text-center d-lg-none">#</th> <!-- For Details Control -->
                <th class="text-center d-none d-lg-table-cell">#</th>
                <th class="text-center">{!! __('world.city_name') !!}</th>
                <th class="text-center d-none d-lg-table-cell">{!! __('world.governorate_name') !!}</th>
                <th class="text-center">{!! __('general.actions') !!}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cities as $key=>$city)
                <tr id="row{{ $city->id }}">
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
                                            <i class="ft-map-pin" style="font-size: 40px;"></i>
                                        </div>
                                    </div>
                                    <h4 class="modal-name-title">{!! $city->name !!}</h4>
                                    <span class="modal-role-badge">{!! __('world.city') !!}</span>
                                </div>

                                <div class="modal-info-list mt-2">
                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-hash"></i></div>
                                        <div class="detail-info-box">
                                            <span class="detail-info-label">{!! __('general.system_id') !!}</span>
                                            <span class="detail-info-value text-muted"># {!! $city->id !!}</span>
                                        </div>
                                    </div>

                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-map"></i></div>
                                        <div class="detail-info-box">
                                            <span class="detail-info-label">{!! __('world.governorate_name') !!}</span>
                                            <span class="detail-info-value">{!! $city->governorate->name !!}</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="col-lg-1 text-center d-none d-lg-table-cell">{!! $loop->iteration !!} </td>
                    <td class="col-lg-4 text-center font-weight-bold">{!! $city->name !!}</td>
                    <td class="col-lg-3 text-center d-none d-lg-table-cell">{!! $city->governorate->name !!}</td>
                    <td class="col-lg-2 text-center">
                        @include('dashboard.world.cities.parts.actions')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        {!! __('world.no_cities_found') !!}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="float-right">
        {!! $cities->links() !!}
    </div>
</div>
