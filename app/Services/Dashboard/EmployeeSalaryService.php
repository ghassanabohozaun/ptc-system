<?php

namespace App\Services\Dashboard;

use App\Models\EmployeeSalary;
use App\Repositories\Dashboard\EmployeeSalaryRepository;
use App\Repositories\Dashboard\SalaryRepository;

class EmployeeSalaryService
{
    protected $employeeSalaryRepository;
    protected $salaryService;

    // __construct
    public function __construct(EmployeeSalaryRepository $employeeSalaryRepository, SalaryService $salaryService)
    {
        $this->employeeSalaryRepository = $employeeSalaryRepository;
        $this->salaryService = $salaryService;
    }

    // store
    public function store($salaryID, $data)
    {
        // if(!empty($data)){
        //     dd($data);
        // }else{
        //     dd('empty');
        // }

        $salary = $this->salaryService->getOne($salaryID);

        $employeeSalaryExist = $salary->employees()->get();

        // $employeeSalaryExist = EmployeeSalary::where('salary_id', $salaryID)->get();

        if ($employeeSalaryExist->isEmpty()) {
            foreach ($data as $item) {
                $employeeSalary = $this->employeeSalaryRepository->store($item);
                if (!$employeeSalary) {
                    return 'add_error';
                }
            }
            return 'add_success';
        } else {
            // delete old Employee Salaries
            $salary->employees()->sync([]);

            foreach ($data as $item) {
                $employeeSalary = $this->employeeSalaryRepository->store($item);
                if (!$employeeSalary) {
                    return 'add_error';
                }
            }
            return 'add_success';
        }
    }
}
