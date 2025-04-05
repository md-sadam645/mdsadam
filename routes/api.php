<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AppController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\Api\vehicleController;
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


Route::group(['middleware' => ['cors', 'json.response']], function () {
    // public routes
    Route::post('/login', [ApiAuthController::class,'login']);
    Route::get('/logout', [ApiAuthController::class,'logout']);
    // Route::post('/register',[ApiAuthController::class,'register']);
    Route::post('/register',[ApiAuthController::class,'agentRegister']);
    // Route::post('/agent_login', [ApiAuthController::class,'agentLogin']);
    Route::get('/admin-list',[ApiAuthController::class,'Admin']);

});


Route::middleware('auth:api')->group(function () {
    Route::get('/profile',[ApiAuthController::class,'profile']);
    Route::get('/vehicle_list', [vehicleController::class,'allVehicle']);
    Route::post('/update_profile',[ApiAuthController::class,'updateProfile']);
    Route::post('/search-vehicle', [vehicleController::class,'searchVehicle']);
    Route::get('/view-vehicle/{id}', [vehicleController::class,'viewVehicle']);
});


