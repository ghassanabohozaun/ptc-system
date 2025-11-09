<?php

use App\Http\Controllers\Children\Auth\AuthController;
use App\Http\Controllers\Children\Auth\RegisterController;
use App\Http\Controllers\Children\ChildrenController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Livewire\Livewire;
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/child',
        'as' => 'child.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        ###################################### Auth  ##################################################################
        Route::get('login', [AuthController::class, 'getLogin'])->name('get.login');
        Route::post('login', [AuthController::class, 'postLogin'])->name('post.login');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        ###################################### register  ##################################################################
        Route::group(['middleware' => 'guest:child'], function () {
            Route::get('register', [RegisterController::class, 'index'])->name('get.register');
        });
        ########################################### index routes ################################################################
        Route::get('welcome', [ChildrenController::class, 'welcome'])
            ->where(['any' => '.*'])
            ->name('welcome');
        // Route::get('/', [ChildrenController::class, 'welcome'])->name('welcome');

        ########################################### profile routes ################################################################

        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle);
        });

        ########################################### children routes  ######################################################################
        Route::group(['middleware' => 'auth:child'], function () {
            Route::resource('children', ChildrenController::class);
        });
    },
);
