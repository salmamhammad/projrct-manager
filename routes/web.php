<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/project/add', [App\Http\Controllers\ProjectController::class, 'project_add'])->name('project.add');
Route::post('/project/edit', [App\Http\Controllers\ProjectController::class, 'project_edit'])->name('project.edit');
Route::get('/project/delete/{id}', [App\Http\Controllers\ProjectController::class, 'project_delete'])->name('project.delete');

Route::get('/tasks/{id}', [App\Http\Controllers\TaskController::class, 'tasks'])->name('tasks');
Route::post('/task/add', [App\Http\Controllers\TaskController::class, 'task_add'])->name('task.add');
Route::post('/task/edit', [App\Http\Controllers\TaskController::class, 'task_edit'])->name('task.edit');
Route::get('/task/delete/{id}', [App\Http\Controllers\TaskController::class, 'task_delete'])->name('task.delete');
