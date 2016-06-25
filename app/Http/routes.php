<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    if (!Auth::check())
        return view('welcome');
    else
        return redirect('/home');
});

Route::auth();

Route::get('/home', 'HomeController@index');


/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});


/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});


Route::resource('activities', 'ActivityController');

Route::resource('documents', 'DocumentController');

Route::resource('people', 'PersonController');

Route::resource('incomes', 'IncomeController');

Route::resource('projects', 'ProjectController');

Route::resource('worksOnProjects', 'Works_On_ProjectController');

Route::resource('worksOnTasks', 'Works_On_TaskController');
Route::resource('worksOnProjects', 'WorksOnProjectController');

Route::resource('worksOnTasks', 'WorksOnTaskController');


Route::resource('revisions', 'RevisionController');

Route::resource('expenses', 'ExpenseController');

Route::resource('tasks', 'TaskController');

Route::resource('activities', 'ActivityController');

Route::resource('documents', 'DocumentController');

Route::resource('people', 'PersonController');

Route::resource('incomes', 'IncomeController');

Route::resource('projects', 'ProjectController');

Route::resource('worksOnProjects', 'WorksOnProjectController');

Route::resource('worksOnTasks', 'WorksOnTaskController');

Route::resource('revisions', 'RevisionController');

Route::resource('expenses', 'ExpenseController');

Route::resource('tasks', 'TaskController');
Route::auth();

Route::get('/home', 'HomeController@index');


Route::resource('activities', 'ActivityController');

Route::resource('documents', 'DocumentController');

Route::resource('people', 'PersonController');

Route::resource('incomes', 'IncomeController');

Route::resource('projects', 'ProjectController');

Route::resource('worksOnProjects', 'WorksOnProjectController');

Route::resource('worksOnTasks', 'WorksOnTaskController');

Route::resource('revisions', 'RevisionController');

Route::resource('expenses', 'ExpenseController');

Route::resource('tasks', 'TaskController');

Route::resource('activities', 'ActivityController');

Route::resource('documents', 'DocumentController');

Route::resource('people', 'PersonController');

Route::resource('incomes', 'IncomeController');

Route::resource('projects', 'ProjectController');

Route::resource('worksOnProjects', 'WorksOnProjectController');

Route::resource('worksOnTasks', 'WorksOnTaskController');

Route::resource('revisions', 'RevisionController');

Route::resource('expenses', 'ExpenseController');

Route::resource('tasks', 'TaskController');

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Password Reset Routes...
Route::get('password/reset', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('/home', 'HomeController@index');