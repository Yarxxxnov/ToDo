<?php

use App\Models\Todo;
use Illuminate\Support\Facades\Route;

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

Route::get('/api/tasks/new/{name}', function ($name) {
    $task = new Todo;
    $task->name = $name;
    $task->state = false;
    $task->save();

    $status = [
        "status" => "ok"
    ];
    $status = "<pre>" . json_encode($status, JSON_PRETTY_PRINT);

    return $status;
});

Route::get('/api/tasks/all', function () {
    $tasks = Todo::all();
    $tasks = "<pre>" . json_encode($tasks, JSON_PRETTY_PRINT);

    return $tasks;
});

Route::get('/api/tasks/show/{id}', function ($id) {
    $task = Todo::find($id);
    $task = "<pre>" . json_encode($task, JSON_PRETTY_PRINT);

    return $task;
});

Route::get('/api/tasks/delete/{id}', function ($id) {
    $task = Todo::destroy($id);

    $status = [
        "status" => "ok"
    ];
    $status = "<pre>" . json_encode($status, JSON_PRETTY_PRINT);

    return $status;
});
