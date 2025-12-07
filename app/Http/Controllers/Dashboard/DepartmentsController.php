<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\DepartmentRequest;
use App\Services\Dashboard\DepartmentService;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{

    protected $departmentService;

    // __construct
    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    // index
    public function index()
    {
        $title = __('departments.departments');
        $departments = $this->departmentService->getAll();
        return view('dashboard.employees.departments.index', compact('title', 'departments'));
    }

    // create
    public function create()
    {
        //
    }

    // store
    public function store(DepartmentRequest $request)
    {
        $data = $request->only(['name']);
        $status = $this->departmentService->create($data);
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
    public function update(DepartmentRequest $request, string $id)
    {
        $data = $request->only(['id','name']);
        $status = $this->departmentService->update($data);
        if (!$status) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $status], 200);
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $status = $this->departmentService->destroy($request->id);
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
            $status = $this->departmentService->changeStatus($request->id, $request->statusSwitch);
            if (!$status) {
                return response()->json(['status' => false], 500);
            }
            $status = $this->departmentService->getOne($request->id);
            return response()->json(['status' => true, 'data' => $status], 200);
        }
    }
}
