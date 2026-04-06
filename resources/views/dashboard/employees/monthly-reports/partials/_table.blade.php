<div class="card">
    <div class="card-header">
        <h4 class="card-title">{!! __('monthlyReports.show_all_monthly_reports') !!}</h4>
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
    <div class="card-content collapse show">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-center d-lg-none">#</th>
                            <th class="text-center d-none d-lg-table-cell">#</th>
                            <th class="text-center">{!! __('monthlyReports.employee_id') !!}</th>
                            <th class="text-center">{!! __('monthlyReports.month') !!}</th>
                            <th class="text-center d-none d-lg-table-cell">{!! __('general.details') !!}</th>
                            <th class="text-center">{!! __('monthlyReports.status') !!}</th>
                            <th class="text-center d-none d-lg-table-cell">{!! __('monthlyReports.file') !!}</th>
                            <th class="text-center d-none d-lg-table-cell">{!! __('monthlyReports.created_at') !!}</th>
                            <th class="text-center">{!! __('general.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($monthlyReports as $key => $monthlyReport)
                            <tr id="row{{ $monthlyReport->id }}">
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
                                                    <div class="avatar-circle avatar-size-100 d-inline-flex align-items-center justify-content-center text-white text-uppercase shadow-sm" style="background-color: #00A5A8;">
                                                        <i class="ft-calendar" style="font-size: 40px;"></i>
                                                    </div>
                                                </div>
                                                <h4 class="modal-name-title">{!! $monthlyReport->employee->EmployeeShortName() !!}</h4>
                                                <span class="modal-role-badge">{!! __('monthlyReports.monthly_reports') !!}</span>
                                            </div>
                                            <div class="modal-info-list mt-2">
                                                <div class="detail-item-modern">
                                                    <div class="icon-circle"><i class="ft-clock"></i></div>
                                                    <div class="detail-info-box">
                                                        <span class="detail-info-label">{!! __('monthlyReports.month') !!}</span>
                                                        <span class="detail-info-value">{!! $monthlyReport->month !!} / {!! $monthlyReport->year !!}</span>
                                                    </div>
                                                </div>
                                                <div class="detail-item-modern">
                                                    <div class="icon-circle"><i class="ft-check-circle"></i></div>
                                                    <div class="detail-info-box">
                                                        <span class="detail-info-label">{!! __('monthlyReports.status') !!}</span>
                                                        <div class="detail-info-value">
                                                            @include('dashboard.employees.monthly-reports.parts.status')
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($monthlyReport->file)
                                                <div class="detail-item-modern">
                                                    <div class="icon-circle"><i class="ft-file"></i></div>
                                                    <div class="detail-info-box">
                                                        <span class="detail-info-label">{!! __('monthlyReports.file') !!}</span>
                                                        <div class="detail-info-value">
                                                            @include('dashboard.employees.monthly-reports.parts.file')
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center d-none d-lg-table-cell">{!! $loop->iteration !!}</td>
                                <td class="text-center">{!! $monthlyReport->employee->EmployeeShortName() !!}</td>
                                <td class="text-center font-weight-bold">{!! $monthlyReport->month !!} / {!! $monthlyReport->year !!}</td>
                                <td class="text-center d-none d-lg-table-cell">
                                    <button type="button" class="btn btn-sm btn-outline-info details-control" title="{!! __('general.details') !!}">
                                        <i class="ft-eye font-medium-3"></i>
                                    </button>
                                </td>
                                <td class="text-center">
                                    @include('dashboard.employees.monthly-reports.parts.status')
                                </td>
                                <td class="text-center d-none d-lg-table-cell">
                                    @include('dashboard.employees.monthly-reports.parts.file')
                                </td>
                                <td class="text-center d-none d-lg-table-cell text-muted small">{!! $monthlyReport->created_at !!}</td>
                                <td class="text-center">
                                    @include('dashboard.employees.monthly-reports.parts.actions')
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center p-3 text-muted">
                                    <i class="ft-info mr-1"></i> {!! __('monthlyReports.no_monthly_reports_found') !!}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="pagination-links float-right mt-2">
                {!! $monthlyReports->links() !!}
            </div>
        </div>
    </div>
</div>
