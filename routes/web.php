<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationCodeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('login/facebook', [RegisterController::class , 'redirectToProvider'])->name('facebookLogin');
Route::get('login/facebook/callback', [RegisterController::class , 'handleProviderCallback']);



Route::group(['middleware' => ['auth', 'VerifiedUser']], function () {
    // must be authenticated user and verified
    Route::get('profile', function () {
        return 'You Are Authenticated ';
    });
});


Route::group(['middleware' => 'auth'], function () {
    // must be authenticated user
    Route::get('verify', [VerificationCodeController::class , 'getVerifyPage'])->name('verificationCodeForm');
    Route::post('verify-user/', [VerificationCodeController::class , 'verify'])->name('verifyUser');

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
