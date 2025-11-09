<?php

use App\Http\Controllers\Api\User\AddressController;
use App\Http\Controllers\Api\User\Auth\LoginController;
use App\Http\Controllers\Api\User\Auth\Password\PasswordController;
use App\Http\Controllers\Api\User\Auth\RegisterController;
use App\Http\Controllers\Api\User\CategoriesController;
use Illuminate\Support\Facades\Route;

// Route::group(['middleware' => 'setLanguage'], function () {

########################################### login routes  ##############################################################
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:user-api');

########################################### address routes  ##############################################################
Route::controller(AddressController::class)->group(function () {
    Route::get('get-countries', 'getCountries');
    Route::get('get-governorates/{country_id}', 'getGovernorates');
    Route::get('get-cities/{governorate_id}', 'getCities');
});

########################################### register routes  ##############################################################
Route::post('register', [RegisterController::class, 'register']);

########################################### auth user api routes ##################################################################
Route::group(['middleware' => 'auth:user-api'], function () {
    Route::get('testAuth', function () {
        return __('users.login_success');
    });
});
// });
