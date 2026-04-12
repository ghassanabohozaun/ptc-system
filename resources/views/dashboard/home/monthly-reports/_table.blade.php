<div class="table-responsive">
    <table class="table" id='myTable'>
        <thead>
            <tr>
                <th>#</th>
                <th>{!! __('employees.full_name') !!}</th>
                <th>{!! __('employees.month') !!}</th>
                <th>{!! __('employees.monthly_report_status') !!}</th>
                <th>{!! __('employees.file') !!}</th>
            </tr>
        </thead>
        <tbody id="records_table">
            <tr>
                <td colspan="5" class="text-center py-4 text-muted">
                    <i class="la la-inbox d-block" style="font-size:2.5rem;opacity:.4;"></i>
                    {!! __('employees.no_data_found') !!}
                </td>
            </tr>
        </tbody>
    </table>
</div>
