<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ HotelController };

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

Route::get('/w', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('components.parent');
});

Route::prefix('/')
    ->name('landing.')
    ->controller(HotelController::class)
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/show/{slug}', 'show')->name('show');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{product}', 'edit')->name('edit');

        Route::post('/store', 'store')->name('store');
        Route::post('/update/{product}', 'update')->name('update');
        Route::post('/destroy/{product}', 'destroy')->name('destroy');
});