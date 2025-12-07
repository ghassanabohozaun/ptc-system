<div id="accordionWrap1" role="tablist" aria-multiselectable="true">
    <div class="card collapse-icon panel mb-0 box-shadow-0 border-0">

        <!--------------------------------------- basic info ------------------------>
        <div id="heading11" role="tab" class="card-header border-bottom-blue-grey border-bottom-lighten-4">
            <a data-toggle="collapse" data-parent="#accordionWrap1" href="#accordion11" aria-expanded="true"
                aria-controls="accordion11" class="h6 blue">{!! __('employees.basic') !!}</a>
        </div>
        <div id="accordion11" role="tabpanel" aria-labelledby="heading11" class="collapse show" aria-expanded="true">
            <div class="card-body">




            </div>
        </div>

        <!--------------------------------------- education info ------------------------>

        <div id="heading12" role="tab" class="card-header border-bottom-blue-grey border-bottom-lighten-4">
            <a data-toggle="collapse" data-parent="#accordionWrap1" href="#accordion12" aria-expanded="false"
                aria-controls="accordion12" class="h6 blue collapsed">{!! __('employees.education') !!}</a>
        </div>
        <div id="accordion12" role="tabpanel" aria-labelledby="heading12" class="collapse" aria-expanded="false">
            <div class="card-body">

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="table-responsive ">
                            <table class="table" id='myTable'>
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>{!! __('employees.educational_instituation_name') !!}</th>
                                        <th>{!! __('employees.education_level') !!}</th>
                                        <th>{!! __('employees.education_year') !!}</th>
                                        <th>{!! __('employees.education_aveage') !!}</th>
                                        <th>{!! __('employees.certification') !!}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($employee->employeeEducation as $key=> $item)
                                        <tr class="text-center">
                                            <th class="col-lg-1">{!! $loop->iteration !!} </th>
                                            <td class="col-lg-2">{!! $item->educational_instituation_name !!}</td>
                                            <td class="col-lg-2"> {!! $item->education_level !!}</td>
                                            <td class="col-lg-2"> {!! $item->education_year !!}</td>
                                            <td class="col-lg-2"> {!! $item->education_aveage !!}</td>
                                            <td class="col-lg-2">
                                                <div class="position-relative d-inline-block mt-1 mb-2">
                                                    @if ($item->certification)
                                                        <img src="{!! asset('uploads/employeesCertifications/' . $item->certification) !!}"
                                                            alt="{!! __('employees.photo') !!}"
                                                            class="shadow-sm img-fluid img-thumbnail round-md "
                                                            style="width: 80px ;height: 80px ;" />
                                                    @else
                                                        <img src="{!! asset('assets\dashbaord\images\no_image.jpg') !!}"
                                                            alt="{!! __('employees.photo') !!}"
                                                            class="shadow-sm img-fluid img-thumbnail round-md "
                                                            style="width: 80px ;height: 80px ;" />
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                {!! __('products.no_product_varaints_found') !!}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--------------------------------------- job details info ------------------------>

        <div id="heading13" role="tab" class="card-header border-bottom-blue-grey border-bottom-lighten-4">
            <a data-toggle="collapse" data-parent="#accordionWrap1" href="#accordion13" aria-expanded="false"
                aria-controls="accordion13" class="h6 blue collapsed">{!! __('employees.job_details') !!}</a>
        </div>
        <div id="accordion13" role="tabpanel" aria-labelledby="heading13" class="collapse" aria-expanded="false">
            <div class="card-body">

                <p>
                    <li class="la la-circle text-primary"></li>
                    <span>{!! __('employees.title') !!} : </span>
                    <span>{!! $employee->employeeJobDetails->title !!}</span>
                </p>

                <p>
                    <li class="la la-circle text-primary"></li>
                    <span>{!! __('employees.basic_salary') !!} : </span>
                    <span>{!! $employee->employeeJobDetails->basic_salary !!}</span>
                    <span class="text-danger"> {!! $employee->currency !!} </span>
                </p>

                <p>
                    <li class="la la-circle text-primary"></li>
                    <span>{!! __('employees.appointment_date') !!} : </span>
                    <span>{!! $employee->employeeJobDetails->appointment_date !!}</span>
                </p>

                <p>
                    <li class="la la-circle text-primary"></li>
                    <span>{!! __('employees.contact_expire_date') !!} : </span>
                    <span>{!! $employee->employeeJobDetails->contact_expire_date !!}</span>
                </p>

                <p>
                    <li class="la la-circle text-primary"></li>
                    <span>{!! __('employees.employee_status_id') !!} : </span>
                    <span>{!! $employee->employeeJobDetails->employeeStatus->name !!}</span>
                </p>

                <p>
                    <li class="la la-circle text-primary"></li>
                    <span>{!! __('employees.employment_type') !!} : </span>
                    <span>{!! $employee->employeeJobDetails->EmploymentType() !!}</span>
                </p>

                <p>
                    <li class="la la-circle text-primary"></li>
                    <span>{!! __('employees.department_id') !!} : </span>
                    <span>{!! $employee->employeeJobDetails->department->name !!}</span>
                </p>

                <p>
                    <li class="la la-circle text-primary"></li>
                    <span>{!! __('employees.supervisor') !!} : </span>
                    <span>{!! $employee->employeeJobDetails->supervisor !!}</span>
                </p>

            </div>
        </div>

    </div>
</div>
