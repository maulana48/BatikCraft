<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ TestController, LandingController, AuthController };
use App\Http\Livewire\{ Landing, Dashboard };

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
Route::get('/', Landing::class);
Route::get('/dashboard', Dashboard::class);

Route::prefix('/test')
    ->name('auth.')
    ->controller(AuthController::class)
    ->group(function(){
        Route::any('/login', 'login')->name('login');
        Route::any('/logout', 'logout')->name('logout');
        Route::any('/registration', 'registration')->name('registration');
    });

Route::prefix('/landing')
    ->name('landing.')
    ->controller(LandingController::class)
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/show/{slug}', 'show')->name('show');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{product}', 'edit')->name('edit');

        Route::post('/store', 'store')->name('store');
        Route::post('/update/{product}', 'update')->name('update');
        Route::post('/destroy/{product}', 'destroy')->name('destroy');
});