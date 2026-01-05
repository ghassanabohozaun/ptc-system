<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employees\dailyReportRequest;
use App\Services\Dashboard\DailyReportService;
use Illuminate\Http\Request;

class DailyReportsController extends Controller
{
    protected $dailyReportService;
    public function __construct(DailyReportService $dailyReportService)
    {
        $this->dailyReportService = $dailyReportService;
    }
    // index
    public function index(Request $request)
    {
        $title = __('dailyReports.daily_reports');
        $dailyReports = $this->dailyReportService->getDailyReportsForOneEmplpoyee(employee()->user()->id);

         if ($request->ajax()) {
            return view('employees.daily-reports.partials._table', compact('dailyReports'))->render();
        }

        return view('employees.daily-reports.index', compact('title', 'dailyReports'));
    }

    // create
    public function create()
    {
        //
    }

    // store
    public function store(dailyReportRequest $request)
    {
        $data = $request->only(['employee_id', 'date', 'details' , 'file']);
        $dailyReport = $this->dailyReportService->create($data);
        if (!$dailyReport) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $dailyReport], 200);
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
    public function update(dailyReportRequest $request, string $id)
    {

        $data = $request->only(['id', 'employee_id', 'date',  'details', 'file']);
        $dailyReport = $this->dailyReportService->update($data);
        if (!$dailyReport) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $dailyReport], 200);
    }

    // destroy
    public function destroy(string $id)
    {
        $dailyReport = $this->dailyReportService->destroy($id);
        if (!$dailyReport) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $dailyReport], 200);
    }

    // change status
    public function changeStatus($id)
    {
        $dailyReport = $this->dailyReportService->changeStatus($id);
        if (!$dailyReport) {
            return response()->json(['status' => false], 500);
        }
        $dailyReport = $this->dailyReportService->getOne($id);
        return response()->json(['status' => true, 'data' => $dailyReport]);
    }

    // change status
    // public function changeStatus(Request $request)
    // {

    //     if ($request->ajax()) {
    //         $status = $this->dailyReportService->changeStatus($request->id, $request->statusSwitch);
    //         if (!$status) {
    //             return response()->json(['status' => false], 500);
    //         }
    //         $status = $this->dailyReportService->getOne($request->id);
    //         return response()->json(['status' => true, 'data' => $status], 200);
    //     }
    // }
}
