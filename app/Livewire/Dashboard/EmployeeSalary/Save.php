<?php

namespace App\Livewire\Dashboard\EmployeeSalary;

use App\Models\Employee;
use App\Models\EmployeeSalary;
use App\Services\Dashboard\EmployeeSalaryService;
use App\Services\Dashboard\EmployeeService;
use App\Services\Dashboard\SalaryService;
use Livewire\Component;

class Save extends Component
{
    public $salaryID;

    public $salary;

    public $employee;
    public $employeeSalary;
    public $employeeSalaryItem = [];

    public array $expandedRows = [];

    protected EmployeeService $employeeService;
    protected SalaryService $salaryService;
    protected EmployeeSalaryService $employeeSalaryService;

    public function boot(EmployeeService $employeeService, SalaryService $salaryService, EmployeeSalaryService $employeeSalaryService)
    {
        $this->employeeService = $employeeService;
        $this->salaryService = $salaryService;
        $this->employeeSalaryService = $employeeSalaryService;
    }

    public function mount($id)
    {
        $this->salaryID = $id;
        $this->salary = $this->salaryService->getOne($id);

        // pivot relation
        $this->employeeSalary = $this->salary->employees()->get();

        if ($this->employeeSalary->isEmpty()) {
            $this->employee = $this->employeeService->getActive();
            foreach ($this->employee as $key => $item) {
                $this->employeeSalaryItem[$key]['id'] = $key;
                $this->employeeSalaryItem[$key]['employee_id'] = $item->id;
                $this->employeeSalaryItem[$key]['salary_id'] = $this->salaryID;
                $this->employeeSalaryItem[$key]['employee_name'] = $item->EmployeeShortName();
                $this->employeeSalaryItem[$key]['personal_id'] = $item->personal_id;
                $this->employeeSalaryItem[$key]['basic_salary'] = $item->basic_salary;
                $this->employeeSalaryItem[$key]['amount'] = $item->basic_salary;
            }
        } else {
            foreach ($this->employeeSalary as $key => $item) {
                $this->employeeSalaryItem[$key]['id'] = $key;
                $this->employeeSalaryItem[$key]['employee_id'] = $item->pivot->employee_id;
                $this->employeeSalaryItem[$key]['salary_id'] = $item->pivot->salary_id;
                $this->employeeSalaryItem[$key]['employee_name'] = $item->EmployeeShortName();
                $this->employeeSalaryItem[$key]['personal_id'] = $item->personal_id;
                $this->employeeSalaryItem[$key]['basic_salary'] = $item->pivot->basic_salary;
                $this->employeeSalaryItem[$key]['amount'] = $item->pivot->amount;
            }
        }
    }

    public function submitFrom()
    {
        $data = [
            'employeeSalaryItem' => ['required', 'array'],
            'employeeSalaryItem.*.amount' => ['required', 'numeric', 'regex:/^\d{1,5}(\.\d{1,3})?$/'],
        ];

        $this->validate($data);

        //education data
        $employeeSalaryData = [];
        foreach ($this->employeeSalaryItem as $index => $name) {
            $employeeSalaryData[] = [
                'id' => $this->employeeSalaryItem[$index]['id'] ?? 0,
                'employee_id' => $this->employeeSalaryItem[$index]['employee_id'] ?? 0,
                'salary_id' => $this->employeeSalaryItem[$index]['salary_id'] ?? 0,
                'basic_salary' => $this->employeeSalaryItem[$index]['basic_salary'] ?? 0,
                'amount' => $this->employeeSalaryItem[$index]['amount'] ?? 0,
                'note' => '',
                'status' => 1,
            ];
        }

        $employeeSalaryCreated = $this->employeeSalaryService->store($this->salaryID, $employeeSalaryData);

        if ($employeeSalaryCreated == 'added') {
            flash()->warning(message: __('general.added_before_error_message'));
        } elseif ($employeeSalaryCreated == 'add_error') {
            flash()->error(message: __('general.add_error_message'));
        } elseif ($employeeSalaryCreated == 'add_success') {
            flash()->success(message: __('general.add_success_message'));
        }
    }
    public function render()
    {
        return view('livewire.dashboard.employee-salary.save');
    }
}
