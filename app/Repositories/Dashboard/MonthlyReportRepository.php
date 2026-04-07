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
            ->filter(request()->all(), [
                'details',
                'employee.first_name',
                'employee.father_name',
                'employee.grand_father_name',
                'employee.family_name',
                'employee.email',
                'employee.personal_id'
            ], ['month', 'year', 'employee_id', 'status'])
            ->latest()
            ->paginate(config('app.pagination') ?: 10)
            ->withQueryString();
    }

    // monthly reports exists
    public function monthlyReportExists($employee_id, $month, $year)
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

    // update
    public function update($monthlyReport, $data)
    {
        return $monthlyReport->update($data);
    }
    // destroy
    public function destroy($MonthlyReport)
    {
        return $MonthlyReport->forceDelete();
    }

    // change status
    public function changeStatus($MonthlyReport, $data)
    {
        return $MonthlyReport->update([
            'status' => $data['status'],
            'refuse_reason' => $data['refuse_reason'] ?? '',
        ]);
    }
}
