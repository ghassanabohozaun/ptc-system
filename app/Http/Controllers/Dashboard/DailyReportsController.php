<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\dailyReportRequest;
use App\Services\Dashboard\DailyReportService;
use App\Services\Dashboard\EmployeeService;
use Illuminate\Http\Request;

class DailyReportsController extends Controller
{
    protected $dailyReportService, $employeeService;
    // __construct
    public function __construct(DailyReportService $dailyReportService, EmployeeService $employeeService)
    {
        $this->dailyReportService = $dailyReportService;
        $this->employeeService = $employeeService;
    }

    // index
    public function index()
    {
        $title = __('dailyReports.daily_reports');
        return view('dashboard.daily-reports.index', compact('title'));
    }

    // get all
    public function getAll()
    {
        return $this->dailyReportService->getAll();
    }

    // create
    public function create()
    {
        $title = __('dailyReports.create_new_daily_report');
        return view('dashboard.daily-reports.create', compact('title'));
    }

    // store
    public function store(dailyReportRequest $request)
    {
        $data = $request->only(['employee_id', 'date', 'time', 'details']);
        $dailyReport = $this->dailyReportService->create($data);

        return response()->json(['status' => $dailyReport], 200);
    }

    // show
    public function show(string $id)
    {
        //
    }

    // edit
    public function edit(string $id)
    {
        $title = __('dailyReports.update_daily_report');
        $dailyReport = $this->dailyReportService->getOne($id);
        if (!$dailyReport) {
            flash()->error(__('general.no_record_found'));
            return redirect()->back();
        }
        $employees = $this->employeeService->getEmployees();

        return view('dashboard.daily-reports.edit', compact('title', 'dailyReport', 'employees'));
    }

    // update
    public function update(dailyReportRequest $request, string $id)
    {
        $data = $request->only(['id', 'employee_id', 'date', 'time', 'details']);
        $dailyReport = $this->dailyReportService->update($data);
        if (!$dailyReport) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $dailyReport], 200);
    }

    // destory
    public function destroy(string $id)
    {
        $dailyReport = $this->dailyReportService->destroy($id);
        if (!$dailyReport) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $dailyReport], 200);
    }

    // change status
    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $status = $this->dailyReportService->changeStatus($request->id, $request->statusSwitch);
            if (!$status) {
                return response()->json(['status' => false], 500);
            }
            $status = $this->dailyReportService->getOne($request->id);
            return response()->json(['status' => true, 'data' => $status], 200);
        }
    }
}
