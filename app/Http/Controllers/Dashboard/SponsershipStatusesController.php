<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SponsershipStatusRequest;
use App\Services\Dashboard\SponsershipStatusService;
use Illuminate\Http\Request;

class SponsershipStatusesController extends Controller
{
    protected $sponsershipStatusService;
    // __construct
    public function __construct(SponsershipStatusService $sponsershipStatusService)
    {
        $this->sponsershipStatusService = $sponsershipStatusService;
    }

    // index
    public function index()
    {
        $title = __('sponsership.sponsership_statuses');
        $sponsershipStatuses = $this->sponsershipStatusService->getAll();
        return view('dashboard.sponsership.statuses.index', compact('title', 'sponsershipStatuses'));
    }

    // create
    public function create()
    {
        //
    }

    // store
    public function store(SponsershipStatusRequest $request)
    {
        $data = $request->only(['name']);
        $status = $this->sponsershipStatusService->create($data);
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
    public function update(SponsershipStatusRequest $request, string $id)
    {
        $data = $request->only(['id','name']);
        $status = $this->sponsershipStatusService->update($data);
        if (!$status) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $status], 200);
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $status = $this->sponsershipStatusService->destroy($request->id);
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
            $status = $this->sponsershipStatusService->changeStatus($request->id, $request->statusSwitch);
            if (!$status) {
                return response()->json(['status' => false], 500);
            }
            $status = $this->sponsershipStatusService->getOne($request->id);
            return response()->json(['status' => true, 'data' => $status], 200);
        }
    }
}
