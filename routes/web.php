<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodePostController;
use App\Http\Controllers\ArsipPostController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\SettingController;
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

Auth::routes([
    'register' => false,
]);
Route::middleware('role:admin')->group(function () {
    Route::get('/admin-user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::delete('/admin-user/{id}', [UserController::class, 'delete'])->name('userdel');
    Route::get('addRole', [UserController::class, 'role'])->name('role');
    Route::post('addUser', [UserController::class, 'add'])->name('add');
    Route::get('change/{id}', [UserController::class, 'changeRole'])->name('changeRole');
});

Route::resource('/kode', CodePostController::class);
Route::resource('/arsip', ArsipPostController::class);
Route::resource('/murid', MuridController::class);
Route::resource('/guru', GuruController::class);

Route::get('arsipDelete/{id}', [ArsipPostController::class, 'destroy']);
Route::get('muridDelete/{id}', [MuridController::class, 'destroy']);
Route::get('guruDelete/{id}', [GuruController::class, 'destroy']);
Route::get('profile', [SettingController::class, 'profile'])->name('profile');

Route::post('change-pass', [HomeController::class, 'changePass'])->name('changepass');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
