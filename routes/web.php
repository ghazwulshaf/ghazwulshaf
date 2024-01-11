<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Dashboard\AdminUserController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('', function () { return redirect()->route('admin.dashboard'); })->name('admin');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/user', [AdminUserController::class, 'index'])->name('admin.user');
});

Route::resources([
    'accounts' => AccountController::class,
    'category' => CategoryController::class,
]);