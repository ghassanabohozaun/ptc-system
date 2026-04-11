<div class="card premium-card shadow-lg border-0">
    <div class="card-header border-0 pb-0">
        <h4 class="card-title text-dark font-weight-bold d-flex align-items-center">
            <i class="la la-list-alt text-primary mr-2" style="font-size: 24px;"></i> 
            {!! __('monthlyReports.monthly_reports') !!}
            <span class="badge badge-primary badge-pill badge-glow ml-2"
                style="font-size: 11px;">{!! $monthlyReports->total() !!}</span>
        </h4>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="la la-minus"></i></a></li>
                <li><a data-action="reload"><i class="la la-refresh"></i></a></li>
                <li><a data-action="expand"><i class="la la-expand"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-content collapse show">
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="myTable">
                    <thead class="bg-white">
                        <tr>
                            <th class="text-center d-none d-lg-table-cell align-middle py-3 border-top-0">#</th>
                            <th class="text-center align-middle py-3 border-top-0">{!! __('monthlyReports.employee_id') !!}</th>
                            <th class="text-center align-middle py-3 border-top-0">{!! __('monthlyReports.month') !!} / {!! __('monthlyReports.year') !!}</th>
                            <th class="text-center align-middle py-3 border-top-0">{!! __('monthlyReports.status') !!}</th>
                            <th class="text-center d-none d-lg-table-cell align-middle py-3 border-top-0">{!! __('monthlyReports.created_at') !!}</th>
                            <th class="text-center align-middle py-3 border-top-0" style="min-width: 140px;">{!! __('general.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($monthlyReports as $monthlyReport)
                            <tr id="row{{ $monthlyReport->id }}">
                                <td class="text-center d-lg-none">
                                    <span class="details-control pointer">
                                        <i class="ft-plus-circle text-primary font-medium-3"></i>
                                    </span>
                                    <!-- Hidden Details for AJAX Modal -->
                                    <div class="row-details d-none">
                                        <div class="modal-details-card">
                                            <!-- Header Gradient -->
                                            <div class="premium-modal-header"></div>

                                            <div class="text-center">
                                                <div class="modal-profile-wrapper">
                                                    <div class="avatar-circle avatar-size-100 d-inline-flex align-items-center justify-content-center text-white text-uppercase shadow-sm"
                                                        style="background-color: #1F3BB3;">
                                                        <i class="ft-file-text" style="font-size: 40px;"></i>
                                                    </div>
                                                </div>
                                                <h4 class="modal-name-title font-weight-bold">{!! $monthlyReport->employee->EmployeeShortName() !!}</h4>
                                                <span class="modal-role-badge">{!! __('monthlyReports.monthly_reports') !!}</span>
                                            </div>

                                            <!-- Detail Items List -->
                                            <div class="modal-info-list mt-2">
                                                <div class="detail-item-modern">
                                                    <div class="icon-circle"><i class="ft-calendar"></i></div>
                                                    <div class="detail-info-box text-left">
                                                        <span class="detail-info-label">{!! __('monthlyReports.month') !!} / {!! __('monthlyReports.year') !!}</span>
                                                        <span class="detail-info-value font-weight-bold">{!! $monthlyReport->month !!} / {!! $monthlyReport->year !!}</span>
                                                    </div>
                                                </div>

                                                <div class="detail-item-modern">
                                                    <div class="icon-circle"><i class="ft-check-circle"></i></div>
                                                    <div class="detail-info-box text-left">
                                                        <span class="detail-info-label">{!! __('monthlyReports.status') !!}</span>
                                                        <div class="detail-info-value mt-1">
                                                            @include('dashboard.employees.monthly-reports.parts.status')
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="detail-item-modern">
                                                    <div class="icon-circle"><i class="ft-clock"></i></div>
                                                    <div class="detail-info-box text-left">
                                                        <span class="detail-info-label">{!! __('monthlyReports.created_at') !!}</span>
                                                        <span class="detail-info-value">{!! $monthlyReport->created_at !!}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center d-none d-lg-table-cell">
                                    <span class="badge badge-info badge-pill badge-glow premium-badge-circle">{!! $loop->iteration !!}</span>
                                </td>
                                <td class="text-center align-middle font-weight-bold text-primary">
                                    {!! $monthlyReport->employee->EmployeeShortName() !!}
                                </td>
                                <td class="text-center align-middle">
                                    <span class="badge badge-pill bg-light-info text-info px-1 font-weight-bold">
                                        {!! $monthlyReport->month !!} / {!! $monthlyReport->year !!}
                                    </span>
                                </td>
                                <td class="text-center align-middle">
                                    @include('dashboard.employees.monthly-reports.parts.status')
                                </td>
                                <td class="text-center align-middle d-none d-lg-table-cell text-muted small">
                                    {!! $monthlyReport->created_at !!}
                                </td>
                                <td class="text-center align-middle">
                                    @include('dashboard.employees.monthly-reports.parts.actions')
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center p-3 text-muted">
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
