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

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/admin/dashboard', function () {
    if (!session('login')) {
        return redirect('/login');
    }
    return 'Dashboard admin';
});
Route::get('/petugas/dashboard', function () {
    if (!session('login')) {
        return redirect('/login');
    }
    return 'Dashboard petugas';
});
Route::get('/owner/dashboard', function () {
    if (!session('login')) {
        return redirect('/login');
    }
    return 'Dashboard owner';
});

use App\Http\Controllers\UserController;

Route::get('/admin/user', [UserController::class, 'index']);
Route::get('/admin/user/create', [UserController::class, 'create']);
Route::post('/admin/user', [UserController::class, 'store']);
Route::get('/admin/user/{id}/edit', [UserController::class, 'edit']);
Route::post('/admin/user/{id}', [UserController::class, 'update']);
Route::get('/admin/user/{id}/delete', [UserController::class, 'delete']);

use App\Http\Controllers\AreaParkirController;

Route::get('/admin/areaParkir', [AreaParkirController::class, 'index']);
Route::get('/admin/areaParkir/create', [AreaParkirController::class, 'create']);
Route::post('/admin/areaParkir', [AreaParkirController::class, 'store']);
Route::get('/admin/areaParkir/{id}/edit', [AreaParkirController::class, 'edit']);
Route::put('/admin/areaParkir/{id}', [AreaParkirController::class, 'update']);
Route::delete('/admin/areaParkir/{id}/delete', [AreaParkirController::class, 'delete']);
