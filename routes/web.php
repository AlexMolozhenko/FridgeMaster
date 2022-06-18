<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\LocationController;
use App\Http\Controllers\API\BookingController;
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
Route::post('/user',[HomeController::class ,'getUser']);

Route::get('/user/location',[LocationController::class ,'allLocation']);

Route::get('/user/location/{location}',[LocationController::class ,'getLocation']);

Route::post('/user/calculate',[BookingController::class ,'calculate']);

Route::post('/user/bookBlocks',[BookingController::class ,'bookBlocks']);

Route::get('/user/myBookings',[BookingController::class ,'allBookings']);

Route::get('/user/myBookings/{bookingId}',[BookingController::class ,'book']);
