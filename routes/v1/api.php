<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CriasController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\CuarentenaController;

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


Route::prefix('crias')->group(function(){
    Route::post('', [CriasController::class,'store']);
    Route::get('', [CriasController::class,'index']);
});

Route::prefix('sensor')->group(function(){
    Route::post('', [SensorController::class,'store']);
});

Route::prefix('cuarentena')->group(function() {
    Route::get('', [CuarentenaController::class, 'index']);
    Route::post('', [CuarentenaController::class, 'store']);
    Route::delete('{id}', [CuarentenaController::class, 'destroy']);
});