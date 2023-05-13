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
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
// Member Controller
use App\Http\Controllers\Member\HomeController as MemberHomeController;
use App\Models\UserSession;
use Illuminate\Support\Facades\Auth;
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

Route::get('/test', function () {
  // $device = UserSession::where('user_id', 2)->count('user_id');
  // dd($device);
});

Route::get('/', [MemberHomeController::class, 'index']);

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
          Route::get('/home', [App\Http\Controllers\HomeController::class, 'member']);
        });
      });
    });
  });
});
