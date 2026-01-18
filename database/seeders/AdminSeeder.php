<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $first_role_id = Role::first()->id;

        $admins = [
            [
                'name' => [
                    'en' => 'Admin',
                    'ar' => 'المدير',
                ],
                'password' => bcrypt('123456'),
                'email' => 'admin@admin.com',
                'role_id' => $first_role_id,
            ],

            [
                'name' => [
                    'en' => 'Mohamed Altawil',
                    'ar' => 'محمد الطويل',
                ],

                'password' => bcrypt('123456'),
                'email' => 'ptcuk.gaza2007@gmail.com',
                'role_id' => $first_role_id,
            ],

            [
                'name' => [
                    'en' => 'Ahmed Ghorab',
                    'ar' => 'أحمد غراب',
                ],

                'password' => bcrypt('123456'),
                'email' => 'groubahmed03@gmail.com',
                'role_id' => $first_role_id,
            ],
        ];

        foreach ($admins as $admin) {
            Admin::create($admin);
        }
    }
}
