<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\MonthlyReportRepository;
use App\Utils\ImageManagerUtils;
use Mpdf\Tag\Th;

class MonthlyReportService
{
    protected $monthlyReportRepository, $imageManagerUtils;
    // __construct
    public function __construct(MonthlyReportRepository $monthlyReportRepository, ImageManagerUtils $imageManagerUtils)
    {
        $this->monthlyReportRepository = $monthlyReportRepository;
        $this->imageManagerUtils = $imageManagerUtils;
    }

    // get one
    public function getOne($id)
    {
        $monthlyReport = $this->monthlyReportRepository->getOne($id);
        if (!$monthlyReport) {
            return false;
        }
        return $monthlyReport;
    }

    // get all
    public function getAll($request)
    {
        return $this->monthlyReportRepository->getAll($request);
    }

    // get daily reports for all employee
    public function getMonthlyReportsForAllEmplpoyees()
    {
        return $this->monthlyReportRepository->getMonthlyReportsForAllEmplpoyees();
    }

    // get daily reports for one employee
    public function getMonthlyReportsForOneEmplpoyee($employee_id)
    {
        return $this->monthlyReportRepository->getMonthlyReportsForOneEmplpoyee($employee_id);
    }

    // create
    public function create($data)
    {

        $monthlyReport = $this->monthlyReportRepository->monthlyReportExists($data['employee_id'], $data['month'] , $data['year']);

        if (empty($monthlyReport)) {
            if (array_key_exists('file', $data) && $data['file'] != null) {
                $file_name = $this->imageManagerUtils->uploadSingleImage('', $data['file'], 'monthlyReports');
                $data['file'] = $file_name;
            }

            $monthlyReport = $this->monthlyReportRepository->create($data);
            if (!$monthlyReport) {
                return 'error';
            }
            return 'added';
        } else {
            return 'exists';
        }
    }

    public function update($data)
    {
        $monthlyReport = self::getOne($data['id']);
        if (!$monthlyReport) {
            return false;
        }

        if (array_key_exists('file', $data) && $data['file'] != null) {
            //remove old file
            if ($monthlyReport->file) {
                $this->imageManagerUtils->removeImageFromLocal($monthlyReport->file, 'monthlyReports');
            }

            $file_name = $this->imageManagerUtils->uploadSingleImage('', $data['file'], 'monthlyReports');
            $data['file'] = $file_name;
        }

        $monthlyReport = $this->monthlyReportRepository->update($monthlyReport, $data);
        if (!$monthlyReport) {
            return false;
        }
        return $monthlyReport;
    }

    public function destroy($id)
    {
        $monthlyReport = self::getOne($id);
        if (!$monthlyReport) {
            return false;
        }

        //remove old file
        if ($monthlyReport->file != null) {
            $this->imageManagerUtils->removeImageFromLocal($monthlyReport->file, 'monthlyReports');
        }

        $monthlyReport = $this->monthlyReportRepository->destroy($monthlyReport);
        if (!$monthlyReport) {
            return false;
        }
        return $monthlyReport;
    }

    public function changeStatus($id)
    {
        $monthlyReport = self::getOne($id);
        if (!$monthlyReport) {
            return false;
        }
        $monthlyReport = $this->monthlyReportRepository->changeStatus($monthlyReport);
        if (!$monthlyReport) {
            return false;
        }
        return $monthlyReport;
    }
}
