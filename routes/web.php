<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationCodeController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\WishlistController;
use App\Http\Controllers\HomeController;
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


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Auth::routes(['verify' => true]);


Route::group(['middleware' => ['auth', 'verified', 'verifiedUserPhone']], function () {
    // must be authenticated user and verified
    Route::get('profile', ProfileController::class);

    // products
    Route::group(['prefix' => 'products'], function () {

        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::get('/getSubCategories/{categoryId}', [ProductController::class, 'getSubCategories'])->name('products.getSubCategories');
        Route::get('/getSubCategoryPropertiesIds/{subCategoryId}', [ProductController::class, 'getSubCategoryPropertiesIds'])->name('products.getSubCategoryPropertiesIds');
        Route::post('/store', [ProductController::class, 'store'])->name('products.store');
        Route::get('/{id}', [ProductController::class, 'index'])->name('products.index');


    });
    // end products

});


Route::group(['middleware' => 'auth', 'verified'], function () {
    // must be authenticated user
    Route::get('phone/verify', [VerificationCodeController::class, 'getVerifyPage'])->name('verificationCodeForm');
    Route::post('phone/verifyUser/', [VerificationCodeController::class, 'verify'])->name('verifyUserPhone');

    // wishlist
    Route::group(['prefix' => 'wishlist'], function () {
        Route::get('/', [WishlistController::class, 'index'])->name('wishlist.index');
        Route::get('/{product:id}', [WishlistController::class, 'toggleProductInWishlist'])->name('wishlistToggle');
    });
    // end wishlist

});


Route::group(['middleware' => 'guest'], function () {
    //social login with facebook
    Route::get('login/facebook', [RegisterController::class, 'redirectToProvider'])->name('facebookLogin');
    Route::get('login/facebook/callback', [RegisterController::class, 'handleProviderCallback']);


    // social login with github
    Route::get('login/github', [RegisterController::class, 'gitRedirect'])->name('gitLogin');
    Route::get('login/github/callback', [RegisterController::class, 'gitCallback']);

    //social login with twitter
    Route::get('login/twitter', [RegisterController::class, 'redirectToTwitter'])->name('twitterLogin');
    Route::get('login/twitter/callback', [RegisterController::class, 'callbackToTwitter']);
});




