<div class="form-group mb-0">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        {{-- print --}}
        <a href="{{ route('dashboard.employeeContracts.print', $contract->id) }}" class="btn btn-sm btn-outline-info"
            title="{!! __('general.print') !!}">
            <i class="la la-print"></i>
        </a>

        {{-- edit --}}
        <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary edit-btn" title="{!! __('general.edit') !!}"
            data-toggle="modal" data-target="#editEmployeeContractModal" data-id="{{ $contract->id }}"
            data-employee_id="{{ $contract->employee_id }}" data-duration="{{ $contract->contract_duration }}"
            data-start="{{ $contract->contract_start_date }}" data-expiry="{{ $contract->contract_expiry_date }}"
            data-salary="{{ $contract->monthly_salary }}">
            <i class="la la-edit"></i>
        </a>


        {{-- delete --}}
        <a href="javascript:void(0)" class="btn btn-sm delete-confirm btn-outline-danger"
            title="{!! __('general.delete') !!}" data-id="{{ $contract->id }}"
            data-route="{{ route('dashboard.employeeContracts.destroy') }}"
            data-title="{{ __('general.ask_delete_record') }}" data-text="{{ __('general.delete_warning_text') }}"
            data-confirm-btn="{{ __('general.yes') }}" data-cancel-btn="{{ __('general.no') }}"
            data-success-title="{{ __('general.deleted') }}"
            data-success-text="{{ __('general.delete_success_message') }}">
            <i class="la la-trash"></i>
        </a>
    </div>
</div>
