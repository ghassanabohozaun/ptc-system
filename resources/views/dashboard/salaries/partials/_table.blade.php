<div class="table-responsive">
    <table class="table table-hover mb-0" id="myTable">
        <thead class="bg-white">
            <tr>
                <th class="text-center d-lg-none align-middle py-3 border-top-0">#</th>
                <th class="text-center d-none d-lg-table-cell align-middle py-3 border-top-0">#</th>
                <th class="text-center align-middle py-3 border-top-0">{!! __('salaries.month') !!}</th>
                <th class="text-center d-none d-lg-table-cell align-middle py-3 border-top-0">{!! __('salaries.admin_id') !!}</th>
                <th class="text-center align-middle py-3 border-top-0">{!! __('salaries.salaries_count') !!}</th>
                <th class="text-center align-middle py-3 border-top-0">{!! __('salaries.salaries_sum') !!}</th>
                <th class="text-center d-none d-lg-table-cell align-middle py-3 border-top-0">{!! __('salaries.approved_status') !!}</th>
                <th class="text-center d-none d-lg-table-cell align-middle py-3 border-top-0">{!! __('salaries.status') !!}</th>
                <th class="text-center d-none d-lg-table-cell align-middle py-3 border-top-0">{!! __('salaries.manage_status') !!}</th>
                <th class="text-center align-middle py-3 border-top-0">{!! __('general.actions') !!}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($salaries as $salary)
                <tr id="row{{ $salary->id }}">
                    <td class="text-center d-lg-none align-middle">
                        <span class="details-control pointer">
                            <i class="ft-plus-circle text-primary font-medium-3"></i>
                        </span>
                        <!-- Hidden Details for AJAX Modal -->
                        <div class="row-details d-none">
                            <div class="modal-details-card">
                                <div class="premium-modal-header"></div>
                                <div class="text-center">
                                    <div class="modal-profile-wrapper">
                                        <div class="avatar-circle avatar-size-100 d-inline-flex align-items-center justify-content-center text-white shadow-sm"
                                            style="background-color: #1F3BB3; border: 4px solid #fff;">
                                            <i class="la la-money-bill-wave" style="font-size: 40px;"></i>
                                        </div>
                                    </div>
                                    <h4 class="modal-name-title font-weight-bold">{{ __('salaries.' . $salary->month) }} /
                                        {{ $salary->year }}
                                    </h4>
                                    <span
                                        class="modal-role-badge text-muted small">{!! __('salaries.salaries') !!}</span>
                                </div>
                                <div class="modal-info-list mt-2">
                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-user"></i></div>
                                        <div class="detail-info-box text-left">
                                            <span class="detail-info-label">{!! __('salaries.admin_id') !!}</span>
                                            <span
                                                class="detail-info-value font-weight-bold">{{ $salary->admin->name ?? '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-users"></i></div>
                                        <div class="detail-info-box text-left">
                                            <span class="detail-info-label">{!! __('salaries.salaries_count') !!}</span>
                                            <span class="detail-info-value">{{ $salary->employees_count }}
                                                {{ __('general.employee') }}</span>
                                        </div>
                                    </div>
                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="la la-dollar"></i></div>
                                        <div class="detail-info-box text-left">
                                            <span class="detail-info-label">{!! __('salaries.salaries_sum') !!}</span>
                                            <span
                                                class="detail-info-value text-success font-weight-bold">{{ number_format($salary->employees->sum('pivot.amount'), 2) }}
                                                {{ __('general.usd') }}</span>
                                        </div>
                                    </div>
                                    <div class="detail-item-modern">
                                        <div class="icon-circle"><i class="ft-calendar"></i></div>
                                        <div class="detail-info-box text-left">
                                            <span class="detail-info-label">{!! __('salaries.release_date') !!}</span>
                                            <span
                                                class="detail-info-value">{{ $salary->release_date ?? '-' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center d-none d-lg-table-cell align-middle">
                        <span class="badge badge-info badge-pill badge-glow premium-badge-circle">
                            {{ $loop->iteration }}
                        </span>
                    </td>
                    <td class="text-center align-middle font-weight-bold text-primary">
                        {{ $salary->month }} / {{ $salary->year }}
                    </td>
                    <td class="text-center d-none d-lg-table-cell align-middle">{{ $salary->admin->name ?? '-' }}</td>
                    <td class="text-center align-middle">
                        <div class="badge badge-pill badge-glow bg-light-info text-info px-2 py-1">
                            <i class="ft-users mr-1"></i>{{ $salary->employees->count() }}
                        </div>
                    </td>
                    <td class="text-center align-middle font-weight-bold text-success text-nowrap">
                        {{ number_format($salary->employees->sum('pivot.amount'), 0) }}
                        {{ __('general.usd') }}
                    </td>
                    <td class="text-center d-none d-lg-table-cell align-middle">
                        @include('dashboard.salaries.parts.approved_status')
                    </td>
                    <td class="text-center d-none d-lg-table-cell align-middle">
                        @include('dashboard.salaries.parts.status')
                    </td>
                    <td class="text-center d-none d-lg-table-cell align-middle">
                        @include('dashboard.salaries.parts.manage_status')
                    </td>
                    <td class="text-center align-middle">
                        @include('dashboard.salaries.parts.actions')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center p-3 text-muted border-0">
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
