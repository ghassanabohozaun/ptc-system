@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/employee-profile.css') }}">
@endpush

@section('content')
    <div class="app-content content profile-container">
        <div class="content-wrapper">
            
            <!-- Ultra Premium Floating Header -->
            <div class="elite-header-card">
                <div class="elite-header-bg-accent"></div>
                
                <div class="elite-profile-main">
                    <div class="elite-avatar-wrapper">
                        <img src="{!! $employee->photo ? asset('uploads/employeesPhotos/' . $employee->photo) : asset('assets/dashboard/images/portrait/small/avatar-s-19.png') !!}" 
                             class="elite-avatar-img" alt="avatar">
                        <span class="elite-status-indicator"></span>
                    </div>
                    
                    <div class="elite-info-details">
                        <h2 class="elite-employee-name">
                            {!! $employee->EmployeeFullName() !!}
                        </h2>
                        <p class="elite-employee-title">
                            <i class="la la-diamond"></i>
                            {!! $employee->employeeJobDetails?->title ?? '--' !!}
                        </p>
                        
                        <!-- Floating Action Button -->
                        <div class="mt-15px">
                            <a href="{!! route('dashboard.employees.edit', $employee->id) !!}" class="btn btn-update-elite round px-4 py-2">
                                <i class="la la-edit"></i> {!! __('employees.update_employee') !!}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Floating Glass Statistics -->
                <div class="elite-quick-stats">
                    <div class="elite-stat-glass">
                        <div class="elite-stat-icon">
                            <i class="la la-building"></i>
                        </div>
                        <div class="elite-stat-content">
                            <p class="elite-stat-label">{!! __('employees.department_id') !!}</p>
                            <p class="elite-stat-value">{!! $employee->employeeJobDetails?->department?->name ?? '--' !!}</p>
                        </div>
                    </div>

                    <div class="elite-stat-glass">
                        <div class="elite-stat-icon stat-icon-green">
                            <i class="la la-user-secret"></i>
                        </div>
                        <div class="elite-stat-content">
                            <p class="elite-stat-label">{!! __('employees.supervisor') !!}</p>
                            <p class="elite-stat-value">{!! $employee->employeeJobDetails?->supervisor ?? '--' !!}</p>
                        </div>
                    </div>
                    
                    <div class="elite-stat-glass">
                        <div class="elite-stat-icon stat-icon-orange">
                            <i class="la la-calendar-check-o"></i>
                        </div>
                        <div class="elite-stat-content">
                            <p class="elite-stat-label">{!! __('employees.appointment_date') !!}</p>
                            <p class="elite-stat-value">{!! $employee->employeeJobDetails?->appointment_date ?? '--' !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Body with iOS Segmented Tabs -->
            <div class="row">
                <div class="col-md-12">
                    @include('dashboard.employees.employees.profile.tabs')
                </div>
            </div>

        </div>
    </div>
@endsection


