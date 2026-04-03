<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\EmployeeContractRepository;

class EmployeeContractService
{
    protected $employeeContractRepository;

    public function __construct(EmployeeContractRepository $employeeContractRepository)
    {
        $this->employeeContractRepository = $employeeContractRepository;
    }

    // get one
    public function getOne($id)
    {
        $employeeContract = $this->employeeContractRepository->getOne($id);
        if (!$employeeContract) {
            return false;
        }
        return $employeeContract;
    }

    // get all
    public function getAll($request)
    {
        return $this->employeeContractRepository->getAll($request);
    }

    // create
    public function create($data)
    {
        if ($this->employeeContractRepository->checkOverlap($data['employee_id'], $data['contract_start_date'], $data['contract_expiry_date'])) {
            return 'overlap';
        }

        $employeeContract = $this->employeeContractRepository->create($data);
        if (!$employeeContract) {
            return false;
        }
        return $employeeContract;
    }

    // update
    public function update($data)
    {
        if ($this->employeeContractRepository->checkOverlap($data['employee_id'], $data['contract_start_date'], $data['contract_expiry_date'], $data['id'])) {
            return 'overlap';
        }

        $employeeContract = self::getOne($data['id']);

        if (!$employeeContract) {
            return false;
        }

        $employeeContract = $this->employeeContractRepository->update($employeeContract, $data);
        if (!$employeeContract) {
            return false;
        }
        return true;
    }

    // destroy
    public function destroy($id)
    {
        $employeeContract = self::getOne($id);
        if (!$employeeContract) {
            return false;
        }

        $employeeContract = $this->employeeContractRepository->destroy($employeeContract);
        if (!$employeeContract) {
            return false;
        }
        return $employeeContract;
    }
}
