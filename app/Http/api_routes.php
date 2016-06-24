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

Route::resource('worksOnProjects', 'WorksOnProjectAPIController');

Route::resource('worksOnTasks', 'WorksOnTaskAPIController');

Route::resource('revisions', 'RevisionAPIController');

Route::resource('expenses', 'ExpenseAPIController');

Route::resource('tasks', 'TaskAPIController');