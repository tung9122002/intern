<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SinhVienController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// test api
Route::group(['prefix'=>'auth'],function(){
    Route::post('register',[\App\Http\Controllers\Api\AuthController::class,'register']);
    Route::post('sinhvien',[\App\Http\Controllers\Api\StudentController::class,'sinhvien']);
    Route::get('index',[\App\Http\Controllers\Api\StudentController::class,'index']);
    Route::post('role',[\App\Http\Controllers\Api\RoleController::class,'addRole']);
});
