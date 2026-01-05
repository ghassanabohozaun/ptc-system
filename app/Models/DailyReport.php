<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    protected $table = 'daily_reports';
    protected $fillable = ['date', 'details', 'employee_id','status','file'];

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


     // accsessores
    public function getStatusAttribute($status)
    {
        return $status == 1 ? 'on' : '';
    }

        public function getCreatedAtAttribute($value)
    {
        // return  date('Y-m-d', strtotime($value));
        return Carbon::parse($value)->format('d/m/Y h:i A');
    }

}
