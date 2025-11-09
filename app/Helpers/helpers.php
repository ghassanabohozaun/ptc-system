<?php

use App\Models\Admin;
use App\Models\Child;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Support\Facades\Config;
use App\Models\Setting;

//  setting Helper Function
if (!function_exists('setting')) {
    function setting()
    {
        return Setting::orderBy('id', 'desc')->first();
    }
}

// test
//  get language Helper Function
if (!function_exists('Lang')) {
    function Lang()
    {
        return app()->getLocale();
    }
}

//  get admin Helper Function
if (!function_exists('admin')) {
    function admin()
    {
        return auth()->guard('admin');
    }
}

//  get web Helper Function
if (!function_exists('web')) {
    function web()
    {
        return auth()->guard('web');
    }
}

//  get student Helper Function
if (!function_exists('child')) {
    function child()
    {
        return auth()->guard('child');
    }
}

if (!function_exists('slug')) {
    function slug($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $stringToLower = strtolower($string);
        return preg_replace('/[^\w\s\-]+/u', '', $stringToLower);
    }
}

if (!function_exists('replaceHyphensWithSpaces')) {
    function replaceHyphensWithSpaces($string)
    {
        return $string = str_replace('-', ' ', $string); // Replaces all hyphens with spaces.
    }

    //  get child count Helper Function
    if (!function_exists('childCount')) {
        function childCount()
        {
            return Child::count();
        }
    }

    if (!function_exists('childMaleCount')) {
        function childMaleCount()
        {
            return Child::where('gender', 'male')->count();
        }
    }

    if (!function_exists('childFemaleCount')) {
        function childFemaleCount()
        {
            return Child::where('gender', 'female')->count();
        }
    }

    //  get admin count Helper Function
    if (!function_exists('adminCount')) {
        function adminCount()
        {
            return Admin::count();
        }
    }

    //  get governorate count Helper Function
    if (!function_exists('governorateCount')) {
        function governorateCount()
        {
            return Governorate::count();
        }
    }

    //  get city count Helper Function
    if (!function_exists('cityCount')) {
        function cityCount()
        {
            return City::count();
        }
    }
}
