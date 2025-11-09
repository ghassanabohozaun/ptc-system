<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Child;
use App\Models\City;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\Faq;
use App\Models\Governorate;
use App\Models\Page;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // view composer dashboard
        // view()->composer('dashboard.*', function ($view) {
        //     // admins count
        //     if (!Cache::has('admins_count')) {
        //         Cache::remember('admins_count', now()->addMinutes(60), function () {
        //             return Admin::count();
        //         });
        //     }

        //     // children count
        //     if (!Cache::has('children_count')) {
        //         Cache::remember('children_count', now()->addMinutes(60), function () {
        //             return Child::count();
        //         });
        //     }

        //     // governorates count
        //     if (!Cache::has('governorates_count')) {
        //         Cache::remember('governorates_count', now()->addMinutes(60), function () {
        //             return Governorate::count();
        //         });
        //     }

        //     // cities count
        //     if (!Cache::has('cities_count')) {
        //         Cache::remember('cities_count', now()->addMinutes(60), function () {
        //             return City::count();
        //         });
        //     }

        //     // view share
        //     view()->share([
        //         'admins_count' => Cache::get('admins_count'),
        //         'children_count' => Cache::get('children_count'),
        //         'governorates_count' => Cache::get('governorates_count'),
        //         'cities_count' => Cache::get('cities_count'),
        //     ]);
        // });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // view composer website
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        // view()->composer('website.*', function ($view) {
        //     $pages = Page::latest()->active()->get();

        //     view()->share([
        //         'pages' => $pages,
        //     ]);
        // });

        // get share settings in scope dashbaord and website
        // $settings = $this->firstOrCreateSettings();
        // view()->share([
        //     'settings' => $settings,
        // ]);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // public function firstOrCreateSettings()
    // {
    //     $settings = Setting::firstOr(function () {
    //         return Setting::create([
    //             'site_name' => [
    //                 'en' => 'Noor Orphans',
    //                 'ar' => 'أيتام نور المعرفة',
    //             ],
    //             'address' => [
    //                 'en' => '',
    //                 'ar' => '',
    //             ],
    //             'description' => [
    //                 'en' => '',
    //                 'ar' => '',
    //             ],
    //             'keywords' => [
    //                 'en' => '',
    //                 'ar' => '',
    //             ],
    //             'phone' => '',
    //             'mobile' => '',
    //             'whatsapp' => '',
    //             'email' => '',
    //             'email_support' => '',
    //             'facebook' => '',
    //             'twitter' => '',
    //             'instegram' => '',
    //             'youtube' => '',
    //             'logo' => '',
    //             'favicon' => '',
    //             'promation_video_url' => '',
    //         ]);
    //     });

    //     return $settings;
    // }
}
