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
    public function getAll()
    {
        return DailyReport::with('employee')->orderByDesc('date')->get();
    }

    public function dailyReportExists($employee_id, $date) {
        return DailyReport::where('employee_id' , $employee_id)->where('date', $date)->first();
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

    public function changeStatus($dailyReport, $status)
    {
        return $dailyReport->update([
            'status' => $status,
        ]);
    }
}
