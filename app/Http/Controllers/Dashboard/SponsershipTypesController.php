<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SponsershipTypeRequest;
use App\Services\Dashboard\SponsershipTypeService;
use Illuminate\Http\Request;

class SponsershipTypesController extends Controller
{
    protected $sponsershipTypeService;
    // __construct
    public function __construct(SponsershipTypeService $sponsershipTypeService)
    {
        $this->sponsershipTypeService = $sponsershipTypeService;
    }

    // index
    public function index()
    {
        $title = __('sponsership.sponsershipTypes');
        $types = $this->sponsershipTypeService->getAll();
        return view('dashboard.sponsership.types.index', compact('title', 'types'));
    }

    // create
    public function create()
    {
        //
    }

    // store
    public function store(SponsershipTypeRequest $request)
    {
        $data = $request->only(['name']);
        $status = $this->sponsershipTypeService->create($data);
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
    public function update(SponsershipTypeRequest $request, string $id)
    {
        $data = $request->only(['id','name']);
        $status = $this->sponsershipTypeService->update($data);
        if (!$status) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $status], 200);
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $status = $this->sponsershipTypeService->destroy($request->id);
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
            $status = $this->sponsershipTypeService->changeStatus($request->id, $request->statusSwitch);
            if (!$status) {
                return response()->json(['status' => false], 500);
            }
            $status = $this->sponsershipTypeService->getOne($request->id);
            return response()->json(['status' => true, 'data' => $status], 200);
        }
    }
}
