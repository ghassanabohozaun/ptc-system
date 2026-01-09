<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class MonthlyReport extends Model
{
    use SoftDeletes, HasTranslations;

    protected $table = 'monthly_reports';
    protected $fillable = ['month', 'year', 'details', 'employee_id', 'status', 'file','refuse_reason'];

    // functions

    // status
    public function monthlyReportStatus()
    {
        if ($this->status == 'new') {
            return __('monthlyReports.new');
        } elseif ($this->status == 'initial_review') {
            return __('monthlyReports.initial_review');
        } elseif ($this->status == 'initial_refuse') {
            return __('monthlyReports.initial_refuse');
        } elseif ($this->status == 'intital_approved') {
            return __('monthlyReports.intital_approved');
        } elseif ($this->status == 'final_review') {
            return __('monthlyReports.final_review');
        } elseif ($this->status == 'final_refuse') {
            return __('monthlyReports.final_refuse');
        } elseif ($this->status == 'approved') {
            return __('monthlyReports.approved');
        }
    }


    // relation
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function getCreatedAtAttribute($value)
    {
        // return  date('Y-m-d', strtotime($value));
        return Carbon::parse($value)->format('d/m/Y h:i A');
    }
}
