<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GroupTourController;
use App\Http\Controllers\PlaceTourController;
use App\Http\Controllers\CategoryTourController;
use App\Http\Controllers\SearchTourController;
use App\Http\Controllers\SinglePageController;
use App\Http\Controllers\CategoryPostController;

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

Route::get('gioi-thieu', [SinglePageController::class, 'introduction'])->name('introduction');

Route::get('lien-he', [SinglePageController::class, 'contact'])->name('contact');

Route::group(['prefix' => 'nhom-du-lich', 'as' => 'group.'], function () {
    Route::get('/', [GroupTourController::class, 'index'])->name('index');
    Route::get('{slug}', [GroupTourController::class, 'show'])->name('show');
});

Route::group(['prefix' => 'dia-diem', 'as' => 'place.'], function () {
    Route::get('/', [PlaceTourController::class, 'index'])->name('index');
    Route::get('{slug}', [PlaceTourController::class, 'show'])->name('show');
});

Route::group(['prefix' => 'danh-muc', 'as' => 'category.'], function () {
    Route::get('/', [CategoryTourController::class, 'index'])->name('index');
    Route::get('{slug}', [CategoryTourController::class, 'show'])->name('show');
});

Route::group(['prefix' => 'du-lich', 'as' => 'tour.'], function () {
    Route::get('/', [TourController::class, 'index'])->name('index');
    Route::get('{slug}', [TourController::class, 'show'])->name('show');
});

Route::group([ 'prefix' => 'tin-tuc', 'as' => 'post.'], function () {

    Route::group([ 'prefix' => 'danh-muc', 'as' => 'category.'], function () {
        Route::get('/', [CategoryPostController::class, 'index'])->name('index');
        Route::get('{slug}', [CategoryPostController::class, 'show'])->name('show');
    });

    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('{slug}', [PostController::class, 'show'])->name('show');
});

Route::group([ 'prefix' => 'tim-kiem', 'as' => 'search.'], function () {
    Route::get('/', [SearchTourController::class, 'index'])->name('index');
    Route::get('show', [SearchTourController::class, 'show'])->name('show');
});

Route::group([ 'prefix' => 'ajax', 'as' => 'ajax.'], function () {
    Route::get('get-place-to-group', [SearchTourController::class, 'getPlaceToGroup'])->name('get.place.to.group');
});
