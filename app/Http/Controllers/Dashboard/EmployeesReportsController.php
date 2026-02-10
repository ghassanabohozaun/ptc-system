<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\DepartmentService;
use App\Services\Dashboard\EmployeeStatusService;
use App\Services\Dashboard\GovernorateService;
use Illuminate\Http\Request;
use App\Exports\EmployeesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class EmployeesReportsController extends Controller
{
    protected $governorateService;
    protected $departmentService;
    protected $employeeStatusService;

    public function __construct(
        GovernorateService $governorateService,
        DepartmentService $departmentService,
        EmployeeStatusService $employeeStatusService
    ) {
        $this->governorateService = $governorateService;
        $this->departmentService = $departmentService;
        $this->employeeStatusService = $employeeStatusService;
    }

    // show report
    public function showReport()
    {
        $title = __('employees.reports');

        $employeeColumnNames = $this->employeeColumnNamesFunction();
        $jobDetailsColumnNames = $this->columnNamesFunction('employee_job_details');
        $governorates = $this->governorateService->getAllGovernoratesWithoutRelations();
        $departments = $this->departmentService->getAll();
        $employeeStatuses = $this->employeeStatusService->getAll();

        return view('dashboard.employees.reports.report', compact(
            'title',
            'employeeColumnNames',
            'jobDetailsColumnNames',
            'governorates',
            'departments',
            'employeeStatuses'
        ));
    }

    public function exportExcel(Request $request)
    {
        $filters = $request->except(['_token', 'columns']);

        if (empty($request->input('columns'))) {
            $selectedColumns = [
                'id',
                'full_name',
                'personal_id',
                'gender',
                'mobile_no',
                'email',
                'governoate_id',
                'city_id',
                'title',
                'department_id',
                'employee_status_id',
                'appointment_date'
            ];
        } else {
            $selectedColumns = $request->input('columns');
        }

        $fileName = 'employees_' . now()->format('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new EmployeesExport($selectedColumns, $filters), $fileName);
    }

    // employee columns name function
    public function employeeColumnNamesFunction()
    {
        $tableName = 'employees';
        $excludedColumns = [
            'id',
            'first_name',
            'father_name',
            'grand_father_name',
            'family_name',
            'deleted_at',
            'updated_at',
            'created_at',
            'password',
            'photo'
        ];
        $allColumnNames = DB::getSchemaBuilder()->getColumnListing($tableName);
        $columnNames = collect($allColumnNames)
            ->filter(function ($column) use ($excludedColumns) {
                return !in_array($column, $excludedColumns);
            })
            ->values()
            ->toArray();

        // Add full_name at the beginning (after id if you want, or just at start)
        array_unshift($columnNames, 'full_name');

        return $columnNames;
    }

    // job details columns name function
    public function columnNamesFunction($tableName)
    {
        $excludedColumns = [
            'id',
            'created_at',
            'updated_at',
            'deleted_at',
            'employee_id',
        ];
        $allColumnNames = DB::getSchemaBuilder()->getColumnListing($tableName);
        $columnNames = collect($allColumnNames)
            ->filter(function ($column) use ($excludedColumns) {
                return !in_array($column, $excludedColumns);
            })
            ->values()
            ->toArray();

        return $columnNames;
    }
}
