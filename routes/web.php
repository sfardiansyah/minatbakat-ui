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

Route::get('/', 'HomeController@index');
Route::get('/kompetisi', 'HomeController@viewCompetition');

//admin section area (dashboard)
Route::get('/dashboard', 'DashboardController@index');
Route::get('/dashboard/kompetisi/', 'CompetitionController@index')->name('viewCompetition');

Route::get('/dashboard/kompetisi/tambah', 'CompetitionController@addForm')->name('addCompetition');
Route::post('/dashboard/kompetisi/tambah', 'CompetitionController@add');

Route::get('/dashboard/kompetisi/ubah/{id}', 'CompetitionController@editForm')->name('editCompetition');
Route::post('/dashboard/kompetisi/ubah/{id}', 'CompetitionController@edit');