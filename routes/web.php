<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DepartementController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\JabatanController;
use App\Http\Controllers\Dashboard\NoticeController;

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
        Route::post('/store', [EmployeeController::class, 'store'])->name('dashboard.employee.store');
        Route::get('/{id}', [EmployeeController::class, 'edit'])->name('dashboard.employee.edit');
        Route::post('/update/{id}', [EmployeeController::class, 'update'])->name('dashboard.employee.update');
        Route::get('/del/{id}', [EmployeeController::class, 'destroy'])->name('dashboard.employee.destroy');
    });

    Route::prefix('/departement')->middleware(['auth'])->group(function () {
        Route::get('/', [DepartementController::class, 'index'])->name('dashboard.departement.index');
        Route::get('/show/{id}', [DepartementController::class, 'show'])->name('dashboard.departement.show');
        Route::post('/store', [DepartementController::class, 'store'])->name('dashboard.departement.store');
        Route::get('/{id}', [DepartementController::class, 'edit'])->name('dashboard.departement.edit');
        Route::post('/update/{id}', [DepartementController::class, 'update'])->name('dashboard.departement.update');
        Route::get('/del/{id}', [DepartementController::class, 'destroy'])->name('dashboard.departement.destroy');
    });


    Route::prefix('/jabatan')->middleware(['auth'])->group(function () {
        Route::get('/', [JabatanController::class, 'index'])->name('dashboard.jabatan.index');
        Route::get('/show/{id}', [JabatanController::class, 'show'])->name('dashboard.jabatan.show');
        Route::post('/store', [JabatanController::class, 'store'])->name('dashboard.jabatan.store');
        Route::get('/{id}', [JabatanController::class, 'edit'])->name('dashboard.jabatan.edit');
        Route::post('/update/{id}', [JabatanController::class, 'update'])->name('dashboard.jabatan.update');
        Route::get('/del/{id}', [JabatanController::class, 'destroy'])->name('dashboard.jabatan.destroy');
    });

    Route::prefix('/notice')->middleware(['auth'])->group(function () {
        Route::get('/', [NoticeController::class, 'index'])->name('dashboard.notice.index');
        Route::get('/user/{id}', [NoticeController::class, 'user'])->name('dashboard.notice.user');
        Route::get('/prihal/{slug}', [NoticeController::class, 'prihal'])->name('dashboard.notice.prihal');
        Route::post('/store', [NoticeController::class, 'store'])->name('dashboard.notice.store');
        Route::get('/{id}', [NoticeController::class, 'edit'])->name('dashboard.notice.edit');
        Route::post('/update/{id}', [NoticeController::class, 'update'])->name('dashboard.notice.update');
        Route::get('/del/{id}', [NoticeController::class, 'destroy'])->name('dashboard.notice.destroy');
    });
});
