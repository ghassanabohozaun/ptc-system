<div class="d-flex align-items-center justify-content-center">
    {{-- print --}}
    <a href="{!! route('dashboard.employee.salary.print', $salary->id) !!}"
        class="btn-premium-action btn-premium-action-info mr-1" title="{!! __('general.print') !!}">
        <i class="la la-print"></i>
    </a>

    {{-- employee salaries list --}}
    <a href="{!! route('dashboard.employee.salary.index', $salary->id) !!}"
        class="btn-premium-action btn-premium-action-warning mr-1" title="{!! __('salaries.employee_salary') !!}">
        <i class="la la-users"></i>
    </a>

    {{-- edit --}}
    <a href="javascript:void(0)" class="btn-premium-action btn-premium-action-edit edit_salary_button mr-1"
        title="{!! __('general.edit') !!}" data-id="{!! $salary->id !!}" data-month="{!! $salary->month !!}"
        data-year="{!! $salary->year !!}" data-release-date="{!! $salary->release_date !!}"
        data-details="{!! htmlspecialchars($salary->details) !!}" data-notes="{!! htmlspecialchars($salary->notes) !!}">
        <i class="la la-edit"></i>
    </a>

    {{-- delete --}}
    <a href="javascript:void(0)" class="btn-premium-action btn-premium-action-danger delete-confirm"
        data-id="{!! $salary->id !!}" data-route="{!! route('dashboard.salaries.destroy') !!}"
        data-title="{!! __('general.ask_delete_record') !!}" data-text="{!! __('general.delete_warning_text') !!}"
        data-confirm-btn="{!! __('general.yes') !!}" data-cancel-btn="{!! __('general.no') !!}"
        data-success-title="{!! __('general.deleted') !!}" data-success-text="{!! __('general.delete_success_message') !!}"
        title="{!! __('general.delete') !!}">
        <i class="la la-trash"></i>
    </a>
</div>
