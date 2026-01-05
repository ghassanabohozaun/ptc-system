<div class="card">
    <!-- begin: card header -->
    <div class="card-header">
        <h4 class="card-title" id="basic-layout-colored-form-control">
            {!! __('employees.show_all_employees') !!}
        </h4>
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
    <!-- end: card header -->

    <!-- begin: card content -->
    <div class="card-content collapse show">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{!! __('employees.full_name') !!}</th>
                            <th>{!! __('employees.personal_id') !!}</th>
                            <th>{!! __('employees.gender') !!}</th>
                            <th>{!! __('employees.basic_salary') !!} </th>
                            <th>{!! __('employees.bank_name') !!}</th>
                            <th>{!! __('employees.governoate_id') !!}</th>
                            <th>{!! __('general.actions') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $employee)
                            <tr>
                                <td>{!! $loop->iteration !!}</td>
                                <td>{!! $employee->EmployeeShortName() !!}</td>
                                <td>{!! $employee->personal_id !!}</td>
                                <td>{!! $employee->EmployeeGender() !!}</td>
                                <td>{!! $employee->basic_salary !!}
                                    <span class="text-success">{!! $employee->currency !!}</span>
                                </td>
                                <td>{!! $employee->bank_name !!}</td>
                                <td>{!! $employee->governorate->name !!}</td>
                                <td>@include('dashboard.employees.employees.parts.actions')</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    {!! __('employees.no_employees_found') !!}
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="pagination-links float-right">
                {!! $employees->links() !!}
            </div>
        </div>
    </div>
    <!-- end: card content -->
</div>
