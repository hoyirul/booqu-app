<?php

// Admin Controller
use App\Http\Controllers\Admin\BannerController as AdminBannerController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\BookReviewController as AdminBookReviewController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\RoleController as AdminRoleController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\MasterMemberController as AdminMasterMemberController;
use App\Http\Controllers\Admin\MembershipController as AdminMembershipController;
use App\Http\Controllers\Admin\MostViewedBookController as AdminMostViewedBookController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
// Member Controller
use App\Http\Controllers\Member\BookCollectionController as MemberBookCollectionController;
use App\Http\Controllers\Member\HomeController as MemberHomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes Test
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/storage', function () {
    Artisan::call('storage:link');
});

Route::get('/test', function () {
  // $device = UserSession::where('user_id', 2)->count('user_id');
  // dd($device);
});

Route::get('/', [MemberHomeController::class, 'index']);
Route::get('/about', [MemberHomeController::class, 'about']);
Route::get('/books', [MemberHomeController::class, 'book']);
Route::get('/books/reviews', [MemberHomeController::class, 'book_review']);

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {
  // for operator
  Route::middleware('is.active')->group(function () {
    Route::middleware('max.device')->group(function () {
      Route::middleware('is.admin')->group(function () {
        Route::prefix('v1')->group(function () {
          Route::get('/home', [AdminHomeController::class, 'index']);
          Route::resource('roles', AdminRoleController::class);
          Route::resource('categories', AdminCategoryController::class);
          Route::resource('banners', AdminBannerController::class);
          Route::resource('memberships', AdminMembershipController::class);
          Route::resource('mastermembers', AdminMasterMemberController::class);
          Route::resource('books', AdminBookController::class);
          Route::resource('bookreviews', AdminBookReviewController::class);
          Route::get('mostviewedbooks', [AdminMostViewedBookController::class, 'index']);

          // setting and accounts
          Route::get('accounts', [AdminSettingController::class, 'account']);
          Route::get('settings', [AdminSettingController::class, 'setting']);
          Route::put('settings/update_password', [AdminSettingController::class, 'update_password']);
        });
      });
    });

    Route::middleware('is.member')->group(function () {
      Route::middleware('max.device')->group(function () {
        Route::prefix('m1')->group(function () {
          Route::get('/settings', [MemberHomeController::class, 'setting']);
          Route::put('/settings', [MemberHomeController::class, 'update_password']);
          Route::get('/landing', [MemberHomeController::class, 'index']);
          Route::get('/books/{id}/show', [MemberHomeController::class, 'show']);
          Route::get('/books', [MemberHomeController::class, 'book']);
          Route::get('/collections', [MemberHomeController::class, 'collection']);
          Route::get('/books/reviews', [MemberHomeController::class, 'book_review']);
          Route::get('/collections/{book_id}', [MemberBookCollectionController::class, 'store']);
          Route::post('/books/{book_id}/ratings', [MemberHomeController::class, 'book_rating']);
          Route::get('/{book_id}/collections/{user_id}', [MemberBookCollectionController::class, 'destroy']);
        });
      });
    });
  });
});
