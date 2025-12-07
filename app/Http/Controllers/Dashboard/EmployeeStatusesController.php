<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\EmployeeStatusRequest;
use App\Services\Dashboard\EmployeeStatusService;
use Illuminate\Http\Request;

class EmployeeStatusesController extends Controller
{

    protected $employeeStatusService;

    // __construct
    public function __construct(EmployeeStatusService $employeeStatusService)
    {
        $this->employeeStatusService = $employeeStatusService;
    }

    // index
    public function index()
    {
        $title = __('employees.employee_statuses');
        $employeeStatuses = $this->employeeStatusService->getAll();
        return view('dashboard.employees.statuses.index', compact('title', 'employeeStatuses'));
    }

    // create
    public function create()
    {
        //
    }

    // store
    public function store(EmployeeStatusRequest $request)
    {
        $data = $request->only(['name']);
        $status = $this->employeeStatusService->create($data);
        if (!$status) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $status], 201);
    }

    // show
    public function show(string $id)
    {
        //
    }

    // edit
    public function edit(string $id)
    {
        //
    }

    // update
    public function update(EmployeeStatusRequest $request, string $id)
    {
        $data = $request->only(['id','name']);
        $status = $this->employeeStatusService->update($data);
        if (!$status) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $status], 200);
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $status = $this->employeeStatusService->destroy($request->id);
            if (!$status) {
                return response()->json(['status' => false], 500);
            }
            return response()->json(['status' => true, 'data' => $status], 200);
        }
    }

    // change status
    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $status = $this->employeeStatusService->changeStatus($request->id, $request->statusSwitch);
            if (!$status) {
                return response()->json(['status' => false], 500);
            }
            $status = $this->employeeStatusService->getOne($request->id);
            return response()->json(['status' => true, 'data' => $status], 200);
        }
    }
}
