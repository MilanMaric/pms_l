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

Route::get('personas/{projectId}', 'PersonAPIController@project');

Route::resource('people', 'PersonAPIController');

Route::get('income/{projectId}', 'IncomeAPIController@project');

Route::resource('incomes', 'IncomeAPIController');

Route::resource('projects', 'ProjectAPIController');

Route::get('worksOnProject/{projectId}', 'WorksOnProjectAPIController@project');

Route::resource('worksOnProjects', 'WorksOnProjectAPIController@index');

//Route::get('worksOnTask/{taskId}', 'WorksOnTaskAPIController@task');

Route::resource('worksOnTasks', 'WorksOnTaskAPIController');

Route::resource('revisions', 'RevisionAPIController');

Route::get('expense/{projectId}', 'ExpenseAPIController@project');

Route::resource('expenses', 'ExpenseAPIController');

Route::get('task/{projectId}', 'TaskAPIController@project');

Route::resource('tasks', 'TaskAPIController');

Route::resource('roles', 'RoleAPIController');

Route::resource('roles', 'RoleAPIController');