<?php

use Illuminate\Support\Facades\Route;

// frontend
use App\Http\Controllers\HomeController;

// admin
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\DashboardController;


// frontrend
Route::get('/', [HomeController::class, 'index'])->name('index');


// admin
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/index', [AuthController::class, 'index'])->name('index');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
