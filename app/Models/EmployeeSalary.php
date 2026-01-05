<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    protected $table = 'employee_salary';
    protected $fillable = ['employee_id', 'salary_id','basic_salary', 'amount', 'notes', 'status'];

    protected $hidden = ['created_at', 'updated_at'];

    public function employee(){
        return $this->belongsTo(Employee::class , 'employee_id');
    }
}
