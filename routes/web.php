<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Dashboard\AdminPortofolioController;
use App\Http\Controllers\Dashboard\AdminProfileController;
use App\Http\Controllers\Dashboard\AdminUserController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Constraint\LogicalNot;

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

Route::get('/', function () {
    return view('homepage.home.index');
});

// region authentication
Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login.confirm');
    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
});

// region admin
Route::group(['namespace' => 'Admin', 'middleware' => 'auth' ,'prefix' => 'admin'], function () {
    Route::get('', function () { return redirect()->route('admin.dashboard'); })->name('admin');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // region user
    Route::group(['prefix' => 'user'], function () {
        Route::get('', [AdminUserController::class, 'index'])->name('admin.user');
        Route::resource('accounts', AccountController::class)->only(['store', 'update', 'destroy']);
        Route::resource('categories', CategoryController::class)->only(['store', 'update', 'destroy']);
    });
    Route::get('/profile', [AdminProfileController::class, 'index'])->name('admin.profile');

    // region portofolio
    Route::group(['prefix' => 'portofolio'], function () {
        Route::get('', [AdminPortofolioController::class, 'index'])->name('admin.portofolio');
        Route::get('/add', [AdminPortofolioController::class, 'create'])->name('admin.portofolio.create');
    });
});