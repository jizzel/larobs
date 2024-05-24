<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

//index
Route::get('jobs', [JobController::class, 'index'])->name('jobs.index');

//create
Route::get('job/create', [JobController::class, 'create'])->name('jobs.create');

//show
Route::get('job/{job}', [JobController::class, 'show'])->name('jobs.show');

//store
Route::post('job', [JobController::class, 'store'])->name('jobs.store');

//edit
Route::get('job/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');

//update
Route::patch('job/{job}', [JobController::class, 'update'])->name('jobs.update');

//destroy
Route::delete('job/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');

Route::view('contact', 'contact')->name('contact');
