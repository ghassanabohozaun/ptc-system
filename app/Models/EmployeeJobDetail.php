<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeJobDetail extends Model
{
    protected $table = 'employee_job_details';
    protected $fillable = ['title', 'appointment_date', 'contact_expire_date', 'employment_type', 'department_id', 'supervisor', 'submit_monthly_report','employee_status_id', 'employee_id'];

    // employee type function
    public function EmploymentType()
    {
        if ($this->employment_type == 'full_time') {
            return __('employees.full_time');
        } elseif ($this->employment_type == 'part_time') {
            return __('employees.part_time');
        }elseif ($this->employment_type == 'contract') {
            return __('employees.contract');
        }
    }

    // relation
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function employeeStatus()
    {
        return $this->belongsTo(EmployeeStatus::class, 'employee_status_id');
    }
}
