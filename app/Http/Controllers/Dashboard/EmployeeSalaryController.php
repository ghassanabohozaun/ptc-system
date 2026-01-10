<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeSalary;
use App\Services\Dashboard\EmployeeService;
use App\Services\Dashboard\SalaryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use PhpOffice\PhpWord\TemplateProcessor;

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

        $template = new TemplateProcessor(storage_path('app/ptc-templates/salary.docx'));

        $template->setValue('date_now', date('Y/m/d'));
        $template->setValue('month', $salary->month ? monthNameArabic($salary->month) : '');
        $template->setValue('year', $salary->year ? $salary->year : '');
        $template->setValue('total', $salary->employees->sum('pivot.amount'));

        $employeeSalaries = $salary
            ->employees()
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item['id'],
                    'full_name' => $item->EmployeeFullName(),
                    'personal_id' => $item['personal_id'],
                    'iban' => $item['iban'],
                    'amount' => $item->pivot->amount,
                ];
            });

        $template->cloneRowAndSetValues('full_name', $employeeSalaries);

        $fileName = 'salary.doc';
        $outputPath = storage_path('app/temp/' . $fileName);

        $template->saveAs($outputPath);

        return response()->download($outputPath)->deleteFileAfterSend(true);
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
