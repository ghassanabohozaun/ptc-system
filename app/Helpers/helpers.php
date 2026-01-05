<?php

use App\Models\Admin;
use App\Models\City;
use App\Models\DailyReport;
use App\Models\Employee;
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

//  get employee Helper Function
if (!function_exists('employee')) {
    function employee()
    {
        return auth()->guard('employee');
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

    //  get admin count Helper Function
    if (!function_exists('adminCount')) {
        function adminCount()
        {
            return Admin::count();
        }
    }

    //  get governorates count Helper Function
    if (!function_exists('governoratesCount')) {
        function governoratesCount()
        {
            return Governorate::count();
        }
    }

    //  get cities count Helper Function
    if (!function_exists('citiesCount')) {
        function citiesCount()
        {
            return City::count();
        }
    }

    //  get employees count Helper Function
    if (!function_exists('employeesCount')) {
        function employeesCount()
        {
            return Employee::count();
        }
    }

     //  get daily reports count Helper Function
    if (!function_exists('dailyReportsCount')) {
        function dailyReportsCount()
        {
            return DailyReport::count();
        }
    }


}
