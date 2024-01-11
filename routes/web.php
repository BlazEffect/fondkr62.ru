<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegulatoryBaseController;
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

Route::get('{page:url}', [PageController::class, 'index'])
    ->where('page', '.*')
    ->missing(function () {
        abort(404);
    })
    ->name('custom-page');
