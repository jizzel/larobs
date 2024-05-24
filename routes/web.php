<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use \App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(5);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('job/create', function () {
    return view('jobs.create');
});



Route::get('job/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

Route::post('job', function (){
    request()->validate([
       'title' => ['required', 'min:3'],
       'salary' => 'required',
    ]);
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});
Route::get('job/{id}/edit', function ($id) {
    $job = Job::find($id);

    return view('jobs.edit', ['job' => $job]);
});

Route::patch('job/{id}', function ($id) {
//    validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => 'required',
    ]);
//    authorize

//    update and persist
    $job = Job::findOrFail($id);
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);
//    redirect
    return redirect('/job/'.$job->id);

});

Route::delete('job/{id}', function ($id) {
//    authorize
//    delete job
    Job::findorFail($id)->delete();
//    redirect
    return redirect('/jobs');
});

Route::get('contact', function () {
    return view('contact');
});

