<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{Landing, Dashboard};

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', Landing::class);
Route::get('/dashboard', Dashboard::class);
