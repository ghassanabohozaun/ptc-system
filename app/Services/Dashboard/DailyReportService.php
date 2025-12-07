<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\DailyReportRepository;
use Mpdf\Tag\Th;
use Yajra\DataTables\Facades\DataTables;

class DailyReportService
{
    protected $dailyReportRepository;
    // __construct
    public function __construct(DailyReportRepository $dailyReportRepository)
    {
        $this->dailyReportRepository = $dailyReportRepository;
    }

    // get one
    public function getOne($id)
    {
        $dailyReport = $this->dailyReportRepository->getOne($id);
        if (!$dailyReport) {
            return false;
        }
        return $dailyReport;
    }

    // get all
    public function getAll()
    {
        $dailyReports = $this->dailyReportRepository->getAll();

        return DataTables::of($dailyReports)
            ->addIndexColumn()
            ->addColumn('employee_id', function ($dailyReport) {
                return $dailyReport->employee->EmployeeFullName();
            })
            ->addColumn('details', function ($dailyReport) {
                return view('dashboard.daily-reports.parts.details', compact('dailyReport'));
            })
            ->addColumn('created_at', function ($dailyReport) {
                return $dailyReport->created_at;
            })

            ->addColumn('status', function ($dailyReport) {
                return view('dashboard.daily-reports.parts.status', compact('dailyReport'));
            })
            ->addColumn('manage-status', function ($dailyReport) {
                return view('dashboard.daily-reports.parts.manage-status', compact('dailyReport'));
            })
            ->addColumn('actions', function ($dailyReport) {
                return view('dashboard.daily-reports.parts.actions', compact('dailyReport'));
            })
            ->make(true);
    }

    // create
    public function create($data)
    {
        $dailyReport = $this->dailyReportRepository->dailyReportExists($data['employee_id'], $data['date']);
        if (empty($dailyReport)) {
            $dailyReport = $this->dailyReportRepository->create($data);
            if (!$dailyReport) {
                return 'error';
            }
            return 'added';
        } else {
            return 'exists';
        }
    }

    public function update($data)
    {
        $dailyReport = self::getOne($data['id']);
        if (!$dailyReport) {
            return false;
        }

        $dailyReport = $this->dailyReportRepository->update($dailyReport, $data);
        if (!$dailyReport) {
            return false;
        }
        return $dailyReport;
    }

    public function destroy($id)
    {
        $dailyReport = self::getOne($id);
        if (!$dailyReport) {
            return false;
        }
        $dailyReport = $this->dailyReportRepository->destroy($dailyReport);
        if (!$dailyReport) {
            return false;
        }
        return $dailyReport;
    }

    public function changeStatus($id, $status)
    {
        $dailyReport = self::getOne($id);
        if (!$dailyReport) {
            return false;
        }
        $dailyReport = $this->dailyReportRepository->changeStatus($dailyReport, $status);
        if (!$dailyReport) {
            return false;
        }
        return $dailyReport;
    }
}
