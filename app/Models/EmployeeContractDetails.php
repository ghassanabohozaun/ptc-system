<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeContractDetails extends Model
{
    protected $table = 'employee_contract_details';
    protected $fillable = ['employee_id', 'weekly_working_hours_and_days', 'holidays_and_festivals', 'job_duties', 'contract_terms', 'education_contract', 'experiences_contract', 'other_requirements'];

    // relation
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
