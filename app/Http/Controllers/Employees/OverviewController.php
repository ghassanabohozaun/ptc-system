<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employees\ChangePasswordRequest;
use App\Services\Dashboard\DailyReportService;
use App\Services\Dashboard\EmployeeService;
use App\Services\Dashboard\MonthlyReportService;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    protected $dailyReportService, $employeeService, $monthlyReportService;

    // __construct
    public function __construct(MonthlyReportService $monthlyReportService, DailyReportService $dailyReportService, EmployeeService $employeeService)
    {
        $this->dailyReportService = $dailyReportService;
        $this->employeeService = $employeeService;
        $this->monthlyReportService = $monthlyReportService;
    }

    // index
    public function index()
    {
        $monthlyReports = $this->monthlyReportService->getMonthlyReportsForOneEmplpoyee(employee()->user()->id)->take(5);
        $dailyReports = $this->dailyReportService->getDailyReportsForOneEmplpoyee(employee()->user()->id)->take(5);
        $employee = $this->employeeService->getOne(employee()->user()->id);
        return view('employees.overview.index', compact('monthlyReports','dailyReports', 'employee'));
    }

    public function changeEmployeePassword(ChangePasswordRequest $request)
    {
        $data = $request->only(['employee_id', 'password', 'password_confirm']);

        $changePassword = $this->employeeService->changeEmployeePassword($data);

        if (!$changePassword) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $changePassword], 200);
    }
}
