<div class="card">
    <div class="card-header">
        <h4 class="card-title">{!! __('general.filters') !!}</h4>
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
