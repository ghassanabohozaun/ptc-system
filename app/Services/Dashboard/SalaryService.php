<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\SalaryRepository;
use Carbon\Carbon;

class SalaryService
{
    protected $salaryRepository;
    // constructor
    public function __construct(SalaryRepository $salaryRepository)
    {
        $this->salaryRepository = $salaryRepository;
    }

    // get one
    public function getOne($id)
    {
        return $this->salaryRepository->getOne($id);
    }

    // get all
    public function getAll($request)
    {
        return $this->salaryRepository->getAll($request);
    }

    // get active all
    public function getActiveAll()
    {
        return $this->salaryRepository->getActiveAll();
    }

    // create
    public function create($data)
    {
        // sperate date
        $date = Carbon::createFromFormat('Y-m', $data['month']);
        $data['month'] = $date->format('m');
        $data['year'] = $date->format('Y');

        $salary = $this->salaryRepository->salaryExists($data['month'], $data['year']);
        if (empty($salary)) {
            $data['admin_id'] = admin()->user()->id;
            $salary = $this->salaryRepository->create($data);
            if (!$salary) {
                return 'error';
            }
            return 'added';
        } else {
            return 'exists';
        }
    }

    // update
    public function update($data)
    {
        // sperate date
        $date = Carbon::createFromFormat('Y-m', $data['month']);
        $data['month'] = $date->format('m');
        $data['year'] = $date->format('Y');

        $salary = self::getOne($data['id']);

        if (!$salary) {
            return false;
        }

        $salary = $this->salaryRepository->update($salary, $data);
        if (!$salary) {
            return false;
        }
        return $salary;
    }

    // destroy
    public function destroy($id)
    {
        $salary = self::getOne($id);

        if (!$salary) {
            return false;
        }

        $salary = $this->salaryRepository->destroy($salary);
        if (!$salary) {
            return false;
        }
        return $salary;
    }

    // change status
    public function changeStatus($id, $status)
    {
        $salary = self::getOne($id);
        if (!$salary) {
            return false;
        }
        $salary = $this->salaryRepository->changeStatus($salary, $status);
        if (!$salary) {
            return false;
        }
        return $salary;
    }
}
