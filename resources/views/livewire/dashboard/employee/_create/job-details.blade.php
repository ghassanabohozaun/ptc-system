<form>
    <div class="row">
        <!-- Job Title AR -->
        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="title_ar">{!! __('employees.title_ar') !!}</label>
                <input type="text" wire:model.live="title_ar" 
                    class="form-control premium-input @error('title_ar') is-invalid-premium @enderror" 
                    autocomplete="off" placeholder="{!! __('employees.enter_title_ar') !!}">
                @error('title_ar')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <!-- Job Title EN -->
        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="title_en">{!! __('employees.title_en') !!}</label>
                <input type="text" wire:model.live="title_en" 
                    class="form-control premium-input @error('title_en') is-invalid-premium @enderror" 
                    autocomplete="off" placeholder="{!! __('employees.enter_title_en') !!}">
                @error('title_en')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <!-- Appointment Date -->
        <div class="col-md-2">
            <div class="premium-form-group">
                <label for="appointment_date">{!! __('employees.appointment_date') !!}</label>
                <input type="date" wire:model.live="appointment_date" 
                    class="form-control premium-input @error('appointment_date') is-invalid-premium @enderror">
                @error('appointment_date')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <!-- Contact Expire Date -->
        <div class="col-md-2">
            <div class="premium-form-group">
                <label for="contact_expire_date">{!! __('employees.contact_expire_date') !!}</label>
                <input type="date" wire:model.live="contact_expire_date" 
                    class="form-control premium-input @error('contact_expire_date') is-invalid-premium @enderror">
                @error('contact_expire_date')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <!-- Employment Type -->
        <div class="col-md-2">
            <div class="premium-form-group">
                <label for="employment_type">{!! __('employees.employment_type') !!}</label>
                <select wire:model.live="employment_type" 
                    class="form-control premium-input @error('employment_type') is-invalid-premium @enderror">
                    <option value="" selected>{!! __('employees.select_from_list') !!}</option>
                    <option value="full_time">{!! __('employees.full_time') !!}</option>
                    <option value="part_time">{!! __('employees.part_time') !!}</option>
                    <option value="contract">{!! __('employees.contract') !!}</option>
                </select>
                @error('employment_type')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Employee Status -->
        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="employee_status_id">{!! __('employees.employee_status_id') !!}</label>
                <select id="employee_status_id" name="employee_status_id" wire:model="employee_status_id"
                    class="form-control premium-input @error('employee_status_id') is-invalid-premium @enderror">
                    <option value="0" selected='selected'>{!! __('general.select_from_list') !!}</option>
                    @foreach ($employeeStatuses as $status)
                        <option value="{!! $status->id !!}">{!! $status->name !!}</option>
                    @endforeach
                </select>
                @error('employee_status_id')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <!-- Department -->
        <div class="col-md-3">
            <div class="premium-form-group">
                <label for="department_id">{!! __('employees.department_id') !!}</label>
                <select id="department_id" name="department_id" wire:model="department_id"
                    class="form-control premium-input @error('department_id') is-invalid-premium @enderror">
                    <option value="0" selected='selected'>{!! __('general.select_from_list') !!}</option>
                    @foreach ($departments as $department)
                        <option value="{!! $department->id !!}">{!! $department->name !!}</option>
                    @endforeach
                </select>
                @error('department_id')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <!-- Supervisor AR -->
        <div class="col-md-2">
            <div class="premium-form-group">
                <label for="supervisor_ar">{!! __('employees.supervisor_ar') !!}</label>
                <input type="text" wire:model.live="supervisor_ar" 
                    class="form-control premium-input @error('supervisor_ar') is-invalid-premium @enderror" 
                    autocomplete="off" placeholder="{!! __('employees.enter_supervisor_ar') !!}">
                @error('supervisor_ar')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <!-- Supervisor EN -->
        <div class="col-md-2">
            <div class="premium-form-group">
                <label for="supervisor_en">{!! __('employees.supervisor_en') !!}</label>
                <input type="text" wire:model.live="supervisor_en" 
                    class="form-control premium-input @error('supervisor_en') is-invalid-premium @enderror" 
                    autocomplete="off" placeholder="{!! __('employees.enter_supervisor_en') !!}">
                @error('supervisor_en')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>

        <!-- Submit Monthly Report -->
        <div class="col-md-2">
            <div class="premium-form-group">
                <label for="submit_monthly_report">{!! __('employees.submit_monthly_report') !!}</label>
                <select wire:model.live="submit_monthly_report" 
                    class="form-control premium-input @error('submit_monthly_report') is-invalid-premium @enderror">
                    <option value="" selected>{!! __('employees.select_from_list') !!}</option>
                    <option value="0">{!! __('employees.no') !!}</option>
                    <option value="1">{!! __('employees.yes') !!}</option>
                </select>
                @error('submit_monthly_report')
                    <span class="error-message-premium">
                        <i class="la la-info-circle"></i> {!! $message !!}
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <!-- Final Save Button -->
    <div class="row mt-3">
        <div class="col-md-12 text-right">
            <button type="button" wire:click="submitJobDetailsFrom" class="btn btn-premium-add px-4">
                <i class="la la-save mr-1"></i>
                {!! __('employees.save') !!}
                <span wire:loading wire:target="submitJobDetailsFrom">
                    <i class="la la-refresh la-spin ml-1"></i>
                </span>
            </button>
        </div>
    </div>
    <div class="clearfix"></div>
</form>
