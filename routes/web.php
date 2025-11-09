<?php

use App\Http\Controllers\Website\Auth\AuthController;
use App\Http\Controllers\Website\Auth\RegisterController;
use App\Http\Controllers\Website\BrandsController;
use App\Http\Controllers\Website\CategoriesController;
use App\Http\Controllers\Website\FaqController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\PagesController;
use App\Http\Controllers\Website\ProductsController;
use App\Http\Controllers\Website\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'as' => 'website.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {


        Route::get('/home', function(){
            return 'home';
        })->name('home');

    },
);

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
