<?php

use App\Http\Controllers\Auth\LoginController;
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
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });
});