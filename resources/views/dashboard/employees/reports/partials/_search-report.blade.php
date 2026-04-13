<div class="card">
    <div class="card-header premium-card-header-alt">
        <h4 class="card-title">
            <i class="la la-filter text-primary"></i> {!! __('general.filters') !!}
        </h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
            </ul>
        </div>
    </div>

    <div class="card-content collapse show">
        <div class="card-body">
            <div class="row">

                <!-- Select Employee (Single/Multi) -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="employee_ids" class="premium-label">
                            <i class="la la-users"></i> {!! __('employees.employee_select') !!} 
                            <span class="badge badge-light-primary badge-pill ml-1 font-10 font-weight-500">{!! __('general.optional') !!}</span>
                        </label>
                        <select class="form-control select2" id="employee_ids" name="employee_ids[]" multiple="multiple">
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                        <div class="bulk-select-actions d-flex gap-2 mt-2">
                            <button type="button" class="btn btn-primary btn-glow btn-premium-add radius-10" id="select_all_employees">
                                <i class="la la-check-square"></i> {!! __('general.select_all') !!}
                            </button>
                            <button type="button" class="btn btn-outline-danger btn-premium-reset radius-10" id="deselect_all_employees">
                                <i class="la la-times-circle"></i> {!! __('general.deselect_all') !!}
                            </button>
                        </div>
                        <small class="text-muted mt-2 d-block">
                            <i class="la la-info-circle"></i> {!! __('employees.select_multiple_hint') !!}
                        </small>
                    </div>
                </div>

                <!-- Gender -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="gender">{!! __('employees.gender') !!}</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="">{!! __('general.select') !!} {!! __('employees.gender') !!}</option>
                            <option value="male">{!! __('employees.male') !!}</option>
                            <option value="female">{!! __('employees.female') !!}</option>
                        </select>
                    </div>
                </div>

                <!-- Marital Status -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="marital_status">{!! __('employees.marital_status') !!}</label>
                        <select class="form-control" id="marital_status" name="marital_status">
                            <option value="">{!! __('general.select') !!} {!! __('employees.marital_status') !!}</option>
                            <option value="single">{!! __('employees.single') !!}</option>
                            <option value="married">{!! __('employees.married') !!}</option>
                            <option value="divorced">{!! __('employees.divorced') !!}</option>
                            <option value="widowed">{!! __('employees.widowed') !!}</option>
                        </select>
                    </div>
                </div>

                <!-- Department -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="department_id">{!! __('employees.department_id') !!}</label>
                        <select class="form-control" id="department_id" name="department_id">
                            <option value="">{!! __('general.select') !!} {!! __('employees.department_id') !!}</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Employee Status -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="employee_status_id">{!! __('employees.employee_status_id') !!}</label>
                        <select class="form-control" id="employee_status_id" name="employee_status_id">
                            <option value="">{!! __('general.select') !!} {!! __('employees.employee_status_id') !!}</option>
                            @foreach ($employeeStatuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Governorate -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="governoate_id">{!! __('employees.governoate_id') !!}</label>
                        <select class="form-control" id="governoate_id" name="governoate_id">
                            <option value="">{!! __('general.select') !!} {!! __('employees.governoate_id') !!}</option>
                            @foreach ($governorates as $governorate)
                                <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- City -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="city_id">{!! __('employees.city_id') !!}</label>
                        <select class="form-control" id="city_id" name="city_id" disabled>
                            <option value="">{!! __('general.select') !!} {!! __('employees.city_id') !!}</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
