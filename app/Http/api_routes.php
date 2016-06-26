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

Route::get('income/{projectId}','IncomeAPIController@project');

Route::resource('incomes', 'IncomeAPIController');

Route::resource('projects', 'ProjectAPIController');

Route::get('worksOnProject/{projectId}', 'WorksOnProjectAPIController@project');

Route::resource('worksOnProjects', 'WorksOnProjectAPIController@index');

Route::resource('worksOnTasks', 'WorksOnTaskAPIController');

Route::resource('revisions', 'RevisionAPIController');

Route::resource('expenses', 'ExpenseAPIController');

Route::get('task/{projectId}', 'TaskAPIController@project');

Route::resource('tasks', 'TaskAPIController');

Route::resource('roles', 'RoleAPIController');

Route::resource('roles', 'RoleAPIController');