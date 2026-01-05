<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\DailyReportRepository;
use App\Utils\ImageManagerUtils;
use Mpdf\Tag\Th;
use Yajra\DataTables\Facades\DataTables;

class DailyReportService
{
    protected $dailyReportRepository, $imageManagerUtils;
    // __construct
    public function __construct(DailyReportRepository $dailyReportRepository, ImageManagerUtils $imageManagerUtils)
    {
        $this->dailyReportRepository = $dailyReportRepository;
        $this->imageManagerUtils = $imageManagerUtils;
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
    public function getAll($request)
    {
        return $this->dailyReportRepository->getAll($request);
    }

    // get daily reports for all employee
    public function getDailyReportsForAllEmplpoyees()
    {
        return $this->dailyReportRepository->getDailyReportsForAllEmplpoyees();
    }

    // get daily reports for one employee
    public function getDailyReportsForOneEmplpoyee($employee_id)
    {
        return $this->dailyReportRepository->getDailyReportsForOneEmplpoyee($employee_id);
    }

    // create
    public function create($data)
    {
        $dailyReport = $this->dailyReportRepository->dailyReportExists($data['employee_id'], $data['date']);
        if (empty($dailyReport)) {
            if (array_key_exists('file', $data) && $data['file'] != null) {
                $file_name = $this->imageManagerUtils->uploadSingleImage('', $data['file'], 'dailyReports');
                $data['file'] = $file_name;
            }

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

        if (array_key_exists('file', $data) && $data['file'] != null) {
            //remove old file
            if ($dailyReport->file) {
                $this->imageManagerUtils->removeImageFromLocal($dailyReport->file, 'dailyReports');
            }

            $file_name = $this->imageManagerUtils->uploadSingleImage('', $data['file'], 'dailyReports');
            $data['file'] = $file_name;
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

        //remove old file
        if ($dailyReport->file != null) {
            $this->imageManagerUtils->removeImageFromLocal($dailyReport->file, 'dailyReports');
        }

        $dailyReport = $this->dailyReportRepository->destroy($dailyReport);
        if (!$dailyReport) {
            return false;
        }
        return $dailyReport;
    }

    public function changeStatus($id)
    {
        $dailyReport = self::getOne($id);
        if (!$dailyReport) {
            return false;
        }
        $dailyReport = $this->dailyReportRepository->changeStatus($dailyReport);
        if (!$dailyReport) {
            return false;
        }
        return $dailyReport;
    }
}
