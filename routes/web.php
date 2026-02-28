<?php

use Illuminate\Support\Facades\Route;

// frontend
use App\Http\Controllers\HomeController;

// admin
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\admin\PermissionsController;


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

        Route::prefix('users')->name('users.')->group(function(){
            Route::get('/roles', [RolesController::class, 'index'])->name('roles');
            Route::post('/roles/store', [RolesController::class, 'store'])->name('roles.store');
            Route::post('/roles/update/{id}', [RolesController::class, 'update'])->name('roles.update');
            Route::post('/roles/delete/{id}', [RolesController::class, 'delete'])->name('roles.delete');

            Route::get('/permissions', [PermissionsController::class, 'index'])->name('permissions');
        });        
    });
});
