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
        $template->setValue('personal_id', $contract->employee->personal_id);
        $template->setValue('employee_job_title', $contract->employee->employeeJobDetails->title ?? '');
        // Build contract_duration as a bidi-aware complex value to fix RTL ordering in Word
        $durationText = contract_duration_arabic($contract->contract_duration);
        $durationRun = new \PhpOffice\PhpWord\Element\TextRun();
        $durationRun->getParagraphStyle()->setBidi(true);
        $durationRun->getParagraphStyle()->setAlignment(\PhpOffice\PhpWord\SimpleType\Jc::END);
        $durationRun->addText($durationText, [
            'rtl'   => true,
            'bidi'  => true,
            'name'  => 'Calibri',
            'size'  => 11,
        ]);
        $template->setComplexValue('contract_duration', $durationRun);

        $template->setValue('contract_start_date', $contract->contract_start_date);
        $template->setValue('contract_expiry_date', $contract->contract_expiry_date);
        $template->setValue('monthly_salary', intval($contract->monthly_salary));

        // Tafqeet for salary (Whole number in USD)
        $template->setValue('monthly_salary_ar', tafqeet(intval($contract->monthly_salary), 'دولار'));

        $template->setValue('date_now', date('Y/m/d'));

        // Additional fields from EmployeeContractDetails
        $contractDetails = $contract->employee->employeeContractDetails;

        $template->setComplexValue('weekly_working_hours_and_days', $this->getComplexHtmlValue($contractDetails?->weekly_working_hours_and_days, 11));
        $template->setComplexValue('holidays_and_festivals', $this->getComplexHtmlValue($contractDetails?->holidays_and_festivals, 11));
        $template->setComplexValue('job_duties', $this->getComplexHtmlValue($contractDetails?->job_duties, 11));
        $template->setComplexValue('contract_terms', $this->getComplexHtmlValue($contractDetails?->contract_terms, 9));
        $template->setComplexValue('education_contract', $this->getComplexHtmlValue($contractDetails?->education_contract, 11));
        $template->setComplexValue('experiences_contract', $this->getComplexHtmlValue($contractDetails?->experiences_contract, 11));
        $template->setComplexValue('other_requirements', $this->getComplexHtmlValue($contractDetails?->other_requirements, 11));

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
    private function getComplexHtmlValue($html, $fontSize = 10)
    {
        $textRun = new \PhpOffice\PhpWord\Element\TextRun();
        $textRun->getParagraphStyle()->setBidi(true);
        $textRun->getParagraphStyle()->setAlignment(\PhpOffice\PhpWord\SimpleType\Jc::END);
        $textRun->getParagraphStyle()->setIndentation(['right' => 0, 'left' => 0, 'firstLine' => 0]);

        if (!$html) {
            return $textRun;
        }

        // Clean any inline justify styles
        $html = str_replace(['text-align: justify;', 'text-align:justify;'], '', $html);

        // 1. Normalize tags to a single newline strategy
        $html = str_replace(['<strong>', '</strong>'], ['<b>', '</b>'], $html);
        $html = str_replace(['<br>', '<br />', '<br/>', '<p>', '<div>', '<li>'], "\n", $html);
        $html = str_replace(['</p>', '</div>', '</li>', '<ul>', '</ul>', '<ol>', '</ol>'], "", $html);

        // 2. Collapse multiple newlines into one to avoid double spacing
        $html = preg_replace("/\n+/", "\n", $html);
        $html = trim($html, "\n");

        // 3. Strip remaining tags except <b>
        $html = strip_tags($html, '<b>');
        $html = html_entity_decode($html);

        // 4. Split by Bold tags and the normalized newlines
        $parts = preg_split('/(<b>.*?<\/b>|\n)/u', $html, -1, PREG_SPLIT_DELIM_CAPTURE);

        $first = true;
        foreach ($parts as $part) {
            if ($part === "") continue;

            // Handle Newline token - now guaranteed to be single thanks to preg_replace
            if ($part === "\n") {
                if (!$first) {
                    $textRun->addTextBreak();
                }
                continue;
            }

            $isBold = false;
            $text = $part;

            if (preg_match('/<b>(.*?)<\/b>/u', $part, $matches)) {
                $isBold = true;
                $text = $matches[1];
            }

            if ($text !== '' || $text === "0") {
                $textRun->addText(htmlspecialchars($text), [
                    'rtl' => true,
                    'bidi' => true,
                    'name' => 'Calibri',
                    'size' => $fontSize,
                    'bold' => $isBold
                ]);
                $first = false;
            }
        }

        return $textRun;
    }
}
