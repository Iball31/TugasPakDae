<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SiswaController;


Route::get('/', function () {
    return view('index');
});

Route::get('dataguru',function(){
    return view('master.dataguru');
});

Route::get('datajurusan',function(){
    return view('master.datajurusan');
});

Route::get('datamapel',function(){
    return view('master.datamapel');
});

Route::get('datakelas',function(){
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



