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


// Route::get('/apropos', function () {
//      return view('apropos');
// });  
// Route::get('/apropos','apropos');

Route::get('/apropos', function () {
    return view('apropos');
})->name('apropos');

Route::get('/televersement', function () {
    return view('televersement');
})->name('televersement');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('genus.index');


Route::resource("verification", VerificationController::class);/*
Route::resource("genera", GenusController::class);
Route::resource("genera", GenusController::class);
Route::resource("genera", GenusController::class);*/

Route::resource("animals", AnimalController::class);
Route::resource("genera", GenusController::class);




use App\Http\Controllers\LocalizationController;

Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);


//only authenticated can access this group
Route::group(['middleware' => ['auth']], function() {
    //only verified account can access with this group
    Route::controller(GenusController::class)->group(function (){
        Route::get('/','index');
        Route::get('/genus/create','create');
        Route::get('/genus/{id}','show');
        Route::get('/genus/{id}/edit','edit');
    
        Route::post('/genus','store');
        Route::match(['post', 'patch'],'/genus/{id}/update', 'update');
        Route::delete('/genus/{id}','destroy');
        
    });
    
    Route::controller(AnimalController::class)->group(function (){
        //Route::get('/','index');
        Route::get('/animal/create','create');
        Route::get('/animal/{id}','show');
        Route::get('/animal/{id}/edit','edit');
    
        Route::post('/animal','store');
        Route::match(['post', 'patch'],'/animal/{id}/update','update');
        Route::delete('/animal/{id}','destroy');
    });
    Route::group(['middleware' => ['verified']], function() {
            // 
            //   Dashboard Routes
            //  
            Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('genus.index');




Route::group(['middleware' => ['auth']], function() {
 
    // 
    //  Verification Routes
    // 
    Route::get('/email/verify', 'VerificationController@show')->name('auth.notice');
    Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('auth.verify')->middleware(['signed']);
    Route::post('/email/resend', 'VerificationController@resend')->name('auth.resend');

});


Auth::routes();
require __DIR__.'/auth.php';




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
