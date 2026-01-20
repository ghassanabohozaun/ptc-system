<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\CityService;
use App\Services\Dashboard\DailyReportService;
use App\Services\Dashboard\EmployeeService;
use App\Services\Dashboard\GovernorateService;
use App\Services\Dashboard\MonthlyReportService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $employeeService, $monthlyReportService, $dailyReportService, $governorateService, $cityService;
    public function __construct(EmployeeService $employeeService, MonthlyReportService $monthlyReportService, DailyReportService $dailyReportService, GovernorateService $governorateService, CityService $cityService)
    {
        $this->employeeService = $employeeService;
        $this->monthlyReportService = $monthlyReportService;
        $this->dailyReportService = $dailyReportService;
        $this->governorateService = $governorateService;
        $this->cityService = $cityService;
    }

    public function index()
    {
        $employees = $this->employeeService->getActive();

        $title = __('dashboard.dashboard');
        $monthlyReports = $this->monthlyReportService->getMonthlyReportsForAllEmplpoyees()->take(5);
        $dailyReports = $this->dailyReportService->getDailyReportsForAllEmplpoyees()->take(5);
        return view('dashboard.home.index', compact('title', 'employees', 'monthlyReports', 'dailyReports'));
    }

    // addresses
    public function addresses()
    {
        $governorates = $this->governorateService->getAllGovernoratesWithoutRelations();
        $cities = $this->cityService->getAllCitiesWithoutRelation();
        return view('dashboard.address', compact('governorates', 'cities'));
    }

    // get monthly report employees
    public function getmonthlyReportEmployees(Request $request)
    {
        if ($request->ajax()) {
            if ($request->month) {
                $date = Carbon::createFromFormat('Y-m', $request['month']);
                $month = $date->format('m');
                $year = $date->format('Y');
            } else {
                $currentMonthYear = now()->format('F Y');
                $month = now()->format('m');
                $year = now()->format('Y');
            }

            // get active employees
            $employees = $this->employeeService->getEmployeesWhoSendReports();

            // map employees collection
            $employees = $employees->map(function ($item) use ($month, $year) {
                $monthlyReport = $item->monthlyReports()->where('month', $month)->where('year', $year);
                $item['full_name'] = $item->EmployeeFullName();
                $item['month'] = $month . ' / ' . $year;
                $item['report_status'] = $monthlyReport->exists() ? '<i class="la la-check text-success font-boder"><i>' : '<i class="la la-close text-danger font-boder"></i>';

                if ($monthlyReport->first()) {
                    $output =
                        '<a class="btn btn-outline-info"
                         target="_blank" href="' .
                        asset('uploads/monthlyReports/' . $monthlyReport->first()->file) .
                        '"><i class="ft-download font-boder"></i></a>';
                } else {
                    $output = '<a href="#" class="btn btn-outline-danger"><i class="ft-x"></i></a>';
                }

                $item['file'] = $output;

                return $item;
            });

            $activeEmployees = $employees->select('id', 'full_name', 'month', 'report_status', 'file');

            return response()->json(['status' => true, 'data' => $activeEmployees]);
        }
    }
}
