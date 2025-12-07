<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\EmployeeStatusRepository;

class EmployeeStatusService
{
    protected $employeeStatusRepository;
    // constructor
    public function __construct(EmployeeStatusRepository $employeeStatusRepository)
    {
        $this->employeeStatusRepository = $employeeStatusRepository;
    }

    // get one
    public function getOne($id)
    {
        return $this->employeeStatusRepository->getOne($id);
    }

    // get all
    public function getAll()
    {
        return $this->employeeStatusRepository->getAll();
    }

    // get active all
    public function getActiveAll()
    {
        return $this->employeeStatusRepository->getActiveAll();
    }

    // create
    public function create($data)
    {
        $employeeStatus = $this->employeeStatusRepository->create($data);
        if (!$employeeStatus) {
            return false;
        }
        return $employeeStatus;
    }

    // update
    public function update($data)
    {
        $employeeStatus = self::getOne($data['id']);

        if (!$employeeStatus) {
            return false;
        }
        $employeeStatus = $this->employeeStatusRepository->update($employeeStatus, $data);
        if (!$employeeStatus) {
            return false;
        }
        return $employeeStatus;
    }

    // destroy
    public function destroy($id)
    {
        $employeeStatus = self::getOne($id);
        if (!$employeeStatus) {
            return false;
        }

        $employeeStatus = $this->employeeStatusRepository->destroy($employeeStatus);
        if (!$employeeStatus) {
            return false;
        }
        return $employeeStatus;
    }

    // change status
    public function changeStatus($id, $status)
    {
        $employeeStatus = self::getOne($id);
        if (!$employeeStatus) {
            return false;
        }
        $employeeStatus = $this->employeeStatusRepository->changeStatus($employeeStatus, $status);
        if (!$employeeStatus) {
            return false;
        }
        return $employeeStatus;
    }
}
