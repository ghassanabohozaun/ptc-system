<!-- Personal Info Grid -->
<div class="mb-4">
    <h3 class="mb-3 font-weight-bold" style="color: #0f172a; padding-bottom: 8px; border-bottom: 2px solid #e2e8f0; display: inline-block; font-size: 1.25rem;">
        <i class="la la-user text-primary mr-1"></i> {!! __('employees.basic') !!}
    </h3>
    <div class="row">
        <!-- Tile -->
        <div class="col-xl-3 col-lg-4 col-md-6 mb-3">
            <div class="premium-tile">
                <div class="tile-icon-wrapper bg-glass-blue">
                    <i class="la la-id-card"></i>
                </div>
                <div class="tile-content">
                    <p class="tile-label">{!! __('employees.personal_id') !!}</p>
                    <p class="tile-value">{!! $employee->personal_id !!}</p>
                </div>
            </div>
        </div>
        
        <!-- Tile -->
        <div class="col-xl-3 col-lg-4 col-md-6 mb-3">
            <div class="premium-tile">
                <div class="tile-icon-wrapper bg-glass-orange">
                    <i class="la la-birthday-cake"></i>
                </div>
                <div class="tile-content">
                    <p class="tile-label">{!! __('employees.birthday') !!}</p>
                    <p class="tile-value">{!! $employee->birthday !!}</p>
                </div>
            </div>
        </div>
        
        <!-- Tile -->
        <div class="col-xl-3 col-lg-4 col-md-6 mb-3">
            <div class="premium-tile">
                <div class="tile-icon-wrapper bg-glass-purple">
                    <i class="la la-venus-mars"></i>
                </div>
                <div class="tile-content">
                    <p class="tile-label">{!! __('employees.gender') !!}</p>
                    <p class="tile-value">{!! $employee->EmployeeGender() !!}</p>
                </div>
            </div>
        </div>

        <!-- Tile -->
        <div class="col-xl-3 col-lg-4 col-md-6 mb-3">
            <div class="premium-tile">
                <div class="tile-icon-wrapper bg-glass-slate">
                    <i class="la la-heart-o"></i>
                </div>
                <div class="tile-content">
                    <p class="tile-label">{!! __('employees.marital_status') !!}</p>
                    <p class="tile-value">{!! $employee->marital_status !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Info Grid -->
<div class="mb-4">
    <h3 class="mb-3 font-weight-bold" style="color: #0f172a; padding-bottom: 8px; border-bottom: 2px solid #e2e8f0; display: inline-block; font-size: 1.25rem;">
        <i class="la la-phone text-primary mr-1"></i> {!! __('employees.contact_info') !!}
    </h3>
    <div class="row">
        <!-- Tile -->
        <div class="col-xl-4 col-lg-6 col-md-6 mb-3">
            <div class="premium-tile">
                <div class="tile-icon-wrapper bg-glass-green">
                    <i class="la la-phone"></i>
                </div>
                <div class="tile-content">
                    <p class="tile-label">{!! __('employees.mobile_no') !!}</p>
                    <p class="tile-value">{!! $employee->mobile_no !!}</p>
                </div>
            </div>
        </div>
        
        <!-- Tile -->
        <div class="col-xl-4 col-lg-6 col-md-6 mb-3">
            <div class="premium-tile">
                <div class="tile-icon-wrapper bg-glass-blue">
                    <i class="la la-envelope"></i>
                </div>
                <div class="tile-content">
                    <p class="tile-label">{!! __('employees.email') !!}</p>
                    <p class="tile-value">{!! $employee->email !!}</p>
                </div>
            </div>
        </div>
        
        <!-- Tile -->
        <div class="col-xl-4 col-lg-12 col-md-12 mb-3">
            <div class="premium-tile">
                <div class="tile-icon-wrapper bg-glass-slate">
                    <i class="la la-map-marker"></i>
                </div>
                <div class="tile-content">
                    <p class="tile-label">{!! __('employees.governoate_id') !!} / {!! __('employees.city_id') !!}</p>
                    <p class="tile-value">{!! $employee->governorate->name !!} - {!! $employee->city->name !!}</p>
                </div>
            </div>
        </div>
        
        <!-- Tile Full Width -->
        <div class="col-xl-12 col-lg-12 mb-3">
            <div class="premium-tile" style="padding: 12px 18px;">
                <div class="tile-icon-wrapper bg-glass-orange" style="width: 35px; height: 35px;">
                    <i class="la la-map" style="font-size: 1.2rem;"></i>
                </div>
                <div class="tile-content flex-row align-items-center gap-3">
                    <span class="tile-label m-0" style="white-space: nowrap;">{!! __('employees.address_details') !!}:</span>
                    <span class="tile-value m-0 font-weight-normal">{!! $employee->address_details !!}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Education Grid Tiles -->
<div class="mb-4">
    <h3 class="mb-3 font-weight-bold" style="color: #0f172a; padding-bottom: 8px; border-bottom: 2px solid #e2e8f0; display: inline-block; font-size: 1.25rem;">
        <i class="la la-graduation-cap text-primary mr-1"></i> {!! __('employees.education') !!}
    </h3>
    <div class="row">
        @forelse ($employee->employeeEducation as $key => $item)
            <div class="col-xl-6 col-lg-12 mb-3">
                <div class="premium-tile" style="align-items: flex-start;">
                    <div class="tile-icon-wrapper bg-glass-purple">
                        <i class="la la-university"></i>
                    </div>
                    <div class="tile-content" style="width: 100%;">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h4 class="m-0 font-weight-bold text-dark" style="font-size: 1.05rem;">{!! $item->educational_instituation_name !!}</h4>
                            <span class="badge badge-light-primary px-2 py-1">{!! $item->education_level !!}</span>
                        </div>
                        
                        <div class="d-flex gap-4 mt-2 mb-3">
                            <div>
                                <p class="tile-label m-0">{!! __('employees.education_year') !!}</p>
                                <p class="tile-value m-0">{!! $item->education_year !!}</p>
                            </div>
                            <div>
                                <p class="tile-label m-0">{!! __('employees.education_aveage') !!}</p>
                                <p class="tile-value text-success m-0">{!! $item->education_aveage !!}%</p>
                            </div>
                        </div>

                        <div>
                            @if ($item->certification)
                                <a href="{!! asset('uploads/employeesCertifications/' . $item->certification) !!}" target="_blank" 
                                    class="btn btn-sm btn-info round px-3 shadow-sm border-0" style="background: linear-gradient(135deg, #3b82f6, #2563eb);">
                                    <i class="la la-download"></i> {!! __('general.download') !!}
                                </a>
                            @else
                                <span class="text-muted font-small-3 bg-light rounded px-2 py-1">{!! __('employees.no_certification') !!}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="premium-tile justify-content-center py-4">
                    <div class="text-muted d-flex flex-column align-items-center">
                        <i class="la la-inbox la-2x text-light mb-2"></i>
                        <span style="font-size: 1rem;">{!! __('employees.no_data_found') !!}</span>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>


