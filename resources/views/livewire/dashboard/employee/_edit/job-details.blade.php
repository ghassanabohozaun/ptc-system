<form>
    <!-- begin: title,basic_salary , appointment_date ,contact_expire_date -->
    <div class="row">

        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="title">{!! __('employees.title') !!}</label>
                <input type="text" wire:model.live="title" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_title') !!}"
                    @error('title')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('title')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->

        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="basic_salary">{!! __('employees.basic_salary') !!}</label>
                <input type="number" wire:model.live="basic_salary" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_basic_salary') !!}"
                    @error('basic_salary')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('basic_salary')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->


        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="appointment_date">{!! __('employees.appointment_date') !!}</label>
                <input type="date" wire:model.live="appointment_date" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_appointment_date') !!}"
                    @error('appointment_date')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('appointment_date')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->

        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="contact_expire_date">{!! __('employees.contact_expire_date') !!}</label>
                <input type="date" wire:model.live="contact_expire_date" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_contact_expire_date') !!}"
                    @error('contact_expire_date')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('contact_expire_date')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->

    </div>
    <!-- end:  title,basic_salary , appointment_date ,contact_expire_date -->


    <!-- begin: employment_type , employee_status_id , department_id , supervisor -->
    <div class="row">

        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="employment_type">{!! __('employees.employment_type') !!}</label>
                <select wire:model.live="employment_type" class="form-control"
                    @error('employment_type')  style="border-color: rgb(246, 78, 96)"  @enderror>
                    <option value="" selected>{!! __('employees.select_from_list') !!}</option>
                    <option value="full_time">{!! __('employees.full_time') !!}</option>
                    <option value="part_time">{!! __('employees.part_time') !!}</option>
                    <option value="contract">{!! __('employees.contract') !!}</option>
                </select>
                @error('employment_type')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->

        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="employee_status_id">{!! __('employees.employee_status_id') !!}</label>
                <select class="form-control custom_select" wire:model="employee_status_id" id="employee_status_id"
                    name="employee_status_id"
                    @error('employee_status_id')  style="border-color: rgb(246, 78, 96)"  @enderror>
                    <option value="0" selected='selected'>
                        {!! __('general.select_from_list') !!}
                    </option>
                    @foreach ($employeeStatuses as $status)
                        <option value="{!! $status->id !!}">
                            {!! $status->name !!}
                        </option>
                    @endforeach
                </select>
                @error('employee_status_id')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->

        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="department_id">{!! __('employees.department_id') !!}</label>
                <select class="form-control custom_select" wire:model="department_id" id="department_id"
                    name="department_id" @error('department_id')  style="border-color: rgb(246, 78, 96)"  @enderror>
                    <option value="0" selected='selected'>
                        {!! __('general.select_from_list') !!}
                    </option>
                    @foreach ($departments as $department)
                        <option value="{!! $department->id !!}">
                            {!! $department->name !!}
                        </option>
                    @endforeach
                </select>
                @error('department_id')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->


        <!-- begin: input -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="supervisor">{!! __('employees.supervisor') !!}</label>
                <input type="text" wire:model.live="supervisor" class="form-control" autocomplete="off"
                    placeholder="{!! __('employees.enter_supervisor') !!}"
                    @error('supervisor')  style="border-color: rgb(246, 78, 96)"  @enderror>
                @error('supervisor')
                    <span class="text text-danger">
                        <strong>{!! $message !!}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- end: input -->


    </div>
    <!-- end:  employment_type, employee_status_id , department_id , supervisor-->


    <!-- begin: button -->
    <div class="row {!! Lang() == 'ar' ? 'pull-left' : 'pull-right' !!} mt-3">
        <div class="col-md-12">
            <button type="button" wire:click ="submitJobDetailsFrom" class="btn btn-primary  btn-glow">
                {!! __('employees.save') !!}
                <span wire:loading wire:target="submitJobDetailsFrom">
                    <i class="la la-refresh spinner">
                    </i>
                </span>
            </button>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- end: button -->
</form>
