<?php

use App\Http\Controllers\api\PetugasController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sp3Controller;
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
Route::get('user',[UserController::class,'index']);
Route::post('petugas/store',[PetugasController::class,'store']);
Route::post('petugas/{id}',[PetugasController::class,'update']);

Route::get('sp3',[Sp3Controller::class,'getSp3']);
