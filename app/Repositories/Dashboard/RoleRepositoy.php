<?php

namespace App\Repositories\Dashboard;

use App\Models\Role;

class RoleRepositoy
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    // get  role
    public function getRole($id)
    {
        $role = Role::find($id);
        return $role;
    }

    // get roles
    public function getRoles()
    {
        $roles = Role::filter(request()->only(['keyword']), ['role'])
            ->orderByDesc('created_at')
            ->select('id', 'role', 'permissions')
            ->paginate(10)
            ->withQueryString();
            
        return $roles;
    }

    // store role
    public function storeRole($request)
    {
        $role = Role::create([
            'role' => [
                'en' => $request->role['en'],
                'ar' => $request->role['ar'],
            ],
            'permissions' => json_encode($request->permissions),
        ]);
        return $role;
    }

    // update role
    public function updateRole($request, $role)
    {
        $role = self::getRole($role->id);
        $roleUpdate = $role->update([
            'role' => [
                'en' => $request->role['en'],
                'ar' => $request->role['ar'],
            ],
            'permissions' => json_encode($request->permissions),
        ]);

        return $roleUpdate;
    }

    // destroy role
    public function destroyRole($role)
    {
        $role = self::getRole($role->id);
        return $role->forceDelete();
    }
}
