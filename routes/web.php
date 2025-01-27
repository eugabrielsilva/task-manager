<?php

use App\Http\Controllers\Projects;
use App\Http\Controllers\Tasks;
use Illuminate\Support\Facades\Route;

Route::name('projects.')->controller(Projects::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/project/view/{id}', 'view')->name('view');
    Route::get('/project/delete/{id}', 'delete')->name('delete');
    Route::post('/project/create', 'create')->name('create');
    Route::post('/project/edit', 'edit')->name('edit');
});

Route::name('tasks.')->controller(Tasks::class)->group(function () {
    Route::get('/task/finish/{id}', 'finish')->name('finish');
    Route::get('/task/delete/{id}', 'delete')->name('delete');
    Route::post('/task/create', 'create')->name('create');
    Route::post('/task/create-subtask', 'createSubtask')->name('create-subtask');
    Route::post('/task/edit', 'edit')->name('edit');
});
