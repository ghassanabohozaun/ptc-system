<?php

namespace App\Repositories\Dashboard;

use App\Models\Employee;
use App\Models\EmployeeEducation;
use App\Models\EmployeeJobDetail;
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
        return Employee::when(!empty(request()->personal_id), function ($query) {
            $query->where('personal_id', request()->personal_id);
        })
            ->when(!empty(request()->first_name_en), function ($query) {
                $query->where('first_name->en', 'like', '%' . request()->first_name_en . '%');
            })

            ->when(!empty(request()->father_name_en), function ($query) {
                $query->where('father_name->en', 'like', '%' . request()->father_name_en . '%');
            })

            ->when(!empty(request()->grand_father_name_en), function ($query) {
                $query->where('grand_father_name->en', 'like', '%' . request()->grand_father_name_en . '%');
            })

            ->when(!empty(request()->family_name_en), function ($query) {
                $query->where('family_name->en', 'like', '%' . request()->family_name_en . '%');
            })

            ->when(!empty(request()->first_name_ar), function ($query) {
                $query->where('first_name->ar', 'like', '%' . request()->first_name_ar . '%');
            })

            ->when(!empty(request()->father_name_ar), function ($query) {
                $query->where('father_name->ar', 'like', '%' . request()->father_name_ar . '%');
            })

            ->when(!empty(request()->grand_father_name_ar), function ($query) {
                $query->where('grand_father_name->ar', 'like', '%' . request()->grand_father_name_ar . '%');
            })

            ->when(!empty(request()->family_name_ar), function ($query) {
                $query->where('family_name->ar', 'like', '%' . request()->family_name_ar . '%');
            })

            ->latest()
            ->get();
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
        return Employee::select('first_name->en as employee_en', 'first_name->ar as employee_ar', 'id')
            ->where('first_name->en', 'LIKE', '%' . $searchValue . '%')
            ->orWhere('first_name->ar', 'LIKE', '%' . $searchValue . '%')
            ->get();
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
        return $employee->employeeEducation()->forceDelete();
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
}
