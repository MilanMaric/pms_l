<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/


Route::resource('activities', 'ActivityAPIController');

Route::resource('documents', 'DocumentAPIController');

Route::resource('people', 'PersonAPIController');

Route::resource('incomes', 'IncomeAPIController');

Route::resource('projects', 'ProjectAPIController');

Route::get('worksOnProjects/{projectId}', 'WorksOnProjectAPIController@project');

Route::resource('worksOnProjects', 'WorksOnProjectAPIController@index');

Route::resource('worksOnTasks', 'WorksOnTaskAPIController');

Route::resource('revisions', 'RevisionAPIController');

Route::resource('expenses', 'ExpenseAPIController');

Route::get('tasks/{projectId}', 'TaskAPIController@project');

Route::resource('tasks', 'TaskAPIController');

Route::resource('roles', 'RoleAPIController');

Route::resource('roles', 'RoleAPIController');