<div class="form-group mb-0">
    <div class="btn-group" role="group">
        {{-- print --}}
        <a href="{!! route('dashboard.employee.salary.print', $salary->id) !!}" class="btn btn-sm btn-outline-warning" title="{!! __('general.print') !!}">
            <i class="ft-printer"></i>
        </a>

        {{-- employee salaries list --}}
        <a href="{!! route('dashboard.employee.salary.index', $salary->id) !!}" class="btn btn-sm btn-outline-info" title="{!! __('salaries.employee_salary') !!}">
            <i class="ft-users"></i>
        </a>

        {{-- edit --}}
        <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary edit_salary_button"
            title="{!! __('general.edit') !!}" data-id="{!! $salary->id !!}" data-month="{!! $salary->month !!}"
            data-year="{!! $salary->year !!}" data-release-date="{!! $salary->release_date !!}"
            data-details="{!! htmlspecialchars($salary->details) !!}" data-notes="{!! htmlspecialchars($salary->notes) !!}">
            <i class="ft-edit-2"></i>
        </a>

        {{-- delete --}}
        <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger delete-confirm"
            data-id="{!! $salary->id !!}" data-route="{!! route('dashboard.salaries.destroy') !!}"
            data-title="{!! __('general.ask_delete_record') !!}" data-text="{!! __('general.delete_warning_text') !!}"
            data-confirm-btn="{!! __('general.yes') !!}" data-cancel-btn="{!! __('general.no') !!}"
            data-success-title="{!! __('general.deleted') !!}" data-success-text="{!! __('general.delete_success_message') !!}"
            title="{!! __('general.delete') !!}">
            <i class="ft-trash-2"></i>
        </a>
    </div>
</div>
