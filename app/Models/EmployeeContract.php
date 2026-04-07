<?php

namespace App\Models;

use App\Traits\Dashboard\Filterable;
use Illuminate\Database\Eloquent\Model;

class EmployeeContract extends Model
{
    use Filterable;

    protected $table = 'employee_contracts';
    protected $fillable = ['employee_id', 'contract_duration', 'contract_start_date', 'contract_expiry_date', 'monthly_salary'];

    // relation
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
