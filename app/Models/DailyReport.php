<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    protected $table = 'daily_reports';
    protected $fillable = ['date', 'time', 'details', 'employee_id','status'];

    public $timestamps = true;

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
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }


}
