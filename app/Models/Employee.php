<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class Employee extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasTranslations, HasApiTokens;

    protected $table = 'employees';
    protected $fillable = ['first_name', 'father_name', 'grand_father_name', 'family_name', 'password', 'personal_id', 'gender', 'birthday', 'marital_status', 'mobile_no',
    'alternative_mobile_no', 'email', 'governoate_id', 'city_id', 'address_details', 'bank_name', 'iban', 'banck_account', 'basic_salary', 'currency', 'photo'];

    public array $translatable = ['first_name', 'father_name', 'grand_father_name', 'family_name'];

    // hidden
    protected $hidden = ['password'];

    // Get the attributes that should be cast.
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // functions
    public function EmployeeFullName()
    {
        return $this->first_name . ' ' . $this->father_name . ' ' . $this->grand_father_name . ' ' . $this->family_name;
    }

    // functions
    public function EmployeeShortName()
    {
        return $this->first_name . ' ' . $this->father_name . ' ' . $this->family_name;
    }

    // employee gender function
    public function EmployeeGender()
    {
        if ($this->gender == 'male') {
            return __('employees.male');
        } else {
            return __('employees.female');
        }
    }

    // relations
    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'governoate_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function employeeEducation()
    {
        return $this->hasMany(EmployeeEducation::class, 'employee_id');
    }

    public function employeeJobDetails()
    {
        return $this->hasOne(EmployeeJobDetail::class, 'employee_id');
    }

    public function employeeStatus()
    {
        return $this->belongsTo(EmployeeStatus::class, 'employee_status_id');
    }

    public function depatment()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function dailyReports()
    {
        return $this->hasMany(DailyReport::class, 'employee_id');
    }

    public function monthlyReports()
    {
        return $this->hasMany(MonthlyReport::class, 'employee_id');
    }
    public function salaries()
    {
        return $this->belongsToMany(Salary::class, 'employee_salary')->orderByPivot('id', 'asc')->withPivot('id')->withPivot('amount')->withPivot('notes')->withPivot('status')->withPivot('employee_id')->withPivot('basic_salary');
    }

    // scopes
    public function scopeActive($query)
    {
        // return $query->employeeJobDetails->whereEmployeeStatusId(1);
    }

    public function scopeInactive($query)
    {
        // return $query->employeeJobDetails->whereEmployeeStatusId(0);
    }

    // accessories
    public function getCreatedAtAttribute($value)
    {
        if (request()->wantsJson()) {
            return $value;
        }
        return Carbon::parse($value)->format('d/m/Y h:i A');
    }

    public function getUpdatedAtAttribute($value)
    {
        if (request()->wantsJson()) {
            return $value;
        }
        return Carbon::parse($value)->format('d/m/Y h:i A');
    }
}
