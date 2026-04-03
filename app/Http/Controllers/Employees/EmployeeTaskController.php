<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Services\Employees\EmployeeTaskService;
use Illuminate\Http\Request;

class EmployeeTaskController extends Controller
{
    protected $taskService;

    public function __construct(EmployeeTaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $title = __('dashboard.tasks');
        return view('employees.tasks.index', compact('title'));
    }
}
