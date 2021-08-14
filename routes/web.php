<?php

use App\Http\Controllers\CutiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\karyawanController;
use App\Http\Controllers\KaryawanController as ControllersKaryawanController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/dashboard');
});
Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/user', [\App\Http\Controllers\UserController::class, 'list']);
Route::resource('/karyawan', KaryawanController::class);
Route::resource('/cuti', CutiController::class);
Route::resource('/lembur', LemburController::class);
Route::resource('/gajian', PenggajianController::class);

Auth::routes();




