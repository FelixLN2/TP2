<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenusController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\Auth\VerificationController;
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



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');


Route::resource("verification", VerificationController::class);/*
Route::resource("genera", GenusController::class);
Route::resource("genera", GenusController::class);
Route::resource("genera", GenusController::class);*/

Route::resource("animals", AnimalController::class);
Route::resource("genera", GenusController::class);


Route::controller(GenusController::class)->group(function (){
    Route::get('/','index');
    Route::get('/genus/create','create');
    Route::get('/genus/{id}','show');
    Route::get('/genus/{id}/edit','edit');

    Route::get('/genus','store');
    Route::match(['PUT', 'PATCH'], '/genus/{id}/update', 'update');
    Route::get('/genus/{id}/destroy','destroy');
    
});

Route::controller(AnimalController::class)->group(function (){
    //Route::get('/animal',[AnimalController::class,'index']);
    Route::get('/animal/create','create');
    Route::get('/animal/{id}','show');
    Route::get('/animal/{id}/edit','edit');

    Route::get('/animal','store');
    Route::get('/animal/{id}/update','update');
    Route::get('/animal/{id}/destroy','destroy');
});

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
})->middleware(['auth','verified'])->name('dashboard.index');

require __DIR__.'/auth.php';

/*
Route::group(['middleware' => ['auth']], function() {
 
    // 
    //  Verification Routes
    // 
    Route::get('/email/verify', 'VerificationController@show')->name('auth.notice');
    Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('auth.verify')->middleware(['signed']);
    Route::post('/email/resend', 'VerificationController@resend')->name('auth.resend');

});*/
/*
//only authenticated can access this group
Route::group(['middleware' => ['auth']], function() {
    //only verified account can access with this group
    Route::group(['middleware' => ['verified']], function() {
            // 
            //  Dashboard Routes
            //  
            Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    });
});*/

Auth::routes();


