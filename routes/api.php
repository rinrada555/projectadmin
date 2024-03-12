<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\AmphurController;
use App\Http\Controllers\API\TambonController;

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

Route::get('/provinces', [ TambonController::class , 'getProvinces' ]);
Route::get('/amphoes', [TambonController::class , 'getAmphoes' ]);
Route::get('/tambons', [ TambonController::class , 'getTambons' ]);
Route::get('/zipcodes', [TambonController::class, 'getZipcodes'] );

// Route::apiResource('provinces', ProvinceController::class);
// Route::apiResource('amphurs', AmphurController::class);
// Route::apiResource('tambons', TambonController::class);