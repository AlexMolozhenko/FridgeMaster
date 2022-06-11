<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\API\HomeController;
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


Route::get('/user/location',[HomeController::class ,'allLocation']);
Route::get('/user/location/{location}',[HomeController::class ,'getLocation']);
Route::post('/user/calculate',[HomeController::class ,'calculate']);
Route::post('/user/bookBlocks',[HomeController::class ,'bookBlocks']);
