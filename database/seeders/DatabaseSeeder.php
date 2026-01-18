<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
            GovernorateSeeder::class,
            CitySeeder::class,
            EmployeeStatusSeeder::class,
            DepartmentSeeder::class,
            //EmployeeSeeder::class,
        ]);
    }
}
