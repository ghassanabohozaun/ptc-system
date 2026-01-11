<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'name' => [
                    'ar' => 'الإدارة',
                    'en' => 'Managment',
                ],
            ],

            [
                'name' => [
                    'ar' => 'قسم المالية',
                    'en' => 'Finance department',
                ],
            ],

            [
                'name' => [
                    'ar' => 'الدعم النفسي',
                    'en' => 'Psychological support',
                ],
            ],

            [
                'name' => [
                    'ar' => 'أيام الفرح',
                    'en' => 'Days Of Joy',
                ],
            ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
