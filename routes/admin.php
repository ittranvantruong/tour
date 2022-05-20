<?php

use Illuminate\Support\Facades\Route;
use App\Admin\Http\Controllers\AuthController;
use App\Admin\Http\Controllers\PostController;
use App\Admin\Http\Controllers\AdminHomeController;
use App\Admin\Http\Controllers\CategoryPostController;


Route::get('dang-nhap', [AuthController::class, 'login'])->name('login');

Route::post('dang-nhap', [AuthController::class, 'postLogin'])->name('post.login');

Route::get('/', function(){
    return redirect()->route('admin.index');
});
Route::group(['middleware' => ['admin']], function () {
    Route::put('/danh-muc-bai-viet/update-sort', [CategoryPostController::class, 'updateSortable'])->name('category.updateSort');
    Route::resources([
        '/danh-muc-bai-viet' => CategoryPostController::class,
        '/bai-viet' => PostController::class,
    ]); 
    

    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('index');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});