<?php

namespace App\Repositories\Dashboard;

use App\Models\EmployeeStatus;

class EmployeeStatusRepository
{
    // get one
    public function getOne($id)
    {
        return EmployeeStatus::find($id);
    }

    // get all
    public function getAll()
    {
        return EmployeeStatus::orderByDesc('id')->select('id', 'name', 'status')->paginate(10);
    }

    // get active all
    public function getActiveAll()
    {
        return EmployeeStatus::orderByDesc('id')->select('id', 'name', 'status')->active()->get();
    }

    // create
    public function create($data)
    {
        return EmployeeStatus::create($data);
    }

    // update
    public function update($employeeStatus, $data)
    {
        return $employeeStatus->update($data);
    }

    // destroy
    public function destroy($employeeStatus)
    {
        return $employeeStatus->forceDelete();
    }

    // change status
    public function changeStatus($employeeStatus, $status)
    {
        return $employeeStatus->update([
            'status' => $status,
        ]);
    }
}
