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
                    'ar' => 'الدعم النفسي',
                    'en' => 'Psychological support',
                ],
            ],

            [
                'name' => [
                    'ar' => 'التعليم',
                    'en' => 'education',
                ],
            ],

            [
                'name' => [
                    'ar' => 'الإدارة',
                    'en' => 'Managment',
                ],
            ],

            [
                'name' => [
                    'ar' => 'قسم المالية',
                    'en' => 'finance department',
                ],
            ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
