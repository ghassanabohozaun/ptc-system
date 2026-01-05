<?php

use App\Http\Controllers\Employees\Auth\AuthController;
use App\Http\Controllers\Employees\DailyReportsController;
use App\Http\Controllers\Employees\EmployeesController;
use App\Http\Controllers\Employees\OverviewController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/employees',
        'as' => 'employees.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        ###################################### Auth  ##################################################################
        Route::get('login', [AuthController::class, 'getLogin'])->name('get.login');
        Route::post('login', [AuthController::class, 'postLogin'])->name('post.login');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        ########################################### Livewire routes ################################################################

        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle);
        });

        ########################################### employees routes  ######################################################################
        Route::group(['middleware' => 'auth:employee'], function () {
            ########################################### overview routes  ######################################################################
            Route::get('/overview', [OverviewController::class, 'index'])->name('overview');
            Route::post('/overview/change/password', [OverviewController::class, 'changeEmployeePassword'])->name('overview.change.password');

            ########################################### employees routes  ######################################################################
            Route::resource('employees', EmployeesController::class);

            ########################################### daily reports routes  ######################################################################
            Route::resource('dailyReports', DailyReportsController::class);
            Route::get('/dailyReports/status/{id?}', [DailyReportsController::class, 'changeStatus'])->name('daliy.reports.change.status');


        });
    },
);
