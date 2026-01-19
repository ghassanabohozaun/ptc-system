<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class EmployeeEducation extends Model
{
    use SoftDeletes, HasTranslations;
    protected $table = 'employee_education';

    protected $fillable = ['educational_instituation_name', 'education_specialization',  'education_level', 'education_year','certification', 'employee_id'];

    public array $translatable = ['educational_instituation_name', 'education_specialization'];

    // relation
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
