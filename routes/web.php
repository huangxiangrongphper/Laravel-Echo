<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/order',function () {
    //\App\Events\OrderUpdated::dispatch();
    $order = \App\Order::find(1);
    event(new \App\Events\OrderUpdated($order));
});

Route::get('/projects/{project}',function (\App\Project $project){
    return view('projects.show',compact('project'));
});

Route::get('/api/projects/{project}/tasks',function (\App\Project $project) {
    return $project->tasks->pluck('body');
});

Route::post('/api/projects/{project}/tasks',function(\App\Project $project){
   $task =  $project->tasks()->create(['body' => request('body')]);
   event(new \App\Events\TaskCreated($task));
});















Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
