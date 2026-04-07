<?php

namespace App\Repositories\Dashboard;

use App\Models\EmployeeContract;

class EmployeeContractRepository
{
    // get all
    public function getAll($request)
    {
        return EmployeeContract::with('employee.employeeJobDetails')
            ->filter($request->all(), [
                'employee.first_name',
                'employee.father_name',
                'employee.grand_father_name',
                'employee.family_name',
                'employee.email',
                'employee.personal_id'
            ], [
                'employee_id',
                'monthly_salary',
                'contract_start_date',
                'contract_expiry_date'
            ])
            ->latest()
            ->paginate(config('app.pagination'))
            ->withQueryString();
    }

    // get one
    public function getOne($id)
    {
        return EmployeeContract::find($id);
    }

    // check if contract dates overlap for a specific employee
    public function checkOverlap($employee_id, $start_date, $expiry_date, $ignore_id = null)
    {
        $query = EmployeeContract::where('employee_id', $employee_id)
            ->where(function ($q) use ($start_date, $expiry_date) {
                // A overlaps B if A.start <= B.end AND A.end >= B.start
                $q->where('contract_start_date', '<=', $expiry_date)
                  ->where('contract_expiry_date', '>=', $start_date);
            });

        if ($ignore_id) {
            $query->where('id', '!=', $ignore_id);
        }

        return $query->exists();
    }

    // create
    public function create($data)
    {
        return EmployeeContract::create($data);
    }

    // update
    public function update($employeeContract, $data)
    {
        $employeeContract->update($data);
        return $employeeContract;
    }

    // destroy
    public function destroy($employeeContract)
    {
        return $employeeContract->delete();
    }
}
