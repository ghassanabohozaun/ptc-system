<!-- Financial Info Grid -->
<div class="mb-4">

    <div class="row">
        <!-- Bank Information Section -->
        <div class="col-xl-6 col-lg-6 mb-3">
            <h3 class="mb-3 font-weight-bold"
                style="color: #0f172a; padding-bottom: 8px; border-bottom: 2px solid #e2e8f0; display: inline-block; font-size: 1.25rem;">
                <i class="la la-bank text-primary mr-1"></i> {!! __('employees.bank_info') !!}
            </h3>

            <div class="row">
                <!-- Tile -->
                <div class="col-md-12 mb-3">
                    <div class="premium-tile">
                        <div class="tile-icon-wrapper bg-glass-blue">
                            <i class="la la-institution"></i>
                        </div>
                        <div class="tile-content">
                            <p class="tile-label">{!! __('employees.bank_name') !!}</p>
                            <p class="tile-value">{!! $employee->bank_name !!}</p>
                        </div>
                    </div>
                </div>

                <!-- Tile -->
                <div class="col-md-12 mb-3">
                    <div class="premium-tile">
                        <div class="tile-icon-wrapper bg-glass-slate">
                            <i class="la la-credit-card"></i>
                        </div>
                        <div class="tile-content">
                            <p class="tile-label">{!! __('employees.iban') !!}</p>
                            <p class="tile-value font-small-3" style="letter-spacing: 1px;">{!! $employee->iban !!}</p>
                        </div>
                    </div>
                </div>

                <!-- Tile -->
                <div class="col-md-12 mb-3">
                    <div class="premium-tile">
                        <div class="tile-icon-wrapper bg-glass-orange">
                            <i class="la la-folder-open"></i>
                        </div>
                        <div class="tile-content">
                            <p class="tile-label">{!! __('employees.banck_account') !!}</p>
                            <p class="tile-value">{!! $employee->banck_account !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Job Details / Salary Section -->
        <div class="col-xl-6 col-lg-6 mb-3">
            <h3 class="mb-3 font-weight-bold"
                style="color: #0f172a; padding-bottom: 8px; border-bottom: 2px solid #e2e8f0; display: inline-block; font-size: 1.25rem;">
                <i class="la la-money text-primary mr-1"></i> {!! __('employees.job_details') !!}
            </h3>

            <div class="row">
                <!-- Tile -->
                <div class="col-md-12 mb-3">
                    <div class="premium-tile" style="border-color: #10b981;">
                        <div class="tile-icon-wrapper bg-glass-green">
                            <i class="la la-dollar"></i>
                        </div>
                        <div class="tile-content">
                            <p class="tile-label">{!! __('employees.basic_salary') !!}</p>
                            <div class="d-flex align-items-center gap-2">
                                <span class="tile-value massive text-success">{!! $employee->basic_salary ?? '0' !!}</span>
                                <span class="badge badge-light-success ml-2">{!! $employee->currency !!}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tile -->
                <div class="col-md-6 mb-3">
                    <div class="premium-tile">
                        <div class="tile-icon-wrapper bg-glass-purple">
                            <i class="la la-briefcase"></i>
                        </div>
                        <div class="tile-content">
                            <p class="tile-label">{!! __('employees.employment_type') !!}</p>
                            <p class="tile-value">{!! $employee->employeeJobDetails->EmploymentType() ?? '--' !!}</p>
                        </div>
                    </div>
                </div>

                <!-- Tile -->
                <div class="col-md-6 mb-3">
                    <div class="premium-tile">
                        <div class="tile-icon-wrapper bg-glass-slate">
                            <i class="la la-exchange"></i>
                        </div>
                        <div class="tile-content">
                            <p class="tile-label">{!! __('employees.currency') !!}</p>
                            <p class="tile-value">{!! $employee->currency !!}</p>
                        </div>
                    </div>
                </div>
                <!-- Tile -->
                <div class="col-md-6 mb-3">
                    <div class="premium-tile">
                        <div class="tile-icon-wrapper bg-glass-blue">
                            <i class="la la-calendar-plus-o"></i>
                        </div>
                        <div class="tile-content">
                            <p class="tile-label">{!! __('employees.appointment_date') ?? 'تاريخ التعيين' !!}</p>
                            <p class="tile-value">{!! $employee->employeeJobDetails->appointment_date ?? '--' !!}</p>
                        </div>
                    </div>
                </div>

                <!-- Tile -->
                <div class="col-md-6 mb-3">
                    <div class="premium-tile">
                        <div class="tile-icon-wrapper bg-glass-orange">
                            <i class="la la-calendar-times-o"></i>
                        </div>
                        <div class="tile-content">
                            <p class="tile-label">{!! __('employees.contact_expire_date') ?? 'تاريخ انتهاء العقد' !!}</p>
                            <p class="tile-value">{!! $employee->employeeJobDetails->contact_expire_date ?? '--' !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
