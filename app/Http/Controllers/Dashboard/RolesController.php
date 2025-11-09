<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\RoleRequest;
use App\Services\Dashboard\RoleService;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    protected $roleService;

    // __construct
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }
    // roles index
    public function index()
    {
        $title = __('roles.roles');
        $roles = $this->roleService->getRoles();
        return view('dashboard.roles.index', compact('title', 'roles'));
    }

    // role create
    public function create()
    {
        $title = __('roles.create_role');
        return view('dashboard.roles.create', compact('title'));
    }

    // role store
    public function store(RoleRequest $request)
    {
        $role = $this->roleService->storeRole($request);

        if (!$role) {
            return response()->json(['status' => false], 500);
        }

        return response()->json(['status' => true, 'data' => $role], 200);
    }

    // role store
    public function show(string $id)
    {
        //
    }

    // role edit
    public function edit(string $id)
    {
        $title = __('roles.update_role');
        $role = $this->roleService->getRole($id);
        if (!$role) {
            flash()->error(__('general.no_record_found'));
            return redirect()->route('dashboard.roles.index');
        }

        return view('dashboard.roles.edit', compact('role', 'title'));
    }

    public function update(RoleRequest $request, string $id)
    {
        $role = $this->roleService->updateRole($request, $id);
        if (!$role) {
            flash()->error(__('general.update_error_message'));
            return redirect()->back();
        }

        flash()->success(__('general.update_success_message'));
        return redirect()->back();
    }

    // role destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $role = $this->roleService->destroyRole($request->id);

            if (!$role) {
                return response()->json(['status' => false], 500);
            }
            return response()->json(['status' => true], 201);
        }
    }
}
