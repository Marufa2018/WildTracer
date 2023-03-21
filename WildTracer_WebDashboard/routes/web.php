<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\InstanceController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\AnimalController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\RouteController;
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
    return view('admin.dashboard.dashboard');
})->middleware(['auth', 'verified']);

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'auth.isAdmin', 'verified']);

//Admin Route
Route::prefix('admin')->middleware(['auth', 'auth.isAdmin', 'verified'])->name('admin.')->group(function (){
    Route::resource('/users', UserController::class);
    Route::resource('/instances', InstanceController::class);
    Route::resource('/download', DownloadController::class);
    Route::resource('/animals', AnimalController::class);
    Route::resource('/locations', LocationController::class);
    Route::resource('/routes', RouteController::class);
});
