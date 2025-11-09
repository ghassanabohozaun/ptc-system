<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\RoleRepositoy;

class RoleService
{
    /**
     * Create a new class instance.
     */
    protected $roleRepositoy;
    // __construct
    public function __construct(RoleRepositoy $roleRepositoy)
    {
        $this->roleRepositoy = $roleRepositoy;
    }

    // get role
    public function getRole($id)
    {
        $role = $this->roleRepositoy->getRole($id);
        if (!$role) {
            return false;
        }
        return $role;
    }
    //get roles
    public function getRoles()
    {
        return $this->roleRepositoy->getRoles();
    }

    // store role
    public function storeRole($request)
    {
        $role = $this->roleRepositoy->storeRole($request);
        if (!$role) {
            return false;
        }
        return $role;
    }

    // role update
    public function updateRole($request, $id)
    {
        $role = $this->roleRepositoy->getRole($id);
        if (!$role) {
            return false;
        }

        $roleUpdate = $this->roleRepositoy->updateRole($request, $role);

        if (!$roleUpdate) {
            return false;
        }
        return $roleUpdate;
    }

    // delete role
    public function destroyRole($id)
    {
        // get role
        $role = $this->roleRepositoy->getRole($id);

        // check if any admins has role
        if ($role->admins->count() > 0 || !$role) {
            return false;
        }

        // destroy role
        $roleDestroy = $this->roleRepositoy->destroyRole($role);
        if (!$roleDestroy) {
            return false;
        }

        return $roleDestroy;
    }
}
