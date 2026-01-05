<div class="content-wrapper">
    <!-- begin: content header -->
    <div class="content-header row">
        <!-- begin: content header left-->
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">{!! __('roles.roles') !!}</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{!! route('dashboard.index') !!}">
                                {!! __('dashboard.home') !!}
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{!! route('dashboard.salaries.index') !!}">
                                {!! __('salaries.salaries') !!}
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{!! route('dashboard.employee.salary.index', $salary->id) !!}">
                                {!! __('salaries.employee_salary') !!}
                            </a>
                        </li>

                    </ol>

                </div>
            </div>
        </div>
        <!-- end: content header left-->

        <!-- begin: content header right-->
        <div class="content-header-right col-md-6 col-12">
            <div class="float-md-right mb-1">

                <button type="button" wire:click ="submitFrom" class="btn btn-info btn-glow">
                    {!! __('general.save') !!}
                    <span wire:loading wire:target="submitFrom">
                        <i class="la la-refresh spinner">
                        </i>
                    </span>
                </button>

            </div>
        </div>
        <!-- end: content header right-->

    </div> <!-- end :content header -->

    <!-- begin: content body -->
    <div class="content-body">

        <!-- begin: content body -->
        <div class="content-body">

            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- begin: card header -->
                            <div class="card-header">
                                <h2 class="card-title" id="basic-layout-colored-form-control" style="font-size: 1.2rem">
                                    {!! __('salaries.salary_of') !!} : { {!! $salary['month'] !!} /{!! $salary['year'] !!} }
                                </h2>
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

                                        <table class="table" id='myTable'>
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{!! __('employees.employee_id') !!}</th>
                                                    <th>{!! __('employees.personal_id') !!}</th>
                                                    <th>{!! __('employees.basic_salary') !!}</th>
                                                    <th>{!! __('salaries.actual_salary') !!}</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                @foreach ($employeeSalaryItem as $index => $row)
                                                    <tr wire:key="row-{{ $index }}">

                                                        <td>{!! $loop->iteration !!}</td>
                                                        <td>
                                                            <label>{!! $row['employee_name'] !!}</label>
                                                        </td>
                                                        <td>
                                                            <label>{!! $row['personal_id'] !!}</label>
                                                        </td>
                                                        <td>
                                                            <label>{!! $row['basic_salary'] !!}</label>
                                                        </td>

                                                        <td class="col-lg-2 col-md-2 col-sm-12">
                                                            <input type="number"
                                                                wire:model="employeeSalaryItem.{!! $index !!}.amount"
                                                                class="form-control"
                                                                @error('employeeSalaryItem.' . $index . '.amount')  style="border-color: rgb(246, 78, 96)"  @enderror />
                                                            @error('employeeSalaryItem.' . $index . '.amount')
                                                                <span class="text text-danger">
                                                                    <strong>{!! $message !!}</strong>
                                                                </span>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                @endforeach


                                                {{-- @forelse ($employees as $employee)
                                                    <tr>
                                                        <th style="width: 5%">
                                                            <button class="btn btn-default btn-xs"
                                                                data-toggle="collapse" style="border:none"
                                                                class="accordion-toggle" style="padding-top: -10px">
                                                                <span class="la la-plus"></span>
                                                            </button>
                                                            {!! $loop->index !!} {!! $loop->iteration !!}
                                                        </th>
                                                        <td style="width: 15%">{!! $employee->first_name !!}</td>
                                                        <td style="width: 10%">{!! $employee->personal_id !!}</td>
                                                        <td style="width: 10%">{!! $employee->basic_salary !!}
                                                            <span>{!! $employee->currency !!}</span>
                                                        </td>
                                                        <td style="width: 20%">
                                                            <input type="number" id="actual_salary"
                                                                class="form-control" name="actual_salary[]"
                                                                autocomplete="off" value="{!! $employee->basic_salary !!}"
                                                                placeholder="{!! __('salaries.actual_salary') !!}">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="11">
                                                            <div class="accordian-body collapse"
                                                                id="demo_{!! $employee->id !!}">
                                                                <input type="text" id="notes"
                                                                    class="form-control" name="notes[]"
                                                                    autocomplete="off" value="{!! $employee->notes !!}"
                                                                    placeholder="{!! __('salaries.notes') !!}">
                                                            </div>
                                                        </td>
                                                    </tr>

                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">
                                                            {!! __('salaries.no_employees_found') !!}
                                                        </td>
                                                    </tr>
                                                @endforelse --}}
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <!-- end: card content -->
                        </div>
                    </div> <!-- end: card  -->
                </div><!-- end: row  -->
            </section><!-- end: sections  -->
        </div><!-- end: content body  -->
    </div><!-- end: content body  -->
</div> <!-- end: content wrapper  -->
