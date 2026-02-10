<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employees\monthlyReportRequest;
use App\Services\Dashboard\MonthlyReportService;
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
        $title = __('MonthlyReports.monthly_reports');
        $monthlyReports = $this->monthlyReportService->getMonthlyReportsForOneEmplpoyee(employee()->user()->id);

        if ($request->ajax()) {
            return view('employees.monthly-reports.partials._table', compact('monthlyReports'))->render();
        }

        return view('employees.monthly-reports.index', compact('title', 'monthlyReports'));
    }

    // create
    public function create()
    {
        //
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

    // edit
    public function edit(string $id)
    {
        //
    }

    // update
    public function update(monthlyReportRequest $request, string $id)
    {
        $data = $request->except(['_token']);
        $monthlyReport = $this->monthlyReportService->update($data);
        return response()->json(['status' => $monthlyReport], 200);
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
