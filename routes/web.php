<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodePostController;
use App\Http\Controllers\ArsipPostController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterController;
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


//master data
Route::get('Master-data-guru',[MasterController::class,'indexMasterGuru'])->name('indexMasterGuru');
Route::get('Master-data-murid',[MasterController::class,'indexMasterMurid'])->name('indexMasterMurid');

//create data master
Route::get('create-master-guru',[MasterController::class,'masterGuru'])->name('masterGuru');
Route::get('create-master-murid',[MasterController::class,'masterMurid'])->name('masterMurid');

Route::post('post-master-murid',[MasterController::class,'storeMasterMurid'])->name('storeMasterMurid');
Route::post('post-master-guru',[MasterController::class,'storeMasterGuru'])->name('storeMasterGuru');

Route::get('addFileMurid/{id}',[MasterController::class,'addFileMurid'])->name('addFileMurid');
Route::get('addFileGuru/{id}',[MasterController::class,'addFileGuru'])->name('addFileGuru');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
