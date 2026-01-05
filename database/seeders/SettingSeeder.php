<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = Setting::firstOr(function () {
            return Setting::create([
                'site_name' => [
                    'en' => 'PTC',
                    'ar' => 'PTC',
                ],
                'address' => [
                    'en' => '',
                    'ar' => '',
                ],
                'description' => [
                    'en' => '',
                    'ar' => '',
                ],
                'keywords' => [
                    'en' => '',
                    'ar' => '',
                ],
                'phone' => '',
                'mobile' => '',
                'whatsapp' => '',
                'email' => '',
                'email_support' => '',
                'facebook' => '',
                'twitter' => '',
                'instegram' => '',
                'youtube' => '',
                'logo' => '',
                'favicon' => '',
            ]);
        });
    }
}
