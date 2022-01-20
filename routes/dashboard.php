<?php

use App\Http\Controllers\Dashboard\BlockUserController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\ImageController;
use App\Http\Controllers\Dashboard\NotificationController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\PropertyController;
use App\Http\Controllers\Dashboard\PropertyValueController;
use App\Http\Controllers\Dashboard\ReportProductController;
use App\Http\Controllers\Dashboard\ReportUserController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\StoppedProductController;
use App\Http\Controllers\Dashboard\SubCategoryController;
use App\Http\Controllers\Dashboard\SupportController;
use Illuminate\Support\Facades\Route;


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
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth' , 'can:access-dashboard']], function () {
        Route::post('upload/{modelName}/{modelId}', [ImageController::class , 'upload']);
        Route::get('/', HomeController::class)->name('dashboard');
        Route::resource('category', CategoryController::class)->except(['create', 'edit']);
        Route::post('category/{category}/sub_category/{sub_category}/assign', [SubCategoryController::class, 'assign'])->name('subcategory.assign');
        Route::delete('category/{category}/sub_category/{sub_category}/unassign/{property}', [SubCategoryController::class, 'unassign'])->name('subcategory.unassign');
        Route::resource('category.sub_category', SubCategoryController::class)->except(['create', 'edit', 'index']);
        Route::resource('property', PropertyController::class)->except(['create', 'edit']);
        Route::resource('property.property_value', PropertyValueController::class)->except(['create', 'edit', 'index']);
        Route::get('notification', [NotificationController::class, 'index'])->name('notification.index');
        Route::post('notification/store', [NotificationController::class, 'store'])->name('notification.store');

        Route::resource('report_product', ReportProductController::class)->only(['index', 'show']);
        Route::resource('report_user', ReportUserController::class)->only(['index', 'show']);
        Route::resource('product', ProductController::class)->only(['index', 'update']);
        Route::resource('stopped_product', StoppedProductController::class)->only(['index', 'update']);


        Route::group(['prefix' => 'roles'], function () {

            Route::get('/', [RoleController::class, 'index'])->name('roles.index');

            Route::post('/updateRole/{role}', [RoleController::class, 'updateRole'])->name('roles.update');
            Route::post('/deleteRole/{role}', [RoleController::class, 'deleteRole'])->name('roles.delete');


            Route::post('/storeRole', [RoleController::class, 'storeRole'])->name('roles.store');
            Route::post('/updateUserRole', [RoleController::class, 'updateUserRole'])->name('roles.user.update');


        });


        Route::group(['prefix' => 'block'], function () {

            Route::get('/', [BlockUserController::class, 'index'])->name('block.index');

            Route::post('/storeBlock/{user}', [BlockUserController::class, 'storeBlock'])->name('block.storeBlock');
            Route::post('/storeUnBlock/{user}', [BlockUserController::class, 'storeUnBlock'])->name('block.storeUnBlock');


        });


        Route::get('support', [SupportController::class, 'index'])->name('support.index');
        Route::post('support/{support}', [SupportController::class, 'delete'])->name('support.delete');
        Route::post('support/reply/{support}', [SupportController::class, 'reply'])->name('support.reply');
    });








