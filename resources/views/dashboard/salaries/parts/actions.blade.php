<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">


        {{-- print --}}
        <a href="{!! route('dashboard.employee.salary.print', $salary->id) !!}" class="btn btn-sm btn-outline-warning ">
            <i class="la la-print"></i>
        </a>


        {{-- add employees --}}
        <a href="{!! route('dashboard.employee.salary.index', $salary->id) !!}" class="btn btn-sm btn-outline-info ">
            <i class="la la-money"></i>
        </a>

        {{-- edit --}}
        <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary edit_salary_button"
            title="{!! __('general.edit') !!}" salary-id="{!! $salary->id !!}" salary-month="{!! $salary->month !!}"
            salary-year="{!! $salary->year !!}" salary-release-date="{!! $salary->release_date !!}"
            salary-details="{!! $salary->details !!}" salary-notes="{{ $salary->notes }}">
            <i class="la la-edit"></i>
        </a>

        {{-- delete --}}
        <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger delete_salary_btn"
            data-id="{!! $salary->id !!}">
            <i class="la la-trash"></i>
        </a>
    </div>
</div>
