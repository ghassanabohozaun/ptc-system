<?php

namespace App\Repositories\Dashboard;

use App\Models\Salary;

class SalaryRepository
{
    // get one
    public function getOne($id)
    {
        return Salary::find($id);
    }

    // get all
    public function getAll($request)
    {
        return Salary::with('admin')
            ->when(!empty(request()->month), function ($query) {
                $query->where('month', request()->month);
            })
            ->when(!empty(request()->year), function ($query) {
                $query->where('year', request()->year);
            })
            ->latest()
            ->paginate(12);
    }

    // get active all
    public function getActiveAll()
    {
        return Salary::latest()->active()->get();
    }

    // salary exists
    public function salaryExists($month, $year)
    {
        return Salary::where('month', $month)->where('year', $year)->first();
    }

    // create
    public function create($data)
    {
        return Salary::create($data);
    }

    // update
    public function update($salary, $data)
    {
        return $salary->update($data);
    }

    // destroy
    public function destroy($salary)
    {
        return $salary->forceDelete();
    }

    // change status
    public function changeStatus($salary, $status)
    {
        return $salary->update([
            'status' => $status,
        ]);
    }
}
