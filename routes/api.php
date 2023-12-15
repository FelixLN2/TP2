<?php

use App\Http\Controllers\API\AnimalController;
use App\Http\Controllers\API\GenusController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });





// Route::middleware('auth:api')->group(function () {
// });

Route::post('/register', [RegisteredUserController::class,'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

//Route::post('/register', 'Auth\RegisteredUserController@store')->middleware('guest');


    Route::middleware('api')->group(function () {
        Route::apiResource("animals", AnimalController::class); 
        Route::apiResource("genera", GenusController::class); 
        
        
        Route::get('/', [GenusController::class, 'index']);
        
    
        //Route::get('autocomplete', 'autocomplete')->name('autocomplete');
    
        Route::get('/genus/autocomplete', [GenusController::class, 'autocomplete']);
    
        Route::post('/animals/create', [AnimalController::class, 'store']);
        Route::post('/genera/create', [GenusController::class, 'store']);
        
        
        
        Route::post('/animals/edit/{animal}', [AnimalController::class, 'update']);
        Route::patch('/genera/edit/{genus}', [GenusController::class, 'update']);
    });
    
// Route::group(['middleware' => ['auth']], function() {
// });


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


