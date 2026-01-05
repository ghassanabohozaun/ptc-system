<?php

namespace App\Repositories\Dashboard;

use App\Models\EmployeeSalary;

class EmployeeSalaryRepository
{


    // store
    public function store($data)
    {
        return EmployeeSalary::create($data);
    }
}
