<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\EtudiantController; 



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('login',[AuthController::class,'login']);
Route::get('logout',[AuthController::class,'logout']);

Route::apiResource('etudiants',EtudiantController::class);
Route::get('restore/{id}',[EtudiantController::class,'restore']);
Route::get('forceDelete/{id}',[EtudiantController::class,'forceDelete']);
Route::get('trashed',[EtudiantController::class,'trashed']);



