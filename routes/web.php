<?php

use Illuminate\Support\Facades\Route;

// frontend
use App\Http\Controllers\HomeController;

// admin
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\admin\PermissionsController;
use App\Http\Controllers\admin\RolePermissionController;


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
            Route::post('/permissions/store', [PermissionsController::class, 'store'])->name('permissions.store');
            Route::post('/permissions/update/{id}', [PermissionsController::class, 'update'])->name('permissions.update');
            Route::post('/permissions/delete/{id}', [PermissionsController::class, 'delete'])->name('permissions.delete');

            Route::get('/role-permissions', [RolePermissionController::class, 'index'])->name('rolepermissions');
            Route::post('/role-permissions/store', [RolePermissionController::class, 'store'])->name('rolepermissions.store');            
            Route::get('/role-permissions/get/{id}', [RolePermissionController::class, 'getPermission'])->name('rolepermissions.get');
            Route::post('/role-permissions/update/{id}', [RolePermissionController::class, 'update'])->name('rolepermissions.update');
            Route::post('/role-permissions/delete/{id}', [RolePermissionController::class, 'delete'])->name('rolepermissions.delete');
        });        
    });
});
