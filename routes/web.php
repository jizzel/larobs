<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('contact', 'contact')->name('contact');

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index')->name('jobs');
    Route::get('/job/create', 'create')->name('jobs.create');
    Route::post('/job', 'store')->name('jobs.store');
    Route::get('/job/{job}', 'show')->name('jobs.show');
    Route::get('/job/{job}/edit', 'edit')->name('jobs.edit');
    Route::patch('/job/{job}', 'update')->name('jobs.update');
    Route::delete('/job/{job}', 'destroy')->name('jobs.destroy');
});
