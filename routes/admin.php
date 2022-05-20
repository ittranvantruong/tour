<?php

use Illuminate\Support\Facades\Route;
use App\Admin\Http\Controllers\AuthController;
use App\Admin\Http\Controllers\PostController;
use App\Admin\Http\Controllers\AdminHomeController;
use App\Admin\Http\Controllers\CategoryPostController;

use App\Admin\Http\Controllers\CategoryTourController;
use App\Admin\Http\Controllers\PlaceTourController;
use App\Admin\Http\Controllers\TourController;

Route::get('dang-nhap', [AuthController::class, 'login'])->name('login');

Route::post('dang-nhap', [AuthController::class, 'postLogin'])->name('post.login');

Route::get('/', function(){
    return redirect()->route('admin.index');
});
Route::group(['middleware' => ['admin']], function () {
    Route::put('/danh-muc-bai-viet/update-sort', [CategoryPostController::class, 'updateSortable'])->name('category.updateSort');
    Route::resources([
        'danh-muc-bai-viet' => CategoryPostController::class,
        'bai-viet' => PostController::class,
    ]); 
    

    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('index');

    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('index');

    Route::group(['prefix' => 'danh-muc-tour', 'as' => 'category.tour.'], function () {
        Route::get('/', [CategoryTourController::class, 'index'])->name('index');
        Route::get('them', [CategoryTourController::class, 'create'])->name('create');
        Route::post('them', [CategoryTourController::class, 'store'])->name('store');
        Route::get('sua/{category_tour:id}', [CategoryTourController::class, 'edit'])->name('edit');
        Route::put('sua', [CategoryTourController::class, 'update'])->name('update');
        Route::delete('xoa/{category_tour:id}', [CategoryTourController::class, 'delete'])->name('delete');
        Route::post('multiple', [CategoryTourController::class, 'multiple'])->name('multiple');

    });

    Route::group(['prefix' => 'tour', 'as' => 'tour.'], function () {

        //Nơi khởi hành
        Route::group(['prefix' => 'place', 'as' => 'place.'], function () {
            Route::get('/', [PlaceTourController::class, 'index'])->name('index');
            Route::post('them', [PlaceTourController::class, 'store'])->name('store');
            Route::get('sua/{place:id}', [PlaceTourController::class, 'edit'])->name('edit');
            Route::put('sua', [PlaceTourController::class, 'update'])->name('update');
            Route::delete('xoa/{place:id}', [PlaceTourController::class, 'delete'])->name('delete');
            Route::post('multiple', [PlaceTourController::class, 'multiple'])->name('multiple');

        });
        Route::get('/', [TourController::class, 'index'])->name('index');
        Route::get('them', [TourController::class, 'create'])->name('create');
        Route::post('them', [TourController::class, 'store'])->name('store');
        Route::get('sua/{tour:id}', [TourController::class, 'edit'])->name('edit');
        Route::put('sua', [TourController::class, 'update'])->name('update');
        Route::delete('xoa/{tour:id}', [TourController::class, 'delete'])->name('delete');
        Route::delete('thu-vien/xoa/{file:id}', [TourController::class, 'galleryDelete'])->name('gallery.delete');
        Route::post('multiple', [TourController::class, 'multiple'])->name('multiple');
    });
    Route::group(['prefix' => 'ajax', 'as' => 'ajax.'], function () {
        Route::get('/', [PlaceTourController::class, 'ajaxIndex'])->name('tour.place.index');

    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});