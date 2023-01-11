<?php

use App\Http\Controllers\KostController;
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
    return view('welcome');
});

Route::get('/kost',[KostController::class,'index']);
Route::post('/kost/store',[KostController::class,'store']);
Route::delete('/kost/delete/{id}',[KostController::class,'destroy']);
