<?php

namespace App\Repositories\Dashboard;

use App\Models\Employee;
use App\Models\EmployeeEducation;
use App\Models\EmployeeJobDetail;
use App\Models\EmployeeContractDetails;
use Symfony\Component\CssSelector\Node\FunctionNode;

class EmployeeRepository
{
    // get one
    public function getOne($id)
    {
        return Employee::find($id);
    }

    // get all
    public function getAll($request)
    {
        return Employee::with([
            'employeeJobDetails.department',
            'employeeJobDetails.employeeStatus',
            'governorate',
            'city'
        ])
            ->when(!empty(request()->keyword), function ($query) {
                $term = "%" . request()->keyword . "%";
                $query->where(function($q) use ($term) {
                    $q->whereRaw("JSON_VALUE(first_name, '$.en') LIKE ?", [$term])
                      ->orWhereRaw("JSON_VALUE(first_name, '$.ar') LIKE ?", [$term])
                      ->orWhereRaw("JSON_VALUE(family_name, '$.en') LIKE ?", [$term])
                      ->orWhereRaw("JSON_VALUE(family_name, '$.ar') LIKE ?", [$term])
                      ->orWhere('personal_id', 'LIKE', $term);
                });
            })
            ->when(!empty(request()->department_id), function ($query) {
                $query->whereHas('employeeJobDetails', function($q) {
                    $q->where('department_id', request()->department_id);
                });
            })
            ->when(!empty(request()->employee_status_id), function ($query) {
                $query->whereHas('employeeJobDetails', function($q) {
                    $q->where('employee_status_id', request()->employee_status_id);
                });
            })
            ->when(!empty(request()->personal_id), function ($query) {
                $query->where('personal_id', request()->personal_id);
            })
            ->when(!empty(request()->employee_id), function ($query) {
                $query->where('id', request()->employee_id);
            })
            ->latest()
            ->paginate(config('app.pagination'));
    }

    // get employees
    public function getEmployees()
    {
        return Employee::latest()->get();
    }

    // get active employees
    public function getActive()
    {
        return Employee::latest()->active()->get();
    }

    // get active employees
    public function getEmployeesWhoSendReports()
    {
        return Employee::whereHas('employeeJobDetails', function ($query) {
            $query->where('submit_monthly_report', 1);
        })
            ->active()
            ->get();
    }

    //  sotre employee
    public function storeEmployee($data)
    {
        return Employee::create($data);
    }

    // update
    public function updateEmployee($employee, $data)
    {
        return $employee->update($data);
    }

    // destroy
    public function destroy($employee)
    {
        return $employee->forceDelete();
    }

    // change status
    public function changeStatus($employee, $status)
    {
        return $employee->update([
            'status' => $status,
        ]);
    }

    // autocomplete employee
    public function autocompleteEmployee($searchValue)
    {
        // return Employee::select('first_name->en as employee_en', 'first_name->ar as employee_ar', 'id')
        //     ->where('first_name->en', 'LIKE', '%' . $searchValue . '%')
        //     ->orWhere('first_name->ar', 'LIKE', '%' . $searchValue . '%')
        //     ->get();

        return Employee::selectRaw(
            "
        CONCAT(JSON_VALUE(first_name, '$.en'), ' ', JSON_VALUE(family_name, '$.en')) AS employee_en,
        CONCAT(JSON_VALUE(first_name, '$.ar'), ' ', JSON_VALUE(family_name, '$.ar')) AS employee_ar,
        id
    ",
        )
            ->where(function ($query) use ($searchValue) {
                $term = "%{$searchValue}%";
                // Use whereRaw to ensure MariaDB's JSON_VALUE or ->> is used correctly
                $query
                    ->whereRaw("JSON_VALUE(first_name, '$.en') LIKE ?", [$term])
                    ->orWhereRaw("JSON_VALUE(first_name, '$.ar') LIKE ?", [$term])
                    ->orWhereRaw("JSON_VALUE(family_name, '$.en') LIKE ?", [$term])
                    ->orWhereRaw("JSON_VALUE(family_name, '$.ar') LIKE ?", [$term]);
            })
            ->limit(20)
            ->get();
    }

    // change employee password
    public function changeEmployeePassword($employee, $password)
    {
        return $employee->update([
            'password' => $password,
        ]);
    }

    //////////////////////////////////////////////////////////////////////////////////////////
    // Education

    // get one education
    public function getOneEducation($id)
    {
        return EmployeeEducation::find($id);
    }

    // store education
    public function storeEducation($data)
    {
        return EmployeeEducation::create($data);
    }

    // update education
    public function updateEducation($education, $data)
    {
        return $education->update($data);
    }

    // delete one education
    public function deleteOneEducation($education)
    {
        return $education->forceDelete();
    }

    // get one employee Education
    public function getOneEmployeeEducation($employee_id)
    {
        return EmployeeEducation::where('employee_id', $employee_id)->first();
    }

    // get all employee Educations
    public function getAllEmployeeEducations($employee)
    {
        return $employee->employeeEducation()->get();
    }

    // delete all employee educations
    public function deleteAllEmloyeeEducations($employee)
    {
        $employeeEducations = EmployeeEducation::where('employee_id', $employee->id)->get();

        if ($employeeEducations->isNotEmpty()) {
            return $employee->employeeEducation()->forceDelete();
        } else {
            return false;
        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////
    // job details

    // store job details
    public function storeJobDetails($data)
    {
        return EmployeeJobDetail::create($data);
    }

    // get one employee job detials
    public function getOneEmployeeJobDetails($employee_id)
    {
        return EmployeeJobDetail::where('employee_id', $employee_id)->first();
    }

    public function destoryJobDetails($jobDetail)
    {
        return $jobDetail->forceDelete();
    }

    //////////////////////////////////////////////////////////////////////////////////////////
    // contract details

    // get one employee contract detials
    public function getOneEmployeeContractDetails($employee_id)
    {
        return EmployeeContractDetails::where('employee_id', $employee_id)->first();
    }

    // store contract details
    public function storeContractDetails($data)
    {
        return EmployeeContractDetails::create($data);
    }

    public function destoryContractDetails($contractDetail)
    {
        return $contractDetail->forceDelete();
    }
}
