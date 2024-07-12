<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\{Landing, Dashboard};

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', Landing::class)->name('landing');
Route::get('/dashboard', Dashboard::class)->name('dashboard');
