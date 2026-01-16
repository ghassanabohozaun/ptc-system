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

        if ($request->ajax()) {
            if ($request->month) {
                $date = Carbon::createFromFormat('Y-m', $request['month']);
                $request->merge([
                    'month' => $date->format('m'),
                    'year' => $date->format('Y'),
                ]);
            }
        }
        
        $monthlyReports = $this->monthlyReportService->getAll($request);
        if ($request->ajax()) {
            return view('dashboard.employees.monthly-reports.partials._table', compact('monthlyReports'))->render();
        }
        return view('dashboard.employees.monthly-reports.index', compact('title', 'monthlyReports'));
    }

    // create
    public function create() {}

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
        return response()->json(['status' => true, 'data' => $monthlyReport], 200);
    }

    // destroy
    public function destroy(string $id)
    {
        $monthlyReport = $this->monthlyReportService->destroy($id);
        if (!$monthlyReport) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $monthlyReport], 200);
    }
}
