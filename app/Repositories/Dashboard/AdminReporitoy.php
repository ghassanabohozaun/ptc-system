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
        $admins = Admin::when(request()->keyword, function ($query) {
            $query->where('name', 'LIKE', '%' . request()->keyword . '%')
                ->orWhere('email', 'LIKE', '%' . request()->keyword . '%');
        })
        ->orderByDesc('created_at')
        ->select('id', 'name', 'email', 'password', 'status', 'role_id', 'photo', 'created_at')
        ->paginate(10);
        return $admins;
    }

    // store admin

    public function storeAdmin($data)
    {
        $admin = Admin::create([
            'name' => [
                'ar' => $data['name']['ar'],
                'en' => $data['name']['en'],
            ],
            'email' => $data['email'],
            'password' => $data['password'],
            'role_id' => $data['role_id'],
            'status' => $data['status'] ?? 0,
            'photo' => $data['photo'] ?? null,
        ]);

        return $admin;
    }

    // update admin
    public function updateAdmin($data, $admin)
    {
        $admin = self::getAdmin($admin->id);
        $admin->update([
            'name' => [
                'ar' => $data['name']['ar'],
                'en' => $data['name']['en'],
            ],
            'email' => $data['email'],
            'password' => empty($data['password']) ? $admin->password : $data['password'],
            'role_id' => $data['role_id'],
            'status' => $data['status'] ?? 0,
            'photo' => $data['photo'] ?? $admin->photo,
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
