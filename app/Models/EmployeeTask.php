<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTask extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'title', 'is_completed'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
