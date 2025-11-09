<?php

use App\Http\Controllers\Api\Web\BrandsController;
use App\Http\Controllers\Api\Web\CategoriesController;
use App\Http\Controllers\Api\Web\DaynamicPageController;
use App\Http\Controllers\Api\Web\ProductsController;
use Illuminate\Support\Facades\Route;

########################################### categories routes  ##############################################################
Route::controller(CategoriesController::class)->group(function () {
    Route::get('get-categories', 'getCategories');
});

########################################### brands routes  ##############################################################
Route::controller(BrandsController::class)->group(function () {
    Route::get('get-brands', 'getBrands');
});

########################################### pages routes  ##############################################################
Route::controller(DaynamicPageController::class)->group(function () {
    Route::get('get-daynamic-pages', 'getDaynamicPages');
});
########################################### products routes  ##############################################################

Route::controller(ProductsController::class)->group(function () {
    Route::get('get-flash-sales-products', 'getFlashSalesProducts');
});
