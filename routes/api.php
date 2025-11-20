<?php

use App\TasksManager\Tasks\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'tasks', 'as' => 'tasks.'], function () {
    Route::post('create', [TasksController::class, 'create'])->name('create');
    Route::get('', [TasksController::class, 'list'])->name('list');
    Route::get('{id}', [TasksController::class, 'show'])->name('show');
    Route::put('{id}', [TasksController::class, 'update'])->name('update');
    Route::delete('{id}', [TasksController::class, 'delete'])->name('delete');
});

