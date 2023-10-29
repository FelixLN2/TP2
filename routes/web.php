<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenusController;
use App\Http\Controllers\AnimalController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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


Route::get('/apropos', function () {
    return view('apropos');
});  

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource("animals", AnimalController::class);
Route::resource("genera", GenusController::class);
Route::controller(GenusController::class)->group(function (){
    //Route::get('/','index');
    Route::get('/genus/create','create');
    Route::get('/genus/{id}','show');
    Route::get('/genus/{id}/edit','edit');

    Route::get('/genus','store');
    Route::get('/genus/{id}','update');
    Route::get('/genus/{id}','destroy');
});
/*
Route::controller(AnimalController::class)->group(function (){
    //Route::get('/animal',[AnimalController::class,'index']);
    Route::get('/animal/create','create');
    Route::get('/animal/{id}','show');
    Route::get('/animal/{id}/edit','edit');

    Route::get('/animal','store');
    Route::get('/animal/{id}','update');
    Route::get('/animal/{id}','destroy');
});*/

/*
//only authenticated can access this group
Route::group(['middleware' => ['auth']], function() {
    //only verified account can access with this group
    Route::group(['middleware' => ['verified']], function() {
            // 
            //   Dashboard Routes
            //  
            Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    });
});*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
