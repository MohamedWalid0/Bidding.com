<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationCodeController;
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

//Route::get('/', function () {
//    return view('home');
//});

Auth::routes(['verify' => true]);


Route::group(['middleware' => ['auth', 'verified', 'verifiedUserPhone']], function () {
    // must be authenticated user and verified
    Route::get('profile', ProfileController::class);
});


Route::group(['middleware' => 'auth', 'verified'], function () {
    // must be authenticated user
    Route::get('phone/verify', [VerificationCodeController::class, 'getVerifyPage'])->name('verificationCodeForm');
    Route::post('phone/verifyUser/', [VerificationCodeController::class, 'verify'])->name('verifyUserPhone');

});


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');


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



// wishlist
Route::group(['prefix' => 'wishlist'], function () {
    Route::get('/', [WishlistController::class , 'index'] )->name('wishlist.index');
    Route::get('/addToWishlist/{product:id}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
    Route::get('/deleteFromWishlist/{product:id}', [WishlistController::class, 'deleteFromWishlist'])->name('wishlist.delete');
});
// end wishlist
