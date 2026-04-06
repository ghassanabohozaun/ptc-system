<div class="mb-4">


    <div class="info-card p-4">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead style="background: #f8fafc;">
                    <tr class="text-center">
                        <th class="border-top-0 text-muted font-weight-bold">#</th>
                        <th class="border-top-0 text-muted font-weight-bold">{!! __('employees.contract_duration') ?? 'مدة العقد' !!}</th>
                        <th class="border-top-0 text-muted font-weight-bold">{!! __('employees.contract_start_date') ?? 'تاريخ بداية العقد' !!}</th>
                        <th class="border-top-0 text-muted font-weight-bold">{!! __('employees.contact_expire_date') !!}</th>
                        <th class="border-top-0 text-muted font-weight-bold">{!! __('employees.monthly_salary') ?? 'الراتب الشهري' !!}</th>
                        <th class="border-top-0 text-muted font-weight-bold text-center">{!! __('general.actions') ?? 'العمليات' !!}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employee->employeeContracts as $key => $item)
                        <tr class="text-center align-middle"
                            style="background: white; border-bottom: 1px solid #f1f5f9;">
                            <td><span class="badge badge-light shadow-sm">{!! $loop->iteration !!}</span></td>
                            <td class="font-weight-bold text-dark px-3">
                                <i class="la la-clock-o text-info mr-1"></i> {!! $item->contract_duration !!}
                            </td>
                            <td><span class="text-primary font-weight-bold">{!! $item->contract_start_date !!}</span></td>
                            <td><span class="text-warning font-weight-bold">{!! $item->contract_expiry_date !!}</span></td>
                            <td>
                                <div class="text-success font-weight-bold" style="font-size: 1.2rem;">
                                    {!! $item->monthly_salary !!} <span class="font-small-3">{!! $employee->currency !!}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="{!! route('dashboard.employeeContracts.print', $item->id) !!}"
                                    class="btn btn-sm btn-info round px-3 shadow-sm border-0"
                                    style="background: linear-gradient(135deg, #10b981, #059669);">
                                    <i class="la la-file-word-o"></i> {!! __('employees.export') ?? 'تصدير' !!}
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="text-muted d-flex flex-column align-items-center">
                                    <i class="la la-folder-open-o la-3x text-light mb-2"></i>
                                    <span style="font-size: 1.1rem;">{!! __('employees.no_data_found') !!}</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
