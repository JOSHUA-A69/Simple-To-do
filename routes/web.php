<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('todos.index');
});

Route::resource('todos', TodoController::class);
Route::patch('/todos/{todo}/toggle', [TodoController::class, 'toggleComplete'])->name('todos.toggle');
