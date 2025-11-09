<?php

namespace App\Repositories\Dashboard;

use App\Models\Admin;

class AdminReporitoy
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    // get admin
    public function getAdmin($id)
    {
        $admin = Admin::find($id);
        return $admin;
    }

    // get admins
    public function getAdmins()
    {
        $admins = Admin::orderByDesc('created_at')->select('id', 'name', 'email', 'password', 'status', 'role_id', 'created_at')->paginate(5);
        return $admins;
    }

    // store admin

    public function storeAdmin($request)
    {
        $admin = Admin::create([
            'name' => [
                'ar' => $request->name['ar'],
                'en' => $request->name['en'],
            ],
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $request->role_id,
            'status' => empty($request->input('status')) ? 0 : 1,
        ]);

        return $admin;
    }

    // updata admin
    public function updateAdmin($request, $admin)
    {
        $admin = self::getAdmin($admin->id);
        $admin->update([
            'name' => [
                'ar' => $request->name['ar'],
                'en' => $request->name['en'],
            ],
            'email' => $request->email,
            'password' => empty($request->input('password')) ? $admin->password : $request->password,
            'role_id' => $request->role_id,
            'status' => empty($request->input('status')) ? 0 : 1,
        ]);

        return $admin;
    }

    // destroy admin
    public function destroyAdmin($admin)
    {
        //$admin = self::getAdmin($admin->id);
        return $admin->forceDelete();
    }

    // change status

    public function changeStatusAdmin($admin, $status)
    {
        $admin = $admin->update([
            'status' => $status,
        ]);
        return $admin;
    }
}
