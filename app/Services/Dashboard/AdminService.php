<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\AdminReporitoy;
use App\Utils\ImageManagerUtils;
use Illuminate\Support\Facades\Cache;

class AdminService
{
    /**
     * Create a new class instance.
     */

    protected $adminReporitoy, $imageManagerUtils;
    // __construct
    public function __construct(AdminReporitoy $adminReporitoy, ImageManagerUtils $imageManagerUtils)
    {
        $this->adminReporitoy = $adminReporitoy;
        $this->imageManagerUtils = $imageManagerUtils;
    }

    // get Admin
    public function getAdmin($id)
    {
        $admin = $this->adminReporitoy->getAdmin($id);
        if (!$admin) {
            return false;
            //abort(404);
        }
        return $admin;
    }

    // get admins
    public function getAdmins()
    {
        return $this->adminReporitoy->getAdmins();
    }

    // store admin
    public function storeAdmin($request)
    {
        $data = $request->except(['photo']);
        if ($request->hasFile('photo')) {
            $file_name = $this->imageManagerUtils->uploadSingleImage('', $request->photo, 'admins');
            $data['photo'] = $file_name;
        }
        $admin = $this->adminReporitoy->storeAdmin($data);
        if (!$admin) {
            return false;
        }
        $this->adminCache();
        return $admin;
    }

    //update admin
    public function updateAdmin($request, $id)
    {
        $admin = $this->adminReporitoy->getAdmin($id);
        if (!$admin) {
            abort(404);
        }

        $data = $request->except(['photo']);
        if ($request->hasFile('photo')) {
            if ($admin->photo) {
                $this->imageManagerUtils->removeImageFromLocal($admin->photo, 'admins');
            }
            $file_name = $this->imageManagerUtils->uploadSingleImage('', $request->photo, 'admins');
            $data['photo'] = $file_name;
        } else {
            $data['photo'] = $admin->photo;
        }

        $admin = $this->adminReporitoy->updateAdmin($data, $admin);
        if (!$admin) {
            return false;
        }
        return $admin;
    }

    // destroy admin
    public function destroyAdmin($id)
    {
        $admin = $this->adminReporitoy->getAdmin($id);
        if (!$admin) {
            return false;
        }
        if ($admin->photo) {
            $this->imageManagerUtils->removeImageFromLocal($admin->photo, 'admins');
        }
        $admin = $this->adminReporitoy->destroyAdmin($admin);
        if (!$admin) {
            return false;
        }
        $this->adminCache();
        return $admin;
    }

    // change status admin
    public function changeStatusAdmin($id, $status)
    {
        $admin = $this->adminReporitoy->getAdmin($id);
        if (!$admin) {
            return false;
        }

        $admin = $this->adminReporitoy->changeStatusAdmin($admin, $status);
        if (!$admin) {
            return false;
        }
        return $admin;
    }

    // admin cache
    public function adminCache(){
        Cache::forget('admins_count');

    }
}
