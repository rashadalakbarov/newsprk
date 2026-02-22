<?php

use Illuminate\Support\Facades\Route;

// frontend
use App\Http\Controllers\HomeController;

// admin
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\DashboardController;


// frontend
Route::get('/', [HomeController::class, 'index'])->name('index');


// admin
Route::prefix('admin')->name('admin.')->group(function(){
    Route::group(['middleware' => 'admin.guest'], function(){
        Route::get('/index', [AuthController::class, 'index'])->name('index');
        Route::post('/index', [AuthController::class, 'login'])->name('index.post');
    });

    Route::group(['middleware' => 'admin.auth'], function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    });
});
