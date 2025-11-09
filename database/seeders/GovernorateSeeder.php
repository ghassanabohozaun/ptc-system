<?php

namespace Database\Seeders;

use App\Models\Governorate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $governorates = [
            [
                'name' => [
                    'ar' => 'محافظة غزة',
                    'en' => 'Gaza Govnerorate',
                ],
            ],

            [
                'name' => [
                    'ar' => 'محافظة الوسطي',
                    'en' => 'El Wasta Govnerorate',
                ],
            ],

            [
                'name' => [
                    'ar' => 'محافظة خانيونس',
                    'en' => 'Khan Younis Govnerorate',
                ],
            ],
        ];

        foreach ($governorates as $governorate) {
            Governorate::create($governorate);
        }
    }
}
