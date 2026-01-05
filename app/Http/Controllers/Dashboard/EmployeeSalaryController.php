<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use App\Services\Dashboard\EmployeeService;
use App\Services\Dashboard\SalaryService;
use Illuminate\Http\Request;
use PDF;

class EmployeeSalaryController extends Controller
{
    protected $salaryService, $employeeService;

    // construct
    public function __construct(SalaryService $salaryService, EmployeeService $employeeService)
    {
        $this->salaryService = $salaryService;
        $this->employeeService = $employeeService;
    }

    // index
    public function index($id)
    {
        // if(!$id){
        //     flash()->error(__('general.no_record_found'));
        //     return redirect()->route('dashboard.salaries.index');
        // }
        $title = __('salaries.employee_salary');

        // $salaryEmployee = $salary->employees()->get();
        //$employees = $this->employeeService->getEmployees();

        return view('dashboard.salaries.employee-salary.index', compact('title', 'id'));
    }

    // print
    public function print($id)
    {

        $salary = $this->salaryService->getOne($id);

        $employeeSalary = $salary->employees()->get();


        $data = [

            'header' => public_path('assets/dashbaord/images/header.jpeg'),
            'footer' => public_path('assets/dashbaord/images/footer.jpeg'),
            'employeeSalary' => $employeeSalary,
            'salary'=>$salary,
        ];

        $pdf = PDF::loadView('dashboard.salaries.employee-salary.print', $data);

        return $pdf->stream($salary->month . '.pdf');
    }
    //create
    public function create()
    {
        //
    }

    //store
    public function store(Request $request) {}

    //show
    public function show(string $id)
    {
        //
    }

    //edit
    public function edit(string $id)
    {
        //
    }

    //update
    public function update(Request $request, string $id)
    {
        //
    }

    //destroy
    public function destroy(string $id)
    {
        //
    }
}
