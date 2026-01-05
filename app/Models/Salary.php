<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Salary extends Model
{
    use SoftDeletes, HasTranslations;
    protected $table = 'salaries';
    protected $fillable = ['month', 'year', 'details', 'notes', 'status','admin_id','release_date'];

    public $timestamps = true;


    // relation
    public function admin()
    {
        return  $this->belongsTo(Admin::class , 'admin_id');
    }


    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_salary')
        ->orderByPivot('id', 'asc')->withPivot('id')
        ->withPivot('amount')->withPivot('notes')
        ->withPivot('status')->withPivot('employee_id')
        ->withPivot('basic_salary');
    }

    // scopes
    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }

    public function scopeInactive($query)
    {
        return $query->whereStatus(0);
    }
}
