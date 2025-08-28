<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Rute-rute ini untuk otentikasi.
| Rute login dapat diakses oleh tamu (guest).
| Rute logout hanya dapat diakses oleh pengguna yang sudah login.
|
*/

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
|
| Semua rute di dalam grup ini dilindungi oleh middleware 'auth'.
| Pengguna harus login untuk mengakses rute-rute ini.
|
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('index');
    });

    Route::get('dataguru', function () {
        return view('master.dataguru');
    });

    Route::get('datajurusan', function () {
        return view('master.datajurusan');
    });

    Route::get('datamapel', function () {
        return view('master.datamapel');
    });

    Route::get('datakelas', function () {
        return view('master.datakelas');
    });

    Route::resource('siswa', SiswaController::class);

    Route::get('/user/{id}', function ($id) {
        return "User ID: " . $id;
    });

    Route::prefix('admin')->group(function () {
        Route::get('/index', [AdminController::class, 'index']);
        Route::get('/users', [AdminController::class, 'users']);
        Route::get('/dataguru', [AdminController::class, 'dataguru']);
        Route::get('/datasiswa', [AdminController::class, 'siswa']);
        Route::get('/datamapel', [AdminController::class, 'mapel']);
        Route::get('/datakelas', [AdminController::class, 'kelas']);
        Route::get('/datajurusan', [AdminController::class, 'jurusan']);
    });

    Route::prefix('users')->group(function () {
        Route::get('/index', [UsersController::class, 'index']);
        Route::get('/create', [UsersController::class, 'create']);
    });

});
