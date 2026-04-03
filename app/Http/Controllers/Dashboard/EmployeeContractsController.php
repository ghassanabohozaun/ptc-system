<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\EmployeeContractRequest;
use App\Services\Dashboard\EmployeeContractService;
use App\Services\Dashboard\EmployeeService;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class EmployeeContractsController extends Controller
{
    protected $employeeContractService;
    protected $employeeService;

    public function __construct(EmployeeContractService $employeeContractService, EmployeeService $employeeService)
    {
        $this->employeeContractService = $employeeContractService;
        $this->employeeService = $employeeService;
    }

    // index
    public function index(Request $request)
    {
        $title = __('employeeContracts.employee_contracts');

        $employeeContracts = $this->employeeContractService->getAll($request);
        $employees = $this->employeeService->getEmployees();

        if ($request->ajax()) {
            return view('dashboard.employees.employee-contracts.partials._table', compact('employeeContracts'))->render();
        }
        return view('dashboard.employees.employee-contracts.index', compact('title', 'employeeContracts', 'employees'));
    }

    // store
    public function store(EmployeeContractRequest $request)
    {
        $data = $request->except(['_token']);
        $employeeContract = $this->employeeContractService->create($data);

        if ($employeeContract === 'overlap') {
            return response()->json(
                [
                    'errors' => [
                        'contract_start_date' => [__('employeeContracts.contract_overlap_error')],
                    ],
                ],
                422,
            );
        }

        return response()->json(['status' => $employeeContract], 201);
    }

    // update
    public function update(EmployeeContractRequest $request, string $id)
    {
        $data = $request->except(['_token', '_method']);
        $data['id'] = $id;

        $employeeContract = $this->employeeContractService->update($data);

        if ($employeeContract === 'overlap') {
            return response()->json(
                [
                    'errors' => [
                        'contract_start_date' => [__('employeeContracts.contract_overlap_error')],
                    ],
                ],
                422,
            );
        }

        if (!$employeeContract) {
            return response()->json(['status' => false], 500);
        }

        return response()->json(['status' => true], 200);
    }

    // destroy
    public function destroy(Request $request)
    {
        $employeeContract = $this->employeeContractService->destroy($request->id);
        if (!$employeeContract) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }

    // print
    public function print($id)
    {
        $contract = $this->employeeContractService->getOne($id);
        if (!$contract) {
            abort(404);
        }

        $template_path = storage_path('app/ptc-templates/contract.docx');
        if (!file_exists($template_path)) {
            return response()->json(['status' => false, 'message' => 'Template not found'], 404);
        }

        $template = new TemplateProcessor($template_path);

        $template->setValue('employee_name', $contract->employee->EmployeeFullName());
        $template->setValue('employee_personal_id', $contract->employee->personal_id);
        $template->setValue('employee_job_title', $contract->employee->employeeJobDetails->title ?? '');
        $template->setValue('contract_duration', $contract->contract_duration);
        $template->setValue('contract_start_date', $contract->contract_start_date);
        $template->setValue('contract_expiry_date', $contract->contract_expiry_date);
        $template->setValue('monthly_salary', intval($contract->monthly_salary));
        
        // Tafqeet for salary (Whole number in USD)
        $template->setValue('monthly_salary_ar', tafqeet(intval($contract->monthly_salary), 'دولار'));

        $template->setValue('date_now', date('Y/m/d'));

        // Additional fields from EmployeeContractDetails
        $contractDetails = $contract->employee->employeeContractDetails;
        
        $template->setComplexValue('weekly_working_hours_and_days', $this->getComplexHtmlValue($contractDetails?->weekly_working_hours_and_days));
        $template->setComplexValue('holidays_and_festivals', $this->getComplexHtmlValue($contractDetails?->holidays_and_festivals));
        $template->setComplexValue('job_duties', $this->getComplexHtmlValue($contractDetails?->job_duties));
        $template->setComplexValue('contract_terms', $this->getComplexHtmlValue($contractDetails?->contract_terms));
        $template->setComplexValue('education_contract', $this->getComplexHtmlValue($contractDetails?->education_contract));
        $template->setComplexValue('experiences_contract', $this->getComplexHtmlValue($contractDetails?->experiences_contract));
        $template->setComplexValue('other_requirements', $this->getComplexHtmlValue($contractDetails?->other_requirements));

        $employeeEnName = $contract->employee->getTranslation('first_name', 'en') . '-' . 
                          $contract->employee->getTranslation('father_name', 'en') . '-' . 
                          $contract->employee->getTranslation('grand_father_name', 'en') . '-' . 
                          $contract->employee->getTranslation('family_name', 'en');

        $fileName = 'Contract-' . $employeeEnName . '-' . $contract->contract_start_date . '.docx';

        // Ensure temp directory exists
        $temp_dir = storage_path('app/temp');
        if (!file_exists($temp_dir)) {
            mkdir($temp_dir, 0755, true);
        }

        $outputPath = $temp_dir . '/' . $fileName;
        $template->saveAs($outputPath);

        return response()->download($outputPath)->deleteFileAfterSend(true);
    }

    /**
     * Convert Summernote HTML content to a Word Complex Value with robust RTL support.
     * This method avoids using addHtml() to prevent OOXML corruption caused by nested block elements.
     */
    private function getComplexHtmlValue($html)
    {
        $textRun = new \PhpOffice\PhpWord\Element\TextRun();
        $textRun->getParagraphStyle()->setBidi(true);
        $textRun->getParagraphStyle()->setAlignment(\PhpOffice\PhpWord\SimpleType\Jc::RIGHT);

        if (!$html) {
            return $textRun;
        }

        // 1. Pre-process lists and blocks to text with manual formatting
        $html = str_replace(['<ul>', '</ul>', '<ol>', '</ol>', '<table>', '</table>', '<tbody>', '</tbody>'], '', $html);
        $html = str_replace(['<li>', '<td>', '<tr>'], "\n• ", $html);
        $html = str_replace(['</li>', '</p>', '</div>', '</td>', '</tr>', '<br>', '<br />'], "\n", $html);
        
        // 2. Strip tags and decode entities
        $html = strip_tags($html);
        $html = html_entity_decode($html);
        
        // 3. Add text parts safely
        $lines = explode("\n", $html);
        $first = true;
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '') continue;

            if (!$first) {
                $textRun->addTextBreak();
            }
            
            // Add text with explicit RTL/Bidi formatting for each line
            $textRun->addText(htmlspecialchars($line), [
                'rtl' => true, 
                'bidi' => true,
                'name' => 'Simplified Arabic', // Common Arabic font for better rendering
                'size' => 12
            ]);
            $first = false;
        }

        return $textRun;
    }
}
