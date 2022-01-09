<?php

use App\Http\Controllers\GroupController;
use GuzzleHttp\Middleware;
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

Route::get('/', function () {
    return view('home');
});


//Route::middleware('auth')->group(function(){
    Route::resource('groups', GroupController::class)->except('show');
    Route::get('groups/{group:slug}', 'App\Http\Controllers\GroupController@show')->name('groups.show');
    Route::get('groups/{group:slug}/edit', 'App\Http\Controllers\GroupController@edit')->name('groups.edit');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
