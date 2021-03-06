<?php

use App\Events\EndBidEvent;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationCodeController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\FilterController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\RateController;
use App\Http\Controllers\Front\ReportController;
use App\Http\Controllers\Front\SubCategoryController;
use App\Http\Controllers\Front\SupportController;
use App\Http\Controllers\Front\WishlistController;
use App\Http\Controllers\HomeController;
use App\Models\Product;
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

// filter routes
Route::group( ['prefix' => 'filter'] , function () {

    Route::get('/', [FilterController::class, 'index'])->name('products.filter');
    Route::get('/SubCategory/', [FilterController::class, 'filterBySubCategory'])->name('products.filterBySubCategory');
    Route::get('/category/{categoryIds?}', [FilterController::class, 'filterByCategory'])->name('products.filterByCategory');
    Route::get('/{minPrice}/{maxPrice}', [FilterController::class, 'filterByPriceRange'])->name('products.filterByPriceRange');

});
// end filter routes

// search routes
Route::get('/search', [FilterController::class, 'search'])->name('products.search');
Route::get('/searchByKeyword', [FilterController::class, 'searchByKeyword'])->name('products.searchByKeyword');

Route::get('/subCategoriesSearch', [SubCategoryController::class, 'searchInSubCategory'])->name('products.searchInSubCategory');

Route::post('/support', [SupportController::class, 'store'])->name('support.store');
//end search routes



Route::group(['middleware' => ['auth', 'verified', 'verifiedUserPhone']], function () {
    // must be authenticated user and verified
    Route::get('profile', ProfileController::class);
    Route::get('profile/{user}', [ProfileController::class , 'show'])->name('profile.show');

    // rate routes
    Route::post('addRate' , [RateController::class , 'addRate'] )->name('users.rate') ;
    // end rate routes



    Route::group(['prefix' => 'report'], function () {

        // report product
        Route::post('/user' , [ReportController::class , 'reportUser'] )->name('users.report') ;
        // end report users

        // report product
        Route::post('/product' , [ReportController::class , 'reportProduct'] )->name('products.report') ;
        // end report product

    });



    // products
    Route::group(['prefix' => 'products'], function () {


        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::get('/getSubCategories/{categoryId}', [ProductController::class, 'getSubCategories'])->name('products.getSubCategories');
        Route::get('/getSubCategoryPropertiesIds/{subCategoryId}', [ProductController::class, 'getSubCategoryPropertiesIds'])->name('products.getSubCategoryPropertiesIds');
        Route::post('/store', [ProductController::class, 'store'])->name('products.store');
        Route::get('/{id}', [ProductController::class, 'index'])->name('products.index');

        Route::get('qrcode/{product}', [ProductController::class, 'generate'])->name('products.generate');

    });
    // end products


    // categories
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/{category}', [CategoryController::class, 'viewCategory'])->name('categories.viewCategory');
    });
    // end categories


    // sub categories
    Route::group(['prefix' => 'subCategories'], function () {
        Route::get('/{subCategory}', [SubCategoryController::class, 'viewSubCategory'])->name('subCategories.viewSubCategory');
    });
    // end sub categories


});


Route::group(['middleware' =>[ 'auth', 'verified']], function () {
    // must be authenticated user
    Route::group( [ 'middleware' => ['RedirectIfPhoneVerificated']  ] , function (){
        Route::get('phone/verify', [VerificationCodeController::class, 'getVerifyPage'])->name('verificationCodeForm');
        Route::post('phone/verifyUser/', [VerificationCodeController::class, 'verify'])->name('verifyUserPhone');
    });


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









