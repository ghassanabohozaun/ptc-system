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
    public function getAll($keyword = null)
    {
        return Department::query()
            ->when($keyword, function ($query) use ($keyword) {
                return $query->where('name', 'like', '%' . $keyword . '%');
            })
            ->orderByDesc('id')
            ->select('id', 'name', 'status')
            ->paginate(config('app.pagination'));
    }

    // get active all
    public function getActiveAll()
    {
        return Department::select('id', 'name', 'status')->active()->get();
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
