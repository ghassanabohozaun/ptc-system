<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\MonthlyReportChangeStatusRequest;
use App\Http\Requests\Dashboard\monthlyReportRequest;
use App\Services\Dashboard\MonthlyReportService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MonthlyReportsController extends Controller
{
    protected $monthlyReportService;

    public function __construct(MonthlyReportService $monthlyReportService)
    {
        $this->monthlyReportService = $monthlyReportService;
    }

    // index
    public function index(Request $request)
    {
        $title = __('monthlyReports.monthly_reports');
        $monthlyReports = $this->monthlyReportService->getAll($request);

        if ($request->ajax()) {
            return view('dashboard.employees.monthly-reports.partials._table', compact('monthlyReports'))->render();
        }
        
        return view('dashboard.employees.monthly-reports.index', compact('title', 'monthlyReports'));
    }

    // create
    public function create()
    {
        return redirect()->route('dashboard.monthlyReports.index');
    }

    // store
    public function store(monthlyReportRequest $request)
    {
        $data = $request->except(['_token']);
        $monthlyReport = $this->monthlyReportService->create($data);
        return response()->json(['status' => $monthlyReport], 201);
    }

    // show
    public function show(string $id)
    {
        //
    }

    // edid
    public function edit(string $id)
    {
        //
    }

    // update
    public function update(MonthlyReportChangeStatusRequest $request, string $id)
    {
        $data = $request->except(['_token', '_method']);

        $monthlyReport = $this->monthlyReportService->changeStatus($data);
        if (!$monthlyReport) {
            return response()->json(['status' => false], 500);
        }

        // Mark Employee Notification as Read
        // Assuming $monthlyReport is the model or has access to it.
        // If changeStatus returns boolean/string, we might need to find it by ID.
        // Let's assume $monthlyReport is the object or we can find it by $id.
        $reportInstance = \App\Models\MonthlyReport::find($id); // Ensure we have the model
        // Send New Status Notification
        if ($reportInstance && $reportInstance->employee_id) {
            $employee = \App\Models\Employee::find($reportInstance->employee_id);
            if ($employee) {
                // Reload the report with fresh status
                $reportInstance->refresh(); // Ensure we have the new status from DB
                $employee->notify(new \App\Notifications\MonthlyReportStatusNotification($reportInstance));
            }

            // Notify Managers if initially approved
            if (isset($data['status']) && $data['status'] === 'intital_approved') {
                $managers = \App\Models\Admin::whereHas('role', function ($query) {
                    $query->where('role->en', 'Manger'); // Using the typo-laden name from seeder
                })->get();

                \Illuminate\Support\Facades\Notification::send($managers, new \App\Notifications\NewMonthlyReportNotification($reportInstance));
            }
        }

        return response()->json(['status' => true, 'data' => $monthlyReport], 200);
    }


    // destroy
    public function destroy(Request $request)
    {
        $monthlyReport = $this->monthlyReportService->destroy($request->id);
        if (!$monthlyReport) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $monthlyReport], 200);
    }


}
