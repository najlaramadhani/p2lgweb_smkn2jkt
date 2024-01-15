<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DepartementController;
use App\Http\Controllers\Dashboard\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/', [LoginController::class, 'login'])->name('login.view');
Route::post('/handlerAuth', [LoginController::class, 'handleSignin'])->name('login.handler');
Route::get('/logout', [LoginController::class, 'logout'])->name('dashboard.logout');

Route::prefix('/dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::prefix('/employee')->middleware(['auth'])->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('dashboard.employee.index');
        Route::get('/create', [EmployeeController::class, 'create'])->name('dashboard.employee.create');
    });

    Route::prefix('/departement')->middleware(['auth'])->group(function () {
        Route::get('/', [DepartementController::class, 'index'])->name('dashboard.departement.index');
        Route::post('/store', [DepartementController::class, 'store'])->name('dashboard.departement.store');
    });
});
