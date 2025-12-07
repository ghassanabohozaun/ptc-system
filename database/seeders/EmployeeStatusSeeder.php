<?php

namespace Database\Seeders;

use App\Models\EmployeeStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            [
                'name' => [
                    'ar' => 'فعال',
                    'en' => 'Active',
                ],
            ],

            [
                'name' => [
                    'ar' => 'إجازة',
                    'en' => 'Vacation',
                ],
            ],

            [
                'name' => [
                    'ar' => 'منتهي',
                    'en' => 'Expired ',
                ],
            ],

            [
                'name' => [
                    'ar' => 'موقوف بشكل مؤقت ',
                    'en' => 'Temporarily Suspended',
                ],
            ],
        ];

        foreach ($statuses as $status) {
            EmployeeStatus::create($status);
        }
    }
}
