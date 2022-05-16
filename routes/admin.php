<?php

use Illuminate\Support\Facades\Route;
use App\Admin\Http\Controllers\AuthController;
use App\Admin\Http\Controllers\AdminHomeController;


Route::get('dang-nhap', [AuthController::class, 'login'])->name('login');

Route::post('dang-nhap', [AuthController::class, 'postLogin'])->name('post.login');

Route::get('/', function(){
    return redirect()->route('admin.index');
});
Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('index');
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});