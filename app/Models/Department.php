<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Department extends Model
{
    use SoftDeletes, HasTranslations;
    protected $table = 'departments';
    protected $fillable = ['name', 'status'];

    public $timestamps = true;

    public array $translatable = ['name'];

    // scopes
    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }

    public function scopeInactive($query)
    {
        return $query->whereStatus(0);
    }

    // relation
    public function employees()
    {
        return $this->hasMany(Employee::class, 'department_id');
    }

    public function employeeJobDetails()
    {
        return $this->hasOne(EmployeeJobDetail::class, 'department_id');
    }
}
