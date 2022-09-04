<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Admins\DashboardController;
use App\Http\Controllers\Admins\ConpanyController;
use App\Http\Controllers\Admins\RoleController;
use App\Http\Controllers\Admins\UserController;

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

// old route
// Route::middleware(['auth:sanctum', 'verified'])->get('/', [DashboardController::class,'index'])->name('index');

// Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum', 'verified'])->group(function() {
//     Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

//     Route::prefix('/dashboards')->name('dashboards.')->group(function () {
//         Route::get('/', [DashboardController::class, 'index'])->name('index');
//     });

//     Route::prefix('companys')->name('companys.')->group(function () {
//         Route::get('/', [ConpanyController::class, 'index'])->name('index');
//         Route::get('/create', [ConpanyController::class, 'create'])->name('create');
//         Route::post('/', [ConpanyController::class, 'store'])->name('store');
//         Route::get('{company}/edit', [ConpanyController::class, 'edit'])->name('edit');
//         Route::put('{company}', [ConpanyController::class, 'update'])->name('update');
//         Route::put('{company}/delete', [ConpanyController::class, 'destroy'])->name('destroy');
//     });

// });

// new route
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('admin')->name('admin.')->middleware(['role:admin'])->group(function () {
        Route::prefix('companys')->name('companys.')->group(function () {
            Route::get('/', [ConpanyController::class, 'index'])->name('index');
            Route::get('/create', [ConpanyController::class, 'create'])->name('create');
            Route::post('/', [ConpanyController::class, 'store'])->name('store');
            Route::get('{company}/edit', [ConpanyController::class, 'edit'])->name('edit');
            Route::put('{company}', [ConpanyController::class, 'update'])->name('update');
            Route::delete('{company}/delete', [ConpanyController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('roles')->name('roles.')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('index');
            Route::get('/create', [RoleController::class, 'create'])->name('create');
            Route::post('/', [RoleController::class, 'store'])->name('store');
            Route::get('{role}/edit', [RoleController::class, 'edit'])->name('edit');
            Route::put('{role}', [RoleController::class, 'update'])->name('update');
            Route::delete('{role}/delete', [RoleController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/', [UserController::class, 'store'])->name('store');
            Route::get('{user}/edit', [UserController::class, 'edit'])->name('edit');
            Route::put('{user}', [UserController::class, 'update'])->name('update');
            Route::delete('{user}/delete', [UserController::class, 'destroy'])->name('destroy');
        });
    });

    Route::prefix('purchasing')->name('purchasing.')->middleware(['can:manage purchasing'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::prefix('selling')->name('selling.')->middleware(['can:manage selling'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::prefix('invoice')->name('invoice.')->middleware(['can:manage invoice'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::prefix('delivery')->name('delivery.')->middleware(['can:manage delivery'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::prefix('stock')->name('stock.')->middleware(['can:manage stock'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::prefix('accounting')->name('accounting.')->middleware(['can:manage accounting'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });


});
