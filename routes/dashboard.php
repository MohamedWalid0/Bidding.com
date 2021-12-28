<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\SubCategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Dashboard Routes
Route::group(['prefix' => 'dashboard' ], function () {
    Route::get('/' ,  HomeController::class)->name('dashboard');

    Route::resource('category' , CategoryController::class)->except(['create' , 'edit']);
    Route::resource('category.sub_category' , SubCategoryController::class)->except(['create' , 'edit']);
});
