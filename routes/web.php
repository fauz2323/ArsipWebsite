<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodePostController;
use App\Http\Controllers\ArsipPostController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware('role:admin')->group(function () {
    Route::get('/admin-user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::delete('/admin-user/{id}', [UserController::class, 'delete'])->name('userdel');
});

Route::middleware('role:admin')->group(function () {
    Route::resource('/kode', CodePostController::class);
    Route::resource('/arsip', ArsipPostController::class);
    Route::resource('/murid', MuridController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
