<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SalaryRequest;
use App\Services\Dashboard\SalaryService;
use Illuminate\Http\Request;

class SalariesController extends Controller
{
    protected $salaryService;

    // __construct
    public function __construct(SalaryService $salaryService)
    {
        $this->salaryService = $salaryService;
    }

    // index
    public function index(Request $request)
    {
        $title = __('salaries.salaries');
        $salaries = $this->salaryService->getAll($request);

        if ($request->ajax()) {
            return view('dashboard.salaries.partials._table', compact('salaries'))->render();
        }

        return view('dashboard.salaries.index', compact('title', 'salaries'));
    }

    // create
    public function create()
    {
        //
    }

    // store
    public function store(SalaryRequest $request)
    {
        $data = $request->except(['_token']);
        $salary = $this->salaryService->create($data);
        return response()->json(['status' => $salary], 201);
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
    public function update(SalaryRequest $request, string $id)
    {
        $data = $request->except(['_token']);
        $status = $this->salaryService->update($data);
        if (!$status) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $status], 200);
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $status = $this->salaryService->destroy($request->id);
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
            $status = $this->salaryService->changeStatus($request->id, $request->statusSwitch);
            if (!$status) {
                return response()->json(['status' => false], 500);
            }
            $status = $this->salaryService->getOne($request->id);
            return response()->json(['status' => true, 'data' => $status], 200);
        }
    }
}
