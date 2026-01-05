<div class="tab-pane fade" id="more" role="tabpanel" aria-labelledby="more">
    <div class="row">
        <div class="col-lg-12 d-flex flex-column">
            <div class="row flex-grow">


                <!--begin::first-->

                <div class="col-lg-4 grid-margin stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body">
                            <div class="d-sm-flex  ps-2 align-items-start" style="font-weight: 600">
                                <i class="fa fa-check-square-o"></i> &nbsp;
                                {!! __('employees.basic') !!}
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table">

                                    <tbody>
                                        <tr>
                                            <td> {!! __('employees.personal_id') !!} </td>
                                            <td>{!! $employee->personal_id !!}</td>
                                        </tr>
                                        <tr>
                                            <td>{!! __('employees.full_name') !!}</td>
                                            <td>{!! $employee->EmployeeShortName() !!}</td>
                                        </tr>
                                        <tr>
                                            <td> {!! __('employees.gender') !!} </td>
                                            <td>{!! $employee->EmployeeGender() !!}</td>
                                        </tr>
                                        <tr>
                                            <td> {!! __('employees.marital_status') !!} </td>
                                            <td>{!! $employee->marital_status !!}</td>
                                        </tr>
                                        <tr>
                                            <td> {!! __('employees.mobile_no') !!} </td>
                                            <td>{!! $employee->mobile_no !!}</td>
                                        </tr>
                                        <tr>
                                            <td> {!! __('employees.alternative_mobile_no') !!} </td>
                                            <td>{!! $employee->alternative_mobile_no !!}</td>
                                        </tr>
                                        <tr>
                                            <td> {!! __('employees.email') !!} </td>
                                            <td>{!! $employee->email !!}</td>
                                        </tr>

                                        <tr>
                                            <td> {!! __('employees.governorate_id') !!} </td>
                                            <td>{!! $employee->governorate->name !!}</td>
                                        </tr>

                                        <tr>
                                            <td> {!! __('employees.city_id') !!} </td>
                                            <td>{!! $employee->city->name !!}</td>
                                        </tr>
                                        <tr>
                                            <td> {!! __('employees.address_details') !!} </td>
                                            <td>{!! $employee->address_details !!}</td>
                                        </tr>

                                        <tr>
                                            <td> {!! __('employees.department_id') !!} </td>
                                            <td>{!! $employee->employeeJobDetails->department->name ?? '' !!}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end::first-->

                <!--begin::secend-->
                <div class="col-lg-3 grid-margin stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body">
                            <div class="d-sm-flex align-items-start" style="font-weight: 600">
                                <i class="fa fa-check-square-o"></i> &nbsp;
                                {!! __('employees.job_details') !!}
                            </div>



                            <div class="table-responsive mt-4">
                                <table class="table">

                                    <tbody>
                                        <tr>
                                            <td> {!! __('employees.bank_name') !!} </td>
                                            <td>{!! $employee->bank_name !!}</td>
                                        </tr>
                                        <tr>
                                            <td>{!! __('employees.iban') !!}</td>
                                            <td>{!! $employee->iban !!}</td>
                                        </tr>
                                        <tr>
                                            <td> {!! __('employees.banck_account') !!} </td>
                                            <td>{!! $employee->banck_account !!}</td>
                                        </tr>
                                        <tr>
                                            <td> {!! __('employees.currency') !!} </td>
                                            <td>{!! $employee->currency !!}</td>
                                        </tr>

                                        <tr>
                                            <td> {!! __('employees.title') !!} </td>
                                            <td>{!! $employee->employeeJobDetails->title ?? '' !!}</td>
                                        </tr>

                                        <tr>
                                            <td> {!! __('employees.basic_salary') !!} </td>
                                            <td>{!! $employee->employeeJobDetails->basic_salary ?? '' !!}
                                                <span class="text-danger"> {!! $employee->currency ?? '' !!} </span>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td> {!! __('employees.appointment_date') !!} </td>
                                            <td>{!! $employee->employeeJobDetails->appointment_date ?? '' !!}</td>
                                        </tr>

                                        <tr>
                                            <td> {!! __('employees.contact_expire_date') !!} </td>
                                            <td>{!! $employee->employeeJobDetails->contact_expire_date ?? '' !!}</td>
                                        </tr>

                                        <tr>
                                            <td> {!! __('employees.employee_status_id') !!} </td>
                                            <td>{!! $employee->employeeJobDetails->employee_status_id ?? '' !!}</td>
                                        </tr>

                                        <tr>
                                            <td> {!! __('employees.employee_status_id') !!} </td>
                                            <td>{!! $employee->employeeJobDetails->employeeStatus->name ?? '' !!}</td>
                                        </tr>
                                        <tr>
                                            <td> {!! __('employees.supervisor') !!} </td>
                                            <td>{!! $employee->employeeJobDetails->supervisor->name ?? '' !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::secend-->

                <!--begin::third-->
                <div class="col-lg-5 grid-margin stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body">
                            <div class="d-sm-flex align-items-start" style="font-weight: 600">
                                <i class="fa fa-check-square-o"></i> &nbsp;
                                {!! __('employees.education') !!}
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table">
                                    <thead>
                                        <tr>
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
                                                                style="width: 40px ;height: 40px ;" />
                                                        @else
                                                            <img src="{!! asset('assets\dashbaord\images\no_image.jpg') !!}"
                                                                alt="{!! __('employees.photo') !!}"
                                                                class="shadow-sm img-fluid img-thumbnail round-md "
                                                                style="width: 40px ;height: 40px ;" />
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
                    </div>
                </div>
                <!--end::third-->

            </div>

        </div>

    </div>
</div>
