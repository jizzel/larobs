<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::view('contact', 'contact')->name('contact');

Route::resource('jobs', JobController::class);
