<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::view('contact', 'contact')->name('contact');

Route::resource('jobs', JobController::class);

//Auth
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('store');

Route::get('/login', [SessionController::class, 'create'])->name('create');
Route::post('/login', [SessionController::class, 'store'])->name('store');
Route::post('/logout', [SessionController::class, 'destroy'])->name('destroy');
