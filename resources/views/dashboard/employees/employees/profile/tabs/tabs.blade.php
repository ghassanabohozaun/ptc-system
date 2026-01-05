<ul class="nav nav-tabs nav-underline no-hover-bg nav-justified">
    <li class="nav-item">
        <a class="nav-link active" id="baseVerticalLeft1-tab1" data-toggle="tab" aria-controls="tabVerticalLeft11"
            href="#tabVerticalLeft11" aria-expanded="true">{!! __('employees.basic') !!}</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="baseVerticalLeft1-tab2" data-toggle="tab" aria-controls="tabVerticalLeft12"
            href="#tabVerticalLeft12" aria-expanded="false">{!! __('employees.bank_info') !!}</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="baseVerticalLeft1-tab3" data-toggle="tab" aria-controls="tabVerticalLeft13"
            href="#tabVerticalLeft13" aria-expanded="false">{!! __('employees.education') !!}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="baseVerticalLeft1-tab4" data-toggle="tab" aria-controls="tabVerticalLeft14"
            href="#tabVerticalLeft14" aria-expanded="false">{!! __('employees.job_details') !!}</a>
    </li>
</ul>

<div class="tab-content px-1 pt-1">
    <!--------------------------------------- basic info ------------------------>
    <div role="tabpanel" class="tab-pane active" id="tabVerticalLeft11" aria-expanded="true"
        aria-labelledby="baseVerticalLeft1-tab1" style="padding-left: 20px ;padding-right:20px">
        <p>
            <li class="la la-circle text-primary"></li>
            <span>{!! __('employees.personal_id') !!} : </span>
            <span>{!! $employee->personal_id !!}</span>
        </p>

        <p>
            <li class="la la-calendar text-success"></li>
            <span>{!! __('employees.birthday') !!} : </span>
            <span>{!! $employee->birthday !!}</span>
        </p>

        <p>
            <li class="la la-user text-info"></li>
            <span>{!! __('employees.gender') !!} : </span>
            <span>{!! $employee->EmployeeGender() !!}</span>
        </p>

        <p>
            <li class="la la-circle text-primary"></li>
            <span>{!! __('employees.marital_status') !!} : </span>
            <span>{!! $employee->marital_status !!}</span>
        </p>

        <p>
            <li class="la la-phone text-primary"></li>
            <span>{!! __('employees.mobile_no') !!} : </span>
            <span>{!! $employee->mobile_no !!}</span>
        </p>

        <p>
            <li class="la la-phone text-primary"></li>
            <span>{!! __('employees.alternative_mobile_no') !!} : </span>
            <span>{!! $employee->alternative_mobile_no !!}</span>
        </p>

        <p>
            <li class="la la-envelope text-primary"></li>
            <span>{!! __('employees.email') !!} : </span>
            <span>{!! $employee->email !!}</span>
        </p>

        <p>
            <li class="la la-map-marker text-primary"></li>
            <span>{!! __('employees.governorate_id') !!} : </span>
            <span>{!! $employee->governorate->name !!}</span>
        </p>

        <p>
            <li class="la la-map-marker text-primary"></li>
            <span>{!! __('employees.city_id') !!} : </span>
            <span>{!! $employee->city->name !!}</span>
        </p>

        <p>
            <li class="la la-map-marker text-primary"></li>
            <span>{!! __('employees.address_details') !!} : </span>
            <span>{!! $employee->address_details !!}</span>
        </p>

    </div>

    <!--------------------------------------- bank info ------------------------>
    <div role="tabpanel" class="tab-pane" id="tabVerticalLeft12" aria-expanded="true"
        aria-labelledby="baseVerticalLeft1-tab2">

        <p>
            <li class="la la-home text-primary"></li>
            <span>{!! __('employees.bank_name') !!} : </span>
            <span>{!! $employee->bank_name !!}</span>
        </p>

        <p>
            <li class="la la-qrcode text-primary"></li>
            <span>{!! __('employees.iban') !!} : </span>
            <span>{!! $employee->iban !!}</span>
        </p>

        <p>
            <li class="la la-circle text-primary"></li>
            <span>{!! __('employees.banck_account') !!} : </span>
            <span>{!! $employee->banck_account !!}</span>
        </p>

        <p>
            <li class="la la-dollar text-primary"></li>
            <span>{!! __('employees.currency') !!} : </span>
            <span>{!! $employee->currency !!}</span>
        </p>
    </div>

    <!--------------------------------------- education info ------------------------>
    <div class="tab-pane" id="tabVerticalLeft13" aria-labelledby="baseVerticalLeft1-tab3">
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
                                        <img src="{!! asset('uploads/employeesCertifications/' . $item->certification) !!}" alt="{!! __('employees.photo') !!}"
                                            class="shadow-sm img-fluid img-thumbnail round-md "
                                            style="width: 80px ;height: 80px ;" />
                                    @else
                                        <img src="{!! asset('assets\dashbaord\images\no_image.jpg') !!}" alt="{!! __('employees.photo') !!}"
                                            class="shadow-sm img-fluid img-thumbnail round-md "
                                            style="width: 80px ;height: 80px ;" />
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                {!! __('employees.no_data_found') !!}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!--------------------------------------- job details info ------------------------>
    <div class="tab-pane" id="tabVerticalLeft14" aria-labelledby="baseVerticalLeft1-tab4">
        <p>
            <li class="la la-circle text-primary"></li>
            <span>{!! __('employees.title') !!} : </span>
            <span>{!! $employee->employeeJobDetails->title ?? '' !!}</span>
        </p>

        <p>
            <li class="la la-circle text-primary"></li>
            <span>{!! __('employees.basic_salary') !!} : </span>
            <span>{!! $employee->employeeJobDetails->basic_salary ?? '' !!}</span>
            <span class="text-danger"> {!! $employee->currency ?? '' !!} </span>
        </p>

        <p>
            <li class="la la-circle text-primary"></li>
            <span>{!! __('employees.appointment_date') !!} : </span>
            <span>{!! $employee->employeeJobDetails->appointment_date ?? '' !!}</span>
        </p>

        <p>
            <li class="la la-circle text-primary"></li>
            <span>{!! __('employees.contact_expire_date') !!} : </span>
            <span>{!! $employee->employeeJobDetails->contact_expire_date ?? '' !!}</span>
        </p>

        <p>
            <li class="la la-circle text-primary"></li>
            <span>{!! __('employees.employee_status_id') !!} : </span>
            <span>{!! $employee->employeeJobDetails->employeeStatus->name ?? '' !!}</span>
        </p>

        <p>
            <li class="la la-circle text-primary"></li>
            <span>{!! __('employees.employment_type') !!} : </span>
            {{-- <span>{!! $employee->employeeJobDetails->EmploymentType() ?? '' !!}</span> --}}
        </p>

        <p>
            <li class="la la-circle text-primary"></li>
            <span>{!! __('employees.department_id') !!} : </span>
            <span>{!! $employee->employeeJobDetails->department->name ?? '' !!}</span>
        </p>

        <p>
            <li class="la la-circle text-primary"></li>
            <span>{!! __('employees.supervisor') !!} : </span>
            <span>{!! $employee->employeeJobDetails->supervisor ?? '' !!}</span>
        </p>

    </div>
</div>
