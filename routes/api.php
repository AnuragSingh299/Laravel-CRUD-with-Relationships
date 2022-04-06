<?php

use App\Http\Controllers\API\SetDataController;
use App\Http\Controllers\Auth\ApiAuthController;
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

Route::middleware('auth:api')->group(function() {
    Route::post('/logout', [ApiAuthController::class, 'logout']);
    Route::post('/create',[SetDataController::class,'create']);
    Route::get('/index',[SetDataController::class,'index']);
    Route::get('/show',[SetDataController::class,'show']);
    Route::post('/update',[SetDataController::class,'update']);
    Route::post('/delete',[SetDataController::class,'destroy']);
});


Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

