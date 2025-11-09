<?php

use App\Http\Controllers\Api\Admin\Auth\LoginController;
use App\Http\Controllers\Api\Admin\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// Route::group(['middleware' => 'setLanguage'], function () {
########################################### login routes  ##############################################################
Route::post('login', [LoginController::class, 'login']);

########################################### register routes  ##############################################################
Route::post('register', [RegisterController::class, 'register']);

########################################### auth admin api routes ##################################################################
Route::group(['middleware' => 'auth:admin-api'], function () {
    Route::get('testAuth', function () {
        return 'authicated';
    });
});
// });
