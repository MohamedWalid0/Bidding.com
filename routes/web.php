<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationCodeController;
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





Route::group(['middleware' => ['auth' , 'verified' , 'verifiedUserPhone' ]], function () {
    // must be authenticated user and verified
    Route::get('profile', function () {
        return 'You Are Authenticated ';
    });
});





Route::group(['middleware' => 'auth' , 'verified' ], function () {
    // must be authenticated user
    Route::get('phone/verify', [VerificationCodeController::class , 'getVerifyPage'])->name('verificationCodeForm');
    Route::post('phone/verifyUser/', [VerificationCodeController::class , 'verify'])->name('verifyUserPhone');

});


Route::get('/home', [HomeController::class, 'index'])->name('home');




//social login with facebook
Route::get('login/facebook', [RegisterController::class , 'redirectToProvider'])->name('facebookLogin');
Route::get('login/facebook/callback', [RegisterController::class , 'handleProviderCallback']);


// social login with github
Route::get('login/github', [RegisterController::class, 'gitRedirect'])->name('gitLogin');
Route::get('login/github/callback', [RegisterController::class, 'gitCallback']);
