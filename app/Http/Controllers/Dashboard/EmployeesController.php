<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\CityService;
use App\Services\Dashboard\DepartmentService;
use App\Services\Dashboard\EmployeeService;
use App\Services\Dashboard\EmployeeStatusService;
use App\Services\Dashboard\GovernorateService;
use Illuminate\Http\Request;
use Intervention\Image\Colors\Rgb\Channels\Red;

class EmployeesController extends Controller
{
    protected $employeeService, $governorateService, $cityService, $employeeStatusService, $departmentService;
    public function __construct(EmployeeService $employeeService, GovernorateService $governorateService, CityService $cityService, EmployeeStatusService $employeeStatusService, DepartmentService $departmentService)
    {
        $this->employeeService = $employeeService;
        $this->governorateService = $governorateService;
        $this->cityService = $cityService;
        $this->employeeStatusService = $employeeStatusService;
        $this->departmentService = $departmentService;
    }

    // index
    public function index()
    {
        $title = __('employees.employees');
        return view('dashboard.employees.employees.index', compact('title'));
    }

    // get all
    public function getAll(Request $request)
    {
        return $this->employeeService->getAll($request);
    }

    // create
    public function create()
    {
        $title = __('employees.create_new_employee');
        $governorates = $this->governorateService->getAllGovernoratesWithoutRelations();
        $cities = $this->cityService->getAllCitiesWithoutRelation();
        $employeeStatuses = $this->employeeStatusService->getActiveAll();
        $departments = $this->departmentService->getActiveAll();

        return view('dashboard.employees.employees.create', compact('title', 'governorates', 'cities', 'employeeStatuses', 'departments'));
    }

    // store
    public function store(Request $request) {}

    //  show
    public function show(string $id)
    {
        $title = __('employees.profile');
        $employee = $this->employeeService->getOne($id);
        if (!$employee) {
            flash()->error(__('general.no_record_found'));
            return redirect()->back();
        }
        return view('dashboard.employees.employees.profile', compact('title', 'employee'));
    }

    // edit
    public function edit(string $id)
    {
        $title = __('employees.update_employee');
        $employee = $this->employeeService->getOne($id);
        $governorates = $this->governorateService->getAllGovernoratesWithoutRelations();
        $cities = $this->cityService->getAllCitiesWithoutRelation();
        $employeeStatuses = $this->employeeStatusService->getActiveAll();
        $departments = $this->departmentService->getActiveAll();
        $employeeID = $id;

        return view('dashboard.employees.employees.edit', compact('title', 'employee', 'employeeID', 'governorates', 'cities', 'employeeStatuses', 'departments'));
    }

    // update
    public function update(Request $request, string $id)
    {
        //
    }

    // destroy
    public function destroy(string $id)
    {
        $employee = $this->employeeService->destroy($id);
        if (!$employee) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $employee], 200);
    }



     // autocomplete employee
    public function autocompleteEmployee(Request $request)
    {
        $data = [];
        if ($request->filled('q')) {
            $data = $this->employeeService->autocompleteEmployee($request->get('q'));
        }
        return response()->json($data);
    }

}
