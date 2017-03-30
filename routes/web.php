<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//public routes
Route::get('/', 'HomeController@index');
Route::get('/kompetisi', 'HomeController@viewCompetition');

//dashboard routes
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//kompetisi
Route::get('/dashboard/kompetisi/', 'CompetitionController@index')->name('viewCompetition');
Route::get('/dashboard/kompetisi/tambah', 'CompetitionController@addForm')->name('addCompetition');
Route::post('/dashboard/kompetisi/tambah', 'CompetitionController@add');
Route::get('/dashboard/kompetisi/ubah/{id}', 'CompetitionController@editForm')->name('editCompetition');
Route::post('/dashboard/kompetisi/ubah/{id}', 'CompetitionController@edit');

//grup
Route::get('/dashboard/groups/', 'GroupController@index')->name('viewGroup');
Route::get('/dashboard/groups/tambah', 'GroupController@addForm')->name('addGroup');
Route::post('/dashboard/groups/tambah', 'GroupController@add');
Route::get('/dashboard/groups/ubah/{id}', 'GroupController@editForm')->name('editGroup');
Route::post('/dashboard/groups/ubah/{id}', 'GroupController@edit');

//user
Route::get('/dashboard/users', 'UserController@index')->name('viewUser');
Route::get('/dashboard/changePassword', 'UserController@changePasswordForm')->name('changePasswordUser');
Route::post('/dashboard/changePassword', 'UserController@changePassword');
Route::get('/dashboard/users/tambah', 'UserController@addForm')->name('addUser');
Route::post('/dashboard/users/tambah', 'UserController@add');
Route::get('/dashboard/users/ubah', 'UserController@editForm')->name('editUser');
Route::post('/dashboard/users/ubah', 'UserController@edit');