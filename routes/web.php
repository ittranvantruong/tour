<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\PostController;

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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::group(['as' => 'tour.'], function () {
    Route::get('loai-tour', [TourController::class, 'index'])->name('index');
    Route::get('tour/show', [TourController::class, 'show'])->name('show');
});
Route::group([ 'prefix' => 'tin-tuc', 'as' => 'post.'], function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('show', [PostController::class, 'show'])->name('show');
});
