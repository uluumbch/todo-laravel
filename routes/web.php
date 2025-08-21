<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');
Route::post('/todo', [TodoController::class, 'store'])->name('todo.store');
Route::delete('/todo/{idTodo}', [TodoController::class, 'destroy']);
Route::get('/todo/{idTodo}/edit', [TodoController::class, 'edit'])->name('todo.edit');

Route::put('/todo/{idTodo}/edit', [TodoController::class, 'update']);

Route::patch('/todo/{idTodo}/done', [TodoController::class, 'updateDone'])->name('todo.complete');


