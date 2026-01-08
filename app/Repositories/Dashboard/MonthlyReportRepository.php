<?php

namespace App\Repositories\Dashboard;

use App\Models\MonthlyReport;

class MonthlyReportRepository
{
    // get one
    public function getOne($id)
    {
        return MonthlyReport::find($id);
    }

    // get all
    public function getAll($request)
    {
        return MonthlyReport::with('employee')
            ->when(!empty(request()->employee_id), function ($query) {
                $query->where('employee_id', request()->employee_id);
            })
            ->latest()
            ->paginate(10);
    }

    // monthly reports exists
    public function monthlyReportExists($employee_id, $month,$year)
    {
        return MonthlyReport::where('employee_id', $employee_id)->where('month', $month)->where('year', $year)->first();
    }

    // get monthly reports for all employees
    public function getMonthlyReportsForAllEmplpoyees()
    {
        return MonthlyReport::latest()->get();
    }

    // get monthly reports for one employee
    public function getMonthlyReportsForOneEmplpoyee($employee_id)
    {
        return MonthlyReport::where('employee_id', $employee_id)->latest()->paginate(5);
    }

    // create
    public function create($data)
    {
        return MonthlyReport::create($data);
    }

    public function update($MonthlyReport, $data)
    {
        return $MonthlyReport->update([
            'status' =>  $data['status'],
        ]);
    }

    public function destroy($MonthlyReport)
    {
        return $MonthlyReport->forceDelete();
    }


}
