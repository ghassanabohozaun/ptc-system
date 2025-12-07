<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeEducation extends Model
{
    use SoftDeletes;
    protected $table = 'employee_education';

    protected $fillable = ['educational_instituation_name', 'education_level', 'education_year', 'education_aveage', 'certification', 'employee_id'];

    // relation
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
