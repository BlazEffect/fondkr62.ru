<?php

use App\Http\Controllers\AnnualReportingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OwnersPremisesController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PersonalAccountController;
use App\Http\Controllers\RegulatoryBaseController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ReviewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/bazaprav/{regulatoryBaseSection}/{regulatoryBaseSlug}', [RegulatoryBaseController::class, 'show'])
    ->name('regulatory-base');

Route::get('/reports/yearly/{annualReporting:slug}', [AnnualReportingController::class, 'show'])
    ->missing(function () {
        abort(404);
    })
    ->name('annual-reporting');

Route::get('/news/{newsSection}', [NewsController::class, 'index'])
    ->name('news-section');
Route::get('/news/{newsSection}/{newsSlug}', [NewsController::class, 'show'])
    ->name('news');

Route::resource('/reviews', ReviewsController::class)
    ->only(['index', 'store']);

Route::get('/owners/requests', [OwnersPremisesController::class, 'index']);

Route::get('/reports/operator', [ReportsController::class, 'index']);
Route::post('/reports/operator/search_act_mo', [ReportsController::class, 'searchActMo']);
Route::post('/reports/operator/search_act_np', [ReportsController::class, 'searchActNp']);
Route::post('/reports/operator/search_act_hs', [ReportsController::class, 'searchActHs']);

Route::get('/account', [PersonalAccountController::class, 'accountStatus']);
Route::post('/account/getStatus', [PersonalAccountController::class, 'getStatus']);
Route::post('/account/getReceipt', [PersonalAccountController::class, 'getReceipt']);

Route::get('/email-receipts', [PersonalAccountController::class, 'emailReceipts']);

Route::get('/user', [PersonalAccountController::class, 'user']);
Route::post('/user/user_mo', [PersonalAccountController::class, 'userMo']);
Route::post('/user/user_np', [PersonalAccountController::class, 'userNp']);
Route::post('/user/user_hs', [PersonalAccountController::class, 'userHs']);
Route::post('/user/user_ls', [PersonalAccountController::class, 'userLs']);

Route::get('/korrupcii', [PageController::class, 'korrupcii']);
Route::get('{page:url}', [PageController::class, 'index'])
    ->where('page', '.*')
    ->missing(function () {
        abort(404);
    })
    ->name('custom-page');
