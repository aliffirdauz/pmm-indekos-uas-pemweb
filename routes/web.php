<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PemilikKostController;
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

Route::get('/',[DashboardController::class,'index']);

Route::get('/kost',[KostController::class,'index']);
Route::post('/kost/store',[KostController::class,'store']);
Route::delete('/kost/delete/{id}',[KostController::class,'destroy']);
Route::put('/kost/update/{id}',[KostController::class,'update']);

Route::get('/user',[UserController::class,'index']);
Route::post('/user/store',[UserController::class,'store']);
Route::delete('/user/delete/{id}',[UserController::class,'destroy']);
Route::put('/user/update/{id}',[UserController::class,'update']);

Route::get('/pemilik-kost',[PemilikKostController::class,'index']);
Route::post('/pemilik-kost/store',[PemilikKostController::class,'store']);
Route::delete('/pemilik-kost/delete/{id}',[PemilikKostController::class,'destroy']);
Route::put('/pemilik-kost/update/{id}',[PemilikKostController::class,'update']);