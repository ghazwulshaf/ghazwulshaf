<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Dashboard\AdminPortofolioController;
use App\Http\Controllers\Dashboard\AdminProfileController;
use App\Http\Controllers\Dashboard\AdminUserController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Homepage\HomepageHomeController;
use App\Http\Controllers\PortofolioController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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

Inertia::setRootView('react.app');

Route::group(['prefix' => ''], function () {
    Route::get('/', [HomepageHomeController::class, 'index'])->name('homepage.home');
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
    });
    Route::get('/profile', [AdminProfileController::class, 'index'])->name('admin.profile');
    
    // region portofolio
    Route::group(['prefix' => 'portofolio'], function () {
        Route::get('', [AdminPortofolioController::class, 'index'])->name('admin.portofolio');
        Route::get('/sort', [AdminPortofolioController::class, 'sort'])->name('admin.portofolio.sort');
        Route::get('/search', [AdminPortofolioController::class, 'search'])->name('admin.portofolio.search');
        Route::get('/mode', [AdminPortofolioController::class, 'mode'])->name('admin.portofolio.mode');
        Route::get('/add', [AdminPortofolioController::class, 'create'])->name('admin.portofolio.create');
        Route::get('/{id}/view', [AdminPortofolioController::class, 'view'])->name('admin.portofolio.view');
        Route::get('/{id}/edit', [AdminPortofolioController::class, 'edit'])->name('admin.portofolio.edit');
    });
});

Route::resource('accounts', AccountController::class)->only(['store', 'update', 'destroy']);
Route::resource('categories', CategoryController::class)->only(['store', 'update', 'destroy']);
Route::resource('portofolios', PortofolioController::class)->only(['store', 'update', 'destroy']);