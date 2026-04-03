<?php

use App\Models\Admin;
use App\Models\City;
use App\Models\DailyReport;
use App\Models\Employee;
use App\Models\Governorate;
use App\Models\MonthlyReport;
use App\Models\Salary;
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

    //  get monthly reports count Helper Function
    if (!function_exists('monthlyReportsCount')) {
        function monthlyReportsCount()
        {
            return MonthlyReport::count();
        }
    }

    //  get salaries count Helper Function
    if (!function_exists('salariesCount')) {
        function salariesCount()
        {
            return Salary::count();
        }
    }

    // month name  in arabic
    if (!function_exists('monthNameArabic')) {
        function monthNameArabic($monthNumber)
        {
            $months = [
                1 => 'يناير',
                2 => 'فبراير',
                3 => 'مارس',
                4 => 'أبريل',
                5 => 'مايو',
                6 => 'يونيو',
                7 => 'يوليو',
                8 => 'أغسطس',
                9 => 'سبتمبر',
                10 => 'أكتوبر',
                11 => 'نوفمبر',
                12 => 'ديسمبر',
            ];
            return $months[$monthNumber] ?? null; // يعيد الاسم أو null إذا لم يكن الرقم صحيحاً
        }
    }

    // tafqeet function (Convert numbers to Arabic words)
    if (!function_exists('tafqeet')) {
        function tafqeet($number, $currency = 'دولار', $subCurrency = 'سنت')
        {
            $before_comma = trim($number);
            if (strpos($before_comma, '.') !== false) {
                $after_comma = explode('.', $before_comma);
                $before_comma = $after_comma[0];
                $after_comma = $after_comma[1];
                if (strlen($after_comma) > 2) {
                    $after_comma = substr($after_comma, 0, 2);
                }
            } else {
                $after_comma = "";
            }

            $obj = new \App\Helpers\TafqeetHelper();
            $result = $obj->convert($before_comma);

            $text = $result . ' ' . $currency;

            if ($after_comma != "" && intval($after_comma) > 0) {
                $result2 = $obj->convert($after_comma);
                $text .= ' و ' . $result2 . ' ' . $subCurrency;
            }

            return $text . ' فقط لا غير';
        }
    }
}
