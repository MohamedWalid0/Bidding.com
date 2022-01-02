<?php

use App\Http\Controllers\Dashboard\BlockUserController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\NotificationController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SubCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\SupportController;


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
Route::group(['prefix' => 'dashboard' , 'middleware' => 'auth'], function () {
    Route::get('/' ,  HomeController::class)->name('dashboard');

    Route::resource('category' , CategoryController::class)->except(['create' , 'edit']);
    Route::resource('category.sub_category' , SubCategoryController::class)->except(['create' , 'edit' , 'index']);
    Route::get('notification', [NotificationController::class , 'index'])->name('notification.index');
    Route::post('notification/store', [NotificationController::class , 'store'])->name('notification.store');





    Route::group( ['prefix' => 'roles'] , function () {

        Route::get('/', [RoleController::class, 'index'])->name('roles.index');

        Route::post('/updateRole', [RoleController::class, 'updateRole'])->name('roles.update');
        Route::post('/deleteRole/{role}', [RoleController::class, 'deleteRole'])->name('roles.delete');


        Route::post('/storeRole', [RoleController::class, 'storeRole'])->name('roles.store');
        Route::post('/updateUserRole', [RoleController::class, 'updateUserRole'])->name('roles.user.update');


    });


    Route::group( ['prefix' => 'block'] , function () {

        Route::get('/', [BlockUserController::class, 'index'])->name('block.index');

        Route::post('/storeBlock/{user}', [BlockUserController::class, 'storeBlock'])->name('block.storeBlock');
        Route::post('/storeUnBlock/{user}', [BlockUserController::class, 'storeUnBlock'])->name('block.storeUnBlock');


    });





    Route::get('support', [SupportController::class , 'index'])->name('support.index');
    Route::post('support/{support}', [SupportController::class , 'delete'])->name('support.delete');
    Route::post('support/reply/{support}', [SupportController::class , 'reply'])->name('support.reply');
});








