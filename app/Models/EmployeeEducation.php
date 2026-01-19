<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class EmployeeEducation extends Model
{
    use SoftDeletes, HasTranslations;
    protected $table = 'employee_education';

    protected $fillable = ['educational_instituation_name', 'education_specialization', 'education_level', 'education_year', 'certification', 'employee_id'];

    public array $translatable = ['educational_instituation_name', 'education_specialization'];

    // employee education specialization function
    public function EmployeEducationSpecialization()
    {
        if ($this->education_specialization == 'phd') {
            return __('employees.phd');
        } else if ($this->education_specialization == 'masters') {
            return __('employees.masters');
        }else if ($this->education_specialization == 'university') {
            return __('employees.university');
        }else if ($this->education_specialization == 'deplom') {
            return __('employees.deplom');
        }else if ($this->education_specialization == 'preparatory') {
            return __('employees.preparatory');
        }else if ($this->education_specialization == 'secondary') {
            return __('employees.secondary');
        }else if ($this->education_specialization == 'etc') {
            return __('employees.etc');
        }
    }

    // relation
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
