<?php

namespace App\Repositories\Dashboard;

use App\Models\DailyReport;

class DailyReportRepository
{
    // get one
    public function getOne($id)
    {
        return DailyReport::find($id);
    }

    // get all
    public function getAll($request)
    {
        return DailyReport::with('employee')
            ->filter(request()->all(), [
                'details',
                'employee.first_name',
                'employee.father_name',
                'employee.grand_father_name',
                'employee.family_name',
                'employee.email',
                'employee.personal_id'
            ], [])
            ->when(!empty(request()->date), function ($q) {
                $q->whereDate('date', request()->date);
            })
            ->when(!empty(request()->from_date) && !empty(request()->to_date), function ($q) {
                $q->whereBetween('date', [request()->from_date, request()->to_date]);
            })
            ->latest()
            ->paginate(config('app.pagination') ?: 10)
            ->withQueryString();
    }

    // daily reports exists
    public function dailyReportExists($employee_id, $date)
    {
        return DailyReport::where('employee_id', $employee_id)->where('date', $date)->first();
    }

    // get daily reports for all employees
    public function getDailyReportsForAllEmplpoyees()
    {
        return DailyReport::latest()->get();
    }

    // get daily reports for one employee
    public function getDailyReportsForOneEmplpoyee($employee_id)
    {
        return DailyReport::where('employee_id', $employee_id)->latest()->paginate(5);
    }

    // create
    public function create($data)
    {
        return DailyReport::create($data);
    }

    public function update($dailyReport, $data)
    {
        return $dailyReport->update($data);
    }

    public function destroy($dailyReport)
    {
        return $dailyReport->forceDelete();
    }

    public function changeStatus($dailyReport)
    {
        return $dailyReport->update([
            'status' => $dailyReport->status == 'on' ? 0 : 1,
        ]);
    }
}
