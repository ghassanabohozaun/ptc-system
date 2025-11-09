<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            [
                'name' => [
                    'ar' => 'النصر',
                    'en' => 'El Nasser',
                ],
                'governorate_id' => '1',
            ],
            [
                'name' => [
                    'ar' => 'الصبرة',
                    'en' => 'El Sabra',
                ],
                'governorate_id' => '1',
            ],
            [
                'name' => [
                    'ar' => 'تل الهواء',
                    'en' => 'Tal El Hawa',
                ],
                'governorate_id' => '1',
            ],
            [
                'name' => [
                    'ar' => 'الشيخ رضوان',
                    'en' => 'El Shekh Radawan',
                ],
                'governorate_id' => '1',
            ],
            [
                'name' => [
                    'ar' => 'النصيرات',
                    'en' => 'El Nusirate',
                ],
                'governorate_id' => '2',
            ],
            [
                'name' => [
                    'ar' => 'البريج',
                    'en' => 'El Burij',
                ],
                'governorate_id' => '2',
            ],
            [
                'name' => [
                    'ar' => 'دير البلح',
                    'en' => 'Dar El Balah',
                ],
                'governorate_id' => '2',
            ],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
