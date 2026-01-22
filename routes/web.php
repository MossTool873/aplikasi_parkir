<?php

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
    return view('welcome');
});

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AreaParkirController;
use App\Http\Controllers\TipeKendaraanController;
use App\Http\Controllers\TarifTipeKendaraanController;

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', function () {return 'Dashboard Admin';})->name('admin.dashboard');
    Route::resource('user', UserController::class);
    Route::resource('areaParkir', AreaParkirController::class);
    Route::resource('tipeKendaraan', TipeKendaraanController::class);
    Route::resource('tarifTipeKendaraan', TarifTipeKendaraanController::class);
});

Route::prefix('petugas')->middleware(['auth', 'role:petugas,admin'])->group(function () {
    Route::get('/', function () {
        return 'Dashboard Petugas';
    })->name('petugas.dashboard');
});
