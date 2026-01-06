<?php

use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Auth\Passowrd\ForgetPasswordController;
use App\Http\Controllers\Dashboard\Auth\Passowrd\ResetPasswordController;
use App\Http\Controllers\Dashboard\MonthlyReportsController;
use App\Http\Controllers\Dashboard\SalariesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\{AdminsController, CitiesController, DailyReportsController, DashboardController, DepartmentsController, EmployeeSalaryController, EmployeesController, EmployeeStatusesController, GovernoratiesController, ProductsController, RolesController, SettingsController, SponsershipOrganizationsController, SponsershipStatusesController, SponsershipTypesController};
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard',
        'as' => 'dashboard.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        ########################################### Auth  ##################################################################
        Route::get('login', [AuthController::class, 'getLogin'])->name('get.login');
        Route::post('login', [AuthController::class, 'postLogin'])->name('post.login');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        ########################################### reset password  ######################################################################
        Route::group(['prefix' => 'password', 'as' => 'password.'], function () {
            Route::controller(ForgetPasswordController::class)->group(function () {
                Route::get('email', 'showEmailForm')->name('get.email');
                Route::post('email', 'sendOTP')->name('post.email');
                Route::get('verify/{email?}', 'showVerifyOTPForm')->name('verify');
                Route::post('verify', 'verifyOTP')->name('post.verify');
            });

            Route::controller(ResetPasswordController::class)->group(function () {
                Route::get('reset/{email?}', 'showResetFrom')->name('reset');
                Route::post('reset', 'resetPasword')->name('post.reset');
            });
        });

        ########################################### protected routes  #####################################################################
        Route::group(['middleware' => 'auth:admin'], function () {
            ########################################### welcome  ##########################################################################
            Route::get('/welcome', [DashboardController::class, 'index'])->name('index');

            ########################################### roles routes ######################################################################
            Route::group(['middleware' => 'can:roles'], function () {
                Route::resource('roles', RolesController::class);
                Route::post('/roles/destroy', [RolesController::class, 'destroy'])->name('roles.destroy');
            });

            ########################################### admins routes  #####################################################################
            Route::group(['middleware' => 'can:admins'], function () {
                Route::resource('admins', AdminsController::class);
                Route::post('/admins/destroy', [AdminsController::class, 'destroy'])->name('admins.destroy');
                Route::post('/admins/status', [AdminsController::class, 'changeStatus'])->name('admins.change.status');
            });

            ########################################### world routes  ######################################################################
            Route::group(['middleware' => 'can:world'], function () {
                // governorates routes
                Route::resource('governorates', GovernoratiesController::class);
                Route::post('/governorates/destroy', [GovernoratiesController::class, 'destroy'])->name('governorates.destroy');
                Route::get('/governorates/status/{id?}', [GovernoratiesController::class, 'changeStatus'])->name('governorates.change.status');
                Route::get('/governorates/get/all/cities', [GovernoratiesController::class, 'getAllCitiesByGovernorate'])->name('governorates.get.all.cities');
                Route::get('/governorate/{governorate_id?}/cities', [GovernoratiesController::class, 'getCitesByGovernrateID'])->name('governorates.get.cities.by.governorate.id');
                Route::post('/govnerorates/update/price', [GovernoratiesController::class, 'updateShippingPrice'])->name('governorates.update.shipping.price');

                // cities routes
                Route::resource('cities', CitiesController::class);
                Route::post('/cities/destroy', [CitiesController::class, 'destroy'])->name('cities.destroy');
            });

            ########################################### settings routes  ######################################################################
            Route::group(['middleware' => 'can:settings'], function () {
                Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
                Route::put('/settings/{id?}', [SettingsController::class, 'update'])->name('settings.update');
            });

            ########################################### employee routes  ######################################################################
            Livewire::setUpdateRoute(function ($handle) {
                return Route::post('/livewire/update', $handle);
            });
            ########################################### employee statuses routes  ######################################################################
            Route::group(['middleware' => 'can:employeeStatuses'], function () {
                Route::resource('employeeStatuses', EmployeeStatusesController::class);
                Route::post('/employeeStatuses/destroy', [EmployeeStatusesController::class, 'destroy'])->name('employee.statues.destroy');
                Route::post('/employeeStatuses/status', [EmployeeStatusesController::class, 'changeStatus'])->name('employee.statues.change.status');
            });

            ########################################### departments routes  ######################################################################
            Route::group(['middleware' => 'can:departments'], function () {
                Route::resource('departments', DepartmentsController::class);
                Route::post('/departments/destroy', [DepartmentsController::class, 'destroy'])->name('departments.destroy');
                Route::post('/departments/status', [DepartmentsController::class, 'changeStatus'])->name('departments.change.status');
            });

            ########################################### employees routes  ######################################################################
            Route::group(['middleware' => 'can:employees'], function () {
                Route::resource('employees', EmployeesController::class);
                Route::post('/employees/status', [EmployeesController::class, 'changeStatus'])->name('employees.change.status');
                Route::get('/employees/autocomplete/employee', [EmployeesController::class, 'autocompleteEmployee'])->name('employees.autocomplete.employee');
            });

            ########################################### daily reports routes  ######################################################################
            Route::group(['middleware' => 'can:dailyReports'], function () {
                Route::resource('dailyReports', DailyReportsController::class);
                Route::post('/dailyReports/status', [DailyReportsController::class, 'changeStatus'])->name('daliy.reports.change.status');
            });

            ########################################### monthly reports routes  ######################################################################
            Route::group(['middleware' => 'can:monthlyReports'], function () {
                Route::resource('monthlyReports', MonthlyReportsController::class);
                Route::post('/monthlyReports/status', [MonthlyReportsController::class, 'changeStatus'])->name('monthly.reports.change.status');
            });

            ########################################### salaries routes  ######################################################################
            Route::group(['middleware' => 'can:salaries'], function () {
                Route::resource('salaries', SalariesController::class);
                Route::post('/salaries/destroy', [SalariesController::class, 'destroy'])->name('salaries.destroy');
                Route::post('/salaries/status', [SalariesController::class, 'changeStatus'])->name('salaries.change.status');
            });

            ########################################### employee salary routes  ######################################################################
            Route::group(['middleware' => 'can:salaries'], function () {
                // Route::resource('employeeSalary', SalariesController::class);
                Route::get('/salaries/{id?}/employee', [EmployeeSalaryController::class, 'index'])->name('employee.salary.index');
                Route::get('/salaries/print/{id?}', [EmployeeSalaryController::class, 'print'])->name('employee.salary.print');

                // Route::post('/employee/salary/status', [EmployeeSalary::class, 'changeStatus'])->name('employee.salary.change.status');
            });
        });
    },
);
