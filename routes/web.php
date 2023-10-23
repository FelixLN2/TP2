<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});*/
Route::controller(GenreController::class)->group(function (){
    Route::get('/genre',[GenreController::class,'index']);
    Route::get('/genre/create','create');
    Route::get('/genre/{id}','show');
    Route::get('/genre/{id}/edit','edit');

    Route::get('/genre','store');
    Route::get('/genre/{id}','update');
    Route::get('/genre/{id}','destroy');
});
Route::controller(AnimalController::class)->group(function (){
    //Route::get('/animal',[AnimalController::class,'index']);
    Route::get('/animal/create','create');
    Route::get('/animal/{id}','show');
    Route::get('/animal/{id}/edit','edit');

    Route::get('/animal','store');
    Route::get('/animal/{id}','update');
    Route::get('/animal/{id}','destroy');
});