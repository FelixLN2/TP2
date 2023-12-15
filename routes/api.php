<?php

use App\Http\Controllers\API\AnimalController;
use App\Http\Controllers\API\GenusController;
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


Route::apiResource("animals", AnimalController::class); 
Route::apiResource("genera", GenusController::class); 


Route::post('/animals/create', [AnimalController::class, 'store']);
Route::post('/genera/create', [GenusController::class, 'store']);

Route::middleware('api')->group(function () {
   


});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


