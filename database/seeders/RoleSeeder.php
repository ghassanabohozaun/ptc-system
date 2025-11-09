<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [];
        foreach (Config('global.permissions') as $key => $value) {
            $permissions[] = $key;
        }

        Role::create([
            'role' => [
                'en' => 'Manger',
                'ar' => 'المدير',
            ],
            'permissions' => json_encode($permissions),
        ]);
    }
}
