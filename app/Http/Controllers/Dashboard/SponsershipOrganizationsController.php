<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SponsershipOrganizationRequest;
use App\Services\Dashboard\SponsershipOrganizationService;
use Illuminate\Http\Request;

class SponsershipOrganizationsController extends Controller
{

    protected $sponsershipOrganizationService;
    // __construct
    public function __construct(SponsershipOrganizationService $sponsershipOrganizationService)
    {
        $this->sponsershipOrganizationService = $sponsershipOrganizationService;
    }

    // index
    public function index()
    {
        $title = __('sponsership.sponsershipOrganizations');
        $organizations = $this->sponsershipOrganizationService->getAll();
        return view('dashboard.sponsership.organizations.index', compact('title', 'organizations'));
    }

    // create
    public function create()
    {
        //
    }

    // store
    public function store(SponsershipOrganizationRequest $request)
    {
        $data = $request->only(['name']);
        $status = $this->sponsershipOrganizationService->create($data);
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
    public function update(SponsershipOrganizationRequest $request, string $id)
    {
        $data = $request->only(['id', 'name']);
        $status = $this->sponsershipOrganizationService->update($data);
        if (!$status) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $status], 200);
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $status = $this->sponsershipOrganizationService->destroy($request->id);
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
            $status = $this->sponsershipOrganizationService->changeStatus($request->id, $request->statusSwitch);
            if (!$status) {
                return response()->json(['status' => false], 500);
            }
            $status = $this->sponsershipOrganizationService->getOne($request->id);
            return response()->json(['status' => true, 'data' => $status], 200);
        }
    }
}
