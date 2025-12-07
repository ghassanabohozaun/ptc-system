<?php

namespace App\Repositories\Dashboard;

use App\Models\Department;

class DepartmentRepository
{
    // get one
    public function getOne($id)
    {
        return Department::find($id);
    }

    // get all
    public function getAll()
    {
        return Department::orderByDesc('id')->select('id', 'name', 'status')->paginate(10);
    }

    // get active all
    public function getActiveAll()
    {
        return Department::orderByDesc('id')->select('id', 'name', 'status')->active()->get();
    }

    // create
    public function create($data)
    {
        return Department::create($data);
    }

    // update
    public function update($department, $data)
    {
        return $department->update($data);
    }

    // destroy
    public function destroy($department)
    {
        return $department->forceDelete();
    }

    // change status
    public function changeStatus($department, $status)
    {
        return $department->update([
            'status' => $status,
        ]);
    }
}
