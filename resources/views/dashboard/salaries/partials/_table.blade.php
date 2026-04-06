<div class="card">
    <!-- begin: card header -->
    <div class="card-header">
        <h4 class="card-title" id="basic-layout-colored-form-control">
            {!! __('salaries.show_all_salaries') !!}
        </h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
        </div>
    </div>
    <!-- end: card header -->

    <!-- begin: card content -->
    <div class="card-content collapse show">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-center d-lg-none">#</th>
                            <th class="text-center d-none d-lg-table-cell">#</th>
                            <th class="text-center">{!! __('salaries.month') !!}</th>
                            <th class="text-center d-none d-lg-table-cell">{!! __('salaries.admin_id') !!}</th>
                            <th class="text-center">{!! __('salaries.salareis_count') !!}</th>
                            <th class="text-center">{!! __('salaries.salareis_sum') !!}</th>
                            <th class="text-center d-none d-lg-table-cell">{!! __('salaries.approved_status') !!}</th>
                            <th class="text-center d-none d-lg-table-cell">{!! __('salaries.status') !!}</th>
                            <th class="text-center d-none d-lg-table-cell">{!! __('salaries.manage_status') !!}</th>
                            <th class="text-center">{!! __('general.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($salaries as $salary)
                            <tr id="row{{ $salary->id }}">
                                <td class="text-center d-lg-none">
                                    <span class="details-control pointer">
                                        <i class="ft-plus-circle text-info font-medium-3"></i>
                                    </span>
                                    <!-- Hidden Details for AJAX Modal -->
                                    <div class="row-details d-none">
                                        <div class="modal-details-card">
                                            <div class="premium-modal-header"></div>
                                            <div class="text-center">
                                                <div class="modal-profile-wrapper">
                                                    <div class="avatar-circle avatar-size-100 d-inline-flex align-items-center justify-content-center text-white shadow-sm"
                                                        style="background-color: #626E82;">
                                                        <i class="ft-briefcase font-large-1"></i>
                                                    </div>
                                                </div>
                                                <h4 class="modal-name-title">{{ $salary->month }} / {{ $salary->year }}
                                                </h4>
                                                <span class="modal-role-badge bg-info">{!! __('salaries.salaries') !!}</span>
                                            </div>
                                            <div class="modal-info-list mt-2">
                                                <div class="detail-item-modern">
                                                    <div class="icon-circle"><i class="ft-user"></i></div>
                                                    <div class="detail-info-box">
                                                        <span class="detail-info-label">{!! __('salaries.admin_id') !!}</span>
                                                        <span
                                                            class="detail-info-value font-weight-bold">{{ $salary->admin->name ?? '-' }}</span>
                                                    </div>
                                                </div>
                                                <div class="detail-item-modern">
                                                    <div class="icon-circle"><i class="ft-users"></i></div>
                                                    <div class="detail-info-box">
                                                        <span class="detail-info-label">{!! __('salaries.salareis_count') !!}</span>
                                                        <span class="detail-info-value">{{ $salary->employees_count }} {{ __('general.employee') }}</span>
                                                    </div>
                                                </div>
                                                <div class="detail-item-modern">
                                                    <div class="icon-circle"><i class="ft-pocket"></i></div>
                                                    <div class="detail-info-box">
                                                        <span class="detail-info-label">{!! __('salaries.salareis_sum') !!}</span>
                                                        <span
                                                            class="detail-info-value text-success font-weight-bold">{{ number_format($salary->employees->sum('pivot.amount'), 2) }}
                                                            {{ __('general.usd') }}</span>
                                                    </div>
                                                </div>
                                                <div class="detail-item-modern">
                                                    <div class="icon-circle"><i class="ft-calendar"></i></div>
                                                    <div class="detail-info-box">
                                                        <span class="detail-info-label">{!! __('salaries.release_date') !!}
                                                            (Optional)</span>
                                                        <span
                                                            class="detail-info-value">{{ $salary->release_date ?? '-' }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center d-none d-lg-table-cell">{{ $loop->iteration }}</td>
                                <td class="text-center font-weight-bold text-primary">{{ $salary->month }} /
                                    {{ $salary->year }}</td>
                                <td class="text-center d-none d-lg-table-cell">{{ $salary->admin->name ?? '-' }}</td>
                                <td class="text-center">{{ $salary->employees->count() }}</td>
                                <td class="text-center font-weight-bold text-success">
                                    {{ number_format($salary->employees->sum('pivot.amount'), 0) }}</td>
                                <td class="text-center d-none d-lg-table-cell">
                                    @include('dashboard.salaries.parts.approved_status')
                                </td>
                                <td class="text-center d-none d-lg-table-cell">
                                    @include('dashboard.salaries.parts.status')
                                </td>
                                <td class="text-center d-none d-lg-table-cell">
                                    @include('dashboard.salaries.parts.manage_status')
                                </td>
                                <td class="text-center">
                                    @include('dashboard.salaries.parts.actions')
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center p-3 text-muted">
                                    <i class="ft-info mr-1"></i> {!! __('salaries.no_salaries_found') !!}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="pagination-links float-right mt-2">
                {!! $salaries->links() !!}
            </div>
        </div>
    </div>
    <!-- end: card content -->
</div>
