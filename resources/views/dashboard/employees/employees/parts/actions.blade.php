<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        <a href="{!! route('dashboard.employees.edit', $employee->id) !!}" class="btn btn-sm btn-outline-primary" title="{!! __('general.edit') !!}">
            <i class="la la-edit"></i>
        </a>

        <a href="{!! route('dashboard.employees.show', $employee->id) !!}" class="btn btn-sm btn-outline-info" title="{!! __('general.show') !!}">
            <i class="la la-eye"></i>
        </a>

        <a href="javascript:void(0)" data-id="{!! $employee->id !!}"
            class="btn btn-sm btn-outline-danger delete_employee_btn" title="  {!! __('general.delete') !!}">
            <i class="la la-trash"></i>
        </a>

    </div>
</div>
