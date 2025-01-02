<?php

use App\Livewire\Dashboard;
use App\Livewire\Login;
use App\Livewire\Profile;
use App\Livewire\RegisterEvents;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', Login::class)->name('login');
Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/registerEvents', RegisterEvents::class)->name('registerEvents');
Route::get('/profile', Profile::class)->name('profile');
