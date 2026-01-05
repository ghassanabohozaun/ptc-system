<div class="row">
    <!-- begin: basic info -->
    <div class="col-md-3">
        <div class="content-body">
            <section id="basic-form-layouts">
                <div class="card" style="min-height: 600px">
                    <div class="card-head">
                        <div class="card-header">
                            @if ($employee->photo)
                                <div class="media">
                                    <div class="media-left pr-1">
                                        <span class="avatar avatar-lg rounded-circle">
                                            <img src="{!! asset('uploads/employeesPhotos/' . $employee->photo) !!}" alt="avatar"><i></i></span>
                                    </div>
                                </div>
                            @endif
                            <h4 class="media-heading pt-2 text-info">
                                {!! $employee->EmployeeFullName() !!}
                            </h4>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
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
                                        <span>{!! __('employees.governoate_id') !!} : </span>
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
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- end: sections  -->
        </div>
    </div>
    <!-- end: basic info -->


    <!-- begin: job details -->
    <div class="col-md-3">
        <div class="content-body">
            <section id="basic-form-layouts">
                <div class="card" style="min-height: 600px">

                    <div class="card-content">
                        <div class="card-body mt-2">
                            <div class="row">
                                <div class="col-lg-12">
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
                                        <li class="la la-circle text-primary"></li>
                                        <span>{!! __('employees.basic_salary') !!} : </span>
                                        <span>{!! $employee->basic_salary ?? '' !!}</span>
                                        <span class="text-success"> {!! $employee->currency ?? '' !!} </span>
                                    </p>


                                    <p>
                                        <li class="la la-dollar text-primary"></li>
                                        <span>{!! __('employees.currency') !!} : </span>
                                        <span>{!! $employee->currency !!}</span>
                                    </p>

                                    <p>
                                        <li class="la la-circle text-primary"></li>
                                        <span>{!! __('employees.title') !!} : </span>
                                        <span>{!! $employee->employeeJobDetails->title ?? '' !!}</span>
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
                        </div>
                    </div>
            </section><!-- end: sections  -->
        </div>
    </div>
    <!-- end: job details -->


    <!-- begin: education -->
    <div class="col-md-6">
        <div class="content-body">
            <section id="basic-form-layouts">
                <div class="card" style="min-height: 600px">

                    <div class="card-content">
                        <div class="card-body mt-2 ">
                            <div class="row">
                                <div class="col-lg-12">
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
                                                                        style="width: 40px ;height: 40px ;" />
                                                                    <a href="{!! asset('uploads/employeesCertifications/' . $item->certification) !!}" target="_blank">
                                                                        {!! __('general.download') !!}
                                                                    </a>
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
                    </div>
            </section><!-- end: sections  -->
        </div>
    </div>
    <!-- end: education -->


</div>
