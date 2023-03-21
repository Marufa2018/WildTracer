<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AnimalController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\PrimaryRouteController;
use App\Http\Controllers\Api\PhoneController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('/animals', AnimalController::class);
// Route::resource('/locations', LocationController::class);
// Route::resource('/primary_route', PrimaryRouteController::class);
//Route::resource('/primary_route', SecondaryRouteController::class);

Route::get('/animals', 'App\Http\Controllers\Api\AnimalController@index');
Route::get('/locations', 'App\Http\Controllers\Api\LocationController@index');
Route::get('/primary_routes', 'App\Http\Controllers\Api\PrimaryRouteController@index');
Route::get('/phone_numbers', 'App\Http\Controllers\Api\PhoneController@index');