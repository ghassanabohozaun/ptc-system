<!-- Contract Details Grid -->
<div class="mb-4">
    <h3 class="mb-3 font-weight-bold section-header-title">
        <i class="la la-file-text text-primary mr-1"></i> {!! __('employees.contract_details') !!}
    </h3>
    
    <div class="row">
        <!-- Tile -->
        <div class="col-xl-6 col-lg-6 mb-3">
            <div class="premium-tile">
                <div class="tile-icon-wrapper bg-glass-blue">
                    <i class="la la-clock-o"></i>
                </div>
                <div class="tile-content">
                    <p class="tile-label">{!! __('employees.weekly_working_hours_and_days') !!}</p>
                    <p class="tile-value">{!! $employee->employeeContractDetails->weekly_working_hours_and_days ?? '--' !!}</p>
                </div>
            </div>
        </div>

        <!-- Tile -->
        <div class="col-xl-6 col-lg-6 mb-3">
            <div class="premium-tile">
                <div class="tile-icon-wrapper bg-glass-orange">
                    <i class="la la-sun-o"></i>
                </div>
                <div class="tile-content">
                    <p class="tile-label">{!! __('employees.holidays_and_festivals') !!}</p>
                    <p class="tile-value">{!! $employee->employeeContractDetails->holidays_and_festivals ?? '--' !!}</p>
                </div>
            </div>
        </div>

        <!-- Full Width Text Content Tiles -->
        <div class="col-xl-12 mb-3">
            <div class="premium-tile tile-start-aligned">
                <div class="tile-icon-wrapper bg-glass-slate">
                    <i class="la la-tasks"></i>
                </div>
                <div class="tile-content tile-w-100">
                    <p class="tile-label">{!! __('employees.job_duties') !!}</p>
                    <div class="tile-value text-muted text-muted-scroll">
                        {!! $employee->employeeContractDetails->job_duties ?? '--' !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 mb-3">
            <div class="premium-tile tile-start-aligned">
                <div class="tile-icon-wrapper bg-glass-green">
                    <i class="la la-gavel"></i>
                </div>
                <div class="tile-content tile-w-100">
                    <p class="tile-label">{!! __('employees.contract_terms') !!}</p>
                    <div class="tile-value text-muted text-muted-scroll">
                        {!! $employee->employeeContractDetails->contract_terms ?? '--' !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Requirements Grid -->
        <div class="col-md-4 mb-3">
            <div class="premium-tile">
                <div class="tile-icon-wrapper bg-glass-purple">
                    <i class="la la-graduation-cap"></i>
                </div>
                <div class="tile-content">
                    <p class="tile-label">{!! __('employees.education_contract') !!}</p>
                    <p class="tile-value font-small-3">{!! $employee->employeeContractDetails->education_contract ?? '--' !!}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="premium-tile">
                <div class="tile-icon-wrapper bg-glass-blue">
                    <i class="la la-briefcase"></i>
                </div>
                <div class="tile-content">
                    <p class="tile-label">{!! __('employees.experiences_contract') !!}</p>
                    <p class="tile-value font-small-3">{!! $employee->employeeContractDetails->experiences_contract ?? '--' !!}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="premium-tile">
                <div class="tile-icon-wrapper bg-glass-slate">
                    <i class="la la-plus-circle"></i>
                </div>
                <div class="tile-content">
                    <p class="tile-label">{!! __('employees.other_requirements') !!}</p>
                    <p class="tile-value font-small-3">{!! $employee->employeeContractDetails->other_requirements ?? '--' !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
